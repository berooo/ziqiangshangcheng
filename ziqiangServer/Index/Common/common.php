<?php
	function vget($url){
		$info=curl_init();
		curl_setopt($info,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($info,CURLOPT_HEADER,0);
		curl_setopt($info,CURLOPT_NOBODY,0);
		curl_setopt($info,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($info,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($info,CURLOPT_URL,$url);
		$output=curl_exec($info);
		curl_close($info);
		return $output;
	}
	function get_total_millisecond(){
		$time=microtime(true);
		return round($time * 1000);
	}
	function trimall($str)
 {
    $qian=array("&quot;");
    $hou=array("\"");
    return str_replace($qian,$hou,$str);    
 }
?>