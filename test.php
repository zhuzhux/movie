<?php  
    //连接数据库服务器  
    //此处加@是为了不显示错误信息  
    $conn=@mysql_connect("localhost","root","123456");
    if($conn){
    	echo '成功';
    }
    else{
     	echo ("数据库服务器连接错误".mysql_error());   
    }
    //选择要访问的数据库  
    mysql_select_db("k9dai",$conn) or die("数据库访问错误".mysql_error());  
     //设置数据库操作编码格式  
    mysql_query("set names utf8");    


	mysql_select_db("k9dai",$conn); //打开数据库


         $sql="select * from k9dai_user"; 
         $query=mysql_query($sql); 
         $rs = mysql_fetch_array($query); 
            
         echo $rs[1];
?> 