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
<link rel="stylesheet" type="text/css" href="css/mobile-gioithieu.css"/>
<title>Home</title>
</head>

<body class="animsition ana">
	<div id="headerTop">
    	<div class="container">
            <div class="col-sm-3 m-top-left"><a href="<?php echo FULLDOMAIN;?>"  class="logo"><img src="images/logo.png" /></a></div>
            <div class="col-sm-9 m-top-right">
            	<div class="wp-menu">
                	<div class="fl avarta">
				
					<?php if ($_SESSION['session-name']!=""):?>
                    	<a href="#"><span class="m-nameuser"><?echo $_SESSION['session-name'];?></span><img src="<?php echo $linkLogoFace;?>" width="40" height="40" /></a>
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
            <div class="slider-intro-home">
                	<ul class="bxslider">
                    	<li>
                        	<div class="description">
                            	<div class="title-txt">
                                	<p class="fz-83">FACESEO</p>
                                    <p class="fz-41">Hệ thống dành cho </p>
                                    <p class="fz-41 font-n">Seoer</p>
                                </div>
									<p>Sau 3 năm nghiên cứu và SEO nhiều từ khóa KHÓ lên top Google (đào tạo seo, dịch vụ seo Google, giá seo, giá adwords, công ty seo uy tín, thuốc giảm cân...), Linh Nguyễn nhận thấy chỉ có SỰ TƯƠNG TÁC THỰC mới đem lại hiệu quả bền vững. </p>
                                    <p>Trong quá trình đi câu traffic trên các group FaceBook Linh Nguyễn thấy nhiều bạn post link lên Facebook mà không có ai view hoặc view chỉ tầm 5s rồi thoát trang, không đảo trang dẫn tới tỉ lệ thoát cao, nhiều bạn like trang xong dislike -> tốn thời gian mà nhận lại không được bao nhiêu, quá trình SEO không đạt như mong muốn. </p>
                                    <p>Chính vì lý do đó Linh Nguyễn phát triển hệ thống FaceSEO có các tính năng như Facebook (chat, comment, like) và tích hợp thêm tính năng cộng điểm khi click view và trừ điểm khi được click view để những ai không view sẽ không có điểm để post link. </p>
                                    <p>FaceSEO là sân chơi trung thực giúp mọi người kiếm traffic nhiều hơn, đều hơn hiệu quả hơn. Những gì hiệu quả cho SEO sẽ được tích hợp trên hệ thống để tạo sự tương tác hiệu quả nhất, đẩy từ khóa lên top Google mạnh mẽ nhất.</p>
                                    <p>FACESEO quản lý việc TƯƠNG TÁC TRUNG THỰC thông qua điểm. Giúp người khác VIEW, LIKE, G+, SHARE... thì được cộng điểm và ngược lại thì bị trừ điểm. </p>
                                    <p><strong>FACESEO = TÍNH NĂNG FACEBOOK + CÁC TÍNH NĂNG SEOER CẦN.</strong> </p>
                            </div>
                        </li>
                        <li>
                        	<div class="description">
                            	 <p>
								 Hiện tại các công ty dịch vụ SEO sử dụng Faceseo như một công cụ tăng traffic hiệu quả. Thành viên hệ thống Faceseo tăng liên tục mỗi ngày.
								 Các bạn đang cần view sâu đa lớp, view website từ kết quả search Google, tăng TIME ON SITE, giảm Bounce Rate hãy đăng kí ngay.
								 Không chỉ có tăng traffic, giảm alexa. Hệ thống còn giúp các Bạn chơi MMO kiếm được nhiều tiền hơn từ VIEW YOUTUBE, VIEW ADSENSE.			 
								 Có nhiều hệ thống tăng view tự động nhưng các bạn cũng biết Google ngày càng khó tính vì vậy hãy cố gắng QUAY TAY - TUY CHẬM MÀ CHẮC.
								</p>
								 <p>
								 Chúng tôi không ngừng nâng cấp hệ thống để đáp ứng cao nhất nhu cầu của các bạn làm Marketing Online của Việt Nam cũng như thế giới.
								 Các bạn có ý tưởng hoặc phát hiện hệ thống bị lỗi vui lòng gửi thư để chúng tôi khắc phục.								 
								 </p>
								 <p>
								 Email: linhnguyen@faceseo.vn
								 </p>
                            </div>
                        </li>
                        <li>
                   
                        </li>
                    </ul>
                </div>
        </div>
	</div>
    
<script type="text/javascript" src="js/jquery.animsition.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
 

	$(".animsition").animsition({
  
    inClass               :   'fade-in-left-sm',
    outClass              :   'fade-out-left',
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
