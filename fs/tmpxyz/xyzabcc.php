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

<style type="text/css"> 
#boxms {
    position:absolute;
    top: 50%;
    left: 50%;
    width:600px;
    height:220px;
    margin-top: -117px; /*set to a negative number 1/2 of your height*/
    margin-left: -300px; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}
#btsent{
margin:2px;padding:10px 20px; float:right; background-color:#4e69a2; border-color:#435a8b #3c5488 #334c83;color:#fff;text-shadow:0 -1px 0 rgba(0, 0, 0, 0.2);border-radius:2px;box-shadow:0 1px 1px rgba(0, 0, 0, 0.05);font-weight;bold
}
</style>
</head>	
<body>
<div id="container">
<?php
include_once("../header.php");
?>
</div>
<div id="boxms">

<form action="action_page.php" method="POST">
<textarea content="Write a message" placeholder="Write a message" id="textcomment" name="textcomment" role="textbox" style="border:none; width:100% !important;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 180px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;zoom: 1;"></textarea>
<div style="margin:2px;padding:10px; width:100px; float:left;">
<label><input type="checkbox" name="sentall"> SENT ALL</label>
</div>
<div style="margin:2px; width:200px; float:left;">

</div>
<div id="btsent">
Sent!
</div>
</form>
</div>
<!--
Tạo form cho post nội dung, list user cần send message 

-->
</body>
</html>