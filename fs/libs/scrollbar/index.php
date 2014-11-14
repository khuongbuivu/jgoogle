<!DOCTYPE html>
<!-- saved from url=(0048)http://jamesflorentino.github.io/nanoScrollerJS/ -->
<html><head>
  <!--<link href="js/css.css" rel="stylesheet" type="text/css">-->
  <link href="js/notify_css.css" rel="stylesheet" type="text/css">
  	<script type="text/javascript" src="js/overthrow.min.js"></script>
	<script type="text/javascript" src="http://giaiphapthuonghieu.vn/templates/gpth/javascript/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

    <div class="notify has-scrollbar">
      <div class="overthrow content description" tabindex="0" style="right: -17px;">
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>
		  Linh nguyen <br/>	  
	  </div>		
	</div>



<div id="clickme">
Click here
</div>
<img id="book" src="http://giaiphapthuonghieu.vn/images/banners/quang-cao-hoi-face-book.gif" alt="" width="100" height="123" style="display: none" />
With the element initially hidden, we can show it slowly:
<script>
$( "#clickme" ).click(function() {
$("#book").slideDown('show');

});
function initNotifyComment()
{
/*
	$(function(){
		  $('.nano').nanoScroller({
			preventPageScrolling: true
		  });
			$(".nano").bind("scrollend", function(e){
	$(".content").append("abc sdfjks jsdlfj s sd d Linh nguyen <br/> abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/> abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>");
});
});
*/
		//alert("part 1");
		$(function(){
			$('.notify').nanoScroller({		
				preventPageScrolling: true
			  });	  
			$(".notify").bind("scrollend", function(e){
				$(".content").append("abc sdfjks jsdlfj s sd d Linh nguyen <br/> abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/> abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>abc sdfjks jsdlfj s sd d Linh nguyen <br/>");
			});
		});
		
}
initNotifyComment();

/*
$(document).on('mousedown', function (e) {   
    if(e.target.id != 'clickme') {
        $("#clickme").hide();   
    } 
});
$( "#fbNotificationsJewel" ).click(function() {
	$("#notify_content").slideDown('show');
});
*/

</script>

</body></html>