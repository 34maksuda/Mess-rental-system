<?php
	$host="localhost";
	$dbUser="MaksudaBilkis";
	$dbPwd="MaksudaBilkis@2020";
	$dbName="messrentalsystem";

	$connection=mysqli_connect($host,$dbUser,$dbPwd,$dbName);
	if($connection==false){
	echo "<h1>Error establishing database connection</h1>";
	}
?>