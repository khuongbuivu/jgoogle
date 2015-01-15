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
<meta charset="utf-8">
<meta http-equiv="refresh" content="8" >
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

<div class="gplusone-content" style="display:none;font-size:120%;color:#336633;">Cảm ơn bạn đã G+. Bạn được cộng thêm 10 điểm. Tắt cửa sổ để thấy điểm cộng.</div><div class="gplusone-uncontent" style="display:none;font-size:120%;color:#f00;">Bạn bị trừ 20 điểm</div><div id="gplusone-example"><g:plusone size="standard" callback="gplus_callback" href="<?php echo $link;?>" count="true" width="350px" annotation="inline"></g:plusone></div><div class="gplusone-content remember-state" style="display:none;"></div><script type="text/javascript" src="js/jquery.gplusone.1.1.js"></script>
<?php
$dm = date("d/m");
$s1= intval(date("s")) + 8;
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
<script type="text/javascript">
$(document).ready(function () {
$('#gplusone-example').gplusone({
  	onlike:"addPointLikeG(idUser, '<?php echo $link;?>','<?php echo $token1;?>','<?php echo $token2;?>','<?php echo $token3;?>','<?php echo $token4;?>');$('.gplusone-uncontent:visible').hide('fade');$('.gplusone-content').show('fade');$.cookie('liked','liked');",
  	onunlike:"subPointLikeG(idUser, '<?php echo $token1;?>','<?php echo $token2;?>','<?php echo $token3;?>','<?php echo $token4;?>');$('.gplusone-content:visible').hide('fade');$('.gplusone-uncontent').show('fade');$.cookie('liked','unliked');",
  	lang:'en-US'
  });
  if($.cookie('liked')=='liked'){$('.remember-state').show('fade');$('.gplusone-uncontent:visible').hide('fade');}
});
</script>
</body>
</html>