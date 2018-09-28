<?php

	//members表导入 有用信息到 users表

	//1.连接数据库
	// $conn = mysqli_connect('localhost','root','root');
	$conn = mysqli_connect('localhost','fly123','123456');

	if (!$conn) {
		die("connect error!!! <br>".mysqli_connect_error());
	}
	mysqli_select_db($conn,"mytestBase");
	//查询 members表
	// $sql = "select * from members;";
	//测试
	// $sql = "insert into users(fullname,weixin,login) values('fly123','123','123455');";

	//插入所有行 并拷贝指定列
	// $sql = 'insert into users(fullname,weixin,login) select name,weixin,id from members;';
	//拷贝avatar到 originPhotoUrl
	// $sql = 'update users,members set users.originPhotoUrl= members.avatar where  members.id = users.login;';
	//替换 /small/ 到 /big/
	// $sql = "update users set lowPhotoUrl = replace(lowPhotoUrl,'/big/','/small/')";
	//查看指定行的结果
	// $sql = 'select users.originPhotoUrl,users.normalPhotoUrl,users.originCoverUrl,users.normalCoverUrl,users.lowPhotoUrl from mytestBase.users;';
	//清空表中数据
	$sql = 'delete from users;';

	$result = mysqli_query($conn,$sql);
	echo '<br>'. var_dump($result).'  <br>';
	//查看指定行的结果
	$sql1 = 'select users.fullname,users.weixin,users.login from users;';
	$result = mysqli_query($conn,$sql1);

	if ($result->num_rows >0) {
		 // 输出数据
    	while($row = $result->fetch_assoc()) {
        	echo "id: " . $row["id"]. " - fullname: " . $row["fullname"]. " weixin" . $row["weixin"]. "<br>";
    	}
	}else
		echo "无结果";

	echo "<br>连接成功<br>";
	mysqli_close();

?>