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
//$type = $_POST['type'];
$type = 2;

if($type==2){
	
//	$href = $_POST["aHref"];
	$href = "http://m.yingshidaquan.cc/html/DQ21775.html";
	
	$arr1 =array();

	// echo $href;
	class mycrawler extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();

	        $objContent = $page->sel("//li[@class='yy']");
	        for ($i = 0; $i < count($objContent); ++$i) {
	        	$objA = $objContent[$i]->find("a");
				for ($j = 0; $j < count($objA); ++$j) {
	        		
	        		$a = 'http://m.yingshidaquan.cc'.$objA[$j]->href;

	        		$arr1[] =$a; 
	        	}
				
	        } 

	        for($i = 0;$i<count($arr1);$i++){
	        	$arr1[$i];
	        }
			// echo show(1,1,$arr1);

	        return  $a=1;
	    }
	    
	
	};
	
	class mycrawlers extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();

	        $objContent = $page->sel("//li[@class='yy']");
	        for ($i = 0; $i < count($objContent); ++$i) {
	        	$objA = $objContent[$i]->find("a");
				for ($j = 0; $j < count($objA); ++$j) {
	        		
	        		$a = 'http://m.yingshidaquan.cc'.$objA[$j]->href;

	        		$arr1[] =$a; 
	        	}
				
	        } 

	        for($i = 0;$i<count($arr1);$i++){
	        	$arr1[$i];
	        }
			// echo show(1,1,$arr1);

	        return  $a=1;
	    }
	    
	
	};
	
	$crawler = new mycrawler();
	$arrJobs = array(
	    'wxj' => array( 
	        'start_page' => $href,
	        'link_rules' => array(
	        	'#html\/\d+/\d+\.htm$#',
	        ),
	        'max_depth' => 1, 
	    ) ,   
	);
	
	
	$crawlers = new mycrawlers();
	$arrJobss = array(
	    'wxj' => array( 
	        'start_page' => $crawler->setFetchJobs($arrJobs)->run(),
	        'link_rules' => array(
	        	'#html\/\d+/\d+\.htm$#',
	        ),
	        'max_depth' => 1, 
	    ) ,   
	);
    $crawlers->setFetchJobs($arrJobss)->run();
//	$a=
//	print_r($a);
//	$crawler1->setFetchJobs($arrJobs)->run();
	
	
	

	
}