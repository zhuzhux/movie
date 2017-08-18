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
//$type = $_GET['type'];

//if($type==1){
class mycrawler extends Phpfetcher_Crawler_Default {
    public function handlePage($page) {
	       	$arr1 =array();
	       	$arr2 =array();
	       	$arr3 =array();
	        $objWrap = $page->sel("//div[@class='search-results']");
	        
	        for($i = 0; $i < count($objWrap); $i++){
		        $objCont = $objWrap[$i]->find("//div[@class='cell']");
				$arr2=[];
				for($j = 0;$j<count($objCont);$j++){
					$objTit = $objCont[$j]->find("//h1[@class='tit']")[0];
					$objSetBtn = $objCont[$j]->find("//div[@class='sets-btn']")[0];
					echo $objTit->plaintext;
					$objBtn = $objSetBtn->find("//a[@class='btn']");
					for($k = 0;$k<count($objBtn);$k++){
						echo "http://kan.sogou.com".$objBtn[$k]->href."<br>";
					}
					echo count($objBtn);
//	                $arr2[]=$arr1;
				}
//			$arr3[]=array(
//	            'title'=>$objTitle->plaintext,
//	            'data'=>$arr2
//	        );
	        }
	        
//	        echo show(1,1,$arr3);	
	}
};

$crawler = new mycrawler();
$arrJobs = array(
    'wxj' => array( 
        'start_page' => 'http://kan.sogou.com/search?keyword=楚乔传',
        'link_rules' => array(
//      	'#html\/\d+/\d+\.htm$#',
        ),
        'max_depth' => 1, 
    ) ,   
);
$crawler->setFetchJobs($arrJobs)->run();
//}
