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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>Home</title>
</head>

<body class="animsition">
	
	<div id="headerTop">
    	<div class="container">
            <div class="col-sm-3"><a href="<?php echo FULLDOMAIN;?>"  class="logo"><img src="images/logo.png" /></a></div>
            <div class="col-sm-9">
            	<div class="wp-menu">
                	<div class="fl avarta">
                    	<?php if ($_SESSION['session-name']!=""):?>
                    	<a href="#"><span><?echo $_SESSION['session-name'];?></span><img src="<?php echo $linkLogoFace;?>" width="40" height="40" /></a>
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
        <div class="col-left col-sm-3">
        	<div class="menu-sidebar">
					<?php include_once("menuleft.php");?>  
                </div>
        </div>
        <div class="col-right col-sm-9">
        	<div class="wp-article">
            	<div class="banner"><img src="images/banner4.png" width="100%" height="auto" /></div>
            	<div class="content-artilce">
                	<h2>Để sử dụng Faceseo bạn chỉ cần nhớ 4 bước:</h2>
					
					<p>1. Đăng nhập Faceseo</p>
					<p>2. Click link view từ Faceseo</p>
					<p>3. Click link nháy nháy gần hết giờ.</p>
					<p>4. Click keywords nháy nháy trong website</p>
					<p>5. Xem lại thống kê (hình con mắt) để biết ai click cho bạn</p>
					<p><img src="images/huong-dan-faceseo-1-dang-nhap.png" width="80%"></p>
					<div style="text-align:center"><i>Đăng nhập bằng Facebook để dùng Faceseo</i><br/><br/></div>
					<p><img src="images/huong-dan-faceseo-2-dang-tin.png" width="80%"></p>
					<div style="text-align:center"><i>Đăng tin nhớ thêm ###keywords, hoặc website!!! ở cuối link</i><br/><br/></div>
					<p><img src="images/huong-dan-faceseo-3-dang-tin-thanh-cong.png" width="80%"></p>
					<div style="text-align:center"><i>Bạn có điểm >200 tin đăng sẽ hiển thị</i><br/><br/></div>
					<p><img src="images/huong-dan-faceseo-4-click-link-nhay-nhay.png" width="80%"></p>
					<div style="text-align:center; color:red;font-weight:bold;"><i>Nhớ click link gần hết giờ trước khi vào website click keywords</i><br/><br/></div>
					<p><img src="images/huong-dan-faceseo-5-key-can-click-trong-website.png" width="80%"></p>
					<div style="text-align:center"><i>Click key nháy nháy trong website để kiếm 50đ</i><br/><br/></div>
					<p><img src="images/huong-dang-faceseo-6-thong-ke-faceseo.png" width="80%"></p>
					<div style="text-align:center"><i>Click hình con mắt xem lại thống kê đã thống kê tên mình chưa. Nếu chưa tức bạn làm sai</i></div>
					<br/>
					<h3>Có gì khó hiểu vui lòng liên hệ 0905772888 Mr Nhân</h3>
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'fade-in-up-lg',
    outClass              :   'fade-out-up-lg',
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
