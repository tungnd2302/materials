<?php 
    require_once('controllers/Controller.php');
    require_once('models/Users.php');
    require_once('models/Depts.php');
	class UsersController extends Controller{
        public $displayName = 'Quản lý nhân sự';
        public $listName = 'Nhân sự';
        public $pathView = 'views/employees/users/';
        public $controllerName = 'users';
        public $model;
        public function __construct()
        {
            $this->model = new users;
        }
		public function list(){
            $fieldSearch = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
            $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';
            $request = [
                'fieldSearch' => $fieldSearch,
                'contentSearch' => $contentSearch
            ];
            $breadcrumb  = "Danh sách";
            $items =  $this->model->getAll($request);
            $counts =  $this->model->countItems();
            // echo '<pre>';
            // print_r($counts);
            // echo '<pre>';
            // die;
            require_once($this->pathView.'list.php');
        }

        public function create(){
            $breadcrumb  = "Thêm mới";
            $deptModel = new Depts();
            $depts = $deptModel->getActiveDepts();
            if(isset($_POST['create'])){
                $request = $_POST;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'create.php');
                    return;
                }
                $lastid =  $this->model->store($request,'create');
                $request['userid'] = $lastid;
                $lastid =  $this->model->storeEmployee($request,'create');
                header('location:?controller='.$this->controllerName.'&action=list');
                return;
            }
            
            require_once($this->pathView.'create.php');
        }

        public function update(){
            $breadcrumb  = "Cập nhật";
            $deptModel = new Depts();
            $depts = $deptModel->getActiveDepts();
            
            $request = [
                'id' => $_GET['id']
            ];
            $user =  $this->model->findOneUser($request);
            $employee =  $this->model->findOneEmployee($request);
            if(isset($_POST['update'])){
                $request = $_POST;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'update.php');
                    return;
                }
                $this->model->store($request,'update');
                $this->model->storeEmployee($request,'update');
                header('location:?controller='.$this->controllerName.'&action=list');
                return;
            }
            
            require_once($this->pathView.'update.php');
        }
        public function delete(){
            $id     =   $_GET['id'];
            $request = [
                'id'     => $id
            ];
            $item =  $this->model->delete($request);
            header('location:?controller='.$this->controllerName.'&action=list');
            return;
        }

        public function changeStatus(){
            $id     =   $_GET['id'];
            $enable     =   $_GET['enable'];
            $request = [
                'id'     => $id,
                'enable'     => $enable,
            ];
            $item =  $this->model->changeStatus($request);
            header('location:?controller='.$this->controllerName.'&action=list');
            return;
        }
	}

?>