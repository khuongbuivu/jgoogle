<?php
include_once("user.php");
echo '<div id="lista1" class="als-container"><div class="als-viewport">';
echo '<ul class="als-wrapper">';
global $host;
global $user;
global $pass;
global $db;	
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$result=mysqli_query($con,'select * from fs_newlogin limit 1,50');	
while ($row = mysqli_fetch_array($result))
{
	// $leveluser=getLevelUser($row['newlogin_uid'],$row['user_time_join']);
	// if ($leveluser==0)
		// echo '<li class="als-item"><a href="https://www.facebook.com/profile.php?id='.$row['newlogin_uid'].'"><img src="https://graph.facebook.com/'.$row['newlogin_uid'].'/picture?width=70&height=70" alt="'.$row['newlogin_username'].'" title="'.$row['newlogin_username'].'" height="50px"/></a><div style="position:absolute; top: -3px;left:-4px"><img src="images/css/new.png"></div></li>';
	// else
	echo '<li class="als-item"><a href="https://www.facebook.com/profile.php?id='.$row['newlogin_uid'].'"><img src="https://graph.facebook.com/'.$row['newlogin_uid'].'/picture?width=70&height=70" alt="'.$row['newlogin_username'].'" title="'.$row['newlogin_username'].'" height="50px" /></a></li>';
}					
echo '</ul>';
echo '</div></div>';
?>