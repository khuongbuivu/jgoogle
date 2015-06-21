<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
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
 
	<div id="content">
		<div id="showindex" class="ccenter2">
		   <a href="https://www.facebook.com/nguyenlinh.ceo.faceseo"><img src="images/active.png"></a>
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