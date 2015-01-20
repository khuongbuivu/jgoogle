<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../../definelocal.php");
include_once("../../define.php");
include_once("../../time.php");
include_once("../../config.php");
include_once('../../fcomment.php');
require_once('../../system/function.php');
global $host;
global $user;
global $pass;
global $db;
$token = md5(microtime(TRUE) . rand(0, 100000));
$_SESSION['token'] = $token;
$con=mysqli_connect($host,$user,$pass,$db);
$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=$id ORDER BY Id DESC ");
//$linhnguyen = $facebook->api('/linh.nguyen');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://plus.google.com/u/0/111756378553641206176' rel='author'/>
  <meta name="keywords" content="hệ thống câu view, seo website, giải pháp seo website, phần mềm Seo," />
  <meta name="description" content="FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Hệ thống câu view, kiểm soát view, chuyển trang, chèn banner quảng cáo, backlink hoàn toàn free." />
  <title>FaceSeo.Vn Mạng Tương Tác Dành Cho Seoer | Giải Pháp Thương Hiệu</title>

<script type="text/javascript">
<?php if(LOCAL=="TRUE"): ?>
var root_path = "http://localhost/faceseo.vn/";
<?php else: ?>
var root_path = "http://faceseo.vn/";	
<?php endif ?>
var idUser=<?php echo $id_user; ?>;
var timeoutStasticClick,setScroll=0;
var refreshIntervalId=0;
var timetmp=0;

</script>
<?php /*<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>*/?>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo $PATH_ROOT;?>modules/upload/upclick.js"></script> <!-- for upload file -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/tinybox.js"></script> <!-- for popup -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/notify.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/warning.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/banner.js"></script>
<?php /*?><script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery.tipsy.js"></script><?php */?>
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/comment.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/header.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/body.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/stylepopup.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/notify_css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/tipsy.css" type="text/css" />

<!-- Scroll bar -->
<link href="<?php echo $PATH_ROOT;?>libs/scrollbar/js/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/overthrow.min.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>libs/scrollbar/js/jquery.nanoscroller.js"></script>
<!-- end Scroll bar -->
<!-- point -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/point.js"></script>
<!-- end point -->
<!-- thanh -->
<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
<link href="http://faceseo.vn/index/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!-- end thanh -->
<!-- add scroll top comment -->
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
<!-- add scroll top comment -->
<script type="text/javascript" >	
//setInterval("autoLoadComment('" + root_path + "content_comment.php',<?php echo (int)($id) ?>)",10000);
//setInterval("B()",5000);
//setInterval("checkTabsClosed()",5000);
//setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",8000);
//setInterval("getNewPost('"+root_path + "modules/post_new.php')",10000);
//setInterval("showbannerfree('"+root_path + "modules/advbanner/index.php'," + idUser + ")",60000);


</script>
<!-- show popup-->
<!--
<link rel="stylesheet" href="http://giaiphapthuonghieu.vn/miniapps/popuponload/linhnguyen.css">			
<script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>	
<script type="text/javascript" >
	$(window).load(function() {
	  $('#myModal').linhnguyen($('#myModal').data());
	});
