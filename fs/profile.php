<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("definelocal.php");
include_once("define.php");
include_once("time.php");
include_once("config.php");
include_once('fcomment.php');
include_once('user.php');
include_once('system/function.php');
global $host;
global $user;
global $pass;
global $db;
$token = md5(microtime(TRUE) . rand(0, 100000));
$_SESSION['token'] = $token;
$_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
$id_user=$id_user!=""?$id_user:-1; $infoUser=getUserInfo($id_user); 
$xxyyzz= $infoUser['user_manager']==""?0:$infoUser['user_manager'];
if ($id_user!=-1)
{
$_SESSION['userHelpYou']=getListUIDVip($id_user);
$_SESSION['userHelpYoutmp']=$_SESSION['userHelpYou'];
}
if(!isset($_SESSION['TIMEMAXVIEWMYLINK']))
{
	$_SESSION['TIMEMAXVIEWMYLINK']=300;
}
?>
<?php 
		if ($accountFace)
		{    
		$urlImgProfile="https://graph.facebook.com/$accountFace/picture";
		saveUser($user_profile);
		}
?>
<?php
if ($accountFace && $_SESSION['loginfirsttime']==0)
{
	$oklock = md5($infoUser['user_id']."1")==$infoUser['user_atv']?true:false;
	$timeSaved=strtotime($infoUser['user_time_join']);
	$timezone = + 14;
	$timeCurrent = time() + 3600*($timezone+date("0"));
	$t =$timeCurrent - $timeSaved;		
	$day=0;
	if ($t>86400)
		$day=($t/86400);
	$ulck='un'.'lo'.'ckfs'.'.php';
	if ($day > 3 && !$oklock)
	{
		header( 'Location: '.$PATH_ROOT.$ulck );	
		exit();
	}
}
else if ($_SESSION['loginfirsttime']==1)
{
	header( 'Location: '.$PATH_ROOT.'intro.php' );
	exit();
}
/*

if (intval(checkSharedFs($id_user))==0)
{
	
	header( 'Location: '.$PATH_ROOT.'sharefullscreen.php' );
	exit();
}

*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<?php if (!$accountFace): ?>
	<title>ĐÃ LÀM SEO THÌ PHẢI BIẾT FACESEO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="maximum-scale=1.0, width=500"/>
	<meta name="description" content="Bạn cần tăng traffic keywords, giảm Alexa, tạo Google Searchbox, thăng hạng Google nhanh. Khám phá ngay FACESEO"/>
	<meta name="og:description" content="Bạn cần tăng traffic keywords, giảm Alexa, tạo Google Searchbox, thăng hạng Google nhanh. Khám phá ngay FACESEO">
	<meta name="og:image" content="http://<?php echo DOMAIN;?>/index/images/banner-faceseo.jpg">
	<meta name="author" content="Linh Nguyễn">
<meta name="google-site-verification" content="r7Jx-qmIt7TNhIU9Da_Y6mxJUsn5oq79ZxRBznJcJ9U" />
	<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="index/DZxVCOBqfnMg-r0L7dS-Xw.css">
	<link rel="stylesheet" type="text/css" href="index/Xqjxjf4xU2G8_Gb-X7tbow.css">
	<script src="index/ua-parser.min.2.js" crossorigin="anonymous"></script>
	<script src="index/jquery-1.8.3.min.2.js" crossorigin="anonymous">
	</script><script src="index/rDC3wlfGQC1vpaP6IdD89A.js" crossorigin>
	</script>
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/<?php echo DOMAIN;?>/";
	<?php else: ?>
	var root_path = "http://<?php echo DOMAIN;?>/";	
	<?php endif ?>
	</script>
	
		<link rel="stylesheet" type="text/css" media="screen" href="css/als_demo.css" />
		<script type="text/javascript" src="http://<?php echo DOMAIN;?>/js/jquery1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery.als-1.7.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 20,
					scrolling_items: 4,
					orientation: "horizontal",
					circular: "yes",
					autoscroll: "yes",
					interval: 3000,
					speed: 500,
					easing: "linear",
					direction: "left",
					start_from: 0
				});
			});
		</script>
	
<?php else: ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="hệ thống câu view, seo website, giải pháp seo website, phần mềm Seo," />
	<meta name="description" content="FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Hệ thống câu view, kiểm soát view, chuyển trang, chèn banner quảng cáo, backlink hoàn toàn free." />
	<title>FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Giải Pháp Thương Hiệu</title>
	<meta content="731864150162369" property="fb:app_id"/>
	<meta content="100001707050712" property="fb:admins"/>
<meta name="google-site-verification" content="r7Jx-qmIt7TNhIU9Da_Y6mxJUsn5oq79ZxRBznJcJ9U" />
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery1.9.1.js"></script>
	<script src="<?php echo $PATH_ROOT;?>modules/upload/upclick.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/tinybox.js"></script> <!-- for popup -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/notify.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/warning.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/banner.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/link.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/post.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/scriptmenu.js"></script>
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/comment.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylepopup.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/notify_css.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/tipsy.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/dialog.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylesmenu.css" type="text/css" />
	<!-- Scroll bar -->
	<link href="<?php echo $PATH_ROOT;?>libs/scrollbar/js/css.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/overthrow.min.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/jquery.nanoscroller.js"></script>
	<!-- end Scroll bar -->
	<!-- point -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/point.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/dialog.js"></script>
	<!-- end point -->
	<!-- thanh -->
	<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $PATH_ROOT;?>css/tagsname.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
	<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<!-- end thanh -->
	<!-- add scroll top comment -->
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
	<!-- add scroll top comment -->
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/<?php echo DOMAIN;?>/";
	<?php else: ?>
	var root_path = "http://<?php echo DOMAIN;?>/";	
	<?php endif ?>
	var idUser=<?php  echo $id_user!=""?$id_user:-1; ?>;
	var sidUser="<?php  $id_user!=""? $id_user :-1; $sid_user = MD5(intval($id_user)*1606); echo $sid_user; ?>";
	var linkLogoFace = "<?php echo $linkLogoFace;?>";
	var userFace = "<?php echo $userFace;?>";
	var timeoutStasticClick,setScroll=0;
	var refreshIntervalId=0;
	var timetmp=0;
	
	setInterval("checkTabsClosed()",5000);
	setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",8000);
	setInterval("getNewPost('<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>')",10000);
	setInterval("showbannerfree('"+root_path + "modules/advbanner/index.php'," + idUser + ")",600000);
	setCookie("UIDFACESEO", idUser, 1);
	getNumuNotifyComment(root_path + 'modules/checkNotify.php',idUser);
	getAnalytics(root_path + 'modules/getNumAnalytics.php',idUser);
	getNumMessage(root_path + 'modules/getNumMessage.php',idUser);
	</script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=394280457341947";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
<?php endif ?>
</head>	

<?php  if ($id_user!=""){
		$_SESSION['token-user']=md5($id_user);
		$_SESSION['session-user']=$id_user;
		$_SESSION['session-name']=$userFace;
		}
?>


<?php if (!$accountFace): ?>
<body class="dark ">
<div id="fb-root"></div>
<form id="signupForm" name='dangnhap' action='' method='post' >
  <h1>Start SEO</h1>
  <fieldset id="message" class="message">
  </fieldset>
	<div class="signupwrapper">
	  <fieldset id="intro">
		<p>
		 <a href="<?php echo $loginUrl; ?>"><button type="button" id="facebookSignupButton" class="facebookLogin">Connect with Facebook </button></a>
		</p>
		<p class="or">or</p>
	  </fieldset>
	  <fieldset id="emailSignup">
		<input id="analyticsId" name="analyticsId" type="hidden" value="">
		<input id="accessToken" name="accessToken" type="hidden" value="coApDOTKi2Ui1kgbhg-QuPig7KVvgXquDnhUNk-QNADtvMnmjsOAhiHSkWtjzD9bpe6YVA" >
		<input id="reservationToken" name="reservationToken" value="" disabled="disabled" type="hidden">
		<input id="authMode" name="authMode" value="email" type="hidden">
		<input id="facebookToken" name="facebookToken" type="hidden">
		<label for="email"> <span class="text">Email</span>
		  <input id="email" name="email" type="text" value="" autocomplete="off"  placeholder="Your email address" />
		</label>
		<label for="password"> <span class="text">Password</span>
		  <input id="password" name="passfaceseo" value="" autocomplete="off" placeholder="Choose a password" type="password">
		</label>
		
		<?php  if($_SESSION['messlogin']!='ok' && $_SESSION['messlogin']!=''):?>
		<div style="width:100%; padding:5px 0; background-color:red;margin: 10px 0 0 0; color:#fff;">	
			<?php echo $_SESSION['messlogin']; ?>
		</div>
		<?php endif ?>
		<input value="Sign up" type="submit">		
	  </fieldset>
	</div>
		<div class="signinwrapper">
	<fieldset id="emailSignup">
		<label for="email"><span class="text">Email</span>
		  <input id="emailsignin" name="emailsignin" type="text" value="" autocomplete="off"  placeholder="Your email address" />
		</label>
		
		<label for="password"> <span class="text">Password</span>
		  <input id="passsigninfaceseo" name="passsigninfaceseo" value="" autocomplete="off" placeholder="Choose a password" type="password">
		</label>
		<label for="password"> <span class="text">RePass</span>
		  <input id="repasssigninfaceseo" name="repasssigninfaceseo" value="" autocomplete="off" placeholder="Input a password again" type="password">
		</label>
		<input value="Reset Password" type="submit" onclick='return resetPass();'>
	</fieldset>
	</div>
  <fieldset id="quotes">
    <p><cite>Tính năng: </cite>Tăng traffic chất lượng cho web, tăng click vào kết quả search, tạo Google Suggest.</p>
    <p><cite>Tác dụng phụ: </cite>Giảm Alexa, lên top Google.</p>
    <p>Nhiều người đã bị nghiện vì vậy hãy cân nhắc trước khi tham gia hệ thống!</p>
  </fieldset>
</form>
<div class="formFootnote" id="loginLinkWrapper"> <a href="/login">Have an account? Log in &rarr;</a> </div>

<!-- Add user vừa login-->
<?php
	require_once("newlogin.php");
?>
<footer>
  <div class="inner"> <menu>
    <li><a href="http://<?php echo DOMAIN;?>/seo/congtyseo-tai-sao-cac-cong-ty-dich-vu-seo-phai-dung-faceseo.html" style="position: relative;">Giới thiệu <em style="position: absolute; right: -1.6em; bottom: 2em; width: 3.5em; height: 2em; border-radius: 1em; background-color: #a06fda; color: #ffffff; font-size: 65%; font-style: normal; line-height: 2em; text-align: center;">NEW</em></a></li>
    <li><a href="#">Điều khoản</a></li>
    <li><a href="#">Bảo mật</a></li>
    <li><a href="#">Hợp tác</a></li>
    <li><a href="http://www.giaiphapthuonghieu.net/2014/08/viec-lam-them-cho-sinh-vien-xhnv-tai-hcm.html" ref="nofollow">Tuyển dụng</a></li>
    </menu> </div>
</footer>
<?php exit();endif ?>

<body class="fs hasLeftCol _57_t noFooter hasSmurfbar hasPrivacyLite gecko win Locale_en_US" >
<div id="UIDHelpYou"></div>
<!--
<div style="position:fixed;left:0;top:60px;"><img src="images/phao.gif"></div>
<div style="position:fixed;right:0;top:60px;"><img src="images/phao.gif"></div>
-->
<div id="container">
<?php
include_once("header.php");
if ($infoUser['user_status']!=1)
{
	echo '<div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content"> 		<div>
		<div id="mainContainer" style="text-align:center; height: 400px;"> <h1> Vui lòng sử dụng tài khoản Facebook khác để đăng nhập. </h1> <br/> <a href="http://'.DOMAIN.'" title="Cộng đồng Seo Việt Nam">Trang chủ</a> </div></div><div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div></div></div>';
exit();
}
?>
<div id="globalContainer" class="uiContextualLayerParent">
	<div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content">
		<div>
		<div id="mainContainer">
			<div id="leftCol" class="leftCol">
				<?php
				require_once("menu.php");
				?>
			  <script>
				var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
				if (is_firefox!==true)
					$("li#icon-firefox").hide();
			  </script>
			
			</div>
			<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
				
				<div id="contentArea" aria-describedby="pageTitle" role="main">	
				
				<div style="float:left; width:100%;margin-bottom:10px">
					<div style="border:1px solid #ccc; width:99.9%;background-color:#fff;position: relative;box-shadow: 2px 3px 6px #ccc;">
					<div style="position:absolute;top: 36px; left:30px;"><img src="images/button/uparrow.png" /></div>
					<div id="infopoint">					
						<div id="point">
						<img src="images/button/point.png">
						<a rel='btipsy' title='View 5p + 5đ. View textlink 5p + 50đ. Share FB + 50đ, share G+ + 30đ, G+ & like + 15đ' >Điểm</a> <div id='numpoint'></div></div>
						<div id="warning">
						<img src="images/button/warning.png"> Cảnh báo: 
						</div>
						<div id="numwarning"></div> <div id="sharepoint"><a href="" class="overlayLink" data-action="" title="Chia sẻ điểm"><img src="images/button/share-point.png"></a></div>
						<div class="clearfix"></div>
					</div>
					<script>
					 getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
					 getWarningNumber(root_path+ "modules/get_warning_number.php",idUser,1);
					</script>
					<!-- API FACEBOOK GET ID NAM IMG -->					
					<form name="frm" method="post" action="" id="fileupload" enctype="multipart/form-data">
					  <div id="thanh" >
						<div style="padding:10px;">
						  <textarea style="border:none; width:100% !important;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 48px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;
					word-spacing: normal;
					text-transform: none;
					text-indent: 0px;
					text-shadow: none;
					display: inline-block;
					text-align: start;zoom: 1;" role="textbox" name="textcomment" id="textcomment"  placeholder="Post bài -20đ. Click link bằng chuột trái 5p  + 5điểm. Click keywords + 50Đ. Click trên kết quả search Google dùng CHUỘT PHẢI + CHUỘT GIỮA." content="Đăng bài -20 điểm. Click link bằng chuột trái tối thiểu 5p  + 5điểm. Click keywords + 50Đ. Click kết quả search Google dùng CHUỘT PHẢI + CHUỘT GIỮA + 50Đ" ></textarea>
						</div>
							
						<p style="text-align:center;"><span id="cho"></span></p>
						<div id="des"></div>
						<div id="imgdiv" style="clear:both;">
						  <div class="container">
							<div class="row fileupload-buttonbar">
							  <div class="span5 fileupload-progress fade">
								<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
								  <div class="bar" style="width:0%;"></div>
								</div>
								<div class="progress-extended">&nbsp;</div>
							  </div>
							</div>
							<table role="presentation" class="table table-striped">
							  <tbody class="files">
							  </tbody>
							</table>
							<br>
						  </div>
						</div>
						<div id="buttonpos" style="clear:both">
						  <div class="_1dsp _4-">
							<div class="clearfix">
							  <div class="_52lb _3-7 lfloat">
								<div>
								  <div id="u_1w_m" class="lfloat"><a id="u_0_z" title="Đánh dấu người trong bài đăng của bạn" aria-label="Đánh dấu người trong bài đăng của bạn" role="button" data-gt="{&quot;composer&quot;:{&quot;comp&quot;:&quot;people&quot;,&quot;ua_id&quot;:&quot;composer:post&quot;}}" href="#" class="_1dsq _1dsv"><span class="_1dsr"><span class="_4-px ellipsis">Đính tên người</span></span></a></div>
								  <div id="u_1w_o" class="lfloat">
									<div id="composerCityTagger" class="_6a _zg _1dsq"><a id="u_1w_p" aria-label="Thêm địa điểm vào bài đăng" title="Thêm địa điểm vào bài đăng" role="button" href="#" class="_y9"><span class="_1dst"><span class="_4-px ellipsis">Thêm địa điểm vào bài đăng</span></span>
									  <div class="_6a _1dsu">
										<div style="height:30px" class="_6a _6b"></div>
										<div class="_6a _6b"><span class="_y8"></span></div>
									  </div>
									  </a><a id="u_1w_q" title="Xóa" rel="async-post" ajaxify="/ajax/places/toggle_location_sharing?disable=1&amp;session_id=1376211657" role="button" href="#" class="_4_z3 uiCloseButton uiCloseButtonSmall"></a>
									  <input type="hidden" id="u_1w_r" name="composertags_city" autocomplete="off">
									  <input type="hidden" id="u_1w_s" value="false" name="disable_location_sharing" autocomplete="off">
									  <input type="hidden" value="108458769184495" name="composer_predicted_city" autocomplete="off">
									</div>
								  </div>
								  <div id="u_1w_n" class="lfloat">
									<div id="u_0_13" class="_6a _m _1dsq _1dsw"><a id="u_0_14" rel="ignore" role="presentation" class="_1dsr"><span class="_4-px ellipsis">Thêm hình ảnh</span>
									  <div class="_3jk">                  
										<input type="file" name="files[]" class="_n _5f0v" id="fileimg">
									  </div>
									  </a></div>
									<div class="span7" style="display:none;"><span class="fileupload-loading"></span></div>
								  </div>
								</div>
							  </div>
							  <ul class="uiList _1dso rfloat _509- _4ki _6-h _6-j _6-i">
								<li>
								  <button type="button" class="_42ft _42fu _11b selected _42g- postbutton" value="1">Đăng</button>
								</li>
							  </ul>
							</div>
						  </div>
						</div>
						<div id="noidungpost"></div>
					  </div>
					</form>
					</div>
				</div>	
			
				
				
					<div id='wrapperlinkview' class='wrapperlinkview'>
<div class='linkneedview' id='linkneedview' ></div>
<div id='closelink' class='closelink' >X</div>
</div>
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/common.js"></script> 
				<div style="color:red" id="message"></div>
				<div id="listUrlViewMore"></div>
				<div id="detailpushnotify" class="detailpushnotify">					
				</div>				
				<div id="wrappercontentpost">
					<!--<div style="text-align:center"><img src="images/css/loading-google.gif" /></div>-->
				</div>		 				
				<script>
					getprofile('<?php if(isset($_GET['iduser'])) echo $_GET['iduser']; else echo $_SESSION['session-user']; ?>');
				</script>			
				
								
				<div class="readmore"><a onclick="loadOtherPost();">Xem thêm</a></div>
				<div id="last_msg_loader"></div>
				</div>
				<div>
				<div style="float:left; width:47%;height:160px;margin:0 0 10px 10px"><img src="<?php echo FULLDOMAIN;?>/images/advertising/784x250-banner-faceseo.jpg"  height="100%" width="100%"/></div>
				
				<div class="lfloat colchat" id="colchat">
				<div class="tchat"><img src="<?php echo FULLDOMAIN;?>/images/button/icongroup.png" /> | Chat group</div>
				</div>
				<div id="rightCol" aria-label="Reminders, people you may know, and ads" role="complementary">
				<?php 
				$btd = substr($infoUser['birthday'],0,5);
				$today=date("m/d");
				$checkbtd = false;	
				if ($today==$btd){
				?>
				<div id="birthday"><a href="javascript:confirmshareBirthday();"><img src="images/css/birthday.gif" /></a></div>
				<?php } ?>
				<!--<a href="javascript:confirmshare()"><img src="images/event/share-hoi-seo-seo-banner-event-fs.png" width="100%"/></a>-->

				<!--<div class="uiSideHeader" style="height:20px"><div style="float:left;width:79%"><strong><a rel="ttipsy" href="javascript: openLinkMenu('http://<?php echo DOMAIN;?>/modules/upload/banner.php')" >Banner miễn phí</a></strong></div><div style="float:right; width:20%; position:relative"><div style="position:absolute; top:-10px; right:-10px;"></div></div></div>-->
				<div class="tchat">Quảng cáo | <img src="<?php echo FULLDOMAIN;?>/images/css/icon-ads.png" /></div>
				<div id="bannerfree">
				<?php
					$con=mysqli_connect($host,$user,$pass,$db);
					$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,10");	 //idBannerStart		
					while ($row = mysqli_fetch_array($result))
					{				
						echo '<div style="position:relative;" id="dbanner'.$row['banner_id'].'">';
						$infosUser=getUserInfo($row['banner_user_id']);
						if (strpos($row['banner_img'], DOMAIN."/images")==true)
						{
							if (checkAvailableLinks($row['post_url'],$id_user))
								echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='width:100%' src='".$row['banner_img']."' /></a><br/>";		
							else
								echo "<img style='width:100%' src='".$row['banner_img']."' /><br/>";		
						}	
						if ($row['banner_user_id']==$idUser || $infoUser['user_manager']>2)
							echo '<div class="delBannerById" onclick="return delBannerById('.$row['banner_id'].');">D</div>';
						echo "</div>";
					}
					mysqli_close($con);	
				?>
				</div>
				
				<div id="loadBannerFree"></div>
				<!--<div><br/><strong>Điểm =0 => banner 0 hiển thị</strong></div>-->
			</div>
				</div>
				<div class="clearfix"></div>
				</div>
				
				
		</div>	
<div style="position:fixed;top:78px;right:3px; background:#fff; width: 16%;">
<!--
<a target="_blank" href="http://faceseo.vn/seo/dang-ki-hoi-thao-seo-2015-hcm/" title="QC BANNER 10TR/THÁNG"><img src="images/event/standee-hoi-thao-seo-2015-faceseo-vinalink.jpg" width="100%" /></a>
<a target="_blank" href="http://thucphamdouong.net/" title="QC BANNER 10TR/THÁNG"><img src="images/advertising/sponsor/banner_ruou.jpg" width="100%" /></a>
<br/>
-->
</div>	
			<div class="btscrolltop"><a href="javascript:uptoTop();"><img src="<?php echo FULLDOMAIN;?>/images/button/up.png" width="100%" style="width:48px; height:48px"/></a></div>
			<div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div>
		
		</div>
	</div>
</div>
</div>

<div id='display'>
</div>
<div id="msgbox">
</div>
<div id="notify_content_wrapper" >
</div>
<div id="numnotify"></div>	
<div id="arrayIdPost" style="display:none;">
<?php 
foreach ($arrPostDisplay as $itemarray)
echo $itemarray.",";
?></div>	
<div id="checkLink" style="display:none;">-1</div>
<div id="mypostid" style="display:none;"></div>
<div id="idgroup" style="display:none;"><?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?></div>
<?php 

if($id_user=="-1" && LOCAL!="TRUE" ) 
{
?>


<div id="myModal" class="linhnguyen-modal">
<link rel="stylesheet" href="css/body.css" type="text/css" />
<div id="loginform">
<div id="butonlogin">
<a href="<?php echo $loginUrl; ?>"><img src="images/css/button-faceseo-login.png"></a>
</div>
</div>
	<a class="close-linhnguyen-modal">X</a>
</div>
<?php }?>

<div class="overlay" style="display: none;">
	<div class="sharepoint-wrapper">
		<div class="sharepoint-content">
			
			<h3>CHIA SẺ ĐIỂM</h3>
			<form method="post" action="sharepoint.php">
				<label for="username">
					Nhập tên:
					<!-- <input type="text" name="nametoshare" id="username" placeholder="@Linh Nguyen" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />-->
					<input type="hidden" class="mentionsHidden0000" value="">
					<div id="fslisttags0000" class="namereceivepoint"><div class="boxtagfullsecond"><div contenteditable="true" data-ph="@Linh Nguyen" data-he="cmt-content0000" class="content-namereceivepoint tagnameboxinput" id="contentbox0000"></div><div id="display0000" class="boxtag"></div><div id="msgbox"></div></div></div>
				</label>
				<label for="password">
					Số điểm:
					<input type="text" name="numpointshare" class="numpointshare" id="numpointshare" placeholder="500" pattern="^[0-9]{1,8}$" required="required" value="500" />
				</label>
				<button type="button" class="submit">Chia sẻ</button>
				<button type="button" class="close">Hủy</button>
				
			</form>
		</div>
	</div>
</div>


<!--<link rel="stylesheet" href="http://giaiphapthuonghieu.vn/miniapps/popuponload/linhnguyen.css">	-->
<script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>	
<script type="text/javascript" >
	var xxyyzz=<?php echo $xxyyzz;?>;
	jQuery(window).load(function() {
		/*if(document.cookie.indexOf("adf") == -1)*/
		{
			document.cookie = "popunder1=adf";
			jQuery('#myModal').linhnguyen(jQuery('#myModal').data());
		}
	});
	

