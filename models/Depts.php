<?php 
	require_once('models/model.php');
	class Depts extends model{
		public $con;
		public $searchFields = ['name','depts.id'];
		public function __construct()
		{
			$this->con = $this->connection();
		}
        public function getAll($request = null){
			$querySelect = "SELECT * FROM depts";
			if($request['enableFilter'] !== 'all'){
				$querySelect .= ' WHERE	depts.enable = ' . "'". $request['enableFilter'] . "'";
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
			$queryCount = "Select count(depts.enable) as count,depts.enable FROM depts";
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
			$queryCount .= ' GROUP BY depts.enable';
			$count = 0;
			$result = mysqli_query($this->con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$count = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $count;
		}


		public function findOne($request){
			$id = $request['id'];
			$queryGet = "SELECT * FROM depts WHERE id =". $id;
			$result = mysqli_query($this->con,$queryGet);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$item = $itemsArray[0];
			}
			return $item;
		}
		

		public function store($request,$action){
			if($action == 'create'){
				$name = ucfirst($request['name']);
				$enable = $request['enable'];
				$created = date('d-m-Y',time());
				$createdby = "Nguyễn Đức Tùng";
				$queryInsert = "INSERT INTO depts(name,enable,created,createdby) VALUES ('$name','$enable','$created','$createdby')";
				// die($queryInsert);
				$result = mysqli_query($this->con,$queryInsert);
				return $result;
			}

			if($action == 'update'){
				$id = $request['id'];
				$name = ucfirst($request['name']);
				$enable = $request['enable'];
				$name = ucfirst($request['name']);
				$queryUpdate = "UPDATE depts SET name = '$name' , enable = '$enable' where id = $id ";
				$result = mysqli_query($this->con,$queryUpdate);
				return $result;
			}
		}

		public function checkUniqueName($request){
			$name = $request['name'];
			$id   = $request['id'];
			if(empty($id)){
				$queryGet = "SELECT * FROM depts WHERE name ='$name'";
			}else{
				$queryGet = "SELECT * FROM depts WHERE name ='$name' AND id <> $id";
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
			$queryDelete = "DELETE FROM depts WHERE ID =". $id;
			$result = mysqli_query($this->con,$queryDelete);
			return $result;
		}

		public function changeStatus($request){
			$enable = $request['enable'];
			$id   = $request['id'];
			$updateEnable = ($enable == 'active') ? 'inactive' : 'active';
			$queryUpdate = "UPDATE depts SET enable = '$updateEnable' where id = $id ";
			$result = mysqli_query($this->con,$queryUpdate);
			return $result;
		}

		public function getActiveDepts(){
			$querySelect = "SELECT * FROM depts WHERE enable = 'active'";
			$result = mysqli_query($this->con,$querySelect);
			$items = [];
			if(mysqli_num_rows($result) > 0){
				$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $items;
		}


	}
?>