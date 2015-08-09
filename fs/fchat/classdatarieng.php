<?php 
class faceseochatrieng{
 
 function getmsg10($id1,$id2,$timese,&$mang=array(),$so){
	//global $con;
$conuser=mysqli_connect("localhost","root","","chatuser") or die("Không kết nối được");
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
 function getmsg102($id1,$id2,$timese,&$mang=array(),$so){
	global $conuser;
	
   $datas=array();
   $query='select * from chattext where timestamp >='.$timese.' and (iduser1='.$id1.' and iduser2='.$id2.' ) or (iduser1='.$id2.' and iduser2='.$id1.') order by id desc' ;
   $data=mysqli_query($conuser,$query);
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
//mysqli_close($conuser);
   return true;
 }
 function getmsg10f($id1,$id2,$timese,&$mang=array(),$so){
	global $conuser;
	
   $datas=array();
   $query='select * from chattext where timestamp >='.$timese.' and (iduser1='.$id1.' and iduser2='.$id2.' ) or (iduser1='.$id2.' and iduser2='.$id1.') order by id desc' ;
   $data=mysqli_query($conuser,$query);
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
//mysqli_close($conuser);
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
   $conuser=mysqli_connect("localhost","root","","chatuser") or die("Không kết nối được");
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
	$conuser=mysqli_connect("localhost","root","","chatuser") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");
   $datas=array();
   $query='select * from chattext where ((iduser1='.$id1.' and iduser2='.$id2.') or (iduser1='.$id2.' and iduser2='.$id1.')) and timestamp < '.$timeint.' order by id desc limit 0,5' ;
 
   $data=mysqli_query($conuser,$query);
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
mysqli_close($conuser);
   return true;
 }
 function getmsg10ajaxgroup($id1,$id2,&$mang=array(),$timeint){
	$con=mysqli_connect("localhost","root","","chatgroup") or die("Không kết nối được");
	mysqli_set_charset($con, "utf8");
   $datas=array();
   $query='select c.* from chattext c where iduser2="group" and timestamp <= '.$timeint.' order by id desc limit 0,10' ;
   
   $data=mysqli_query($con,$query);
   $i=0;
    while($row=mysqli_fetch_array($data))
{   
		$datas['ib']=$id2;
		$datas['id']=$row['iduser1'];

		$thoigianchat=date('H:i A',$row['timestamp']);
	$datas['msg']='<div title="'.$thoigianchat.'">'.$row['msg'].'</div>';
	$datas['timestamp']=$row['timestamp'];
	$datas['time_chat']=$row['time_chat'];
	$datas['giochat']=$thoigianchat;
	$datas['username']=$row['username'];
	$mang[]=$datas;
	$i=$i+1;
} 
mysqli_close($con);
   return true;
 }
 
 function inserdata($array){
 if($array['iduser2']=='group'){
	 $con=mysqli_connect("localhost","root","","chatgroup") or die("Không kết nối được"); 
 }else{
	 $con=mysqli_connect("localhost","root","","chatuser") or die("Không kết nối được"); 
 }
 mysqli_set_charset($con, "utf8");

 	$sql='INSERT INTO chattext (id, iduser1, iduser2,username1,username2,msg, time_chat, timestamp,hit) VALUES (NULL, "'.$array['iduser1'].'", "'.$array['iduser2'].'","'.$_SESSION['useractive']['username'].'","'.$array['username2'].'","'.$array['msg'].'", "'.date('Y-m-d H:i:s').'", "'.$array['timestamp'].'","0");';
	mysqli_query($con,$sql);
	mysqli_close($con);
  return true;
 }
}
?>