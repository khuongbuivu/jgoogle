<?php
if (!defined('LOCAL')) 
define("LOCAL", "TRUE", true);
// define("LOCAL", "FALSE", true);
require_once('system/function.php');
	if(LOCAL!="TRUE")
	{
		require 'fbapi/facebook.php';
		$facebook = new Facebook(array(
		  'appId'  => '731864150162369',
		  'secret' => 'd9b93ffc459fb45be9a235bcc05d19b3',
		));
		$accountFace = $facebook->getUser();
		if ($accountFace) {
		  try {
			$user_profile = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
			$accountFace = null;
		  }
		}
		if ($accountFace) {
		  $logoutUrl = $facebook->getLogoutUrl();
		} else {
		  $loginUrl = $facebook->getLoginUrl(array(
			'scope' => 'email,user_birthday'
		  ));
		}
	}

     
	if(LOCAL!="TRUE"){
               
		$id=89;
		$id_comment=1;	
		$id_user=$user_profile['id'];//"100001707050719"; //"$int" convert int to string  $user_profile['id']
		$userFace=$user_profile['name'];//"Linh Nguyen";  // $user_profile['name']
		$user_profile['user_ip']=getUserIP();
		$linkLogoFace="https://graph.facebook.com/$id_user/picture";
		$PATH_ROOT="http://faceseo.vn/";
		$numCmtDisplay = 10;
		$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
		
		if($_SESSION['email']==''){ 
			$emaillogin=$_POST['email'];
		}else{
			$emaillogin=$_SESSION['email'];
		}            
        $emaillogin = preg_replace('/~|`|!|#|%|\^|&|\*|\(|\)|\+|=|\}|\{|\[|\]|:|;|\'|"|<|>|,|\?|\/|\|/', '',$emaillogin);
        if($emaillogin!=''){    
			$host="localhost";
			$user="faceseo";
			$pass="8wiWq637ceD@";
			$db="faceseo";
            $con=mysqli_connect($host,$user,$pass,$db);
			mysqli_set_charset($con, "utf8");
			$result=mysqli_query($con,"select * from atw_user where user_email='".$emaillogin."' limit 0,1" );
            while( ($row = mysqli_fetch_array($result)) ){
                $_SESSION['email']=$emaillogin;
				$accountFace=true;
                 $id=89;
				$id_comment=1;	
				$id_user=$row['user_id'];//"100001707050719"; //"$int" convert int to string  $user_profile['id']
				$userFace=$row['user_name'];//"Linh Nguyen";  // $user_profile['name']
						$user_profile['name']=$row['user_name'];
						$user_profile['id']=$row['user_id'];
				$linkLogoFace="https://graph.facebook.com/$id_user/picture";
				$PATH_ROOT="http://faceseo.vn/";
				$numCmtDisplay = 10;
				$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
              }
		}      

 
	}
	else
	{
		$id=89;
		$id_comment=1;
		$id_user="100001707050712";//"100001707050719"; //"$int" convert int to string  $user_profile['id']
		$userFace="Linh Nguyen";//"Linh Nguyen";  // $user_profile['name']
		// $id_user="100005640848020";//"100001707050719"; //"$int" convert int to string  $user_profile['id']
		// $userFace="Tran Lai";//"Linh Nguyen";  // $user_profile['name']
		$linkLogoFace="https://graph.facebook.com/$id_user/picture";
		$PATH_ROOT="http://localhost/faceseo.vn/";
		$numCmtDisplay = 10;	
		$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
	}
	// define some array using in game
	$arrPostDisplay = array();
	$i_arrPostDisplay = 0;
?>