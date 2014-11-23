<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('../definelocal.php');
require_once('../system/function.php');
require_once('../config.php');
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idMaxPost = getIdMax("fs_message_content", "msct_id");
// $textcomment = $_GET['content'];
$textcomment = "TEST ADD MESSAGE";
$query_post="INSERT INTO fs_message_content (msct_id, msct_iduser, msct_content) VALUES (".$idMaxPost.", ".$_SESSION['session-user'].", '".$textcomment."' )";	
echo $query_post;
mysqli_query($con,$query_post);
mysqli_close($con);
/*
// At to post content
// At notify message
// Show only post ID
*/

?>