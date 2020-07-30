<?php 
    require_once('controllers/Controller.php');
    require_once('controllers/Validate.php');
    require_once('models/exports.php');
    require_once('models/products.php');
    require_once('models/export_details.php');
	class ExportsController extends Controller{
        public $displayName = 'Quản lý Xuất hàng';
        public $listName = 'Xuất hàng';
        public $pathView = 'views/exports/exports/';
        public $controllerName = 'exports';
        public $model;

        public function __construct()
        {
            $this->model = new exports;
        }
        public function list()
        {
            $fieldSearch = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
            $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';
            $statusFilter = (isset($_GET['status'])) ? $_GET['status'] : 'all';
            $request = [
                'fieldSearch'   => $fieldSearch,
                'contentSearch' => $contentSearch,
                'enableFilter' => $statusFilter
            ];

            $breadcrumb = "Danh sách";
            $items =  $this->model->getAll($request);
            $counts =  $this->model->countItems($request);
            require_once($this->pathView.'list.php');
        }

        
        public function create(){
            $breadcrumb = "Thêm mới";
            $productsModel = new Products;
            $products = $productsModel->getActiveProducts();
            if(isset($_POST['create'])){
                $request = $_POST;
                $products = array_combine($request['quantity'],$request['name']);
                
                $products_array = [];
                $totalPrice = 0;
                foreach($request['name'] as $key => $name){
                    $product = $productsModel->findProductByName($name);
                    $products_array[$product['id']] = $request['quantity'][$key];
                    $totalPrice += $product['price'] * $request['quantity'][$key];
                }
                // echo $totalPrice;
              
                unset($request['name']);
                unset($request['quantity']);
                unset($request['create']);
                $request['products'] = $products_array;
                $request['price'] = $totalPrice;
                $lastid =  $this->model->store($request,'create');
                $request['lastid'] = $lastid;
                $export_details_model = new Export_details();
                $export_details_model->store($request,'create');
                
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