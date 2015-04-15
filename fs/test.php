<meta charset="UTF-8">
<?php
$match="http://giaiphapthuonghieu.vn";
$match1 =$match;
echo "aaa".strpos($match,"www");
echo "bbb".strpos($match,"www");
if(strpos($match,"www")!="")
	echo "Khac rong"; 
if(strpos($match,"www")!=null)
	echo "Khac null";
$isw=strpos($match,"www");
if ($isw!== false && strpos($match,"www")==0)
	$match1 ="http://".$match;
echo $match1;
?>