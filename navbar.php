<?php
	$username = $_SESSION['username'];
	echo "
	<div id='usernav'>
		<a href=''>{$username}</a>
		<div id='userops'>
			<a href=''>Settings</a>
			<a href='logout.php'>Logout</a>
		</div>
	</div>
	<a href=''>Your Soundboards</a>
	<a href=''>Browse</a>
	";
?>