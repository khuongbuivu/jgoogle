<?php

	function addLinkUrl($text,$arrtimes,$idPost,$arrkeys)
	{
			if (isContentSex($text))
                return null;
			 // The Regular Expression filter
			$reg_exUrl = "/(http|https|ftp|ftps|www)+(\:\/\/)*\S*/";
			// The Text you want to filter for urls
			// Check if there is a url in the text
			if(preg_match_all($reg_exUrl, $text, $url)) {
				   // make the urls hyper links
				   $matches = array_unique($url[0]);
				   $ii=0;
				   $time=300;
				   if(count($arrtimes)>$ii)
						$time=$arrtimes[$ii];
					else
						$time = $_SESSION['TIMEMAXVIEWMYLINK'];
					
											
				   $replacement =  array();
				   //$count=count($matches)-1;
				   foreach($matches as $match) {
						$shortlink=$match;
						if (strlen($match)>75)
							$shortlink = substr($shortlink,0,75)."...";
						$key = "";
						if(count($arrkeys)>$ii)
							$key=$arrkeys[$ii];
						if(count($arrtimes)>$ii)
							$time=$arrtimes[$ii];
						else
							$time = $_SESSION['TIMEMAXVIEWMYLINK'];
						$match1 =$match;
						if (strpos($match,"www")==0 && strpos($match,"www")!="" && strpos($match,"www")!==null)
							$match1 ="http://".$match;
						if ($count==$ii || $arrkeys[$ii]!="")
							$replacement[$ii] = "<a href=".($match1)."  onclick=\"return openUrl(this.href,$time,$idPost,\'$key\');\" >{$shortlink}</a>";
						else
							$replacement[$ii] = "<a href=".($match1)."  onclick=\"return openUrl(this.href,$time);\" >{$shortlink}</a>";						
						//echo $match;
                        $match = str_replace("?","\?",$match);
                        $match = str_replace("#","\#",$match);
                        $match = str_replace("+","\+",$match);
						$text = preg_replace("#$match#","xyxxxzzy".$ii,$text,1);
						$ii=$ii + 1;
				   }
				   for ($jj=0;$jj<$ii;$jj ++)
				   {					
						$text = preg_replace("#xyxxxzzy".$jj."#",$replacement[$jj],$text,1);
				   }
				   return nl2br($text);
			} else {
				   // if no urls in the text just return the text
				   return nl2br($text);
			}
	}
	function getListUrl($text)
	{
		if (isContentSex($text))
                return null;
			 // The Regular Expression filter
		   // $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			$reg_exUrl = "/(http|https|ftp|ftps|www)+(\:\/\/)*\S*/";
			// The Text you want to filter for urls
			// Check if there is a url in the text
			if(preg_match_all($reg_exUrl, $text, $url)) {
				   // make the urls hyper links
				   $matches = array_unique($url[0]);
				   return  $matches;
			}
			return null;

	}
	function isContentSex($content)
	{
		$blackListContent = array ("sex","phim 18","mapphim","xemphim", "phim người lớn","phim nguoi lon", "truyện người lớn","truyen nguoi lon","18+", "viet 18","film sex");
		for ($i=0;$i<count($blackListContent);$i++)
			if (strpos($content,$blackListContent[$i]) !== false)
			{
				echo $content."    ";
				echo $blackListContent[$i]."    ";
				return true;
			}
		return false;
	}
	function checkToken($token)
	{
		$date = date("d/m/yy");
		$tmp= substr($token, -8);
		$firtToken = substr($token,0, strlen($token)-8);
		$shortDay= str_replace("/","",$date);
		if (strpos($tmp,$shortDay)!==false && intval($firtToken) > time())
		{
			return true;
		}
		else
		{
			return false;		
		}
			
	}
	
	function stringToAlias($string)
	{

		$str = str_replace('-', ' ', $string);
		$trans = array(
		"đ"=>"d","ă"=>"a","â"=>"a","á"=>"a","à"=>"a","ả"=>"a","ã"=>"a","ạ"=>"a",
		"ấ"=>"a","ầ"=>"a","ẩ"=>"a","ẫ"=>"a","ậ"=>"a",
		"ắ"=>"a","ằ"=>"a","ẳ"=>"a","ẵ"=>"a","ặ"=>"a",
		"é"=>"e","è"=>"e","ẻ"=>"e","ẽ"=>"e","ẹ"=>"e",
		"ế"=>"e","ề"=>"e","ể"=>"e","ễ"=>"e","ệ"=>"e",
		"í"=>"i","ì"=>"i","ỉ"=>"i","ĩ"=>"i","ị"=>"i",
		"ư"=>"u","ô"=>"o","ơ"=>"o","ê"=>"e",
		"Ư"=>"u","Ô"=>"o","Ơ"=>"o","Ê"=>"e",
		"ú"=>"u","ù"=>"u","ủ"=>"u","ũ"=>"u","ụ"=>"u",
		"ứ"=>"u","ừ"=>"u","ử"=>"u","ữ"=>"u","ự"=>"u",
		"ó"=>"o","ò"=>"o","ỏ"=>"o","õ"=>"o","ọ"=>"o",
		"ớ"=>"o","ờ"=>"o","ở"=>"o","ỡ"=>"o","ợ"=>"o",
		"ố"=>"o","ồ"=>"o","ổ"=>"o","ỗ"=>"o","ộ"=>"o",
		"ú"=>"u","ù"=>"u","ủ"=>"u","ũ"=>"u","ụ"=>"u",
		"ứ"=>"u","ừ"=>"u","ử"=>"u","ữ"=>"u","ự"=>"u",'ý'=>'y','ỳ'=>'y','ỷ'=>'y','ỹ'=>'y','ỵ'=>'y', 'Ý'=>'Y','Ỳ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y','Ỵ'=>'Y',
		"Đ"=>"D","Ă"=>"A","Â"=>"A","Á"=>"A","À"=>"A","Ả"=>"A","Ã"=>"A","Ạ"=>"A",
		"Ấ"=>"A","Ầ"=>"A","Ẩ"=>"A","Ẫ"=>"A","Ậ"=>"A",
		"Ắ"=>"A","Ằ"=>"A","Ẳ"=>"A","Ẵ"=>"A","Ặ"=>"A",
		"É"=>"E","È"=>"E","Ẻ"=>"E","Ẽ"=>"E","Ẹ"=>"E",
		"Ế"=>"E","Ề"=>"E","Ể"=>"E","Ễ"=>"E","Ệ"=>"E",
		"Í"=>"I","Ì"=>"I","Ỉ"=>"I","Ĩ"=>"I","Ị"=>"I",
		"Ư"=>"U","Ô"=>"O","Ơ"=>"O","Ê"=>"E",
		"Ư"=>"U","Ô"=>"O","Ơ"=>"O","Ê"=>"E",
		"Ú"=>"U","Ù"=>"U","Ủ"=>"U","Ũ"=>"U","Ụ"=>"U",
		"Ứ"=>"U","Ừ"=>"U","Ử"=>"U","Ữ"=>"U","Ự"=>"U",
		"Ó"=>"O","Ò"=>"O","Ỏ"=>"O","Õ"=>"O","Ọ"=>"O",
		"Ớ"=>"O","Ờ"=>"O","Ở"=>"O","Ỡ"=>"O","Ợ"=>"O",
		"Ố"=>"O","Ồ"=>"O","Ổ"=>"O","Ỗ"=>"O","Ộ"=>"O",
		"Ú"=>"U","Ù"=>"U","Ủ"=>"U","Ũ"=>"U","Ụ"=>"U",
		"Ứ"=>"U","Ừ"=>"U","Ử"=>"U","Ữ"=>"U","Ự"=>"U",);
		$str = strtr($str, $trans);
	$str = preg_replace(array('/\s+/','/[^A-Za-z0-9\-\.]/'), array('-',''), $str);
	$str = trim(strtolower($str));
	return $str;
	}
	function checkTimePost($currentTime,$timeSave){
		$t=$currentTime-$timeSave;
		if (($t/60)>5)
			return true;
		return false;
	}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function getListUIDVip($A)
{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$ruids = mysqli_query($con,"select idUser from fs_help_click where idUserHelp=$A order by pointHelp desc limit 50");
		$arrUIDVip = array();
		$i=0;
		while ($row = mysqli_fetch_array($ruids))
		{		
				$arrUIDVip[$i]	= $row[0];
				$i=$i+1;
		}	
		mysqli_close($con);
		return $arrUIDVip;
}

