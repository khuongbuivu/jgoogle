<?php
session_start();
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
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo $PATH_ROOT;?>upload/upclick.js"></script> <!-- for upload file -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/tinybox.js"></script> <!-- for popup -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/notify.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/warning.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/banner.js"></script>
<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery.tipsy.js"></script>
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
<link href="http://giaiphapthuonghieu.vn/templates/gpth/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!-- end thanh -->
<!-- add scroll top comment -->
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
<!-- add scroll top comment -->
<script type="text/javascript" >	
//setInterval("autoLoadComment('" + root_path + "content_comment.php',<?php echo (int)($id) ?>)",10000);
//setInterval("B()",5000);
setInterval("checkTabsClosed()",5000);
setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",8000);
setInterval("getNewPost('"+root_path + "modules/post_new.php')",10000);
setInterval("showbannerfree('"+root_path + "modules/advbanner/index.php'," + idUser + ")",60000);


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
				<div id="pagelet_welcome_box" data-referrer="pagelet_welcome_box">
					<!-- login facebook -->
					<?php if(LOCAL!="TRUE"): ?>		
						<?php //print_r ($accountFace);  
							if ($accountFace): ?>
							<a href="<?php echo $logoutUrl; ?>">Logout</a>
							<?php else: ?>
							  <div>
								<a href="<?php echo $loginUrl; ?>" target="_blank"><img src="images/css/login-with-facebook.png" /></a>
							  </div>
							<?php endif ?>
							<?php //print_r($_SESSION); // $_SESSION?>
							<?php if ($accountFace): ?>      
							  <!-- <h3>Your User Object (/me)</h3> -->
							  <pre><?php //print_r($user_profile); ?></pre>
							  <?php $urlImgProfile="https://graph.facebook.com/$accountFace/picture";?>
							  <?php
									saveUser($user_profile);
							  ?>
							<?php else: ?>
							
							  <strong><em>Đăng nhập ngay.</em></strong>
							<?php endif ?>
					<?php else:?>
						<?php $urlImgProfile="https://graph.facebook.com/100001707050712/picture" ?>
					<?php endif ?>
					<?php  if ($id_user!="")
					{					
						$_SESSION['token-user']=md5($id_user);
						$_SESSION['userID']=$id_user;
					}
					?>
					<!-- end login facebook -->					
					<a tabindex="-1" href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxBlock _8o _8s lfloat">
					<?php if (trim($urlImgProfile)!=""){?>
					<img id="profile_pic_welcome_100001707050712" alt="" src="<?php echo $urlImgProfile;?>" class="_s0 fbxWelcomeBoxImg _rw img">
					<?php };?>
					
					</a>
					<?php if (trim($urlImgProfile)!=""){?>
					<div class="_42ef"><div class="_6a prs"><div style="height:40px" class="_6a _6b"></div><div class="_6a _6b">					
					<a href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxName"><?php echo $user_profile[name]; ?></a><a href="<?php echo $user_profile[link];?>?sk=info&amp;edit=eduwork&amp;ref=home_edit_profile" target="_blank">Edit Profile</a>					
					</div></div></div>
					<?php };?>
					<div class="_42ef home"><a target="_blank" href="<?php echo $PATH_ROOT; ?>">Trang chủ</a></div>
					<div class="_42ef addlink"><a href="javascript:mylink('modules/my_link.php',<?php echo $id_user; ?>);">Link của tôi</a></div>
					<div class="_42ef addbanner"><a target="_blank" href="modules/upload/banner.php">Đăng kí banner</a></div>
					<div class="_42ef autoview"><a target="_blank" href="autoview.php">Tăng điểm tự động</a></div>
					
					<div class="_42ef autoview"><a  href="javascript:loadlinks('modules/list_link_friend.php',<?php echo $id_user; ?>);">Link cần trả lễ</a></div>
					<div class="_42ef viewclick"><a target="_blank" rel="ttipsy" title="Chức năng vẫn còn đang phát triển" style="color:#ccc">Quản lý chuyển trang</a></div>
					<div class="_42ef  viewclick"><a "><a target="_blank" href="documentation/index.html">Hướng Dẫn Sử Dụng</a></div>
					<div class="uiSideHeader"><strong>Sáng Lập Faceseo.vn</strong></div>
					<div class="listmem mem1"><a target="_blank" href="https://www.facebook.com/linh.nguyen.52035772" rel="ttipsy" title="Ceo Giải Pháp Thương Hiệu. Chuyên đào tạo Seo + Code" ><img src="https://graph.facebook.com/100001707050712/picture" align="left" style="margin-right:4px;" /> Linh Nguyễn</a></div>
					<div class="listmem mem2"><a target="_blank" href="https://www.facebook.com/hd.isuit" rel="ttipsy" title="Chuyên marketing + Seo. IT manager VietNam Travel"><img src="https://graph.facebook.com/hd.isuit/picture" align="left" style="margin-right:4px;" /> Hoàng Đoàn<br/></a></div>
					<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/truongthien.minh.7?fref=ts" rel="ttipsy" title="Chuyên đào tạo Joomla + Wordpess. Tư vấn phát triển website" ><img src="https://graph.facebook.com/truongthien.minh.7/picture" align="left" style="margin-right:4px;" /> Trương Minh Thiên<br/></a></div>
					<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/kenzknite" rel="ttipsy" title="Silver Team - Hacking Coding" ><img src="https://graph.facebook.com/kenzknite/picture" align="left" style="margin-right:4px;"/> Phạm Trưởng<br/></a></div>
					
				</div>
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
					getPoint("<?php echo $PATH_ROOT;?>get_point.php",idUser);
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
																<img src="<?php echo $urlImgProfile;?>" class="img UFIActorImage _rx">
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
														<textarea name="add_comment_text" title="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" content="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" placeholder="Nhập link của các bạn vào đây. Bắt đầu bằng http:// nhé!" class="textInput mentionsTextarea uiTextareaAutogrow uiTextareaNoResize UFIAddCommentInput DOMControl_placeholder" id="linkbanner"></textarea>							
													</form>
													</div>
													
												</div>
											</div>
										</div>	
									</div>
							</div>							
							</div></div></div></li>	<br/>
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
				<div class="uiSideHeader"><strong><a rel="ttipsy" title="Đăng kí banner ở menu trái. Hoạt động tích cực thì banner sẽ top">Banner user free<a></strong></div>
				<a target="_blank" href="http://giaiphapthuonghieu.vn"><img src="<?php echo $PATH_ROOT;?>images/advertising/quang-cao-dao-tao-seo.png" width="100%" /></a>
				<div id="reviewbannerupload" style="float:left;width:300px;height:150px"><img src="../../images/advertising/demo-banner-free.png" width="248px"></div>
				<div id="bannerfree"></a>
				</div>
				<script>
				showbannerfree("<?php echo $PATH_ROOT;?>modules/advbanner/index.php",idUser);
				</script>
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
setInterval("loadComment('" + root_path + "content_comment.php')",5000);
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
$('a[rel=westtipsy]').tipsy({fade: true, gravity: 'w'});
$('a[rel=ttipsy]').tipsy({gravity: 's'});
$('a[rel=btipsy]').tipsy({gravity: 'n'});
$('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});

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
</body>
</html>