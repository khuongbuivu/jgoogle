<script>
var a1="D%E1%BB%8ACH%20V%E1%BB%A4%20SEO";
var a2="D%E1%BB%8ACH%20V%E1%BB%A4%20SEO";
var a3="HTTP%3A%2F%2FGIAIPHAPTHUONGHIEU.VN%2FDICH-VU-SEO-WEBSITE-TOP-GOOGLE%2F";
var x="cccccc"
// if ( ( (a1.search(a2) >-1) || (a3.search(a2)>-1)) && (a2!==""))
	// alert("xxxxx");

</script>


<?php
$str="http://http//suanha24h.com.vn/sua-chua-nha/67-cty-sua-nha-uy-tin-chat-luong-va-chuyen-nghiep-nhat.html";
echo strpos($str,"wwww");

$match="http://diathe.vn/vi/sieu-thi-dia-oc.re.html";
$match1 =$match;
echo strpos($match,"www");
if (strpos($match,"www")==0 && strpos($match,"www")!="" && strpos($match,"www")!==null)
	$match1 ="http://".$match;
echo $match1;
echo stripos("I love php, I love php too!","PHP1");
$aaa="http://seomxh.com/";
function removeSlashEndUrl($url)
{
	return rtrim($url, "/");
}
echo removeSlashEndUrl($aaa);

$text="http://giaiphapthuonghieu.vn/";

// print_r (getListUrl($text));
getListUrl($text);

function getListUrl($text)
{
	
	
		 // The Regular Expression filter
	   // $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$reg_exUrl = "/(http|https|ftp|ftps|www)+(\:\/\/)*\S*/";
		// The Text you want to filter for urls
		// Check if there is a url in the text
		echo $text;
		if(preg_match_all($reg_exUrl, $text, $url)) {
			   // make the urls hyper links
			   $matches = array_unique($url[0]);
			   print_r( $matches);
			   return  $matches;
		}
		return null;

}
/*
function getListKeys($text)
{
	$reg_exUrl = "/(?<=\#\#\#).*?(?=\*\*\*)/";
	if(preg_match_all($reg_exUrl, $text, $url)) {
		return $url[0];
	}
	return null;
	// test http://www.heise.de/download/mouse-recorder-pro-ec216441dbc757d56808a7b076f4de5f-1413478779-2669347.html ###50s***
}
$str="http://giaiphapthuonghieu.vn/ ###dịch vụ seo*** http://giaiphapthuonghieu.net/ ###bảng giá seo*** http://giaiphapthuonghieu.org/ ###đào tạo seo***";
$keys=getListKeys($str);
print_r($keys);

require_once("config.php");
global $host;
global $user;
global $pass;
global $db;
echo file_get_contents("http://dsvn.vn/#/");
function get_likes($url) {
 
    $json_string = getPage('http://graph.facebook.com/?ids=' . $url);
	print_r($json_string);
    $json = json_decode($json_string, true);
	
    return intval( $json[$url]['shares'] );
}
function getPage($url){
    if(!isset($timeout))
        $timeout=200;
    $curl = curl_init(); 
    curl_setopt ($curl, CURLOPT_URL, $url);
    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $html = curl_exec ($curl);
    curl_close ($curl);
    return $html;
};
function facebook_count($url){
 
    // Query in FQL
    $fql  = "SELECT share_count, like_count, comment_count ";
    $fql .= " FROM link_stat WHERE url = '$url'";
 
    $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
	echo  $fqlURL;
    // Facebook Response is in JSON
    $response = getPage($fqlURL);
	echo "response".$response;
    return json_decode($response);
 
}
echo getPage("http://dsvn.vn/#/");

$fb = get_likes('https://www.facebook.com/digital.inspiration');
 
// facebook share count
echo $fb[0]->share_count;
 
// facebook like count
echo $fb[0]->like_count;
 
// facebook comment count
echo $fb[0]->comment_count;

$con=mysqli_connect($host,$user,$pass,$db);
$result=mysqli_query($con,"select * from atw_point");
echo "xxx".$result->num_rows;
$row = mysqli_fetch_array($result);

$string="             thamtu tu";
$bbb=trim($string);
// $bbb=$string;
echo "ccccc".$bbb."<br/>";

echo strcmp("https://www.google.com.vn/#q=%C4%91%C3%A0o+t%E1%BA%A1o+seo+faceseo","https://www.google.com.vn/#q=%C4%91%C3%A0o+t%E1%BA%A1o+seo+facese");

echo $host." ".$user." ".$pass;
$cnn = mysql_connect($host,$user,$pass) or die ("can not connect");
mysql_select_db($db,$cnn);
mysql_query("SET NAMES 'utf8'"); 
$query='select * from atw_point';
mysql_query($query);
$row = mysqli_fetch_array($result);
print_r($row );
echo "Test connection".$pass;

//mysqli_connect("localhost","faceseovn","faceseovn@","faceseovn");

/*
$timeSaved= substr("08:38:11 15/11/14",0,8);
$oldday=substr("08:38:11 27/12/14",9);
echo $oldday."<br/>";
echo $timeSaved."<br/>";
$currentTime=date("H:i:s");
$dayTime=date("d/m/y");
echo $dayTime."<br/>";
echo $currentTime."<br/>";
$t2 = strtotime($dayTime);
$t1 = strtotime($oldday);
$t= $t2 - $t1;
echo $t;
if ($oldday==$dayTime)
 echo "xxxxx";

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

// http://johndyer.name/getting-counts-for-twitter-links-facebook-likesshares-and-google-1-plusones-in-c-or-php/
// http://stackoverflow.com/questions/8003948/how-can-i-get-the-number-of-share-for-a-post-on-a-fan-page
?>