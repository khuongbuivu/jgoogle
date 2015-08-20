<?php
if(!isset($_SESSION)){
    session_start();
}
// require_once("hrb7yfq5yr40.php");
// require_once("wn3z74w1oe32.php");
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
$link="http://blognguyenhonglinh.blogspot.com/2015/08/gioi-thieu-khoa-hoc-marketing-online-faceseo.html";
$linkimg="http://faceseo.vn/images/470x245-banner-faceseo-dts.jpg";
$title="";
$name="Muốn tham gia khóa học này để tăng doanh thu";
$description="Không biết có bạn nào đi học chung không? Mình cũng mong muốn đi học về phục vụ tốt công việc nhưng không biết thế nào? Các bạn cho ý kiến với";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>FACESEO cộng đồng SEO hùng mạnh của Việt Nam</title>
	<meta name="description" content="Bạn cần tăng traffic textlink, tạo Google Searchbox, giảm Alexa thử sử dụng Faceseo. Hệ thống đang được nhiều SEOER Việt sử dụng" />
    <meta name="author" content="Linh Nguyễn">
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
	if ($pointCurrent > -1 && $pointCurrent < 100 && $day > 5 )
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
					FB.ui({	method: 'feed', name: "<?php echo $name; ?>",link: "<?php echo $link; ?>",picture: "<?php echo $linkimg; ?>",caption: "",description: "<?php echo $description; ?>"},
						   function(response) {
							 if (response && response.post_id) {
								addPointShare(idUser);
								
							 } else {
							   alert('Share Faceseo được cộng 500 điểm.');
							   
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
					window.location.assign("http://faceseo.vn");
					alert(xmlhttp.responseText);
					window.location.assign("http://faceseo.vn");
					
				}
			};
		  xmlhttp.send(params);
	};
	
</script>

	<?php 
		if ($share==true):
		?>
		<!--
		<div style="text-align:center"><h3><blink>TẶNG NGAY 500Đ KHI SHARE THÔNG ĐIỆP NÀY!</blink></h3><span style="color:red">Bộ phận support vui lòng kiểm tra Facebook của những Bạn đã share.</span><br/>Liên hệ support qua Facebook:<a href="https://www.facebook.com/nhu.dhuynh"> https://www.facebook.com/nhu.dhuynh</a></div>
		
		<a href="#"  onClick="shareOnWall();"><img src="http://faceseo.vn/images/modules/upload/banner/01-15/image-abc-old.jpg" style="width:100%"></a>
		-->
		
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
		<?php echo $name;?>
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
				<span style="font-size:18px;font-family: 'vni-avobold',VNI-Avo,Arial;font-weight:bold">Taëng 500ñ khi share thoâng ñieäp naøy!</span>
			</div>
			<div style="margin-top:20px">
				<span style="font-size:14px;font-family: VNI-Avo,Arial;">Boä phaän Support vui loøng kieåm tra Facebook cuûa nhöõng baïn ñaõ Share
				</span>
			</div>
			<div style="margin-top:20px">
				<span style="font-size:14px;font-family: VNI-Avo,Arial;">Lieân heä Support qua Facebook: <a targe="_blank" href="https://www.facebook.com/nguyenlinh.ceo.faceseo">https://www.facebook.com/nguyenlinh.ceo.faceseo</a>
				</span>
			</div>
			
		</div>
		
		<?php 
		else:
			header( 'Location: http://faceseo.vn' );
		endif
	?>

</body>
</html>
