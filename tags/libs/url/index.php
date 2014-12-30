<?php
//fix
	function checkUrlImage($url)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
		$temp = explode(".", $url);
		print_r($temp);
		$extension = end($temp);
		echo $extension;
		$extension = strtolower($extension);
		if(in_array($extension, $allowedExts))
			return true;
		return false;
	}


?>