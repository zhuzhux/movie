<?php
	//这个返回的是播放页面的地址，还不是真实地址
//	'http://www.yingshidaquan.cc/play/DQ238234-2-1.html'
$url = 'http://m.yingshidaquan.cc/play/DQ237238-3-1.html';  //这儿填页面地址
$info=file_get_contents($url);
$result = array();
if(preg_match_all( '/<script language="javascript">var ff_urls=\'([\w\W]*)\'\;<\/script>/iU', $info, $result) )
{
    //print_r($result);
    for( $i = 0; $i<count($result[1]); $i++)    {
//      var_dump( $result[1][$i] );
//      echo '<hr>';
        echo $result[1][$i];
    }  
}
?>