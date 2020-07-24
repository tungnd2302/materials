<?php 
    require_once('controllers/Controller.php');
    require_once('models/Users.php');
	class DashboardController extends Controller{
		public function index(){
            require_once('views/dashboard/index.php');
        }
	}

?>