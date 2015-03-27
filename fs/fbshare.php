<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
require_once("config.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://".DOMAIN;
if (isset($_GET['linkimg'])&& $_GET['linkimg']!="" && $_GET['linkimg']!=null)
{
	$linkimg=$_GET['linkimg'];
}
else
	$linkimg="http://".DOMAIN."/background.jpg";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FACESEO TRUNG TÂM ĐÀO TẠO SEO CHẤT LƯỢNG & UY TÍN VIỆT NAM</title>
	<meta name="description" content="Tôi đã từng học tại nhiều nơi nhưng đến với trung tâm đào tạo seo FACESEO tôi được học thêm nhiều cách làm đơn giản hơn, hiệu quả hơn. Cảm ơn Linh Nguyễn." />
	<meta charset="utf-8">
</head>
<body>
<?php
$okshare=mysqli_query($con,"select * from fs_fbshare where fbshare_link='".$link."'");
$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
$pointOfUser = mysqli_fetch_array($result);
$pointCurrent = $pointOfUser['point'];
$timezone  = +7;//+7; //(GMT +7:00) 
$timeCurrent = time() + 3600*($timezone+date("0"));
$share = false;
if($okshare->num_rows>0)
{
	$row = mysqli_fetch_array($okshare);
	$timeSaved=strtotime($row['fbshare_time']);
	$t =$timeCurrent - $timeSaved;		
	$day=0;
	if ($t>86400 && $t < 86400*12)
		$day=(int)($t/86400);
	if ($pointCurrent > -1 && $pointCurrent < 100 && $day > 1 )
	{
		$share=true;
	}
}
else
{
	$share=true;
}
mysqli_close($con);
?>
<div id="fb-root"></div>
<script src="http://connect.facebook.com/en_US/all.js" type="text/javascript"></script>
<script type="text/javascript">
    FB.init({
        appId: '731864150162369',
        status: true,
        cookie: true,
        xfbml: true
    });
	function shareOnWall()
	{
		FB.getLoginStatus(function (response){
		if (response.status === 'connected')
		{
				var idUser = response.authResponse.userID;
				FB.ui(
					   {
						 method: 'feed',
						 name: 'Bài viết hữu ích',
						 link: '<?php echo $link; ?>',
						 picture: '<?php echo $linkimg; ?>',
						 caption: 'Hãy share những gì bạn thích.',
						 description: 'Cảm thấy thích thú.',
					   },
					   function(response) {
						 if (response && response.post_id) {
							addPointShare(idUser,'<?php echo $link; ?>');
						 } else {
						   alert('Share Faceseo được cộng điểm.');
						 }
					   }
					);		
			}
		});	
	};
	function addPointShare(idUser,link)
	{	
			var url="http://".<?php echo DOMAIN;?>."/modules/fbshare.php";
			var point = 20;
			var xmlhttp;
			if(window.XMLHttpRequest){
			  xmlhttp=new XMLHttpRequest();
			}else{
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			};
			var params = "idUser=" + idUser + "&link=" +link;
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", params.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	
					alert(xmlhttp.responseText);
				}
			};
		  xmlhttp.send(params);
	};
	
</script>
<div style="margin:20px;background-color:#ccc;height:437px; position: relative;">
<div style="width:10%;height:40px;float:left; background-color:#435688;text-align:center"><img src="images/button/iconlink.png" /></div>
<div style="width:90%;float:left;background-color:#435688;color:#fff;font-size:16px;height:30px;text-align:center; padding:5px 0; box-shadow: inset 0px 0px 10px rgba(255,255,255,0.9); overflow: hidden;"><?php echo $link; ?></div>
<div style="clear:both"></div>
<div style="width:50%;float:left;height:300px;margin:5px;overflow: hidden;"><img src="<?php echo $linkimg; ?>" width="100%" /></div>
<div style="width:45%;float:right;height:300px;margin:5px;text-align:center;"> Hãy share những gì bạn thích.</div>
<div style="position: absolute;right:0px;bottom:-4px">
<?php 
if ($share==true):
?>
<a href="#"  onClick="shareOnWall();"> <img src="images/button/fbshare.jpg" /></a>
<?php 
else:
	echo "ĐÃ SHARE";
endif
?>
</div>
</div>
</body>
</html>