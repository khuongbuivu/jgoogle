<?php
if(!isset($_SESSION)){
    session_start();
}
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
<title>Admin FACESEO | Unlock Account</title>
<meta content="731864150162369" property="fb:app_id"/>
<meta content="100001707050712" property="fb:admins"/>
<script type="text/javascript" src="../js/jquery1.9.1.js"></script>
<link rel="stylesheet" href="../css/unloadfs.css" type="text/css" />
<link href="../css/tagsnameadm.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="../js/comment.js"></script>
<script type="text/javascript" src="../tmpxyz/ad.js"></script>
<script type="text/javascript" src="../js/var.js"></script>
<script type="text/javascript" src="../js/jquery1.9.1.js"></script>
<script type="text/javascript" src="../js/keycode.js"></script> <!-- add keycode -->
</head>
<body class="hasSmurfbar">
<div id="container">
  <div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
    <div id="blueBarHolder" class="slim">
      <div id="blueBar" class="fixed_elem">
        <div id="pageHead" class="clearfix _5bfg" role="banner">
          <div id="headleft"> <a href="http://faceseo.vn" > <img src="../images/css/logo-faceseo.png"/> </a> </div>
          <div id="headNav" class="clearfix">
            <div class="rfloat">
              <ul id="pageNav" class="clearfix _5bfw" role="navigation">
                <li id="navJewels" class="navItem">
                  <div id="jewelContainer" class="notifNegativeBase notifCentered notifGentleAppReceipt">
                    <div id="fsAnaylyticsButton" class="uiToggle fbJewel west"> <a class="jewelButton icon-view"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="anaylyticsCountWrapper" class="jewelCount"><span id="anaylyticsCountValue">1</span></span> </a>
                       
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống kê lượt click trong ngày</div></div>
                    </div>
                    <div id="fbNotificationsJewel" class="uiToggle fbJewel west"> <a class="jewelButton icon-comment"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="notificationsCountWrapper" class="jewelCount"><span id="notificationsCountValue">1</span></span> </a>
                   
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống kê comment mới</div></div>
                    </div>
                    <div id="iconmessagebutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-message"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="messageCountWrapper" class="jewelCount"><span id="iconmessageCountValue">1</span></span> </a>
                    
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống báo tin nhắn mới</div></div>
                    </div>
                    <div id="iconemailbutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-email"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="emailCountWrapper" class="jewelCount"><span id="iconemailCountValue">1</span></span> </a>
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thông báo mới của hệ thống</div></div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div id="showindex" class="ccenter2">
       <div class="textadmin">TAG USER CẦN MỞ KHÓA</div>    
		<div style="margin:20px 0 0 0; width:100%;">
		<div contenteditable="true" data-ph="Tag thành viên" class="contentbox tagnameboxinput" id="contentbox"></div>
		<div id='display' class="boxtag">
		</div>
		<div id="msgbox">
		</div>
		</div>
		<input type="hidden" class="mentionsHidden" value="">
		<div id="btsentAll">
		UnlockAll!
		</div>
		<div id="btsent">
		Unlock!
		</div>
    </div>
    <div id="gioithieu" class="ccenter c1" style="display:none">    
    </div>
    <div id="dieukhoan" class="ccenter c2" style="display:none">
      <h1>Điều khoản</h1>
      <div class="noidung"></div>
    </div>
    <div id="baomat" class="ccenter c3" style="display:none">
      <h1>Bảo mật</h1>
      <div class="noidung"></div>
    </div>
    <div id="hoptac" class="ccenter c4" style="display:none">
      <h1>Hợp tác</h1>
      <div class="noidung"></div>
    </div>
    <div id="tuyendung" class="ccenter c5" style="display:none">
      <h1>Tuyển dụng</h1>
      <div class="noidung"></div>
    </div>
  </div>
  <div id="footer">
    <div class="footermenu">
      <ul>
        <li><span data-show="1" class="liamenu">Giới thiệu</span><span class="subicon">New</span></li>
        <li><span data-show="2" class="liamenu">Điều khoản</span></li>
        <li><span data-show="3" class="liamenu">Bảo mật</span></li>
        <li><span data-show="4" class="liamenu">Hợp tác</span></li>
        <li><span data-show="5" class="liamenu">Tuyển dụng</span></li>
      </ul>
    </div>
  </div>
