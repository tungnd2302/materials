<?php 
	class Controller {
		public function checkLogin(){
			if(!isset($_SESSION['user']) && $_GET['action'] != 'login'){
				// die('Không tồn tại');
				header("location:?controller=dashboard&action=login");
				exit();
			}

			// Đã đăng nhập rồi mà cứ thứ login mới chịu cơ
			if(isset($_SESSION['user']) && $_GET['action'] == 'login'){
				header("location:?controller=dashboard&action=index");
				exit();
			}
		}

		public function checkInsert(){
			$_SESSION['user']['rolename'] == 'teamlead';
		}
		// public function __construct(){
			
			
		// }   
	}
?>