<?php
$url="http://www.google.com/dhasjkdas/sadsdds/sdda/sdads.html";
function getDomainName($url)
{
	$host = parse_url( $url, PHP_URL_HOST );
	$parts = explode( '.', $host );
	$parts = array_reverse( $parts );
	$domain = $parts[1].'.'.$parts[0];
	return $domain;
}


?>