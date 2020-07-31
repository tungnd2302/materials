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
            $this->checkLogin();
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
                    // echo '<pre>';
                    // print_r($product);
                    // echo '<pre>';
                    // die;
                    // ========== VALIDATE Tên sản phẩm ==========
                    if($product == "Not Found"){
                        $_SESSION['error'] = "Sản phẩm " . $name . " không tồn tại trong hệ thống";
                        $products = $productsModel->getActiveProducts();
                        require_once($this->pathView.'create.php');
                        return;
                    }
                    // ========== PASS VALIDATE ==============

                    // Tính tổng giá
                    // $request['quantity'][$key] : Số lượng
                    // $product['price']          : Giá sản phẩm
                    $products_array[$product['id']] = $request['quantity'][$key];
                    $totalPrice += $product['price'] * $request['quantity'][$key];
                    // Trừ số lượng trong kho
                    // remainProductQuanlity : Số lượng còn lại ở trong kho là: 
                    $remainProductQuanlity = $product['quanlity'] - $request['quantity'][$key];

                    // ========== VALIDATE SỐ LƯỢNG ==========
                    if($remainProductQuanlity < 0){
                        $_SESSION['error'] = "Số lượng mua của sản phẩm " . $name . " đã nhiều hơn số lượng trong kho";
                        $products = $productsModel->getActiveProducts();
                        require_once($this->pathView.'create.php');
                        return;
                    }
                    // ========== PASS VALIDATE ==============
                    $myRequest = [
                        'id' => $product['id'],
                        'quanlity' => $remainProductQuanlity
                    ];
                    $productsModel->updateAfterGetProduct($myRequest);
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

                // $productsModel->getProductsByQuanlity($request);
                
                header('location:?controller='.$this->controllerName.'&action=list');
                return;
            }
            require_once($this->pathView.'create.php');
        }

        public function view(){
            $breadcrumb = "Chi tiết đơn hàng";
            $request['id'] = $_GET['id'];
            $export_details_model = new Export_details();
            $product_info = $export_details_model->findOne($request);
            $item         = $this->model->findOne($request);

            $productsModel = new Products;
            // $productArr = [];
            $export_total = 0;
            foreach($product_info as $key => $value){
                $request['id'] = $value['productid'];
                $product = $productsModel->findOne($request);
                $productArr[$key]['product_name'] = $product['name'];
                $productArr[$key]['category_name'] = $product['category_name'];
                $productArr[$key]['price'] = $product['price'];
                $productArr[$key]['quantity'] = $value['quantity'];
                $productArr[$key]['total'] = $value['quantity'] * $product['price'];
                $export_total += $value['quantity'] * $product['price'];
            }
            $productArr[$key]['export_total'] = $export_total;
            
            require_once($this->pathView.'view.php');
        }

	}

?>