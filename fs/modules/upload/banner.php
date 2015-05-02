<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../../definelocal.php");
include_once("../../define.php");
include_once("../../time.php");
include_once("../../config.php");
include_once('../../fcomment.php');
include_once('../../user.php');
include_once('../../system/function.php');
global $host;
global $user;
global $pass;
global $db;
$token = md5(microtime(TRUE) . rand(0, 100000));
$_SESSION['token'] = $token;
$_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
$id_user=$id_user!=""?$id_user:-1; $infoUser=getUserInfo($id_user); 
$xxyyzz= $infoUser['user_manager']==""?0:$infoUser['user_manager'];
if ($id_user!=-1)
{
$_SESSION['userHelpYou']=getListUIDVip($id_user);
$_SESSION['userHelpYoutmp']=$_SESSION['userHelpYou'];
}
if(!isset($_SESSION['TIMEMAXVIEWMYLINK']))
{
	$_SESSION['TIMEMAXVIEWMYLINK']=300;
}
?>
<?php 
		if ($accountFace)
		{    
		$urlImgProfile="https://graph.facebook.com/$accountFace/picture";
		// if ($user_profile['numFriends']<200)
		// {
			// header( 'Location: '.$PATH_ROOT.'error.php' );
			// exit();
		// }
		saveUser($user_profile);
		}
?>

<?php
if ($accountFace && $_SESSION['loginfirsttime']==0)
{
	$oklock = md5($infoUser['user_id']."1")==$infoUser['user_atv']?true:false;
	$timeSaved=strtotime($infoUser['user_time_join']);
	$timezone = + 14;
	$timeCurrent = time() + 3600*($timezone+date("0"));
	$t =$timeCurrent - $timeSaved;		
	$day=0;
	if ($t>86400)
		$day=($t/86400);
	$ulck='un'.'lo'.'ckfs'.'.php';
	if ($day > 3 && !$oklock)
	{
		header( 'Location: '.$PATH_ROOT.$ulck );	
		exit();
	}
}
else if ($_SESSION['loginfirsttime']==1)
{
	header( 'Location: '.$PATH_ROOT.'intro.php' );
	exit();
}
/*

if (intval(checkSharedFs($id_user))==0)
{
	
	header( 'Location: '.$PATH_ROOT.'sharefullscreen.php' );
	exit();
}

*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<?php if (!$accountFace): ?>
	<title>ĐÃ LÀM SEO THÌ PHẢI BIẾT FACESEO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="maximum-scale=1.0, width=500"/>
	<meta name="description" content="Bạn cần tăng traffic keywords, giảm Alexa, tạo Google Searchbox, thăng hạng Google nhanh. Khám phá ngay FACESEO"/>
	<meta name="og:description" content="Bạn cần tăng traffic keywords, giảm Alexa, tạo Google Searchbox, thăng hạng Google nhanh. Khám phá ngay FACESEO">
	<meta name="og:image" content="http://<?php echo DOMAIN;?>/index/images/banner-faceseo.jpg">
	<meta name="author" content="Linh Nguyễn">
<meta name="google-site-verification" content="r7Jx-qmIt7TNhIU9Da_Y6mxJUsn5oq79ZxRBznJcJ9U" />
	<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="index/DZxVCOBqfnMg-r0L7dS-Xw.css">
	<link rel="stylesheet" type="text/css" href="index/Xqjxjf4xU2G8_Gb-X7tbow.css">
	<script src="index/ua-parser.min.2.js" crossorigin="anonymous"></script>
	<script src="index/jquery-1.8.3.min.2.js" crossorigin="anonymous">
	</script><script src="index/rDC3wlfGQC1vpaP6IdD89A.js" crossorigin>
	</script>
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/<?php echo DOMAIN;?>/";
	<?php else: ?>
	var root_path = "http://<?php echo DOMAIN;?>/";	
	<?php endif ?>
	</script>
	
		<link rel="stylesheet" type="text/css" media="screen" href="css/als_demo.css" />
		<script type="text/javascript" src="http://<?php echo DOMAIN;?>/js/jquery1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery.als-1.7.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() 
			{
				$("#lista1").als({
					visible_items: 20,
					scrolling_items: 4,
					orientation: "horizontal",
					circular: "yes",
					autoscroll: "yes",
					interval: 3000,
					speed: 500,
					easing: "linear",
					direction: "left",
					start_from: 0
				});
			});
		</script>
	
<?php else: ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="hệ thống câu view, seo website, giải pháp seo website, phần mềm Seo," />
	<meta name="description" content="FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Hệ thống câu view, kiểm soát view, chuyển trang, chèn banner quảng cáo, backlink hoàn toàn free." />
	<title>FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Giải Pháp Thương Hiệu</title>
	<meta content="731864150162369" property="fb:app_id"/>
	<meta content="100001707050712" property="fb:admins"/>
<meta name="google-site-verification" content="r7Jx-qmIt7TNhIU9Da_Y6mxJUsn5oq79ZxRBznJcJ9U" />
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery1.9.1.js"></script>
	<script src="<?php echo $PATH_ROOT;?>modules/upload/upclick.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/tinybox.js"></script> <!-- for popup -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/notify.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/warning.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/banner.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/link.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/post.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/scriptmenu.js"></script>
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/comment.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylepopup.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/notify_css.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/tipsy.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/dialog.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylesmenu.css" type="text/css" />
	<!-- Scroll bar -->
	<link href="<?php echo $PATH_ROOT;?>libs/scrollbar/js/css.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/overthrow.min.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/jquery.nanoscroller.js"></script>
	<!-- end Scroll bar -->
	<!-- point -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/point.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/dialog.js"></script>
	<!-- end point -->
	<!-- thanh -->
	<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $PATH_ROOT;?>css/tagsname.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
	<link href="http://<?php echo DOMAIN;?>/index/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<!-- end thanh -->
	<!-- add scroll top comment -->
	<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
	<!-- add scroll top comment -->
	<script type="text/javascript" >	
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/<?php echo DOMAIN;?>/";
	<?php else: ?>
	var root_path = "http://<?php echo DOMAIN;?>/";	
	<?php endif ?>
	var idUser=<?php  echo $id_user!=""?$id_user:-1; ?>;
	var sidUser="<?php  $id_user!=""? $id_user :-1; $sid_user = MD5(intval($id_user)*1606); echo $sid_user; ?>";
	var linkLogoFace = "<?php echo $linkLogoFace;?>";
	var userFace = "<?php echo $userFace;?>";
	var timeoutStasticClick,setScroll=0;
	var refreshIntervalId=0;
	var timetmp=0;
	
	setInterval("checkTabsClosed()",5000);
	setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",8000);
	setInterval("getNewPost('<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>')",10000);
	setInterval("showbannerfree('"+root_path + "modules/advbanner/index.php'," + idUser + ")",600000);
	setCookie("UIDFACESEO", idUser, 1);
	getNumuNotifyComment(root_path + 'modules/checkNotify.php',idUser);
	getAnalytics(root_path + 'modules/getNumAnalytics.php',idUser);
	getNumMessage(root_path + 'modules/getNumMessage.php',idUser);
	</script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=394280457341947";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
<?php endif ?>
</head>	
<?php  if ($id_user!=""){
		$_SESSION['token-user']=md5($id_user);
		$_SESSION['session-user']=$id_user;
		$_SESSION['session-name']=$userFace;
		}
?>
<body class="fs hasLeftCol _57_t noFooter hasSmurfbar hasPrivacyLite gecko win Locale_en_US" >
<div id="UIDHelpYou"></div>
<!--
<div style="position:fixed;left:0;top:60px;"><img src="images/phao.gif"></div>
<div style="position:fixed;right:0;top:60px;"><img src="images/phao.gif"></div>
-->
<div id="container">
<?php
include_once("../../header.php");
if ($infoUser['user_status']!=1)
{
	echo '<div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content"> 		<div>
		<div id="mainContainer" style="text-align:center; height: 400px;"> <h1> Vui lòng sử dụng tài khoản Facebook khác để đăng nhập. </h1> <br/> <a href="http://'.DOMAIN.'" title="Cộng đồng Seo Việt Nam">Trang chủ</a> </div></div><div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div></div></div>';
exit();
}
?>
<div id="globalContainer" class="uiContextualLayerParent">
	<div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content">
		<div>
		<div id="mainContainer">
			<div id="leftCol" class="leftCol">
				<?php
				require_once("../../menu.php");
				?>
			  <script>
				var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
				if (is_firefox!==true)
					$("li#icon-firefox").hide();
			  </script>
			
			</div>
			<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
				
				<div id="contentArea" aria-describedby="pageTitle" role="main">	
				<?php /* Start Upload Banner */?>
					<?php
					$con=mysqli_connect($host,$user,$pass,$db);					
					$result=mysqli_query($con,"select * from  fs_banner where banner_user_id=".$id_user);
					
					$html = "";
					if ($result->num_rows>0)
					{
						$html = '<table width="100%" cellpadding="5" cellspacing="5"  id="listBanner"><thead>';
						$html = $html.'  <tr><td>Chức năng</td><td>Liên kết</td><td>Hình ảnh</td></tr>';
						$html = $html.'<tr></thead>';
						while ($row=mysqli_fetch_array($result))
						{  
						    $html = $html. '<tr><td class="bge"><span class="xoabn" onclick="delbanner(\''.$id_user.'\');"></span></td>';						
							
							$html = $html. '<td class="bgf"><div id="linkbanner1">'.$row['banner_link'].'</div></td>';
							$html = $html. '<td class="bgi"><a class="bnner" target="_blank" href="'.$row['banner_link'].'"><img src="'.$row['banner_img'].'" /></a></td></tr>';
								
						}
						$html = $html. '</table>';
					}										
					mysqli_close($con);
				?>
					<div class="_2yg">
								<li id="UFIList-Cmt-Input" class="UFIRow UFIAddComment UFILastComponent">
							<div class="clearfix UFIMentionsInputWrap"><div class="lfloat">
									<div class="img _8o _8r UFIImageBlockImage UFIReplyActorPhotoWrapper">
																<img src="https://graph.facebook.com/<?php echo $_SESSION['session-user'];?>/picture">
															</div></div>
							<div>
							<div class="UFIImageBlockContent _42ef _8u">
								<div>
									<div class="uiMentionsInput textBoxContainer ReactLegacyMentionsInput">
										<div class="highlighter">
											<div>
												<span class="highlighterContent hidden_elem"></span>
											</div>
										</div>
										<div class="uiTypeahead mentionsTypeahead">
                                        <div class="eg"><div class="yw oo"></div><div class="yw VK"></div></div>
                                        
											<div class="wrap-input">
												<input type="hidden" class="hiddenInput">
												<div class="innerWrap">
													<div id="cmt-content">
													<form method="get" action="" id="form-cmt">
														<textarea name="add_comment_text" title="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" content="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" placeholder="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" class="textInput mentionsTextarea uiTextareaAutogrow uiTextareaNoResize DOMControl_placeholder" id="linkbanner"></textarea>							
													</form>
													</div>
													
												</div>
                                                
                                                                                         
                                                
                                                
                                                
											</div>
										</div>
                                        <style>
