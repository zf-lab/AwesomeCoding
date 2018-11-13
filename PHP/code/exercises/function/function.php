

<?php

	function table1($name){
		echo "<table border = 1 width='800' align='center' >";
		echo "<caption><h1>$name</h1></caption>";

		for ($i=0; $i < 10; $i++) { 
			if ($i %2 == 0) {
				$bg='ffffff';
			}else
				$bg= 'cccccc';
			echo "<tr bgColor=".$bg.'>';
			for ($j=0; $j < 10; $j++) { 
				echo "<td>".($i *10 + $j).'<td>';
			}
			echo "</tr>";

		}
		echo "</table>";
	}

	echo "<h1>函数练习</h1>";

	echo "<br>1.函数使用---------------<br>";

	table1('函数练习表');

	echo "<br> 2.global 使用 ------------------<br>";
	$a = 100;
	echo "$a<br>";
	function plus10(){
		global $a;
		$a += 10;
	}

  plus10();

  echo $a."<br>";

  function min10($a){
  	 $a -= 10;
  }

  min10($a);
  echo $a;

  	echo "<br>3.多参数 缺省----------------<br>";
	function demo1($a=1, $b=20, $c=10){
   		echo "### $a ### $b ##### $c ########<br>";

   		return 'ok';
   	}	

   	echo demo1(8,20);

   	echo "<br> 4.感觉有点可以 函数式编程的感觉呢 ----------<br>";

   	function fun1($a,$b){
   		// echo __METHOD__;
   		return $a+$b;
   	}

   	function fun2($a,$b){
   		// echo __METHOD__;
   		return $a-$b;
   	}

   	function fun3($a,$b,$fun){
   		return 'a+b = '.($a+$b).'<br>'.'in function = '.$fun($a,$b);
   	}

   	echo fun3(2,1,fun1);
   	echo "<br>";
   	echo fun3(2,1,fun2);

   	echo "<br>5.参数类型 ---------------<br>";

   	function judgeN($n){
   		if ($n % 2 == 0) {
   			return true;
   		}else
   			return false;
   	}
   	$arr = array(1,2,3,4,5,6,7,8);
   	print_r(array_filter($arr,judgeN));

   	echo "<br>6.=== 内部函数 重用函数 递归函数 ===<br>";
   	include_once "test.txt";
   include_once "test.txt";
   include_once "test.txt";

   require_once("test.html");
   require_once("test.html");
   require_once("test.html");

   include "test.inc.php";
   include_once "test.inc.php";

   echo $a."<br>";

   test();


?>