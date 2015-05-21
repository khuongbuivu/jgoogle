<?php
$conuser=mysqli_connect("localhost","root","","tbl_chatuser") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");	
$timese=$_GET['t'];
 function getmsg102($id2,$timese,&$mang=array(),$so,&$manguser){
	 global $conuser;
   $datas=array();
   $query='select * from chattext where timestamp >='.$timese.' and (iduser1='.$id2.' or iduser2='.$id2.') order by id desc' ;
   $data=mysqli_query($conuser,$query);
   $i=0;
   $mangtam=array();
    while($row=mysqli_fetch_array($data))
{   
   
	 
	if($row['iduser1']==$id2){
		$datas['ib']=$row['iduser2'];
		$datas['id']='-1';
	  if(!in_array($row['iduser2'],$mangtam)){
		   $mangtam[]=$row['iduser2'];
		   $manguser[]=array('id'=>$row['iduser2'],'username'=>$row['username2'],'thumbimg'=>$row['iduser2']);  
	  }
		
	}
	if($row['iduser2']==$id2){
		$datas['ib']=$row['iduser1'];
		$datas['id']=$so;
		
		 if(!in_array($row['iduser1'],$mangtam)){
			 $mangtam[]=$row['iduser1'];
		   $manguser[]=array('id'=>$row['iduser1'],'username'=>$row['username1'],'thumbimg'=>$row['iduser1']);  
	  }
		
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
   
   return true;
 }
$html=''; 
$m=array();	
$query='select iduser1,username1,iduser2,username2 from chattext where timestamp>='.$timese.' group by iduser1';
$data=mysqli_query($conuser,$query);
   $i=0;
   $datas=array();
   $datastam=array();
  while($row=mysqli_fetch_array($data))
{   
    if(!in_array($row[0],$datastam)){
    $datas[$i]['id']=$row[0];
	$datas[$i]['username']=$row[1];
	$i=$i+1;
	}
}

$query='select iduser2,username2 from chattext where timestamp>='.$timese.' group by iduser2';
$data=mysqli_query($conuser,$query);
   $datas=array();
  while($row=mysqli_fetch_array($data))
{   
    if(!in_array($row[0],$datastam)){
    $datas[$i]['id']=$row[0];
	$datas[$i]['username']=$row[1];
	$i=$i+1;
	}
	
}
$so=0;
$array_content=array();
foreach($datas as $row):
	   
{    
    $iduseronline=$row['id'];
   // $array_content[$iduseronline]['users'][]=array('id'=>$row['id'],'username'=>$row['username'],'thumbimg'=>$row['id']);
	getmsg102($row['id'],$timese,$array_content[$iduseronline]['msgs'],$so,$array_content[$iduseronline]['users']);
	$so=$so+1;
	
}	
      endforeach;
mysqli_close($conuser);	  
echo json_encode($array_content);	

?>