<?php
//fix
	class SimpleImage {   var $image; var $image_type;   function load($filename) {   $image_info = getimagesize($filename); $this->image_type = $image_info[2]; if( $this->image_type == IMAGETYPE_JPEG ) {   $this->image = imagecreatefromjpeg($filename); } elseif( $this->image_type == IMAGETYPE_GIF ) {   $this->image = imagecreatefromgif($filename); } elseif( $this->image_type == IMAGETYPE_PNG ) {   $this->image = imagecreatefrompng($filename); } } function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {   if( $image_type == IMAGETYPE_JPEG ) { imagejpeg($this->image,$filename,$compression); } elseif( $image_type == IMAGETYPE_GIF ) {   imagegif($this->image,$filename); } elseif( $image_type == IMAGETYPE_PNG ) {   imagepng($this->image,$filename); } if( $permissions != null) {   chmod($filename,$permissions); } } function output($image_type=IMAGETYPE_JPEG) {   if( $image_type == IMAGETYPE_JPEG ) { imagejpeg($this->image); } elseif( $image_type == IMAGETYPE_GIF ) {   imagegif($this->image); } elseif( $image_type == IMAGETYPE_PNG ) {   imagepng($this->image); } } function getWidth() {   return imagesx($this->image); } function getHeight() {   return imagesy($this->image); } function resizeToHeight($height) {   $ratio = $height / $this->getHeight(); $width = $this->getWidth() * $ratio; $this->resize($width,$height); }   
		function resizeToWidth($width) {		
			$ratio = $width / $this->getWidth(); 
			$height = $this->getheight() * $ratio;
			$this->resize($width,$height);		 
		} 
		function resizeToMax($width,$height) {
			if (($width < $this->getWidth() || $this->getheight() > $height) && $height==-1 )
			{
			$ratio = $width / $this->getWidth(); 
			$height = $this->getheight() * $ratio;
			$this->resize($width,$height);
			}
			else if (($width < $this->getWidth() || $this->getheight() > $height) && $height>-1)
			{
				$this->resize($width,$height);
			}
			else 
				$this->resize($this->getWidth(),$this->getheight());		 
		}  	
		function scale($scale) { $width = $this->getWidth() * $scale/100; $height = $this->getheight() * $scale/100; $this->resize($width,$height); }   function resize($width,$height) { $new_image = imagecreatetruecolor($width, $height); imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight()); $this->image = $new_image; }   
	}
	function thumnail($srcPath,$thumbPath, $maxwidth,$maxHeight=-1)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
		$temp1 = explode("/", $srcPath);
		if(count($temp1)>0)
			$temp = explode(".", $temp1[count($temp1)-1]);
		else
			$temp = explode(".", $srcPath);
		$extension = end($temp);
		$extension = strtolower($extension);
		$thumbPath=$thumbPath.$temp[count($temp)-2].".".$temp[count($temp)-1];	
		if(in_array($extension, $allowedExts))
		{
			$image = new SimpleImage();
			$image->load($srcPath);
			$image->resizeToMax($maxwidth,$maxHeight);
			$image->save($thumbPath);
		}
	 
	}
	//thumnail("http://localhost/faceseo/libs/thumnail/nhathovungtauXua.jpg","output/",400,-1);
?>