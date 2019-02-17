<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../controller/login.php");
    exit();
}
?>
<?php
	include_once '../sys/config/db-cred.inc.php';
	include_once "../sys/core/init.inc.php";
	
	class Course extends DB_Connect{
		
		public function __construct($dbo = NULL) {
			parent::__construct($dbo);
		}
		
		public function showAllCourse(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<table>";
			echo "<tr><th>ID</th><th>Название курса</th><th>Цена</th><th>Ф.И.О. Преподавателя</th></tr>";
			foreach($dbo->query('SELECT * FROM courses' ) as $row) {
				echo "<tr class='selected select_name'>";
				echo "<td>".$row['Course_ID']."</td>";
				echo "<td>".$row['Name_of_course']."</td>";
				echo "<td>".$row['Cost_of_course']." р.</td>";
				echo "<td>".$row['Teacher_ID']."</td>";
				echo "</tr>";
			}
			
			echo "</table>";
		}
		
		public function selectedTeacherID(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<label for='teacher_name'>Ф.И.О. Преподавателя</label>";
			echo "<select id = 'teacher_name' name='teacher_name' class='box' required>";
			foreach($dbo->query('SELECT teacher_ID FROM teacher') as $row) {
				echo "<option>".$row['teacher_ID']."</option>";
			}
			echo "</select>";
		}
		
		public function addCourse($val_Course_ID, $val_Name_of_course, $val_Cost_of_course, $val_Teacher_ID){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try {
				$stmt = $dbo->prepare("INSERT INTO courses (Course_ID, Name_of_course, Cost_of_course, Teacher_ID) VALUES (?,?,?,?)");
				$stmt -> execute(array($val_Course_ID,$val_Name_of_course,$val_Cost_of_course,$val_Teacher_ID ));
			}
			catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
            echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}

		public function changeCourse($val_Course_ID, $val_Name_of_course, $val_Cost_of_course, $val_Teacher_ID){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
				$changerows = $dbo->exec("UPDATE courses SET Name_of_course = '".$val_Name_of_course."', Cost_of_course = '".$val_Cost_of_course."', Teacher_ID = '".$val_Teacher_ID."' WHERE Course_ID = ".$val_Course_ID.";");
                $chanows = $dbo->exec("UPDATE checks SET Price = '$val_Cost_of_course' WHERE Course_ID = '$val_Name_of_course';");
			} catch (PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		
		
		public function delCourse($val_Course_ID){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
			$delrows=$dbo->exec('DELETE FROM courses WHERE Course_ID='. $val_Course_ID);
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
	}
?>