<?php
include('config.php');
if($_POST)
{
$q=$_POST['searchword'];
$q=str_replace("@","",$q);
	//$q=str_replace(" ","%",$q);
// $sql_res=mysql_query("select * from user_data where fname like '%$q%' or lname like '%$q%' order by uid LIMIT 5");
$sql_res=mysql_query("select * from atw_user where user_name like '%$q%' order by  user_id LIMIT 5");
echo "select * from atw_user where user_name like '%$q%' order by uid LIMIT 5";
while($row=mysql_fetch_array($sql_res))
{
$user_name=$row['user_name'];
$img=$row['img'];
$user_location=$row['user_location'];
$user_work_employer=$row['user_work_employer'];
?>
<div class="display_box" >
	<?php if (trim($user_work_employer)!=""){ ?>
	<img src="user_img/<?php echo $img; ?>" class="image" />
	<?php }; ?>
	<a href="#" class='addname' title='<?php echo $user_name; ?>'>
	<?php echo $user_name; 
	if (trim($user_work_employer)!="")
		echo $user_work_employer;
	else
		echo $user_location;
	?>
	</a>
</div>
<?php
}
}
?>