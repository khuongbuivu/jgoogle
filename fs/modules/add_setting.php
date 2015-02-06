<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
require_once("../system/function.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$nameproject=$_POST['nameproject'];
$keywords=$_POST['keywords'];
$urls=$_POST['urls'];
$bl1=$_POST['urls1'];
$bl2=$_POST['urls2'];
$bl3=$_POST['urls3'];
$gplus1=$_POST['urls4'];
$gplus2=$_POST['urls5'];
$gplus3=$_POST['urls6'];
$fanpage=$_POST['urls7'];
$clicks=$_POST['clicks'];
$daily=$_POST['daily'];
$cpc=$_POST['cpc'];
$id = getIdMax("fs_setting","setting_id") + 1;
// check exist in data
$result=mysqli_query($con,"select * from fs_setting where setting_uid=".$_SESSION['session-user']." order by setting_id desc limit 1");
if ($result->num_rows>0)
{
	mysqli_query($con,"Update fs_setting set setting_projectname='".$nameproject."', setting_keywords='".$keywords."',setting_linkseo='".$urls."',setting_linkbl1='".$bl1."',setting_linkbl2='".$bl2."',setting_linkbl3='".$bl3."',setting_linkg1='".$gplus1."',setting_linkg2='".$gplus2."',setting_linkg3='".$gplus3."',setting_linkfb1='".$fanpage."',setting_totalclick=".$clicks.",setting_dailyclick=".$daily.",setting_cpc=".$cpc." where setting_uid=".$_SESSION['session-user']);
}
else
	mysqli_query($con,"insert into fs_setting (setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc) values ($id,'".$_SESSION['session-user']."','".$nameproject."','".$keywords."','".$urls."','".$bl1."','".$bl2."','".$bl3."','".$gplus1."','".$gplus2."','".$gplus3."','".$fanpage."',$clicks,$daily,$cpc)");
mysqli_close($con);
//fs_setting:: setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc
				
?>