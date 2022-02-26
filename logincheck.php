<?php
	session_start();
	include 'dbcreds.php';
	$dbname = "project";
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * from projectlogin WHERE username='$username' AND password='$password'";
		$queryresult = mysqli_query($dbconnection, $query);
		if(mysqli_num_rows($queryresult) === 1) {//identical operator, should only return one row because credentials are unique
			$tablerow = mysqli_fetch_assoc($queryresult);//gives the table row back as an associative array, we need the variables for the user session
			if($tablerow['username'] === $username && $tablerow['password'] === $password) {
				$_SESSION['username'] = $tablerow['username'];
				$_SESSION['sessid'] = $tablerow['sessid'];
				header("Location: userhome.php");
			}
			else {
				header("Location: index.php?error=yes");
				exit();
			}
		}
		else {
			header("Location: index.php?error=yes");
			exit();
		}
	}
	else {
		header("Location: index.php?error=yes");
		exit();
	}
?>