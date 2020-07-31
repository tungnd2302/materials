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
            $this->checkLogin();
            $this->model = new users;
        }
		public function list(){
            $fieldSearch = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
            $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';
            $enableFilter = (isset($_GET['enable'])) ? $_GET['enable'] : 'all';
            $request = [
                'fieldSearch'   => $fieldSearch,
                'contentSearch' => $contentSearch,
                'enableFilter' => $enableFilter
            ];
            $breadcrumb  = "Danh sách";
            $items =  $this->model->getAll($request);
            $counts =  $this->model->countItems($request);
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
                $upload = $_FILES['thumb'];
                $request['thumb'] = $upload;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'create.php');
                    return;
                }
                if(!empty($request['thumb']['name'])){
                    $filename = $this->ThumbUpload($request);
                    $request['thumb']['filename'] = $filename;
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
                $upload = $_FILES['thumb'];
                $request['thumb'] = $upload;
                $fault = Validate::store($request,$this->controllerName);
                if(!empty($fault)){
                    $_SESSION['error'] = $fault;
                    require_once($this->pathView.'update.php');
                    return;
                }
                if(!empty($request['thumb']['name'])){
                    $filename = $this->ThumbUpload($request);
                    $request['thumb']['filename'] = $filename;
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

        public function resetPassword(){
            $breadcrumb  = "Cập nhật mật khẩu";
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
                    require_once($this->pathView.'reset.php');
                    return;
                }
                $this->model->resetPassword($request);
                header('location:?controller='.$this->controllerName.'&action=list');
                return;
            }
            
            require_once($this->pathView.'reset.php');
        }

        public function ThumbUpload($request){
            $dirUpload ='materials/images/users';
            $avatarArr      = $request['thumb'];
            $absolutePathUpload = __DIR__."/../assets/".$dirUpload;
            if(!file_exists($absolutePathUpload)){
                mkdir($absolutePathUpload);
            }

            $fileName = time() . $avatarArr['name'];
            move_uploaded_file($avatarArr['tmp_name'], $absolutePathUpload .'/'. $fileName);    
            return $fileName;
        }
	}

?>