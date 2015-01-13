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
echo "aaaaaaaaaaa";
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$nameproject=$_POST['nameproject'];
$keywords=$_POST['keywords'];
$urls=$_POST['urls'];
$bl1=$_POST['bl1'];
$bl2=$_POST['bl2'];
$bl3=$_POST['bl3'];
$gplus1=$_POST['gplus1'];
$gplus2=$_POST['gplus2'];
$gplus3=$_POST['gplus3'];
$fanpage=$_POST['fanpage'];
$clicks=$_POST['clicks'];
$daily=$_POST['daily'];
$cpc=$_POST['cpc'];
$id = getIdMax("fs_setting","setting_id") + 1;
// echo "insert into fs_setting (setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc) values (".$id.",'".$_SESSION['session-user']."','".$nameproject."','".$keywords."','".$urls."','".$bl1."','".$bl2."','".$bl3."','".$gplus1."','".$gplus2."','".$gplus3."','".$fanpage."',$clicks,$daily,$cpc)";
mysqli_query($con,"insert into fs_setting (setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc) values ($id,'".$_SESSION['session-user']."','".$nameproject."','".$keywords."','".$urls."','".$bl1."','".$bl2."','".$bl3."','".$gplus1."','".$gplus2."','".$gplus3."','".$fanpage."',$clicks,$daily,$cpc)");
// mysqli_close($con);
//fs_setting:: setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc
				
?>