</div>
<script src="js/enscroll-0.6.0.min.js"></script> 
<script>
$('body').on('click','#btsent', function(e) {
	var listTags= $(".mentionsHidden").val();
	if(listTags!='')
		atv(listTags);
	
});
<?php 	
			$date = date("d/m/yy"); 
			$shortDay= str_replace("/","",$date);
			$time= time() + 1800;
			$time=$time.$shortDay;
?>
$('body').on('click','#btsentAll', function(e) {
	var listTags= $(".mentionsHidden").val();
	atvall("<?php echo md5($time); ?>");
	
});

$('body').on('keyup','.contentbox', function(e) {
	var maxCharLineComment = 50;
	var lineHeight = 20;
	var tb = $(this);		
	if (tb.text().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.text().length/maxCharLineComment);
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
	if (boolStartFindName && go!=null && go.length>0 && name!="@" && name!="@ " && name!="@  " && e.keyCode!=40)
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
						li = $('.display_box');
						liSelected = null;
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
	var old=$("#contentbox").html();
	var curITags=$(".mentionsHidden"+idP).val();
	var newTagsName = $(this).parent().data('uid');
	if (curITags=="")
		$(".mentionsHidden").val(newTagsName);
	else
		$(".mentionsHidden").val(curITags + "," + newTagsName);			
	var content=old.replace(word,"");
	$("#contentbox").html(content);
	var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b></a>· ";
	$("#contentbox").append(E);
	$("#contentbox").focus();
	$("#display").hide();
	$("#msgbox").hide();
	return false;
});
var isEnter=true;
var li ;
var liSelected;
$(window).keydown(function(e){
	var tmp = true;
	$(".boxtag").each(function(){
		if ($(this).css('display')!='none')
			tmp=false;
	});
	if(tmp)
	{
		isEnter=true;
		return;
	}
	
	
	if(e.which === 13){
		var username = $(".boxtagdivscroll div.selected span.addname").attr('title');
		var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b></a>· ";
		var idPost=$(".boxtagdivscroll div.selected span.addname").attr('id');
		if (idPost!= null && idPost.length>0)
		{
			var idP=idPost.substring(7);
			var curITags=$(".mentionsHidden"+idP).val();
			var newTagsName = $(".boxtagdivscroll div.selected").data('uid');
			if (curITags=="")
				$(".mentionsHidden"+idP).val(newTagsName);
			else
				$(".mentionsHidden"+idP).val(curITags + "," + newTagsName);
				
			var start=/@/ig;
			var word=/@(.*)/ig;
			var old=$("#contentbox"+idP).html();
			var content=old.replace(word,"");
			$("#contentbox"+idP).html(content);
			$("#contentbox"+idP).append(E);
			$("#contentbox"+idP).focus();
			$("#display"+idP).hide();
			$("#msgbox").hide();
			isEnter=false;
		}
		return false;
	}
	else 
	{
		isEnter=true;
	}
	if(e.which === 40){		
        if(liSelected){
            liSelected.removeClass('selected');
            next = liSelected.next();
            if(next.length > 0){
                liSelected = next.addClass('selected');
            }else{
                liSelected = li.eq(0).addClass('selected');
            }
        }else{
            liSelected = li.eq(0).addClass('selected');
        }
    }else if(e.which === 38){
        if(liSelected){
            liSelected.removeClass('selected');
            next = liSelected.prev();
            if(next.length > 0){
                liSelected = next.addClass('selected');
            }else{
                liSelected = li.last().addClass('selected');
            }
        }else{
            liSelected = li.last().addClass('selected');
        }
    }
	
})
</script>
</body>
</html>