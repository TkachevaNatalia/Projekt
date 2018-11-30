<?php
	$my_db = "journal";
	$my_user = "root";
	$my_pass = "";
	
	
	$link = mysqli_connect ('localhost', $my_user, $my_pass, $my_db)
	or die ('Не получилось');
	
	mysqli_query ($link, "SET NAMES 'utf8");
	
	
	$query = "select opisanie, data_poruch, (select fio from task, user where user.idu=task.poruchitel), 
			(select fio from task, user where user.idu=task.ispolnitel), srok, data_ispol, status from task";
	$res - mysqli_query ($link, $query);
	
	while ($row = mysqli_fetch_array ($res));
		echo $row [''].$row ['phone']."<br>";
?>