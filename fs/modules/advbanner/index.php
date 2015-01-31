<?php
if(!isset($_SESSION)){
    session_start();
}
	include_once("../../config.php");
	include_once("../../user.php");
	include_once("../../fcomment.php");
	function getBanner()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser			=	$_SESSION['session-user'];
		$infosUserLog=getUserInfo($idUser);
		$idBannerStart = intval($_POST['currentPageBanner'])*10;
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser group by banner_user_id order by point desc limit ".$idBannerStart.",10");	 //idBannerStart
		
		while ($row = mysqli_fetch_array($result))
		{   
		
		    if (!strpos($row['banner_img'], "faceseo.vn/images")==true){
								  if(LOCAL=="TRUE")$row['banner_img']='http://localhost/faceseo.vn/'.$row['banner_img'];
								  else $row['banner_img']='http://faceseo.vn/'.$row['banner_img'];
						}
		    
			echo '<div style="position:relative;" id="dbanner'.$row['banner_id'].'">';
			$infosUser=getUserInfo($row['banner_user_id']);
			if (strpos($row['banner_img'], "faceseo.vn/images")==true)
			{
				if (checkAvailableLinks($row['post_url'],$idUser))
					echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='max-width:100%' src='".$row['banner_img']."' /></a><br/>";		
				else
					echo "<img style='max-width:100%' src='".$row['banner_img']."' /><br/>";		
			}
			if ($row['banner_user_id']==$idUser || $infosUserLog['user_manager']>2)
				echo '<div class="delBannerById" onclick="return delBannerById('.$row['banner_id'].');">D</div>';
			echo "</div>";
							
							
		}
		mysqli_close($con);	
	}
	getBanner();
?>