<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");include_once("../time.php");include_once("../fcomment.php");$link=$_POST['link'];if (isset($_SESSION['token'], $_SESSION['token-user'],$_SESSION['ip'])){	if (checkAvailableLink($link,$_SESSION['session-user']))		echo 1;	else		echo 0;}else 	echo 0;?>