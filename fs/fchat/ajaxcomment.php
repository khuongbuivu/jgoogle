<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require_once('classdatarieng.php');
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);
$useractive=$_SESSION['useractive'];
$id=$_POST['id'];
$array_content['msgs']=array();
$fchat=new faceseochatrieng();
if($id!='group'){
$id=preg_replace('/usern_/', '',$id);
$fchat->getmsg4ajax($useractive['id'],$id,$array_content['msgs']);
}else if($id=='group'){
$timeint=$_POST['timeint'];	
if($timeint=='')$timeint=$timestamp;
$fchat->getmsg10ajaxgroup($useractive['id'],'group',$array_content['msgs'],$timeint);
	}
echo json_encode( $array_content);
?>