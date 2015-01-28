<?php
/*
$data = array();
$replacdata = array();
$data[0]="/function.php/";$datafiles[0]="function.php";$replacdata[0]="jalsjldskjfkl.php";
// $data[0]="";$replacdata[0]="";
// $data[0]="";$replacdata[0]="";

$handle = fopen($datafiles[0], "r");
$myfile = fopen($_SERVER['DOCUMENT_ROOT'] ."/obfucate/new/".$replacdata[0], "wb") or die("Unable to open file!");
if ($handle) {
	while (($line = fgets($handle)) !== false) {		
		$line = preg_replace($data, $replacdata, $line);	
		fwrite($myfile, $line);
	}
	fclose($handle);
} else {
	echo "keke";
}
fclose($myfile);
*/
$dir = $_SERVER['DOCUMENT_ROOT'] ."/faceseo.vn";
$dh  = opendir($dir);
$i=-1;
while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;
	if(substr($filename,-3)=="php")
	{
		echo '$data['.$i.']="'.$filename.'" ; '.'$datafiles['.$i.']="'.$filename."\" ;  <br/>";
		$i=$i+1;
	}
}
// sort($files);
// print_r($files);
//rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
/*
$string = 'The quick brown fox jumped over the lazy dog.';
$patterns = array();
$patterns[0] = '/quick/';
$patterns[1] = '/brown/';
$patterns[2] = '/fox/';
$replacements = array();
$replacements[0] = 'bear';
$replacements[1] = 'black';
$replacements[2] = 'slow';
echo preg_replace($patterns, $replacements, $string);
*/
?>