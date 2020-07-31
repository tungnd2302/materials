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

		public function checkAction(){
			if($_GET['action'] == 'create' && $_SESSION['user']['rolename'] !== 'teamlead'){
				header("location:?controller=dashboard&action=index");
				exit();
			}

			if($_GET['action'] == 'update' && $_SESSION['user']['rolename'] !== 'teamlead'){
				header("location:?controller=dashboard&action=index");
				exit();
			}

			if($_GET['action'] == 'delete' && $_SESSION['user']['rolename'] !== 'teamlead'){
				header("location:?controller=dashboard&action=index");
				exit();
			}

		}
		// public function __construct(){
			
			
		// }   
	}
?>