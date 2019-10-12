<?php

session_start();
	session_unset();
	session_destroy();
	session_start();
	$_SESSION['logged_in'] = false;
	header("Location: /");
	exit();
?>