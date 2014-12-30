<?php
//fix
	require_once("../config.php");
	//fs_warning
	//warning_id,warning_iduser,warning_num,warning_type
	// warning_num: 1 
	//warning_type: 1  leavepage, 2 spam link
	function addWarningOutView()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser=$_POST['idUser'];
		$type=$_POST['type'];
		$warningNum=$_POST['warningNum'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result=mysqli_query($con,"select warning_id   from fs_warning where  warning_iduser=".$idUser." and warning_type =".$type);
		if ($result->num_rows>0)
		{		
			//echo "UPDATE fs_warning set warning_num = ".$warningNum." where warning_iduser='".$idUser."' and warning_type =".$type;
			mysqli_query($con,"UPDATE fs_warning set warning_num = ".$warningNum." where warning_iduser='".$idUser."' and warning_type =".$type);
		}
		else
		{
			//echo "INSERT INTO fs_warning (warning_iduser,warning_num,warning_type) VALUES ('".$idUser."',".$warningNum.",".$type.")";
			mysqli_query($con,"INSERT INTO fs_warning (warning_iduser,warning_num,warning_type) VALUES ('".$idUser."',".$warningNum.",".$type.")");
		}
		mysqli_close($con);
	}
	function getWarningNumber()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser=$_POST['idUser'];
		$type=$_POST['type'];
		$con=mysqli_connect($host,$user,$pass,$db);
		//echo "select warning_num   from fs_warning where  warning_iduser=".$idUser." and warning_type =".$type;
		$result=mysqli_query($con,"select warning_num   from fs_warning where  warning_iduser=".$idUser." and warning_type =".$type);
		if ($result->num_rows>0)
		{
			$vaule = mysqli_fetch_array($result);
			echo $vaule['warning_num'];
		}
		else
			echo 0;
		mysqli_close($con);
	}
?>