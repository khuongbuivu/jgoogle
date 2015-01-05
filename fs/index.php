<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
include_once("define.php");
include_once("time.php");
include_once("config.php");
include_once('fcomment.php');
include_once('user.php');
require_once('system/function.php');
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<?php if (!$accountFace): ?>
	<title>Login FACESEO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="maximum-scale=1.0, width=500"/>
	<meta name="description" content="FACESEO hệ thống được SEOER tôn vinh. Giúp hàng trăm doanh nghiệp khởi sắc."/>
	<meta name="og:description" content="FACESEO hệ thống SEO, tăng traffic nhanh, giảm alexa">
	<meta name="og:image" content="http://faceseo.vn/index/images/banner-faceseo.jpg">
	<link href="http://faceseo.vn/index/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="index/DZxVCOBqfnMg-r0L7dS-Xw.css">
	<link rel="stylesheet" type="text/css" href="index/Xqjxjf4xU2G8_Gb-X7tbow.css">
	<script src="index/ua-parser.min.2.js" crossorigin="anonymous"></script>
	<script src="index/jquery-1.8.3.min.2.js" crossorigin="anonymous">
	</script><script src="index/rDC3wlfGQC1vpaP6IdD89A.js" crossorigin>
	</script>
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/faceseo.vn/";
	<?php else: ?>
	var root_path = "http://faceseo.vn/";	
	<?php endif ?>
	</script>
<?php else: ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="hệ thống câu view, seo website, giải pháp seo website, phần mềm Seo," />
	<meta name="description" content="FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Hệ thống câu view, kiểm soát view, chuyển trang, chèn banner quảng cáo, backlink hoàn toàn free." />
	<title>FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Giải Pháp Thương Hiệu</title>
	<meta content="731864150162369" property="fb:app_id"/>
	<meta content="100001707050712" property="fb:admins"/>
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
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/comment.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylepopup.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/notify_css.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/tipsy.css" type="text/css" />
	<!-- Scroll bar -->
	<link href="<?php echo $PATH_ROOT;?>libs/scrollbar/js/css.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/overthrow.min.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/jquery.nanoscroller.js"></script>
	<!-- end Scroll bar -->
	<!-- point -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/point.js"></script>
	<!-- end point -->
	<!-- thanh -->
	<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $PATH_ROOT;?>css/tagsname.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
	<link href="http://faceseo.vn/index/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<!-- end thanh -->
	<!-- add scroll top comment -->
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
	<!-- add scroll top comment -->
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/faceseo.vn/";
	<?php else: ?>
	var root_path = "http://faceseo.vn/";	
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
	<p>Hệ thống chính thức hoạt động 15/1/2015!</p>
  </fieldset>
</form>
<div class="formFootnote" id="loginLinkWrapper"> <a href="/login">Have an account? Log in &rarr;</a> </div>
<footer>
  <div class="inner"> <menu>
    <li><a href="#" style="position: relative;">Giới thiệu <em style="position: absolute; right: -1.6em; bottom: 2em; width: 3.5em; height: 2em; border-radius: 1em; background-color: #a06fda; color: #ffffff; font-size: 65%; font-style: normal; line-height: 2em; text-align: center;">NEW</em></a></li>
    <li><a href="#">Điều khoản</a></li>
    <li><a href="#">Bảo mật</a></li>
    <li><a href="#">Hợp tác</a></li>
    <li><a href="http://giaiphapthuonghieu.vn/tin-moi-la-247/145-cach-tu-tu-moi-danh-cho-quy-ong-uong-ruou-an-sau-rieng.html" ref="nofollow">Tuyển dụng</a></li>
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
		<div id="mainContainer" style="text-align:center; height: 400px;"> <h1> Vui lòng sử dụng tài khoản Facebook khác để đăng nhập. </h1> <br/> <a href="http://faceseo.vn" title="Cộng đồng Seo Việt Nam">Trang chủ</a> </div></div><div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div></div></div>';
exit();
}
?>
<div id="globalContainer" class="uiContextualLayerParent">
	<div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content">
		<div>
		<div id="mainContainer">
			<div id="leftCol">
              <ul class="icon-setting">
                <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT; ?>')"><span class="icon-set icon-home"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=1"; ?>');"><span class="icon-set icon-gplus"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=2"; ?>');"><span class="icon-set icon-connect"></span> </a></li>
               <li><a href=""><span class="icon-set icon-share"></span> </a></li>
               <li><a href=""><span class="icon-set icon-acong"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."pagesetting.php"; ?>');"><span class="icon-set icon-setpanel"></span> </a></li>
               </ul>

			<!-- 
			<div class="fb-like-box" data-href="http://www.facebook.com/faceseo.vn" data-width="236px" data-height="308px"
					  data-colorscheme="light" data-show-faces="true" data-header="true"  data-show-border="true"></div>
			-->
			</div>
			
			<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
				<div id="contentArea" aria-describedby="pageTitle" role="main">					
					<div id="infopoint">					
						<div id="point">Điểm</div>
						<div id="warning">
						Cảnh báo: 
						</div>
						<div id="numwarning"></div>
						<div class="clearfix"></div>
					</div>
					<script>
					 getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
					 getWarningNumber(root_path+ "modules/get_warning_number.php",idUser,1);
					</script>
					<!-- API FACEBOOK GET ID NAM IMG -->					
