<?php
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
$type = 2;

if($type==2){
	
	$href = "http://m.yingshidaquan.cc/html/DQ21775.html";
	$arr1 =array();

	class mycrawler extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();

	        $objContent = $page->sel("//li[@class='yy']");
	        for ($i = 0; $i < count($objContent); ++$i) {
	        	$objA = $objContent[$i]->find("a");
				for ($j = 0; $j < count($objA); ++$j) {
	        		$a = 'http://m.yingshidaquan.cc'.$objA[$j]->href;
	        		$arr1 = array("a"=>$a); 
	        	}
					$arr2[]=$arr1;
	        } 
			echo show(1,1,$arr2);

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