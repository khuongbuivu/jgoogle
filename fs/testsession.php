<?php
function getListTimesView($text)
{
	$reg_exUrl = "/(?<=\#\#\#)(\d)*(?=[s|S]\*\*\*)/";
	if(preg_match_all($reg_exUrl, $text, $url)) {
		$matches = ($url[0]);
		return $matches;
	}
	return null;
}
$text="aaaaaaaaaaaa           ###50S***  bbbbbbbbbb ###1000S0S*** ###10001***";
echo count(getListTimesView($text));

?>