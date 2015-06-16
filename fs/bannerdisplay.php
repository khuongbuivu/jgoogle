<?php
if(!isset($_SESSION)){
    session_start();
}
include("config.php");
include_once("user.php");
include_once("system/function.php");
global $host;
global $user;
global $pass;
global $db;

$arr_displayed=array();
$count = 0;
// $arr = array_fill(0, $count, 0);
// $arr = [7,4,9,3,8,10,11,50,100,150];
$arr_limit = array_fill(0, $count, 0);
if(!isset($_SESSION['arr_point_banner']))
{
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select * from  fs_banner, atw_point where banner_user_id = idUser  order by point desc limit 0,100");	 //idBannerStart		
	$i=0;			
	while ($row = mysqli_fetch_array($result))
	{			
		$infosUser=getUserInfo($row['banner_user_id']);
		$arr[$i]= $infosUser['user_point'];		
		$arr_infoBanner[$i]['user_name'] = $infosUser['user_name'];
		$arr_infoBanner[$i]['point'] = $infosUser['user_point'];
		$arr_infoBanner[$i]['banner_id'] = $row['banner_id'];
		$arr_infoBanner[$i]['banner_link'] = $row['banner_link'];
		$arr_infoBanner[$i]['banner_img'] = $row['banner_img'];
		$arr_infoBanner[$i]['post_url'] = $row['post_url'];		
		$arr_infoBanner[$i]['user_manager'] = $infoUser['user_manager'];				
		$i++;
	}
	$count = $i;
	$_SESSION['arr_point_banner'] = $arr;
	$_SESSION['arr_infoBanner'] = $arr_infoBanner;	
	mysqli_close($con);
}
$arr = 	$_SESSION['arr_point_banner'];
function disPlayBanner()
{
	global $arr_displayed;
	$HTML="";
	for ($i=0;$i<count($arr_displayed);$i++)
	{
		$HTML = $HTML.'<div style="position:relative;" id="dbanner'.$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_id'].'">';
		
		if (strpos($_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_img'], DOMAIN."/images")==true)
		{
			if (checkAvailableLinks($_SESSION['arr_infoBanner'][$arr_displayed[$i]]['post_url'],$_SESSION['session-user']))
				$HTML = $HTML."<a id='banner".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_id']."' href='".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_link']."' title='".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['user_name']." :: ".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['point']." điểm' onclick='return openUrlBanner(this.href,".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_id'].");'><img style='width:100%' src='".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_img']."' /></a><br/>";
			else
				$HTML = $HTML."<img style='width:100%' src='".$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_img']."' /><br/>";
		}
		if ($row['banner_user_id']==$idUser || $infoUser['user_manager']>2)
			$HTML = $HTML.'<div class="delBannerById" onclick="return delBannerById('.$_SESSION['arr_infoBanner'][$arr_displayed[$i]]['banner_id'].');">D</div>';
		$HTML = $HTML."</div>";	
	}
	echo $HTML;
}
function print_aray($arr)
{
    $count = count($arr);
    for($i = 0; $i < $count; $i++)
    {
        echo $arr[$i].' ';
    }
}

function resetDisplay($n)
{
	global $arr_displayed;
	$count =  count($arr_displayed);
	$arr_displayed=array_fill(0, $n, 0);
}
function checkInArray($item,$arr)
{
	if (in_array($item, $arr))
		return true;
	return false;
}
function saveBannerDisplayedLast()
{
	global $arr_displayed;
	$_SESSION['arr_banner_displayed']=$arr_displayed;

}
function checkArrayInvalid($arr_displayed)
{

	for($i=0;$i<count($arr_displayed);$i++)
	{	
		
		for($j=$i+1;$j<count($arr_displayed);$j++)
		{
			
			if ($arr_displayed[$j]==$arr_displayed[$i])
				return false;
		}
	}	
	return true;
}
function Show($arr, $arr_limit)
{
    global $arr_displayed;
	$need_stop = false;
    $counter = 0;
    $count = count($arr);
    $ndisplay = count($arr);
    $min_value = min($arr);
	
    $total_value = array_sum($arr_limit);
    $i=0;
    while(!$need_stop)
    {
        $index_a = rand(0, $count - 1);
        $index_b = rand(0, $count - 1);

        $a = $arr[$index_a];
        $a_show = $_SESSION["arr_count_banner"][$index_a];
        $max_show = floor($a / $min_value);
        if(($a_show < $max_show && !checkInArray($a,$arr_displayed)) || $i>$count*2)
        {
            //ok show a
            $_SESSION["arr_count_banner"][$index_a] = $a_show + 1;
            $_SESSION["arr_show"][$index_a] = $_SESSION["arr_show"][$index_a] + 1;		
			$index=array_search(0, $arr_displayed);		
			$arr_displayed[$index]=$index_a;
            if(array_sum($_SESSION["arr_count_banner"]) == $total_value)
            {
                $_SESSION["arr_count_banner"] = array_fill(0, $count, 0);
            }			
            $need_stop = true;
        }
		$i++;
    }
}
function initBanner()
{
	global $arr_count_banner;
	global $count;
	global $arr;
	global $arr_limit;
	if(!isset($_SESSION['arr_count_banner']))
	{
		$arr_count_banner = array_fill(0, $count, 0);
		$_SESSION["arr_count_banner"] = $arr_count_banner;
		$_SESSION["arr_show"] = $arr_count_banner;
	}
	$min_value = min($arr);
	for($i = 0; $i < $count; $i++)
	{
		$arr_limit[$i] = floor($arr[$i] / $min_value);
	}
}
initBanner();

//show array
// echo "Array a: ";
// print_aray($arr);
// echo "<br>";
resetDisplay(5);
Show($arr, $arr_limit);
Show($arr, $arr_limit);
Show($arr, $arr_limit);
Show($arr, $arr_limit);
Show($arr, $arr_limit);
if (checkArrayInvalid($arr_displayed))
{
	saveBannerDisplayedLast();
}
else 
{
	$arr_displayed = $_SESSION['arr_banner_displayed'];
}

// print_r($arr_displayed);


//show array
// echo "<br>";
// echo "Array show counter: ";
// print_aray($_SESSION["arr_show"]);

?>