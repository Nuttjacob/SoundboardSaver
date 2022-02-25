<?php
	session_start();
	if(isset($_SESSION['sessid']) && isset($_SESSION['username'])) {//Just starts the block
?><!--Users have to be authenticated with username and sessionid that was given by logincheck.php -->
<html>
	<head>
	<title>Home</title>
	</head>
	<body>
	<h1>Welcome, <?php echo($_SESSION['username']); ?>!</h1>
	<form action="logout.php">
		<input type="submit" value="Logout" >
	</form>
	<body>
</html>
<?php 
	}//from the if block at the beginning
	else {
		header("Location: index.php");
		exit();
	}
?><!--no soup for unathenticated users -->