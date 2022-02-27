<?php
//Jacob Grover, 2/26/22
//This is a script to load the default bank of sounds into the server database for the first time, parts are from test.php
//https://www.php.net/manual/en/function.scandir.php
	include 'dbcreds.php';
	$dbname = "projectsounds";
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);
	$sounds = glob("sounds/*/*.{mp3,wav}", GLOB_BRACE);
	$soundnum = count($sounds);
	for($soundite=1;$soundite<$soundnum;$soundite++) {
		echo $soundite;
		if(strpos($sounds[$soundite], ".mp3") != false){
			$name = basename($sounds[$soundite], ".mp3");
			
		}
		if(strpos($sounds[$soundite], ".wav") != false){
			$name = basename($sounds[$soundite], ".wav");
		}
		$category = str_replace("sounds/", "", dirname($sounds[$soundite], 1));
		echo "<br>";
		$query = "INSERT INTO sounds (soundid, soundpath, category, public) VALUES ('{$soundite}', '{$name}', '{$category}', TRUE);";
		echo mysqli_query($dbconnection, $query);
	}
?>