<?php
  session_start();
  $_SESSION['login'] = 'login';
  $_SESSION['pass'] = 'pass';
?>
<html>
<head>
 <title>Каталоги какие то</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>
 <body>
<div class="container">
<?php 
 require_once("pages/header.php");
 if((isset($_SESSION['login'])) and (isset($_SESSION['pass']))){//Если есть сессии авторизации показываем страницу+надо проверить на соответствие с базой
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
	}
	?>
	</div>
 </div>
<?php	 
 }else{
?>
 <div class="row">
	<div class="col-3">
			
	</div>
	<div class="col-6">
	
		<form class='index_form'>
		  <div class="form-group">
			<label for="exampleInputEmail1" style='margin-left:5px;'>Логин</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите логин">
			<small id="emailHelp" class="form-text text-muted" style='margin:0 auto; display:table;'>Введите логин, который вам выдал администратор Татьяна </small>
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1" style='margin-left:5px;'>Пароль</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
		  </div>
		  <div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Войти</button>
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