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
</head>
<body>
<form  method = "post" action="zinit-login.php">
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
	<input type="submit" value = "Sign up"/>
</form>
</body>
</html>