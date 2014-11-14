<?php
session_start();
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
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('d.W({X:\'Y\',l:9,V:9,U:9});2 R(){d.S(2(1){8(1.l===\'T\'){7 5=1.Z.10;d.16({17:\'18\',15:\'[E 14] Đào tạo Q nâj e tại y 6/4/12.\',13:\'f://G.b/D-A-p-B-u-e/\',19:\'f://G.b/D-A-p-B-u-e/M/K-p-J-z.L\',O:\'Địa điểm I Nạm Pọc 11ạ1g, 1Aận 3, 1C.y\',1v:\'1yân 1xọj!\',},2(1){8(1&&1.1w){w(5)}v{q(\'1a E được cộj điểm.\')}})}})};2 w(5){7 H="f://z.b/1u/1z.1D";7 g=1B;7 0;8(1t.s){0=F s()}v{0=F 1r("1s.1h")};7 k="5="+5+"&g="+g;0.1f("1e",H,9);0.h("C-1b","1c/x-1d-1i-1j");0.h("C-r",k.r);0.h("1p","1q");0.1o=2(){8(0.1n==4&&0.l==1k){q(0.1l)}};0.1m(k)};',62,102,'xmlhttp|response|function|||idUser||var|if|true||vn||FB|cao|http|point|setRequestHeader||ng|params|status||||hoc|alert|length|XMLHttpRequest||nang|else|addPointShare||HCM|faceseo|ki|adwords|Content|dang|Faceseo|new|giaiphapthuonghieu|url|19B|seo|phong|jpg|images|Ph|caption|Ng|Adwords|shareOnWall|getLoginStatus|connected|xfbml|cookie|init|appId|731864150162369|authResponse|userID|Th|2014|link|Offline|name|ui|method|feed|picture|Share|type|application|www|POST|open|ch|XMLHTTP|form|urlencoded|200|responseText|send|readyState|onreadystatechange|Connection|close|ActiveXObject|Microsoft|window|modules|description|post_id|tr|Tr|add_point_share|Qu|500|TP|php'.split('|'),0,{}))

</script>
<h1>
Trước tiên phải đăng nhập Faceseo.<br/>
Lần đầu tiên share +500đ. Các lần sau khi bạn thấy nút share hiện lên share thì số điểm cộng thêm sẽ là 1 số ngẫu nhiên > 100 đ.
</h1>
<?php
if ($share==true){
?>
<input type="button" value="SHARE FACESEO" onClick="shareOnWall();">
<?php
} else
echo "Quay lại lần sau nhé";
?>