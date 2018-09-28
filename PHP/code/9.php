<?php
/* 数组的遍历
 *
 * 	1. 使用for语句循环遍历数组
 * 	   a. 其它语言（只有这一种方式）
 *         b. PHP中这种方式不是我们首选方式
 *         c. 数组必须是索引数组，而且下标还必须是连续的
 *            （索引数组下标还可以不连序，数组还有关联数组）
 *   
 *
 * 	2. 使用foreach语句循环遍历数组
 * 	   foreach(数组变量 as 变量值){
 *		//循环体
 * 	   }
 * 	   a. 循环次数由数组的元素个数决定
 * 	   b. 每一次循环都会将数组中的元素分别赋值给后面变量
 *
 * 	   foreach(数组变量 as 下标变量=> 值变量){
 *		
 * 	   }
 *
 * 	3. while() list() each() 组合循环遍历数组
 *
 *      
 *    
 *
 *
 */

  $info=array(
		"user"=>array(
				//$user[0]
				array(1, "zansan", 10, "nan"),
				//$user[1][1]
				array(2, "lisi", 20, "nv"),    //$user[1]
				//$user[2]
				array(3, "wangwu", 30, "nan")
		),
		"score"=>array(
				array(1, 100, 90, 80),
				array(2, 99, 88, 11),
				array(3, 10, 50, 88)
			),
		"connect"=>array(
				array(1, '110', 'aaa@bbb.com'),
				array(2, '120', 'bbb@ccc.com'),
				array(3, '119', 'ccc@ddd.com')	
			)
		);

foreach($info as $tableName=>$table){
	echo '<table align="center" width="500" border="1">';
	echo '<caption><h1>'.$tableName.'</h1></caption>';
	foreach($table as $row){
		echo '<tr>';
		foreach($row as $col){
			echo '<td>'.$col.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