<form name="frm" method="post" action="" id="fileupload" enctype="multipart/form-data">
  <div id="thanh" >
    <div style="width:94%;padding:10px;">
      <textarea style="border:none; width:100% !important;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 48px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
display: inline-block;
text-align: start;zoom: 1;" role="textbox" name="textcomment" id="textcomment"  placeholder="Mỗi lần đăng bài -20 điểm. Click link bằng chuột trái tối thiểu 5p  + 5điểm" content="Mỗi lần đăng bài -20 điểm. Click link bằng chuột trái tối thiểu 5p  + 5điểm" title="Mỗi lần đăng bài -20 điểm. Click link bằng chuột trái tối thiểu 5p  + 5điểm" ></textarea>
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

<div id='wrapperlinkview' class='wrapperlinkview'>
<div class='linkneedview' id='linkneedview' ></div>
<div id='closelink' class='closelink' >X</div>
</div>
<ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul>
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/common.js"></script> 
				<div id="detailpushnotify" class="detailpushnotify">					
				</div>
				<div id="listUrlViewMore"></div>				
				<div id="wrappercontentpost">
					<!--<div style="text-align:center"><img src="images/css/loading-google.gif" /></div>-->
				</div>		 				
				<script>
					getNewPosts(<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>);		
				</script>			
				
								
				<div style="padding:5px; text-align:center; margin: 5 105px; background:#D8DFEA;color:#3B5998;width:96%;"><a onclick="loadOtherPost();">Xem thêm</a></div>					
				<div id="last_msg_loader"></div>
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
				<a href="javascript:confirmshare()"><img src="images/event/share-co-viet-nam.png" width="100%"/></a> 
			
				<div class="uiSideHeader"><strong><a rel="ttipsy" title="Đăng kí banner ở menu trái. Hoạt động tích cực thì banner sẽ top">Nhà tài trợ</a></strong></div>
<div id="sponser">
</div>
				<div class="uiSideHeader" style="height:20px"><div style="float:left;width:79%"><strong><a rel="ttipsy" >Banner miễn phí</a></strong></div><div style="float:right; width:20%"><a href="javascript: openLinkMenu('http://faceseo.vn/modules/upload/banner.php')">Đăng</a></div></div>

				<div id="bannerfree">
				<?php
					$con=mysqli_connect($host,$user,$pass,$db);
					$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,10");	 //idBannerStart		
					while ($row = mysqli_fetch_array($result))
					{				
						echo '<div style="position:relative;" id="dbanner'.$row['banner_id'].'">';
						$infosUser=getUserInfo($row['banner_user_id']);
						// if (strpos($row['banner_img'], "faceseo.vn/images")==true)
						{
							if (checkAvailableLinks($row['post_url'],$id_user))
								echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='max-width:100%' src='".$row['banner_img']."' /></a><br/>";		
							else
								echo "<img style='max-width:100%' src='".$row['banner_img']."' /><br/>";		
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
<!--<link rel="stylesheet" href="http://giaiphapthuonghieu.vn/miniapps/popuponload/linhnguyen.css">	-->
<script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>	
<script type="text/javascript" >
	jQuery(window).load(function() {
		/*if(document.cookie.indexOf("adf") == -1)*/
		{
			document.cookie = "popunder1=adf";
			jQuery('#myModal').linhnguyen(jQuery('#myModal').data());
		}
	});
	var xxyyzz=<?php echo $xxyyzz;?>;

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
	var i=0;
	$("div[id^='postcontent']").each(function(){
		var id = parseInt(this.id.substring(11));
		arrayIdPost[i]=id;
		i=i + 1;
	});
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
$(function(){
$(document).on('mousedown', function (e) {   	
	if($(e.target).parents().index($('#notify_content_wrapper')) == -1) {
        if($('#notify_content_wrapper').is(":visible")) {
            $('#notify_content_wrapper').hide();
        }
    } 
	
	
});

$( "#fbNotificationsJewel" ).click(function() {
	window.idNotifyStart=0;
	notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
	$("#notify_content_wrapper").slideDown('show');
});


$( "#iconemailbutton" ).click(function() {
	window.idNotifyStart=0;
	notifyEmail(root_path + "modules/notifyemail.php",idUser,window.idNotifyStart);
	$("#notify_content_wrapper").slideDown('show');
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
$('body').on('keyup','textarea,.contentbox', function(e) {
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
		$("#msgbox").slideDown('show');
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
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.text());
		addCmtToDb(url,idArt,tb.text(), $("#imgSrc"+idArt).html(), imgLogo, name, idUser, token);		
        subPoint(idUser,sidUser,-5,tb.text());
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,tb.text() + $("#imgSrc"+idArt).html(),0,listTags);
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
			/* var target= $(".commentid"+idCmt).hash;
			window.location.hash = target;//fix faceseo.vn/#undefine */
		});
	}
}

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
			/* var target= $(".commentid"+idCmt).hash;
			window.location.hash = target;//fix faceseo.vn/#undefine */
		});
	}
}

