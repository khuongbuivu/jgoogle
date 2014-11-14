<?php 
echo date("s");
echo MD5("AA");
$dm = date("d/m"); 
$s= date("s");
$shortDay= str_replace("/","",$date);
$User1=intval($_SESSION['session-user']) * intval($shortDay);
$strtoken=$_SESSION['session-user'].$shortDay.$User1.$s;
$token = MD5($strtoken);
?>