<?php
if(isset($_GET['find']))
{
   $cv=$_GET['find'];
   $nw=urlencode($cv);
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_URL,"http://www.baidu.com/s?wd=".$cv."&pn=0");
   curl_setopt($ch,CURLOPT_HEADER,0);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   $output=curl_exec($ch);
   curl_close($ch);
   echo $output;
}
?>