.dragandrophandler
{
    background: none repeat scroll 0 0 #e5e5e5;
    border: 1px dotted #ccc;
    color: #92aab0;
    font-size: 140%;
    margin-bottom: 10px;
	height: 330px;
    text-align: center;
	margin-left:10px;
    vertical-align: middle;
}
.progressBar {
    width: 200px;
    height: 22px;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
    display:inline-block;
    margin:0px 10px 5px 5px;
    vertical-align:top;
}
 
.progressBar div {
    height: 100%;
    color: #fff;
    text-align: right;
    line-height: 22px; /* same as #progressBar height if we want text middle aligned */
    width: 0;
    background-color: #0ba1b5; border-radius: 3px;
}
.statusbar
{
    border-top:1px solid #A9CCD1;
    min-height:25px;
    width:700px;
    padding:10px 10px 0px 10px;
    vertical-align:top;
}
.statusbar:nth-child(odd){
    background:#EBEFF0;
}
.filename
{
display:inline-block;
vertical-align:top;
width:250px;
}
.filesize
{
display:inline-block;
vertical-align:top;
color:#30693D;
width:100px;
margin-left:10px;
margin-right:5px;
}
.abort{
    background-color:#A8352F;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;display:inline-block;
    color:#fff;
    font-family:arial;font-size:13px;font-weight:normal;
    padding:4px 15px;
    cursor:pointer;
    vertical-align:top
    }
.iconshareup {
    background: url("shareicon.png") no-repeat scroll -179px 0 rgba(0, 0, 0, 0);
    height: 64px;
    margin: 0 auto;
    visibility: visible;
    width: 64px;
	top:30%;
	position:relative;
}	
.textshareup{
	top:30%;
	position:relative;
}
</style>

                                                
                                                
                                                
                                                <div class="dragandrophandler">
                                                <div class="iconshareup"></div>
                                                <div class="textshareup">Kéo ảnh vào đây</div>
                                                
                                                </div>
