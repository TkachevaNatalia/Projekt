<?php
	echo "Новое поручение";
?>
<form class='index_form' action='obrabot.php' method='POST'>
	<select name='ispoln'>
		<?php 
		$res1 = mysqli_query ($link, "SELECT * FROM user"); 
		while ($row = mysqli_fetch_array ($res1, MYSQLI_ASSOC)){
			echo "<option value='$row[idu]'>$row[FIO]</option>";
		}
		?>
	</select>
	<textarea>
	</textarea>


</form>
