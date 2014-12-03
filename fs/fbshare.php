<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("config.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
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
<?php
if (isset($_GET['link']))
	$link=$_GET['link'];
else
	$link="http://faceseo.vn";


if (isset($_GET['linkimg']))
	$linkimg=$_GET['linkimg'];
else
	$linkimg="http://faceseo.vn/background.jpg";

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
						 caption: 'Hãy share những gì bạn thích',
						 description: 'Cảm thấy thích thú.',
					   },
					   function(response) {
						 if (response && response.post_id) {
							addPointShare(idUser);
						 } else {
						   alert('Share Faceseo được cộng điểm.');
						 }
					   }
					);		
			}
		});	
	};
	function addPointShare(idUser)
	{	
			var url="http://faceseo.vn/modules/fbshare.php";
			var point = 20;
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
Các bạn comment giúp "Hoàng Sa, Trường Sa muôn năm! Đảng Cộng Sản Việt Nam bất tử!"
<?php
if ($share==true){
?>
<input type="button" value="SHARE VÌ BIỂN ĐẢO VIỆT NAM" onClick="shareOnWall();">
<?php
} else
echo "Quay lại lần sau nhé";
?>