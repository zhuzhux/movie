<?php
$url = 'http://m.yingshidaquan.cc/';  //这儿填页面地址
$info=file_get_contents($url);
//$rule = '|<div class=\"con\">(.*)<\/div>|is';
//preg_match('|<title>(.*?)<\/title>|i',$info,$m);
//preg_match($rule,$info,$m);
//preg_match_all('|<section class=\"main\">(.*?)<\/section>|is',$info,$m);
	
preg_match_all('|<div class=\"mod_a globalPadding\">(.*)<\/div>|is',$info,$m);
//var_dump($m);
//echo $m[1][0];


//for(i=0;i<7;i++){
//	
//}

//preg_match_all('|<div class=\"th_a\">(.*)<\/div>|is',$info,$m);
	
//var_dump($m);
//preg_match_all('|<div class=\"th_a\">(.*)<\/div>|is',$info,$m);
echo $m[0][0];

?>
