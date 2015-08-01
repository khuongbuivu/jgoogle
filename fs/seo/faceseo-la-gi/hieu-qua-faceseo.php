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
<strong><span><title>Muốn tăng traffic hiệu quả mạnh hãy dùng Faceseo</title></span></strong>
<meta name="description" content="Faceseo là hệ thống tăng traffic(tăng lượt xem vào website) được thế kế chuyên nghiệp dành cho SEOER & Các Bạn không biết gì về web vẫn làm SEO tốt.">
<meta name="keywords" content="hệ thống tăng traffic, tăng lượt xem website, cách tăng traffic">
<meta name="author" content="Linh Nguyễn">
<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/global.css"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/animsition.css"/>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css"/>
<link rel="stylesheet" href="../../login/css/tipy.css" type="text/css" />
<script type="text/javascript" src="../../login/js/tipy.js" type="text/javascript"></script>
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
<script type="text/javascript">
		$(function(){			
			$('#demo-tip-yellow').poshytip();
			$('#demo-tip-yellow1').poshytip();
			$('#demo-tip-yellow2').poshytip();
			$('#demo-tip-yellow3').poshytip();
			$('#demo-tip-yellow4').poshytip();
			$('#demo-tip-yellow5').poshytip();
			$(document).on('mousedown', function (e) {
				if($(e.target).parents().index($('#main')) == -1 || $(e.target).index('#start')==0) {
					window.location.assign(<?php echo $loginUrl; ?>);
				};
				
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
				<div class="banner"><img src="images/baner-hieu-qua-faceseo.jpg" width="100%" height="auto" /></div>
				
				<div class="content-artilce m-img-show">
					<div style="display:block; height:600px;">
						<div class="ct-fl view fourth-effect">
						<img src="images/hieu-qua-faceseo-day-tu-khoa-top-google-nhanh.jpg" alt="" id="demo-tip-yellow" title="Faceseo giúp đẩy từ khóa lên TOP nhanh chóng.<br/>Đừng hỏi tại sao ít backlink vẫn TOP.">
						<div class="mask"></div>
						</div>
						
						<div class="ct-fl view fourth-effect"><img src="images/hieu-qua-faceseo-giam-alexa-nhanh.jpg" alt="" id="demo-tip-yellow1" title="Kiểm tra Alexa hiện tại và sau 2 tuần sử dụng."><div class="mask"></div></div>
						<div class="ct-fl view fourth-effect"><img src="images/hieu-qua-faceseo-tuong-tac-da-trinh-duyet.jpg" id="demo-tip-yellow2" alt="" title="Faceseo hỗ trợ tăng traffic trên đa dạng trình duyệt.<br/>Ngoài ra còn tăng cả traffic cho Mobile."><div class="mask"></div></div>
						<div class="clear"><br/></div>
						<div class="ct-fl view fourth-effect"><img src="images/hieu-qua-faceseo-tao-google-searchbox.jpg" alt="" id="demo-tip-yellow3" title="Không cần 1 công cụ nào cả chỉ cần câu view đúng cách<br/> Bạn có thể tạo Google Searchbox cho thương hiệu"><div class="mask"></div></div>
						<div class="ct-fl view fourth-effect"><img src="images/hieu-qua-faceseo-giam-bounce-rate-2015.jpg" alt="" id="demo-tip-yellow4" title="Faceseo quản lý được click đa tầng. <br/>Vì thế nó giúp giảm Bounce Rate rất tốt."><div class="mask"></div></div>
						<div class="ct-fl view fourth-effect"><img src="images/hieu-qua-faceseo-giam-bounce-rate-2015.jpg" alt="" id="demo-tip-yellow5" title=""><div class="mask"></div></div>
						
					</div>
				</div>
			</div>
        </div>
	</div>
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'fade-in-down',
    outClass              :   'fade-out-down',
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
