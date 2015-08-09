<?php 
date_default_timezone_set('Asia/Bangkok');
$date = date_create();
$int=date_timestamp_get($date);
$array=array('timenows'=>$int);
echo json_encode($array);
?>