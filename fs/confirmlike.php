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
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<meta content="731864150162369" property="fb:app_id"/>
<meta content="100001707050712" property="fb:admins"/>
<title>Like now</title>
<script type="text/javascript">
<?php if(LOCAL=="TRUE"): ?>
var root_path = "http://localhost/<?php echo DOMAIN;?>/";

<?php else: ?>
var root_path = "http://<?php echo DOMAIN;?>/";	
<?php endif ?>
var idUser=<?php  echo $id_user!=""?$id_user:-1; ?>;
var linkLogoFace = "<?php echo $linkLogoFace;?>";
var userFace = "<?php echo $userFace;?>";
var timeoutStasticClick,setScroll=0;
var refreshIntervalId=0;
var timetmp=0;
</script>
<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript" src="js/var.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<?php
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://"<?php echo DOMAIN;?>;
?>
<div id="fbjlike-example1111" class="fbjlike-example" ><fb:like href="<?php echo $link; ?>" layout="standard" show-faces="true" send="true" width="450" action="like" colorscheme="light"></fb:like></div>

<div class="fbjlike-content remember-state" style="display:none;">CONTENT</div>
<?php
$dm = date("d/m");
$s1= intval(date("s")) + 10;
$s2= $s1 + 1;
$s3= $s1 + 2;
$s4= $s1 + 3;
$shortDay= str_replace("/","",$dm);
$User1=intval($_SESSION['session-user']) * intval($shortDay);
$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
$strtoken2=$_SESSION['session-user'].$shortDay.$User1.$s2;
$strtoken3=$_SESSION['session-user'].$shortDay.$User1.$s3;
$strtoken4=$_SESSION['session-user'].$shortDay.$User1.$s4;
$token1 = MD5($strtoken1);
$token2 = MD5($strtoken2);
$token3 = MD5($strtoken3);
$token4 = MD5($strtoken4);
?>
<script src="http://socialmediaautomat.com/js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.fbjlike.1.4.js"></script>
<script type="text/javascript">
//$(document).on('fbjlike','.fbjlike-example',function( event ) {
$(document).ready(function () {
  $('.fbjlike-example').fbjlike({
  	siteTitle:'TRUNG TÂM ĐÀO TẠO SEO - FACESEO VIỆT NAM',
  	onlike:function(response){
		addPointLike(idUser, '<?php echo $link;?>','<?php echo $token1;?>','<?php echo $token2;?>','<?php echo $token3;?>','<?php echo $token4;?>');
	},
  	onunlike:function(response){
		subPointLike(idUser,'<?php echo $token1;?>','<?php echo $token2;?>','<?php echo $token3;?>','<?php echo $token4;?>');
	},
  	lang:'en_US'
  });
});
</script>
<!--
http://stackoverflow.com/questions/13956518/fb-like-button-code-not-working
-->
</body>
</html>