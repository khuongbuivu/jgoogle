<?php
require_once("definelocal.php");
require_once("define.php");
require_once("time.php");
require_once("config.php");
require_once('fcomment.php');

global $host;
global $user;
global $pass;
global $db;
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
var iautoview=0;
var countTimeUpdate=0;
var urlsAuto = new Array();					
var urlsAutoAll = new Array();					
var tabs = new Array();
var timeInits = new Array();
var timeCloses = new Array();
var timeOpeneds = new Array();
var t ;
var numTabsOpenedAuto = 9;
var closeUrl = 0;
var d = new Date();					
var idUser=<?php echo $id_user;?>;
var point = 5;
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
<!-- thanh -->
<link href="<?php echo $PATH_ROOT;?>css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery.carouFredSel.js"></script>
<link href="/templates/gpth/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!-- end thanh -->
<!-- add scroll top comment -->
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/jquery-scrollto.js"></script>
<!-- add scroll top comment -->
<script type="text/javascript" >
</script>
<script type="text/javascript" >	
	setInterval("autoView()",10000);
	setInterval("checkTabsClosedAuto()",4000);
	setInterval("updateUrlAuto()",30000);
</script>
<link href="http://giaiphapthuonghieu.vn/templates/gpth/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>	
<body class="fs hasLeftCol _57_t noFooter hasSmurfbar hasPrivacyLite gecko win Locale_en_US" >
<div id="container">
<?php
include_once("header.php");
include_once("user.php");
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
								<a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
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
					<!-- end login facebook -->					
					<a tabindex="-1" href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxBlock _8o _8s lfloat"><img id="profile_pic_welcome_100001707050712" alt="" src="<?php echo $urlImgProfile;?>" class="_s0 fbxWelcomeBoxImg _rw img"></a>
					<div class="_42ef"><div class="_6a prs"><div style="height:40px" class="_6a _6b"></div><div class="_6a _6b"><a href="<?php echo $user_profile[link];?>"  class="fbxWelcomeBoxName"><?php echo $user_profile[name]; ?></a><a href="<?php echo $user_profile[link];?>?sk=info&amp;edit=eduwork&amp;ref=home_edit_profile">Edit Profile</a></div></div></div>
					
					<div id="nav" class="left1 leftbigger" role="navigation">
						<div class="moduletable_menu">
						 <h3><span class="backh"><span class="backh2"><span class="backh3">Chuyên mục</span></span></span></h3>
						<ul class="menu">
						<li class="item-506 current active"><a target="_blank" href="<?php echo $PATH_ROOT; ?>">Trang chủ</a></li>
						<li class="item-510"><a href="javascript:mylink(<?php echo $id_user; ?>);">Link của tôi</a></li>
						<li class="item-483"><a target="_blank" href="modules/upload/banner.php">Đăng kí banner</a></li>
						<li class="item-484"><a target="_blank" href="autoview.php">Tăng điểm tự động</a></li>
						<li class="item-485"><a  href="javascript:loadlinks(<?php echo $id_user; ?>);">Link cần trả lễ</a></li>
						<li class="item-485"><a  title="Chức năng vẫn còn đang phát triển" href="javascript: alert('Chức năng sẽ cập nhật sau 2 tháng nữa')">Quản lý chuyển trang</a></li>						
						<li class="item-485"><a target="_blank" href="documentation/index.html">Hướng Dẫn Sử Dụng</a></li>
						</ul>
						</div>
					</div>
					
					<div class="uiSideHeader"><strong>Sáng Lập Faceseo.vn</strong></div>
					<div class="listmem mem1"><a target="_blank" href="https://www.facebook.com/linh.nguyen.52035772" rel="ttipsy" title="Ceo Giải Pháp Thương Hiệu. Chuyên đào tạo Seo + Code" ><img src="https://graph.facebook.com/100001707050712/picture" align="left" style="margin-right:4px;" /> Linh Nguyễn</a></div>
					<div class="listmem mem2"><a target="_blank" href="https://www.facebook.com/hd.isuit" rel="ttipsy" title="Chuyên marketing + Seo. IT manager VietNam Travel"><img src="https://graph.facebook.com/hd.isuit/picture" align="left" style="margin-right:4px;" /> Hoàng Đoàn<br/></a></div>
					<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/tohoaithanhtv?fref=ts" rel="ttipsy" title="Code web" ><img src="https://graph.facebook.com/tohoaithanhtv/picture" align="left" style="margin-right:4px;" /> Thanh Long<br/></a></div>
					<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/kenzknite" rel="ttipsy" title="Silver Team - Hacking Coding" ><img src="https://graph.facebook.com/kenzknite/picture" align="left" style="margin-right:4px;"/> Phạm Trưởng<br/></a></div>
					<div class="fb-like-box" data-href="http://www.facebook.com/faceseo.vn" data-width="236px" 
					  data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>					
				</div>
			</div>
			
			<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
				<div class="messagesystem"></div>
				<div id="contentArea" aria-describedby="pageTitle" role="main">					
					<div id="infopoint">					
						<div id="point"><a rel='btipsy' title='View 5p + 5đ. View textlink 5p + 50đ. Share FB + 50đ, share G+ + 30đ, G+ & like + 15đ' >Điểm</a> <div id='numpoint'></div></div>
						<div  id='rule'>
						Luật chơi
						</div>
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
					<!-- API FACEBOOK GET ID NAM IMG -->
					
