<?php
	//获取内容页面的高清视频连接
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
class mycrawler extends Phpfetcher_Crawler_Default {
    public function handlePage($page) {
      	$arr1 =array();
       	$arr2 =array();
    	$objContent = $page->sel("//div[@class='mod_a globalPadding']");

        for ($i = 0; $i < count($objContent); ++$i) {
    		$objA = $objContent[$i]->find("a");
    		
    		for($z = 0;$z < count($objA); ++$z){
    			
    			$objPic = $objA[$z]->find("img");
//  			for($j = 0;$j < count($objPic); ++$j){
//  				echo $objPic[j]->getAttribute('data-original');
//  			}
//echo $objContent1->plaintext;
    			$arr1 = $z.':'.count($objPic).":";
    		}
    		
//          $objPic = $objContent[$i]->find("img");
//          for ($j = 0; $j < count($objPic); ++$j) {
//          	$arr1 = array(
//              	$objPic[$j]->getAttribute('src'),
//              	$objPic[$j]->getAttribute('alt'),
//              	$objContent[$i]->plaintext
//              );
//
////              echo $objContent[$i]->outertext() . "\n";
//          }
            $arr2[]=$arr1;
        }
    	echo show(1,1,$arr2);
    	
    	
//     	$arr1 =array();
//     	$arr2 =array();
//      $objContent = $page->sel("//a[@target='_self']");
//      for ($i = 0; $i < count($objContent); ++$i) {
//          $objPic = $objContent[$i]->find("img");
//          $objSpan = $objContent[$i]->find("span");//获取a标签下的span         
//          for ($j = 0; $j < count($objPic); ++$j) {
//
//              $arr1 = array(
//	                	'imgSrc'=>$objPic[$j]->getAttribute('data-original'),
//	                	'alt'=>$objPic[$j]->getAttribute('alt'),
//	                	'href'=>"http://m.yingshidaquan.cc".$objContent[$i]->href,
////	                	'ren'=>$objContent[$i]->plaintext,
//	                	'tip'=>$objSpan[0]->plaintext,
//	                	'filmName'=>$objSpan[1]->plaintext,
//	                	'actor'=>$objSpan[2]->plaintext,
//              );
//              
//              $arr2[]=$arr1;
//          }
//
//      } 
//		echo show(1,1,$arr2);
    }

};

$crawler = new mycrawler();
$arrJobs = array(
    'wxj' => array( 
        'start_page' => 'http://m.yingshidaquan.cc',
        'link_rules' => array(
//      	'#html\/\d+/\d+\.htm$#',
        ),
        'max_depth' => 1, 
    ) ,   
);

$crawler->setFetchJobs($arrJobs)->run();

//echo "Done!\n";
