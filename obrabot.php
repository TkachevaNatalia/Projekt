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
}else if(isset($_POST['Exit'])){
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
}
header('Location: http://localhost/147b/index.php');



?>
