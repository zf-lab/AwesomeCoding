<?php

	//设置北京时间为默认时区  
date_default_timezone_set('PRC');  
  
//输出当前时间  
  
echo date("Y-m-d H:i:s",time());  //2016-08-11 10:30:32  
  
//获得当日凌晨的时间戳  
  
$today = strtotime(date("Y-m-d"),time());  
  
echo '<br>';  
  
echo $today; //1470844800  
  
echo '<br>';  
  
//验证当日凌晨的时间戳是否正确  
  
echo date("Y-m-d H:i:s",$today); //2016-08-11 00:00:00  
  
echo '<br>';  
  
//当天的24点时间戳  
  
$end = $today+60*60*24;  
  
//验证当天的24点时间戳是否正确  
  
echo date("Y-m-d H:i:s", $end); //2016-08-12 00:00:00  
  
echo '<br>';  
  
//获得指定时间的零点的时间戳  
   
$time = strtotime('2014-06-06');   
  
echo '<br>';  
  
echo $time; //1401984000  
  
echo '<br>';  
//验证是否是指定时间的时间戳  
echo date("Y-m-d H:i:s",$time); //2014-06-06 00:00:00  

$lastday = strtotime('last day');
$last0H = date("Y-m-d",$lastday);
$last8H = strtotime('+8 hours',$last0H);

echo '<br><br>last timestamp  '.$lastday;
echo '<br>last day 0 h '.$last0H;

echo '<br>last day 8 h  '.date("Y-m-d H:i:s",$last8H);

// $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
// $endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
// echo '<br>beginYesterday '.date("Y-m-d H:i:s",$beginYesterday);
// echo '<br>endYesterday '.date("Y-m-d H:i:s",$endYesterday);
// $Yesterday8 = strtotime('+8 hours',$beginYesterday);
// echo '<br>Yesterday 8 h '.date("Y-m-d H:i:s",$Yesterday8);

// $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
// $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
// $today8 = strtotime('+8 hours',$beginToday);
// echo '<br>today 8 h '.date("Y-m-d H:i:s",$today8);

// echo '<br>'.'<br>'.date("Y-m-d H:i:s", strtotime('1 monday'));
// echo '<br>'.date("Y-m-d H:i:s", strtotime('this week monday'));
// echo '<br>'.date("Y-m-d H:i:s",strtotime('-1 monday'));
// echo '<br>'.date("Y-m-d H:i:s",strtotime('last monday'));
// echo '<br>'.date("Y-m-d H:i:s",strtotime('next monday'));

// $thisMonday = strtotime("this week monday");
// $str = '+'.$n.'week';
// $n = 0;
// $timestamp0 = strtotime($n.'week',$thisMonday);
// $n = 1;
// $timestamp1 = strtotime($n.'week',$thisMonday);
// $n = -1;
// $timestamp_1 = strtotime($n.'week',$thisMonday);
// echo '<br>'."this monday".date("Y-m-d H:i:s",$thisMonday);
// echo '<br>'."0 monday ".date("Y-m-d H:i:s",$timestamp0);
// echo '<br>'."1 monday ".date("Y-m-d H:i:s",$timestamp1);
// echo '<br>'."-1 monday ".date("Y-m-d H:i:s",$timestamp_1);

// echo "<br><br>";
// $arr = array('code'=>1,'value'=>'1');
// if (empty($arr['name'])) {
// 	echo "name is empty";
// }else{
// 	echo "name has value";
// }

// $time1 = strtotime('next day',strtotime('2017-11-14'));
// $time2 = strtotime('2017-11-14');
// echo "<br>time1 = ".date("Y-m-d H:i:s",$time1);
// echo "<br>time2 = ".date("Y-m-d H:i:s",$time2);

// $arr123 = null;
// if (is_null($arr123)) {
// 	echo "arr123 == null";
// }else
// 	echo "arr123 != null";

echo "<br>"."<br>";
$tmpArr = array_map('month', range(-7, 0));
echo "range = ".$tmpArr.'<br>';
echo "range(-7,0) = <br>";
print_r(range(-7, 0));

echo "<br>"."<br>";
?>