<?php
	//这个返回的是播放页面的地址，还不是真实地址
$url = 'http://dqplayers.duapp.com/bshare/m3u8.php?v=zaWq1nBnYWqTmd1noJSnmqtnaWFqY5ignmWnoK6jyF.XamiZa3BraqNsmW99ZX9pa3pscWxqaGNlfHxyeW2adJOeadtudoubanmaemp9ZzkZDOpKqanZHK09bFmM9mmqWiYtTbk9Cax6lgZmJpmG.YmpA%2C';  //这儿填页面地址
$info=file_get_contents($url);

var_dump ($info);
$result = array();
//id="ckplayer_a1" width="100%" height="200" preload="metadata"></video>
if(preg_match_all( '/<video([\w\W]*)<\/video>/iU', $info, $result) )
{
      print_r($result);
    for( $i = 0; $i<count($result[1]); $i++)    {
        var_dump( $result[1][$i] );
        echo '<hr>';
        echo $result[1][$i];
    }  
}
?>