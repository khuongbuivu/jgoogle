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
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>tmpxyz/ad.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
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
<div id="boxms">
<form action="action_page.php" method="POST">
<textarea content="Write a message" placeholder="Write a message" id="textcomment" name="textcomment" role="textbox" style="border:none; width:100% !important;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 180px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;zoom: 1;"></textarea>
<div style="margin:2px;padding:10px; width:100px; float:left;">
<label><input type="checkbox" name="sentall" id="sentall"> SENT ALL</label>
</div>
<div style="margin:2px; width:200px; float:left;">
<div contenteditable="true" data-ph="Tag thành viên" class="contentbox tagnameboxinput" id="contentbox"></div>
<div id='display'>
</div>
<div id="msgbox">
</div>
</div>

<div id="btsent">
Sent!
</div>
</form>
</div>
<script>
$('body').on('click','#btsent', function(e) {
	if ($('#sentall').is(':checked'))
		sentMessage(1111111111);
});

$('body').on('keyup','.contentbox', function(e) {
	/* $('textarea').on('keydown',function(e){ */
	var maxCharLineComment = 50;
	var lineHeight = 20;
	var tb = $(this);		
	if (tb.text().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.text().length/maxCharLineComment);
		$( this ).css("height", line*lineHeight + "px");
	}
	var charpressed= getChar(e.keyCode);
	var start=/@/ig;
	var word=/@(.*)/ig;
	var content= tb.text();
	var go= content.match(start);
	var name= content.match(word);
	var dataString = 'searchword='+ name ;
	if(e.keyCode==50)
	{
		boolStartFindName=true;	
	}
	if (boolStartFindName && go!=null && go.length>0 && name!="@" && name!="@ " && name!="@  ")
	{
		$("#msgbox").slideDown('show');
		$.ajax({
					type: "POST",
					url: root_path + "boxsearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						var position = $("#contentbox").position();
						var newpos =  position.top + $("#contentbox").height();
						if (html== "" || html.trim(html)=="")
						{
							$("#display").slideUp('show');
						}
						$("#display").html(html).show();					
					}
					});
		
	}
    if (e.keyCode == 13 && $(this).attr('id')!= "textcomment") {	
		//addNotify(url_notify,idUser,name,imgLogo,idArt,0,tb.text() + $("#imgSrc"+idArt).html(),0);
		boolStartFindName = false;
        return false;
    }
});

$(document).on('click', '.addname', function()
{
	var username=$(this).attr('title');	 
	var start=/@/ig;
	var word=/@(.*)/ig;
	var idPost=$(this).attr('id');
	var old=$("#contentbox").html();
	var content=old.replace(word,"");
	$("#contentbox").html(content);
	var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b></a>· ";
	$("#contentbox").append(E);
	$("#contentbox").focus();
	$("#display").hide();
	$("#msgbox").hide();
	return false;
});

</script>
<!--
Tạo form cho post nội dung, list user cần send message 

-->
</body>
</html>