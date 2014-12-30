<?php
session_start();
// must tag to fix error
	require_once('dom.php');
	require_once('../../definelocal.php');
	require_once('../../system/function.php');
	require_once('config.php');
	$posttext=$_POST['posttext'];
	$content=$_POST['text'];
	$srcid=$_POST['srcid'];
	$cohinh=$_POST['cohinh'];
	$iduser=$_POST['iduser'];
	$textcomment=$_POST['textcomment'];
	$textcomment1=$textcomment;
	if (!isset($_SESSION['token'], $_SESSION['token-user'],$_POST['tokenPost']) || checkToken($_POST['tokenPost'])==false)
	{
		exit();
	}
	if(isContentSex($posttext) || isContentSex($content) || isContentSex($textcomment))
        exit();
	$con=mysqli_connect($host,$user,$pass,$db);	
	$resultTime=mysqli_query($con,"select post_id,post_time from atw_post where post_iduser='".$iduser."' order by post_id desc limit 1" );
    $timeSavedPost="";
    if($resultTime->num_rows>0){
        $rowTime=mysqli_fetch_array($resultTime);
        $timeSavedPost=strtotime($rowTime['post_time']);
    }    
    $datetime = date("H:i:s d/m/y");
    $timeCurrent = strtotime($datetime);
    if (!checkTimePost($timeCurrent,$timeSavedPost))
	{
		echo "-1";
		exit();
	}
	$textcomment=addLinkUrl($textcomment);
	$content=str_replace('\"', '"', $content);
	$title="";
	$description="";
	$keyword="";
	$link = "";
	$linkhinh="";
	$title = $_POST['title'];
	$description = $_POST['description'];
	$keyword = $_POST['keyword'];
	$link = $_POST['link'];
	$linkhinh = $_POST['linkhinh'];
	/*
	if(trim($content)!="")
	{
		$html=str_get_html($content);
		foreach($html->find('#tieudebv h3.title') as $k){
		  $title=$k->text();
		  break;
		}

		foreach($html->find('#tieudebv #desid') as $k){
		  $description=$k->text();
		  break;
		}

		foreach($html->find('#tieudebv #keyid') as $k){
		  $keyword=$k->text();
		  break;
		}

		foreach($html->find('#tieudebv #linkpost') as $k){
		  $link=$k->value;
		  break;
		}

		if($srcid!=""&&$cohinh){
			$idhinh='#idhinh'.$srcid;
			foreach($html->find('#hotmusic .item img') as $k){
			  $linkhinh=$k->src;
			  break;
			}
		}
	}
	*/
	if($textcomment!="")
	{
		$link11=getListUrl($textcomment1);
	}
	if (count($link11)>0)
		$alllink=$link11[0];
	for ($jjj=1;$jjj<count($link11);$jjj++)
	{
		$alllink =$alllink."····".$link11[$jjj];
	}
	if ($link=="")
	{
		$link=$link11[0];
	}
	if (count($link11)>3)
	{
		echo "3333";
		exit();
	}
	if (count($link11)>0 )
	{		
			foreach($link11 as $url) {
			$result=mysqli_query($con,"select url from awt_list_url where idUser='".$iduser."' and url='".$url."'");
			if(!($result->num_rows>0))
			{
				mysqli_query($con,"INSERT INTO awt_list_url (url,iduser) VALUES ('".$url."','".$iduser."')");	
			}
		}
	}
	if($linkhinh!="")
		$imgOfUrl='<img src="'.$linkhinh.'" style="max-width:200px" />';
	else 
		$imgOfUrl='';
	
	$cnn = mysql_connect($host,$user,$pass) or die ("can not connect");
	mysql_select_db($db,$cnn);
	mysql_query("SET NAMES 'utf8'"); 
	//$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
	//if($link!=''&&$title!=''&&$description!=''&&$keyword!=''){
	if(trim($content)!="" && $link!=''&&$title!=''&&$description!=''&&$keyword!='')
	{
		$query='INSERT INTO atw_info_url(id_url, info_url, title_url, des_url, key_url, img_url, pulished_url) VALUES ("", "'.$link.'", "'.$title.'", "'.$description.'", "'.$keyword.'", "'.$linkhinh.'", "1");';
		mysql_query($query);
	}
	if($iduser!="")
	$query_post="INSERT INTO atw_post (post_iduser, post_content, post_image, post_url, post_full_url, post_title, post_description, post_time) VALUES ( ".$iduser.", '".$textcomment."', '".$imgOfUrl."', '".$link."' , '".$alllink."', '".$title."', '".$description."', '".$datetime."' )";	
	mysql_query($query_post);
	//}
	mysql_close($cnn);
?>
