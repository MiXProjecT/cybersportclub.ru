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

	class Student extends DB_Connect {
		
		public function __construct($dbo = NULL, $val_student_id = NULL) {
			parent::__construct($dbo);
		}
		
		public function showAllStudent(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<table>";
			echo "<tr><th>ID</th><th>Ф.И.О</th><th>Адрес</th><th>Телефон</th></tr>";
			foreach($dbo->query('SELECT * FROM student') as $row) {
				echo "<tr class='selected select_name'>";
				echo "<td>".$row['Student_ID']."</td>";
				echo "<td>".$row['Name']."</td>";
				echo "<td>".$row['Address']."</td>";
				echo "<td>".$row['Phone_Number']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		
		public function addStudent($val_student_id, $val_name, $val_address, $val_phone){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try {
				$stmt = $dbo->prepare("INSERT INTO student (Student_ID, Name, Address, Phone_Number) VALUES (?,?,?,?)");
				$stmt -> execute(array($val_student_id, $val_name, $val_address, $val_phone));
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();	
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function delStudent($val_student_id){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
			$delrows=$dbo->exec('DELETE FROM student WHERE Student_ID='. $val_student_id);
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit(); 
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function changeStudent($val_student_id, $val_name, $val_address, $val_phone){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
				$changerows = $dbo->exec("UPDATE student SET Name = '".$val_name."', Address = '".$val_address."', Phone_Number = '".$val_phone."' WHERE Student_ID = ".$val_student_id.";");
			} catch (PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
	}

?>