
<?php
// Remove tag
// $string = 'Here is your content with an image tag <a href=http://www.giaiphapthuonghieu.vn/dang-ki-khoa-hoc-seo  onclick="return openUrl(this.href,60);" >http://www.giaiphapthuonghieu.vn/dang-ki-khoa-hoc-seo</a><br /><a href=http://giaiphapthuonghieu.vn/daotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html  onclick="return openUrl(this.href,60,90829);" >http://giaiphapthuonghieu.vn/daotaoseo-dao-tao-seo-website-thuc-hanh-du-an-...</a>' ;
$string = '<a class="highlighter" href="#" contenteditable="true"><b>Linh Nguyen</b>·cho e xin cái ổi</a>' ;
$string = preg_replace("/<a[^>]+\>/i", "", $string); 
echo $string; // will output "Here is your content with an image tag" without the image tag


$string="567@";
$string1="'@";
$string2="1234";
echo "<br/>";
echo md5($string)."<br/>";
echo md5($string1)."<br/>";
echo md5($string2)."<br/>";
/*
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