<!-- https://www.w3schools.com/css/css_align.asp -->
<!--https://www.simplilearn.com/tutorials/php-tutorial/php-login-form#step_3_create_a_database_table_using_mysql -->
<html>
	<head>
	<title>Login</title>
	<link type="text/css" href="login.css" rel="stylesheet" >
	</head>
	<body>
		
		<form action="logincheck.php" method="post"><!-- don't want to use get for credentials... -->
		<h1>Soundboard Saver</h1>
		<label for="username">Username</label>
		<input type="text" name="username" id="username">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<input id="loginsubmit" type="submit" value="Login">
		<?php 
		if (isset($_GET['error'])) {
			echo "<h2>Invalid credentials</h2>";
		}
		?>	
		</form>
	</body>
</html>