<div id="status1"></div>
   <script>
function sendFileToServer(formData,status)
{
    var uploadURL ="http://localhost/<?php echo DOMAIN;?>/modules/upload/uploadfile.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            status.setProgress(100);
			 
			if(!data.match(/Fail/)&&!data.match(/Invalid/)){
				$('.dragandrophandler').html('<img class="hinhup" src="'+data+'"/><br/><a onclick="xoaanh()" class="xoaanh">x</a>');
				$('.dragandrophandler').css({"background":"#e5e5e5","border":"1px dotted #ccc"});
				$('#linkImageBanner').html(data);	
			}else {
				$('.dragandrophandler').html('<div class="iconshareup"></div><div class="textshareup">Kéo ảnh khác vào đây</div>');
				$('.dragandrophandler').css({"background":"#e5e5e5","border":"1px dotted #ccc"});		
								
			}
            //$("#status1").append("File upload Done<br>");        
        }
    });
 
    status.setAbort(jqXHR);
}
 
var rowCount=0;

function xoaanh(){
	$('#linkImageBanner').html('');	
$('.dragandrophandler').html('<div class="iconshareup"></div><div class="textshareup">Kéo ảnh khác vào đây</div>');
				$('.dragandrophandler').css({"background":"#e5e5e5","border":"1px dotted #ccc"});	
}

function createStatusbar(obj)
{
     rowCount++;
     var row="odd";
     if(rowCount %2 ==0) row ="even";
     this.statusbar = $("<div class='statusbar "+row+"'></div>");
     this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
     this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
     this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
     this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
    $(".textshareup").after(this.statusbar);
 
    this.setFileNameSize = function(name,size)
    {
        var sizeStr="";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
 
        this.filename.html(name);
        this.size.html(sizeStr);
    }
    this.setProgress = function(progress)
    {      
        var progressBarWidth =progress*this.progressBar.width()/ 100; 
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        if(parseInt(progress) >= 100)
        {
            this.abort.hide();
        }
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {
            jqxhr.abort();
            sb.hide();
        });
    }
}
function handleFileUpload(files,obj)
{
   for (var i = 0; i < files.length; i++)
   {
        var fd = new FormData();
        fd.append('Filedata', files[i]);
 
        var status = new createStatusbar(obj); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
        sendFileToServer(fd,status);
 
   }
}
$(document).ready(function()
{
var obj = $(".dragandrophandler");
obj.on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
    //$(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e)
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e)
{
 
    $(this).css('border', '1px dotted #0B85A1');
	 $(this).css('background', '#A3C3FF');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj);
});
$(document).on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e)
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '1px dotted #0B85A1');
  obj.css('background', '#A3C3FF');
});
$(document).on('drop', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});
 
});
</script>    
                                        
                                        
                                        	
									</div>
							</div>							
							</div></div></div></li>	<br/>
							
							
				<div class="_1dsp1 _4-">
					<div style="clear:both">
						<div style="float:left; width:70%;">
						<?php /* if ($html=="") {?><div style="margin-left:5px; width: 50%; float:left"><?php echo "<strong>Bạn chưa đăng banner</strong>"?></div><?php }*/?>
						
                        <div style="float:right;" class="huongdan"></div>
                        <div style="width:40%;float:right;" id="uploadbanner"><input type="button" id="uploader" class="uploadbanner" ></div>
						<div style="clear:both"></div>
						</div>
						<div style="float:right; width:30%;">
						<div style="text-align:right; padding-right:5px;"><a onclick="addbannerfree('<?php echo $PATH_ROOT;?>modules/upload/addbanner.php','','','','');"><button type="button" class="insertbanner _11b" id="insertbanner">Đăng banner</button></a> </div>
						</div>	
					</div>	
                    
                    <div style="clear:both"></div>
                <div class="rulebanner">
							<strong>1.</strong> Nhập link cần quảng cáo vào<br/>
							<strong>2.</strong> Click vào icon máy ảnh để upload banner<br/>
							<strong>3.</strong> Bấm vào nút "Đăng Banner" để hoàn thành<br/>
							<strong>4.</strong> Chỉ banner của 10 người cao điểm nhất được hiển thị<br/>
							<strong>5.</strong> Đăng banner có kích thước 300x150<br/>
							<strong>6.</strong> Thay đổi banner: xóa banner cũ upload lại banner mới<br/>
							<strong>7.</strong> Không upload ảnh vi phạm pháp luật Việt Nam<br/>
							<strong>8.</strong> Top 10 thành viên đang có banner hiển thị: xem bên phải <br/>
							<strong>9.</strong> Khi kéo xuống thì banner của người có điểm > 0 sẽ xuất hiện <br/>
							</div>
				</div>				
				</div>
				<div id="linkImageBanner" style="display:none"></div>
				
				<?php 
				echo $html;
				?>		
					<script type="text/javascript">
					   var uploader = document.getElementById('uploader');
					   upclick(
						 {
						  element: uploader,
						  action: 'uploadfile.php', 
						  onstart:
							function(filename)
							{
							  
							},
						  oncomplete:
							function(response_data) 
							{
							  $("#reviewbannerupload").html("<img src='"+response_data+"' width='240px'/>");
							  $('.dragandrophandler').html('<img class="hinhup" src="'+response_data+'"/><br/><a onclick="xoaanh()" class="xoaanh">x</a>');
							  $("#linkImageBanner").html(response_data);
							  $("#reviewbannerupload").show();							  
							}
						 });
					</script>
					<!-- show table edit banner -->
				
				<!-- end show table edit banner -->
				<?php /* End Upload Banner */?>
				</div>
				<div class="mainright" id=="mainright">
				<div style="float:left; width:47%;height:160px;margin:0 0 10px 10px"><img src="<?php echo FULLDOMAIN;?>/images/advertising/784x250-banner-faceseo.jpg"  height="100%" width="100%"/></div>
				
				<div class="lfloat colchat" id="colchat">
				<div class="tchat"><img src="<?php echo FULLDOMAIN;?>/images/button/icongroup.png" /> | Chat group</div>
				</div>
				<div id="rightCol" aria-label="Reminders, people you may know, and ads" role="complementary">
				<?php 
				$btd = substr($infoUser['birthday'],0,5);
				$today=date("m/d");
				$checkbtd = false;	
				if ($today==$btd){
				?>
				<div id="birthday"><a href="javascript:confirmshareBirthday();"><img src="images/css/birthday.gif" /></a></div>
				<?php } ?>
				<!--<a href="javascript:confirmshare()"><img src="images/event/share-hoi-seo-seo-banner-event-fs.png" width="100%"/></a>-->

				<!--<div class="uiSideHeader" style="height:20px"><div style="float:left;width:79%"><strong><a rel="ttipsy" href="javascript: openLinkMenu('http://<?php echo DOMAIN;?>/modules/upload/banner.php')" >Banner miễn phí</a></strong></div><div style="float:right; width:20%; position:relative"><div style="position:absolute; top:-10px; right:-10px;"></div></div></div>-->
				<div class="tchat">Quảng cáo | <img src="<?php echo FULLDOMAIN;?>/images/css/icon-ads.png" /></div>
				<div id="bannerfree">
				<?php
					$con=mysqli_connect($host,$user,$pass,$db);
					$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,10");	 //idBannerStart		
					while ($row = mysqli_fetch_array($result))
					{				
						echo '<div style="position:relative;" id="dbanner'.$row['banner_id'].'">';
						$infosUser=getUserInfo($row['banner_user_id']);
						if (strpos($row['banner_img'], DOMAIN."/images")==true)
						{
							if (checkAvailableLinks($row['post_url'],$id_user))
								echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='width:100%' src='".$row['banner_img']."' /></a><br/>";		
							else
								echo "<img style='width:100%' src='".$row['banner_img']."' /><br/>";		
						}	
						if ($row['banner_user_id']==$idUser || $infoUser['user_manager']>2)
							echo '<div class="delBannerById" onclick="return delBannerById('.$row['banner_id'].');">D</div>';
						echo "</div>";
					}
					mysqli_close($con);	
				?>
				</div>
				
				<div id="loadBannerFree"></div>
				<!--<div><br/><strong>Điểm =0 => banner 0 hiển thị</strong></div>-->
			</div>
				</div>
				<div class="clearfix"></div>
				</div>
				
				
		</div>	
