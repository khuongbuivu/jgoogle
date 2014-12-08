<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
include_once("define.php");
include_once("time.php");
include_once("config.php");
include_once('fcomment.php');
require_once('system/function.php');
global $host;
global $user;
global $pass;
global $db;
$token = md5(microtime(TRUE) . rand(0, 100000));
$_SESSION['token'] = $token;
$_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
?>
<html>
<head>
<meta content="731864150162369" property="fb:app_id"/>
<meta content="100001707050712" property="fb:admins"/>
<title>Like now</title>
<script type="text/javascript">
<?php if(LOCAL=="TRUE"): ?>
var root_path = "http://localhost/faceseo.vn/";

<?php else: ?>
var root_path = "http://faceseo.vn/";	
<?php endif ?>
var idUser=<?php  echo $id_user!=""?$id_user:-1; ?>;
var linkLogoFace = "<?php echo $linkLogoFace;?>";
var userFace = "<?php echo $userFace;?>";
var timeoutStasticClick,setScroll=0;
var refreshIntervalId=0;
var timetmp=0;
</script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<?php
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://faceseo.vn";
?>
<div id="fbjlike-example1111" class="fbjlike-example" ><fb:like class="fb_edge_widget_with_comment fb_iframe_widget" colorscheme="light" action="like" layout="normal" font="lucida grande" show_faces="true" height="60" width="450" href="<?php echo $link;?>" fb-xfbml-state="rendered"></fb:like></div>

<div class="fbjlike-content remember-state" style="display:none;">...your content here...</div>
<script src="http://socialmediaautomat.com/js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.fbjlike.1.4.js"></script>
<script type="text/javascript">
//$(document).on('fbjlike','.fbjlike-example',function( event ) {
$(document).ready(function () {
  $('.fbjlike-example').fbjlike({
  	siteTitle:'jQuery-Like-Button Plugin with callback functions',
  	onlike:function(response){			
		addPointLike(idUser, '<?php echo $link;?>');
  	},
  	onunlike:function(response){
		subPointLike(idUser);
  	},
  	lang:'en_US'
  });
});
</script>
</body>
</html>