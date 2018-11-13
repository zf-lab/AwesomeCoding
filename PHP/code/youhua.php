<?php
	echo '<br> php 变更表的数据 insert()()处理 <br><br>';
	$stime = microtime(true);

	$conn = mysqli_connect('localhost','root','root','mytestBase');

	if (!$conn){
		echo '数据库连接失败';
	}

	//数据库处理操作

	//查询 所有数据表 并 输出验证
	$arr = array('exteralID'=>'id','fullname'=>'name', 'login'=>'weixin', 'province'=>'province','weixin'=>'weixin','signWord'=>'subtitle','phone'=>'mobile','sex'=>'sex','edu'=>'edu','height'=>'height','weight'=>'weight','city'=>'city','lowPhotoUrl'=>'avatar','bigPhotoUrl'=>'avatar','originPhotoUrl'=>'avatar','normalPhotoUrl'=>'avatar');
	// $arr = array('exteralID'=>'id','fullname'=>'name','login'=>'weixin');
	$values = implode(',', array_values($arr));
	$sql = 'select '.$values.' from members;';

	mysqli_query($conn,'truncate users;');
	$result = mysqli_query($conn,$sql);

	// echo '<br>'.implode(' ', array_values($arr)).'<br>';

	$memValueArr = array();
	$i = 0;
	if ($result->num_rows >0) {

		$userValues =  implode(',', array_keys($arr));

		while ($row  = $result->fetch_assoc()) {

			foreach ($arr as $key => $value) {
				$memValueArr[$key] = $row[$value];
			}

			//更换 values
			// $avatar =  $row['avatar'];
			// $bigurl = str_replace('/small/', '/big/',$avatar);
			// $memValueArr['bigPhotoUrl'] = $bigurl;

			$memValues = implode('\',\'', array_values($memValueArr));

			if (isset($finalSql)) {
				$finalSql .= ',(\''.$memValues.'\')';
			}else{
				$finalSql .= '(\''.$memValues.'\')';			
			}
			$i++;
		}

		$finalStr = 'insert into users('.$userValues.') values'.$finalSql.';';
		// $finalSqlStr = "insert into users(exteralID,fullname,login) values('1','明日辉煌','fuyz007007'),('2','♀℡ 伟 we','13891671257');";
		$result1 = mysqli_query($conn,'set global max_allowed_packet = 2048000000;');
		$result = mysqli_query($conn,$finalStr);

		echo var_dump($result);
		echo mysqli_error($conn);
	}else
		echo '无查询结果';

	echo '<br><br>执行sql 完毕<br><br>';

	$etime = microtime(ture);

	echo "<br>total time = ".($etime - $stime).' 秒<br>';

	mysqli_close($conn);

?>