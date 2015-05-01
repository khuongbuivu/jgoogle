<?php
	//fix
	include_once("../definelocal.php");
	include_once("../define.php");
	include_once("../time.php");
	include_once("../config.php");
	include_once("../fcomment.php");
	include_once("../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idCurrentPost = $_POST['idCurrentPost'];
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and post_id >$idCurrentPost  and type_invalid=1 ORDER BY post_id DESC limit 1 " );
	$numPost =  $result_post->num_rows;
	while ($row = mysqli_fetch_array($result_post))
	{
		if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
		{
			$idPost= $row['post_id'];						
			$user_id= $row['post_iduser'];
			$infosUser=getUserInfo($user_id);
			echo '<div id="postcontent'.$idPost.'" style="width:540px" class="postcontent" >';
			echo '<div style="float:left; width:50px ; margin:0px">';
				echo "<img src='https://graph.facebook.com/".$user_id."/picture' />";
			echo '</div>';
			echo '<div style="float:right; width:452px; margin:0px">';
			if ($user_id == $id_user)						
				echo "<div style='width:452px; margin:0px'><b><a target='_blank' href='".$infosUser['user_link']."'>".$infosUser['user_name']."</a></b> :: <strong style='color:#008000'>".$infosUser['user_point']."</strong> điểm <a href='#' onclick='delPost(".$user_id.",".$idPost.");'> :: Xóa</a></div>";
			else
				echo "<div style='width:452px; margin:0px'><b><a target='_blank' href='".$infosUser['user_link']."'>".$infosUser['user_name']."</a></b> :: <strong style='color:#008000'>".$infosUser['user_point']."</strong> điểm</div>";
				
			echo "<div id='contenpost'>".$row['post_content']."</div>";
			if(trim ($row['post_image'])!="")
				echo "<div id='imgPost'>".$row['post_image']."</div>";
			if(trim($row['post_url'])!="")
			{
				echo "<div id='action'>";
				echo "<div id='titlePost'>";							
				echo "<a href=".$row['post_url']."  onclick=\"return openUrl(this.href);\" >".$row['post_title']."</a>"	;								
				//<a href='".$row['post_url']."' >".$row['post_title']."</a>";							
				echo "</div>";
				if(trim($row['post_full_url'])=="")
					$url=($row['post_url']);
				else 
					$url = $row['post_full_url'];
				$titleStastic='Thống kê Click hôm nay';
				$classtitlePopup='titlepopup';
				echo "<div style='height:80px;background-color:#D8DFEA'>";
					echo '<div style="float:left; width:100px;padding-right:10px; margin:4px 4px 4px 4px;height:70px;">';
					if (count($url)>0){
					?><b><span ><a href="#" onclick="TINY.box.show({url:'statist_click.php?link=<?php echo urlencode($url); ?>',width:500,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo urlencode($url); ?>'), 5000); return false;"  rel="ttipsy" title="Thống kê ai đang view cho bạn"><img src="images/css/view-icon.gif" width="25px"/></a></span></b> 									
					<?php
					echo getNumView(($url));
					echo '<iframe src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url='.$row['post_url'].'&amp;parent='.$row['post_url'].'" allowtransparency="true" frameborder="0" scrolling="no" title="+1" style="border: medium none; overflow: hidden; height: 30px; width: 100px;"></iframe>';
					?>
					</div>
					<div style="float:right; width:300px;padding-right:10px; margin:4px 4px 4px 4px;height:60px; overflow: hidden;">
					<iframe frameborder="0" style="border:none; " allowtransparency="true" src="http://www.facebook.com/plugins/like.php?href=<?php echo $row['post_url'];?>"></iframe>
					</div>
					<?php 
					//echo '<iframe scrolling="no" id="f5d7a6c12fc5aa" name="f1993637d3d9f4c" style="border: medium none; overflow: hidden; height: 20px; width: 120px;" title="Like this content on Facebook." class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=296894317070497&amp;locale=vi_VN&amp;sdk=joey&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D24%23cb%3Df15eb1210affe44%26origin%3Drelation%3Dparent.parent&amp;href='.$row['post_url'].'&amp;node_type=link&amp;width=140&amp;layout=button_count&amp;colorscheme=light&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe>';
					
					}
				echo '<div style=" clear: both;"></div>';
				echo "</div>";
				echo '</div>';
			}
			require("../comment.php");
			echo '</div>';
			echo '<div style=" clear: both;"></div>';
			echo '<ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul>';
			echo '</div>';
		}
	}
	mysqli_close($con);
	
?>
