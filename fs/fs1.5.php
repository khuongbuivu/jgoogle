<?php
if(!isset($_SESSION)){
    session_start();
}
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include("wn3z74w1oe32.php");
require_once('system/6dxzm0g3bd57.php');

$_SESSION['ip'] = getUserIP();
$POINT_BACKLINK=5;
$MAXMINUTEVIEW_BACKLINK=10;
$UPDATE=0;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
global $host;
global $user;
global $pass;
global $db;	
$urlClicked	=	trim($_GET['urlClicked']);
$urlClicked=rtrim($urlClicked, "/");
$idUser		=	$_GET['idUser'];
$timeOpendClient	=	$_GET['timeOpend'];
$timeOpend 	= 	date("H:i:s d/m/y");

$timeclick = TimeClick();

$timeClose	=	$_GET['timeClose'];
$linkText	=	$_GET['linkText'];
if ($UPDATE==1)
	$linkText	=	"Cick update Addon Chrome 1.9";
$parent		=	trim($_GET['parent']);
$parent = removeSlashEndUrl($parent);
$BACKLINK		= 2;// HE SO BACKLINK
$checkkey=0;
if ($_GET['checkkey']==1)
{
	$BACKLINK = 10;
	$checkkey=1;
}
if ($timeClose!="In view")
	$timeClose	=	date("H:i:s d/m/y");

$currentDay = substr($timeOpendClient,9);// using time of client
$timeView	=	$_GET['timeView'];
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$resultviewing=mysqli_query($con,"select * from atw_click_link where iduser='".$idUser."' and link like '%".$parent."%' and timeclienttmp like '%".$currentDay."%' order by id desc limit 1" );
echo "select * from fs_click_backlink where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp like '%".$currentDay."%' order by id desc limit 1";
$urlClicked = substr($urlClicked,0,254);
$resultbacklink=mysqli_query($con,"select * from fs_click_backlink where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp like '%".$currentDay."%' order by id desc limit 1");
$resultidlink=mysqli_query($con,"select id from awt_list_url where url like '%".$urlClicked."%' limit 1");
$idlink=-1;
if ($resultidlink->num_rows>0)
{
	$row11 = mysqli_fetch_array($resultidlink);
	$idlink=$row11[id];
}
$IdBacklink = getIdMax("fs_click_backlink","id") + 1;

if ($timeClose=="In view")
{
	echo "INSERT INTO fs_click_backlink (id,link,iduser,timestart,timeclose,timeview,timeclienttmp,click_link_idlink,checkkey,timeclick) VALUES (".$IdBacklink.",'".$urlClicked."','".$idUser."','".$timeOpend."','".$timeClose."','".$timeView."','".$timeOpendClient."',".$idlink.",".$checkkey.",'".$timeclick."')";
	$rv = mysqli_query($con,"INSERT INTO fs_click_backlink (id,link,iduser,timestart,timeclose,timeview,timeclienttmp,click_link_idlink,checkkey,timeclick) VALUES (".$IdBacklink.",'".$urlClicked."','".$idUser."','".$timeOpend."','".$timeClose."','".$timeView."','".$timeOpendClient."',".$idlink.",".$checkkey.",'".$timeclick."')");
	// Update keywords thì dựa vào link parent, $currentday,iduser
	if ( $rv === true ){
		if ($resultviewing->num_rows>0)
		{
			$rvw=mysqli_fetch_array($resultviewing);
			$Idbl=$rvw['idclicked']==""?$IdBacklink:$rvw['idclicked']."··".$IdBacklink;
			$lt=$rvw['keyclick']==""?$linkText:$rvw['keyclick']."··".$linkText;
			mysqli_query($con,"UPDATE atw_click_link set idclicked = '".$Idbl."' ,keyclick='".$lt."' where iduser='".$idUser."' and id=".$rvw['id']." and link like '%".$parent."%' and timeclienttmp like '%".$currentDay."%'");
		}
		else
			mysqli_query($con,"UPDATE atw_click_link set idclicked = '".$IdBacklink."' ,keyclick=".$linkText." where iduser='".$idUser."' and link like '%".$parent."%' and timeclienttmp like '%".$currentDay."%'");
	}
}
else // Close tab
{
	echo "Kekeke";
	if (($resultbacklink->num_rows>0))
	{
		echo "bbbbbbbbbbbbbbb";
		if ($timeClose!="In view")
			$timeClose	=	date("H:i:s d/m/y");
		if ($_GET['deepbacklink']=="1")
		{		
			echo "UPDATE fs_click_backlink set timeclose = '".$timeClose."' ,timeview=".$timeView." where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp like '%".$currentDay."%'";
			if ($UPDATE!=1)
			mysqli_query($con,"UPDATE fs_click_backlink set timeclose = '".$timeClose."' ,timeview=".$timeView." where iduser='".$idUser."' and link like '%".$urlClicked."%' and timeclienttmp like '%".$currentDay."%'");
		}
		$resultIP=mysqli_query($con,"select ip_click_link_numview from fs_ip_click_link where ip_click_link_url='".$urlClicked."' and ip_click_link_id_user='".$idUser."' and ip_click_link_ip='".$_SESSION['ip']."'" );
		if ($resultIP->num_rows>0)
		{
			$row = mysqli_fetch_array($resultIP);
			$numview=intval($row['ip_click_link_numview']);
			$numview = $numview + 1;
			if ($numview>0)
			{
				mysqli_query($con,"UPDATE fs_ip_click_link set ip_click_link_numview = '".$numview."'  where ip_click_link_url='".$urlClicked."' and ip_click_link_id_user='".$idUser."' and ip_click_link_ip='".$_SESSION['ip']."'");
			}
		}
		else
		{
			mysqli_query($con,"INSERT INTO fs_ip_click_link (ip_click_link_url,ip_click_link_id_user,ip_click_link_ip,ip_click_link_numview,ip_click_link_time) VALUES ('".$urlClicked."','".$idUser."','".$_SESSION['ip']."',1,".$timeView.")");
		}
	}
}
// insert new backlink clicked
//mysqli_query($con,"INSERT INTO fs_click_backlink (id,link,iduser,timestart,timeclose,timeview,timeclienttmp,click_link_idlink) VALUES (".$IdBacklink.",'".$urlClicked."','".$idUser."','".$timeOpend."','".$timeClose."','".$timeView."','".$timeOpendClient."',".$idlink.")");
//echo "INSERT INTO fs_click_backlink (id,link,iduser,timestart,timeclose,timeview,timeclienttmp,click_link_idlink) VALUES (".$IdBacklink.",'".$urlClicked."','".$idUser."','".$timeOpend."','".$timeClose."','".$timeView."','".$timeOpendClient."',".$idlink.")";
// Link table atw_click_link to fs_click_backlink by idclicked
//mysqli_query($con,"UPDATE atw_click_link set idclicked =".$IdBacklink." where iduser='".$idUser."' and link like '%".$parent."%'");
// After insert backlink have id backlink changepage1 update keywords, idbacklink cho link đang view trước.

