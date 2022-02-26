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
		<h3>Create your own custom soundboards!</h3>
		<input type="text" name="username" id="username" placeholder="Username" maxlength="25">
		<input type="password" name="password" id="password" placeholder="Password" maxlength="255">
		<input id="loginsubmit" type="submit" value="Login">
		<?php 
		if (isset($_GET['error'])) {
			echo "<h4>Invalid credentials!</h4>";
		}
		?>	
		</form>
	</body>
</html>