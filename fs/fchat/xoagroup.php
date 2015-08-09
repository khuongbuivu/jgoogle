<?php 
$conuser=mysqli_connect("localhost","chatreport","faceseovn@","chatreport") or die("Không kết nối được");
mysqli_set_charset($conuser, "utf8");
$giohientai=date('Y-m-d H:i:s');
$inthientai=strtotime($giohientai);

$ngay=1;
$gio=1;
$phut=60;
$giay=60;
$truoc=$inthientai-$giay*$phut*$gio*$ngay;
$query='"DELETE FROM chattext  WHERE timestamp <'.$truoc;
$data=mysqli_query($conuser,$query);



$phut=60;
$giay=60;

?>
<head>
<meta http-equiv="refresh" content="<?php echo $phut*$giay;?>">
</head>