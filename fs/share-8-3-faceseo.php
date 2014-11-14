<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("config.php");
require_once("user.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
$okshare=mysqli_query($con,"select * from fs_8_3_share where share_iduser=".$idUser);
$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
$pointOfUser = mysqli_fetch_array($result);
$pointCurrent = $pointOfUser['point'];
$timezone  = +7;//+7; //(GMT +7:00) 
$timeCurrent = time() + 3600*($timezone+date("0"));
$share = false;
$infoUser=getUserInfo($idUser);
if($okshare->num_rows>0)
{
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
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('f.M({I:\'E\',o:9,F:9,12:9});2 Z(){f.15(2(1){a(1.o===\'W\'){5 6=1.X.V;f.R({S:\'Y\',13:\'j gúc gị e 10ụ nữ 8-3 11 Qỏe.\',P:\'l://7.k\',G:\'l://7.k/H/C/D-8-3-7.J\',O:\'Tặw gị e qđ để có K Lần 14 tốt hơn\',1k:\'j 1j.\',},2(1){a(1&&1.16){s(6)}r{u(\'1o j được cộw điểm.\')}})}})};2 s(6){5 B="l://7.k/18/8-3.1c";5 b=q;5 0;a(1g.z){0=y z()}r{0=y 1f("1e.1d")};5 d="6="+6+"&b="+b;0.1a("1h",B,9);0.p("A-1i","1r/x-1n-1l-1m");0.p("A-v",d.v);0.p("17","1b");0.1q=2(){a(0.19==4&&0.o==1p){u(0.N)}};0.U(d)};',62,90,'xmlhttp|response|function|||var|idUser|faceseo||true|if|point||params||FB|ch|||Faceseo|vn|http|||status|setRequestHeader|1000|else|addPointShare||alert|length|ng||new|XMLHttpRequest|Content|url|css|hoa|731864150162369|cookie|picture|images|appId|jpg|tinh|th|init|responseText|caption|link|kh|ui|method||send|userID|connected|authResponse|feed|shareOnWall|ph|vui|xfbml|name|Seo|getLoginStatus|post_id|Connection|modules|readyState|open|close|php|XMLHTTP|Microsoft|ActiveXObject|window|POST|type|Group|description|form|urlencoded|www|Share|200|onreadystatechange|application'.split('|'),0,{}))

</script>
<h1>
8-3 chúc chị e vui khỏe. Chương trình share chỉ dành cho các chị e.
</h1>
<?php
if ($share==true){
?>
<input type="button" value="SHARE FACESEO" onClick="shareOnWall();">
<?php
} else
echo "Quay lại lần sau nhé";
?>