
<?php
// Remove tag
// $string = 'Here is your content with an image tag <a href=http://www.giaiphapthuonghieu.vn/dang-ki-khoa-hoc-seo  onclick="return openUrl(this.href,60);" >http://www.giaiphapthuonghieu.vn/dang-ki-khoa-hoc-seo</a><br /><a href=http://giaiphapthuonghieu.vn/daotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html  onclick="return openUrl(this.href,60,90829);" >http://giaiphapthuonghieu.vn/daotaoseo-dao-tao-seo-website-thuc-hanh-du-an-...</a>' ;
$string = '<a class="highlighter" href="#" contenteditable="true"><b>Linh Nguyen</b>·cho e xin cái ổi</a>' ;
$string = preg_replace("/<a[^>]+\>/i", "", $string); 
echo $string; // will output "Here is your content with an image tag" without the image tag

$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
$times='2014-12-23 14:15:01,2014-12-15 14:13:36';
$IDU=1;
$time	= getTimeSave($times,$IDU);
$newtimes= insertStrTime($times,$IDU,$datetime);
echo "<br/>".$time."<br/>";
echo "<br/>".$datetime."<br/>";
echo "<br/>".$newtimes."<br/>";
function find($str,$arr)
{
	$l=split(",",$arr);
	for ($i=0;$i<count($l);$i++)
	{
		if($l[$i]==$str)
			return $i;
	}
	return -1;
}
function getTimeSave($strtime,$index)
{
	$start	=$index*20;
	$numchar=19;
	return substr($strtime,$start,$numchar);
}
function insertStrTime($strTime,$i,$currentTime)
{
	return substr_replace($strTime, "$currentTime,", $i*20, 20);
}
/*
function generatePassword($length = 8) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}

		return $result;
}

//echo "Pass ".generatePassword();
echo "<br/>".md5('1000000812255751');



$string="567@";
$string1="'@";
$string2="1234";
echo "<br/>";
echo md5($string)."<br/>";
echo md5($string1)."<br/>";
echo md5($string2)."<br/>";
$str=1;
echo "bbbb";
$arr=split("··",$str);	
echo count($arr);
for ($i=0;$i<count($arr);$i++)
{
	echo $arr[$i]." :";
}
echo "<br/>";
$mystring = "abcbdddba";
$pos = strrpos($mystring, "e");
echo $pos;
echo substr($mystring,0,$pos);
*/

?>