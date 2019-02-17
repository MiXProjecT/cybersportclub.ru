<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../controller/login.php");
    exit();
}
?>


<html>

	<head>
		<meta charset="utf-8">
		<title>CybesportSchool Database</title>
		<link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <script src="assets/js/script.js"></script>
		<script src="assets/js/jquery-3.3.1.min.js"></script>


	</head>
<script>

</script>
	<body>
		<?php
			include_once "../sys/core/init.inc.php";					
		?>
		
		<div class = "header">
			<?php
			//include_once "assets/common/header.php";
			?>
		</div>
		<div class="content">
			<div class="tabs-wrapper">
				<div class="tabs-titles-wrap">
                    <img class = "header_img" src="/body_shop/assets/css/img/Logo.png" />
					<div class="tab active">Преподаватели</div>
					<div class="tab">Ученики</div>
                    <div class="tab">Спонсоры</div>
					<div class="tab">Курсы</div>
                    <?php if($_SESSION['user'] == 'admin') {
                    echo '<div class="tab">Чеки</div>';
                    }
                    ?>
                    <a style = "color: white; margin-left: 330px;  text-decoration: none; font-size: 30px" class = "exit" href = "../body_shop/logout.php" >Выйти из <?php echo $_SESSION['user'] ?></a>
				</div>
				<div class="tabs-content-wrap">
					<div class="tab-content active">
						<?php
							include "assets/common/teacher_tab.php";
						?>
					</div>
					<div class="tab-content">
						<?php
							include "assets/common/student_tab.php";
						?>
					</div>
					<div class="tab-content">
						<?php
							include "assets/common/sponsor_tab.php";
						?>
					</div>
					<div class="tab-content">
						<?php
							include "assets/common/course_tab.php";
						?>
					</div>
                    <div class="tab-content">
                        <?php
                            if($_SESSION['user'] == 'admin') {
                                include "assets/common/check_tab.php";
                            }
                        ?>
                    </div>
				</div>
			</div>
		</div>
        <script src="assets/js/script.js"></script>
	</body>
	
</html>
