<?php
session_start();
require_once("db.php");//Подрубаем БД


if(isset($_POST['ObrabotLogin'])){//Авторизация

	if(isset($_POST['login'])){$login = $_POST['login'];}
	if(isset($_POST['password'])){$password = $_POST['password'];}
	
	$user = mysqli_query($link, "SELECT * FROM authorization WHERE login = '$login' AND `password` = '$password'");
	$res_user = mysqli_fetch_array($user);
	
	if(!empty($res_user)){//Все хорошо, авторизуем
		$_SESSION['login'] = $res_user['login'];
		$_SESSION['pass'] = $res_user['password'];
	}else{
		echo "Не правильный логин или пароль";
	}
	header('Location: http://localhost/147b/index.php');
	
}else if(isset($_POST['Exit'])){
	
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	header('Location: http://localhost/147b/index.php');
	
}else if(isset($_POST['ObrabotSort'])){//Сортировка
	if(isset($_POST['status'])){$status = $_POST['status'];}
	if(isset($_POST['type'])){$type = $_POST['type'];}
	
	$user = mysqli_query($link, "SELECT * FROM authorization, user WHERE login = '$_SESSION[login]' AND `password` = '$_SESSION[pass]' AND user.idu = authorization.user_idu");
	$res_user = mysqli_fetch_array($user);
	
	if($type == 'my_order'){
		if($status == 'all'){
		$query = "SELECT task.*,user.* FROM task,user WHERE task.poruchitel = '$res_user[idu]' AND task.ispolnitel=user.idu";
		}else if($status == '1'){
			$query = "SELECT task.*,user.* FROM task,user WHERE task.poruchitel = '$res_user[idu]' AND task.ispolnitel=user.idu AND status='Выполнено'";
		}else if($status == '0'){
			$query = "SELECT task.*,user.* FROM task,user WHERE task.poruchitel = '$res_user[idu]' AND task.ispolnitel=user.idu AND status='Невыполнено'";
		}
		
		$res1 = mysqli_query ($link, $query); 
		$num = mysqli_num_rows($res1);
		
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
			
		
		}	
		if($num==0){
			$ech_res.= "<tr><td colspan='6'>Вы не дали ни одного поручения</td></tr>";
		}
		$ech_res.="</table>";
		
	}else if($type == 'my_tasks'){
		if($status == 'all'){
		$query = "SELECT task.*,user.* FROM task,user WHERE task.ispolnitel = '$res_user[idu]' AND task.poruchitel=user.idu";
		}else if($status == '1'){
			$query = "SELECT task.*,user.* FROM task,user WHERE task.ispolnitel = '$res_user[idu]' AND task.poruchitel=user.idu AND status='Выполнено'";
		}else if($status == '0'){
			$query = "SELECT task.*,user.* FROM task,user WHERE task.ispolnitel = '$res_user[idu]' AND task.poruchitel=user.idu AND status='Невыполнено'";
		}
		
		$res1 = mysqli_query ($link, $query); 
		$num = mysqli_num_rows($res1);
		
		
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
	}	

	$_SESSION['data'] = $ech_res;
	header('Location: http://localhost/147b/index.php?page='.$type);
	
}




?>
