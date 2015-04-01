<?php
if(!isset($_SESSION)){
    session_start();
}
	include("../config.php");
	include_once("../user.php");
	include_once("../system/function.php");
	function checkNotify()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser=$_POST['idUser'];
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result_notify=mysqli_query($con,"select check_notify_id_comment  from fs_check_notify where  check_notify_id_user=".$idUser);
		
		if($result_notify->num_rows >0)
		{
			$row_notify = mysqli_fetch_array($result_notify);
			$idLastCommentNotify = $row_notify['check_notify_id_comment'];
		}else
			$idLastCommentNotify=0;	
		$result=mysqli_query($con,"select * from atw_notify where notify_user_id =".$idUser."  and notify_id_comment > ".$idLastCommentNotify );
		if($result->num_rows >0)
		{
			echo $result->num_rows;
		}
		else
			echo 0;
		mysqli_close($con);
	}
	
	function getNumMessage()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser=$_POST['idUser'];
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result_notify=mysqli_query($con,"select check_ms_id_post  from fs_check_message where  check_ms_id_user=".$idUser);
		
		if($result_notify->num_rows >0)
		{
			$row_notify = mysqli_fetch_array($result_notify);
			$idLastCommentNotify = $row_notify['check_ms_id_post'];
		}else
			$idLastCommentNotify=0;	
		$result=mysqli_query($con,"select * from fs_message where message_user_id =".$idUser."  and message_id_post > ".$idLastCommentNotify );
		if($result->num_rows >0)
		{
			echo $result->num_rows;
		}
		else
			echo 0;
		mysqli_close($con);
	}
	
	function getNumAnalytics()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		//return all view in a day
		// get All Post of User A in today
		// statastic click of All Post
		// $idUser=$_POST['idUser'];
		$idUser = $_SESSION['session-user'];
		$con=mysqli_connect($host,$user,$pass,$db);	
		mysqli_set_charset($con, "utf8");		
		$currentDay = date("Y-m-d");
		$rsAllPostUser=mysqli_query($con,"select post_full_url   from atw_post where  post_iduser=".$idUser." order by post_id desc limit 50");	
		$link = "";
		if($rsAllPostUser->num_rows >0)
		{
			$row = mysqli_fetch_array($rsAllPostUser);
			$link = $row['post_full_url'];
		}	
		while($row = mysqli_fetch_array($rsAllPostUser))
		{
			$link = $link."····".$row['post_full_url']; 
		}
		$countView=0;
		$currentDay = date("d/m/y");
		$urls=split("····",$link);	
		$urls=array_unique($urls);
		for ($ii=0;$ii<count($urls);$ii++)
		{
			$urls[$ii]=rtrim($urls[$ii], "/");
			$jjj=$ii + 1;
			$q='link =\''.$urls[$ii].'\'';
			$result=mysqli_query($con,'select * from atw_click_link where ( '.$q.' ) and timestart like "%'.$currentDay.'%" order by id desc');		
			$countView = $countView + $result->num_rows;
		}
		echo $countView;
		mysqli_close($con);
	}
	
	function displayAnalytics()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		//return all view in a day
		$idUser = $_SESSION['session-user'];
		// get All Post of User A in today
		// statastic click of All Post
		$con=mysqli_connect($host,$user,$pass,$db);	
		mysqli_set_charset($con, "utf8");
		$currentDay = date("Y-m-d");
		$rsAllPostUser=mysqli_query($con,"select post_full_url   from atw_post where  post_iduser=".$idUser." order by post_id desc limit 50");	
		$link = "";
		if($rsAllPostUser->num_rows >0)
		{
			$row = mysqli_fetch_array($rsAllPostUser);
			$link = $row['post_full_url'];
		}	
		while($row = mysqli_fetch_array($rsAllPostUser))
		{
			$link = $link."····".$row['post_full_url']; 
		}
		$currentDay = date("d/m/y");
		$urls=split("····",$link);	
		$urls=array_unique($urls);
		for ($ii=0;$ii<count($urls);$ii++)
		{
		
			$urls[$ii]=rtrim($urls[$ii], "/");
			$jjj=$ii + 1;
			if($urls[$ii]!="")
			{
				$q='link =\''.$urls[$ii].'\'';
				$result=mysqli_query($con,'select * from atw_click_link where ( '.$q.' ) and timestart like "%'.$currentDay.'%" order by id desc');		
				if (strlen($urls[$ii])>60)
					$urls[$ii] = substr($urls[$ii],0,60)."...";			
				echo '<li class="fbProfileBrowserListItemTitle"><div style="float:left;width:78%">Link: '.$urls[$ii]. '</div><div style="float:right;right:0;width:15%"> :: view: '.$result->num_rows.'</div>
				<div style="clear:both"></div>
				</li>';
				if ($result->num_rows>0){
				
					while ($row = mysqli_fetch_array($result))
					{
						echo '<li class="fbProfileBrowserListItem">';
							echo '<div class="clearfix">';
								echo "<a href='javascript: openLinkMenu(\"".$PATH_ROOT."profile.php?iduser=".$row[2]."\")' class='_8o _8t lfloat'>";
								echo '<img src="https://graph.facebook.com/'.$row[2].'/picture">';
								echo '</a>';
								$userinfo=getUserInfo($row[2]);
								//print_r($userinfo);
								echo '<div class="clearfix _42ef">';
									echo '<div class="_6a rfloat">';
									echo '</div>';
									echo '<div class="uiProfileBlockContent">';
										echo '<div class="_6a _6b">';
											echo '<div class="fsl fwb fcb">';
												echo "<a href='javascript: openLinkMenu(\"".$PATH_ROOT."profile.php?iduser=".$row[2]."\")'>".$userinfo[user_name]. "</a>";
											echo '</div>';
											echo " Start : ".$row[3]."<BR/>";
											$strTime = substr($row[3], 0, 8);
											$t1 = strtotime($strTime);
											$date = date("H:i:s");
											$currentTime=time($date);
											$view = $currentTime-$t1;
											if($row[4]=='In view')
											{
												if ($view>620)
													echo " Closed:<b style='color:red'>Đang view không được F5, rớt mạng.</b><br/>";
												else
													echo " Closed:<img title='Đang view' src='images/loading-google-smaill.gif' /><br/>";
											}
											else
												echo " Closed: ".$row[4]."<BR/>";
											if ($row[5]==0)
											{
												if ($view>620)
													echo " Bạn không được + điểm khi phạm luật view";
												else
													echo " Timeview: ".$view." giây"."<br/>";
											}
											else
											{
												if (intval($row[5])>300)
												{
													$minuteView = intval($row[5])/60 ; 
													$pointadd= $minuteView > 10 ? 10 : $minuteView  ;
													echo " Timeview: ".$row[5]." giây + ".(int)($pointadd)."  điểm ( cộng tối đa 10đ cho mỗi lượt view).<BR/>";							
												}
												else
													echo " Timeview: ".$row[5]." giây < 300 giây =>  Bạn không được cộng điểm<BR/>";							
											}
											if ($row[9]!="")
											{
												$listkeys = split("··",$row[8]);
												$listIdLinks = split("··",$row[9]);
												for ($ibl=0;$ibl<count($listIdLinks);$ibl++)
												{
													if ($listkeys[$ibl]!="")
													{
														$info = getInfoBacklink($listIdLinks[$ibl],$listkeys[$ibl]);
														displayBacklinkViewed($info);
													}
												}
											}
										echo '</div>';
									echo '<div>';
								echo '</div>';
							echo '</div>';
						echo '</li>'	;		
					}
				}
				else 
				{
					echo "<h2>";
					echo 'Chưa có mem nào click giúp bạn hôm nay'."<br>";
					echo "</h2>";
				}
			}
		}
		mysqli_close($con);
	}
?>



