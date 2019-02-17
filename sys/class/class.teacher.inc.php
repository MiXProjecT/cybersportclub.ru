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

	class Teacher extends DB_Connect {
		
		public function __construct($dbo = NULL, $teacher_id = NULL) {
			parent::__construct($dbo);
		}
		
		public function showAllTeacher(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<table>";
			echo "<tr><th>ID</th><th>Ф.И.О</th><th>Специализация</th><th>Адрес</th><th>Телефон</th></tr>";
			foreach($dbo->query('SELECT * FROM teacher') as $row) {
				echo "<tr class='selected select_name'>";
				echo "<td class='id_company_add'>".$row['Full_Name']."</td>";
				echo "<td class='name_teacher_add'>".$row['Teacher_ID']."</td>";
				echo "<td class='driver_license_add'>".$row['Spec']."</td>";
				echo "<td class='address_teacher_add'>".$row['Address']."</td>";
				echo "<td class='phone_teacher_add'>".$row['Phone_Number']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		
		public function addTeacher($teacher_id, $teacher_name, $teacher_spec, $address_teacher, $phone_teacher){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try {
				$stmt = $dbo->prepare("INSERT INTO teacher (teacher_ID, Full_Name, Spec, Address, Phone_Number) VALUES (?,?,?,?,?)");
				$stmt -> execute(array($teacher_name, $teacher_id, $teacher_spec, $address_teacher, $phone_teacher));
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();	
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function delTeacher($teacher_id){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
			$delrows=$dbo->exec('DELETE FROM teacher WHERE Full_Name='. $teacher_id);
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit(); 
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function changeTeacher($val_id ,$val_name, $val_spec, $val_address, $val_phone){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
				$changerows = $dbo->exec("UPDATE teacher SET Teacher_ID = '".$val_name."', Spec = '".$val_spec."', Address = '".$val_address."', Phone_Number = '".$val_phone."' WHERE Full_Name = ".$val_id.";");
			} catch (PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
	}

?>