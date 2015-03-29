<?php
if(!isset($_SESSION)){
    session_start();
}
include("time.php");
include_once("fcomment.php");
/*
if (!isset($_SESSION['token'], $_SESSION['token-user'],$_POST['token-cmt']) || checkToken($_POST['token-cmt'])==false)
{
	exit();
}
else 
*/
saveComment();

?>