<?php
	//Phai tag not error
	function re($string)
		{
		$str = str_replace('-', ' ', $string);
			$trans = array(
			"~"=>"","`"=>"","!"=>"","@"=>"","#"=>"","$"=>"","%"=>"","^"=>"",
			"&"=>"","*"=>"","("=>"",")"=>"","_"=>"",
			"-"=>"","+"=>"","="=>"","{"=>"","["=>"","]"=>"","}"=>"",":"=>"",";"=>"",'"'=>"","<"=>"",">"=>"","?"=>"","/"=>"","\\"=>"","|"=>"");
			$str = strtr($str, $trans);		
		return $str;
		}
	function postPage($url,$pvars,$referer,$timeout){
	   if(!isset($timeout))
		  $timeout=30;
		$curl = curl_init();
	 
		if(isset($referer)){
			curl_setopt ($curl, CURLOPT_REFERER, $referer);
		}
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout);
		curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
		curl_setopt ($curl, CURLOPT_HEADER, 0);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
	   // curl_setopt ($curl, CURLOPT_POST, 0);
	  //  curl_setopt ($curl, CURLOPT_POSTFIELDS, $pvars);
		curl_setopt ($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/x-www-form-urlencoded"));
		$html = curl_exec ($curl);
		curl_close ($curl);
		return $html;
	}


	function getlink($link){
	if($link=="")return 0;
	$content=postPage($link,'','','');
	if(strlen($content)>5000)return $link;
	else return 0;

	}
	$textcomment=$_POST['textcomment'];
	$textcomment=trim($textcomment);
	$textcomment=$textcomment.' ';
	preg_match_all('%(http|https|ftp|ftps|www)+(\:\/\/)*\S*%', $textcomment, $result, PREG_PATTERN_ORDER);

	/*for ($i = 0; $i < count($result[0]); $i++) {
		$link = trim($result[0][$i]);
		break;
	}
	*/
	// fix get wrong url
	if (count($result[0])>0)
		$link = trim($result[0][0]);

	if($link!=""){	
	$content=postPage($link,'','','');
	if(preg_match_all("|<[\s\v]*img[\s\v][^>]*>|Ui",$content,$matched)) {
	 for($i=0;$i<count($matched[0]);$i++){
	   $im=$matched[0][$i];
	  if (preg_match('/(?<=src=")[^^]*?(?=")/', $im, $l_i)) {
		$link_i = $l_i[0];
		$tra=getlink($link_i);
		if($tra!=""&&count($mang)<3)$mang[]=$link_i;
		if(count($mang)>3)break;
	   }
	  
	 
	 }

	}
	if(preg_match('%(?<=<title>)[^^]*?(?=</title>)%', $content, $td)){
		$tieude=re($td[0]);
		}
	preg_match_all('/<meta[^^]*?>/', $content, $result1, PREG_PATTERN_ORDER);
	for ($i = 0; $i < count($result1[0]); $i++) {
		$text=$result1[0][$i];
		if (preg_match('/og:image/', $text, $regs)) {
			if (preg_match('/(?<=content=")[^^]*?(?=")/', $text, $t1)) {
			 $kt_hinh = getlink($t1[0]);
			 if($kt_hinh!="")$hinh=$t1[0];
			 else $hinh='img_default.jpg';
			 }
		} 
		if (preg_match('/og:description/', $text, $regs)||preg_match('/name="description"/', $text, $t3)) {
			
		   if (preg_match('/(?<=content=")[^^]*?(?=")/', $text, $t3)) {  
			 $description = re($t3[0]);
			 }
		} 
		if(preg_match('/keywords/', $text, $t4)){
		
		   if (preg_match('/(?<=content=")[^^]*?(?=")/', $text, $t4)) {
			 $keywords = re($t4[0]);
			 }
		}
		
		if($hinh!=""&&$tieude!=""&&$description!=""&&$keywords!="")break;
	}

	?>

	<div style="border-top:1px dotted #ccc; text-align:justify;font-size:11px;" id="contentpost">
	  <p style="text-align:right">
		<label class="xbutton">
		  <input type="button" id="xoatieude" title="Xóa">
		</label>
	  </p>
	  <div id="textpost" style="display:none;"><?php echo $textcomment; ?></div>
	  <div class="boxfilm" style="float:left; width:120px;" id="hinhanh">
		<div class="slidefilm">
		  <div class="caroufredsel_wrapper">
			<ul id="hotmusic">
			  <?php if($hinh!=""){?>
			  <li>
				<div class="item"> <img width="100" height="100" alt="<?php echo $tieude;?>" src="<?php echo $hinh; ?>">
				<div id="imageoflink">
				<?php echo $hinh; ?>
				</div>
				</div>
			  </li>
			  <?php } ?>
			  <?php for($j=0;$j<count($mang);$j++){?>
			  <li>
				<div class="item"> <img id="idhinh<?php echo $j;?>" width="100" height="100" alt="<?php echo $tieude;?>" src="<?php echo $mang[$j] ?>"> </div>
			  </li>
			  <?php }?>
			</ul>		
			<div id="imageoflink" style="display:none">
				<?php 
					if (count($mang)>0) 
						echo $hinh;
				?>
			</div>
			<?php if(count($mang)>0)$so=0;else $so='';?>
			<input type="hidden" id="srcid" value="<?php echo $so;?>" name="srcid" />
		  </div>
		</div>
	  </div>
	  <div style="float:right; width:64%;" id="tieudebv">
		<h3 class="titlelink" > <?php echo $tieude; ?></h3>
		<div id="titlelink11" style="display:none" > <?php echo $tieude; ?></div>
		<span class="linktam"><?php echo substr($link,0,32).'...';?></span>
		<input type="hidden" id="linkpost" value="<?php echo $link; ?>" />
		<br />
		<div id="desid">
		  <?php
		 $t=explode(" ",$description);
							if(count($t)>=42)$dem=42;
							else $dem=count($t);
							for($i=0;$i<$dem;$i++){
							 if($i==$dem-1)echo $t[$i].'...';	
							 else echo $t[$i].' ';
							}
							
							 ?>
		</div>
		<div class="kd"><span style="color:#ccc">Keyword:</span><span id="keyid"> <?php echo $keywords;?></span>
		<div id="keylink" style="display:none"> <?php echo $keywords;?></div>
		</div>
		<div class="s_scroll"> <a class="sl_scroll hotmusic disabled" href="#" style="display: block;">&nbsp;</a> <a class="sr_scroll hotmusic" href="#" style="display: block;">&nbsp;</a> </div>
		<div class="checkimg">
		  <input type="checkbox" id="haveimg" name="haveimg" value="true">
		  <label for="haveimg">Không có Hình nhỏ</label>
		</div>
	  </div>
	</div>
<?php }?>
