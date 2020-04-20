<?php 
			if((isset($_SESSION['data'])) and ($_SESSION['data'] != '')){
				echo $_SESSION['data'];
				unset($_SESSION['data']);
			}?>
<form class='index_form' action='obrabot.php' method='POST'>

		<div class="form-group">
			<label style='margin-left:5px;'>ФИО нового пользователя</label>
			<input type="text" autocomplete="off" name='fio' class="form-control" value="<?php echo @$_SESSION['data2']['fio']?>">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>Должность</label>
			<input type="text" autocomplete="off" name='func' class="form-control" value="<?php echo @$_SESSION['data2']['func']?>">
		  </div>
		  <div class="form-group">
		  <label style='margin-left:5px;'>Кафедра</label>
			<select name='dep'>
			<?php 
			$res1 = mysqli_query ($link, "SELECT idd, kafedra FROM department"); 
			while ($row = mysqli_fetch_array ($res1, MYSQLI_ASSOC)){
				echo "<option value='$row[idd]'>$row[kafedra]</option>";
			}
			?>
	</select>
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>E-mail</label>
			<input type="text" autocomplete="off" name='mail' class="form-control" value="<?php echo @$_SESSION['data2']['mail']?>">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>Телефон</label>
			<input type="text" autocomplete="off" name='tel' class="form-control" value="<?php echo @$_SESSION['data2']['tel']?>">
		  </div>
		  <div class="form-group">
			<label style='margin-left:5px;'>Дайте ему логин</label>
			<input type="text" autocomplete="off" name='login' class="form-control" value="<?php echo @$_SESSION['data2']['login']?>">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1" style='margin-left:5px;'>Дайте ему пароль</label>
			<input type="text" autocomplete="off" name='password' class="form-control"value="<?php echo @$_SESSION['data2']['password']?>">
		  </div>
		  <input type="submit" name='NewUser' class="btn btn-primary" value='Создать'>
		</form>
		<?php unset($_SESSION['data2']); ?>