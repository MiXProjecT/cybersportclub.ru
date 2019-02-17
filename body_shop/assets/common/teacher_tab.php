
<?php
	$teacher = new Teacher();
	$teacher->showAllTeacher();

if($_SESSION['user'] == 'admin') {
    echo '<form method="post" name="form1" class="form-main">
	<div class="div-form-main">
		<label for="id_teacher">ID Преподавателя</label>
		<input type="text" name="id_teacher" class="box"><br>
		<label for="name_teacher">Ф.И.О.</label>
		<input type="text" name="name_teacher" class="box"><br>
		<label for="spec_teacher">Специализация</label>
		<select id = "spec_teacher" name="spec_teacher" class="box">
			<option>Dota 2</option>
			<option>Counter Strike:GO</option>
			<option>Heroes Of The Storm</option>
			<option>StarCraft</option>
		</select>		
		<label for="address_teacher">Адрес</label>
		<input type="text" name="address_teacher" class="box"><br>
		<label for="phone_teacher">Телефон</label>
		<input type="text" name="phone_teacher" class="box"><br>
		<input type="submit" name="add_teacher" value="Добавить" class="button box"><br>
		<input type="submit" name="change_teacher" value="Изменить" class="button box"><br>
		<input type="submit" name="del_teacher" value="Удалить" class="button box"><br>
	</div>
</form>';
}
	if (isset($_POST['add_teacher']))
	{		
		$val_id = $_POST['id_teacher'];
		$val_name = $_POST['name_teacher'];
		$val_spec= $_POST['spec_teacher'];
		$val_address = $_POST['address_teacher'];
		$val_phone = $_POST['phone_teacher'];
		$teacher->addTeacher($val_id, $val_name, $val_spec, $val_address, $val_phone);
	}
	if (isset($_POST['del_teacher']))
	{
		$val_id = $_POST['id_teacher'];
		$teacher->delTeacher($val_id);
	}
	if (isset($_POST['change_teacher'])){
		$val_id = $_POST['id_teacher'];
		$val_name = $_POST['name_teacher'];
		$val_spec= $_POST['spec_teacher'];
		$val_address = $_POST['address_teacher'];
		$val_phone = $_POST['phone_teacher'];
		$teacher->changeTeacher($val_id, $val_name, $val_spec, $val_address,$val_phone);
	}
	
?>

<script>
	$(document).ready(function(){
		$('table tr').click(function(){

			var id_stroke = $(this).find("td").eq(0).html();
			var name_stroke = $(this).find("td").eq(1).html();
			var spec_stroke = $(this).find("td").eq(2).html();
			var address_stroke = $(this).find("td").eq(3).html();
			var phone_stroke = $(this).find("td").eq(4).html();
		
			$("input[name=id_teacher]").val(id_stroke);
			
			$("input[name=name_teacher]").val(name_stroke);

            $("#spec_teacher")[0].value = spec_stroke;
			
			$("input[name=address_teacher]").val(address_stroke);
			
			$("input[name=phone_teacher]").val(phone_stroke);
		});
	});
</script>