</script>	
-->
<!-- show popup-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>	
<body class="fs hasLeftCol _57_t noFooter hasSmurfbar hasPrivacyLite gecko win Locale_en_US" >
<div id="container">
<?php
include_once("../../header.php");
include_once("../../user.php");
?>
<div id="globalContainer" class="uiContextualLayerParent">
	<div id="content" class="fb_content clearfix" style="min-height: 100px;" data-referrer="content">
		<div>
		<div id="mainContainer">
			<div id="leftCol">
              <ul class="icon-setting">
                <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT; ?>')"><span class="icon-set icon-home"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=1"; ?>');"><span class="icon-set icon-gplus"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."group.php?idgroup=2"; ?>');"><span class="icon-set icon-connect"></span> </a></li>
               <li><a href=""><span class="icon-set icon-share"></span> </a></li>
               <li><a href=""><span class="icon-set icon-acong"></span> </a></li>
               <li><a href="javascript: openLinkMenu('<?php echo $PATH_ROOT."pagesetting.php"; ?>');"><span class="icon-set icon-setpanel"></span> </a></li>
               </ul>

			<!-- 
			<div class="fb-like-box" data-href="http://www.facebook.com/faceseo.vn" data-width="236px" data-height="308px"
					  data-colorscheme="light" data-show-faces="true" data-header="true"  data-show-border="true"></div>
			-->
			</div>
			<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
				<div class="messagesystem"></div>
				<div id="contentArea" aria-describedby="pageTitle" role="main">
					<div id="infopoint">					
						<div id="point">Point</div>
						<div id="warning">
						Cảnh báo: 
						</div>
						<div id="numwarning"></div>
						<div class="clearfix"></div>
					</div>
					<script>
					//getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
					getWarningNumber(root_path+ "modules/get_warning_number.php",idUser,1);
					</script>
					<!-- API FACEBOOK GET ID NAME IMG -->
					<?php
					$con=mysqli_connect($host,$user,$pass,$db);					
					$result=mysqli_query($con,"select * from  fs_banner where banner_user_id=".$id_user);
					$html = "";
					if ($result->num_rows>0)
					{
						$html = '<table width="100%"  id="listBanner">';
						$html = $html.'  <tr><td>Banner của bạn</td><td>Link</td><td>Xóa</td></tr>';
						$html = $html.'<tr>';
						while ($row=mysqli_fetch_array($result))
						{
							$html = $html. '<td><a target="_blank" href="'.$row['banner_link'].'"><img src="'.$row['banner_img'].'" /></a></td>';
							$html = $html. '<td><div id="linkbanner1">'.$row['banner_link'].'</div></td>';
							$html = $html. '<td><a onclick="delbanner(\''.$id_user.'\');">Xóa</a></td>';							
						}
						$html = $html. '</tr></table>';
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
#dragandrophandler
{
border:2px dotted #0B85A1;
width:400px;
color:#92AAB0;
text-align:left;vertical-align:middle;
padding:10px 10px 10 10px;
margin-bottom:10px;
font-size:200%;
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
</style>

                                                
                                                
                                                
                                                <div id="dragandrophandler">Drag & Drop Files Here</div>
<br><br>
<div id="status1"></div>
   <script>
function sendFileToServer(formData,status)
{
    var uploadURL ="http://localhost/faceseo.vn/modules/upload/uploadfile.php"; //Upload URL
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
 
            $("#status1").append("File upload Done<br>");        
        }
    });
 
    status.setAbort(jqXHR);
}
 
