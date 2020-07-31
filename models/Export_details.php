<?php 
	require_once('models/model.php');
	class Export_details extends model{
		public $con;
		public $searchFields = ['name','depts.id'];
		public function __construct()
		{
			$this->con = $this->connection();
		}

		public function findOne($request){
			$id = $request['id'];
			$queryGet = "SELECT id,productid,quantity FROM export_details WHERE exportid ='$id'";
			// echo $queryGet;
			// die;
			$result = mysqli_query($this->con,$queryGet);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$items = $itemsArray;
			}
			return $items;
		}
		

		public function store($request,$action){
            $products = $request['products'];
            $len_products = count($products);
            $i = 1;
            $exportid = $request['lastid'];
            // echo '<pre>';
            // print_r($len_products);
            // echo '</pre>';
            // die;

			if($action == 'create'){
                $queryInsert = "INSERT INTO export_details(exportid,productid,quantity) VALUES";
                foreach($products as $productid => $key){
                    $queryInsert .= "('$exportid',$productid,$key)";
                    if($i !== $len_products){
                        $queryInsert .= ' , ';
                    }
                    $i++;
				}
				// echo $queryInsert;
				// die;
				$result = mysqli_query($this->con,$queryInsert);
				return $result;
			}
		}

		public function delete($request){
			$id   = $request['id'];
			$queryDelete = "DELETE FROM exports WHERE ID =". $id;
			$result = mysqli_query($this->con,$queryDelete);
			return $result;
		}
	}
?>