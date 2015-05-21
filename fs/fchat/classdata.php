<?php 
$con=mysqli_connect("localhost","root","","faceseovn") or die("Không kết nối được");
mysqli_set_charset($con, "utf8");
class faceseochat{
 
 function getUsersOnline(){
	 $conuser=mysqli_connect("localhost","root","","tbl_chatreport") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");	
   $hourdate=date('Y-m-d H:i:s');
   $ti=strtotime($hourdate)-60; 
   $query='select iduser,user_name from useronline where timeonline>='.$ti.' limit 0,30';
  
   $data=mysqli_query($conuser,$query);
   $i=0;
   $datas=array();
  while($row=mysqli_fetch_array($data))
{ 
    
    $datas[$i]['id']=$row[0];
	$datas[$i]['username']=$row[1];
	$i=$i+1;
}
   mysqli_close($conuser);
  return $datas;
	 
 }
 function getUsers($ex=''){
	global $con;
   if($ex!='')$query='select user_id,user_name from atw_user where user_id not in('.$ex.')'.' limit 0,30';
   else $query='select user_id,user_name from atw_user'.' limit 0,30';
   $data=mysqli_query($con,$query);
   $i=0;
   $datas=array();
  while($row=mysqli_fetch_array($data))
{ 
    
    $datas[$i]['id']=$row[0];
	$datas[$i]['username']=$row[1];
	$i=$i+1;
}
   
  return $datas;
	 
 }
 function updatelistuser(&$useridonline){
	global $con;
	$html=''; 
	 $useractive=$_SESSION['useractive'];
	 $m=array();	
	 $useronline=$this->getUsersOnline();
foreach($useronline as $user):
	if($user['id']!=$useractive['id']){
		$useridonline[]=$user['id'];
		$html.='<p><span class="icon-online"></span>';
		$html.='<img src="https://graph.facebook.com/'.$user['id'].'/picture">';
		$html.='<a class="usern" rel="ignore" data-username-show="'.$user['username'].'" role="" data-usern="usern_'.$user['id'].'" usern="usern_'.$user['id'].'">';
	   $html.=$user['username'].'</a></p>';
	}
	
      endforeach;
	 return $html;
	 }
 function getUser($id){
	global $con;
   $query='select user_id,user_name from atw_user where user_id="'.$id.'"'.' limit 0,30';
   $data=mysqli_query($con,$query);
   $row=mysqli_fetch_row($data);
   $user=array();
   $user['id']=$row[0];
   $user['username']=$row[1];
   return $user;
 }
 function getUser2($userinfo){
	global $con;
   $query='select user_id,user_name from atw_user where user_id="'.$userinfo['id'].'"'.' limit 0,30';
   $data=mysqli_query($con,$query);
   $row=mysqli_fetch_row($data);
   $user=array();
   if($row[0]>1){  
   $user['id']=$row[0];
   $user['username']=$row[1];
   }else{
   $this->insertuser($userinfo);
   $user['id']=$userinfo['id'];
   $user['username']=$userinfo['name'];
   }
   $timelogin=$_SESSION['timelogin']+60;
   $hourstimeonline=date('Y-m-d H:i:s');
   $hientai=strtotime($hourstimeonline);
   if($_SESSION['timelogin']==0||$hientai>=$timelogin)$this->checkonline($user['id']);
   
   return $user;
 }
 function getmsg10($id1,$id2,$timese,&$mang=array(),$so){
	//global $con;
$conuser=mysqli_connect("localhost","root","","tbl_chatuser") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");	
   $datas=array();
   $query='select * from chattext where timestamp >='.$timese.' and (iduser1='.$id1.' and iduser2='.$id2.' ) or (iduser1='.$id2.' and iduser2='.$id1.') order by id desc' ;
   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
   
    //$u=$this->getUser($row['iduser1']);
	if($row['iduser1']==$id1){
		$datas['ib']=$row['iduser2'];
		$datas['id']='-1';
	}
	if($row['iduser2']==$id1){
		$datas['ib']=$row['iduser1'];
		$datas['id']=$so;
	}
	
	$thoigianchat=date('H:i',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['giochat']=$thoigianchat;

	$mang[]=$datas;
	$i=$i+1;
} 
mysqli_close($conuser);
   return true;
 }
  function getmsg10ajax($id1,$id2,&$mang=array()){
   global $con;
   $datas=array();
   $query='select * from chattext where (iduser1='.$id1.' and iduser2='.$id2.' ) or (iduser1='.$id2.' and iduser2='.$id1.') order by id asc limit 0,10' ;

   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
    $u=$this->getUser(@$row['iduser1']);
	
		$datas['ib']=$id2;
		$datas['id']=$row['iduser1'];

		$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$datas['giochat']=$thoigianchat;
	$mang[]=$datas;
	$i=$i+1;
} 
   return true;
 }
   function getmsg4ajax($id1,$id2,&$mang=array()){
   $conuser=mysqli_connect("localhost","root","","tbl_chatuser") or die("Không kết nối được");
   mysqli_set_charset($conuser, "utf8");	
   $datas=array();
   $query='select * from chattext where (iduser1='.$id1.' and iduser2='.$id2.' ) or (iduser1='.$id2.' and iduser2='.$id1.') order by id desc limit 0,4' ;

   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
   // $u=$this->getUser(@$row['iduser1']);
	
		$datas['ib']=$id2;
		$datas['id']=$row['iduser1'];

		$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$datas['giochat']=$thoigianchat;
	$mang[]=$datas;
	$i=$i+1;
} 
mysqli_close($conuser);
   return true;
 }
 function getmsg10ajaxuser($id1,$id2,&$mang=array(),$timeint){
	global $con;
   $datas=array();
   $query='select * from chattext where ((iduser1='.$id1.' and iduser2='.$id2.') or (iduser1='.$id2.' and iduser2='.$id1.')) and timestamp < '.$timeint.' order by id desc limit 0,1' ;
   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
    //$u=$this->getUser(@$row['iduser1']);
	
		$datas['ib']=$id2;
		$datas['id']=$row['iduser1'];

		$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$datas['giochat']=$thoigianchat;
	$mang[]=$datas;
	$i=$i+1;
} 
   return true;
 }
 function getmsg10ajaxgroup($id1,$id2,&$mang=array(),$timeint){
	global $con;
   $datas=array();
   $query='select c.*,u.user_name from chattext c,atw_user u where iduser2="group" and iduser1=u.user_id and timestamp < '.$timeint.' order by id desc limit 0,10' ;
   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
    //$u=$this->getUser(@$row['iduser1']);
	
		$datas['ib']=$id2;
		$datas['id']=$row['iduser1'];

		$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$datas['giochat']=$thoigianchat;
	$datas['username']=$row['user_name'];
	$mang[]=$datas;
	$i=$i+1;
} 
   return true;
 }
 function insertuser($userinfo){
	global $con;
	 $sql='INSERT INTO atw_user (user_id, user_name, user_link, user_username, user_gender, user_email, user_location, user_work_employer, user_work_position, user_work_description, user_status, user_manager, birthday, user_time_join, user_ip, user_pass, user_tpass, user_atv) VALUES ("'.$userinfo['id'].'", "'.$userinfo['name'].'", "'.$userinfo['name'].'", "'.$userinfo['gender'].'", "'.$userinfo['gender'].'", "t@thanh.com", "'.$userinfo['locale'].'", "nghề nghiệp", "vị trí", "miêu tả công việc", "1", "", "", "", "192.168.1.1", "46a73a4cb402c77c30f660dfb73a26e4", "46a73a4cb402c77c30f660dfb73a26e4", "0")';
	 mysqli_query($con,$sql);
    return true;
	 }
 function checkonline($userid){
	 $conuser=mysqli_connect("localhost","root","","tbl_chatreport") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");	
   $sql="SELECT id,timeonline FROM useronline WHERE iduser = '$userid' limit 0,1"; 
   $data=mysqli_query($conuser,$sql);
   $row=mysqli_fetch_row($data);
   $date=date('Y-m-d H:i:s');  
   if($row[0]>0){
	    $sql="UPDATE useronline SET timeonline = '".strtotime($date)."',gioonline='".date("Y-m-d H:i:s")."' WHERE iduser = '$userid'";
		mysqli_query($conuser,$sql);
   }else {
  	 $sql="INSERT INTO useronline (id, iduser,user_name,gioonline, timeonline) VALUES (NULL, '".$userid."', '".$_SESSION['useractive']['username']."','".date("Y-m-d H:i:s")."', '".strtotime($date)."')";
	 
	 mysqli_query($conuser,$sql);
 }
 mysqli_close($conuser);
	 return true;
	 }	 
	 
 function updateonline($userid){
	$conuser=mysqli_connect("localhost","root","","tbl_chatreport") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");
   $date=date('Y-m-d H:i:s');
   $thoigian=  strtotime($date);
   $sql="UPDATE useronline SET timeonline = '".$thoigian."',gioonline='".date("Y-m-d H:i:s")."' WHERE iduser = '$userid'";
		mysqli_query($conuser,$sql);
		 mysqli_close($conuser);
	 return true;
	 }	 
	 
 function inserdata($array){
 if($array['iduser2']=='group'){
	 $con=mysqli_connect("localhost","root","","tbl_chatgroup") or die("Không kết nối được"); 
 }else{
	 $con=mysqli_connect("localhost","root","","tbl_chatuser") or die("Không kết nối được"); 
 }
 mysqli_set_charset($con, "utf8");

 	$sql='INSERT INTO chattext (id, iduser1, iduser2,username,msg, time_chat, timestamp,hit) VALUES (NULL, "'.$array['iduser1'].'", "'.$array['iduser2'].'","'.$_SESSION['useractive']['username']. '","'.$array['msg'].'", "'.date('Y-m-d H:i:s').'", "'.$array['timestamp'].'","0");';
	mysqli_query($con,$sql);
	mysqli_close($con);
  return true;
 }
}
?>