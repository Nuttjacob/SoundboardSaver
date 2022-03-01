<?php
	session_start();
	if(isset($_SESSION['sessid']) && isset($_SESSION['username'])) {//Just starts the block
?><!--Users have to be authenticated with username and sessionid that was given by logincheck.php -->
	<html>
		<head>
			<?php 
			include "favicons.html"; 
			include "mainstyles.html";
			?>
			<title>Home</title>
		</head>
		<body>
		<nav>
			<?php include "navbar.php"; ?>
		</nav>
		<main>
			<h2>Your Saved Soundboards</h2>
			<a href="">Create a new soundboard</a>
		</main>
		<body>
	</html>
<?php 
	}//from the if block at the beginning
	else {
		header("Location: index.php");
		exit();
	}
?><!--no soup for unathenticated users -->