<div style="position:fixed;top:78px;right:3px; background:#fff; width: 16%;">
<!--
<a target="_blank" href="http://faceseo.vn/seo/dang-ki-hoi-thao-seo-2015-hcm/" title="QC BANNER 10TR/THÁNG"><img src="images/event/standee-hoi-thao-seo-2015-faceseo-vinalink.jpg" width="100%" /></a>
<a target="_blank" href="http://thucphamdouong.net/" title="QC BANNER 10TR/THÁNG"><img src="images/advertising/sponsor/banner_ruou.jpg" width="100%" /></a>
<br/>
-->
</div>	
			<div class="btscrolltop"><a href="javascript:uptoTop();"><img src="<?php echo FULLDOMAIN;?>/images/button/up.png" width="100%" style="width:48px; height:48px"/></a></div>
			<div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo miễn phí<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="images/css/dmca_protected_sml_120m.png" alt="DMCA.com"></a></div>
		
		</div>
	</div>
</div>
</div>

<div id='display'>
</div>
<div id="msgbox">
</div>
<div id="notify_content_wrapper" >
</div>
<div id="numnotify"></div>	
<div id="arrayIdPost" style="display:none;">
<?php 
foreach ($arrPostDisplay as $itemarray)
echo $itemarray.",";
?></div>	
<div id="checkLink" style="display:none;">-1</div>
<div id="mypostid" style="display:none;"></div>
<div id="idgroup" style="display:none;"><?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?></div>
<?php 

if($id_user=="-1" && LOCAL!="TRUE" ) 
{
?>


<div id="myModal" class="linhnguyen-modal">
<link rel="stylesheet" href="css/body.css" type="text/css" />
<div id="loginform">
<div id="butonlogin">
<a href="<?php echo $loginUrl; ?>"><img src="images/css/button-faceseo-login.png"></a>
</div>
</div>
	<a class="close-linhnguyen-modal">X</a>
</div>
<?php }?>

<div class="overlay" style="display: none;">
	<div class="sharepoint-wrapper">
		<div class="sharepoint-content">
			
			<h3>CHIA SẺ ĐIỂM</h3>
			<form method="post" action="sharepoint.php">
				<label for="username">
					Nhập tên:
					<!-- <input type="text" name="nametoshare" id="username" placeholder="@Linh Nguyen" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />-->
					<input type="hidden" class="mentionsHidden0000" value="">
					<div id="fslisttags0000" class="namereceivepoint"><div class="boxtagfullsecond"><div contenteditable="true" data-ph="@Linh Nguyen" data-he="cmt-content0000" class="content-namereceivepoint tagnameboxinput" id="contentbox0000"></div><div id="display0000" class="boxtag"></div><div id="msgbox"></div></div></div>
				</label>
				<label for="password">
					Số điểm:
					<input type="text" name="numpointshare" class="numpointshare" id="numpointshare" placeholder="500" pattern="^[0-9]{1,8}$" required="required" value="500" />
				</label>
				<button type="button" class="submit">Chia sẻ</button>
				<button type="button" class="close">Hủy</button>
				
			</form>
		</div>
	</div>
</div>


<!--<link rel="stylesheet" href="http://giaiphapthuonghieu.vn/miniapps/popuponload/linhnguyen.css">	-->
<script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>	
<script type="text/javascript" >
	var xxyyzz=<?php echo $xxyyzz;?>;
	jQuery(window).load(function() {
		/*if(document.cookie.indexOf("adf") == -1)*/
		{
			document.cookie = "popunder1=adf";
			jQuery('#myModal').linhnguyen(jQuery('#myModal').data());
		}
	});
	

</script>

<!-- add popup -->
<script>
// getNumuNotifyComment(root_path + "modules/checkNotify.php",idUser);
//save post start and post end
var arrayIdPost = new Array();
var idDivPostStart = 0;
var currentIdLoadPost = idDivPostStart;
var idMaxPostOnpage = 5;
function initArrayIdPost()
{
	arrayIdPost = new Array();
	strIdPosts  = "";
	var i=0;
	$("div[id^='postcontent']").each(function(){
		var id = parseInt(this.id.substring(11));
		arrayIdPost[i]=id;
		if (i===0)
			strIdPosts = id;
		else
			strIdPosts = strIdPosts + "," + id;
		i=i + 1;
	});
	arrayIdPost.sort();
	idMaxPostOnpage = i;
}
function loadComment(url)
{    
	if (arrayIdPost.length>0)
	{
		autoLoadComment(url,parseInt(arrayIdPost[currentIdLoadPost])); 	
		currentIdLoadPost = currentIdLoadPost + 1;	
		if (currentIdLoadPost >=idMaxPostOnpage)
			currentIdLoadPost = idDivPostStart;	
	}
}
setInterval("loadComment('" + root_path + "content_comment.php')",5000);
/*setInterval("loadNumView()",30000);*/
setInterval("getListUserViewing()",30000);
function generateTokenPost()
{
	<?php 	
			$date = date("d/m/yy"); 
			$shortDay= str_replace("/","",$date);
			$time= time() + 3000;
			$time=$time.$shortDay;
	?>
	$token='<?php echo $time ;?>';
	return $token;
}
function generateToken()
{
	<?php 	
			$date = date("d/m/yy"); 
			$shortDay= str_replace("/","",$date);
			$time= time() + 1800;
			$time=$time.$shortDay;
	?>
	$token='<?php echo $time ;?>';
	return $token;
}

