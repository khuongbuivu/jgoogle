<?php 
require_once("fs_socialcount.php");
$geturl=$_POST['url'];
// $geturl='https://plus.google.com/118322503677129379211/posts/KTdLbMd1HeZ';
echo get_share_count($geturl);
// save sesion G+. After close link. Check Session Again.
?>
