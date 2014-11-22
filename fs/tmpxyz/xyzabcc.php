<?php
session_start();
require_once("../definelocal.php");
include_once("../define.php");
include_once("../time.php");
include_once("../config.php");
include_once('../fcomment.php');
include_once('../user.php');
require_once('../system/function.php');
global $host;
global $user;
global $pass;
global $db;
$token = md5(microtime(TRUE) . rand(0, 100000));
$_SESSION['token'] = $token;
$_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
$id_user=$id_user!=""?$id_user:-1; $infoUser=getUserInfo($id_user); 
$xxyyzz= $infoUser['user_manager']==""?0:$infoUser['user_manager'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="Send message to user" />
  <title>Admin FACESEO | Send message to user</title>
	<meta content="731864150162369" property="fb:app_id"/>
	<meta content="100001707050712" property="fb:admins"/>
<script type="text/javascript">
<?php if(LOCAL=="TRUE"): ?>
var root_path = "http://localhost/faceseo.vn/";
<?php else: ?>
var root_path = "http://faceseo.vn/";	
<?php endif ?>
var idUser=<?php  echo $id_user!=""?$id_user:-1; ?>;
var sidUser="<?php  $id_user!=""? $id_user :-1; $sid_user = MD5(intval($id_user)*1606); echo $sid_user; ?>";
var linkLogoFace = "<?php echo $linkLogoFace;?>";
var userFace = "<?php echo $userFace;?>";
var timeoutStasticClick,setScroll=0;
var refreshIntervalId=0;
var timetmp=0;

</script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery1.9.1.js"></script>
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
<!-- Scroll bar -->
<!-- thanh -->
<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $PATH_ROOT;?>css/tagsname.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
<link href="<?php echo $PATH_ROOT;?>favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!-- end thanh -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=394280457341947";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</head>	
<body>
<div id="container">
<?php
include_once("../header.php");
?>
</div>
</body>
</html>