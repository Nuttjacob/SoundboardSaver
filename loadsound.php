<?php
	//Jacob Grover, 3/1/22
	//This gets the actual location of the sound to be played as a sample(to add to new soundboard)
	include 'dbcreds.php';
	$dbname = 'projectsounds';
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);
	$soundid = $_GET["soundid"];
	$query = $query = "SELECT * FROM sounds WHERE soundid = '{$soundid}'";
	$queryresult = mysqli_query($dbconnection, $query);
	$soundrow = mysqli_fetch_assoc($queryresult);
	echo "<audio id='selsoundaudio'><source ";
	if(strpos($soundrow['soundpath'], ".mp3") != false) {//Give the proper MIME type for the file extension
		echo "type='audio/mp3' ";
	}
	else if(strpos($soundrow['soundpath'], ".wav") != false) {
		echo "type='audio/wav' ";
	}
	echo "src='{$soundrow['soundpath']}'></audio>";
	
?>