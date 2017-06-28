<?php
$url = 'http://www.23us.com/html/58/58671/24102960.html';  //这儿填页面地址
$info=file_get_contents($url);
//$rule = '|<div class=\"con\">(.*)<\/div>|is';
//preg_match('|<title>(.*?)<\/title>|i',$info,$m);
//preg_match($rule,$info,$m);
//preg_match_all('|<section class=\"main\">(.*?)<\/section>|is',$info,$m);
	
preg_match_all('|<dd id=\"contents\">(.*?)<\/dd>|i',$info,$m);


function gbk_to_utf8($str){
    return mb_convert_encoding($str, 'utf-8', 'gbk');
}
$aa = $m[1][0];
//echo $m[0][0];
$aaa=gbk_to_utf8($aa);


$as = preg_replace('/<br\s?\/?>/i', '', $aaa);

//echo preg_replace('/&nbsp;&nbsp;&nbsp;&nbsp;/i', '<br />', $as);

$data = json_encode(array('data'=>$as));

$callback = $_GET['callback'];
echo $callback."($data)";




?>