var rowCount=0;
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
     obj.after(this.statusbar);
 
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
var obj = $("#dragandrophandler");
obj.on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e)
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e)
{
 
     $(this).css('border', '2px dotted #0B85A1');
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
  obj.css('border', '2px dotted #0B85A1');
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
						<?php if ($html=="") {?><div style="margin-left:5px; width: 50%; float:left"><?php echo "<strong>Bạn chưa đăng banner</strong>"?></div><?php }?>
						<div style="width:40%;float:right;" id="uploadbanner"><input type="button" id="uploader" class="uploadbanner" ></div>
						<div style="clear:both"></div>
						</div>
						<div style="float:right; width:30%;">
						<div style="text-align:right; padding-right:5px;"><a onclick="addbannerfree('<?php echo $PATH_ROOT;?>modules/upload/addbanner.php','','','','');"><button type="button" class="insertbanner _11b" id="insertbanner">Đăng banner</button></a> </div>
						</div>	
					</div>	
				</div>				
				</div>
				<div id="linkImageBanner" style="display:none"></div>
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
							  $("#linkImageBanner").html(response_data);
							  $("#reviewbannerupload").show();							  
							}
						 });
					</script>
					<!-- show table edit banner -->
				
				<!-- end show table edit banner -->
				</div>				
				<script language="javascript" src="<?php echo $PATH_ROOT;?>js/common.js"></script> 						
				<div id="rightCol" aria-label="Reminders, people you may know, and ads" role="complementary">
				<div id="reviewbannerupload" style="float:left;width:100%;height:150px"><img src="../../images/advertising/demo-banner-free.png" width="100%"></div>
				<div id="bannerfree">
				<?php
					$con=mysqli_connect($host,$user,$pass,$db);
					$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,4");	 //idBannerStart		
					while ($row = mysqli_fetch_array($result))
					{				
						echo '<div style="position:relative;" id="dbanner'.$row['banner_id'].'">';
						$infosUser=getUserInfo($row['banner_user_id']);
						// if (strpos($row['banner_img'], "faceseo.vn/images")==true)
						{
							if (checkAvailableLinks($row['post_url'],$id_user))
								echo "<a id='banner".$row['banner_id']."' href='".$row['banner_link']."' title='".$infosUser['user_name']." :: ".$infosUser['user_point']." điểm' onclick='return openUrlBanner(this.href,".$row['banner_id'].");'><img style='max-width:100%' src='http://localhost/faceseo.vn/".$row['banner_img']."' /></a><br/>";		
							else
								echo "<img style='max-width:100%' src='".$row['banner_img']."' /><br/>";		
						}	
						if ($row['banner_user_id']==$idUser || $infoUser['user_manager']>2)
							echo '<div class="delBannerById" onclick="return delBannerById('.$row['banner_id'].');">D</div>';
						echo "</div>";
					}
					mysqli_close($con);	
				?>
				</div>
				
			</div>
		</div>
			<div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo<br/>
Website đang hoạt động thử nghiệm, chờ giấy phép MXH của Bộ TT & TT  <a title="DMCA" href="http://www.dmca.com/Protection/Status.aspx?ID=262a03ff-722e-4071-b0a3-09259dfc5843"> <img src="http://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=262a03ff-722e-4071-b0a3-09259dfc5843" alt="DMCA.com"></a></div>
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
<!-- add popup -->
<!--
<div id="myModal" class="linhnguyen-modal">
	<a href="http://faceseo.vn" target="_blank"><img src="http://giaiphapthuonghieu.vn/images/hop-offline.png" /></a>
	<a class="close-linhnguyen-modal">X</a>
</div>
<link rel="stylesheet" href="http://giaiphapthuonghieu.vn/miniapps/popuponload/linhnguyen.css">	
<script type="text/javascript" src="http://giaiphapthuonghieu.vn/miniapps/popuponload/jquery.popup.js"></script>		
<script type="text/javascript" >
	jQuery(window).load(function() {
		if(document.cookie.indexOf("adf") == -1)
		{
			document.cookie = "popunder1=adf";
			jQuery('#myModal').linhnguyen(jQuery('#myModal').data());
		}
	});
</script>
-->
<!-- add popup -->



