<?php

	$query = "select opisanie, data_poruch, (select FIO from task, user where user.idu=task.poruchitel limit 1) as por, 
			(select FIO from task, user where user.idu=task.ispolnitel limit 1) as isp, srok, data_ispol, status from task";

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
			<td>echo $row ['data_poruch']</td>
			<td>echo $row ['por']</td>
			<td>echo $row ['isp']</td>
			<td>echo $row ['srok']</td>
			<td>echo $row ['data_ispol']</td>
			<td>echo $row ['status']</td>
		</tr>
	}
	
	</table>
?>
