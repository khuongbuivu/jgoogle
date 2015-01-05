<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../config.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
mysqli_query($con,"insert into fs_setting (setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc) values (1,'100001707050712', 'Giải Pháp Thương Hiệu','Dịch Vụ Seo','http://giaiphapthuonghieu.vn/dich-vu-seo-website-top-google/','http://www.giaiphapthuonghieu.org/','http://bang-gia-seo-website.blogspot.com/','http://www.giaiphapthuonghieu.net/2014/08/viec-lam-them-cho-sinh-vien-xhnv-tai-hcm.html','https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ','https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ','https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ','http://facebook.com/faceseo.vn', 5000,100,10)");
mysqli_close($con);
//fs_setting:: setting_id,setting_uid,setting_projectname,setting_keywords,setting_linkseo,setting_linkbl1,setting_linkbl2,setting_linkbl3,setting_linkg1,setting_linkg2,setting_linkg3,setting_linkfb1,setting_totalclick,setting_dailyclick,setting_cpc
				
?>