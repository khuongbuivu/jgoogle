<?php 
function getPage($url){
    if(!isset($timeout))
        $timeout=30;
    $curl = curl_init(); 
    curl_setopt ($curl, CURLOPT_URL, $url); 
    curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $html = curl_exec ($curl);
    curl_close ($curl);
    return $html;
}
function get_share_count( $url ) {
    $content=getPage($url);
	if (preg_match('%(?<=<span class="MM jI">)\d+?(?=</span>)%s', $content, $regs)) {
		return(int)$regs[0];
	} else {
		return 0;
    }
}
function get_plus_count( $url ) {
    $content=getPage($url);
	if (preg_match('%(?<=<span class="H3" jsname="NnAfwf">)\d+?(?=</span>)%s', $content, $regs)) {
		return(int)$regs[0];
    } else {
		return 0;
    }
}
function get_plusandshare( $url ) {
    $content=getPage($url);
	$count=0;	
	if (preg_match('%(?<=<span class="H3" jsname="NnAfwf">)\d+?(?=</span>)%s', $content, $regs)) 
		$count =(int)$regs[0];
	if (preg_match('%(?<=<span class="MM jI">)\d+?(?=</span>)%s', $content, $regs)) {
		$count = $count.",".(int)$regs[0];
    } else {
		$count = $count.",0";
    }
	return $count;
}
?>