</script>
<script>
var isEnter=true;
var clickButtonPush = true;
$(function(){
$(document).on('mousedown', function (e) {   	
	if($(e.target).parents().index($('#notify_content_wrapper')) == -1) {
        if($('#notify_content_wrapper').css('display') != 'none' ) {
            $('#notify_content_wrapper').hide();
			clickButtonPush=false;
        }
    };
	
	var idP=-1;
	var idPost=-1;
	$(".boxtag").each(function(){
		if ($(this).css('display')!='none')
			if($(this).find('.addname')!=null)
			{
				idPost=$(this).find('.addname').attr('id');
				idP=idPost.substring(7);
			}
	});
	if(idP!=-1&& ($(e.target).parents().index($("#display"+idP)) == -1)) {
        if($("#display"+idP).css('display') != 'none' ) {
           $("#display"+idP).hide();
        }
    }
});
$( "#fbNotificationsJewel" ).click(function() {
	if($('#notify_content_wrapper').css('display') == 'none' && clickButtonPush==true)
	{
		window.idNotifyStart=0;
		$('#notify_content_wrapper').html("");
		$('.icon-comment').css("display","none");
		notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
		$("#notify_content_wrapper").show();
	}
	else
	{
		$('#notify_content_wrapper').hide();
	}
	clickButtonPush = true;
});
$( "#iconemailbutton" ).click(function() {
	if($('#notify_content_wrapper').css('display') == 'none' && clickButtonPush==true)
	{
		window.idNotifyStart=0;
		$('#notify_content_wrapper').html("");		
		$('.icon-email').css("display","none");
		notifyEmail(root_path + "modules/notifyemail.php",idUser,window.idNotifyStart);
		$("#notify_content_wrapper").show();
	}
	else
	{
		$('#notify_content_wrapper').hide();
	}
	clickButtonPush = true;
});


$( "#fsAnaylyticsButton" ).click(function() {
	TINY.box.show({url:'modules/statist_inday.php',width:700,height:500},'Thống kê Click','titlepopup'); refreshIntervalId = setInterval(startTime('modules/statist_inday.php',''), 5000); return false;
});

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

$(document).on('click', '.display_box', function()
{	
	var username=$(this).find('.addname').attr('title');	 
	var start=/@/ig;
	var word=/@(.*)/ig;
	var idPost=$(this).find('.addname').attr('id');
	var idP=idPost.substring(7);
	var old=$("#contentbox"+idP).html();
	var content=old.replace(word,"");
	$("#contentbox"+idP).html(content);
	var E="<a class='highlighter' contenteditable='true' href='#' ><b>"+username+"</b>· </a> ";
	var curITags=$(".mentionsHidden"+idP).val();
	var newTagsName = $(this).data('uid');
	if (curITags=="")
		$(".mentionsHidden"+idP).val(newTagsName);
	else
		$(".mentionsHidden"+idP).val(curITags + "," + newTagsName);
		
	$("#contentbox"+idP).append(E);	
	var them=$("#contentbox"+idP).text().length;
	//$("#contentbox"+idP).focus(them);
	//$("#contentbox"+idP).setCursorToTextEnd();
	$("#display"+idP).hide();
	$("#msgbox").hide();
	return false;
});

$(document).on('click','.uploader',function( ) {
	// alert($(this).id);
	var id=$(this).attr("id");
	var idPost = id.substring(8);
	var uploader = document.getElementById(id);
	upclick(
	 {
	  element: uploader,
	  action: root_path + 'modules/uploadimagecomment/uploadfile.php', 
	  onstart:
		function(filename)
		{
		 
		},
	  oncomplete:
		function(response_data) 
		{
		  $("#imgSrc"+ idPost).html("<img src='"+response_data+ "' />");
		}
	 });
	
});
$(document).on('click', '.UFILikeLink', function() {
var idLike=$(this).attr('id');
var divLikeId=idLike.substring(7);
var idCmt = parseFloat(divLikeId);
divLikeId = '#statuslike' + divLikeId;
var htmlStr = $(this).html();
htmlStr=htmlStr.trim(htmlStr);
addLikeToDB('save_like.php',idCmt,<?php echo $id_user; ?>);
var htmlStr11=htmlStr.substring(0,6);
if (htmlStr11.search('Like')>-1)
{
	var numlike = 1;
	var bonus=1;	
	if (htmlStr.search('numlike')>-1)
	{
		numlike=parseInt(document.getElementById('numlike'+idCmt).innerHTML) + bonus;
		$(divLikeId + ' span').remove();
		$(divLikeId + ' i').remove();
		$(divLikeId + ' span').remove();
		$(this).html("Unlike"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
		//$(divLikeId).append('<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
	
	}
	else
	{
		$(this).html("Unlike"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">1</span>');
	}

}
if  (htmlStr11.search("Unlike") >-1)
{
		var numlike = 1;
		var bonus=-1;
		if (htmlStr.search('numlike')>-1 && parseInt(document.getElementById('numlike'+idCmt).innerHTML)==1)
		{
			$(divLikeId + ' span').remove();
			$(divLikeId + ' i').remove();
			$(divLikeId + ' span').remove();
			$(this).html("Like");
		
		}
		else
		{
			numlike=parseInt(document.getElementById('numlike'+idCmt).innerHTML) + bonus;
			$(divLikeId + ' span').remove();
			$(divLikeId + ' i').remove();
			$(divLikeId + ' span').remove();
			$(this).html("Like"+'<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike'+idCmt+'">'+numlike+'</span>');
		}
		
};
});
/* css tooltip */
$('a[rel=westtipsy]').tipsy({fade: true, gravity: 'w'});
$('a[rel=ttipsy]').tipsy({gravity: 's'});
$('a[rel=btipsy]').tipsy({gravity: 'n'});
$('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});

});
var li ;
var liSelected;
$('body').on('keyup','textarea,.contentbox,.content-namereceivepoint', function(e) {
	/*$('textarea').on('keydown',function(e){*/
	
	var maxCharLineComment = 50;
	var maxCharLineComment1 = 61;
	var lineHeight = 20;
	var tb = $(this);		
	$('#comment-content-1').html(tb.text());	
	if (tb.text().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.text().length/maxCharLineComment);
		$( this ).css("height", line*lineHeight + "px");
		
		var line1= 1 + parseInt(tb.text().length/maxCharLineComment1);
		var tenclass=$(this).data('he');
		$( '.'+tenclass ).css("height", line1*lineHeight + "px");
		
	}
	var charpressed= getChar(e.keyCode);
	var start=/@/ig;
	var word=/@(.*)/ig;
	var content= tb.text();
	var go= content.match(start);
	var name= content.match(word);
	var idTextArea=$(this).attr('id');
	var idArt=idTextArea.substring(10);
	var dataString = 'searchword='+ name + '&idPost='+idArt;
	if(e.keyCode==50)
	{
		boolStartFindName=true;	
	}
	if (boolStartFindName && go!=null && go.length>0 && name!="@" && name!="@ " && name!="@  " && e.keyCode!=40)
	{
		$("#msgbox").show();
		$.ajax({
					type: "POST",
					url: "boxsearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						var position = $("#contentbox"+idArt).position();
						var newpos =  position.top + $("#contentbox"+idArt).height();
						if (html== "" || html.trim(html)=="")
						{
							$("#display"+idArt).slideUp('show');
							$("#display"+idArt ).css("top", line1*lineHeight + "px");
						}
						$("#display"+idArt).html(html).show();
						li = $('.display_box');
						liSelected = null;
					}
					});
		
	}
    if (e.keyCode == 13 && (isEnter==true) && $(this).attr('id')!= "textcomment") {
		idArt = parseFloat(idArt);
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();			
		var token = generateToken();
		var listTags= $(".mentionsHidden"+idArt).val();
		var textCmt=tb.text();
		textCmt=textCmt.replace("###"," ###");
		addLinkToDb(url1,<?php echo $id_user; ?>,textCmt);
		addCmtToDb(url,idArt,textCmt, $("#imgSrc"+idArt).html(), imgLogo, name, idUser, token);		
        subPoint(idUser,sidUser,-5,textCmt);
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,textCmt + $("#imgSrc"+idArt).html(),0,listTags);
		$("#imgSrc"+idArt).html("");
		$(this).html("");	
		$(this).css("height","20px");
		boolStartFindName = false;
		$(this).html("");
        return false;
    }
});
/*
	$('body').on('keydown','textarea', function(e) {
	//$('textarea').on('keydown',function(e){
	var maxCharLineComment = 50;
	//alert("abc");
	var lineHeight = 20;
	//var tb = document.getElementById("scriptBox");
	var tb = $(this);		
	$('#comment-content-1').html(tb.val());	
	if (tb.val().length> maxCharLineComment)
	{
		var line= 1 + parseInt(tb.val().length/maxCharLineComment);
		//document.getElementById("scriptBox").style.height=line*lineHeight + "px";				
		$( this ).css("height", line*lineHeight + "px");
	}
	<!-- add code tag friend -->
	//alert("bbb");
	var charpressed= getChar(e.keyCode);
	var start=/@/ig;
	var word=/@(.*)/ig;
	var content= tb.val() + charpressed;
	var go= content.match(start);
	var name= content.match(word);
	
	var dataString = 'searchword='+ name;
	//	
	if(e.keyCode==50) // check key @
	{
		boolStartFindName=true;	
	}
	if (boolStartFindName)
	{
		//alert(dataString);	
		$("#msgbox").slideDown('show');
		$.ajax({
					type: "POST",
					url: "boxsearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
						//alert(html);
						if (html== "" || html.trim(html)=="")
						{
							$("#display").slideUp('show');
							$("#msgbox").html("No result...");

						}
						$("#display").html(html).show();
						$("#msgbox").remove();	
						
					}
					});
		
	}
	<!-- add code tag friend -->
    if (e.keyCode == 13 && $(this).attr('id')!= "textcomment") {
		var idTextArea=$(this).attr('id');
		var idArt=idTextArea.substring(9);
		idArt = parseFloat(idArt);
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();
		// var numdiv= $('#lastCommentPost'+idArt).html();
		// var idCmtNext =0;
		// if(numdiv!="")
		// idCmtNext= parseInt(numdiv)+1;			
		var token = generateToken();
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.val());
		addCmtToDb(url,idArt,tb.val(), $("#imgSrc"+idArt).html(),imgLogo,name,idUser , token);		
        subPoint(idUser,sidUser,-5,tb.val());
		addNotify(url_notify,idUser,name,imgLogo,idArt,0,tb.val() + $("#imgSrc"+idArt).html(),0);
		$("#imgSrc"+idArt).html("");
		$(this).val("");	
		$(this).css("height","20px");
		boolStartFindName = false;
        return false;
    }
});
*/
function getFile(){
        document.getElementById("upfile").click();
}

