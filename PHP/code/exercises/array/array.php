<?php
	echo '<h1>数组练习</h1>';

	echo "<br>1.添加元素  关联数组和索引数组 多维数组-----------  <br>";
	$user=array("id"=>1,'key'=> 'value', "name"=>"zhsangsan", "age"=>10, 10=>"nan", "aaa@bbb.com",'arr'=>array('1','2','3'));

	for($i=0; $i<20; $i++)
		$user[]=$i;
	echo '<pre>';
	print_r($user);
	echo '</pre>';

	echo '<br>user0 = '.$user[$i];

	echo "<br>2.数组遍历-----------  <br>";

	echo "id value = \$user[{'id'}] <br>";
	echo "id value = ".$user['id']." <br>";
	echo '<br> foreach <br>';

	for($i=0; $i<13; $i++){
		echo "\$user[{$i}]=".$user[$i]."<br>";
	}

	foreach ($user as $key => $value) {
		if (is_array($value)) {
			var_dump($value);
		}else{
			echo "key = ".$key.' and value = '.$value;
			echo "<br>";
		}
	}

	echo '<br> while （foreach 后数组指针已经到尾） <br>';
	while ($arr = each($user)) {
		if (is_array($arr['value'])) {
			var_dump($arr['value']);
		}else{
			echo "key = ".$arr['key'].' and value = '.$arr['value'];
			echo "<br>";
		}
	}

	$ip="192.168.1.128";

	list(, $a, , $d)= explode(".", $ip);
	echo 'ip = '.$a.'   '.$d;

	$user=array("id"=>1, "name"=>"zhangsan", "age"=>10, "sex"=>"nan");

	while(list($key, $value)=each($user)){
		echo $key."==>".$value."<br>";
	}
	reset($user);
	while(list($key, $value)=each($user)){
		echo $key."==>".$value."<br>";
	}
	reset($user);
	next($user);
	next($user);
	while(list($key, $value)=each($user)){
		echo $key."==>".$value."<br>";
	}
	reset($user);

	echo current($user)."===========>".key($user)."<br>";
	end($user);
	echo current($user)."===========>".key($user)."<br>";
	prev($user);
	echo current($user)."===========>".key($user)."<br>";
	
	echo "<br>--------------------------  <br>";

	echo "<br>2.超全局变量------------------- <br>";
	/*
	*	$_GET       //经由URL请求提交至脚本的变量 
 *	$_POST      //经由HTTP POST 方法提交到脚本的变量
 *	$_REQUEST   //经由GET, POST和COOKIE机制提交 到脚本的变量，因此该数组并不值得信任，不去使用（尽量）
 *	$_FILES     //经由HTTP POST  文件上传而提交至脚本， 文件处理一章，文件上传
 *	$_COOKIE    //
 *	$_SESSION   //
 *	$_ENV       //执行环境提交至脚本的变量
 *	$_SERVER
 *	$GLOBALS
 *
	*/

	echo 'username'.$_GET["username"]."<br>";
	echo 'email'.$_GET["email"]."<br>";
	echo 'page'.$_GET["page"]."<br>";
	$_GET["eeee"]="@@@@@@@@@@@@";
	print_r($_GET);
	print_r($_POST);
	print_r($_REQUEST);

	echo "<br>3.常用数组处理函数 筛选与遍历------------------- <br>";
	/* 数组的相关处理函数(上)
 * 
 *  一 数组键/值操作有关的函数
 *  	1.  array_values()
 *  	2.  array_keys()
 *  	3.  in_array()
 	4. array_key_exists
	5.array_flip -- 交换数组中的键和值
	6. array_reverse --  返回一个单元顺序相反的数组 
   
    二、 统计数组元素的个数和惟一性

    1. count() sizeof();
    2. array_count_values -- 统计数组中所有的值出现的次数
    3. array_unique -- 移除数组中重复的值

    三、使用回调函数处理数组的函数

    	1. array_filter()  用回调函数过滤数组中的单元 
	2. array_walk()   数组中的每个成员应用用户函数

	3. array_map()     将回调函数作用到给定数组的单元上 
 *
 *
 */
	$lamp=array("os"=>"linux", "wb"=>"apache", "db"=>"mysql", "la"=>"php");
	$lp=array("os"=>"window", "wb"=>"apache", "db"=>"oracle", "la"=>"php");


	$arr=array_map("myfun1", $lamp, $lp);

	function myfun1($n, $t){
		if($n==$t){
			return "same";
		}

		return "different";
	}
  
	echo '<pre>';
	print_r($arr);
	echo '</pre>';

	echo "<br>reverse1 =======<br>";
	echo var_dump(array_reverse($lamp)).'<br>';
	print_r($lamp);
	echo "<br>reverse2 =======<br>";
	echo '<pre>';
	print_r(array_reverse($lamp));
	echo '</pre>';

	echo "<br>end-----------------------end<br>";

	echo "<br>4.常用数组处理函数 排序------------------- <br>";

	echo "<a href='array.html'>array 排序函数</a> <br><br>";
	
?>

<form action="demo.php" method="post">
	username : <input type="text" name="uname"><br>
	password:  <input type="password" name="pass"><br>
	<input type="submit" value="login"> <br>

</form>


<a href="demo.php?username=zhangsan&email=aaa@bbb.com&page=45">this is a $_GET test</a>

