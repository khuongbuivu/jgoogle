<meta charset="UTF-8">
<?php
$match="https://www.google.com.vn/?gws_rd=ssl#q=%C4%91%C3%A0o+t%E1%BA%A1o+seo+facesseo";
$match1 =$match;
if(strpos($match,"www")!="")
	echo "Khac rong"; 
if(strpos($match,"www")!=null)
	echo "Khac null";
$isw=strpos($match,"www");
if ($isw!== false && strpos($match,"www")==0)
	$match1 ="http://".$match;
	
	
echo "<br/>".$match1."<br/>";
$a = addhttp($match);
echo $a;
function addhttp($link)
	{
	
		$isw=strpos($link,"www");
		$url= $link;
		if ($isw!== false && strpos($link,"www")==0)
			$url ="http://".$link;
		return $url;
	}
?>