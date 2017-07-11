<?php
$demo_include_path = dirname(__FILE__) . '/../';
set_include_path(get_include_path() . PATH_SEPARATOR . $demo_include_path);
require_once('phpfetcher.php');

function show($status,$message,$data=array(),$details=array(),$introduction=array()){
	$reuslt = array(
		'status'=>$status,
		'message'=>$message,
		'data'=>$data,
		'details'=>$details,
		'introduction'=>$introduction,
		);
	return json_encode($reuslt);
}
$type = 2;

if($type==2){
	
	$href = "http://m.yingshidaquan.cc/html/DQ236800.html";
	$arr1 =array();

	class mycrawler extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();
	       	$arr3 =array();
	       	$arr4 =array();
	       	$arr5 =array();
	       	$arr6 =array();

	        $objContent = $page->sel("//li[@class='yy']");
	        for ($i = 0; $i < count($objContent); ++$i) {
	        	$objA = $objContent[$i]->find("a");
				for ($j = 0; $j < count($objA); ++$j) {
	        		$a = 'http://m.yingshidaquan.cc'.$objA[$j]->href;
	        		$arr1 = array("a"=>$a); 
	        	}
					$arr2[]=$arr1;
	        } 
	        
	        $objContenb = $page->sel("//div[@id='sec_info']");
	        for ($i = 0; $i < count($objContenb); ++$i) {
	        	$objB = $objContenb[$i]->find("li");
				for ($j = 0; $j < count($objB); ++$j) {
	        		$b = $objB[$j]->plaintext;
	        		$arr3[] = array("details"=>$b); 
	        	}
					$arr4=$arr3;
	        } 
	        
	        $objContenc = $page->sel("//div[@class='tabCon']");
	        for ($i = 0; $i < count($objContenc); ++$i) {
	        	$objC = $objContenc[$i]->find("p[@id='movie_info_intro_s']");
				for ($j = 0; $j < count($objC); ++$j) {
	        		$c = $objC[$j]->plaintext;
	        		$arr5[] = array("introduction"=>$c); 
	        	}
					$arr6=$arr5;
	        } 
	        
			echo show(1,1,$arr2,$arr4,$arr6);

	    }
	};
	
	$crawler = new mycrawler();
	$arrJobss = array(
	    'wxj' => array( 
	        'start_page' => $href,
	        'link_rules' => array(
	        	'#html\/\d+/\d+\.htm$#',
	        ),
	        'max_depth' => 1, 
	    ) ,   
	);
	
	$crawler->setFetchJobs($arrJobss)->run();


}