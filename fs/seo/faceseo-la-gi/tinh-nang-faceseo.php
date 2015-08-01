<?php
if(!isset($_SESSION)){
    session_start();
}

include_once("../../hrb7yfq5yr40.php");
include_once("../../x8rpwu2qa739.php");
$linkLogoFace="https://graph.facebook.com/".$_SESSION['session-user']."/picture";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<strong><span><title>Tính năng vượt trội giúp Faceseo có 1triệu thành viên</title></span></strong>
<meta name="description" content="Các bạn đang cần nhiều view chất lượng, view 5phút, click từ khóa và click textlink. Hãy thử dùng Faceseo để cảm nhận nhiều bất ngờ.">
<meta name="keywords" content="tính năng Faceseo">
<meta name="author" content="Linh Nguyễn">
<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/global.css"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/animsition.css"/>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css"/>
<script type="text/javascript">
	$(document).ready(function() {
		$('.bxslider').bxSlider({
				auto: true,
                autoControls: true,
                pause: 30000,
                slideMargin:10,
				pager:false
		});
	});
</script>
<link rel="stylesheet" type="text/css" href="css/mobile-gioithieu.css"/>
</head>

<body class="animsition">
	
	<div id="headerTop">
    	<div class="container">
            <div class="col-sm-3 m-top-left"><a href="<?php echo FULLDOMAIN;?>"  class="logo"><img src="images/logo.png" /></a></div>
            <div class="col-sm-9 m-top-right">
            	<div class="wp-menu">
                	<div class="fl avarta">
                    	<?php if ($_SESSION['session-name']!=""):?>
                    	<a href="#"><span class="m-nameuser"><?php echo $_SESSION['session-name'];?></span><img src="<?php echo $linkLogoFace;?>" width="40" height="40" /></a>
						<?php else:?>
							<a href="<?php echo FULLDOMAIN;?>"><span>Đăng nhập</span><img src="images/avartar.png" /></a>
						<?php endif;?>
                    </div>
                   <?php include_once("menutop.php");?>
                    <div class="flag fl">
                    	<a href="#" title=""><img src="images/en.png" width="24" height="18" /></a><a href="#" title=""><img src="images/vn.png" width="24" height="18" style="margin-left:8px" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
	</div>
    <div class="container">
        <div class="col-left col-sm-3 m-menuleftdiv">
        	<div class="menu-sidebar">
            <?php include_once("menuleft.php");?>  
                </div>
        </div>
        <div class="col-right col-sm-9 m-descriptiondiv">
        	<div class="wp-article">
            	<div class="banner"><img src="images/hieu-qua-faceseo-tinh-nang.jpg" width="100%" height="auto" /></div>
            	<div class="content-artilce">
					<strong><i>
					Tính năng cơ bản của Faceseo là quản lý việc tương tác trên các website. Mọi hành vi tương tác trên website sẽ được Faceseo thống kê và tính bằng ĐIỂM. Những hành vi có tác dụng SEO mạnh thì được cộng nhiều điểm.
					</i></strong>
                	<h2>Các yếu tố hiệu quả cho SEO</h2>
                    <p>1. Tăng traffic từ nhiều IP lớp C</p>
                    <p>2. Click textlink trên website</p>
                    <p>3. Click đa lớp<br/> Ví dụ: Vào website A click link B, vào link B click link C...</p>
                    <p>4. Share link G+ có comment</p>
                    <p>5. Click website trên kết quả Search Google</p>
                    <p>6. Share link Facebook, G+ giúp tương tác Social nhiều</p>
                    <h2>Cách tính điểm</h2> <img src="images/tinh-nag-faceseo-thong-ke-click-faceseo.jpg" align="right" width="40%">
					<p>1. Click link từ Faceseo +5-10đ </p>
					<p>2. Click Banner 10-20đ </p>
					<p>3. Click textlink trong website người dùng cộng 50đ</p>
					<p>4. Click sai textlink người dùng cần chỉ được 10đ</p>
					<p>5. Click link trên kết quả search Google +50</p>
					<p>6. Click link con trong Youtube +50đ</p>
					<p>7. Click kết quả Adsense + 50đ</p>
					<p>8. Click đa lớp đúng keywords +50đ</p>
					<p>9. Share link G+, FB + 50đ</p>
					<p>10. Like link G+, FB + 30đ</p>
					<p>***Trường hợp sai phạm: Spam, post sex, tin chính trị sẽ bị xóa nick***</p>
					<h2>Tính năng vượt trội hệ thống</h2>
					<p>1.Click view >5phút hệ thống sẽ tự tắt và tính điểm</p>
					<p>2.Thống kê được mọi hành vi click trong website của bạn</p>
					<p>3.Hiển thị link post đúng đối tượng</p>
					
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'zoom-in-sm',
    outClass              :   'zoom-out-sm',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link',
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
    //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    
    overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });
});
</script>
</body>
</html>
