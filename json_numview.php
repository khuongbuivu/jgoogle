<?php
	include_once("../definelocal.php");
	include_once("../define.php");
	include_once("../time.php");
	include_once("../config.php");
	include_once("../fcomment.php");
	include_once("../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$link=$_POST['link'];
	echo getNumView($link);
?>