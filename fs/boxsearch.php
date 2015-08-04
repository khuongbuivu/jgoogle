<?php
include('config_tag.php');
if(isset($_POST['searchword'])&&$_POST['searchword']!='')
{
$q=$_POST['searchword'];
$idPost=$_POST['idPost'];
$q=str_replace("@","",$q);
$sql_res=mysqli_query($bd,"select * from atw_user where user_name like '%$q%' order by  user_id LIMIT 5");
echo '<div class="boxtagdivscroll">';
while($row=mysqli_fetch_array($sql_res))
{
$user_name=$row['user_name'];
$img="https://graph.facebook.com/".$row['user_id']."/picture";
$user_location=$row['user_location'];
$user_work_employer=$row['user_work_employer'];
?>
<div class="display_box" data-UID="<?php echo $row['user_id'];?>">
	
	<img src="<?php echo $img; ?>" class="image" />
	<span href="#" id= 'addname<?php echo $idPost ?>' class='addname' title='<?php echo $user_name; ?>'>
	<?php 
	echo $user_name." - "; 
	if (trim($user_work_employer)!="")
		echo $user_work_employer;
	else
		echo $user_location;
	?>
	</span>
</div>
<?php
}
echo '</div>';
}
?>