<form name="frm" method="post" action="" id="fileupload" enctype="multipart/form-data">
  <div id="thanh" >
    <div style="border-bottom:1px dotted #ccc; width:100%;">
      <textarea style="border:none; width:487px;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 48px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
display: inline-block;
text-align: start;zoom: 1;" role="textbox" name="textcomment" id="textcomment"></textarea>
    </div>
    <p style="text-align:center;"><span id="cho"></span></p>
    <div id="des"></div>
    <div id="imgdiv" style="clear:both;">
      <div class="container">
        <div class="row fileupload-buttonbar">
          <div class="span5 fileupload-progress fade">
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <div class="bar" style="width:0%;"></div>
            </div>
            <div class="progress-extended">&nbsp;</div>
          </div>
        </div>
        <table role="presentation" class="table table-striped">
          <tbody class="files">
          </tbody>
        </table>
        <br>
      </div>
    </div>
    <div id="buttonpos" style="clear:both">
      <div class="_1dsp _4-">
        <div class="clearfix">
          <div class="_52lb _3-7 lfloat">
            <div>
              <div id="u_1w_m" class="lfloat"><a id="u_0_z" title="Đánh dấu người trong bài đăng của bạn" aria-label="Đánh dấu người trong bài đăng của bạn" role="button" data-gt="{&quot;composer&quot;:{&quot;comp&quot;:&quot;people&quot;,&quot;ua_id&quot;:&quot;composer:post&quot;}}" href="#" class="_1dsq _1dsv"><span class="_1dsr"><span class="_4-px ellipsis">Đính tên người</span></span></a></div>
              <div id="u_1w_o" class="lfloat">
                <div id="composerCityTagger" class="_6a _zg _1dsq"><a id="u_1w_p" aria-label="Thêm địa điểm vào bài đăng" title="Thêm địa điểm vào bài đăng" role="button" href="#" class="_y9"><span class="_1dst"><span class="_4-px ellipsis">Thêm địa điểm vào bài đăng</span></span>
                  <div class="_6a _1dsu">
                    <div style="height:30px" class="_6a _6b"></div>
                    <div class="_6a _6b"><span class="_y8"></span></div>
                  </div>
                  </a><a id="u_1w_q" title="Xóa" rel="async-post" ajaxify="/ajax/places/toggle_location_sharing?disable=1&amp;session_id=1376211657" role="button" href="#" class="_4_z3 uiCloseButton uiCloseButtonSmall"></a>
                  <input type="hidden" id="u_1w_r" name="composertags_city" autocomplete="off">
                  <input type="hidden" id="u_1w_s" value="false" name="disable_location_sharing" autocomplete="off">
                  <input type="hidden" value="108458769184495" name="composer_predicted_city" autocomplete="off">
                </div>
              </div>
              <div id="u_1w_n" class="lfloat">
                <div id="u_0_13" class="_6a _m _1dsq _1dsw"><a id="u_0_14" rel="ignore" role="presentation" class="_1dsr"><span class="_4-px ellipsis">Thêm hình ảnh</span>
                  <div class="_3jk">
                   
                    <input type="file" name="files[]" class="_n _5f0v" id="fileimg">
                  </div>
                  </a></div>
                <div class="span7" style="display:none;"> <span class="fileupload-loading"></span> </div>
              </div>
            </div>
          </div>
          <ul class="uiList _1dso rfloat _509- _4ki _6-h _6-j _6-i">
            <li>
              <button type="button" class="_42ft _42fu _11b selected _42g- postbutton" value="1">Đăng</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="noidungpost"></div>
  </div>
