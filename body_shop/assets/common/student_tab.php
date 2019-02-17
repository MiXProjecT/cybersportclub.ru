
<?php
	$Students = new Student();
	$Students->showAllStudent();
if($_SESSION['user'] == 'admin') {
    echo '<form method="post" name="form1" class="form-main">
	<div class="div-form-main">
		<label for="Student_id">ID Ученика</label>
		<input type="text" name="Student_id" class="box"><br>
		<label for="Student_name">Имя</label>
		<input type="text" name="Student_name" class="box"><br>
		<label for="Student_address">Адрес</label>
		<input type="text" name="Student_address" class="box"><br>
		<label for="Student_phone">Телефон</label>
		<input type="text" name="Student_phone" class="box"><br>
		<input type="submit" name="add_Student" value="Добавить" class="button box"><br>
		<input type="submit" name="change_Student" value="Изменить" class="button box"><br>
		<input type="submit" name="del_Student" value="Удалить" class="button box"><br>
	</div>
</form>';
}


	if (isset($_POST['add_Student']))
	{		
		$val_student_id = $_POST['Student_id'];
		$val_name = $_POST['Student_name'];
		$val_address = $_POST['Student_address'];
		$val_phone = $_POST['Student_phone'];
		$Students->addStudent($val_student_id, $val_name, $val_address, $val_phone);
	}
	
	if (isset($_POST['change_Student'])){
		$val_student_id = $_POST['Student_id'];
		$val_name = $_POST['Student_name'];
		$val_address = $_POST['Student_address'];
		$val_phone = $_POST['Student_phone'];;
		$Students->changeStudent($val_student_id, $val_name, $val_address, $val_phone);
	}
	
	if (isset($_POST['del_Student']))
	{
		$val_student_id = $_POST['Student_id'];
		$Students->delStudent($val_student_id);
	}
?>

<script>

	$(document).ready(function(){
		$('table tr').click(function(){

			var val_Student_id_stroke = $(this).find("td").eq(0).html();
			var name_stroke = $(this).find("td").eq(1).html();
			var address_stroke = $(this).find("td").eq(2).html();
			var phone_stroke = $(this).find("td").eq(3).html();
			
			$("input[name=Student_name").val(name_stroke);
		
			$("input[name=Student_id]").val(val_Student_id_stroke);
						
			$("input[name=Student_address]").val(address_stroke);
			
			$("input[name=Student_phone]").val(phone_stroke);
			
		});
	});
</script>
