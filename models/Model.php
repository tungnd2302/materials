
<?php 
	require_once('configs/database.php');
	class model{
		function connection(){
			$conn = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,DBNAME);
			if(!$conn){
				die("Connection fail!. ERROR " . mysqli_error());
			}
			mysqli_set_charset($conn,'UTF8');
			return $conn;
		}
	}
	
?>