</script>

<!-- add popup -->
<script>
// getNumuNotifyComment(root_path + "modules/checkNotify.php",idUser);
//save post start and post end
var arrayIdPost = new Array();
var idDivPostStart = 0;
var currentIdLoadPost = idDivPostStart;
var idMaxPostOnpage = 5;
function initArrayIdPost()
{
	arrayIdPost = new Array();
	strIdPosts  = "";
	var i=0;
	$("div[id^='postcontent']").each(function(){
		var id = parseInt(this.id.substring(11));
		arrayIdPost[i]=id;
		if (i===0)
			strIdPosts = id;
		else
			strIdPosts = strIdPosts + "," + id;
		i=i + 1;
	});
	arrayIdPost.sort();
	idMaxPostOnpage = i;
}
function loadComment(url)
{    
	if (arrayIdPost.length>0)
	{
		autoLoadComment(url,parseInt(arrayIdPost[currentIdLoadPost])); 	
		currentIdLoadPost = currentIdLoadPost + 1;	
		if (currentIdLoadPost >=idMaxPostOnpage)
			currentIdLoadPost = idDivPostStart;	
	}
}
setInterval("loadComment('" + root_path + "content_comment.php')",5000);
/*setInterval("loadNumView()",30000);*/
setInterval("getListUserViewing()",30000);
function generateTokenPost()
{
	<?php 	
			$date = date("d/m/yy"); 
			$shortDay= str_replace("/","",$date);
			$time= time() + 3000;
			$time=$time.$shortDay;
	?>
	$token='<?php echo $time ;?>';
	return $token;
}
function generateToken()
{
	<?php 	
			$date = date("d/m/yy"); 
			$shortDay= str_replace("/","",$date);
			$time= time() + 1800;
			$time=$time.$shortDay;
	?>
	$token='<?php echo $time ;?>';
	return $token;
}

