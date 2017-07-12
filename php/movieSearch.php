<?php
	//获取首页的图片，文字，连接等
$demo_include_path = dirname(__FILE__) . '/../';
set_include_path(get_include_path() . PATH_SEPARATOR . $demo_include_path);
require_once('phpfetcher.php');

function show($status,$message,$data=array()){
	$reuslt = array(
		'status'=>$status,
		'message'=>$message,
		'data'=>$data,
		);
	return json_encode($reuslt);
}
$type = $_POST['type'];
$wd = $_POST['wd'];
if($type==1){
	class mycrawler extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();
	        $objContent = $page->sel("//ul[@id='data_list']");
	        $objLi = $objContent[0]->find("li");
	        $objPic = $objContent[0]->find("img");

	        for($i = 0; $i < count($objContent); ++$i){
	        	for ($j = 0; $j < count($objPic); ++$j) {
	        		$objSpan = $objLi[$j]->find("span");
	        		$objA = $objLi[$j]->find("a");
	                $arr1 = array(
		                	'imgSrc'=>$objPic[$j]->getAttribute('data-original'),
//		                	'alt'=>$objPic[$j]->getAttribute('alt'),
		                	'href'=>"http://m.yingshidaquan.cc".$objA[$i]->href,
//		                	'ren'=>$objContent[$i]->plaintext,
//		                	'tip'=>$objSpan[0]->plaintext,
		                	'filmName'=>$objSpan[1]->plaintext,
		                	'actor'=>$objSpan[3]->plaintext,
	                );
	                
	                $arr2[]=$arr1;
	           }
	        }
			echo show(1,1,$arr2);
	    }
	
	};
	
	$crawler = new mycrawler();
	$arrJobs = array(
	    'wxj' => array( 
	        'start_page' => 'http://m.yingshidaquan.cc/vod-search-wd-'.$wd.'-p.html',
	        'link_rules' => array(
	        	'#html\/\d+/\d+\.htm$#',
	        ),
	        'max_depth' => 1, 
	    ) ,   
	);
	
	$crawler->setFetchJobs($arrJobs)->run();
}

if($type ==2){
	
	echo 1;
	
}