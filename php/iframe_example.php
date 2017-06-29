<?php
$demo_include_path = dirname(__FILE__) . '/../';
set_include_path(get_include_path() . PATH_SEPARATOR . $demo_include_path);

require_once('phpfetcher.php');
/*class mycrawler extends Phpfetcher_Crawler_Default {
    public function handlePage($page) {
        echo "+++ enter page: [" . $page->getUrl() . "] +++\n";

        //选取所有包含src属性的iframe元素
        $arrIframes = $page->sel('//iframe[@src]'); 
        for ($i = 0; $i < count($arrIframes); ++$i) {
            $strSrc = $arrIframes[$i]->src;
            echo "found iframe url=[" . $strSrc . "]\n<br><br>";
            $this->addAdditionalUrls($strSrc);
        }
        echo "--- leave page: [" . $page->getUrl() . "] ---\n<br><br><br><br>";
    }

};

$crawler = new mycrawler();
$arrJobs = array(
    'wxj' => array( 
        'start_page' => 'http://news.163.com',
        'link_rules' => array(),
        'max_depth' => 2, 
    ) ,   
);*/


function show($status,$message,$data=array()){
	// $reuslt = array(
	// 	'status' => $status,
	// 	'message' => $message,
	// 	'data' => $data,
	// );
	// exit(json_encode($reuslt));
	$reuslt = array(
		'status'=>$status,
		'message'=>$message,
		'data'=>$data,
		);
	echo json_encode($reuslt)."<br><br>";
}
class mycrawler extends Phpfetcher_Crawler_Default {
    public function handlePage($page) {
       	/*echo "+++ enter page: [" . $page->getUrl() . "] +++\n";

        //选取所有包含src属性的iframe元素
        $arrIframes = $page->sel('//a[@target="_self"]'); 
        for ($i = 0; $i < count($arrIframes); ++$i) {
            $strSrc = $arrIframes[$i]->href;
            echo "found iframe url=[" . $strSrc . "]\n<br><br>";
            $this->addAdditionalUrls($strSrc);
        }
        echo "--- leave page: [" . $page->getUrl() . "] ---\n<br><br><br><br>";*/
       	
       	
       	$sj=array();
       	$arr1 =array();
       	$arr2 =array();
        $objContent = $page->sel("//a[@target='_self']");
        for ($i = 0; $i < count($objContent); ++$i) {
            $objPic = $objContent[$i]->find("img");
            $objSpan = $objContent[$i]->find("span");
            
            
            for ($j = 0; $j < count($objPic); ++$j) {
            	
//              echo $objPic[$j]->getAttribute('data-original') . "\n<br>";
//              echo $objPic[$j]->getAttribute('alt') . "\n<br>";
//              echo $objContent[$i]->plaintext . "\n<br>";
//              echo $objContent[$i]->outertext() . "\n<br>";
                
                $arr1 = array(
	                	'imgSrc'=>$objPic[$j]->getAttribute('data-original'),
	                	'alt'=>$objPic[$j]->getAttribute('alt'),
	                	'href'=>"http://m.yingshidaquan.cc".$objContent[$i]->href,
//	                	'ren'=>$objContent[$i]->plaintext,
	                	'tip'=>$objSpan[0]->plaintext,
	                	'filmName'=>$objSpan[1]->plaintext,
	                	'actor'=>$objSpan[2]->plaintext,
                );
                
                $arr2[]=$arr1;
            }

        } 
			show(1,1,$arr2);
    }

};

$crawler = new mycrawler();
$arrJobs = array(
    'wxj' => array( 
        'start_page' => 'http://m.yingshidaquan.cc',
        'link_rules' => array(
        	'#html\/\d+/\d+\.htm$#',
        ),
        'max_depth' => 1, 
    ) ,   
);

$crawler->setFetchJobs($arrJobs)->run();

//echo "Done!\n";
