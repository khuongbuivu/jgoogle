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
	$link="http://bit.ly/1Bw3gH7";
	// $linkimg="http://faceseo.vn/images/advertising/fs_viralfacebook.jpg";
	$linkimg="http://faceseo.vn/images/advertising/faceseo-ads-fb1.jpg";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Cùng chia sẽ FACESEO đến những ai yêu SEO</title>
	<meta name="description" content="Faceseo hệ thống tăng traffic keywords, tăng Alexa, tạo Google Searchbox dễ dàng chỉ với vài thao tác đơn giản ai cũng làm được." />
    <meta name="author" content="Linh Nguyễn">
	
</head>
<body>
<?php
$okshare=mysqli_query($con,"select * from fs_share where share_iduser=".$idUser);
$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
$pointOfUser = mysqli_fetch_array($result);
$pointCurrent = $pointOfUser['point'];
$timezone  = +7;//+7; //(GMT +7:00) 
$timeCurrent = time() + 3600*($timezone+date("0"));
$share = false;
if($okshare->num_rows>0)
{
	$row = mysqli_fetch_array($okshare);
	$timeSaved=strtotime($row['share_time']);
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
						name: '<?php echo $_SESSION['session-name'];?> chia sẻ các bạn link đăng kí hội thảo SEO 2015 do anh Tuấn Hà & Linh Nguyễn chia sẻ!',
						link: '<?php echo $link; ?>',
						picture: '<?php echo $linkimg; ?>',
						caption: '',
						description: 'Cơ hội dành cho những bạn yêu SEO khám phá những bí quyết đẩy top và giữ top bền vững từ các chuyên gia SEO.',
					   },
					   function(response) {
						 if (response && response.post_id) {
							addPointShare(idUser);
						 } else {
						   alert('Share Faceseo được cộng 1000 điểm.');
						 }
					   }
					);		
			}
		});	
	};
	function addPointShare(idUser)
	{	
			var url="http://faceseo.vn/modules/qibhi3hgha11.php";
			var point = 500;
			var xmlhttp;
			if(window.XMLHttpRequest){
			  xmlhttp=new XMLHttpRequest();
			}else{
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			};
			var params = "idUser=" + idUser + "&point=" +point;
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
<div style="width:45%;float:right;height:300px;margin:5px;text-align:center;"> Cơ hội dành cho những bạn yêu SEO khám phá những bí quyết đẩy top và giữ top bền vững từ các chuyên gia SEO.</div>
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
<br/>
Buổi hội thảo chỉ còn 20 ghế. Hãy share kiếm 1000 điểm & đăng kí nhanh: <a href="http://faceseo.vn/seo/dang-ki-hoi-thao-seo-2015-hcm/">http://faceseo.vn/seo/dang-ki-hoi-thao-seo-2015-hcm/</a>
</body>
</html>
