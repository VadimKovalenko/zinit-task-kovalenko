<?php
  //Подключаемя к БД
	require_once('connect_vars.php');
	try {
	  $DBH = new PDO(DB_DSN, DB_USER, DB_PASS);  
	}  
	catch(PDOException $e) {  
		echo $e->getMessage();  
	}
	
	//Если нажата кнопка "Sign Up"	:
	if (isset($_POST['submit'])){
		//Достаём данные, переданные методом POST
		$username = strip_tags(trim($_POST['username']));	
		$email = strip_tags(trim($_POST['email']));
		$password1 = strip_tags(trim($_POST['password1']));
		$password2 = strip_tags(trim($_POST['password2']));
		//Проверяем, или заполнены все данные
		if(!empty($username) && !empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		//Вставляем данные в БД
			$query = "INSERT INTO users (username, password, email) VALUES (:username, SHA(:password1), :email)";
			$statement = $DBH->prepare($query);
			//Выполняем INSERT запрос через PDO плейсхолдеры
			$statement->execute(array(
				':username' => $username,
				':password1' => $password1,
				':email' => $email	
			));
			//Подтверждаем удачную авторизацию
			echo '<p>Your account has been successfully created.</p>';
			echo 'Return to <a href = zinit-task-kovalenko.php>main page</a>';
			//exit();
	}
	else{
		echo '<p>You must enter all of the sign-up data, including the desired password twice.</p>';
	}
 }

?>