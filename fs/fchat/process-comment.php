<?php 
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);
require_once('classdata.php');
$useractive=$_SESSION['useractive'];
//$comment=tru($_POST['cmt_content']);
$comment=$_POST['cmt_content'];
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
$array=array('msg'=>$content,'date'=>date('d-m'),'timechat'=>date('H:i'),'un'=>$useractive['username'],'timestamp'=>$timestamp,'thumb'=>'','giochat'=>date('h:i A'));
$array_ins=array('iduser1'=>$useractive['id'],'iduser2'=>$userid,'msg'=>$comment,'timestamp'=>$timestamp,'time_chat'=>date('Y-m-d H:i:s'),'giochat'=>date('h:i A'));
faceseochat::inserdata($array_ins);
echo json_encode($array);
}

?>