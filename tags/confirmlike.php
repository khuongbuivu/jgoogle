<html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<meta content="731864150162369" property="fb:app_id"/>
<meta content="100001707050712" property="fb:admins"/>
<title>Like now</title>

<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript" src="js/var.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<?php
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://faceseo.vn";
?>
<div id="fbjlike-example1111" class="fbjlike-example" ><fb:like href="http://giaiphapthuonghieu.vn" layout="standard" show-faces="true" send="true" width="450" action="like" colorscheme="light"></fb:like></div>

<div class="fbjlike-content remember-state" style="display:none;">...your content here...</div>
<script src="http://socialmediaautomat.com/js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.fbjlike.1.4.js"></script>
<script type="text/javascript">
//$(document).on('fbjlike','.fbjlike-example',function( event ) {
$(document).ready(function () {
  $('.fbjlike-example').fbjlike({
  	siteTitle:'jQuery-Like-Button Plugin with callback functions',
  	onlike:function(response){			
		alert("onlike");
  	},
  	onunlike:function(response){
		alert("onunlike");
  	},
  	lang:'en_US'
  });
});
</script>
</body>
</html>