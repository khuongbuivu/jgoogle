<?php
session_start();
require_once("config.php");
require_once("user.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
$idUser=$_SESSION['session-user'];
$infoUser=getUserInfo($idUser);
$okshare=mysqli_query($con,"select * from fs_birthday_share where share_iduser=".$idUser);
$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
$pointOfUser = mysqli_fetch_array($result);
$pointCurrent = $pointOfUser['point'];
$timezone  = +7;//+7; //(GMT +7:00) 
$timeCurrent = time() + 3600*($timezone+date("0"));
$share = false;
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
   eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('f.1v({1u:\'1x\',o:6,1y:6,18:6});5 13(){f.P(5(1){8(1.o===\'Q\'){2 3=1.R.N;f.M({K:\'V\',1m:\'A tặ9 <?p Z $Y[\'X\']; ?> q điểm wân 9ày W wật.\',10:\'d://7.k\',11:\'d://7.k/16/15/14-12-7.U\',17:\'Túc bạn L Jỏe và làm H tốt hơn\',S:\'Bạn Oệt là zễ 1rươ9 đó mà!\',},5(1){8(1&&1.1p){u(3)}s{E(\'1n A được cộ9 điểm.\')}})}})};5 u(3){2 F="d://7.k/1l/1d.p";2 a=q;2 0;8(19.r){0=D r()}s{0=D 1f("1k.1j")};2 g="3="+3+"&a="+a;0.1z("1e",F,6);0.j("G-1b","1c/x-1w-1s-1o");0.j("G-C",g.C);0.j("1a","1h");0.1g=5(){8(0.1i==4&&0.o==1t){E(0.1q)}};0.I(g)};',62,98,'xmlhttp|response|var|idUser||function|true|faceseo|if|ng|point|||http||FB|params|||setRequestHeader|vn||||status|php|1000|XMLHttpRequest|else||addPointShare||nh||||Faceseo||length|new|alert|url|Content|marketing|send|kh|method|vui|ui|userID|thi|getLoginStatus|connected|authResponse|description|Ch|jpg|feed|sinh|user_name|infoUser|echo|link|picture|share|shareOnWall|banner|css|images|caption|xfbml|window|Connection|type|application|birthday|POST|ActiveXObject|onreadystatechange|close|readyState|XMLHTTP|Microsoft|modules|name|Share|urlencoded|post_id|responseText|th|form|200|appId|init|www|731864150162369|cookie|open'.split('|'),0,{}))

</script>
<strong>
Chúc mừng sinh nhật. Cùng share Faceseo +1000đ. Ngày vui của bạn cũng là ngày vui Faceseo.
</strong>
<?php
if ($share==true){
?>
<input type="button" value="SHARE FACESEO" onClick="shareOnWall();">
<?php
} else
echo "Đúng ngày này năm sau nút share sẽ xuất hiện.";
?>