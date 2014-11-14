<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
* {
	margin:0;
	padding:0;
	font-family:Arial, Helvetica, sans-serif;
}
a#show-popup {
	margin:20px 0 0 20px;
	float:left;
	text-decoration:none;
}
div#popup-bg {
	position:absolute;
	top:0;
	bottom:0;
	left:0;
	right:0;
	z-index:99;
	background:#000;
	display:none;
}
div#popup {
	width:680px;
	height:480px;
	border:solid 4px #000000;
	z-index:999;
	display:none;
	background:#FFF;
}
div#popup-header {
	position:relative;
	float:left;
	width:680px;
	line-height:30px;
	font-size:20px;
	background:#000;
	color:#FF0;
	cursor:move;
}
span#popup-close {
	cursor:pointer;
	color:#FFF;
	font-size:12px;
	position:absolute;
	top:-2px;
	right:10px;
	z-index:9999;
}
div#popup-content {
	width:670px;
	float:left;
	padding:5px;
}
</style>

<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	(function($){
		//Can gi?a ph?n t? thu?c t�nh l� absolute so v?i ph?n hi?n th? c?a tr�nh duy?t, ch? d�ng cho ph?n t? absolute d?i v?i body
		$.fn.absoluteCenter = function(){
			this.each(function(){
				var top = -($(this).outerHeight() / 2)+'px';
				var left = -($(this).outerWidth() / 2)+'px';
				$(this).css({'position':'absolute', 'position':'fixed', 'margin-top':top, 'margin-left':left, 'top':'50%', 'left':'50%'});
				return this;
			});
		}
	})(jQuery);
	
	$('a#show-popup').click(function(){
		//�?t bi?n cho c�c d?i tu?ng d? g?i d? d�ng
		var bg=$('div#popup-bg');
		var obj=$('div#popup');
		var btnClose=obj.find('#popup-close');
		//Hi?n c�c d?i tu?ng
		bg.animate({opacity:0.2},0).fadeIn(1000); //cho n?n trong su?t
		obj.fadeIn(1000).draggable({cursor:'move',handle:'#popup-header'}).absoluteCenter(); //can gi?a popup v� th�m draggable c?a jquery UI cho ph?n header c?a popup
		//��ng popup khi nh?n n�t
		btnClose.click(function(){
			bg.fadeOut(1000);
			obj.fadeOut(1000);
		});
		//��ng popup khi nh?n background
		bg.click(function(){
			btnClose.click(); //K? th?a n�t d�ng ? tr�n
		});
		//��ng popup khi nh?n n�t Esc tr�n b�n ph�m
		$(document).keydown(function(e){
			if(e.keyCode==27){
				btnClose.click(); //K? th?a n�t d�ng ? tr�n
			}
		});
		return false;
	});
});
</script>

<title>Untitled Document</title>
</head>

<body>
<a href="#" id="show-popup">Show popup</a>
<div id="popup-bg"></div>
<div id="popup">
	<div id="popup-header">Header<span id="popup-close" title="Close">x</span></div>
    <div id="popup-content">Content</div>
</div>
</body>
</html>