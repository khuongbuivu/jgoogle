<meta charset="UTF-8">
<?php
$url="http://faceseo.vn/fs1.5.php?urlClicked=%20https%3A%2F%2Fwww.google.com.vn%2Furl%3Fsa%3Dt%26rct%3Dj%26q%3D%26esrc%3Ds%26source%3Dweb%26cd%3D2%26ved%3D0CCEQFjAB%26url%3Dhttp%253A%252F%252Fgiaiphapthuonghieu.vn%252Fdich-vu-seo-website-top-google%252F%26ei%3D-mxGVbntM-a3mAWs4IDAAg%26usg%3DAFQjCNFZOWRdo6cC0NLJetIAgidZcEbVcQ%26sig2%3DSQDu1yM6_HIe9urzwf_GFQ&idUser=100001707050712&timeOpend=undefined&timeClose=In%20view&timeView=0&linkText=D%E1%BB%8Bch%20v%E1%BB%A5%20Seo%20website%20top%20Google%20nhanh%20uy%20t%C3%ADn%20%7C%20Faceseo%20Group&parent=%20https%3A%2F%2Fwww.google.com.vn%2F%3Fgws_rd%3Dssl%23q%3Dgi%25C3%25A1%2Bseo%2Bfaceseo&deepbacklink=1&checkkey=1";

echo urldecode($url);

exit();

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