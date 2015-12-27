<?php
header("Content-Type: text/html; charset= UTF-8");
	//Старт сессии
	session_start();
	//Добавляем внешний скрипт рекапчи
	//echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
	//Задаём счетчик сессий
	//$_SESSION['counter'] = (!$_SESSION['counter']) ? 0 : $_SESSION['counter'];
	// Если пользователь ещё не авторизирован, делаем попытку входа на сайт
	if (!isset($_SESSION['id'])) {
		//if ($_SESSION['counter'] >= 3 && $_POST['g-recaptcha-response'] && )
		//Подключаемся к БД
		require_once('connect_vars.php');
		try {
			$DBH = new PDO(DB_DSN, DB_USER, DB_PASS);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		  
		}  
		catch(PDOException $e) {  
			echo $e->getMessage();  
		}
		//Берем данные пользователя с поля заполнения
		$login_username = strip_tags(trim($_POST['login_username']));
		$login_password = strip_tags(trim($_POST['login_password']));
		if (!empty($login_username) && !empty($login_password) && isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
			//Сверяем имя пользователя и пароль в БД
			$query = "SELECT id, username, last_visit FROM users WHERE username = :login_username AND password = SHA(:login_password)";
			$statement = $DBH->prepare($query);
			$statement->execute(array(
			':login_username' => $login_username,
			':login_password' => $login_password
			));
			if ($statement->rowCount() > 0) {
				//Авторизация прошла успешно, достаём массив данных о пользователе
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				//Записываем в сессию имя и id пользователя
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['last_visit'] = $row['last_visit'];
				echo "Hello, " . 	$_SESSION['username'] . ", your ID = " . $_SESSION['id'] . ". Your last visit - " . $row['last_visit'];
				//Обновляем последний визит пользователя на сайт
				$query2 = "UPDATE users SET last_visit = NOW() WHERE id =" . $row['id'];
				$DBH->query($query2);
				//Обнуляем счетчик, если пользователь зашел
				//unset($_SESSION['counter']);
				//Ссылка на выход из профиля
				echo "<br/>";
				echo "<a href = 'zinit-log-out.php'>Log out</a>";
				} else if ($login_username != $row['username'] || $login_password != $row['password']) {
				// Имя пользователя или пароль неверны, выводим предупреждение
				echo "Вы должны правильно ввести имя пользователя и пароль.";
				//Увеличиваем счетчик, чтобы определить, сколько раз пользователь ввел неправильное имя или пароль
				/*$_SESSION['counter']++;
				if ($_SESSION['counter'] >= 3) {
					echo "<br/>";
					echo "<div class='g-recaptcha' data-sitekey='6LcE2xMTAAAAAFOXLcdQ01QWvExYTaSq3l2HDLYs'></div>";
					
				}*/ 
				} else {
				echo "Вы должны заполнить все поля, чтобы войти.";
			}
		}
	}  
?>