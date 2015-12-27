<?php
header("Content-Type: text/html; charset= UTF-8");
require_once('zinit-start-session.php');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<style>
		input {
			margin-bottom: 15px;
		}
	</style>	
	<script src = "scripts/jquery-1.11.3.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src = "scripts/captcha.js"></script>
	<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
</head>
<body>
<?php if (isset($_SESSION['id'])) { ?>
	<p><?php echo "Hello, " . $_SESSION['username'] . ", your ID = " . $_SESSION['id'] . ". Your last visit - " . $_SESSION['last_visit']; ?></p>
	<p><a href = "zinit-log-out.php">Log out</a></p>
<?php } else { ?>
	<!--Авторизация-->
	<h3>Войти под существующей учётной записью</h3>
	<form  method = "post" action="zinit-log-in.php" id = "loginForm">
		<label for = "username">Username:</label>
		<input type="text" name = "login_username" id = "login_username" required>
		<br/>
		<label for = "password">Password:</label>
		<input type="password"  name = "login_password" id = "login_password" required>
		<br/>
		<input type="submit" id = "insertData" value = "Log in" name = "submit">
		<div id="captcha" class='g-recaptcha' data-sitekey='6LcE2xMTAAAAAFOXLcdQ01QWvExYTaSq3l2HDLYs'></div>
		<div id = "result"></div>
	</form>
<?php } ?>	
<script>
//Отправляем данные без перезагрузки страниц посредством jQuery
$('#loginForm').submit(function(){
	 return false;
	});
	 
	$('#insertData').click(function(){
	$.post(
	$('#loginForm').attr('action'),
	$('#loginForm :input').serializeArray(),
		function(result){
			$('#result').html(result);
		}
	 );
});
</script>
</body>
</html>