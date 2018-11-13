<?php
	echo '<br> php sql 处理 变更表的数据<br><br>';
	$stime = microtime(true);

	$conn = mysqli_connect('localhost','root','root','mytestBase');

	if (!$conn){
		echo '数据库连接失败';
	}

	//数据库处理操作

	// mysqli_query($conn,'set autocommit=0;');
	// mysqli_begin_transaction($conn);
	
	//查询 所有数据表 并 输出验证
	$sql = 'insert into users(fullname,weixin,login,exteralID,province,signWord,phone,sex,edu,height,weight,city,lowPhotoUrl,bigPhotoUrl,originPhotoUrl,normalPhotoUrl) select distinct name,weixin,weixin,id, province, subtitle,mobile,sex,edu,height,weight,city,avatar,avatar,avatar,avatar  from members;';

	$result = mysqli_query($conn,$sql);

	if ($result) {

		// mysqli_commit($conn);
	}else
		echo '无查询结果';

	echo '<br><br>执行sql 完毕<br><br>';

	$etime = microtime(ture);

	echo "<br>total time = ".($etime - $stime).' 秒<br>';

	mysqli_close($conn);

?>