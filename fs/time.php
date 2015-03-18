<?php
// keke
// defined('_JEXEC') or die;
	include_once("config.php");
	function getTimeString($currentTime,$timeSave)
	{
		$t=$currentTime-$timeSave;
		if($t<60)
		{
			return "cách đây vài giây";
		}
		elseif($t>60 && $t < 3600)
		{
			return "cách đây " .(int)($t/60) ." phút";
		}
		elseif($t>3600 && $t < 86400)
		{
			return "cách đây ".(int)($t/3600) ." giờ";
		}
		elseif($t>86400 && $t < 86400*12)
		{
			$day=(int)($t/86400);
			if($day==1)
			{
				return "hôm qua";
			}
			else if ($day==2)
			{
				return "hôm kia";
			}
			else if ($day==2)
			{
				return "hôm kìa";
			}
			else if ($day>2 && $day<7)
			{
				return "cách đây ".$day ." ngày";
			}
			else
			{
				return date("h:i:s d-m-Y",$timeSave);
			}
		}
		
	}

?>