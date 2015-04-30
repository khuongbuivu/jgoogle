<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("hrb7yfq5yr40.php");
require_once("wn3z74w1oe32.php");
// require_once("definelocal.php");
// require_once("config.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
	$link="http://faceseo.vn";
	$linkimg="http://faceseo.vn/images/advertising/fs_viralfacebook.jpg";
	$linkimg="http://faceseo.vn/images/advertising/fb/470x245-banner-faceseo.jpg";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>FACESEO cộng đồng SEO hùng mạnh của Việt Nam</title>
	<meta name="description" content="Bạn cần tăng traffic textlink, tạo Google Searchbox, giảm Alexa thử sử dụng Faceseo. Hệ thống đang được nhiều SEOER Việt sử dụng" />
    <meta name="author" content="Linh Nguyễn">
	<style>
	.ccenter2 {
		height: 484px;
		left: 50%;
		margin-left: -250px;
		margin-top: -240px;
		padding: 10px;
		position: absolute;
		top: 40%;
		width: 500px;
	}
	blink {
  -webkit-animation: blink 1s step-end infinite;
  -moz-animation: blink 1s step-end infinite
  -o-animation: blink 1s step-end infinite;
  animation: blink 1s step-end infinite
	}
	 
	@-webkit-keyframes blink {
	  67% { opacity: 0 }
	}
	 
	@-moz-keyframes blink {
	  67% { opacity: 0 }
	}
	 
	@-o-keyframes blink {
	  67% { opacity: 0 }
	}
	 
	@keyframes blink {
	  67% { opacity: 0 }
	}
	img{
		width:400px !important;
		height:400px !important;
	}
	</style>
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
					FB.ui({	method: 'feed', name: "<?php echo $_SESSION['session-name'];?> chia sẻ các bạn hệ thống tăng traffic textlink, tạo Google Searchbox do Linh Nguyễn phát triển!",link: "<?php echo $link; ?>",picture: "<?php echo $linkimg; ?>",caption: "",description: "Cơ hội gặp gỡ giao lưu ăn nhậu cho a.e đây. Đăng kí tham gia chém gió cho vui a.e!"},
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
					alert(xmlhttp.responseText);
					window.location.assign("http://faceseo.vn");
				}
			};
		  xmlhttp.send(params);
	};
	
</script>
<div id="showindex" class="ccenter2">
	<?php 
		if ($share==true):
		?>
		<div style="text-align:center"><h3><blink>TẶNG NGAY 500Đ KHI SHARE THÔNG ĐIỆP NÀY!</blink></h3><span style="color:red">Bộ phận support vui lòng kiểm tra Facebook của những Bạn đã share.</span><br/>Liên hệ support qua Facebook:<a href="https://www.facebook.com/nhu.dhuynh"> https://www.facebook.com/nhu.dhuynh</a></div>
		
		<a href="#"  onClick="shareOnWall();"><img src="http://faceseo.vn/images/advertising/fb/image-fb.jpg" style="width:100%"></a>
		<?php 
		else:
			header( 'Location: http://faceseo.vn' );
		endif
	?>
</div>
</body>
</html>
