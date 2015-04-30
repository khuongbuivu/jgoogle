<?php
require_once("definelocal.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery1.9.1.js"></script>
<link rel="stylesheet" href="css/unloadfs.css" type="text/css" />
</head>
<body class="hasSmurfbar">
<div id="container">
 <?php
include_once("header.php");
 ?>
 
  <div id="content">
    <div id="showindex" class="ccenter2">
       <div class="textadmin">Contact Admin<br />
Unlock your account</div>
        <ul class="bankli">
        <li><div class="bankcontent">
        <div class="bankimg"><span class="vietcombank"></span></div>
        <div class="banktext">0251001616907<br />
Nguyen Hong Linh</div>
        </div></li>
        <li><div class="iconmoney"></div></li>
        <li><div class="bankcontent">
        <div class="bankimg bidv"></div>
        <div class="banktext">58110000196649<br />Nguyen Hong Linh</div>
        </div></li>     
        </ul>


    </div>
    <div id="gioithieu" class="ccenter c1" style="display:none">
     
    </div>
    <div id="dieukhoan" class="ccenter c2" style="display:none">
      <h1>Điều khoản</h1>
      <div class="noidung"></div>
    </div>
    <div id="baomat" class="ccenter c3" style="display:none">
      <h1>Bảo mật</h1>
      <div class="noidung"></div>
    </div>
    <div id="hoptac" class="ccenter c4" style="display:none">
      <h1>Hợp tác</h1>
      <div class="noidung"></div>
    </div>
    <div id="tuyendung" class="ccenter c5" style="display:none">
      <h1>Tuyển dụng</h1>
      <div class="noidung"></div>
    </div>
  </div>
  <div id="footer">
    <div class="footermenu">
      <ul>
        <li><span data-show="1" class="liamenu">Giới thiệu</span><span class="subicon">New</span></li>
        <li><span data-show="2" class="liamenu">Điều khoản</span></li>
        <li><span data-show="3" class="liamenu">Bảo mật</span></li>
        <li><span data-show="4" class="liamenu">Hợp tác</span></li>
        <li><span data-show="5" class="liamenu">Tuyển dụng</span></li>
      </ul>
    </div>
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