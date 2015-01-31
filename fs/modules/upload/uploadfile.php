<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if(!isset($_SESSION)){
    session_start();
}
	require_once("../../definelocal.php");
	include_once("../../config.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	require_once("../../libs/thumnail/index.php");
	require_once("../../define.php");
	require_once("../../system/function.php");

	if (checkSecurityFile($_FILES,'Filedata'))
	{
		$tmp_file_name = $_FILES['Filedata']['tmp_name'];
		$img=$_FILES["Filedata"]["name"];
		$img=str_replace(' ','-',$img);
		$img=str_replace('%20','-',$img);
		$img=stringToAlias($img);
		$newPathImage=$img;
		$currentDay = date("m-y");
		$newPathImage=$currentDay."-".$_SESSION['userID']."-".$newPathImage;
		$newSubFolder= 'upload/'.$currentDay;
		$thumb= '../../images/modules/upload/banner/'.$currentDay;
		if(!is_dir($newSubFolder))
				mkdir($newSubFolder, 0777);
		if(!is_dir($thumb))
				mkdir($thumb, 0777);
		chmod($newSubFolder,0777);
		chmod($thumb,0777);
		// $ok = move_uploaded_file($tmp_file_name, "upload/".$_FILES["Filedata"]["name"]);
		//echo $tmp_file_name." ". $newSubFolder."/".$newPathImage;
		$ok = move_uploaded_file($tmp_file_name, $newSubFolder."/".$newPathImage);
		//echo $newSubFolder."/".$newPathImage."xxxxxx";
	
		if(LOCAL=="TRUE")
		{		
			thumnail($newSubFolder."/".$newPathImage,$thumb."/",300,150);
			echo $ok ? "http://localhost/faceseo.vn/images/modules/upload/banner/".$currentDay."/".$newPathImage : "FAIL";
		}else {
			thumnail($newSubFolder."/".$newPathImage,$thumb."/",300,150);
			echo $ok ? "http://faceseo.vn/images/modules/upload/banner/".$currentDay."/".$newPathImage : "FAIL";
		}
	
		chmod($newSubFolder,0755);
		chmod($thumb,0755);
		
	}
	function checkSecurityFile($a,$arg)
	{
		
		$MAX_FILENAME_LENGTH = 260;
		$valid_chars_regex = 'A-Za-z0-9_-\s ';
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$backlist = array('php', 'php3', 'php4', 'phtml','exe');
		$temp = explode(".", $a[$arg]["name"]);
		$extension = end($temp);
		if(!eregi('image/', $a[$arg]['type']))
		{
				echo "File Invalid";
				return false;
		}
		// Validate file name (for our purposes we'll just remove invalid characters)
		// $file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', '', strtolower(basename($a[$arg]['name'])));
		$file_name = strtolower(basename($a[$arg]['name']));
		if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH)
		{		
				echo "File Invalid";
				return false;
		}
		// Validate that we won't over-write an existing file
		if (file_exists($save_path . $file_name))
		{
				echo "File Invalid";
				return false;				
		}
		// Validate file extension
		if(in_array(end(explode('.', $file_name)), $backlist))
		{
				echo "File Invalid";
				return false;
		}
		if ((($a[$arg]["type"] == "image/gif")
		|| ($a[$arg]["type"] == "image/jpeg")
		|| ($a[$arg]["type"] == "image/jpg")
		|| ($a[$arg]["type"] == "image/pjpeg")
		|| ($a[$arg]["type"] == "image/x-png")
		|| ($a[$arg]["type"] == "image/png"))
		&& ($a[$arg]["size"] < 1000000)
		&& in_array($extension, $allowedExts) && ((strpos($a[$arg]["name"], "php")===false))&& ((strpos($a[$arg]["name"], "php")===false))&& ((strpos($a[$arg]["name"], "php4")===false))&& ((strpos($a[$arg]["name"], "phtml")===false))&& ((strpos($a[$arg]["name"], "exe")===false)))
		  {
		  if ($a[$arg]["error"] > 0)
			{
				return false;
			}
		  else
			{
				return true;
			}
		  }
		else
		  {
			echo "File Invalid";
			return false;
		  }
	}

?>

