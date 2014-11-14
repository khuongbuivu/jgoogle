<?php
//fix
	include_once("../../config.php");
	include_once("../../user.php");
	include_once("../../fcomment.php");
	function getBanner()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser			=	$_POST['idUser'];
		$infosUser=getUserInfo($idUser);
		$idBannerStart = intval($_POST['currentPageBanner'])*10;
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser order by point desc limit ".$idBannerStart.",10");	 //idBannerStart
		while ($row = mysqli_fetch_array($result))
		{
			$infosUser=getUserInfo($row['banner_user_id']);
			if (strpos($row['banner_img'], "faceseo.vn/images")==true)
			{
				if (checkAvailableLinks($row['post_url'],$idUser))
					echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='max-width:100%' src='".$row['banner_img']."' /></a><br/>";		
				else
					echo "<img style='max-width:100%' src='".$row['banner_img']."' /><br/>";		
			}
							
							
		}
		mysqli_close($con);	
	}
	getBanner();
?>