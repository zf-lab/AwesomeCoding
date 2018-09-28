<?php

	function dailyAct($thing,$goal){
		echo '<br>i am doing ' . $thing . 'to make a goal that i\'ll ' . $goal . '<br>';
	}

	$title = '<h1>my daily life</h1> <br>';

	$things = array('learning','recreation','exercise','sleeping');

	$goals = array('become a skilled phper and iOSer','gain happiness','gain fitness','gain vigorous tomorrow');

	echo $title;

	$i = 0;
	do{
		$thing = $things[$i];
		$goal = $goals[$i];
		dailyAct($thing,$goal);

		$i++;
	}while($i < count($things));

	echo "函数联系";
