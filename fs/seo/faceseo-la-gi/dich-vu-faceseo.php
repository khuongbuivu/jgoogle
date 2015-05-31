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
            	<div class="banner"><img src="images/banner3.png" width="100%" height="auto" /></div>
            	<div class="content-artilce">
                	<p>- Dịch vụ SEO Google: HD tối thiểu 50tr (1 nhân viên làm việc trực tiếp KH cả năm)</p>
                    <p>- Dịch vụ bảo trì, bảo mật web: 1tr/ tháng(thường xuyên bổ sung các giải pháp giúp web hoạt động ổn định, tối ưu Google)</p>
                    <p>- Dịch vụ quảng cáo Google Adwords (Chạy theo danh sách từ khóa tối thiểu 20 từ hoặc theo ngân sách(tối thiểu 3tr/tháng))</p>
                    <p>- Dịch vụ thiết kế website: thiết kế theo yêu cầu 5tr/website (chưa bao gồm domain,hosting)</p>
                    <p>- Dịch vụ quảng cáo FB Ads: Tăng like, Share, chăm sóc Fanpage, tạo App thực hiện chiến dịch thăm dò ý kiến KH về sản phẩm</p>
                    <p>- Dịch vụ viết bài PR chuẩn SEO: viết 10 bài chất lượng + tối ưu page SEO = 2tr</p>
                    <p><b>Hãy để chúng tôi chăm sóc thương hiệu của Bạn.</b></p>
                   
                </div>
            </div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'rotate-in-sm',
    outClass              :   'rotate-out-sm',
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
