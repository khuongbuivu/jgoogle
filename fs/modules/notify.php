<?php
//fix
	include_once("../definelocal.php");
	include_once("../config.php");
	include_once("../time.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	if (isset($_POST['idNotifyStart']))
	{
		$idNotifyStart=$_POST['idNotifyStart'];
		if ($idNotifyStart==0)
		{
		echo '<div style="position:absolute;top:110px;left:-12px;"><img src="http://localhost/'.DOMAIN.'/images/css/arrow-left.png"></div>';
		echo '<div class="notify has-scrollbar"><div class="overthrow content description" tabindex="0" style="right: -17px;">';
		}
		$idUser=$_POST['idUser'];
		//echo $idUser;
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result_notify=mysqli_query($con,"select * from atw_notify where notify_user_id=".$idUser." order by notify_id desc limit ".$idNotifyStart.", 10" );
		//echo "select * from notify where notify_user_id=".$idUser." order by notify_id desc limit ".$idNotifyStart.", 10" ;
		if($result_notify->num_rows>0)
		{
			echo "<ul>";
			while ($row = mysqli_fetch_array($result_notify))
			{	
				echo "<li>";
					echo '<a id="itemNotify" class="notifMainLink" href="javascript:scrolToComment('.$row['notify_id_post'].','.$row['notify_id_comment'].');" >';
					echo '<div class="clearfix notif_block" id="divItemNotify">';
					echo "<img src='".$row['notify_user_logo']."' class='lfloat _rw' />";
					echo '<div class="clearfix _8u _42ef">';
							echo '<div id="notify_'.$row['notify_id'].'_info divNotify3" class="info">';
								echo '<span class="blueName">'.$row['notify_user_name'].'</span>';
								echo $row['notify_content'];
							echo '</div>';
							
					echo '</div>';
					echo '<div style="position:absolute;bottom:0;right:10px;">';
							$timezone  = +7;
							$timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row['notify_time']);
							if ($row['notify_type']==0)
							{
								echo getTimeString($timeCurrent,$timeSaved);
								echo '   <img src="images/css/iconnotifylike.png" />';							
							}
							else
							{
								echo getTimeString($timeCurrent,$timeSaved);
								echo '   <img src="images/css/iconcommentnotify.gif" />';							
							}
					echo '</div>';
					
					echo '</div>';
					echo '</a>';
				echo "</li>";
				
			}
			echo "</ul>";
			if ($idNotifyStart==10)
				echo '</div></div>';
		}
		else
			echo "<div id='stop'></div>";

	}
?>