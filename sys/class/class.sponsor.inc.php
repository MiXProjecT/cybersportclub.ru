<?php
	include_once '../sys/config/db-cred.inc.php';
	include_once "../sys/core/init.inc.php";
	
	class Sponsor extends DB_Connect{
		
		public function __construct($dbo = NULL) {
			parent::__construct($dbo);
		}
		
		public function showAllSponsors(){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			echo "<table>";
			echo "<tr><th>ID</th><th>Ф.И.О. Директора</th><th>Название фирмы спонсора</th><th>Адрес</th><th>Телефон</th><th>Сумма взноса</th></tr>";
			foreach($dbo->query('SELECT * FROM sponsor') as $row) {
				echo "<tr class='selected select_name'>";
				echo "<td>".$row['Sponsor_ID']."</td>";
				echo "<td width='900'>".$row['Director_Name']."</td>";
                echo "<td> ".$row['Firm_Name']."</td>";
                echo "<td width='300'>".$row['Address']."</td>";
				echo "<td>".$row['Phone_Number']."</td>";
				echo "<td width='200'> ".$row['Count_of_Money']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		
		public function addSponsor($val_sponsor_id, $val_director_name, $val_firm_name, $val_sponsor_address, $val_sponsor_phone, $val_sponsor_money){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try {
				$stmt = $dbo->prepare("INSERT INTO sponsor (Sponsor_ID, Director_Name, Firm_Name, Address, Phone_Number, Count_of_Money) VALUES (?,?,?,?,?,?)");
				$stmt -> execute(array($val_sponsor_id, $val_director_name, $val_firm_name, $val_sponsor_address, $val_sponsor_phone, $val_sponsor_money));
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
		public function changeSponsor($val_sponsor_id, $val_director_name, $val_firm_name, $val_sponsor_address, $val_sponsor_phone, $val_sponsor_money){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
				$changerows = $dbo->exec("UPDATE sponsor SET Sponsor_ID = '".$val_sponsor_id."', Director_Name = '".$val_director_name."', Firm_Name = '".$val_firm_name."', Address = '".$val_sponsor_address."', Phone_Number = '".$val_sponsor_phone."', Count_of_Money = '".$val_sponsor_money."' WHERE Sponsor_ID = ".$val_sponsor_id.";");
							
			} catch (PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}

		
		
		public function delSponsor($val_sponsor_id){
			$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
			$dbo = new PDO ($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES  'utf8'"));
			try{
			$delrows=$dbo->exec('DELETE FROM sponsor WHERE Sponsor_ID='. $val_sponsor_id);
			} catch(PDOException $e){
				echo 'Error : '.$e->getMessage();
				exit();
			}
			echo'<META HTTP-EQUIV=Refresh Content="0;URL=index.php">';
		}
		
	}
?>