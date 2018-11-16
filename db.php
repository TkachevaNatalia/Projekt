<?php
	$my_db = "journal";
	$my_user = "root";
	$my_pass = "";

	$link = mysqli_connect ('localhost', $my_user, $my_pass, $my_db)

	or die ('Не получилось');

	mysqli_query ($link, "SET NAMES 'utf8");

	$query = "select * from user";
	$res - mysqli_query ($link, $query);

	while ($row = mysqli_fetch_array ($res));
		echo $row ['name'].$row ['phone']."<br>";
?>
