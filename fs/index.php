<?php
session_start();
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
if (!isset($_SESSION['userHelpYou']))
{
$_SESSION['userHelpYou']=getListUIDVip('100008035567201');
$_SESSION['userHelpYoutmp']=$_SESSION['userHelpYou'];
}
if(!isset($_SESSION['TIMEMAXVIEWMYLINK']))
{
	$_SESSION['TIMEMAXVIEWMYLINK']=250;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="hệ thống câu view, seo website, giải pháp seo website, phần mềm Seo," />
  <meta name="description" content="FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Hệ thống câu view, kiểm soát view, chuyển trang, chèn banner quảng cáo, backlink hoàn toàn free." />
  <title>FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Giải Pháp Thương Hiệu</title>
	<meta content="731864150162369" property="fb:app_id"/>
	<meta content="100001707050712" property="fb:admins"/>
<script type="text/javascript">
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

</script>
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
<link href="<?php echo $PATH_ROOT;?>favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!-- end thanh -->
<!-- add scroll top comment -->
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
<!-- add scroll top comment -->
<script type="text/javascript" >	
setInterval("checkTabsClosed()",5000);
setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",8000);
setInterval("getNewPost('<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>')",10000);
setInterval("showbannerfree('"+root_path + "modules/advbanner/index.php'," + idUser + ")",600000);
setCookie("UIDFACESEO", idUser, 1);
getNumuNotifyComment(root_path + 'modules/checkNotify.php',idUser);
getAnalytics(root_path + 'modules/getNumAnalytics.php',idUser);

</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=394280457341947";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</head>	
<body class="fs hasLeftCol _57_t noFooter hasSmurfbar hasPrivacyLite gecko win Locale_en_US" >
<?php
print_r($_SESSION['userHelpYou']);
echo $_SESSION['iPageUIDHelpYou'];
?>
<div id="UIDHelpYou"></div>

<!--
<div style="position:fixed;left:0;top:60px;"><img src="images/phao.gif"></div>
<div style="position:fixed;right:0;top:60px;"><img src="images/phao.gif"></div>
-->
<div id="container">
<?php
include_once("header.php");
if ($infoUser['user_status']==0 && $infoUser['user_status']!="")
{
	echo '<div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content"> 		<div>
		<div id="mainContainer" style="text-align:center; height: 400px;"> <h1> Vui lòng sử dụng tài khoản Facebook khác để đăng nhập. </h1> <br/> <a href="http://faceseo.vn" title="Cộng đồng Seo Việt Nam">Trang chủ</a> </div></div><div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div></div></div>';
exit();
}
//include_once("user.php");
?>

<div id="globalContainer" class="uiContextualLayerParent">
	<div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content">
		<div>
		<div id="mainContainer">
			<div id="leftCol">
              <ul class="icon-setting">
                <li><a href=""><span class="icon-set icon-home"></span> </a></li>
               <li><a href=""><span class="icon-set icon-gplus"></span> </a></li>
               <li><a href=""><span class="icon-set icon-connect"></span> </a></li>
               <li><a href=""><span class="icon-set icon-share"></span> </a></li>
               <li><a href=""><span class="icon-set icon-acong"></span> </a></li>
               <li><a href=""><span class="icon-set icon-setpanel"></span> </a></li>
               </ul>
				<!-- start code check login -->
				<?php if(LOCAL=="TRUE"): ?>	
					<?php  if ($id_user!=""){
							$_SESSION['token-user']=md5($id_user);
							$_SESSION['session-user']=$id_user;
							$_SESSION['session-name']=$user_profile[name];
							}
					?>
				<?php endif ?>
				<!-- start code check login -->
              <?php /*
				<div id="pagelet_welcome_box" data-referrer="pagelet_welcome_box">
					<!-- login facebook -->
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
					<div id="nav" class="left1 leftbigger" role="navigation">
<!--
						<a href="http://giaiphapthuonghieu.vn/dang-ki-hoc-adwords-nang-cao/"><img src="http://faceseo.vn/images/event/phong-hoc-seo-giai-phap-thuong-hieu.jpg"  width="99%" /></a>

						<br/><br/>
-->
						<div class="moduletable_menu">
						 <h3><span class="backh"><span class="backh2"><span class="backh3">Chuyên mục</span></span></span></h3>
						<ul class="menu">
						<li class="item-506 current active"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT; ?>')">Trang chủ</a></li>
						<li class="item-510"><a href="javascript:mylink(<?php echo $id_user; ?>);">Link của tôi</a></li>
						<li class="item-483"><a href="javascript: openLinkMenu('modules/upload/banner.php');">Đăng kí banner</a></li>
						<!--<li class="item-484"><a target="_blank" href="autoview.php">Tăng điểm tự động</a></li>-->
						<li class="item-485"><a  title="Chức năng vẫn còn đang phát triển" href="javascript: alert('Chức năng sẽ cập nhật sau 2 tháng nữa')">Quản lý chuyển trang</a></li>						
						<li class="item-485"><a href="javascript: openLinkMenu('documentation/index.html')">Hướng Dẫn Sử Dụng</a></li>
<li class="item-485"><a href="javascript:alert('Các bạn nên click bằng chuột trái để kiếm điểm. Khi click xong nhớ click vào hình con mắt để xem hệ thống đã thống kê bạn trong danh sách click chưa');">Tại sao không tăng điểm?</a></li>
<li class="item-486"><a href="javascript:alert('1-4 sẽ kích hoạt chức năng này. Chỉ dành cho những user > 100 nghìn điểm.');">Tạo nhóm</a></li>

<li class="item-486"><a href="javascript: openLinkMenu('http://www.alexa.com/siteinfo/faceseo.vn');">Kiểm tra alexa</a></li>



						</ul>
						</div>
						
						<!-- add group -->
						<div class="moduletable_menu">
						
						<h3><span class="backh"><span class="backh2"><span class="backh3">Nhóm ............ <a href="javascript:alert('1-4 sẽ kích hoạt chức năng này. Chỉ dành cho những user > 100 nghìn điểm.');">Tạo nhóm</a></span>    </span></span></h3>
						<ul class="menu">
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=1"; ?>');">Hội like là lên lên là Seo</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=2"; ?>');">Hội chém +1</a></li>
						
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=3"; ?>');">Hội tăng +1 Like vs Follow</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=4"; ?>');">Liên minh trao đổi backlink</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=5"; ?>');">Google Search and click web</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=6"; ?>');">Cộng đồng Mass seo content</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=7"; ?>');">Hội kiếm tiền Adsense</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=8"; ?>');">Hội Seo nhà tui</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=9"; ?>');">Hội tăng view web</a></li>
						<li class="item-506 current"><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=10"; ?>');">Hội Trao đổi Like Facebook</a></li>
						</ul>
												
						</div>
						<!-- add group -->
					</div>
					
					
<div class="uiSideHeader"><strong>Sáng Lập FaceSeo</strong></div>
					<div class="listmem mem1"><a target="_blank" href="https://www.facebook.com/linh.nguyen.52035772" rel="ttipsy" title=" Linh Nguyễn" ><img src="https://graph.facebook.com/100001707050712/picture"  style="margin-right:3px;" /></a></div>
					<div class="listmem mem2"><a target="_blank" href="https://www.facebook.com/hd.isuit" rel="ttipsy" title="Hoàng Đoàn"><img src="https://graph.facebook.com/hd.isuit/picture"  style="margin-right:2px;" /></a></div>
					<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/tohoaithanhtv?fref=ts" rel="ttipsy" title="Thanh Long" ><img src="https://graph.facebook.com/tohoaithanhtv/picture"  style="margin-right:3px;" /></a></div>
					<div class="listmem mem4"><a target="_blank" href="https://www.facebook.com/kenzngulon" rel="ttipsy" title="Kenz" ><img src="https://graph.facebook.com/djkenzsmith/picture" style="margin-right:3px;"/></a></div>
					<div class="uiSideHeader"><strong>Hỗ trợ FaceSeo</strong></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/all.onlylove" rel="ttipsy" title="Tú Cao" ><img src="https://graph.facebook.com/100000454020972/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/tuankhang.bui.3" rel="ttipsy" title="Tuấn Khang Bùi" ><img src="https://graph.facebook.com/tuankhang.bui.3/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/seophamthi" rel="ttipsy" title="Phạm Thi" ><img src="https://graph.facebook.com/seophamthi/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/NguyenVanVuong99" rel="ttipsy" title="Vượng An" ><img src="https://graph.facebook.com/NguyenVanVuong99/picture"  style="margin-right:3px;"/></a></div>
					<br/>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/hoanganit" rel="ttipsy" title="Hoàng An" ><img src="https://graph.facebook.com/hoanganit/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/truong.seo.37" rel="ttipsy" title="Trường Thật Thà" ><img src="https://graph.facebook.com/truong.seo.37/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/dongvanlanh" rel="ttipsy" title="Lanh Đồng" ><img src="https://graph.facebook.com/dongvanlanh/picture"  style="margin-right:3px;"/> </a></div>

					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/Nhamvu.CEO" rel="ttipsy" title="Vũ Nhâm" ><img src="https://graph.facebook.com/Nhamvu.CEO/picture"  style="margin-right:3px;"/> </a></div>
					<br/>
					
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/nguyen.oanh.90260" rel="ttipsy" title="Nguyễn Oanh" ><img src="https://graph.facebook.com/nguyen.oanh.90260/picture"  style="margin-right:3px;"/> </a></div>				
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/coolkapok" rel="ttipsy" title="Đoàn Tuấn Vũ" ><img src="https://graph.facebook.com/coolkapok/picture"  style="margin-right:3px;"/> </a></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/profile.php?id=100006843854065" rel="ttipsy" title="Thanh Tuyền" ><img src="https://graph.facebook.com/100006843854065/picture"  style="margin-right:3px;"/> </a></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/vuongqcc" rel="ttipsy" title="Quốc Vương" ><img src="https://graph.facebook.com/vuongqcc/picture"  style="margin-right:3px;"/> </a></div> <br/>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/risktien.nd" rel="ttipsy" title="Tiên Ngụy" ><img src="https://graph.facebook.com/risktien.nd/picture"  style="margin-right:3px;"/> </a></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/dung.tsbd" rel="ttipsy" title="Dũng Tây Sơn" ><img src="https://graph.facebook.com/dung.tsbd/picture"  style="margin-right:3px;"/> </a></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/vancaphvhc" rel="ttipsy" title="Alibaba A Cấp" ><img src="https://graph.facebook.com/vancaphvhc/picture"  style="margin-right:3px;"/> </a></div>
					<div class="listmem mem5"><a target="_blank" href="https://www.facebook.com/an.duongnguyen" rel="ttipsy" title="Duong Nguyen An" ><img src="https://graph.facebook.com/an.duongnguyen/picture"  style="margin-right:3px;"/> </a></div>
					<br/>
					

					<div class="fb-like-box" data-href="http://www.facebook.com/faceseo.vn" data-width="236px" data-height="308px"
					  data-colorscheme="light" data-show-faces="true" data-header="true"  data-show-border="true"></div>
					
				</div>
			<!--	
			<a target="_blank" href="https://docs.google.com/forms/d/1TMAzaLf2rXzRXzMlnbLFHSxX0Ggv6TtSaBSd07rvfck/viewform?edit_requested=true"><img src="http://faceseo.vn/images/advertising/banner-dang-ki-ao-faceseo.jpg" /></a>
			--> */?>
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
    <div style="width:100%;padding:10px;">
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
				
								
				<div style="padding:5px; text-align:center; margin: 5 105px; background:#D8DFEA;color:#3B5998;width:528px;"><a onclick="loadOtherPost();">Xem thêm</a></div>					
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
				<div class="uiSideHeader" style="height:20px"><div style="float:left;width:79%"><strong><a rel="ttipsy" >Banner miễn phí</a></strong></div><div style="float:right; width:20%"><a href="http://faceseo.vn/modules/upload/banner.php">Đăng</a></div></div>

				<div id="bannerfree">
				<?php
					$con=mysqli_connect($host,$user,$pass,$db);
					$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,10");	 //idBannerStart
					while ($row = mysqli_fetch_array($result))
					{
						$infosUser=getUserInfo($row['banner_user_id']);
						if (strpos($row['banner_img'], "faceseo.vn/images")==true)
						{
							if (checkAvailableLinks($row['post_url'],$id_user))
								echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='max-width:100%' src='".$row['banner_img']."' /></a><br/>";		
							else
								echo "<img style='max-width:100%' src='".$row['banner_img']."' /><br/>";		
						}	
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

$( "#fsAnaylyticsButton" ).click(function() {
	TINY.box.show({url:'modules/statist_inday.php',width:700,height:500},'Thống kê Click','titlepopup'); refreshIntervalId = setInterval(startTime('modules/statist_inday.php',''), 5000); return false;
});

$(document).on('click', '.addname', function()
{
	var username=$(this).attr('title');	 
	var start=/@/ig;
	var word=/@(.*)/ig;
	var idPost=$(this).attr('id');
	var idP=idPost.substring(7);
	var old=$("#contentbox"+idP).html();
	var content=old.replace(word,"");
	$("#contentbox"+idP).html(content);
	var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b></a>· ";
	$("#contentbox"+idP).append(E);
	$("#contentbox"+idP).focus();
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

$('body').on('keyup','textarea,.contentbox', function(e) {
	/*$('textarea').on('keydown',function(e){*/
	var maxCharLineComment = 50;
	var lineHeight = 20;
	var tb = $(this);		
	$('#comment-content-1').html(tb.text());	
	if (tb.text().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.text().length/maxCharLineComment);
		$( this ).css("height", line*lineHeight + "px");
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
	if (boolStartFindName && go!=null && go.length>0 && name!="@" && name!="@ " && name!="@  ")
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
						}
						$("#display"+idArt).html(html).show();					
					}
					});
		
	}
    if (e.keyCode == 13 && $(this).attr('id')!= "textcomment") {
		alert("idArt: " + idArt);
		idArt = parseFloat(idArt);
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();			
		var token = generateToken();
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.text());
		addCmtToDb(url,idArt,tb.text(), $("#imgSrc"+idArt).html(),imgLogo,name,idUser , token);		
        subPoint(idUser,sidUser,-5,tb.text());
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,tb.text() + $("#imgSrc"+idArt).html(),0);
		$("#imgSrc"+idArt).html("");
		$(this).val("");	
		$(this).css("height","20px");
		boolStartFindName = false;
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
			window.location.hash = target;
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
//alert(currentPageBanner );
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
		getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
	}
};


eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 8(0,9){7 5=b.f("i://g.k/8.3?0="+0,"j","e=6, a=6, c=d, h=1, z=1, v=u, l=1");5.y=4(){t(s+"n.3",m);7 2=o.p(\'r\'+9);2.q.w=2.x}};',36,36,'link|500|iframe|php|function|windowLike|no|var|confirmgplus|id|scrollbars|window|resizable|yes|toolbar|open|faceseo|top|http|_blank|vn|height|idUser|get_point|document|getElementById|contentWindow|iframegplus|root_path|getPoint|550|width|location|src|onbeforeunload|left'.split('|'),0,{}))

function confirmshare( ) {
	var windowLike=window.open("http://faceseo.vn/share-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
	}
};
function confirmshareBirthday( ) {
	var windowLike=window.open("http://faceseo.vn/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirmshareBirthday( ) {
	var windowLike=window.open("http://faceseo.vn/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirm83( ) {
	var windowLike=window.open("http://faceseo.vn/share-8-3-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);	
		//$("#birthday").remove();	
	}
};



</script>
<script>
//UA-45049546-1
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
</script>
<!-- 
Search upclick.js mo rem de su dung upload file 
Đá banh về xử scrolToComment. Còn bị lỗi khi post đã được user đó click vào rồi thì không thể nào hiện lên được. Giờ cho nó hiện lên và del tất cả link để không view được nữa.
Một số yêu cầu với sever: chạy được fbapi, chạy được php mới, cân bằng tải load balance
-->
</body>
</html>