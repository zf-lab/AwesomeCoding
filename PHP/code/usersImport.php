<?php
	echo '<br> php foreach 变更表的数据<br><br>';

	$conn = mysqli_connect('localhost','root','root','mytestBase');

	if (!$conn){
		echo '数据库连接失败';
	}

	//数据库处理操作

	//查询 所有数据表 并 输出验证
	$arr = array('id'=>'exteralID','name'=>'fullname', 'weixin'=>'weixin','subtitle'=>'signWord','mobile'=>'phone','sex'=>'sex','edu'=>'edu','height'=>'height','weight'=>'weight','city'=>'city','lowPhotoUrl'=>'avatar');
	$keys = implode(',', array_keys($arr));
	$sql = 'select '.$keys.' from members;';

	$result = mysqli_query($conn,$sql);

	echo '<br>'.implode(' ', array_keys($arr)).'<br>';

	if ($result->num_rows >0) {
		while ($row  = $result->fetch_assoc()) {
			$rowStr = '';

			foreach ($arr as $key => $value) {
				// 输出 查询结果
				$rowStr .= $row[$value].'  ';
			}

			// 输出查询结果
			echo $rowStr .'<br>';

			// 插入数据
			foreach ($arr as $key => $value) {
				$finalSql = 'insert into users('.$value.') values('.$row[$key].');';
			}
		}
	}else
		echo '无查询结果';

	mysqli_close($conn);

?>