<?php 
    require_once('controllers/Controller.php');
    require_once('models/Users.php');
    require_once('models/home.php');
	class DashboardController extends Controller{
        public $pathView = 'views/dashboard/';
        public function __construct()
        {
            $this->checkLogin();
        }
		public function index(){
            require_once($this->pathView.'index.php');
        }

        public function login() {
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$authHomeModel = new home();
                $auth = $authHomeModel->loginAuth($username,md5($password));
                if($auth == '0'){
                    $userModel = new Users;
                    $user_info = $userModel->findUserByUsername($username);
                    $_SESSION['user'] = $user_info;
                    header("location:?controller=dashboard&action=index");
                    exit();
                } 
			}
			require_once($this->pathView."login.php");
		}

		public function logout() {
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				header("location:?controller=dashboard&action=login");
				exit();
			}
		}
    }

?>