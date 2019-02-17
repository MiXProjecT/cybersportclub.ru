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
	
	class Check extends DB_Connect{
		
		public function __construct($dbo = NULL) {
			parent::__construct($dbo);
		}
		
		public function showAllChecks(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<table>";
			echo "<tr><th>ID</th><th>Ф.И.О. Студента</th><th>Название курса</th><th>Дата начала</th><th>Дата конца</th><th>Дата чека</th><th>Цена</th></tr>";
			foreach($dbo->query('SELECT * FROM checks') as $row) {
				echo "<tr class='selected select_name'>";
				echo "<td>".$row['Check_ID']."</td>";
				echo "<td>".$row['Student_id']."</td>";
				echo "<td>".$row['Course_id']."</td>";
				echo "<td width='100'>".$row['Date_of_start']."</td>";
				echo "<td width='100'>".$row['Date_of_end']."</td>";
                echo "<td width='100'>".$row['Date_of_check']."</td>";
                echo "<td width='100'>".$row['Price']." р.</td>";
				echo "</tr>";
			}
			echo "</table>";
		}

		public function addCheck($val_check_id, $val_student_id, $val_course_number, $val_date_of_start, $val_date_of_end, $val_date_of_check){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try {
                foreach($dbo->query("SELECT Cost_of_course FROM courses WHERE Name_of_course = '$val_course_number'") as $row) {
                     $val_price =  $row['Cost_of_course'];
                }
				$stmt = $dbo->prepare("INSERT INTO checks (Check_ID, Student_ID, Course_ID, Date_of_start, Date_of_end, Date_of_check, Price) VALUES (?,?,?,?,?,?,?)");
				$stmt -> execute(array($val_check_id, $val_student_id, $val_course_number, $val_date_of_start, $val_date_of_end, $val_date_of_check, $val_price));
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function changeCheck($val_check_id, $val_student_id, $val_course_number, $val_date_of_start, $val_date_of_end, $val_date_of_check){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
            foreach($dbo->query("SELECT Cost_of_course FROM courses WHERE Name_of_course = '$val_course_number'") as $row) {
                $val_price =  $row['Cost_of_course'];
            }
			try{
				$changerows = $dbo->exec("UPDATE checks SET Check_ID = '".$val_check_id."', Student_ID = '".$val_student_id."', Course_ID = '".$val_course_number."', Date_of_start = '".$val_date_of_start."', Date_of_end = '".$val_date_of_end."', Date_of_check = '".$val_date_of_check."', Price = '".$val_price."' WHERE Check_ID = ".$val_check_id.";");
							
			} catch (PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function selectedIdStudent(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<label for='selected_student_id'>Ф.И.О. Студента</label>";
			echo "<select id = 'selected_student_id' name='selected_student_id' class='box' required>";
			foreach($dbo->query('SELECT Name FROM student') as $row) {
				echo "<option>".$row['Name']."</option>";
			}
			echo "</select>";
		}

        public function selectedIdCourse(){
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
            $dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
            echo "<label for='selected_course_id'>Название курса</label>";
            echo "<select id = 'selected_course_id' name='selected_course_id' class='box' required>";
            foreach($dbo->query('SELECT Name_of_course FROM courses') as $row) {
                echo "<option>".$row['Name_of_course']."</option>";
            }
            echo "</select>";
        }
		
		public function delCheck($val_check_id){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
			$delrows=$dbo->exec('DELETE FROM checks WHERE Check_ID='. $val_check_id);
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
	}
?>