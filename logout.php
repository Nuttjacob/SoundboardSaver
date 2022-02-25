<?php
	//This boilerplate code is verbatim from https://www.simplilearn.com/tutorials/php-tutorial/php-login-form, no need to reinvent the wheel
	session_start();
	session_unset();
	session_destroy();
	header("Location: index.php");
?>