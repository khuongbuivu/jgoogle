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
            	<div class="banner"><img src="images/banner2.png" width="100%" height="auto" /></div>
            	<div class="content-artilce">
                	<p>- Cài đặt Addon Firefox (sắp tới sẽ có phiên bản Chrome)</p>
                    <p>- Click đúng keywords FACESEO</p>
                    <p>- Click 1 lúc 20 link</p>
                    <p>- Click link gần hết giờ(nhấp nháy bên dưới chỗ postlink).<br />Ví dụ http://giaiphapthuonghieu.vn ###đào tạo seo!!! ###350s*** tức là TÔI cần click key "ĐÀO TẠO SEO" 350s là thời gian view link http://giaiphapthuonghieu.vn</p>
                    <p>- Click đúng key người dùng cần</p>
                    <p>- Click con mắt xem hệ thống đã thống kê tên bạn và keywords đã clic</p>
                    <p>- Nếu hệ thống không thống kê thì nên tắt các tab khởi động lại FIREFOX và mở FACESEO đầu tiên</p>
                    <p>- Click 1 lúc 100 button G+. Sau đó vào từng popup bấm +G. Cách này có thểm kiếm 1000 đ trong 10p.</p>
                    <p>FACESEO là hệ thống tương tác thực vì vậy càng đông người dùng thì hiệu quả càng cao. Mọi người share bài viết này trên cộng đồng FB giúp.
Mỗi tháng FaceSEO tổ chức 1 buổi đào tạo kiến thức SEO từ cơ bản đến nâng cao để cộng đồng SEO Việt Nam ngày càng lớn mạnh.
Cuối cùng xin cảm ơn các anh/chị đã sử dụng hệ thống.</p>
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'fade-in-right-sm',
    outClass              :   'fade-out-right-sm',
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
