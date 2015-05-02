<?php 
require_once('classdata.php');
session_start();
$date = date_create();
$sb=$_POST['sb'];
$useractive=$_SESSION['useractive'];
 $array_content['users']=array();
if($useractive['id']>0){
$hourdate=date('Y-m-d H:i:s');
   $ti=strtotime($hourdate)-60; 
   $query='select user_id from atw_user,useronline where user_id=iduser and user_id <>'.$useractive['id'].' and  user_name LIKE "%'.$sb.'%" and timeonline>='.$ti;  
   $data=mysqli_query($con,$query);
   $i=0;
   $datas=array();
  while($row=mysqli_fetch_array($data))
{ 
       $online[]=$row['user_id'];
}



if($sb!=""){
$query='SELECT user_id,user_name FROM atw_user WHERE user_name LIKE "%'.$sb.'%"  and user_id<>'.$useractive['id'].' order by user_name';
}else{
$query='SELECT user_id,user_name FROM atw_user WHERE user_id<>'.$useractive['id'].' limit 0,30';
}
$data=mysqli_query($con,$query);
$so=0;
 while($row=mysqli_fetch_array($data))
{   
    if(in_array($row['user_id'],$online))$on='online';
	else $on='offline';  
    $array_content['users'][]=array('id'=>$row['user_id'],'user_username'=>$row['user_name'],'onoff'=>$on);
	
}


mysqli_close($con);
}
echo json_encode( $array_content);
?>