function startTime(url,link)
{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		if (s%5==0)
		{
			loadStasticLink(url,link);
		}
		if (document.getElementById("timeclock"))
		{	
			document.getElementById('timeclock').innerHTML=h+":"+m+":"+s;							
		}
		else
		{
			initScrollbar();
			setScroll=0;			
		}	
		if(setScroll<3)
			initScrollbar();		
		timeoutStasticClick=setTimeout(function(){startTime(url,link)},1000);	
}
function initScrollbar()
{
	setScroll++;
	$('.nano').nanoScroller({
		preventPageScrolling: true
	});
}

function initNotifyComment()
{
	updateNotify(root_path + "modules/update_notify.php",idUser);
	  $('.notify').nanoScroller({		
		preventPageScrolling: true
	  });	  
	$(".notify").bind("scrollend", function(e){
		if(!($("#stop").length > 0))
		{
		window.idNotifyStart=window.idNotifyStart + 10;
		notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
		}
	});
	
}

function initNotifyEmail()
{
	updateNotify(root_path + "modules/update_notify.php",idUser);
	  $('.notify').nanoScroller({		
		preventPageScrolling: true
	  });	  
	$(".notify").bind("scrollend", function(e){
		if(!($("#stop").length > 0))
		{
		window.idNotifyStart=window.idNotifyStart + 10;
		notifyEmail(root_path + "modules/notifyemail.php",idUser,window.idNotifyStart);
		}
	});
	
}


function checkTime(i)
{
	if (i<10)
	  i="0" + i;
	return i;
}
</script>
<script type="text/javascript">
    var r = true;  
