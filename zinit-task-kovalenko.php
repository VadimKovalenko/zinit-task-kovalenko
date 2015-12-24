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
</head>
<body>
<form  method = "post" action="zinit-login.php" id = "mainForm">
	<label for = "username">Username:</label>
	<input type="text" name = "username" id = "username"/>
	<br/>
	<label for = "email">E-mail:</ladel>
	<input type="text" name = "email" id = "email"/>
	<br/>
	<label for = "password1">Password:</label>
	<input type="password"  name = "password1" id = "password1"/>
	<br/>
	<label for = "password2">Confirm password:</label>
	<input type="password"  name = "password2" id = "password2"/>
	<br/>
	<input type="submit" id = "insertData" value = "Sign up"/>
</form>
<div id = "result"></div>
<script>
//Отправляем данные без перезагрузки страниц посредством jQuery
$('#mainForm').submit(function(){
	 return false;
	});
	 
	$('#insertData').click(function(){
	$.post( 
	$('#mainForm').attr('action'),
	$('#mainForm :input').serializeArray(),
		function(result){
			$('#result').html(result);
		}
	 );
});
</script>
</body>
</html>