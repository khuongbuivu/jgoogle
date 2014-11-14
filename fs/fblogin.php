<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("define.php");
include_once('user.php');
?>
<?php if(LOCAL!="TRUE"): ?>	
<?php //print_r ($accountFace);  
							if ($accountFace): ?>
							<a href="<?php echo $logoutUrl; ?>">Logout</a>
							<?php else: ?>
							  <div> 
                                                              <?php if (isset($_GET['admin']) && $_GET['admin']==3 ){?>
                                                              <form name='dangnhap' action='' method='post'><input name='email' value=''/></br><input type="submit" value="Đăng nhập qua Email"/></form>
<?php }; ?>
								<a href="<?php echo $loginUrl; ?>" target="_blank"><img src="images/css/login-with-facebook.png" /></a>
							  </div>
							<?php endif ?>
							<?php //print_r($_SESSION); // $_SESSION?>
							<?php if ($accountFace): ?>      
							  <!-- <h3>Your User Object (/me)</h3> -->
							  <pre><?php //print_r($user_profile); ?></pre>
							  <?php $urlImgProfile="https://graph.facebook.com/$accountFace/picture";?>
							  <?php
									saveUser($user_profile);
							  ?>
							<?php else: ?>
							
							  <strong><em>Đăng nhập ngay.</em></strong>
							<?php endif ?>
					<?php else:?>
						<?php $urlImgProfile="https://graph.facebook.com/100001707050712/picture" ?>
					<?php endif ?>
					<?php  if ($id_user!=""){
						$_SESSION['token-user']=md5($id_user);
						$_SESSION['session-user']=$id_user;
						$_SESSION['session-name']=$user_profile[name];
						}
					?>
					<!-- end login facebook -->					
					<a tabindex="-1" href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxBlock _8o _8s lfloat">
					<?php if (trim($urlImgProfile)!=""){?>
					<img id="profile_pic_welcome_100001707050712" alt="" src="<?php echo $urlImgProfile;?>" class="_s0 fbxWelcomeBoxImg _rw img">
					<?php };?>
					
					</a>
					<?php if (trim($urlImgProfile)!=""){?>
					<div class="_42ef"><div class="_6a prs"><div style="height:40px" class="_6a _6b"></div><div class="_6a _6b">					
					<a href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxName"><?php echo $user_profile[name]; ?></a><a href="<?php echo $user_profile[link];?>?sk=info&amp;edit=eduwork&amp;ref=home_edit_profile" target="_blank">Edit Profile</a>					
					</div></div></div>
					<?php };?>
