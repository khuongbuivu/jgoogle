<?php
if(!isset($_SESSION)){
    session_start();
}
/*
require_once('../definelocal.php');
require_once('../system/function.php');
require_once('../config.php');
require_once('../user.php');
*/
require_once('../hrb7yfq5yr40.php');
require_once('../system/6dxzm0g3bd57.php');
require_once('../wn3z74w1oe32.php');
require_once('../d5w8vn0faf138.php');

global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$q=mysqli_query($con,"select * from atw_user");
$f='us'.'er'.'_a'.'tv';
$i=0;
while ($row = mysqli_fetch_array($q))
{
	$idUser=$row['user_id'];
	$at=md5($idUser.'0');
	if ($at==$row[$f])
	{
		$i=$i+1;
		
		$at1=md5($idUser.'1');
		// if ($row['user_email']!="")
		// {
			// echo $row['user_email'].",<br/>";
		// }
		echo "<a href='".$row['user_link']."' target='_blank'>".$row['user_link']."</a> ". $row['user_email'].",<br/>";
		// echo "<a href='".$row['user_link']."' target='_blank'>".$row['user_link']."</a>,<br/>";
	}
}
echo "<br/>".$i."<br/>";
mysqli_close($con);
?>