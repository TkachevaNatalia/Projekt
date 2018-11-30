<?php

	$query = "select opisanie, data_poruch, (select FIO from task, user where user.idu=task.poruchitel), 
			(select FIO from task, user where user.idu=task.ispolnitel), srok, data_ispol, status from task";

	<table>
 		<tr>
  			<th>Поручение</th>
			<th>Дата поручения</th>
			<th>Поручитель</th>
			<th>Исполнитель</th>
			<th>Срок исполнения</th>
			<th>Дата исполнения</th>
			<th>Статус</th>			
		</tr>
	
	while ($row = mysqli_fetch_array ($res)){
		<tr>
  			<td>echo $row ['opisanie']</td>
			<td>echo $row ['</td>
			<td>Поручение</td>
			<td>Поручение</td>
			<td>Поручение</td>
			<td>Поручение</td>
			<td>Поручение</td>
		</tr>
	}
	
	</table>
?>
