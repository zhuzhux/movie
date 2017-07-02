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
$type = 3;

if($type==3){

	$href = "http://m.yingshidaquan.cc/play/DQ237676-2-1.html";

	
	$arr1 =array();

	class mycrawler extends Phpfetcher_Crawler_Default {
	    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();
			$objContent = $page->sel("//div[@id='_player']");		
			echo $objContent->plaintext;
/*	        $objContent = $page->sel("//div[@id='play']");
	        
	        for ($i = 0; $i < count($objContent); ++$i) {
	        	$objScrit = $objContent[$i]->find("script");

//				print_r( $objScrit[0]);
				
				for ($j = 0; $j < count($objScrit); ++$j) {
	        		echo $objScrit[$j]->plaintext;

//	        		$a = 'http://m.yingshidaquan.cc'.$objA[$j]->href;
//	        		$arr1 = array("a"=>$a); 
	        	}
//					$arr2[]=$arr1;
	        } 
//			echo show(1,1,$arr2);
*/
	    }
	};

	$crawler = new mycrawler();
	$arrJobss = array(
	    'wxj' => array( 
	        'start_page' => $href,
	        'link_rules' => array(
//	        	'#html\/\d+/\d+\.htm$#',
//				'/<script([\w\W]*)<\/script>/iU',
	        ),
	        'max_depth' => 1, 
	    ) ,   
	);
	
	$crawler->setFetchJobs($arrJobss)->run();


}