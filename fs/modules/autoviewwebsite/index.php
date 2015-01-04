<?php
//fix
	// define("LOCAL", "FALSE", true);
	define("LOCAL", "TRUE", true);
	include_once("../../define.php");
	include_once("../../time.php");
	include_once("../../config.php");
	include_once("../../fcomment.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="keywords" content="Auto view website, hệ thống tăng view, câu view, câu like" />
	  <meta name="description" content="FaceSeo.Vn mạng tương tác dành cho seoer | Hệ thống tăng view cho website giúp website nhanh lên top Google | Hãy cùng kết nối chuyên gia Seo free." />
	  <title>Auto view website | Hệ thống tăng view website thực | FaceSeo.Vn</title>
	<script type="text/javascript">
	<?php if(LOCAL=="TRUE"): ?>
	var root_path = "http://localhost/faceseo/";
	<?php else: ?>
	var root_path = "http://giaiphapthuonghieu.vn/faceseo/";	
	<?php endif ?>
	var idUser=<?php echo $id_user; ?>;
	var timeoutStasticClick,setScroll=0;
	var refreshIntervalId=0;
	var timetmp=0;
	var iautoview=0;
	</script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/comment.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/var.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="<?php echo $PATH_ROOT;?>upload/upclick.js"></script> <!-- for upload file -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/tinybox.js"></script> <!-- for popup -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/keycode.js"></script> <!-- add keycode -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/notify.js"></script>
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/warning.js"></script>
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
	<!-- end thanh -->
	<!-- add tip y -->
	<script type="text/javascript" src="<?php echo $PATH_ROOT;?>js/jquery.tipsy.js"></script>
	<link rel="stylesheet" href="<?php echo $PATH_ROOT;?>css/tipsy.css" type="text/css" />
	<!-- end add tip y -->

	<script type="text/javascript" >	
	setInterval("autoView()",5000);
	setInterval("checkTabsClosed()",8000);
	//setInterval("getNumuNotifyComment('"+root_path + "modules/checkNotify.php',"+ idUser + ")",5000);
	</script>
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
									<a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
								  </div>
								<?php endif ?>
								<?php //print_r($_SESSION); // $_SESSION?>
								<?php if ($accountFace): ?>      
								  <!-- <h3>Your User Object (/me)</h3> -->
								  <pre><?php //print_r($user_profile); ?></pre>
								  <?php $urlImgProfile="https://graph.facebook.com/$accountFace/picture";?>
								  <?php
								  /*
								  echo "ID: ".$user_profile['id']."<br/>" ; 
								  echo "ID: ".$user_profile['name'] ; 
								  */
								  ?>
								<?php else: ?>
								
								  <strong><em>You are not Connected.</em></strong>
								<?php endif ?>
						<?php else:?>
							<?php $urlImgProfile="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/s32x32/276109_100001707050712_1120857391_q.jpg" ?>
						<?php endif ?>
						<!-- end login facebook -->
						
						<a tabindex="-1" href="https://www.facebook.com/linh.nguyen.52035772" data-gt="{&quot;bmid&quot;:100001707050712,&quot;count&quot;:0,&quot;fbtype&quot;:2048,&quot;item_type&quot;:null,&quot;item_category&quot;:&quot;self_timeline&quot;}" aria-hidden="true" class="fbxWelcomeBoxBlock _8o _8s lfloat"><img id="profile_pic_welcome_100001707050712" alt="" src="<?php echo $urlImgProfile;?>" class="_s0 fbxWelcomeBoxImg _rw img"></a>
						<div class="_42ef"><div class="_6a prs"><div style="height:40px" class="_6a _6b"></div><div class="_6a _6b"><a href="https://www.facebook.com/linh.nguyen.52035772" data-gt="{&quot;bmid&quot;:100001707050712,&quot;count&quot;:0,&quot;fbtype&quot;:2048,&quot;item_type&quot;:null,&quot;item_category&quot;:&quot;self_timeline&quot;}" class="fbxWelcomeBoxName">Linh Nguyen</a><a href="https://www.facebook.com/linh.nguyen.52035772?sk=info&amp;edit=eduwork&amp;ref=home_edit_profile">Edit Profile</a></div></div></div>
						<div class="_42ef home"><a target="_blank" href="http://giaiphapthuonghieu.vn/faceseo/index.php">Home</a></div>
						<div class="_42ef addlink"><a target="_blank" rel="ttipsy" title="Chức năng vẫn còn đang phát triển" style="color:#ccc">Your Link</a></div>
						<div class="_42ef addbanner"><a target="_blank" href="modules/upload/banner.php">Đăng kí banner</a></div>
						<div class="_42ef autoview"><a target="_blank" href="modules/autoviewwebsite/">Auto view to get point</a></div>
						<div class="_42ef viewclick"><a target="_blank" rel="ttipsy" title="Chức năng vẫn còn đang phát triển" style="color:#ccc">Review Click my link</a></div>
						<div class="_42ef viewclick"><a target="_blank" rel="ttipsy" title="Chức năng vẫn còn đang phát triển" style="color:#ccc">View Chage Page</a></div><br/>
						<div class="uiSideHeader"><strong>Sáng Lập Faceseo.vn</strong></div>
						<div class="listmem mem1"><a target="_blank" href="https://www.facebook.com/linh.nguyen.52035772" rel="ttipsy" title="Ceo Giải Pháp Thương Hiệu. Chuyên đào tạo Seo + Code" ><img src="https://graph.facebook.com/100001707050712/picture" align="left" /> Linh Nguyễn <br/> Già làng</a></div>
						<div class="listmem mem2"><a target="_blank" href="https://www.facebook.com/hd.isuit" rel="ttipsy" title="Chuyên đào tạo marketing. IT manager VietNam Travel"><img src="https://graph.facebook.com/hd.isuit/picture" align="left" />Hoàng Đoàn<br/></a></div>
						<div class="listmem mem3"><a target="_blank" href="https://www.facebook.com/truongthien.minh.7?fref=ts" rel="ttipsy" title="Chuyên đào tạo Joomla + Wordpess. Tư vấn phát triển website" ><img src="https://graph.facebook.com/truongthien.minh.7/picture" align="left" />Trương Minh Thiên<br/></a></div>
						
						</div>
				</div>
				<div id="contentCol" class="clearfix hasRightCol homeFixedLayout homeWiderContent hasExpandedComposer newsFeedComposer">
					<div id="contentArea" aria-describedby="pageTitle" role="main">
						<div id="infopoint">					
							<div id="point">Point</div>
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
						<ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul>					
						<div id="wrappercontentpost">						
						<!-- main content -->
						<?php
						$con=mysqli_connect($host,$user,$pass,$db);
						$result=mysqli_query($con,"select idUser from atw_point ORDER BY point DESC limit 100 ");
						//echo $result->num_rows;
						$i=1;
						$j=1;
						$listlink = "";
						while ($row = mysqli_fetch_array($result))
						{	
							// thống kê user: image, tên, điểm
							$idUser=$row['idUser'];
							echo $i.". ".$row['idUser']."<br/>";
							$user_id = $row['idUser'];
							echo '<div style="float:left; width:50px ; margin:0px">';
								//echo "<img src='https://graph.facebook.com/".$user_id."/picture' />";						
							echo '</div>';						
							echo '<div style="float:right; width:452px; margin:0px">';						
							echo "<div style='width:452px; margin:0px'><b>".$infosUser['user_name']."</b></div>";
							echo '<ul id="UFIList-Cmt" class="UFIList-Cmt">';					
							$query_link="select url from awt_list_url where iduser=".$idUser;
							$links=mysqli_query($con,$query_link);
							while($rowlinks=mysqli_fetch_array($links))
							{
								echo '<li class="UFIRow UFIComment UFILastComment UFILastCommentComponent">';
								if($rowlinks['url']!=="")
								{
									
									echo addLinkUrl($rowlinks['url']);
									//echo $rowlinks['url'];
									if($listlink!="")
										$listlink=$listlink.",".$rowlinks['url'];
									else
										$listlink=$rowlinks['url'];
									$j++;
								}
								$titleStastic='Thống kê Click';
								$classtitlePopup='titlepopup';
								?>
								 · <a onclick="TINY.box.show({url:'../../statist_click.php?link=<?php echo $rowlinks['url']; ?>',width:400,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo $url[0]; ?>'), 5000); return false;" >ViewClicked</a>
								<?php
								echo "</li>";
							}
							$i++;
							echo "</ul>";
							echo "</div>";
							echo '<div style=" clear: both;"></div>';
							echo '<ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul>';
							
						}
						echo $listlink;
						?>								
						<script type="text/javascript">
						var urls = new Array();					
						var tabs = new Array();
						var timeInits = new Array();
						var timeCloses = new Array();
						var timeOpeneds = new Array();
						var t ;
						var numTabsOpened = 15;
						var closeUrl = 0;
						var d = new Date();					
						var idUser=<?php echo $id_user;?>;
						var point = 5;					
						//init array urls
						var listlinks="<?php echo $listlink;?>";
						urls=listlinks.split(",");	
						</script>
						<!-- main content -->
						</div>					
					</div>
					<div id="rightCol" aria-label="Reminders, people you may know, and ads" role="complementary">
					<a href="http://giaiphapthuonghieu.vn"><img src="<?php echo $PATH_ROOT;?>images/advertising/bang-gia-seo-website.gif" width="100%" /></a>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	</div>
	<script>
	</script>
	<div id='display'>
	</div>
	<div id="msgbox">
	</div>
	<div id="notify_content_wrapper" >Content Notify</div>
	<div id="numnotify"></div>	
	<script>
	var r = true;  //Control variable to control refresh access
		$(window).bind('beforeunload', function(){
				var currentWarningNum = parseInt($("div #numwarning").html());
					var numwarning = currentWarningNum + 1;
					
				if (window.iswiewing == true)
				{
					r=confirm("Trong khi bạn đang view đừng tắt FaceSeo. Nếu tắt bạn sẽ bị ban khỏi hội. Vui lòng bấm cancel. Thông báo tiếp theo bấm Stay on Page");
					addWarning(root_path+ "modules/add_warning_out_view.php",idUser,1,numwarning);
				}
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
		});	
	$(function(){
		$('a[rel=westtipsy]').tipsy({fade: true, gravity: 'w'});
		$('a[rel=ttipsy]').tipsy({gravity: 's'});
		$('a[rel=btipsy]').tipsy({gravity: 'n'});
		$('a[rel=tipsy]').tipsy({fade: true, gravity: 'n'});
	});

	</script>
	</body>
	</html>