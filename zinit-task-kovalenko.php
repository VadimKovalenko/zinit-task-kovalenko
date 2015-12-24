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
	<ladel for = "username">Username:</ladel>
	<input type="text" name = "username"/>
	<br/>
	<ladel for = "email">E-mail:</ladel>
	<input type="text" name = "email"/>
	<br/>
	<ladel for = "password1">Password:</ladel>
	<input type="password"  name = "password1"/>
	<br/>
	<ladel for = "password2">Confirm password:</ladel>
	<input type="password"  name = "password2"/>
	<br/>
	<input type="submit" value = "Sign up"/>
</form>
</body>
</html>