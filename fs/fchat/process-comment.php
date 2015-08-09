<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);
$useractive=$_SESSION['useractive'];

if($_SESSION['useractive']['vp']<10){
require_once('classdatarieng.php');
$facechat2=new faceseochatrieng();
$comment=$_POST['cmt_content'];
$vp=$_POST['vp'];
$error='';
$co=0;
if($vp!=''){
	 $co=1;
	//$date = date_create();
    //$timestamp=date_timestamp_get($date);
$conreport=mysqli_connect("localhost","root","","chatreport") or die("Không kết nối được");
mysqli_set_charset($conreport, "utf8");	

    //$query='select id,lanvp from reportuser where iduser="'.$useractive['id'].'" limit 0,1';
  // $data=mysqli_query($conreport,$query);
  // $row=mysqli_fetch_row($data);
   if($useractive['vp']>0){  
  
    $lanvp=(int)$useractive['vp']+1; 
	$_SESSION['useractive']['vp']=$lanvp;
	
   if($lanvp>10)$cam=1;
   else $cam=0;
	   $query="UPDATE reportuser SET lanvp = '".$lanvp."',trangthaichat='".$cam."' WHERE iduser = '".$useractive['id']."'";
	  
	   
   }else{
	    $query="INSERT INTO reportuser (id, iduser, user_name, giovipham, timeonline, lanvp, trangthaichat) VALUES (NULL, '".$useractive['id']."', '".$useractive['username']."', '".date('Y-m-d H:i:s')."', '".$timestamp."', '1', '0');";
   }
  
   $data=mysqli_query($conreport,$query);
   mysqli_close($conreport);


}
function tru($string)
	{
	$tach='Vietnam,Ỉa,đái,đụ,đéo,cặc,lồn,cức,địt,Giái,Đĩ,Điếm,Vú,Fuck,Damm,Ass,Penis,Sex,Anal';	
	$str = $string;
	$tach=explode(',',$tach);
	 for($i=0;$i<count($tach);$i++){
		//$trans[$tach[$i]] ='***' ;
		//$str = preg_replace('%'.$tach[$i].'%', '***', $str);
		$pattern = preg_quote($tach[$i]);
          $str  = preg_replace("/($pattern)/i",'***', $str);
		}
		//$str = strtr($str, $trans);
	return $str;
	}

$kind=$_POST['kind'];
if($kind=='img')$comment="<img src='".$comment."'/>";
$userid=preg_replace('/usern_/', '',$_POST['userid']);
if($useractive['id']!=$userid){
$content="<div title='".date('H:i')."'>".$comment.'</div>';
$array=array('msg'=>$content,'date'=>date('d-m'),'timechat'=>date('H:i'),'un'=>$useractive['username'],'timestamp'=>$timestamp,'thumb'=>'','giochat'=>date('h:i A'),'errorvp'=>$lanvp,'co'=>$co);
$array_ins=array('iduser1'=>$useractive['id'],'iduser2'=>$userid,'msg'=>$comment,'timestamp'=>$timestamp,'time_chat'=>date('Y-m-d H:i:s'),'giochat'=>date('h:i A'),'username2'=>$_POST['username2']);
$facechat2->inserdata($array_ins);
echo json_encode($array);
}
}else{
	$array=array('msg'=>'','date'=>date('d-m'),'timechat'=>date('H:i'),'un'=>$useractive['username'],'timestamp'=>$timestamp,'thumb'=>'','giochat'=>date('h:i A'),'errorvp'=>'-1');
	echo json_encode($array);
	
}

?>