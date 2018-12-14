<?php
	$my_db = "journal";
	$my_user = "root";
	$my_pass = "";
	$mysqlImportFilename ='journal.sql';
	
	$link = mysqli_connect ('localhost', $my_user, $my_pass)
	or die ('Не получилось');
	
	$db_list = mysqli_query($link, "SHOW DATABASES");
	
	if (in_array ($my_db, mysqli_fetch_array($db_list)))
	{
		$link = mysqli_connect ('localhost', $my_user, $my_pass, $my_db);
		mysqli_query ($link, "SET NAMES 'utf8'");
	}
	else
	{
		$create_db = 'CREATE DATABASE journal';
		if( mysqli_query($link, $create_db) ){
			echo "База my_db успешно создана\n";
		} 
		else 
		{
			//echo 'Ошибка при создании базы данных: ' . mysqli_error($link) . "\n";
		}
	}
	$link = mysqli_connect ('localhost', $my_user, $my_pass, $my_db);
	mysqli_query($link, "SET CHARSET utf8");
?>