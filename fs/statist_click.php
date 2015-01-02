<?php
// Keke
	include("config.php");
	include_once("user.php");
	include_once("system/function.php");
	$BACKLINK=5;
	function statistClick()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		if (isset($_GET['link']))
		{
			$link	=	$_GET['link'];
		}
		else 
		{
			$link	=	$_POST['link'];
			
		}
		$link=rtrim($link, "/");
		$urls=split("····",$link);		
		//echo $link;		
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$currentDay = date("d/m/y");
		echo '<ul class="uiList clearfix _5bbv _4kg _704 _4ks">';
		for ($ii=0;$ii<count($urls);$ii++)
		{			
			$urls[$ii]=rtrim($urls[$ii], " ");
			$urls[$ii]=rtrim($urls[$ii], "/");
			$jjj=$ii + 1;
			$q='link =\''.$urls[$ii].'\'';
			$result=mysqli_query($con,'select * from atw_click_link where ( '.$q.' ) and timestart like "%'.$currentDay.'%" order by id desc');		
			echo '<li class="fbProfileBrowserListItemTitle">Link '.$jjj  . " :: view: ".$result->num_rows.'</li>';
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
		echo "</ul>";
		mysqli_close($con);
	}
	echo "<div class='contentpopup'>";
	statistClick();
	echo "</div>";
	
	
// loi dong 118 khong hien thi diem cong dung.
?>