<?php
	//Jacob Grover 2/27/22
	//This loads sounds from a category to be put as options in the select list(when creating a new soundboard) using AJAX
	include 'dbcreds.php';
	$dbname = "projectsounds";
	$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);
	$category = $_GET["category"];
	$query = "SELECT * FROM sounds WHERE category = '{$category}'";
	$queryresult = mysqli_query($dbconnection, $query);
	$soundnum = mysqli_num_rows($queryresult);
	for($soundite=0;$soundite<=$soundnum;$soundite++) {//This should be "lined up" with the query so there wont be an index errors
		$soundrow = mysqli_fetch_assoc($queryresult);
		echo "<option value='{$soundrow['soundname']}'>{$soundrow['soundname']}</option>";
	}
	

?>