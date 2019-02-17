<?php
	$sponsor = new Sponsor();
	$sponsor->showAllSponsors();
?>
<?php
if($_SESSION['user'] == 'admin') {
    echo '<form method = "post" name = "form1" class="form-main" >
	<div class="div-form-main" >
		<label for="sponsor_id" > ID Спонсора </label >
		<input type = "text" name = "sponsor_id" class="box" ><br >
		<label for="director_name" > Ф . И . О Директора </label >
		<input type = "text" name = "director_name" class="box" ><br >
        <label for="firm_name" > Название фирмы </label >
        <input type = "text" name = "firm_name" class="box" ><br >
        <label for="sponsor_address" > Адрес</label >
        <input type = "text" name = "sponsor_address" class="box" ><br >
		<label for="sponsor_phone" > Телефон</label >
		<input type = "text" name = "sponsor_phone" id = "id_sponsor_phone"  class="box" ><br >
		<label for="add_count_of_money" > Сумма взноса </label >
        <input type = "text" id = "id_add_count_of_money" name = "add_count_of_money" class="box" ><br >
		<input type = "submit" name = "add_sponsor" value = "Добавить" class="button box" ><br >
		<input type = "submit" name = "change_sponsor" value = "Изменить" class="button box" ><br >
		<input type = "submit" name = "del_sponsor" value = "Удалить" class="button box" ><br >
		

	</div >
</form >';
}

	if (isset($_POST['add_sponsor']))
	{		
		$val_sponsor_id = $_POST['sponsor_id'];
		$val_director_name = $_POST['director_name'];
        $val_firm_name = $_POST['firm_name'];
		$val_sponsor_address = $_POST['sponsor_address'];
		$val_sponsor_phone = $_POST['sponsor_phone'];
		$val_sponsor_money = $_POST['add_count_of_money'];

		$sponsor->addSponsor($val_sponsor_id, $val_director_name, $val_firm_name,$val_sponsor_address, $val_sponsor_phone, $val_sponsor_money);
	}
	
	if (isset($_POST['change_sponsor'])){

		$val_sponsor_id = $_POST['sponsor_id'];
		$val_director_name = $_POST['director_name'];
		$val_sponsor_address = $_POST['sponsor_address'];
        $val_firm_name = $_POST['firm_name'];
		$val_sponsor_phone = $_POST['sponsor_phone'];
		$val_sponsor_money = $_POST['add_count_of_money'];

		$sponsor->changeSponsor($val_sponsor_id, $val_director_name,$val_firm_name, $val_sponsor_address, $val_sponsor_phone, $val_sponsor_money);
	}
	
	if (isset($_POST['del_sponsor']))
	{
		$val_sponsor_id = $_POST['sponsor_id'];
		$sponsor->delSponsor($val_sponsor_id);
	}
?>

<script>
	$(document).ready(function(){
		$('table tr').click(function(){
			var sponsor_id_stroke = $(this).find("td").eq(0).html();
			var sponsor_name_stroke = $(this).find("td").eq(1).html();
            var firm_name_stroke = $(this).find("td").eq(2).html();
            var address_name_stroke = $(this).find("td").eq(3).html();
			var sponsor_phone_stroke = $(this).find("td").eq(4).html();
            var sponsor_money_stroke = $(this).find("td").eq(5).html();

		
			$("input[name=sponsor_id]").val(sponsor_id_stroke);
						
			$("input[name=director_name]").val(sponsor_name_stroke);

            $("input[name=firm_name]").val(firm_name_stroke);

            $("input[name=sponsor_address]").val(address_name_stroke);

			$("input[name=sponsor_phone]").val(sponsor_phone_stroke);

            $("input[name=add_count_of_money]").val(sponsor_money_stroke);
		});
	});

</script>
