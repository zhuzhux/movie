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
	        $objContent = $page->sel("//div[@class='mod_a globalPadding']");
	        
	        for($i = 0; $i < count($objContent); $i++){
		        $objTitle = $objContent[$i]->find("//div[@class='th_a']")[0];
		       	$objUl = $objContent[$i]->find("//ul[@class='picTxt picTxtA clearfix']")[0];
				$arr2=[];
				for($j = 0;$j<count($objUl->find('li'));$j++){
//						echo $objUl->find('li')[$j]->find('a')[0]->href.'<br>';
//						echo $objUl->find('li')[$j]->find('a')[0]->find('img')[0]->getAttribute('data-original').'<br>';
//						echo $objUl->find('li')[$j]->find('a')[0]->find('img')[0]->alt.'<br>';
//						echo $objUl->find('li')[$j]->find('a')[0]->find('span')[0]->plaintext.'<br>';
//						echo $objUl->find('li')[$j]->find('a')[0]->find('span')[1]->plaintext.'<br>';
//						echo $objUl->find('li')[$j]->find('a')[0]->find('span')[2]->plaintext.'<br>';
					$arr1 = array(
	                	'imgSrc'=>$objUl->find('li')[$j]->find('a')[0]->find('img')[0]->getAttribute('data-original'),
	                	'alt'=>$objUl->find('li')[$j]->find('a')[0]->find('img')[0]->alt,
	                	'href'=>"http://m.yingshidaquan.cc".$objUl->find('li')[$j]->find('a')[0]->href,
	                	'tip'=>$objUl->find('li')[$j]->find('a')[0]->find('span')[0]->plaintext,
	                	'filmName'=>$objUl->find('li')[$j]->find('a')[0]->find('span')[1]->plaintext,
	                	'actor'=>$objUl->find('li')[$j]->find('a')[0]->find('span')[2]->plaintext,
	                );
	                $arr2[]=$arr1;
				}
			$arr3[]=array(
	            'title'=>$objTitle->plaintext,
	            'data'=>$arr2
	        );
	        }
	        
	        echo show(1,1,$arr3);	
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
//}
