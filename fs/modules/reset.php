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
$email="linh.nguyenhong@gameloft.com";
$newpass="newpass2";
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
//mail($to, $subject, $message, $headers);
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
mysqli_query($con,"UPDATE atw_user set user_tpass='".md5($newpass)."' where user_email='".$email."'");
mysqli_close($con);
$_SESSION['messlogin']='Kiểm tra mail '.$email.' để kích hoạt password mới';
echo $activepass;
//test http://localhost/faceseo.vn/modules/reset.php
?>
