<?php
	$dbloc = //
	$dbuser = //
	$dbpassword = //
	$dbname = //
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = //
		$queryresult = mysqli_query($dbconnection, $query);
		if(mysqli_num_rows($queryresult) === 1) {//identical operator
			echo "Correct!";
		}
		else {
			echo "Incorrect!";
		}
	}
	
?>