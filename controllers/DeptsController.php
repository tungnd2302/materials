<?php 
    require_once('controllers/Controller.php');
    require_once('controllers/Validate.php');
    require_once('models/Depts.php');
	class DeptsController extends Controller{
        public $displayName = 'Quản lý phòng ban';
        public $listName = 'Phòng ban';
        public $pathView = 'views/employees/depts/';
        public $controllerName = 'depts';
        public $model;

        public function __construct()
        {
            $this->checkLogin();
            $this->checkAction();
            $this->model = new depts;
        }
        public function list()
        {
            $fieldSearch = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
            $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';
            $enableFilter = (isset($_GET['enable'])) ? $_GET['enable'] : 'all';
            $request = [
                'fieldSearch'   => $fieldSearch,
                'contentSearch' => $contentSearch,
                'enableFilter' => $enableFilter
            ];

            $breadcrumb = "Danh sách";
            $items =  $this->model->getAll($request);
            $counts =  $this->model->countItems($request);
            require_once($this->pathView.'list.php');
        }

        
        public function create(){
            $breadcrumb = "Thêm mới";
            if(isset($_POST['create'])){
                $request = $_POST;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'create.php');
                    return;
                }
                $lastid =  $this->model->store($request,'create');
                header('location:?controller='.$this->controllerName.'&action=list');
                return;
            }
            require_once($this->pathView.'create.php');
        }

        public function update(){
            $request = [
                'id' => $_GET['id']
            ];
            $item =  $this->model->findOne($request);
            $breadcrumb = "Cập nhật";
            if(isset($_POST['update'])){
                $id     = isset($_POST['id']) ? $_POST['id'] : '';
                $request = $_POST;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'update.php');
                    return;
                }
                $lastid =  $this->model->store($request,'update');
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