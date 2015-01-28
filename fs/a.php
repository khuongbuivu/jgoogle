<?php
$data = array();
$replacdata = array();
$data[0]="/function.php/";$replacdata[0]="jalsjldskjfkl.php";
// $data[0]="";$replacdata[0]="";
// $data[0]="";$replacdata[0]="";

$handle = fopen("activep.php", "r");
$myfile = fopen("activep1.php", "w") or die("Unable to open file!");
if ($handle) {
	while (($line = fgets($handle)) !== false) {		
		$line = preg_replace($data, $replacdata, $line);	
		fwrite($myfile, $line);
	}
	fclose($handle);
} else {
	echo "keke";
} 
fclose($handle);
fclose($myfile);
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