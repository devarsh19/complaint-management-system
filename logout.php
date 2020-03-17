<?php
	//start a session
	session_start();
	echo "<script>alert('Are you sure you want to logout ?');</script>";
	//destroy the session for logout
	session_destroy();
	header('location:login.php')
?>	