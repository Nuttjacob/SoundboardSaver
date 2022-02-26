<?php
//Jacob Grover, 2/26/22
//This is a script to load the default bank of sounds into the server database for the first time, parts are from test.php
//https://www.php.net/manual/en/function.scandir.php
	$sounds = glob("sounds/*/*.{mp3,wav}", GLOB_BRACE);
	$soundnum = count($sounds);
	$categories = scandir("sounds");//This would normally return the files in the directory too, but there are only folders right now
	include 'dbcreds.php';
	$dbname = "projectsounds";
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);
	
	for($soundite=1;$soundite<=$soundnum;$soundite++) {
	}
	
	
?>