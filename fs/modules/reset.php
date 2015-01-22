<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("../config.php");
include_once("../system/function.php");
/* // test function mail
if ( function_exists( 'mail' ) )
{
    echo 'mail() is available';
}
else
{
    echo 'mail() has been disabled';
} 
*/
$email=$_POST['email'];
$newpass=$_POST['pass'];
$to  = 'linh.nguyenhong@gameloft.com' ;
$subject = '[FACESEO] THAY ĐỔI PASSWORD';
$time=date("h:s");
$activepass= "http://localhost/faceseo.vn/activep.php?code=".md5($newpass)."&email=".$email."&token=".md5($time);
$message = '
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>[FACESEO] THAY ĐỔI PASSWORD</title>
</head>
<body>
  <p>Chào bạn!</p>
  Bạn vừa thay đổi thành công password mới <strong>'.$newpass.'</strong> . Hãy nhớ password này. Nếu bạn để lộ password thành viên khác sẽ sử dụng tài khoản của bạn cho việc câu view của họ. Bạn sẽ nhanh bị hết điểm mà không rõ lý do.<br/>
  Kích hoạt passwords mới.'.$activepass.'
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
// Additional headers
$headers .= 'To: linh.nguyenhong@gameloft.com' . "\r\n";
$headers .= 'From: Linh Nguyễn <linhnguyen@faceseo.vn>' . "\r\n";

global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$issetemailsend=mysqli_query($con,"select * from fs_sendmail where sendmail_email='".$email."'");
$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
$timeCurrent = time() + 3600*($timezone+date("0"));
if ($issetemailsend->num_rows>0)
{
	$row = mysqli_fetch_array($issetemailsend);
	$timeSaved=strtotime($row['sendmail_time']);
	$t =$timeCurrent - $timeSaved;		
	$day=0;
	if ($t>86400)
			$day=($t/86400);
	// onday reset, send mail one time
	if ($day > 1)
	{
		//mail($to, $subject, $message, $headers);
		mysqli_query($con,"UPDATE fs_sendmail set sendmail_time = '".$datetime."'  where sendmail_email='".$email."'");
		mysqli_query($con,"UPDATE atw_user set user_tpass='".md5($newpass)."' where user_email='".$email."'");
		$_SESSION['messlogin']='Kiểm tra mail '.$email.' để kích hoạt password mới';
	}
	else
	{
		$issetemailsend=mysqli_query($con,"select * from atw_user where user_email='".$email."' and user_tpass=''");
		if ($issetemailsend->num_rows>0)
			$_SESSION['messlogin']='Mỗi ngày chỉ được đặt lại pass 1 lần.';
		else
			$_SESSION['messlogin']='Mỗi ngày chỉ được đặt lại pass 1 lần. Vào mail kích hoạt passwords vừa đổi.';
	}
	
}
else
{
	mysqli_query($con,"insert into fs_sendmail (sendmail_email,sendmail_time) values ('".$email."','".$datetime."')");
	mysqli_query($con,"UPDATE atw_user set user_tpass='".md5($newpass)."' where user_email='".$email."'");
}

mysqli_close($con);
// echo $activepass;
//test http://localhost/faceseo.vn/modules/reset.php
?>