function getListTimesView($text)
{
	$reg_exUrl = "/(?<=\#\#\#)(\d)*(?=[s|S]\*\*\*)/";
	if(preg_match_all($reg_exUrl, $text, $url)) {
		return $url[0];
	}
	return null;
	// test http://www.heise.de/download/mouse-recorder-pro-ec216441dbc757d56808a7b076f4de5f-1413478779-2669347.html ###50s***
}

function getListKeys($text)
{
	$reg_exUrl = "/(?<=\#\#\#).*?(?=\!\!\!)/";
	if(preg_match_all($reg_exUrl, $text, $url)) {
		return $url[0];
	}
	return null;
	// test http://www.heise.de/download/mouse-recorder-pro-ec216441dbc757d56808a7b076f4de5f-1413478779-2669347.html ###50s***
}

function getIdMax($table,$fieldName)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$q="select ".$fieldName." from ".$table." order by ".$fieldName." desc limit 1";
	$result=mysqli_query($con,"select ".$fieldName." from ".$table." order by ".$fieldName." desc limit 1");
	if($result->num_rows>0)
	{
		$row = mysqli_fetch_array($result);
		return $row[$fieldName];
	}
	else
		return 0;
}
function getUIDS($table,$fieldName)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$q="select ".$fieldName." from ".$table." order by ".$fieldName." desc limit 1";
	$result=mysqli_query($con,"select ".$fieldName." from ".$table." order by ".$fieldName." desc");
	$arr= array();
	$i=0;
	while($row=mysqli_fetch_array($result))
	{
		$arr[$i]=$row[$fieldName];
		$i=$i+1;
	}
	return $arr;
}
function getInfoBacklink($id,$textlink)
{
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$currentDay = date("d/m/y");
	$result=mysqli_query($con,'select * from fs_click_backlink where id='.$id.' and timestart like "%'.$currentDay.'%" order by id desc');		
	$bl = array();
	//echo 'select * from fs_click_backlink where id='.$id.' and timestart like "%'.$currentDay.'%" order by id desc';
	if ($result->num_rows>0)
	{
			
			$row = mysqli_fetch_array($result);
			$bl['textlink']		=  $textlink;
			$bl['link']			=  $row[1];
			$bl['timestart'] 	=  $row[3];
			$bl['status'] 		=  $row[4];
			$bl['timeviewed'] 	=  $row[5];
			$bl['checkkey'] 	=  $row[10];
			//echo $bl['textlink'].$bl['timestart'].$bl['status'].$bl['timeviewed'] ;
	}
	mysqli_close($con);
	return $bl;
}
function displayBacklinkViewed($bl)
{
	
	if (strlen($bl['textlink'])>35)
	{
		$bl['textlink'] = substr($bl['textlink'], 0, 35);
		$pos = strrpos($bl['textlink'], " ");
		$bl['textlink'] = substr($bl['textlink'],0,$pos);
		$html= "<div><a href='".$bl['link']."' target='_blank'>".$bl['textlink']."</a>";			
		$html=$html."...";
	}
	else
		$html= "<div><a href='".$bl['link']."' target='_blank'>".$bl['textlink']."</a>";
	$strTime = substr($bl['timestart'], 0, 8);
	$t1 = strtotime($strTime);
	$date = date("H:i:s");
	$currentTime=time($date);
	$view = $currentTime-$t1;
	if($bl['status']=='In view')
	{
		
		$html= $html."<div style='text-align:right; display:inline-block;width:170px;position:absolute;right:34px;'>";
		$html= $html.": ".$strTime;
		if ($view>620)
			$html= $html." NO OK";
		else 
			$html= $html." <img title='Đang view' src='images/loading-google-smaill.gif' />";
			 
	} else
	{
			$html= $html."<div style='text-align:right; display:inline-block;width:150px;position:absolute;right:34px;'> View ".$bl['timeviewed']."s";
	}
	if ($bl['timeviewed']==0)
	{
		if ($view>620)
			$html= $html." +0đ ";
		else 
		{
			if($bl['checkkey']==1)
				$html= $html." +".$view."s "." <img title='Đang view' src='images/iconclickkeyok.gif'  /></div>";
			else
				$html= $html." +".$view."s "." <img title='Đang view' src='images/iconclickkeynook.gif'  /></div>";
		}
	}
	else
	{
		$minuteView = intval(intval($bl['timeviewed'])/60);
		if ($minuteView>2)
		{
			$pointadd= $minuteView > 10 ? 10 : $minuteView  ;
			$BACKLINK=$bl['checkkey']==1?10:2;
			$pointadd = $pointadd*$BACKLINK;
			$html= $html."       +".($pointadd)."đ";
			if($bl['checkkey']==1)
				$html= $html." <img title='View đúng keywords' src='images/iconclickkeyok.jpg' /></div>";
			else
				$html= $html." <img title='Click link nháy nháy trước khi click key' src='images/iconclickkeynook.jpg'  /></div>";

		}
		else
			$html= $html." +0đ";
	}	
	echo $html."</div>";
}
function removeTag($string)
{
	$string = preg_replace("/<a[^>]+\>/i", "", $string);
	$string = preg_replace("/<\/a\>/i", "", $string);
	return $string;
}
?>