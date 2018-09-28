<?php
	echo '<br> php 事务 变更表的数据<br><br>';
	$stime = microtime(true);

	$conn = mysqli_connect('localhost','root','root','mytestBase');

	if (!$conn){
		echo '数据库连接失败';
	}

	//数据库处理操作

	mysqli_query($conn,'set autocommit=0;');
	mysqli_begin_transaction($conn);
	
	//查询 所有数据表 并 输出验证
	$arr = array('exteralID'=>'id','fullname'=>'name', 'login'=>'weixin', 'province'=>'province','weixin'=>'weixin','signWord'=>'subtitle','phone'=>'mobile','sex'=>'sex','edu'=>'edu','height'=>'height','weight'=>'weight','city'=>'city','lowPhotoUrl'=>'avatar','bigPhotoUrl'=>'avatar','originPhotoUrl'=>'avatar','normalPhotoUrl'=>'avatar');
	// $arr = array('exteralID'=>'id','fullname'=>'name','login'=>'weixin');
	$values = implode(',', array_values($arr));
	$sql = 'select '.$values.' from members;';

	$result = mysqli_query($conn,$sql);

	// echo '<br>'.implode(' ', array_values($arr)).'<br>';

	$memValueArr = array();
	if ($result->num_rows >0) {
		while ($row  = $result->fetch_assoc()) {

			foreach ($arr as $key => $value) {
				$memValueArr[$key] = $row[$value];
			}

			//更换 values
			$avatar =  $row['avatar'];
			$bigurl = str_replace('/small/', '/big/',$avatar);
			// $memValueArr['login'] = $row['weixin'];
			// $memValueArr['weixin'] = $row['weixin'];
			$memValueArr['bigPhotoUrl'] = $bigurl;
			
			//bigPhotoUrl => 

			$memValues = implode('\',\'', array_values($memValueArr));
			$userValues =  implode(',', array_keys($arr));

			$finalSql = 'insert into users('.$userValues.') values(\''.$memValues.'\');';
			mysqli_query($conn,$finalSql);

			// if ($row['id'] == 1) {
			// 	echo '<br> memValueArr'.var_dump(array_keys($memValueArr)).'<br>';
			// 	echo 'bigurl = '.$bigurl.'<br>';
			// 	echo $finalSql;
			// }
			
		}

		mysqli_commit($conn);
	}else
		echo '无查询结果';

	echo '<br><br>执行sql 完毕<br><br>';

	$etime = microtime(ture);

	echo "<br>total time = ".($etime - $stime).' 秒<br>';

	mysqli_close($conn);

?>