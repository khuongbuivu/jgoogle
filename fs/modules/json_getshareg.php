<?php 
require_once("fs_socialcount.php");
$geturl=$_GET['url'];
echo get_share_count($geturl);
?>
