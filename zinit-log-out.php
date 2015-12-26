<?php
	//Если авторизирован, удаляем переменные сессии 
	session_start();
	if (isset($_SESSION['id'])) {
		//Удаляем переменные сессии путём очистки массива $_SESSION
		$_SESSION = array();
		
		//Удаляем сессионные куки, задав время окончания кук на час назад  
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 3600);
		}
		//Уничтожаем сессию
		session_destroy();
	}
	
	//Удаляем ID и имя пользователя , задав время их окончания на час назад
	setcookie('user_id', '', time() - 3600);
	setcookie('username', '', time() - 3600);
	
	//Редиректим на главную страницу
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	header('Location: ' . $home_url);
?>