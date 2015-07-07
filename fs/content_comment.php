<?php
//fix
	include_once("definelocal.php");
	include_once("define.php");
	include_once("time.php");
	include_once("config.php");
	include_once("fcomment.php");
	include_once("user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	global $idCommentNotify;
	//echo $idCommentNotify;
	if (isset($_POST['numCmtDisplay'])&& $_POST['numCmtDisplay']=="FULL")
	{
		$numCmtDisplay=999;
	}
	else if (isset($_POST['numCmtDisplay']))
	{
		$numCmtDisplay=$_POST['numCmtDisplay'];
	}
	if(isset($_POST['idArt']))
	{
		$id = $_POST['idArt'];
	}
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	if($idCommentNotify==-1)
		$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=$id ORDER BY Id DESC " );
	else
		$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=$id ORDER BY Id DESC " );
	$numCmtOfArticle =  $result->num_rows;
	//echo $numCmtOfArticle;
	?>
	<?php $i=-1; while( ($row = mysqli_fetch_array($result)) ){  $i++;
			if ($i<$numCmtDisplay && ($row['Id']>=($idCommentNotify))){
			$infosUser=getUserInfo($row['userId']);
			?>
			<li class="UFIRow UFIComment UFILastComment UFILastCommentComponent commentid<?php echo $row['Id'];?>" >
				<div  class="clearfix">
				<div class="lfloat">
					<a  class="img _8o _8s UFIImageBlockImage" aria-hidden="true" tabindex="-1"  href="<?php echo $row['imgLogo'];?>">
						<img class="img UFIActorImage _rx" src="<?php echo $row['imgLogo']?>" />
					</a>
				</div>
				<div >
				<div class="clearfix UFIImageBlockContent _42ef">
					<div class="rfloat">
						<a class="uiCloseButton UFICommentCloseButton" data-tooltip-alignh="center" data-hover="tooltip" aria-label="Hide as Spam" role="button" href="#" aria-owns="js_2" aria-controls="js_2" aria-haspopup="true"></a>
					</div>
					<div ><div >
						<div class="UFICommentContent">	
							<a  class="UFICommentActorName"  content="Linh Nguyen" href="<?php echo $infosUser['user_link'];?>" title="<?php echo $row['name'].' :: '.$infosUser['user_point'].' điểm';?>" target="_blank"><?php echo $row['name'];?>
							</a>
							<span > </span><span ><span class="UFICommentBody"><span ><?php echo $row['Content'];?> </span></span></span>
						</div><div class="UFICommentActions fsm fwn fcg">
						<span ><span ></span><a class="uiLinkSubtle" href=""><abbr  class="livetimestamp" content="a few seconds ago" title="<?php echo date("h:i:s d-m-Y",$row['Time']);?>"><?php $timezone  = +7; /*(GMT +7:00)*/; $timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row['Time']); echo getTimeString($timeCurrent,$timeSaved);?></abbr></a>
						<?php $url=getListUrl($row['Content']);
						$titleStastic='Thống kê Click';
						$classtitlePopup='titlepopup';
						?>
						<?php if (count($url)>0 && !checkUrlImage($url[0])){?> · <span ><a href="#" onclick="TINY.box.show({url:'statist_click.php?link=<?php echo $url[0]; ?>',width:500,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo $url[0]; ?>'), 5000); return false;" >ViewClicked</a></span>
						<?php } 					
						?>
						</span>					
						<span > · </span>
						<div class="statuslike" id="statuslike<?php echo $row['Id']; ?>"><a  class="UFILikeLink" id="likeCmt<?php echo $row['Id']; ?>" title="Like this comment" >
						<?php 						
								$result_like=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row['Id']);
								$result_mylike=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row['Id']. " and idUser=".$id_user);
								//echo "select * from atw_like_cmt where idCmt=".$row['Id']. " and idUser=".$id_user;
								$num_like = $result_like->num_rows;
								$num_mylike = $result_mylike->num_rows;
								//echo "ID user $id_user +  $num_mylike ";
								if($num_like!=0 & $num_mylike>0)
									echo 'Unlike<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'.$row['Id'].'">'.$num_like.'</span>';	
								else if ($num_like!=0 & ($num_mylike==0 || $num_mylike==""))
									echo 'Like<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'.$row['Id'].'">'.$num_like.'</span>';	
								else
									echo "Like";
								if($i==0) // fix wrong id last comment
								$lastCmtId=$row['Id'];
						?>
						</a></div>
						</div></div>
					</div>
				</div>
				</div>
				</div>
			</li>
			
	<?php } else break; } ?>
			
			<?php 
			if (!(isset($_POST['numCmtDisplay'])&& $_POST['numCmtDisplay']=="FULL")&&$numCmtOfArticle>$numCmtDisplay):
			?>
			<li class="UFIRow UFIPagerRow UFIFirstCommentComponent" data-ft="{&quot;tn&quot;:&quot;Q&quot;}"><div class="clearfix"><div class="lfloat"><a class="img _8o _8r UFIImageBlockImage UFIPagerIcon" aria-hidden="true" tabindex="-1" role="button" href="#"></a></div><div ><div class="clearfix UFIImageBlockContent _42ef _8u"><div class="rfloat"><span class="fcg"></span></div><div ><a class="UFIPagerLink" role="button" href="javascript:showAllComment(root_path + 'content_comment.php',<?php echo $id; ?>);"><span >View <?php echo $numCmtOfArticle - $numCmtDisplay ;?> more comments</span></a></div></div></div></div>
			<?php endif ?>	