</script>
<script>
var isEnter=true;
var clickButtonPush = true;
$(function(){
$(document).on('mousedown', function (e) {   	
	if($(e.target).parents().index($('#notify_content_wrapper')) == -1) {
        if($('#notify_content_wrapper').css('display') != 'none' ) {
            $('#notify_content_wrapper').hide();
			clickButtonPush=false;
        }
    };
	
	var idP=-1;
	var idPost=-1;
	$(".boxtag").each(function(){
		if ($(this).css('display')!='none')
			if($(this).find('.addname')!=null)
			{
				idPost=$(this).find('.addname').attr('id');
				idP=idPost.substring(7);
			}
	});
	if(idP!=-1&& ($(e.target).parents().index($("#display"+idP)) == -1)) {
        if($("#display"+idP).css('display') != 'none' ) {
           $("#display"+idP).hide();
        }
    }
});
$( "#fbNotificationsJewel" ).click(function() {
	if($('#notify_content_wrapper').css('display') == 'none' && clickButtonPush==true)
	{
		window.idNotifyStart=0;
		$('#notify_content_wrapper').html("");
		$('.icon-comment').css("display","none");
		notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
		$("#notify_content_wrapper").show();
	}
	else
	{
		$('#notify_content_wrapper').hide();
	}
	clickButtonPush = true;
});
$( "#iconemailbutton" ).click(function() {
	if($('#notify_content_wrapper').css('display') == 'none' && clickButtonPush==true)
	{
		window.idNotifyStart=0;
		$('#notify_content_wrapper').html("");		
		$('.icon-email').css("display","none");
		notifyEmail(root_path + "modules/notifyemail.php",idUser,window.idNotifyStart);
		$("#notify_content_wrapper").show();
	}
	else
	{
		$('#notify_content_wrapper').hide();
	}
	clickButtonPush = true;
});


$( "#fsAnaylyticsButton" ).click(function() {
	TINY.box.show({url:'modules/statist_inday.php',width:700,height:500},'Thống kê Click','titlepopup'); refreshIntervalId = setInterval(startTime('modules/statist_inday.php',''), 5000); return false;
});

$(window).keydown(function(e){
	var tmp = true;
	$(".boxtag").each(function(){
		if ($(this).css('display')!='none')
			tmp=false;
	});
	
	if(tmp)
	{
		isEnter=true;
		return;
	}
	if(e.which === 13){
		var username = $(".boxtagdivscroll div.selected span.addname").attr('title');
		var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b></a>· ";
		var idPost=$(".boxtagdivscroll div.selected span.addname").attr('id');
		if (idPost!= null && idPost.length>0)
		{
			var idP=idPost.substring(7);
			var curITags=$(".mentionsHidden"+idP).val();
			var newTagsName = $(".boxtagdivscroll div.selected").data('uid');
			if (curITags=="")
				$(".mentionsHidden"+idP).val(newTagsName);
			else
				$(".mentionsHidden"+idP).val(curITags + "," + newTagsName);
				
			var start=/@/ig;
			var word=/@(.*)/ig;
			var old=$("#contentbox"+idP).html();
			var content=old.replace(word,"");
			$("#contentbox"+idP).html(content);
			$("#contentbox"+idP).append(E);
			$("#contentbox"+idP).focus();
			$("#display"+idP).hide();
			$("#msgbox").hide();
			isEnter=false;
		}
		return false;
	}
	else 
	{
		isEnter=true;
	}
	if(e.which === 40){		
        if(liSelected){
            liSelected.removeClass('selected');
            next = liSelected.next();
            if(next.length > 0){
                liSelected = next.addClass('selected');
            }else{
                liSelected = li.eq(0).addClass('selected');
            }
        }else{
            liSelected = li.eq(0).addClass('selected');
        }
    }else if(e.which === 38){
        if(liSelected){
            liSelected.removeClass('selected');
            next = liSelected.prev();
            if(next.length > 0){
                liSelected = next.addClass('selected');
            }else{
                liSelected = li.last().addClass('selected');
            }
        }else{
            liSelected = li.last().addClass('selected');
        }
    }
})

$(document).on('click', '.display_box', function()
{	
	var username=$(this).find('.addname').attr('title');	 
	var start=/@/ig;
	var word=/@(.*)/ig;
	var idPost=$(this).find('.addname').attr('id');
	var idP=idPost.substring(7);
	var old=$("#contentbox"+idP).html();
	var content=old.replace(word,"");
	$("#contentbox"+idP).html(content);
	var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b>· </a> ";
	var curITags=$(".mentionsHidden"+idP).val();
	var newTagsName = $(this).data('uid');
	if (curITags=="")
		$(".mentionsHidden"+idP).val(newTagsName);
	else
		$(".mentionsHidden"+idP).val(curITags + "," + newTagsName);
		
	$("#contentbox"+idP).append(E);	
	var them=$("#contentbox"+idP).text().length;
	//$("#contentbox"+idP).focus(them);
	//$("#contentbox"+idP).setCursorToTextEnd();
	$("#display"+idP).hide();
	$("#msgbox").hide();
	return false;
});

$(document).on('click','.uploader',function( ) {
	// alert($(this).id);
	var id=$(this).attr("id");
	var idPost = id.substring(8);
	var uploader = document.getElementById(id);
	upclick(
	 {
	  element: uploader,
	  action: root_path + 'modules/uploadimagecomment/uploadfile.php', 
	  onstart:
		function(filename)
		{
		 
		},
	  oncomplete:
		function(response_data) 
		{
		  $("#imgSrc"+ idPost).html("<img src='"+response_data+ "' />");
		}
	 });
	
});
$(document).on('click', '.UFILikeLink', function() {
var idLike=$(this).attr('id');
var divLikeId=idLike.substring(7);
var idCmt = parseFloat(divLikeId);
divLikeId = '#statuslike' + divLikeId;
var htmlStr = $(this).html();
htmlStr=htmlStr.trim(htmlStr);
addLikeToDB('save_like.php',idCmt,<?php echo $id_user; ?>);
var htmlStr11=htmlStr.substring(0,6);
if (htmlStr11.search('Like')>-1)
{
	var numlike = 1;
	var bonus=1;	
	if (htmlStr.search('numlike')>-1)
	{
		numlike=parseInt(document.getElementById('numlike'+idCmt).innerHTML) + bonus;
		$(divLikeId + ' span').remove();
		$(divLikeId + ' i').remove();
		$(divLikeId + ' span').remove();
		$(this).html("Unlike"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
		//$(divLikeId).append('<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
	
	}
	else
	{
		$(this).html("Unlike"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">1</span>');
	}

}
if  (htmlStr11.search("Unlike") >-1)
{
		var numlike = 1;
		var bonus=-1;
		if (htmlStr.search('numlike')>-1 && parseInt(document.getElementById('numlike'+idCmt).innerHTML)==1)
		{
			$(divLikeId + ' span').remove();
			$(divLikeId + ' i').remove();
			$(divLikeId + ' span').remove();
			$(this).html("Like");
		
		}
		else
		{
			numlike=parseInt(document.getElementById('numlike'+idCmt).innerHTML) + bonus;
			$(divLikeId + ' span').remove();
			$(divLikeId + ' i').remove();
			$(divLikeId + ' span').remove();
			$(this).html("Like"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
		}
		
};
});
/* css tooltip */
$('a[rel=westtipsy]').tipsy({fade: true, gravity: 'w'});
$('a[rel=ttipsy]').tipsy({gravity: 's'});
$('a[rel=btipsy]').tipsy({gravity: 'n'});
$('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});

});
var li ;
var liSelected;
$('body').on('keyup','textarea,.contentbox,.content-namereceivepoint', function(e) {
	/*$('textarea').on('keydown',function(e){*/
	
	var maxCharLineComment = 50;
	var maxCharLineComment1 = 61;
	var lineHeight = 20;
	var tb = $(this);		
	$('#comment-content-1').html(tb.text());	
	if (tb.text().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.text().length/maxCharLineComment);
		$( this ).css("height", line*lineHeight + "px");
		
		var line1= 1 + parseInt(tb.text().length/maxCharLineComment1);
		var tenclass=$(this).data('he');
		$( '.'+tenclass ).css("height", line1*lineHeight + "px");
		
	}
	var charpressed= getChar(e.keyCode);
	var start=/@/ig;
	var word=/@(.*)/ig;
	var content= tb.text();
	var go= content.match(start);
	var name= content.match(word);
	var idTextArea=$(this).attr('id');
	var idArt=idTextArea.substring(10);
	var dataString = 'searchword='+ name + '&idPost='+idArt;
	if(e.keyCode==50)
	{
		boolStartFindName=true;	
	}
	if (boolStartFindName && go!=null && go.length>0 && name!="@" && name!="@ " && name!="@  " && e.keyCode!=40)
	{
		$("#msgbox").show();
		$.ajax({
					type: "POST",
					url: "boxsearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						var position = $("#contentbox"+idArt).position();
						var newpos =  position.top + $("#contentbox"+idArt).height();
						if (html== "" || html.trim(html)=="")
						{
							$("#display"+idArt).slideUp('show');
							$("#display"+idArt ).css("top", line1*lineHeight + "px");
						}
						$("#display"+idArt).html(html).show();
						li = $('.display_box');
						liSelected = null;
					}
					});
		
	}
    if (e.keyCode == 13 && (isEnter==true) && $(this).attr('id')!= "textcomment") {
		idArt = parseFloat(idArt);
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();			
		var token = generateToken();
		var listTags= $(".mentionsHidden"+idArt).val();
		var textCmt=tb.text();
		textCmt=textCmt.replace("###"," ###");
		addLinkToDb(url1,<?php echo $id_user; ?>,textCmt);
		addCmtToDb(url,idArt,textCmt, $("#imgSrc"+idArt).html(), imgLogo, name, idUser, token);		
        subPoint(idUser,sidUser,-5,textCmt);
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,textCmt + $("#imgSrc"+idArt).html(),0,listTags);
		$("#imgSrc"+idArt).html("");
		$(this).html("");	
		$(this).css("height","20px");
		boolStartFindName = false;
		$(this).html("");
        return false;
    }
});
/*
	$('body').on('keydown','textarea', function(e) {
	//$('textarea').on('keydown',function(e){
	var maxCharLineComment = 50;
	//alert("abc");
	var lineHeight = 20;
	//var tb = document.getElementById("scriptBox");
	var tb = $(this);		
	$('#comment-content-1').html(tb.val());	
	if (tb.val().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.val().length/maxCharLineComment);
		//document.getElementById("scriptBox").style.height=line*lineHeight + "px";				
		$( this ).css("height", line*lineHeight + "px");
	}
	<!-- add code tag friend -->
	//alert("bbb");
	var charpressed= getChar(e.keyCode);
	var start=/@/ig;
	var word=/@(.*)/ig;
	var content= tb.val() + charpressed;
	var go= content.match(start);
	var name= content.match(word);
	
	var dataString = 'searchword='+ name;
	//	
	if(e.keyCode==50) // check key @
	{
		boolStartFindName=true;	
	}
	if (boolStartFindName)
	{
		//alert(dataString);	
		$("#msgbox").slideDown('show');
		$.ajax({
					type: "POST",
					url: "boxsearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						//alert(html);
						if (html== "" || html.trim(html)=="")
						{
							$("#display").slideUp('show');
							$("#msgbox").html("No result...");

						}
						$("#display").html(html).show();
						$("#msgbox").remove();	
						
					}
					});
		
	}
	<!-- add code tag friend -->
    if (e.keyCode == 13 && $(this).attr('id')!= "textcomment") {
		var idTextArea=$(this).attr('id');
		var idArt=idTextArea.substring(9);
		idArt = parseFloat(idArt);
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();
		// var numdiv= $('#lastCommentPost'+idArt).html();
		// var idCmtNext =0;
		// if(numdiv!="")
		// idCmtNext= parseInt(numdiv)+1;			
		var token = generateToken();
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.val());
		addCmtToDb(url,idArt,tb.val(), $("#imgSrc"+idArt).html(),imgLogo,name,idUser , token);		
        subPoint(idUser,sidUser,-5,tb.val());
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,tb.val() + $("#imgSrc"+idArt).html(),0);
		$("#imgSrc"+idArt).html("");
		$(this).val("");	
		$(this).css("height","20px");
		boolStartFindName = false;
        return false;
    }
});
*/
function getFile(){
        document.getElementById("upfile").click();
}

function startTime(url,link)
{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		if (s%5==0)
		{
			loadStasticLink(url,link);
		}
		if (document.getElementById("timeclock"))
		{	
			document.getElementById('timeclock').innerHTML=h+":"+m+":"+s;							
		}
		else
		{
			initScrollbar();
			setScroll=0;			
		}	
		if(setScroll<3)
			initScrollbar();		
		timeoutStasticClick=setTimeout(function(){startTime(url,link)},1000);	
}
function initScrollbar()
{
	setScroll++;
	$('.nano').nanoScroller({
		preventPageScrolling: true
	});
}

function initNotifyComment()
{
	updateNotify(root_path + "modules/update_notify.php",idUser);
	  $('.notify').nanoScroller({		
		preventPageScrolling: true
	  });	  
	$(".notify").bind("scrollend", function(e){
		if(!($("#stop").length > 0))
		{
		window.idNotifyStart=window.idNotifyStart + 10;
		notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
		}
	});
	
}

function initNotifyEmail()
{
	updateNotify(root_path + "modules/update_notify.php",idUser);
	  $('.notify').nanoScroller({		
		preventPageScrolling: true
	  });	  
	$(".notify").bind("scrollend", function(e){
		if(!($("#stop").length > 0))
		{
		window.idNotifyStart=window.idNotifyStart + 10;
		notifyEmail(root_path + "modules/notifyemail.php",idUser,window.idNotifyStart);
		}
	});
	
}


function checkTime(i)
{
	if (i<10)
	  i="0" + i;
	return i;
}
</script>
<script type="text/javascript">
    var r = true;  
window.onbeforeunload = function() {
	if (window.iswiewing == true)
		return "Bạn đang view. Tắt sẽ không được cộng điểm. Bạn có muốn tắt không?";
	//else
		//window.close();
}	
/*
    $(window).bind('beforeunload', function(){
			var currentWarningNum = parseInt($("div #numwarning").html());
				var numwarning = currentWarningNum + 1;				
			if (window.iswiewing == true)
			{
				r=confirm("Trong khi bạn đang view đừng tắt FaceSeo. Nếu tắt bạn sẽ bị ban khỏi hội. Vui lòng bấm cancel. Thông báo tiếp theo bấm Stay on Page");
				addWarning(root_path+ "modules/add_warning_out_view.php",idUser,1,numwarning);
                        if(r==true)
			{				
				window.close();
			}
			else
			{								
				r=true;
				setTimeout("addWarning('" + root_path + "modules/add_warning_out_view.php'," + idUser + ",1," + currentWarningNum + ')',20000);
				return "Trong khi bạn đang view đừng tắt FaceSeo. Vui lòng bấm Stay on Page. Nếu không sẽ bị remove khỏi hội";			
			}			
}
			
    });
*/
	
function scrolToComment(idPost,idCmt)
{
	$('#notify_content_wrapper').hide();
	if ($(".commentid"+idCmt).length == 0 )
		getPostById(idPost);		
	updateNotify(root_path + "modules/update_notify.php",idUser);
	if ($(".commentid"+idCmt).length > 0 )
	{
		
		$('html, body').stop().animate({
		'scrollTop': $(".commentid"+idCmt).offset().top - 100
		}, 600, 'swing', function () {
		});
	}
}
function uptoTop()
{	
	$('html, body').stop().animate({
	'scrollTop': $("#contentCol").offset().top - 100
	}, 600, 'swing', function () {
		/*$(".btscrolltop").css("display","none");*/
	});
};
function scrolToMessage(idPost,idCmt)
{
	$('#notify_content_wrapper').hide();
	if ($(".commentid"+idCmt).length == 0 )
		getMessageById(idPost);		
	updateMessage(root_path + "modules/update_message.php",idUser);
	getNumMessage(root_path + 'modules/getNumMessage.php',idUser);
	if ($(".commentid"+idCmt).length > 0 )
	{
		$('html, body').stop().animate({
		'scrollTop': $(".commentid"+idCmt).offset().top - 100
		}, 600, 'swing', function () {
		});
	}
};

var currentPagePost = 0;
var currentPageBanner = 0;
$(document).ready(function(){			
		  		
		$(window).scroll(function(){		
		  if  (($(window).scrollTop() == $(document).height() - $(window).height()) && (isloading==false) ){			
			loadOtherUrlsProfile() ;
			loadOtherBanner();
		  }
		});	
		
		$(window).bind('scroll', function() {
	    var navHeight = $( window ).height() - 50;
			 if ($(window).scrollTop() > navHeight) {
				 $('#colchat').addClass('fixed');
			 }
			 else {
				 $('#colchat').removeClass('fixed');
			 }
		});
});

var isloading=false;
function loadOtherBanner()
{
	currentPageBanner = currentPageBanner + 1;
	isloading = true;
	$.post('modules/advbanner/index.php',{currentPageBanner:currentPageBanner},			
	function(data){
		if (data != "") {
			$("#bannerfree").append(data);			
		};
		isloading = false;
	});
}
function loadOtherPost() 
{ 		  
	isloading = true;
	$('div#last_msg_loader').html('<img src="images/css/loading-google.gif" />');
	getOtherPostsProfile('<?php if(isset($_GET['iduser'])) echo $_GET['iduser']; else echo $_SESSION['session-user']; ?>');
	$(".btscrolltop").css("display","block");
};
$(".postcontent").on('mouseover',function() {
});
$( "#closelink" ).click(function() {
		$("#linkneedview").hide();
		$("#closelink").hide();
});
</script>
<script src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.fbjlike.1.4.js"></script>
<script type="text/javascript">
function confirmlink( link ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/confirmlike.php?link="+link,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=500, width=500, height=400");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);
	}
};

