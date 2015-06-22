<?php 
if(!isset($_SESSION)){
    session_start();
};
	require_once("config.php");	
	$idUserA = -1;
	$idUserB = -1;
	$pointHelp = 0;
	$Minutes = 60;
	function addPoint()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		global $idUserA;
		global $pointHelp;
		global $Minutes;
		
		$linkClicked	=	$_POST['linkClicked'];
		$linkClicked 	= 	removeSlashEndUrl($linkClicked);
		$idUser			=	$_POST['idUser'];
		$idUserA		=	$idUser;
		$point			=	$_POST['point'];
		$token			=	$_POST['token'];
		$TIMEMINVIEW		= 5;
		$TIMEMAXVIEW		= 10;
		$BONUSMOBILE		= 1;
		if (isset($_POST['typebrowser']) && $_POST['typebrowser'] == "mobile")
		{
			$BONUSMOBILE = 20;
			$TIMEMINVIEW = 2;
			$TIMEMAXVIEW = 15;
		}
		$okap			= true;
		$dm = date("d/m"); 	
		$s1= date("s");
		$shortDay= str_replace("/","",$dm);
		$User1=intval($_SESSION['session-user']) * intval($shortDay);
		$con=mysqli_connect($host,$user,$pass,$db);
		if ($idUser=="100001790943200" || $idUser=="100001655675884" || $idUser=="100002442662639")
		{			
			mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT: DONT ADD POINT SOME UID' where user_id=".$_SESSION['session-user']);
			exit();
		};
		// check xem du thoi gian ko
		$checkTime = mysqli_query($con," select timestart from atw_click_link where timeview = 0 and idUser=".$idUser." and link like '%".$linkClicked."%'");
		
		$view=0;
		if ($checkTime->num_rows)
		{
			$row = mysqli_fetch_array($checkTime);
			$strTime = substr($row[0], 0, 8);
			$t1 = strtotime($strTime);
			$date = date("H:i:s");
			$currentTime=time($date);
			$view = $currentTime-$t1;
			if($view<620 && $point>620)
			{
				$okap=false;
			}
			else if ($view>620 && $point>620)
			{
				exit();
			}
		}
		$checkTime1 = mysqli_query($con," select timeview from atw_click_link where timeclose ='In view' and timeview != 0 and idUser=".$idUser." and link like '%".$linkClicked."%' order by id desc limit 1");
		$timemore=0;
		if ($checkTime1->num_rows)
		{
			$row = mysqli_fetch_array($checkTime1);
			$timemore= $point - (int)($row['timeview']/$Minutes);
		}
				
		$ctime = mysqli_query($con," select timeview, timeclose from atw_click_link where timeview > 0 and idUser=".$idUser." order by id desc limit 2,1");
		if(($ctime->num_rows>0) && ($okap==true))
		{
			$rts = mysqli_fetch_array($ctime);
			$timeSaved= substr($rts['timeclose'],0,8);
			$oldday=substr($rts['timeclose'],9);
			$currentTime=date("H:i:s");
			$t2 = strtotime($currentTime);
			$t1 = strtotime($timeSaved);
			$t= $t2 - $t1;
			$dayTime=date("d/m/y");
			$str = $dayTime." ".$oldday."  ".$currentTime."  ".$timeSaved. " ". $t." ".$t2." ".$t1." select timeview, timeclose from atw_click_link where timeview > 0 and idUser=".$idUser." order by id desc";
			if ( ($t>5 && $oldday==$dayTime) || $oldday!=$dayTime)
			{
				$okap = true;
			}
			else
			{
				$okap = false;
				//exit();
				//mysqli_query($con,"UPDATE atw_user set user_status = 'ADD_POINT:".$str."' where user_id=".$_SESSION['session-user']);
			}	
		};			
		
	
		$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");
		$result1=mysqli_query($con,"select * from awt_list_url where iduser='".$idUser."' and url='".$linkClicked."'");
		while ($row = mysqli_fetch_array($result))
		{
			if(!($result1->num_rows>0))
			{
				
				$minuteView = (int)(intval($point)) ; 
				if($minuteView < $TIMEMINVIEW)
				{
					$point = $row['point'];
					$pointHelp =0;
				}
				else
				{
					if($timemore==0)
					{
						$minuteView = $minuteView > $TIMEMAXVIEW? $TIMEMAXVIEW : $minuteView;
						$minuteView = $minuteView*$BONUSMOBILE;
						$point = $minuteView + $row['point'];
						$pointHelp = $minuteView;
					}
					else
					{
						
						$minuteView = $timemore > ($TIMEMAXVIEW-$TIMEMINVIEW)? ($TIMEMAXVIEW-$TIMEMINVIEW) : $timemore;
						$minuteView = $minuteView*$BONUSMOBILE;
						$point = $minuteView + $row['point'];
						$pointHelp = $minuteView;
						
					}
				}
			}
			else
			{
				$point = $row['point'];
			}
		};
		if ($okap==false)
		{
			$point = $point-100;
		}
		if ($result->num_rows>0)
			$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser); 
		else
			$result=mysqli_query($con,"insert into atw_point (idUser,point) values (".$idUser.",".$point.")");
		echo $point;
		
		mysqli_close($con);	
		
	};
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
		$TIMEMINVIEW		= 5;
		$TIMEMAXVIEW		= 10;
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select iduser from awt_list_url where url like '%".$linkClicked."%' limit 1" );
		if($result->num_rows>0)
		{
			$row = mysqli_fetch_array($result)		;
			$idUserOfUrl = $row[0];
		};
		if ($idUser	!=$idUserOfUrl)
		{
			$idUser	=$idUserOfUrl;
			$idUserB = $idUserOfUrl;
			$result=mysqli_query($con,"select * from atw_point where idUser=".$idUser." limit 1");	
			if ($result->num_rows>0)
			{
				$row = mysqli_fetch_array($result);
				$minuteView = (int)(intval($point))  ; 
				if($minuteView < $TIMEMINVIEW)
				{
					$point = $row['point'];
					$pointHelp =0;
				}
				else
				{
					$minuteView = $minuteView > $TIMEMAXVIEW ? $TIMEMAXVIEW : $minuteView;
					$point = -$minuteView + $row['point'];
				};
				$result=mysqli_query($con,"UPDATE atw_point set point = ".$point." where idUser=".$idUser);	
			}
		};	
		updateHelpClickTable($idUserA,$idUserB,$pointHelp);		
		mysqli_close($con);
	};
	function removeSlashEndUrl($url)
	{
		return rtrim($url, "/");
	}
	addPoint();
	subPoint();
	
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
		};
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
		};
		$AB[1] = $pointB;
		mysqli_close($con);		
		return $AB;
	};
	
	function updateHelpClickTable($A,$B,$X)
	{
		if ($A==$B || $A==-1 || $B==-1)
			return;
		$PAB=GetPointHelp($A,$B);
		$P1 = $PAB[0];
		$P2 = $PAB[1];
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		if(($P1>0 && $P2==0) || $P1==$P2)
		{
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
				$X=$X-$P2;
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$X." where idUser =$A and idUserHelp=$B");
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= 0 where idUser =$B and idUserHelp=$A");				
			}
			else 
			{
				$P2 = $P2-$X;
				mysqli_query($con,"UPDATE fs_help_click set pointHelp= ".$P2." where idUser =$B and idUserHelp=$A");
			}
		};
		mysqli_close($con);
	};

?>