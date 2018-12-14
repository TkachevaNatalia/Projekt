<div class="row">
	<div class="col-10">
		<span class='TopText'><a class="nav-link" href="/147b/index.php">Журнал поручений</a></span>
	</div>
	<div class="col-2">
		<?php
		echo "<div>Вы зашли как: $res_user[login] (Должность:$res_user[function])</div>";
		
		?>
		<form action='obrabot.php' method='POST'>
			<input type="submit" name='Exit' class="btn btn-primary" value='Выход'>
		</form>
	</div>
</div>