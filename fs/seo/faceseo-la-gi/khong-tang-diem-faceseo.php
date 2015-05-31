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
            	<div class="banner"><img src="images/banner1.png" width="100%" height="auto" /></div>
            	<div class="content-artilce">
                	<p>- Bạn chưa cài đặt Addon Faceseo;</p>
                    <p>- Có 1 số link đặc biệt gây lỗi -> Nên tắt trình duyệt và mở lại;</p>
                    <p>- Bạn view được 5đ trong khi đó bạn BỊ VIEW mất 10 đ;</p>
                    <p>- Bạn mở trình duyệt ẩn để view;</p>
                    <p>- Không dùng chuột giữa, phải khi click link nằm trong Faceseo;</p>
					<p>- Khi vào website con có thể dùng( đối với Chrome, Cốc Cốc);</p>
                    <p>- Click bằng chuột phải, giữa (chỉ áp dụng khi click trên kết quả search Google);</p>
                    <p>- Bạn sẽ bị trừ điểm nếu cố tình chơi không trung thực;</p>
                    <p>- Nếu bạn post link hôm trước hôm sau không làm gì điểm vẫn có thể giảm vì link cũ vẫn hiển thị với 1 số người mà Bạn đã click giúp họ nên họ click trả lễ cho bạn.</p>
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
