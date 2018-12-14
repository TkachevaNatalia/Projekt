<?php
	
	$query = "SELECT task.*,user.* FROM task,user WHERE task.ispolnitel = '$res_user[idu]' AND task.poruchitel=user.idu";		
	$res1 = mysqli_query ($link, $query); 
	$num = mysqli_num_rows($res1);
	
	$query2 = "SELECT task.*,user.* FROM task,user WHERE task.ispolnitel = '$res_user[idu]' AND task.poruchitel=user.idu AND status='Выполнено'";	
	$res2 = mysqli_query ($link, $query2); 
	$num2 = mysqli_num_rows($res2);
	
	if($num2 >0){
		$text = "Активных задач - $num2";
	}else{
		$text = "В данный момент нет активных задач";
	}
	echo "<div class='text_p'>".$text."</div>";
	
	echo "
	<form action='obrabot.php' method='POST'>
		<select name='status'>
			<option value='all'>-Все-</option>
			<option value='1'>Выполненные</option>
			<option value='0'>Не выполненные</option>
		</select>
		<input type='hidden' name='type' value='my_tasks'>
		<input type='submit' name='ObrabotSort' class='btn btn-primary' value='Сортировать'>
	</form>
	";
	if(isset($_SESSION['data'])){ 
		echo $_SESSION['data'];unset($_SESSION['data']); 
	}else{
		
		$ech_res = "<table>
		<thead>
				<th>Задача</th>
				<th>Дата поручения</th>
				<th>ФИО Поручителя</th>
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
		
		}	
		if($num==0){
			$ech_res.= "<tr><td colspan='6'>Вам пока ничего не поручили</td></tr>";
		}
		$ech_res.="</table>";
		echo $ech_res;
	}
?>