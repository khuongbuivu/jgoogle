<a href="http://giaiphapthuonghieu.vn" rel="nofollow">Đào tạo seo</a>
<?php
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
?>