<?php
session_start();
require_once("db.php");//Подрубаем БД 



?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Каталоги какие то</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>
 <body>
<div class="container">
<?php 
 $is_login = false;
 $is_admin = false;
 
 if(((isset($_SESSION['login'])) and ($_SESSION['login'] != '')) and ((isset($_SESSION['pass'])) and ($_SESSION['pass'] != ''))){//Если есть сессии авторизации
 
	$user = mysqli_query($link, "SELECT * FROM authorization, user WHERE login = '$_SESSION[login]' AND `password` = '$_SESSION[pass]' AND user.idu = authorization.user_idu");
	$res_user = mysqli_fetch_array($user);
	if((isset($_SESSION['admin'])) and ($_SESSION['admin'] != '')){
		$is_admin = true;
	}
	if(!empty($res_user)){ $is_login = true; }//Если есть данные в БД для наших сессий то юзер авторизован
	
 }

 if($is_login){
	require_once("pages/header.php");
?>	 
 <div class="row">
	<div class="col-12 ">
		<nav class="navbar navbar-expand-lg navbar-light alert-primary">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			  <a class="btn btn-success" href="/147b/index.php?page=new_order">+Добавить</a>
			  <li class="nav-item">
				<a class="nav-link" href="/147b/index.php?page=my_tasks">Мои задачи</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="/147b/index.php?page=my_order">Мои поручения</a>
			  </li>
			  <?php
			  if ($is_admin){
				  echo '<li class="nav-item">
				<a class="nav-link" href="/147b/index.php?page=cr_user">Создать пользователя</a>
			  </li>';
			  }
			  ?>
			</ul>
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
			  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button>
			</form>
		  </div>
		</nav>
	</div>
 </div>
 <div class="row" style="background-color: #e3f2fd; margin:0;" >
	<div class="col-12">
	<?php
	if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = "";}
	if($page == "new_order"){//Добавить задачу
		require_once("pages/new_order.php");
	}else if($page == "my_tasks"){//Мои задачу
		require_once("pages/my_tasks.php");
	}else if($page == "my_order"){//мои поручения
		require_once("pages/my_order.php");
	}else if($page == "cr_user"){//flvbfddef
		if($is_admin){
			require_once("pages/cr_user.php");
		}
	}
	?>
	</div>
 </div>
<?php	 
 }else if(!$is_login){
?>
 <div class="row">
	<div class="col-3">
		
	</div>
	<div class="col-6">
	
		<form class='index_form' action='obrabot.php' method='POST'>
		  <div class="form-group">
			<label for="exampleInputEmail1" style='margin-left:5px;'>Логин</label>
			<input type="text" name='login' class="form-control" id="exampleInputEmail1" placeholder="Введите логин">
			<small id="emailHelp" class="form-text text-muted" style='margin:0 auto; display:table;'>Введите логин, который вам выдал администратор Татьяна </small>
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1" style='margin-left:5px;'>Пароль</label>
			<input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Пароль">
		  </div>
		  <div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
		  </div>
		  <input type="submit" name='ObrabotLogin' class="btn btn-primary" value='Войти'>
		</form>
		
	</div>	
	<div class="col-3">

	</div>
</div>

 <?php
 } 
 require_once("pages/footer.php");
 ?>
 </div>
 </body>
</html>