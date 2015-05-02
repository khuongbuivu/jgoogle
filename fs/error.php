<?php
if(!isset($_SESSION)){
    session_start();
}
// include_once("definelocal.php");
include_once("hrb7yfq5yr40.php");
include_once("x8rpwu2qa739.php");

$type=0;
if (isset($_GET['type']))
	$type=$_GET['type'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery1.9.1.js"></script>
<link rel="stylesheet" href="css/unloadfs.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylesmenu.css" type="text/css" />
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/scriptmenu.js"></script>
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
<link href="<?php echo $PATH_ROOT;?>css/tagsname.css" rel="stylesheet" type="text/css" />
</head>
<body class="hasSmurfbar">
<div id="container">

 <?php
	include_once("header.php");
 ?>
 
  <div id="content">
    <div id="showindex" class="ccenter2">
		<a href="<?php echo $logoutUrl; ?>"><img src="http://faceseo.vn/images/message/fb-invalid.jpg" width="100%"></a>
	</div>
    
  </div>
  <div id="footerOther">  
	<!--
	<div class="footermenu">
      <ul>
        <li><span data-show="1" class="liamenu">Giới thiệu</span><span class="subicon">New</span></li>
        <li><span data-show="2" class="liamenu">Điều khoản</span></li>
        <li><span data-show="3" class="liamenu">Bảo mật</span></li>
        <li><span data-show="4" class="liamenu">Hợp tác</span></li>
        <li><span data-show="5" class="liamenu">Tuyển dụng</span></li>
      </ul>
	</div>
	-->
  </div>
</div>
<script src="js/enscroll-0.6.0.min.js"></script> 
<script>
                   $('.noidung').enscroll({
                        showOnHover: false,
                        verticalTrackClass: 'track3',
                        verticalHandleClass: 'handle3'
                    });
					$( ".liamenu" ).click(function() {
                         var li=$(this).data('show');
						
						 for(i=1;i<6;i++){
							if(i==li){
							   $('.c'+li).css('display','block');
							}else{
							$('.c'+i).css('display','none');
							}
							 
						 }
						 
                     });
                </script>
</body>
</html>