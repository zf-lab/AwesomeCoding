<?php
	echo 'my learning plan <br>';

	$plan1 =  'SQL<br>';

	$plan2 = 'PHP<br>';

	$plan3 = 'Regular Expression<br>';

	echo '<br>'. $plan1 . $plan2 . $plan3 . '<br>';

	$lesson = array('sql','php','regular express');

	foreach($lesson as $value){
		echo ' i want to learn ' . $value .'<br> <br>';
	}

	$int10 = 35;
	$int8 = 077;
	$int16 = 0xae;
	$float1 = 3.14e5;

 	settype($int10, string);
	echo "<br> $int10  {$int10} <br>";
	var_dump($int10);


	echo "<br> ";
	echo gettype($int10);
	echo "<br>";

	$int=10;
	$str="aa{$int}aaa\naaa$int,aaa\raaa\taaa${int}aaa\$intaa\"aaaaa<br>";
	echo $str;

	echo " <br>123 \r  \n \t 123<br>";

	echo "<br>result = ".'<br>'.$int10.'<br>'.$int8.'<br>'.$int16.'<br>'.$float1.'<br>';

	echo "<br>for 循环";

	exit();

	echo "is  over ?";