window.onbeforeunload = function() {
	if (window.iswiewing == true)
		return "Bạn đang view. Tắt sẽ không được cộng điểm. Bạn có muốn tắt không?";
	//else
		//window.close();
}	
/*
    $(window).bind('beforeunload', function(){
			var currentWarningNum = parseInt($("div #numwarning").html());
				var numwarning = currentWarningNum + 1;				
			if (window.iswiewing == true)
			{
				r=confirm("Trong khi bạn đang view đừng tắt FaceSeo. Nếu tắt bạn sẽ bị ban khỏi hội. Vui lòng bấm cancel. Thông báo tiếp theo bấm Stay on Page");
				addWarning(root_path+ "modules/add_warning_out_view.php",idUser,1,numwarning);
                        if(r==true)
			{				
				window.close();
			}
			else
			{								
				r=true;
				setTimeout("addWarning('" + root_path + "modules/add_warning_out_view.php'," + idUser + ",1," + currentWarningNum + ')',20000);
				return "Trong khi bạn đang view đừng tắt FaceSeo. Vui lòng bấm Stay on Page. Nếu không sẽ bị remove khỏi hội";			
			}			
}
			
    });
*/
	
function scrolToComment(idPost,idCmt)
{
	$('#notify_content_wrapper').hide();
	if ($(".commentid"+idCmt).length == 0 )
		getPostById(idPost);		
	updateNotify(root_path + "modules/update_notify.php",idUser);
	if ($(".commentid"+idCmt).length > 0 )
	{
		
		$('html, body').stop().animate({
		'scrollTop': $(".commentid"+idCmt).offset().top - 100
		}, 600, 'swing', function () {
		});
	}
}
function uptoTop()
{	
	$('html, body').stop().animate({
	'scrollTop': $("#contentCol").offset().top - 100
	}, 600, 'swing', function () {
		/*$(".btscrolltop").css("display","none");*/
	});
};
function scrolToMessage(idPost,idCmt)
{
	$('#notify_content_wrapper').hide();
	if ($(".commentid"+idCmt).length == 0 )
		getMessageById(idPost);		
	updateMessage(root_path + "modules/update_message.php",idUser);
	getNumMessage(root_path + 'modules/getNumMessage.php',idUser);
	if ($(".commentid"+idCmt).length > 0 )
	{
		$('html, body').stop().animate({
		'scrollTop': $(".commentid"+idCmt).offset().top - 100
		}, 600, 'swing', function () {
		});
	}
};

var currentPagePost = 0;
var currentPageBanner = 0;
$(document).ready(function(){			
		  		
		$(window).scroll(function(){		
		  if  (($(window).scrollTop() == $(document).height() - $(window).height()) && (isloading==false) ){			
			loadOtherPost() ;
			loadOtherBanner();
		  }
		});	
		
		$(window).bind('scroll', function() {
	    var navHeight = $( window ).height() - 50;
			 if ($(window).scrollTop() > navHeight) {
				 $('#colchat').addClass('fixed');
			 }
			 else {
				 $('#colchat').removeClass('fixed');
			 }
		});
});

var isloading=false;
function loadOtherBanner()
{
	currentPageBanner = currentPageBanner + 1;
	isloading = true;
	$.post('modules/advbanner/index.php',{currentPageBanner:currentPageBanner},			
	function(data){
		if (data != "") {
			$("#bannerfree").append(data);			
		};
		isloading = false;
	});
}
function loadOtherPost() 
{ 		  
	isloading = true;
	$('div#last_msg_loader').html('<img src="images/css/loading-google.gif" />');
	getOtherPosts(<?php if (isset($_GET['idgroup'])) echo $_GET['idgroup']; else echo 0; ?>);
	$(".btscrolltop").css("display","block");
};
$(".postcontent").on('mouseover',function() {
});
$( "#closelink" ).click(function() {
		$("#linkneedview").hide();
		$("#closelink").hide();
});
</script>
<script src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.fbjlike.1.4.js"></script>
<script type="text/javascript">
function confirmlink( link ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/confirmlike.php?link="+link,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=500, width=500, height=400");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);
	}
};