<script>
getNumuNotifyComment(root_path + "modules/checkNotify.php",idUser);
//save post start and post end
var arrayIdPost = $("#arrayIdPost").html().split(',');
var idDivPostStart = 0;
var currentIdLoadPost = idDivPostStart;
var idMaxPostOnpage = parseInt(arrayIdPost.length - 2);
function loadComment(url)
{    	
    autoLoadComment(url,parseInt(arrayIdPost[currentIdLoadPost])); 	
	currentIdLoadPost = currentIdLoadPost + 1;	
    if (currentIdLoadPost > idMaxPostOnpage)
        currentIdLoadPost = idDivPostStart;		
}
//setInterval("loadComment('" + root_path + "content_comment.php')",5000);
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
$(function(){

$(document).on('mousedown', function (e) {   	
	if($(e.target).parents().index($('#notify_content_wrapper')) == -1) {
        if($('#notify_content_wrapper').is(":visible")) {
            $('#notify_content_wrapper').hide();
        }
    } 
	
	
});

$( "#fbNotificationsJewel" ).click(function() {
	window.idNotifyStart=0;
	notifyComment(root_path + "modules/notify.php",idUser,window.idNotifyStart);
	$("#notify_content_wrapper").slideDown('show');
});

$(document).on('click', '.addname', function()
{
	var username=$("#nametag").html();
	username = username.trim(username);
	var namename = "@" + username + "@";
	//alert(namename);
	$('#scriptBox').val(namename);
	boolStartFindName=false;
	
});
$(document).on('click', '.UFILikeLink', function() {
var idLike=$(this).attr('id');
var divLikeId=idLike.substring(7);
var idCmt = parseFloat(divLikeId);
divLikeId = '#statuslike' + divLikeId;
var htmlStr = $(this).html();
htmlStr=htmlStr.trim(htmlStr);
//alert(htmlStr);
//alert(idCmt);
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
/*$('a[rel=westtipsy]').tipsy({fade: true, gravity: 'w'});
$('a[rel=ttipsy]').tipsy({gravity: 's'});
$('a[rel=btipsy]').tipsy({gravity: 'n'});
$('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});*/

});
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
        //var idArt = parseInt($("#idArt").html());
		var url = root_path + "save_cmt.php";
		var url1 = root_path + "save_link.php";
		var url_notify = root_path + "save_notify.php";
		
		var imgLogo = $("#imgLogo").html();
		var name = $("#name").html();
		var numdiv= $('#lastCommentPost'+idArt).html();
		var idCmtNext =0;
		if(numdiv!="")
			idCmtNext= parseInt(numdiv)+1;
		var token = generateToken();
		//alert(token);
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.val());
		addCmtToDb(url,idArt,tb.val(), $("#imgSrc"+idArt).html(),imgLogo,name,idUser , token);
		//alert("cccc");
		addNotify(url_notify,idUser,name,imgLogo,idArt,idCmtNext,tb.val() + $("#imgSrc"+idArt).html(),0);
		
		$("#imgSrc"+idArt).html("");
		$('#lastCommentPost'+idArt).html(idCmtNext);
		$(this).val("");	
		$(this).css("height","20px");
		boolStartFindName = false;
        return false;
    }
});
function getFile(){
        document.getElementById("upfile").click();
}


function startTime(url,link)
{
		//alert(url + " " + link)
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		m=checkTime(m);
		s=checkTime(s);
		if (s%5==0)
		{
			//alert("keke");
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


function checkTime(i)
{
	if (i<10)
	  {
	  i="0" + i;
	  }
	return i;
}
</script>
<script type="text/javascript">
   
	 //getNewPost(root_path + "modules/post_new.php");
    var r = true;  //Control variable to control refresh access
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
	
function scrolToComment(id)
{
	$('#notify_content_wrapper').hide();
	updateNotify(root_path + "modules/update_notify.php",idUser)
	$(id).ScrollTo();	
}
var currentPagePost = 0;
/*
$(document).ready(function(){			
		  		
		$(window).scroll(function(){		
		  if  ($(window).scrollTop() == $(document).height() - $(window).height()){
			
			loadOtherPost() ;			
		  }
		});	
});
function loadOtherPost() 
{ 		  
	
	currentPagePost = currentPagePost + 1;
	$('div#last_msg_loader').html('<img src="images/css/loading-google.gif" />');
	$.post('modules/get_other_post.php',{currentPagePost:currentPagePost},			
	function(data){
		if (data != "") {
		$("#wrappercontentpost").append(data);			
		}
		$('div#last_msg_loader').empty();
	});		
};
*/
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43211723-5', 'faceseo.vn');
  ga('send', 'pageview');
//UA-45049546-1
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

</style>




</body>
</html>