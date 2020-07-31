<?php 
    require_once('controllers/Controller.php');
    require_once('controllers/Validate.php');
    require_once('models/products.php');
    require_once('models/categories.php');
	class ProductsController extends Controller{
        public $displayName = 'Quản lý vật tư';
        public $listName = 'Vật tư';
        public $pathView = 'views/goods/products/';
        public $controllerName = 'products';
        public $model;

        public function __construct()
        {
            $this->checkLogin();
            $this->model = new products;
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
            // Lấy ra categories có trạng thái là active
            $categoriesModel = new Categories;
            $categories = $categoriesModel->getActiveCategories();

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
            $categoriesModel = new Categories;
            $categories = $categoriesModel->getActiveCategories();

            if(isset($_POST['update'])){
                $id     = isset($_POST['id']) ? $_POST['id'] : '';
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
                    // echo 'ok'; die;
                }
                // echo '<pre>';
                // print_r($request);
                // echo '<pre>';
                // die;
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

        public function ThumbUpload($request){
            $dirUpload ='materials/images/products';
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