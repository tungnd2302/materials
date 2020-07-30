<?php 
    require_once('models/model.php');
	class Products extends model{
		public $con;
		public $searchFields = ['name','products.id'];
		public function __construct()
		{
			$this->con = $this->connection();
		}
        public function getAll($request = null){
			$querySelect = "SELECT * FROM products";
			if($request['enableFilter'] !== 'all'){
				$querySelect .= ' WHERE	products.enable = ' . "'". $request['enableFilter'] . "'";
			}
			$nextQuery = ($request['enableFilter'] !== 'all') ? 'AND' : 'WHERE';
			if(!empty($request['fieldSearch'])){
				if($request['fieldSearch'] !== 'all'){
					$querySelect .= " $nextQuery " . $request['fieldSearch'] . ' LIKE "%' . $request['contentSearch'] . '%"';
				}else{
					foreach($this->searchFields as $key => $field){
						if($key == 0){
							$querySelect .= "  $nextQuery ( " . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}else{
							$querySelect .= ' OR ' . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}
					}
					$querySelect .= ' )';

				}
			}
			
			$result = mysqli_query($this->con,$querySelect);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $items;
		}

		public function countItems($request = null){
			$con = $this->connection();
			$queryCount = "Select count(products.enable) as count,products.enable FROM products";
			// if($request['enableFilter'] !== 'all'){
			// 	$queryCount .= ' WHERE	users.enable = ' . "'". $request['enableFilter'] . "'";
			// }
			$nextQuery = ($request['enableFilter'] !== 'all') ? 'AND' : 'WHERE';
			if(!empty($request['fieldSearch'])){
				if($request['fieldSearch'] !== 'all'){
					$queryCount .= " WHERE " . $request['fieldSearch'] . ' LIKE "%' . $request['contentSearch'] . '%"';
				}else{
					foreach($this->searchFields as $key => $field){
						if($key == 0){
							$queryCount .= " WHERE ( " . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}else{
							$queryCount .= ' OR ' . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}
					}
					$queryCount .= ' )';
				}
			}
			$queryCount .= ' GROUP BY products.enable';
			$count = 0;
			$result = mysqli_query($this->con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$count = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $count;
		}


		public function findOne($request){
			$id = $request['id'];
			$queryGet = "SELECT * FROM products WHERE id =". $id;
			$result = mysqli_query($this->con,$queryGet);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$item = $itemsArray[0];
			}
			return $item;
		}
		

		public function store($request,$action){
			$name = ucfirst($request['name']);
			$categoryid = $request['categoryid'];
			$type = $request['type'];
			$suplier = $request['suplier'];
			$quanlity = $request['quanlity'];
			$price = $request['price'];
			$enable = $request['enable'];
			$created = date('d-m-Y',time());
			$createdby = "Nguyễn Đức Tùng";
			if($action == 'create'){
				if(!empty($request['thumb']['filename'])){
					$thumb = $request['thumb']['filename'];
				}
				$queryInsert = "INSERT INTO products(name,type,categoryid,suplier,quanlity,price,enable,thumb,created,createdby) 
											VALUES ('$name','$type','$categoryid','$suplier','$quanlity','$price','$enable','$thumb','$created','$createdby')";
				$result = mysqli_query($this->con,$queryInsert);
				return $result;
			}

			if($action == 'update'){
				$id = $request['id'];
				$queryUpdate = "UPDATE products SET name = '$name' ,
													type = '$type' , 
													categoryid = '$categoryid' , 
													suplier = '$suplier' , 
													quanlity = '$quanlity' , 
													price = '$price',
													enable = '$enable' ";
				if(!empty($request['thumb']['filename'])){
					$queryUpdate .= ", thumb ='". $request['thumb']['filename'] ."' ";
				}
				$queryUpdate .= "where id = $id ";
				// echo $queryUpdate;
				// die;
				$result = mysqli_query($this->con,$queryUpdate);
				return $result;
			}
		}

		public function checkUniqueName($request){
			$name = $request['name'];
			$id   = $request['id'];
			if(empty($id)){
				$queryGet = "SELECT * FROM products WHERE name ='$name'";
			}else{
				$queryGet = "SELECT * FROM products WHERE name ='$name' AND id <> $id";
			}
			$result = mysqli_query($this->con,$queryGet);
			$item = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$item = $itemsArray[0];
			}
			return $item;
		}

		public function delete($request){
			$id   = $request['id'];
			$queryDelete = "DELETE FROM products WHERE ID =". $id;
			$result = mysqli_query($this->con,$queryDelete);
			return $result;
		}

		public function changeStatus($request){
			$enable = $request['enable'];
			$id   = $request['id'];
			$updateEnable = ($enable == 'active') ? 'inactive' : 'active';
			$queryUpdate = "UPDATE products SET enable = '$updateEnable' where id = $id ";
			$result = mysqli_query($this->con,$queryUpdate);
			return $result;
		}

		public function getActiveProducts(){
			$querySelect = "SELECT * FROM products WHERE enable = 'active'";
			$result = mysqli_query($this->con,$querySelect);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $items;
		}

		public function findProductByName($name){
			$querySelect = "SELECT id,price FROM products WHERE name = '" . $name . "' and enable = 'active'";
			$result = mysqli_query($this->con,$querySelect);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			// echo '<pre>';
			// print_r($items[0]);
			// echo '</pre>';
			// die;
			return $items[0];
		}
		


	}
?>