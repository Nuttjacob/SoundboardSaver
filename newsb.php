<!--Jacob Grover, 2/27/22
https://www.w3schools.com/sql/sql_distinct.asp
-->
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
		<script src="loadsounds.js"></script>
		<title>New Soundboard</title>
	</head>
	<body>
		<nav>
		<?php include "navbar.php" ?>
		</nav>
		<main>
			<h1>New Soundboard</h1>
			<?php 
				include 'dbcreds.php';
				$dbname = 'projectsounds';
				$dbconnection = mysqli_connect($dbloc, $dbuser, $dbpassword, $dbname);
				$totalcats = mysqli_query($dbconnection, "SELECT DISTINCT category FROM sounds;");//Gets all of the categories, should change this variable name
				$catnum = mysqli_num_rows($totalcats);
			?>
			<fieldset id="newsoundfield">
			<legend>Add an existing sound</legend>
			<label for="categories">Categories</label><!--The categories themselves are loaded by PHP, then JS gets the sounds for the given category with more PHP-->
			<select id="categories">
				<?php
				for($catite=0;$catite<=$catnum;$catite++) {
					$catrow = mysqli_fetch_assoc($totalcats);//PHP has a "cursor" that goes along the query rows
					$opvalue = $catrow['category'];
					echo "<option value='{$opvalue}'>{$opvalue}</option>";
				}
				?>
			</select>
			<label for="sounds">Sounds</label>
			<!--JS inserts the sounds for the category here -->
			<select id="sounds">
			</select>
			<button type="button" id="playsoundsel">Play</button>
			<button type="button" id="stopsoundsel">Stop</button>
			<button type="button" id="addsoundbutton">Add</button>
			</fieldset>
		</main>
	</body>
</html>
<?php 
	}//from the if block at the beginning
	else {
		header("Location: index.php");
		exit();
	}
?><!--no soup for unathenticated users -->