$linkClicked	=	$_GET['urlClicked'];
$linkClicked 	= 	removeSlashEndUrl($linkClicked);
$domain = getDomainName($linkClicked);
$uid= getUId($domain);
$idUser			=	$_GET['idUser'];
$TIMEVIEW		=	$_GET['timeView']; //60s
$minuteView = (int)(intval($TIMEVIEW)/60) ;
$token			=	$_GET['token'];
$okap			= false;
$dm = date("d/m"); 	
$s1= date("s");
$shortDay= str_replace("/","",$dm);
$User1=intval($_SESSION['session-user']) * intval($shortDay);
{
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$ctime = mysqli_query($con," select timeview, timeclose from atw_click_link where timeview > 299 and timeview < 601 and idUser=".$idUser." order by id desc");
	if($ctime->num_rows>0)
	{
		$rts = mysqli_fetch_array($ctime);
		$timeSaved= substr($rts['timeclose'],0,8);
		$oldday=substr($rts['timeclose'],9);
		$currentTime=date("H:i:s");
		$t2 = strtotime($currentTime);
		$t1 = strtotime($timeSaved);
		$t= $t2 - $t1;
		$dayTime=date("d/m/y");
		if ( ($t>5 && $oldday==$dayTime) || $oldday!=$dayTime)
		{
			$okap = true;
		}
		else
		{
			$okap = false;
			// exit();
			// mysqli_query($con,"UPDATE atw_user set user_status = 'FS: AUTO ADD POINT BANNER' where user_id=".$_SESSION['session-user']);
		}
	}
	
	$okap=true;
	$pointView=0;
	if (($okap==true) && ($UPDATE==0))
	{
		/* Add Point */
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$result1=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$parent."'");
		while ($row = mysqli_fetch_array($result))
		{
			if(!($result1->num_rows>0))
			{				
				if($minuteView < 2)
				{
					$point = $row['point'];
				}
				else
				{
					
					$minuteView = $minuteView > $MAXMINUTEVIEW_BACKLINK ? $MAXMINUTEVIEW_BACKLINK : $minuteView;				
					$pointView = $minuteView*$BACKLINK;
					$point = $pointView + $row['point'];
					echo "POINT".$pointView;
					
				}
			}
			else
			{
				echo " Không cộng điểm vì view đúng link của mình";
				$point = $row['point'];
			}
		}	
		if ($result->num_rows>0)
		{
			echo "Update Point";
			mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		}
		else
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		
		/* Sub Point */
		$point = 0;
		$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$parent."%' limit 1" );
		if($result->num_rows>0)
		{
			$row = mysqli_fetch_array($result)		;
			$idUserOfUrl = $row[0];
		}		
		if ($idUser	!=$idUserOfUrl && $idUserOfUrl!="")
		{
			$idUserB = $idUserOfUrl;
			$result=mysqli_query($con,"select * from atw_point where idUser=".$idUserB);			
			while ($row = mysqli_fetch_array($result))
			{		
					$point = -$pointView + $row['point'];
			}	
			if ($result->num_rows>0)
				$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUserB);	
			else
				$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUserB.",".$point.")");
		}
	}
}
mysqli_close($con);
function removeSlashEndUrl($url)
{
	return rtrim($url, "/");
}
function getDomainName($url)
{
	$host = parse_url( $url, PHP_URL_HOST );
	$parts = explode( '.', $host );
	$parts = array_reverse( $parts );
	$domain = $parts[1].'.'.$parts[0];
	return $domain;
}
function getUId($url)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$url."%' limit 1");
	if ($result11->num_rows>0)
	{
		$row = mysqli_fetch_array($result);
		$iduser=$row[iduser];
		mysqli_close($con);
		return $iduser;
	}
	mysqli_close($con);
	return -1;
}
function checkKeyClickAvailable($user,$link,$key,$time)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);


}
function TimeClick()
{
	$H = date("H");
	$I = date("i");
	$I= intval ((intval ($I))/6)."0";
	$S = date("00");
	$D = date("d/m/y");
	return $H.":".$I.":".$S." ".$D;

}
// Rãnh xem lại để check bảo mật không refresh liên tục để kiếm điểm
// Kiem tra xem neu cai link do cua user A ma user P mang post len thi no tru diem user nao
//http://localhost/faceseo.vn/fs1.5.php?urlClicked=%20http%3A%2F%2Fpinduphongtot.net%2Fcollections%2Fxiaomi&idUser=100001707050712&timeOpend=10%3A29%3A31%2029%2F04%2F2015&timeClose=In%20view&timeView=0&linkText=Pin%20d%E1%BB%B1%20ph%C3%B2ng%20Xiaomi&parent=%20http%3A%2F%2Fpinduphongtot.net%2Fblogs%2Fnews%2F1000017893-tu-van-chon-pin-du-phong-phu-hop-voi-dien-thoai&deepbacklink=1
// http://localhost/faceseo.vn/fs1.5.php?urlClicked=%20http%3A%2F%2Fhuongdanmotaikhoan.com%2Ffxpro&idUser=100001707050712&timeOpend=12%3A30%3A11%2029%2F04%2F2015&timeClose=In%20view&timeView=0&linkText=Fxpro&parent=%20http%3A%2F%2Fhuongdanmotaikhoan.com%2Ffxpro%2F&deepbacklink=1&checkkey=1
//http://localhost/faceseo.vn/fs1.5.php?urlClicked=%20http%3A%2F%2Fhuongdanmotaikhoan.com%2Ffxpro&idUser=100001707050712&timeOpend=12%3A30%3A11%2029%2F04%2F2015&timeClose=12%3A35%3A20%2029%2F04%2F2015&timeView=308&linkText=Fxpro&parent=%20http%3A%2F%2Fhuongdanmotaikhoan.com%2Ffxpro%2F&deepbacklink=1&checkkey=1

