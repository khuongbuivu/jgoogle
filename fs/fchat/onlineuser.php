<?php
$html=''; 
$m=array();	
$conuser=mysqli_connect("localhost","chatreport","faceseovn@","chatreport") or die("Không kết nối được");
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



foreach($datas as $user):
	
		$useridonline[]=$user['id'];
		$html.='<p><span class="icon-online"></span>';
		$html.='<img src="https://graph.facebook.com/'.$user['id'].'/picture">';
		$html.='<a class="usern" rel="ignore" data-username-show="'.$user['username'].'" role="" data-usern="usern_'.$user['id'].'" usern="usern_'.$user['id'].'">';
	   $html.=$user['username'].'</a></p>';
      endforeach;
echo json_encode($html);	

?>