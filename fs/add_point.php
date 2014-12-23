<?php 
if(!isset($_SESSION)){
    session_start();
}
	require_once("config.php");	
	$idUserA = -1;
	$idUserB = -1;
	$pointHelp = 0;
	function addPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		global $idUserA;
		global $pointHelp;
		
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$idUserA		=	$idUser;
		$point			=	$_POST['point'];
		$token			=	$_POST['token'];
		$okap			= false;
		$dm = date("d/m"); 	
		$s1= date("s");
		$shortDay= str_replace("/","",$dm);
		$User1=intval($_SESSION['session-user']) * intval($shortDay);
		//if ($okap==true)
		{
			$con=mysqli_connect($host,$user,$pass,$db);
			if ($idUser=="100001790943200" || $idUser=="100001655675884" || $idUser=="100002442662639")
			{			
				mysqli_query($con,"UPDATE atw_user set user_status = 11 where user_id=".$_SESSION['session-user']);
				exit();
			}
			
			
			
			$ctime = mysqli_query($con," select timeview, timeclose from atw_click_link where timeview > 0 and idUser=".$idUser." order by id desc");
			{
				if($ctime->num_rows>0)
				{
					$rts = mysqli_fetch_array($ctime);
					$timeSaved= substr($rts['timeclose'],0,8);
					$currentTime=date("H:i:s");
					$t2 = strtotime($currentTime);
					$t1 = strtotime($timeSaved);
					$t= $t2 - $t1;
					if ( $t < 2000 and $t >-1)
					{
						$okap = true;
					}
					else
					{
						$okap = false;
						mysqli_query($con,"UPDATE atw_user set user_status = 8 where user_id=".$_SESSION['session-user']);
					}	
				}
                    else
			        {
				            mysqli_query($con,"UPDATE atw_user set user_status = 6 where user_id=".$_SESSION['session-user']);
							exit();
			        }
			
			}
			
			if ($okap==true)
			{
				$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
				$result1=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'");
				while ($row = mysqli_fetch_array($result))
				{
					if(!($result1->num_rows>0))
					{
						
						$minuteView = (int)(intval($point)) ; 
						if($minuteView < 5)
						{
							$point = 0 + $row['point'];
							$pointHelp =0;
						}
						else
						{
							$minuteView = $minuteView > 10? 10 : $minuteView;
							$point = $minuteView + $row['point'];
							$pointHelp = $minuteView;
						}
					}
					else
					{
						$point = $row['point'];
					}
				}	
				if ($result->num_rows>0)
					$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
				else
					$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
				echo $point;
			}
			mysqli_close($con);	
		}
	}
	function subPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		global $idUserA;
		global $idUserB;
		global $pointHelp;
		
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$point			=	$_POST['point'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$linkClicked."%' limit 1" );
		if($result->num_rows>0)
		{
			$row = mysqli_fetch_array($result)		;
			$idUserOfUrl = $row[0];
		}		
		if ($idUser	!=$idUserOfUrl)
		{
			$idUser	=$idUserOfUrl;
			$idUserB = $idUserOfUrl;
			$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser);			
			while ($row = mysqli_fetch_array($result))
			{		
					$minuteView = (int)(intval($point))  ; 
					$point=$minuteView > 4 ? $minuteView : 0 ;
					$point = -$point + $row['point'];
			}	
			if ($result->num_rows>0)
				$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
			else
				$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		}
		
		updateHelpClickTable($idUserA,$idUserB,$pointHelp);		
		mysqli_close($con);
		
		
	}
	function removeSlashEndUrl($url)
	{
		return rtrim($url, "/");
	}
	addPoint();
	subPoint();
	/*
	process user have multi link we must call while to check all user in list link
	*/
	
	function GetPointHelp($A,$B)
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$resultAB=mysqli_query($con,"select pointHelp from fs_help_click where idUser =".$A." and idUserHelp=".$B);
		if($resultAB->num_rows>0)
		{
			$row = mysqli_fetch_array($resultAB)		;
			$pointA = $row[0];
		}
		else
		{
			$pointA=0;
			mysqli_query($con,"insert into  fs_help_click (idUser,idUserHelp,pointHelp) values (".$A.",".$B.",0)");
		}
		$AB[0]= $pointA;
		$resultBA=mysqli_query($con,"select pointHelp from fs_help_click where idUser =".$B." and idUserHelp=".$A." limit  1");
		if($resultBA->num_rows>0)
		{
			$row = mysqli_fetch_array($resultBA)		;
			$pointB = $row[0];
		}
		else
		{
			$pointB=0;
			mysqli_query($con,"insert into  fs_help_click (idUser,idUserHelp,pointHelp) values (".$B.",".$A.",0)");
		}
		$AB[1] = $pointB;
		mysqli_close($con);
		
		return $AB;
	}
	// lâu lâu del hết các record 0 điểm để dọn rác và chỉ sinh ra các record trong trường hợp cần thiết nhất.
	function updateHelpClickTable($A,$B,$X)
	{
		if ($A==$B || $A==-1 || $B==-1)
			return;
		$PAB=GetPointHelp($A,$B);
		$P1 = $PAB[0];
		$P2 = $PAB[1];
		// cần lấy thông tin của $X
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		if(($P1>0 && $P2==0) || $P1==$P2)
		{
			//Update A B point + thêm
			
			$rids = mysqli_query($con,"select id,pointHelp from fs_help_click where idUser =$A and idUserHelp=$B limit 1");	
			$pointA=0;
			if($rids->num_rows>0)
			{
				$rid = mysqli_fetch_array($rids)		;
				$idA = $rid[0];
				$pointA = $rid[1];
			}	
			$X= $X + $pointA;			
			mysqli_query($con,"UPDATE fs_help_click set pointHelp=".$X." where id=$idA");	
		}
		else if ($P1>0 && $P2>0)
		{
			$P1=$X+$P1-$P2;
			if($P1>0)
			{
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$P1." where idUser =$A and idUserHelp=$B");
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= 0 where idUser =$B and idUserHelp=$A");
			}
			else
			{
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$P1." where idUser =$B and idUserHelp=$A");
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= 0 where idUser =$A and idUserHelp=$B");
			}
		}
		else
		{
			if ($X > $P2)
			{
				//Update A B set point  = (X-P2)
				//Update B A point  0
				$X=$X-$P2;
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$X." where idUser =$A and idUserHelp=$B");
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= 0 where idUser =$B and idUserHelp=$A");				
			}
			else 
			{
				//Update B A set point = ( P2-X )
				$P2 = $P2-$X;
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$P2." where idUser =$B and idUserHelp=$A");
			}
		}
		mysqli_close($con);
	}

?>