var currentPagePost = 0;
var currentPageBanner = 0;
$(document).ready(function(){			
		  		
		$(window).scroll(function(){		
		  if  (($(window).scrollTop() == $(document).height() - $(window).height()) && (isloading==false) ){			
			loadOtherPost() ;
			loadOtherBanner();
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
	getOtherPosts(<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>);
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
	var windowLike=window.open("http://faceseo.vn/confirmlike.php?link="+link,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=500, width=500, height=400");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);
	}
};

//eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 8(0,9){7 5=b.f("i://g.k/8.3?0="+0,"j","e=6, a=6, c=d, h=1, z=1, v=u, l=1");5.y=4(){t(s+"n.3",m);7 2=o.p(\'r\'+9);2.q.w=2.x}};',36,36,'link|500|iframe|php|function|windowLike|no|var|confirmgplus|id|scrollbars|window|resizable|yes|toolbar|open|faceseo|top|http|_blank|vn|height|idUser|get_point|document|getElementById|contentWindow|iframegplus|root_path|getPoint|550|width|location|src|onbeforeunload|left'.split('|'),0,{}))
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
	var windowLike=window.open("http://faceseo.vn/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirmshareBirthday( ) {
	var windowLike=window.open("http://faceseo.vn/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
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
<!--
<div>
		<style type="text/css">#bottom-giangsinhgt{position:fixed;bottom:0;right:0;}</style>
		<div id="bottom-giangsinhgt">
			<object  classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="1260 	" height="100">
				<param name="movie" value="http://faceseo.vn/noel/noel.swf">
				<param name="quality" value="high">
				<param name="wmode" value="transparent">
			
				<embed src="http://faceseo.vn/noel/noel.swf"  quality="high" wmode="transparent"  pluginspage="http://www.macromedia.com/go/getflashplayer"  type="application/x-shockwave-flash" width="1260"  height="100">
				</embed>
			</object>
		</div>
	
		<script type="text/javascript">  document.write('<style type="text/css">body{padding-bottom:20px}</style><img style="position:fixed;z-index:9999;top:0;left:0" src="http://faceseo.vn/noel/left.png"/><img style="position:fixed;z-index:9999;top:0;right:0" src="http://faceseo.vn/noel/right.png"/><div style="position:fixed;z-index:9999;bottom:-50px;left:0;width:100%;height:104px;background:url(http://faceseo.vn/noel/footer.png) repeat-x bottom left;"></div><img style="position:fixed;z-index:9999;bottom:20px;left:20px" src="http://faceseo.vn/noel/bottom.png"/>');
		</script>
		
	</div>	
<!----End Noel by Phạm Trưởng---->
<!--
<script type='text/javascript'>
      //<![CDATA[
      function addEvent(obj, eventName, func){
        if (obj.attachEvent)
        {
          obj.attachEvent("on" + eventName, func);
        }
        else if(obj.addEventListener)
        {
          obj.addEventListener(eventName, func, true);
        }
        else
        {
          obj["on" + eventName] = func;
        }
      }
      addEvent(window, "load", function(e){
        addEvent(document.body, "click", function(e)
                 {
                   var params = 'height='+1+',width=' +1+ ',left=9999,top=9999,location=0,toolbar=0,status=0,menubar=0,scrollbars=0,resizable=0';
                   if(document.cookie.indexOf("adf") == -1)
                   {
                     var w = window.open("https://www.google.com/#q=kh%C3%B3a+h%E1%BB%8Dc+seo+faceseo",'adf', params);
                     if (w)
                     {
                       document.cookie = "popunder1=adf";
                       w.blur();
                     }
                     window.focus();
                   }
                 });
      });  
      //]]>
</script>
-->
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
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){		
			document.getElementById('point').innerHTML="Điểm <div id='numpoint'>" + xmlhttp.responseText + "</div>" ;
		}
	};
  xmlhttp.send(params);
};
$('body').on("mouseover",".UFIComment",function(){
	$(".cmtclose").css("display","block");
})
$('body').on("mouseout",".UFIComment",function(){
	$(".cmtclose").css("display","none");
})

</script>
<!-- 
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
</body>
</html>