function confirmgplus(link,id){var windowLike=window.open(root_path + "confirmgplus.php?link="+link,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=500, width=550, height=500");windowLike.onbeforeunload=function(){getPoint(root_path+"get_point.php",idUser);var iframe=document.getElementById('iframegplus'+id);iframe.contentWindow.location=iframe.src}};
function fsGShare(url,token) {
	var resultstart=0;
	var callAjx=0;
	var windowLike;
	$.ajax({
        url: root_path + 'modules/json_getshareg.php',
		data: {url:url},
		type: 'POST',
        success: function(response) {
            resultstart = response;
			
        }
    });
	var windowLike=window.open(url,"_blank","toolbar=no, scrollbars=yes, resizable=yes, top=500, left=400, width=800, height=600");
	var pollTimer = window.setInterval(function() {
		if (windowLike.closed !== false && callAjx===0) {
				callAjx = 1 ;
				$.ajax({
				url: root_path+'modules/json_checkshareg.php',
				data: {url:url,numShare:resultstart,token:token},
				type: 'POST',
				success: function(response) {
					getPoint(root_path + "get_point.php",idUser);
					window.clearInterval(pollTimer);			
				}
			});
		}
	}, 3000);
};
function confirmshare( ) {
	var windowLike=window.open(root_path + "share-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);
	}
};
function fsshare(link,linkimg,token ) {
	var windowLike=window.open(root_path + "fbshare.php?link="+link+"&linkimg="+linkimg+"&token="+token,"_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path+"get_point.php",idUser);
	}
};
function confirmshareBirthday( ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirmshareBirthday( ) {
	var windowLike=window.open("http://<?php echo DOMAIN;?>/share_birthday.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
		$("#birthday").remove();	
	}
};

function confirm83( ) {
	var windowLike=window.open(root_path + "share-8-3-faceseo.php","_blank","toolbar=no, scrollbars=no, resizable=yes, top=500, left=400, width=650, height=600");
	windowLike.onbeforeunload = function(){ 
		getPoint(root_path + "get_point.php",idUser);	
	}
};
</script>

<script>
<?php if ($_SESSION['token-user']!=""){ ?>
		isUserLogined = true;
<?php };?>
</script>

<script>

function addPoint(url,linkClicked,idUser,point)
{	
	<?php
		$dm = date("d/m");
		$s1= intval(date("s")) + 3;
		$shortDay= str_replace("/","",$dm);
		$User1=intval($_SESSION['session-user']) * intval($shortDay);
		$strtoken1=$_SESSION['session-user'].$shortDay.$User1.$s1;
		$token1 = MD5($strtoken1);
		
	?>
	var tkap="<?php echo $token1;?>";
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&point=" +point + "&linkClicked="+ linkClicked+"&token="+tkap;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	var oldPoint=parseInt($("#numpoint").html());
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			var padd=parseInt(xmlhttp.responseText) - oldPoint;
			if (padd>0)
				effectAddPoint(oldPoint,padd,0);
			else
				effectSubPoint(oldPoint + padd,-padd);
			//effectAddPoint(oldPoint,parseInt(xmlhttp.responseText) - oldPoint,0);
		}
	};
  xmlhttp.send(params);
};

function effectSubPoint(pcurrent,psub) {
	var arr = pcurrent + psub;
	if (psub < 0) {
		return;
	};
	$("#numpoint").html(arr);
	setTimeout(function() {
		effectSubPoint(pcurrent,--psub);
	}, 1000/psub);
};
function effectAddPoint(pcurrent,time,p) {
	var arr = pcurrent + p;
	if (time < 0) {
		return;
	};
	$("#numpoint").html(arr);
	setTimeout(function() {
		effectAddPoint(pcurrent,--time,++p);
	}, 1000/time);
};



$('body').on("mouseover",".UFIComment",function(){
	$(".cmtclose").css("display","block");
})
$('body').on("mouseout",".UFIComment",function(){
	$(".cmtclose").css("display","none");
})

</script>

<!--
getOtherUrlsProfile comment.js chưa getidpage, sau khi get về chưa có hàm showlistprofileaddmore

Danh sách link profile chưa hiển thị đúng, chưa kiểm tra những link nào đã view, chưa get được orther link tối phải xong phần này và addon
Vấn đề hiển thị notify không đúng. Đôi khi người ta like cho những comment cũ thì id của comment đó sẽ nhỏ hơn id comment cũ
-> lưu vào database của atw_notify sẽ không đúng. [fixed]

Search upclick.js mo rem de su dung upload file 
Đá banh về xử scrolToComment. Còn bị lỗi khi post đã được user đó click vào rồi thì không thể nào hiện lên được. Giờ cho nó hiện lên và del tất cả link để không view được nữa.
Một số yêu cầu với sever: chạy được fbapi, chạy được php mới, cân bằng tải load balance
Trong khi một số link đang view. Post link mới sẽ bị sai id
When open popup with https function beforeunload not working so using interval to check status share.
http://stackoverflow.com/questions/3291712/is-it-possible-to-open-a-popup-with-javascript-and-then-detect-when-the-user-clo
-->
<style>
@media screen and (-webkit-min-device-pixel-ratio:0) {
	#leftCol { margin-top:65px;  }
}
</style>
<!-- Google Code for Chuy&#7875;n &#273;&#7893;i Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 955236604;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "DJyXCN2Fi1oQ_IG_xwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/955236604/?label=DJyXCN2Fi1oQ_IG_xwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<script>
$( ".huongdan" ).click(function() {
	if($(this).hasClass("anhuongdan")){
	   $(this).removeClass('anhuongdan');
	   $('.rulebanner').css('display','none');
	}else {
	   $(this).addClass('anhuongdan');
	   $('.rulebanner').css('display','block');
	}
});

</script>
<script>
processForMobile();
DisPlayPostReported();
<?php if ($_SESSION['token-user']!=""){ ?>
		isUserLogined = true;
<?php };?>
</script>
<style>
.UFIRow .UFIImageBlockContent {
    margin: 0;
    padding: 0 0 0 8px;
    width: 89%;
}
._2yg {
    border: medium none;
    height: auto;
}
.UFIImageBlockImage img{
	border-radius:100%;
}
.eg {
    background-color: white;
    border-top: 1px solid #BDC7D8;
    box-shadow: 2px 2px 4px 0 rgba(0, 0, 0, 0.04) inset;
    cursor: text;
    display: none;
    height: 15px;
    left: -15px;
    position: absolute;
    top: -1px;
    width: 20px;
	display:block;
}

.yw {
    height: 0;
    position: absolute;
    width: 0;
}
.VK {
    border-bottom: 15px solid #edeff4;
    border-right: 15px solid transparent;
    left: -1px;
}
.oo {
    border-bottom: 16px solid #BDC7D8;
    border-right: 16px solid transparent;
    left: -1px;
    top: -1px;
}
.uiTypeahead {
    margin-left: 10px;

}
#insertbanner{
	background: -moz-linear-gradient(center top , #6f9bed 0%, #427fed 100%) repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
    border: 1px solid #427fed;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    padding: 0 5px;
}

.hinhup{max-height: 330px;
    position: relative;
    top: 30%;
}
.xoaanh{
 background: none repeat scroll 0 0 #f00;
    border-radius: 50%;
    color: #fff;
    display: table;
    font-size: 24px;
    position: absolute;
    top: 50%;
    width: 25px;
}
#UFIList-Cmt-Input:hover .VK{
border-bottom: 15px solid #E5E5E5;
}
#linkbanner{
	margin-left:5px;
}
.uiTypeahead:hover .eg{
border-top: 1px solid #3b5998;
}
.uiTypeahead:hover .oo{
border-bottom: 16px solid #3b5998;
}
._1dsp1 {
	position:static;
}
#uploadbanner .uploadbanner {
    background: url("taimaytinh.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-style: none;
    height: 29px;
    padding: 0;
    width: 146px;
	cursor:pointer;
}
.huongdan {
    background: url("huongdan.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-style: none;
    height: 29px;
    padding: 0;
	float:left;
	cursor:pointer;
    width: 146px;
}
.rulebanner{
	display:none;
}
.anhuongdan{
   background: url("tathuongdan.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
}
#listBanner thead{
	background:#F4F4F8;
	color:#FC1618;
}
#listBanner{
	  box-shadow: none;
    width: 99%;
}
.xoabn{
	background: url("xoabn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: block;
    height: 24px;
    margin: 0 auto;
	cursor:pointer;
    text-align: center;
    width: 24px;
}
.bge{
	background:#F4F5F9;width: 80px;
}
.bgf{
	background:#FFF;
	
}
.bgi{
	background:#fff;
	width:140px;
}
#listBanner td{
	border:1px solid #FFFFFF;
	padding:20px;font-size: 15px;
}
.bnner img{
	max-width:135px;
}
#reviewbannerupload{
	max-width:300px;
	margin:0 auto;
}
#bannerfree{text-align:center;}
</style>

</body>
</html>