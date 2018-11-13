<?php

	$arrayName = array('1','3' );
	$arrayName1 = array('1','4' );

	echo var_dump(arrayName+arrayName1)."<br>";
	echo var_dump(array_merge(arrayName,arrayName1));

?>