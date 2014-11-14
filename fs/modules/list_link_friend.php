<?php
	include_once("../config.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	/*
	// $idUser = $_POST['idUser'];
	$idUser = '100001707050712';
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select url from awt_list_url where iduser=".$idUser );
	
	?>
	<pre><b>   Danh sách link của những người đã view cho bạn</b></pre>
	<?php
	echo '<ul id="UFIList-Cmt" class="UFIList-Cmt">';
	while ($row = mysqli_fetch_array($result))
	{
		//echo "select link, url from atw_click_link,awt_list_url where awt_list_url.iduser=atw_click_link.idUser  and link like '%".$row['url']."%' and idUser != ".$idUser." limit 10";
		$con=mysqli_connect($host,$user,$pass,$db);
		$links=mysqli_query($con,"select link, url from atw_click_link,awt_list_url where awt_list_url.iduser=atw_click_link.idUser  and link ='".$row['url']."' and atw_click_link.idUser != ".$idUser." limit 10"  );
		
		//echo count($links);
		
			while ($link = mysqli_fetch_array($links))
			{
				//$linkwithfunction  = addLinkUrl($link['link']);
				echo "<li>".addLinkUrl($link['url']);
				$titleStastic='Thống kê Click';
				$classtitlePopup='titlepopup';
				$url[0] = $link['url'];
				{ ?>   ^..^  <span ><a href="#" onclick="TINY.box.show({url:'statist_click.php?link=<?php echo $url[0]; ?>',width:400,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo $url[0]; ?>'), 5000); return false;" >ViewClicked</a></span>
				<?php } 
				echo "</li>";
			}
			mysqli_close($con);	
	}
	echo '</ul>';
	echo "<div id='closelink' class='closelink' >X</div>";
	?>
	<script>
	$( "#closelink" ).click(function() {
		$("#linkneedview").hide();
	});
	</script>
	*/	
	
	$idUser = '100001707050712';
	//$con=mysql_connect($host,$user,$pass,$db);
	//$result=mysql_query($con"select url from awt_list_url where iduser=".$idUser );
	
	$link = mysql_connect($host,$user,$pass,$db) or die ("can not connect");
	mysql_select_db($db,$link);
	mysql_query("SET NAMES 'utf8'"); 
	$result=mysql_query("select id from awt_list_url where iduser=".$idUser." order by id desc limit 2" );
	//echo "select url from awt_list_url where iduser=".$idUser." limit 2";	
	while ($row = mysql_fetch_array($result))
	{
		//echo $row['url'];		
		//$con=mysqli_connect($host,$user,$pass,$db);
		$q="select link, url from atw_click_link,awt_list_url where atw_click_link.idUser != ".$idUser." and awt_list_url.iduser=atw_click_link.idUser  and click_link_idlink =".$row['id']." limit 0,3" ;		
		echo $q."<br/>";
		$links=mysql_query($q);		
		while ($link = mysql_fetch_array($links))
		{
			echo $link[1]."<br/>";
		}
		//mysqli_close($con);	
		
	}
