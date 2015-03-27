<?php
require_once("definelocal.php");
if (!defined('LOCAL')) 
define("LOCAL", "TRUE", true);
require_once('system/function.php');
	if(LOCAL!="TRUE")
	{
		require 'fbapi/facebook.php';
		$facebook = new Facebook(array(
		  'appId'  => '731864150162369',
		  'secret' => 'd9b93ffc459fb45be9a235bcc05d19b3',
		));
		$accountFace = $facebook->getUser();
		$user_profile = array();
		$user_profile['id']="";
		$user_profile['name']="";
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
		$PATH_ROOT="http://".DOMAIN."/";
		$numCmtDisplay = 10;
		$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
		
		if($_SESSION['email']==''){ 
			$emaillogin=$_POST['email'];
		}else{
			$emaillogin=$_SESSION['email'];
		}
		
		if($_SESSION['passfaceseo']==''){ 
			$passlogin=$_POST['passfaceseo'];
		}else{
			$passlogin=$_SESSION['passfaceseo'];
		}
		
        $emaillogin = preg_replace('/~|`|!|#|%|\^|&|\*|\(|\)|\+|=|\}|\{|\[|\]|:|;|\'|"|<|>|,|\?|\/|\|/', '',$emaillogin);
        if($emaillogin!=''){    
			$host="localhost";
			$user="root";
			$pass="rootfaceseo@#";
			$db="faceseovn";
			if($_SESSION['messlogin']=='')
			{
				$_SESSION['messlogin']='invalid';
			}
            $con=mysqli_connect($host,$user,$pass,$db);
			mysqli_set_charset($con, "utf8");
			$result=mysqli_query($con,"select * from atw_user where user_email='".$emaillogin."' and user_pass='".md5($passlogin)."' limit 0,1" );
           
			while( ($row = mysqli_fetch_array($result)) ){
                $_SESSION['email']=$emaillogin;
                 $_SESSION['passfaceseo']=$passlogin;
				$_SESSION['messlogin']=true;
				$accountFace=true;
                $id=89;
				$id_comment=1;	
				$id_user=$row['user_id'];//"100001707050719"; //"$int" convert int to string  $user_profile['id']
				$userFace=$row['user_name'];//"Linh Nguyen";  // $user_profile['name']
						$user_profile['name']=$row['user_name'];
						$user_profile['id']=$row['user_id'];
				$linkLogoFace="https://graph.facebook.com/$id_user/picture";
				$numCmtDisplay = 10;
				$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
            }
			if ($_SESSION['messlogin']!='ok')
			{				
				$result=mysqli_query($con,"select user_id from atw_user where user_email='".$emaillogin."' limit 0,1" );
				if ($result->num_rows>0)
				{
					$result1=mysqli_query($con,"select user_id from atw_user where user_email='".$emaillogin."' and user_pass!=user_tpass and user_tpass!='' limit 0,1" );
					if ($result1->num_rows>0)
						$_SESSION['messlogin']="Sai pass. <a href='https://mail.google.com/mail/?tab=wm'>Login Mail $emaillogin To Active Account  </a>";
					else
						$_SESSION['messlogin']="Sai pass. <a href='#' onclick='return changepass();'>Đổi pass mới</a>";
				}
				else
					$_SESSION['messlogin']="Vui lòng đăng nhập bằng FB";
			}
		}      

 
	}
	else
	{
		$id=89;
		$id_comment=1;
		// $id_user="100001707050712";//"100001707050719"; //"$int" convert int to string  $user_profile['id']
		// $userFace="Linh Nguyen";//"Linh Nguyen";  // $user_profile['name']
		$id_user="100005640848020";//"100001707050719"; //"$int" convert int to string  $user_profile['id']
		$userFace="Tran Lai";//"Linh Nguyen";  // $user_profile['name']
		$linkLogoFace="https://graph.facebook.com/$id_user/picture";
		$PATH_ROOT="http://localhost/".DOMAIN."/";
		$numCmtDisplay = 10;	
		$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
		if($_SESSION['email']==''){ 
			$emaillogin=$_POST['email'];
		}else{
			$emaillogin=$_SESSION['email'];
		}            
		if($_SESSION['passfaceseo']==''){ 
			$passlogin=$_POST['passfaceseo'];
		}else{
			$passlogin=$_SESSION['passfaceseo'];
		} 	
        $emaillogin = preg_replace('/~|`|!|#|%|\^|&|\*|\(|\)|\+|=|\}|\{|\[|\]|:|;|\'|"|<|>|,|\?|\/|\|/', '',$emaillogin);
        if($emaillogin!=''){    
			$host="localhost";
			$user="root";
			$pass="";
			$db="autoviewsite";
			if($_SESSION['messlogin']=='')
			{
				$_SESSION['messlogin']='invalid';
			}
            $con=mysqli_connect($host,$user,$pass,$db);
			mysqli_set_charset($con, "utf8");
			$result=mysqli_query($con,"select * from atw_user where user_email='".$emaillogin."' and user_pass='".md5($passlogin)."' limit 0,1" );
            while( ($row = mysqli_fetch_array($result)) ){
                $_SESSION['email']=$emaillogin;
                $_SESSION['passfaceseo']=$passlogin;
				$_SESSION['messlogin']='ok';
				$accountFace=$row['user_id'];
                 $id=89;
				$id_comment=1;	
				$id_user=$row['user_id'];//"100001707050719"; //"$int" convert int to string  $user_profile['id']
				$userFace=$row['user_name'];//"Linh Nguyen";  // $user_profile['name']
						$user_profile['name']=$row['user_name'];
						$user_profile['id']=$row['user_id'];
				$linkLogoFace="https://graph.facebook.com/$id_user/picture";
				$numCmtDisplay = 10;
				$FOLDERTHUMBANNER = $PATH_ROOT."images/modules/upload/banner/";	
            }			
			if ($_SESSION['messlogin']!='ok')
			{				
				$result=mysqli_query($con,"select user_id from atw_user where user_email='".$emaillogin."' limit 0,1" );
				if ($result->num_rows>0)
				{
					$result1=mysqli_query($con,"select user_id from atw_user where user_email='".$emaillogin."' and user_pass!=user_tpass and user_tpass!='' limit 0,1" );
					if ($result1->num_rows>0)
						$_SESSION['messlogin']="Sai pass. <a href='https://mail.google.com/mail/?tab=wm'>Login Mail $emaillogin To Active Account  </a>";
					else
						$_SESSION['messlogin']="Sai pass. <a href='#' onclick='return changepass();'>Đổi pass mới</a>";
				}
				else
					$_SESSION['messlogin']="Vui lòng đăng nhập bằng FB";
			}			
		} 
		
	}
	// define some array using in game
	$arrPostDisplay = array();
	$i_arrPostDisplay = 0;
?>