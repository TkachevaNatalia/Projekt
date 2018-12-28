
<form class='index_form' action='obrabot.php' method='POST'>
		<div class="form-group">
			<label style='margin-left:5px;'>ФИО нового пользователя</label>
			<input type="text" autocomplete="off" name='fio' class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>Должность</label>
			<input type="text" autocomplete="off" name='func' class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>E-mail</label>
			<input type="text" autocomplete="off" name='mail' class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>Телефон</label>
			<input type="text" autocomplete="off" name='tel' class="form-control" id="exampleInputLogin1">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1" style='margin-left:5px;'>Дайте ему пароль</label>
			<input type="text" autocomplete="off" name='password' class="form-control" id="exampleInputPassword1" placeholder="Пароль">
		  </div>
		  <input type="submit" name='NewUser' class="btn btn-primary" value='Создать'>
		</form>