<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../../definelocal.php");
include_once("../../define.php");
$linkLogoFace="https://graph.facebook.com/".$_SESSION['session-user']."/picture";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            <div class="col-sm-3"><a href="#"  class="logo"><img src="images/logo.png" /></a></div>
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
                	<p>- Cài đặt Addon Faceseo (hỗ trợ Chrome, Cốc Cốc, Firefox) để kiếm được 50đ/click keywords</p>
                    <p>- Click 1 lúc 20 link</p>
                    <p>- Click link gần hết giờ(nhấp nháy bên dưới chỗ postlink).<br />Ví dụ http://giaiphapthuonghieu.vn ###đào tạo seo!!! ###350s*** tức là TÔI cần click key "ĐÀO TẠO SEO" 350s là thời gian view link http://giaiphapthuonghieu.vn</p>
					<p>- Bạn sẽ thấy những từ khóa nháy nháy (từ khóa người dùng cần)</p>
				    <p>- Click đúng keywords(###keywords!!!) người dùng cần</p>
                    <p>- Click con mắt xem hệ thống đã thống kê tên bạn và keywords đã click</p>
                    <p>- Nếu hệ thống không thống kê thì nên tắt các tab khởi động lại trình duyệt</p>
                    <p>- Click 1 lúc 100 button G+. Sau đó vào từng popup bấm +G. Cách này có thểm kiếm 1000 đ trong 10p.</p>
                    <p><strong>***Rất mong nhận được 1 share của Bạn***</strong></p>
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'rotate-in-lg',
    outClass              :   'rotate-out-lg',
    inDuration            :    500,
    outDuration           :    200,
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