function confirmgplus(link,id){var windowLike=window.open(root_path + "confirmgplus.php?link="+link,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=500, width=550, height=500");windowLike.onbeforeunload=function(){getPoint(root_path+"get_point.php",idUser);var iframe=document.getElementById('iframegplus'+id);iframe.contentWindow.location=iframe.src}};
function fsGShare(url,token) {
	var resultstart=0;
	var callAjx=0;
	var windowLike;
	$.ajax({
        url: root_path + 'modules/json_getshareg.php',
		data: {url:url},
		type: 'POST',
        success: function(response) {
            resultstart = response;
			
        }
    });
	var windowLike=window.open(url,"_blank","toolbar=no, scrollbars=yes, resizable=yes, top=500, left=400, width=800, height=600");
	var pollTimer = window.setInterval(function() {
		if (windowLike.closed !== false && callAjx===0) {
				callAjx = 1 ;
				$.ajax({
				url: root_path+'modules/json_checkshareg.php',
				data: {url:url,numShare:resultstart,token:token},
				type: 'POST',
				success: function(response) {
					getPoint(root_path + "get_point.php",idUser);
					window.clearInterval(pollTimer);			
				}
			});
		}
	}, 3000);
};
function confirmshare( ) {
	var windowLike=window.open(root_path + "share-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);
	}
};
function fsshare(link,linkimg,token ) {
	var windowLike=window.open(root_path + "fbshare.php?link="+link+"&linkimg="+linkimg+"&token="+token,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path+"get_point.php",idUser);
	}
};
function confirmshareBirthday( ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirmshareBirthday( ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirm83( ) {
	var windowLike=window.open(root_path + "share-8-3-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
	}
};
</script>

<script>
<?php if ($_SESSION['token-user']!=""){ ?>
		isUserLogined = true;
<?php };?>
</script>

<script>

function addPoint(url,linkClicked,idUser,point)
{	
	<?php
		$dm = date("d/m");
		$s1= intval(date("s")) + 3;
		$shortDay= str_replace("/","",$dm);
		$User1=intval($_SESSION['session-user']) * intval($shortDay);
		$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
		$token1 = MD5($strtoken1);
		
	?>
	var tkap="<?php echo $token1;?>";
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&point=" +point + "&linkClicked="+ linkClicked+"&token="+tkap;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	var oldPoint=parseInt($("#numpoint").html());
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			var padd=parseInt(xmlhttp.responseText) - oldPoint;
			if (padd>0)
				effectAddPoint(oldPoint,padd,0);
			else
				effectSubPoint(oldPoint + padd,-padd);
			//effectAddPoint(oldPoint,parseInt(xmlhttp.responseText) - oldPoint,0);
		}
	};
  xmlhttp.send(params);
};

function effectSubPoint(pcurrent,psub) {
	var arr = pcurrent + psub;
	if (psub < 0) {
		return;
	};
	$("#numpoint").html(arr);
	setTimeout(function() {
		effectSubPoint(pcurrent,--psub);
	}, 1000/psub);
};
function effectAddPoint(pcurrent,time,p) {
	var arr = pcurrent + p;
	if (time < 0) {
		return;
	};
	$("#numpoint").html(arr);
	setTimeout(function() {
		effectAddPoint(pcurrent,--time,++p);
	}, 1000/time);
};



$('body').on("mouseover",".UFIComment",function(){
	$(".cmtclose").css("display","block");
})
$('body').on("mouseout",".UFIComment",function(){
	$(".cmtclose").css("display","none");
})

</script>

<!--
getOtherUrlsProfile comment.js chưa getidpage, sau khi get về chưa có hàm showlistprofileaddmore

Danh sách link profile chưa hiển thị đúng, chưa kiểm tra những link nào đã view, chưa get được orther link tối phải xong phần này và addon
Vấn đề hiển thị notify không đúng. Đôi khi người ta like cho những comment cũ thì id của comment đó sẽ nhỏ hơn id comment cũ
-> lưu vào database của atw_notify sẽ không đúng. [fixed]

Search upclick.js mo rem de su dung upload file 
Đá banh về xử scrolToComment. Còn bị lỗi khi post đã được user đó click vào rồi thì không thể nào hiện lên được. Giờ cho nó hiện lên và del tất cả link để không view được nữa.
Một số yêu cầu với sever: chạy được fbapi, chạy được php mới, cân bằng tải load balance
Trong khi một số link đang view. Post link mới sẽ bị sai id
When open popup with https function beforeunload not working so using interval to check status share.
http://stackoverflow.com/questions/3291712/is-it-possible-to-open-a-popup-with-javascript-and-then-detect-when-the-user-clo
-->
<style>
@media screen and (-webkit-min-device-pixel-ratio:0) {
	#leftCol { margin-top:65px;  }
}
</style>
<!-- Google Code for Chuy&#7875;n &#273;&#7893;i Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955236604;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "DJyXCN2Fi1oQ_IG_xwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/955236604/?label=DJyXCN2Fi1oQ_IG_xwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- merge nhung dong co chu profile vao la xong getprofile, loadOtherUrlsProfile() ;
</body>
</html>