</form>
<script language="javascript" src="<?php echo $PATH_ROOT;?>js/common.js"></script> 
<!-- Đang view   , Auto tiếp, Dừng view -->
<div id="wrapperSatusView" style="position:relative; height:60px" >
<div style="position:absolute; left:10px; cursor:pointer;text-align:center;margin: 10px 0; display:block;padding:5px;background:#3B5998;color:#fff;font-size:20px;-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px; bolder:1px doted #fff" id="statusAuto">Đang view <img title="Đang view" src="images/loading-google-smaill.gif"></div>
<div id="stopView" style="position:absolute; right:10px; cursor:pointer;text-align:center;margin: 10px 0; display:block;padding:5px;background:#3B5998;color:#fff;font-size:20px;-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px; bolder:1px doted #fff">Đóng tất cả web</div>
</div>
<div style="clear:both"></div>
<div class='linkneedview' id='linkneedview' ></div>
			 <!-- main -->
			
			<div id="wrappercontentpost">						
						<!-- main content -->
						<?php
						$con=mysqli_connect($host,$user,$pass,$db);
						$result=mysqli_query($con,"select idUser from atw_point ORDER BY point DESC limit 100 ");
						//echo $result->num_rows;
						$i=1;
						$j=1;
						$k=0;
						$listlink = "";
						while ($row = mysqli_fetch_array($result))
						{	
							// thống kê user: image, tên, điểm
							$idUser=$row['idUser'];
							$user_id = $row['idUser'];
							$infosUser=getUserInfo($user_id);
							echo $i.". <b><a target='_blank' href='".$infosUser['user_link']."'>".$infosUser['user_name']."</a>"." · ".getpoint($user_id)."điểm"."</b><br/>";	
							echo '<div style="float:left; width:50px ; margin:0px">';
								echo "<img src='https://graph.facebook.com/".$user_id."/picture' />";	
								
							echo '</div>';						
							echo '<div style="float:right; width:452px; margin:0px">';	
							echo '<ul id="UFIList-Cmt" class="UFIList-Cmt">';					
							$query_link="select url from awt_list_url where iduser=".$idUser." limit 3";
							$links=mysqli_query($con,$query_link);
							if (count($links)==0)
							{
								echo "Chưa đăng link nào";
							}
							while($rowlinks=mysqli_fetch_array($links))
							{
								echo '<li class="UFIRow UFIComment UFILastComment UFILastCommentComponent">';
								if($rowlinks['url']!=="")
								{
									
									echo addLinkUrl($rowlinks['url']);
									//echo $rowlinks['url'];
									echo $k;
									if ($j%10==0)
									{
										$k++;
										$listlink[$k]="";
									}
									
									
									if($listlink[$k]!="")
										$listlink[$k]=$listlink[$k]."·".$rowlinks['url'];
									else
										$listlink[$k]=$rowlinks['url'];
									$j++;
								}
								$titleStastic='Thống kê click hôm nay';
								$classtitlePopup='titlepopup';
								?>
								 · <a onclick="TINY.box.show({url:'statist_click.php?link=<?php echo $rowlinks['url']; ?>',width:500,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo $rowlinks['url']; ?>'), 5000); return false;" >ViewClicked</a>								
								<?php
								echo "</li>";
							}
							$i++;
							echo "</ul>";
							echo "</div>";
							echo '<div style=" clear: both;"></div>';
							echo '<ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul>';							
						};
						echo '<div style="display:none">';
						for ($ii=0;$ii<$k;$ii++)
						{
						
							echo "<div id='listlinktoview".$ii."'>".$listlink[$ii]."</div>";
						
						}
						echo '</div>';
						?>												
						<script>											
						var listlinks="<?php echo $listlink[0]; ?>";
						urlsAutoAll=listlinks.split("·");
						for (var k= 0 ; k < numTabsOpenedAuto ; k++ )
						{
							urlsAuto[k] =  urlsAutoAll[k+ countTimeUpdate*numTabsOpenedAuto];	
						}
						//alert(urlsAuto.length);
						</script>
						<!-- main content -->
			</div>	
			
			 <!-- main -->				
				</div>
				<div id="rightCol" aria-label="Reminders, people you may know, and ads" role="complementary">
				<div class="uiSideHeader"><strong><a rel="ttipsy" title="Đăng kí banner ở menu trái. Hoạt động tích cực thì banner sẽ top">Banner user free<a></strong></div>
				<a target="_blank" href="http://giaiphapthuonghieu.vn"><img src="<?php echo $PATH_ROOT;?>images/advertising/quang-cao-dao-tao-seo.png" width="100%" /></a>
				<div id="bannerfree"></a>
				</div>
				<script>
				showbannerfree("<?php echo $PATH_ROOT;?>modules/advbanner/index.php",idUser);
				</script>
			</div>
		</div>
			<div id="footer">© Copyright 2013 <a href="http://giaiphapthuonghieu.vn">Giải Pháp Thương Hiệu</a> · Điều khoản · Chính sách · Quảng cáo</div>
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


