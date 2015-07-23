 <?php
	include_once("definelocal.php");
	include_once("config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser	=	$_SESSION['session-user'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);
	while ($row = mysqli_fetch_array($result))
	{
		$point = $row['point'];
	}
 ?>
 <ul class="icon-setting">
				 <li><span class="icon-set icon-home" onclick="return openLinkMenu('<?php echo $PATH_ROOT; ?>');"></span></li>
				<li>
				<span class="icon-set icon-view" id="fsAnaylyticsButton"></span><a class="jewelButton a-view"><span class="jewelCount" id="anaylyticsCountWrapper" ><span id="anaylyticsCountValue">99</span></span> </a>
				</li>				
				<li>
				<span class="icon-set icon-loa" id="fbNotificationsJewel"></span><a class="jewelButton icon-comment"><span class="jewelCount" id="notificationsCountWrapper" ><span id="notificationsCountValue">1</span></span> </a>				
				</li>				
				<li>
				<span class="icon-set icon-message" id="iconemailbutton"></span><a class="jewelButton icon-email"> <span class="jewelCount" id="emailCountWrapper" ><span id="iconemailCountValue">1</span></span> </a>
				</li>
				<li><span class="icon-set icon-gplus" onclick="return openLinkMenu('<?php echo $PATH_ROOT."index.php?idgroup=1"; ?>');"></span> </li>
				<li id="icon-firefox"><span class="icon-set icon-firefox" onclick="return openLinkMenu('http://giaiphapthuonghieu.vn/faceseo1.4.xpi');" title="Cài đặt Addon FS1.4 để clickkeywords được +50Đ"></span></li>
				<?php if ($point>$MINPOSTBANNER): ?>
				<li><span class="icon-set icon-upbanner" onclick="return openLinkMenu('<?php if(LOCAL==true ) echo "http://localhost/".DOMAIN."/modules/upload/banner.php"; else echo "http://".DOMAIN."/modules/upload/banner.php"; ?>');"></span> </li>
				<?php else:?>
				<li><span class="icon-set icon-upbanner" onclick="alert('Bạn được đăng banner khi tài khoản được 10.000 điểm.');"></span> </li>
				<?php endif ?>
				<li><span class="icon-set icon-setting" onclick="return openLinkMenu('<?php echo $PATH_ROOT."pagesetting.php"; ?>'); " href="<?php echo $PATH_ROOT."pagesetting.php"; ?>"></span></li>
</ul>