//http://localhost/faceseo.vn/fs1.5.php?urlClicked=%20http%3A%2F%2Fwww.google.com.vn%2Furl%3Fsa%3Dt%26rct%3Dj%26q%3D%26esrc%3Ds%26source%3Dweb%26cd%3D1%26ved%3D0CBsQFjAA%26url%3Dhttp%253A%252F%252Fgiaiphapthuonghieu.vn%252Fdaotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html%26ei%3DFrBAVd-4GsXCmwW0yYGIBQ%26usg%3DAFQjCNEa_QflR9NqBjpmJa96GnAweqc6aQ%26sig2%3D-rZ06-G0yp8HYCjxkIJbvQ%26cad%3Drja&idUser=100001707050712&timeOpend=17%3A19%3A32%2029%2F04%2F2015&timeClose=17%3A24%3A39%2029%2F04%2F2015&timeView=307&linkText=Trung%20t%C3%A2m%20%C4%91%C3%A0o%20t%E1%BA%A1o%20Seo%20website%20t%E1%BA%A1i%20TP%20HCM&parent=%20https%3A%2F%2Fwww.google.com.vn%2F%23q%3D%25C4%2591%25C3%25A0o%2Bt%25E1%25BA%25A1o%2Bseo%2Bfaceseo&deepbacklink=1
?>