<?php
	
	$query = "select opisanie, data_poruch, (select fio from task, user where user.idu=task.poruchitel LIMIT 1) as por, 
			(select fio from task, user where user.idu=task.ispolnitel LIMIT 1) as isp, srok, data_ispol, status from task";
			
	$res1 = mysqli_query ($link, $query); 

	$ech_res = "<table>
	<thead>
  			<th>Поручение</th>
			<th>Дата поручения</th>
			<th>Поручитель</th>
			<th>Исполнитель</th>
			<th>Срок исполнения</th>
			<th>Дата исполнения</th>
			<th>Статус</th>			
	</thead>
	";
	while ($row = mysqli_fetch_array ($res1, MYSQLI_ASSOC)){
		
		$ech_res.="
		<tr>
  			<td>$row[opisanie]</td>
			<td>$row[data_poruch]</td>
			<td>$row[por]</td>
			<td>$row[isp]</td>
			<td>$row[srok]</td>
			<td>$row[data_ispol]</td>
			<td>$row[status]</td>
		</tr>
		";
		
		/*echo "<pre>";
		print_r($row);
		echo "</pre>";*/
	}	
	$ech_res.="</table>";
	echo $ech_res;
?>