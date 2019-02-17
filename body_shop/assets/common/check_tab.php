<?php
	$check = new Check();
	$check->showAllChecks();
if($_SESSION['user'] == 'admin') {
    $val_date = date('Y-m-d');
    echo '<form method="post" name="form1" class="form-main">
	<div class="div-form-main">
		<label for="add_check_id">ID Чека</label>
		<input type="text" name="add_check_id" class="box"><br>';
		$check->selectedIdStudent();
		$check->selectedIdCourse();
		echo '<label for="date_of_start">Дата начала курса</label>
		<input type="date" name="add_date_of_start" class="box"><br>
		<label for="add_date_of_end">Дата конца курса</label>
		<input type="date" name="add_date_of_end" class="box"><br>
		<label for="add_date_of_check">Дата чека</label>
		<input type="date" name="add_date_of_check" class="box" value= "'; echo $val_date; echo '"><br><br>
		<input type="submit" name="add_check" value="Добавить" class="button box"><br>
		<input type="submit" name="change_check" value="Изменить" class="button box"><br>
		<input type="submit" name="del_check" value="Удалить" class="button box"><br>
		

	</div>
</form>';
}


	if (isset($_POST['add_check']))
	{		
		$val_check_id = $_POST['add_check_id'];
		$val_student_id = $_POST['selected_student_id'];
		$val_course_number = $_POST['selected_course_id'];
		$val_date_of_start = $_POST['add_date_of_start'];
        $val_date_of_end = $_POST['add_date_of_end'];
        $val_date_of_check = $_POST['add_date_of_check'];
		$check->addCheck($val_check_id, $val_student_id, $val_course_number, $val_date_of_start, $val_date_of_end, $val_date_of_check);
	}
	
	if (isset($_POST['change_check'])){
        $val_check_id = $_POST['add_check_id'];
        $val_student_id = $_POST['selected_student_id'];
        $val_course_number = $_POST['selected_course_id'];
        $val_date_of_start = $_POST['add_date_of_start'];
        $val_date_of_end = $_POST['add_date_of_end'];
        $val_date_of_check = $_POST['add_date_of_check'];
		$check->changeCheck($val_check_id, $val_student_id, $val_course_number, $val_date_of_start, $val_date_of_end, $val_date_of_check);
	}
	
	if (isset($_POST['del_check']))
	{
		$val_check_id = $_POST['add_check_id'];
		$check->delCheck($val_check_id);
	}
?>

<script>
	$(document).ready(function(){
		$('table tr').click(function(){

			var check_id_stroke = $(this).find("td").eq(0).html();
			var student_id_stroke = $(this).find("td").eq(1).html();
			var course_number_stroke = $(this).find("td").eq(2).html();
			var date_of_start_stroke = $(this).find("td").eq(3).html();
			var date_of_end_stroke = $(this).find("td").eq(4).html();
            var date_of_check_stroke = $(this).find("td").eq(5).html();

		
			$("input[name=add_check_id]").val(check_id_stroke);

            $("#selected_student_id")[0].value = student_id_stroke;

            $("#selected_course_id")[0].value = course_number_stroke;
			
			$("input[name=add_date_of_start]").val(date_of_start_stroke);
			
			$("input[name=add_date_of_end]").val(date_of_end_stroke);

            $("input[name=add_date_of_check]").val(date_of_check_stroke);
		});
	});
</script>
