<?php
//fix
	include_once("define.php");
	include_once("time.php");
	include_once("config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$id=$idPost;
	if (isset($_POST['numCmtDisplay'])&& $_POST['numCmtDisplay']=="FULL")
	{
		$numCmtDisplay=999;
	}
	else if (isset($_POST['numCmtDisplay']))
	{
		$numCmtDisplay=$_POST['numCmtDisplay'];
	}
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=$id ORDER BY Id DESC " );
	$numCmtOfArticle =  $result->num_rows;
	?>
	<div class="comment"><div class="cmt-function"></div>
			<div id="info" >
			<div id="idArt" class="idArt" ><?php echo $id ;?></div><div id="name" class="name"><?php echo $userFace; ?></div>
			<div id="imgLogo" class="imgLogo"><?php echo $linkLogoFace; ?></div>
			</div>
			<div><div id="" class="uiUfi UFIContainer">
			<ul class="UFIList-Cmt" id="UFIList-Cmt">
			<li  class="UFIRow UFIAddComment UFILastComponent" id="UFIList-Cmt-Input">
				<div class="clearfix UFIMentionsInputWrap"><div class="lfloat">
						<div class="img _8o _8r UFIImageBlockImage UFIReplyActorPhotoWrapper">
						<?php if (trim($linkLogoFace)!="https://graph.facebook.com//picture"){ ?>
							<img class="img UFIActorImage _rx" src="<?php echo $linkLogoFace ?>">
						<?php }?>
						</div></div>
				<div >
				<div class="UFIImageBlockContent _42ef _8u">
					<div >
						<div class="uiMentionsInput textBoxContainer ReactLegacyMentionsInput">
							<div  class="highlighter">
								<div >
									<span  class="highlighterContent hidden_elem"></span>
								</div>
							</div>
							<div class="uiTypeahead mentionsTypeahead">
								<div class="wrap-input">
									<input type="hidden" class="hiddenInput">
									<div  class="innerWrap">
										<div id="cmt-content">
										
										</div>
										<div id="addPhoto">
										<form action="saveimage.php" method="post" enctype="multipart/form-data" id="attachedimage">
										<input type="button" id="uploader<?php echo $idPost;?>" class="uploader">
										<script>
										var uploader = document.getElementById('uploader'+'<?php echo $idPost;?>');
										upclick(
										 {
										  element: uploader,
										  action: 'upload/uploadfile.php', 
										  onstart:
											function(filename)
											{
											  alert('Start upload: '+filename);
											},
										  oncomplete:
											function(response_data) 
											{
											  $("#imgSrc"+"<?php echo $idPost;?>").html("<img src='"+response_data+ "' />");
											}
										 });
										</script>
										</form>									
										</div>
										<div id="imgSrc<?php echo $idPost;?>"></div> 
									</div>
								</div>
							</div>
							<input type="hidden" class="mentionsHidden" value="">
							
						</div>
				</div>
				</div></div></div></li>
			<div class="comment-adv<?php echo $id ?>" id="comment-adv<?php echo $id ?>">
			<?php 
			include("content_comment.php");
			?>
			</div>
			</ul></div></div>
			<div class="text-comment">
				<div id="cmt_content">
					<div id="comment-content-1"></div>
					<div id="lastCommentPost<?php echo $idPost;?>" ><?php echo $lastCmtId; ?></div>
					<div id="num-like">Num Like</div>
					<div id="idComment<?php echo $idPost;?>"></div>
					<div id="notifyPost<?php echo $idPost;?>_content"></div>
					<div id=<?php echo "loadcmtfull".$id; ?>>
				</div>			
				<?php 
					if (isset($_POST['numCmtDisplay'])&& $_POST['numCmtDisplay']=="FULL")
						echo "yes"; 
					else 
						echo "no";
				?>
				</div>
			</div>
		</div>
	<?php
	mysqli_close($con);
?>