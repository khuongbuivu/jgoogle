<?php
	include_once("../config.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$idUser = $_POST['idUser'];
	$con=mysqli_connect($host,$user,$pass,$db);
	$result=mysqli_query($con,"select url from awt_list_url where iduser=".$idUser );
	?>
	<pre><b>Danh sách link</b></pre>
	<?php
	echo '<ul id="UFIList-Cmt" class="UFIList-Cmt">';
	while ($link = mysqli_fetch_array($result))
	{
		echo "<li>".addLinkUrl($link['url']);
		$titleStastic='Thống kê Click';
		$classtitlePopup='titlepopup';
		$url[0] = $link['url'];
		{ ?>   ^..^  <span ><a href="#" onclick="TINY.box.show({url:'statist_click.php?link=<?php echo $url[0]; ?>',width:400,height:500},'<?php echo $titleStastic; ?>','<?php echo $classtitlePopup ; ?>'); refreshIntervalId = setInterval(startTime('statist_click.php','<?php echo $url[0]; ?>'), 5000); return false;" >ViewClicked </a> <?php echo getNumView($url[0]) ; ?></span> :: 
		<a onclick="dellink('<?php echo $idUser; ?>','<?php  echo $url[0]; ?>');">Xóa</a>
		<?php } 
		echo "</li>";
	}
	echo '</ul>';
	echo "<div id='closelink' class='closelink' >X</div>";
	?>
	<script>
	$( "#closelink" ).click(function() {
		$("#linkneedview").hide();
	});
	</script>
	<?php
	function getNumView($url)
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$query = "Select id from   atw_click_link where link like '%".$url."%'";
		$result = mysqli_query($con,$query);
		if ($result->num_rows>0)
			return $result->num_rows;	
		else
			return 0;
	}
	?>
