<?php
//真实地址
$url = $_POST['aHref'];  
$playname = $_POST['playname'];

if($playname=='acfun'||$playname=='yuku'){
	$html = file_get_contents($url);
	if(preg_match_all('/var video=\[\'([\w\W]*)\'\]\;/iU', $html, $result)){
	    for( $i = 0; $i<count($result[1]); $i++){
	     // var_dump( $result[1][$i] );
	     echo $result[1][$i];
	    }  
	}
}

if($playname==dusk360){
	$testurl = $url;  
	$ch = curl_init();    
	curl_setopt($ch, CURLOPT_URL, $testurl);    
	//参数为1表示传输数据，为0表示直接输出显示。  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	//参数为0表示不带头文件，为1表示带头文件  
	curl_setopt($ch, CURLOPT_HEADER,0);  
	$output = curl_exec($ch);   
	curl_close($ch);   
	//echo $output;  
	preg_match_all('/var video=\[\'([\w\W]*)\'\]\;/iU', $output, $result);
	for( $i = 0; $i<count($result[1]); $i++){
	 // var_dump( $result[1][$i] );
	 echo $result[1][$i];
	}
}
?>