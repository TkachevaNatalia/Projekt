<?php
	
	$query = "SELECT task.*,user.* FROM task,user WHERE task.poruchitel = '$res_user[idu]' AND task.ispolnitel=user.idu";
			
	$res1 = mysqli_query ($link, $query); 

	$ech_res = "<table>
	<thead>
  			<th>Поручение</th>
			<th>Дата поручения</th>
			<th>ФИО Исполнителя</th>
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
			<td>$row[FIO]</td>
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