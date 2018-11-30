<?php
	$my_db = "journal";
	$my_user = "root";
	$my_pass = "";

	$link = mysqli_connect ('localhost', $my_user, $my_pass)

	or die ('Не получилось');
	
	$db_list = mysqli_query("SHOW DATABASES");
	
	if (is_array($my_db,mysqli_fetch_array($db_list)))
	{
		$link = mysqli_connect ('localhost', $my_user, $my_pass, $my_db)
		mysqli_query ($link, "SET NAMES 'utf8");
	}
	else
	{
		$create_db = 'CREATE DATABASE journal'
		if (mysqli_query($create_db,$link))
		{
			echo "База my_db успешно создана\n";
		} 
		else 
		{
			echo 'Ошибка при создании базы данных: ' . mysqli_error() . "\n";
		}
	}
	

	//$query = "select * from user";
	//$res = mysqli_query ($link, $query);

	//while ($row = mysqli_fetch_array ($res));
	//	echo $row ['name'].$row ['phone']."<br>";
?>
