<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
require_once("../user.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
if ($idUser>-1)
	echo "<a href='http://faceseo.vn/download1/adwords2.zip'>Download</a>";
else
	echo "Vui lòng <a href='http://faceseo.vn'>Đăng nhập</a>";