<?php
	$course = new Course();
	$course->showAllCourse();
if($_SESSION['user'] == 'admin') {

echo' <form method="post" name="form1" class="form-main">
	<div class="div-form-main">
		<label for="add_course_id">ID Курса</label>
		<input type="text" name="add_course_id" class="box"><br>
		<label for="add_name_of_course">Название курса</label>
		<input type="text" name="add_name_of_course" class="box"><br>
		<label for="add_cost_of_course">Цена курса</label>
		<input type="text" name="add_cost_of_course" class="box"><br>';
        $course->selectedTeacherId();
		echo'<input type="submit" name="add_course" value="Добавить" class="button box"><br>
		<input type="submit" name="change_course" value="Изменить" class="button box"><br>
		<input type="submit" name="del_course" value="Удалить" class="button box"><br>
		

	</div>
</form>';
}

	if (isset($_POST['add_course']))
	{		
		$val_Course_ID = $_POST['add_course_id'];
		$val_Name_of_course = $_POST['add_name_of_course'];
		$val_Cost_of_course = $_POST['add_cost_of_course'];
		$val_Teacher_ID = $_POST['teacher_name'];
		$course->addCourse($val_Course_ID, $val_Name_of_course, $val_Cost_of_course, $val_Teacher_ID);
	}
	
	if (isset($_POST['change_course'])){
		$val_Course_ID = $_POST['add_course_id'];
		$val_Name_of_course = $_POST['add_name_of_course'];
		$val_Cost_of_course = $_POST['add_cost_of_course'];
		$val_Teacher_ID = $_POST['teacher_name'];
		$course->changeCourse($val_Course_ID, $val_Name_of_course, $val_Cost_of_course, $val_Teacher_ID);
	}
	
	if (isset($_POST['del_course']))
	{
		$val_Course_ID = $_POST['add_course_id'];
		$course->delCourse($val_Course_ID);
	}
?>

<script>
	$(document).ready(function(){
		$('table tr').click(function(){
			var course_id_stroke = $(this).find("td").eq(0).html();
			var name_stroke = $(this).find("td").eq(1).html();
			var cost_stroke = $(this).find("td").eq(2).html();
            var teacher_name_stroke = $(this).find("td").eq(3).html();

			$("input[name=add_course_id]").val(course_id_stroke);

			$("input[name=add_name_of_course]").val(name_stroke);

			$("input[name=add_cost_of_course]").val(cost_stroke.slice(0,cost_stroke.length - 3));

            $("#teacher_name")[0].value = teacher_name_stroke;

		});
	});
</script>
