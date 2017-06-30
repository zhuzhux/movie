<?php 
/**
* 
*/
class a 
{
	function a1()
	{
		return $a=23;
	}
}
class b 
{
	
	function b1($a)
	{
		return $a;
	}
}

$a=new a();
$s=$a->a1();
$b=new b();
$n=$b->b1($s);
//echo $n;
echo $s;
?>