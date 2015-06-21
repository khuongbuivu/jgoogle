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
mysqli_set_charset($con, "utf8");
$idUser=$_SESSION['session-user'];
$linkLogoFace="https://graph.facebook.com/$idUser/picture";
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://".DOMAIN;
if (isset($_GET['linkimg'])&& $_GET['linkimg']!="" && $_GET['linkimg']!=null)
{
	$linkimg=$_GET['linkimg'];
}
else
	$linkimg=FULLDOMAIN."/images/faceseo/470x245-banner.jpg";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FACESEO TRUNG TÂM ĐÀO TẠO SEO CHẤT LƯỢNG & UY TÍN VIỆT NAM</title>
	<meta name="description" content="Tôi đã từng học tại nhiều nơi nhưng đến với trung tâm đào tạo seo FACESEO tôi được học thêm nhiều cách làm đơn giản hơn, hiệu quả hơn. Cảm ơn Linh Nguyễn." />
	<meta charset="utf-8">
	<style>
	@font-face {
    font-family: 'vni-avobold';
    src: url('login/css/VNI-Avo.woff');
    font-weight: normal;
    font-style: normal;	
	}
	</style>
</head>
<body style="background-color:#E7E7E6">
<?php
$okshare=mysqli_query($con,"select * from fs_fbshare where fbshare_link='".$link."'");
$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
$qLink=mysqli_query($con,"select title_url,des_url from atw_info_url where info_url like '%".$link."%' limit 1");
$rLink = mysqli_fetch_array($qLink);
$pointOfUser = mysqli_fetch_array($result);
$pointCurrent = $pointOfUser['point'];
$timezone  = +7;//+7; //(GMT +7:00) 
$timeCurrent = time() + 3600*($timezone+date("0"));
$share = false;
$title="";
$description="";
if($rLink['title_url']!="")
{
	$description=$rLink['title_url'];
}
else
{
	$description="Chia sẻ các bạn link bài viết hữu ích ".$link;
}
if($rLink['title_url'])
{
	$title=$rLink['title_url'];
}
else
{
	$title="Faceseo.vn hệ thống chia sẻ liên kết chất lượng hàng đầu thế giới.";
}

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
						 name: 'Tin HOT trong ngày luôn được cập nhật tại Faceseo.vn',
						 link: '<?php echo $link; ?>',
						 picture: '<?php echo $linkimg; ?>',
						 caption: '<?php echo $title?>',
						 description: '<?php echo $description;?>',
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

<div style="padding:23px 4px 23px 23px;background-color:#fff;height:407px; position: relative; width:656px; left:50%;top:50%; margin-left:-338px;">
<div style="width:438px;height:90%;float:left; background:url('images/button/share-border.png') right bottom no-repeat;text-align:center;">
<div style="float:left;width:35px;height:35px">
<img src="<?php echo $linkLogoFace;?>" width="35px" height="35px"/>
</div>
<div style="float:left;height:35px;line-height:35px;text-align: left;margin-left:10px; overflow: hidden;width:350px;">
<?php echo $link; ?>
</div>
<div style="clear:both"></div>
<div style="margin-top:8px;height:4px;width:410px;background-color:#e8e7e7;position:relative;"></div>
<div style="width:408px;height:300px;border:1px solid #ccc;margin-top:20px;">
<div style="width:100%;height:205px;overflow: hidden;"><img title="470x245" alt="470x245" src="<?php echo $linkimg; ?>" width="100%";height='205px'/></div>
<div style="margin-left:10px;font-size:18px;font-weight:bold;line-height:25px;text-align:left;overflow: hidden">
<?php echo $title;?>
</div>
<div style="margin-left:10px;font-size:16px;font-style: italic;line-height:20px;text-align:left;overflow: hidden;height:42px">
<?php echo $description;?>
</div>
</div>

	<div style="position: absolute;right:250px;bottom:20px">
	<?php 
	if ($share==true):
	?>
	<a href="#"  onClick="shareOnWall();"> <img src="images/button/share.png" /></a>
	<?php 
	else:
		echo "ĐÃ SHARE";
	endif
	?>
	</div>
</div>
<div style="float:right;width:214px; text-align:center;word-wrap: break-word;">
	<div style="margin-top:40px">
		<span style="font-size:18px;font-family: 'vni-avobold',VNI-Avo,Arial;font-weight:bold">Taëng 100ñ khi share thoâng ñieäp naøy!</span>
	</div>
	<div style="margin-top:20px">
		<span style="font-size:14px;font-family: VNI-Avo,Arial;">Boä phaän Support vui loøng kieåm tra Facebook cuûa nhöõng baïn ñaõ Share
		</span>
	</div>
	<div style="margin-top:20px">
		<span style="font-size:14px;font-family: VNI-Avo,Arial;">Lieân heä Support qua Facebook: <a targe="_blank" href="https://www.facebook.com/nhan.nobita">https://www.facebook.com/nhan.nobita</a>
		</span>
	</div>
	
</div>
</body>
</html>