<script>
getNumuNotifyComment(root_path + "modules/checkNotify.php",idUser);
//save post start and post end
var arrayIdPost = $("#arrayIdPost").html().split(',');
var idDivPostStart = 0;
var currentIdLoadPost = idDivPostStart;
var idMaxPostOnpage = parseInt(arrayIdPost.length - 2);
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
    if (e.keyCode == 13) {
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
		addLinkToDb(url1,<?php echo $id_user; ?>,tb.val());
		addCmtToDb(url,idArt,tb.val(), $("#imgSrc"+idArt).html(),imgLogo,name);
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
function updateUrlAuto()
{
	if (window.iswiewing==false)
	{
		$('#statusAuto').html('Đang tải link mới <img title="Đang view" src="images/loading-google-smaill.gif">');
		countTimeUpdate = countTimeUpdate + 1;
		urlsAuto = $('listlinktoview'+countTimeUpdate).html().split("·");
		iautoview=0;
		$('#statusAuto').html('Đang view <img title="Đang view" src="images/loading-google-smaill.gif">');
	};
}

$(document).on('click', '#statusAuto', function() {
	if( $(this).html()=='Tiếp tục view');
	{
		countTimeUpdate = countTimeUpdate + 1;
		for (var k= 0 ; k < numTabsOpenedAuto;k++)
		{
			urlsAuto[k] =  urlsAutoAll[k+ countTimeUpdate*numTabsOpenedAuto];
		}
	}
	if( $(this).html()=='Tạm dừng')
	{
		stopAutoView();
	}
	
});
$(document).on('click', '#stopView', function() {
		stopAutoView();
	
	window.close();
	
});

function stopAutoView()
{
	window.iswiewing=false;
	var j=0;
	while (urlsAuto.length>0)
	{
		if (tabs[j].closed && timeInits[j]!="")
		{		
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;		
			//alert("You are get " + parseInt(t/(2*militime)) + " point");
			if (parseInt(t)<300)
			{
				//alert("Bạn view chưa được 5p nên chưa được + điểm");
				saveClick('save_click.php',urlsAuto[j],idUser,timeInits[j],timeclose,timeOpeneds[j]);
			}else {
			addPoint('add_point_auto.php',urlsAuto[j],idUser,parseInt(t/(militime*5)));
			saveClick('save_click.php',urlsAuto[j],idUser,timeInits[j],timeclose,timeOpeneds[j]);
			}
			timeInits[j] = "";
			urlsAuto.splice(j,1);
			tabs.splice(j,1);
			timeInits.splice(j,1);
		}
		else
		{
			timeOpeneds[j] = t;	
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;			
			addPoint('add_point_auto.php',urlsAuto[j],idUser,parseInt(t/(militime*5)));
			saveClick('save_click.php',urlsAuto[j],idUser,timeInits[j],timeclose,timeOpeneds[j]);
			tabs[j].close();	
			timeInits[j] = "";
			urlsAuto.splice(j,1);
			tabs.splice(j,1);
			timeInits.splice(j,1);
		}
		j++;
		stopAutoView();
	}
	return;
}
</script>
<?php
function getpoint($idUser)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
	$point = mysqli_fetch_array($result);
	return $point['point'];
}
?>
</body>
</html>