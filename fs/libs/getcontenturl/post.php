<?php
if(!isset($_SESSION)){
    session_start();
}
// must tag to fix error
	$IDUSER = $_SESSION['session-user'];
	require_once('dom.php');
	require_once('../../definelocal.php');
	require_once('../../system/function.php');
	require_once('config.php');
	$posttext=$_POST['posttext'];
	$content=$_POST['text'];
	$srcid=$_POST['srcid'];
	$cohinh=$_POST['cohinh'];
	$iduser=$_POST['iduser'];
	$idgroup=$_POST['idgroup'];
	$textcomment=$_POST['textcomment'];
	$textcomment1=$textcomment;
	if (!isset($_SESSION['token'], $_SESSION['token-user'],$_POST['tokenPost']) || checkToken($_POST['tokenPost'])==false)
	{
		exit();
	}
	if(isContentSex($posttext) || isContentSex($content) || isContentSex($textcomment))
        exit();
	$con=mysqli_connect($host,$user,$pass,$db);	
	$resultTime=mysqli_query($con,"select post_id,post_time,post_group from atw_post where post_iduser='".$iduser."' order by post_id desc limit 1" );
    $timeSavedPost="";
    if($resultTime->num_rows>0){
        $rowTime=mysqli_fetch_array($resultTime);
        $timeSavedPost=strtotime($rowTime['post_time']);
    }    
    $datetime = date("H:i:s m/d/y");
    $timeCurrent = strtotime($datetime);
    if (!checkTimePost($timeCurrent,$timeSavedPost) && $rowTime['post_group']==$idgroup && $IDUSER != "100006661151706")
	{
		echo "-1";
		exit();
	}
	$idMaxPost = getIdMax("atw_post", "post_id");
	$idMaxPost = $idMaxPost + 1;
	$ltv=getListTimesView($textcomment);
	$textcomment=addLinkUrl($textcomment,$ltv,$idMaxPost);
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
	if(trim($content)!="" && $link!=''&&$title!=''&&$description!=''&&$keyword!='')
	{
		$query='INSERT INTO atw_info_url(id_url, info_url, title_url, des_url, key_url, img_url, pulished_url) VALUES ("", "'.$link.'", "'.$title.'", "'.$description.'", "'.$keyword.'", "'.$linkhinh.'", "1");';
		mysql_query($query);
	}
	
	if(count($ltv)<=0)
		$query_post="INSERT INTO atw_post (post_id, post_iduser, post_content, post_image, post_url, post_full_url, post_title, post_description, post_time,post_group) VALUES (".$idMaxPost.", ".$iduser.", '".$textcomment."', '".$imgOfUrl."', '".$link."' , '".$alllink."', '".$title."', '".$description."', '".$datetime."',".$idgroup." )";	
	else
		$query_post="INSERT INTO atw_post (post_id, post_iduser, post_content, post_image, post_url, post_full_url, post_title, post_description, post_time,post_group,post_mintimeviewlink) VALUES (".$idMaxPost.", ".$iduser.", '".$textcomment."', '".$imgOfUrl."', '".$link."' , '".$alllink."', '".$title."', '".$description."', '".$datetime."',".$idgroup.",".$ltv[0]." )";	
	mysql_query($query_post);
	mysql_close($cnn);
?>
