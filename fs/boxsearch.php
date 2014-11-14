<?php
//fix
	include('config_tag.php');
	if($_POST)
	{
	$q=$_POST['searchword'];
	//$q="Linh";
	//echo $q;
	$q=str_replace("@","",$q);
	//$q=str_replace(" ","%",$q);
	$sql_res=mysqli_query($bd,"select * from user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5");
	//echo $q;
	//echo "xx".$sql_res->num_rows." ";
	echo "select * from user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5";
	while($row=mysqli_fetch_array($sql_res))
	{
		$fname=$row['fname'];
		$lname=$row['lname'];
		$img=$row['img'];
		$country=$row['country'];
		?>
		<div class="addname">
		<img src="user_img/<?php echo $img; ?>" class="image" />
		<a title='<?php echo $fname; ?>&nbsp;<?php echo $lname; ?>' id="nametag">
		<?php echo $fname; ?> <?php echo $lname; ?> </a>
		</div>
		<?php
		}
	}
?>