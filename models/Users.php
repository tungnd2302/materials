<?php 
	require_once('models/model.php');
	require_once('controllers/Validate.php');
	class Users extends model{
		public $con;
		public $searchFields = ['fullname','username','users.id'];
		public function __construct()
		{
			$this->con = $this->connection();
		}
        public function getAll($request = null){
			$con = $this->connection();
			$querySelect = "SELECT username,fullname,
									role as rolename,
									name as deptname,
									users.enable as enable,
									users.created as created,
									users.createdby as createdby,
									users.id as id
							FROM employees 
							LEFT JOIN users ON users.id = employees.userid 
							LEFT JOIN depts ON depts.id = employees.deptid";
			if(!empty($request['fieldSearch'])){
				if($request['fieldSearch'] !== 'all'){
					$querySelect .= ' WHERE	' . $request['fieldSearch'] . ' LIKE "%' . $request['contentSearch'] . '%"';
				}else{
					foreach($this->searchFields as $key => $field){
						if($key == 0){
							$querySelect .= ' WHERE ' . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}else{
							$querySelect .= ' OR ' . $field . ' LIKE "%' . $request['contentSearch'] . '%"';
						}
					}
				}
			}
			// die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$users = [];
			if(mysqli_num_rows($result) > 0){
				$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $users;
		}

		public function countItems(){
			$con = $this->connection();
			$queryCount = "Select count(enable) as count,enable FROM users GROUP BY enable";
			// die($queryCount);
			$result = mysqli_query($this->con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$count = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $count;

		}

		public function findOneUser($request){
			$id = $request['id'];
			$queryGet = "SELECT * FROM users WHERE id =". $id;
			$result = mysqli_query($this->con,$queryGet);
			$item = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$item = $itemsArray[0];
			}
			return $item;
		}

		public function findOneEmployee($request){
			$id = $request['id'];
			$queryGet = "SELECT * FROM employees WHERE userid =". $id;
			$result = mysqli_query($this->con,$queryGet);
			$item = [];
			if(mysqli_num_rows($result) > 0){
				$itemsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$item = $itemsArray[0];
			}
			return $item;
		}
		
		public function store($request,$action){
			if($action == 'create'){
				$username = $request['username'];
				$password = $request['password'];
				$enable = $request['enable'];
				$created = date('d-m-Y',time());
				$createdby = "Nguyễn Đức Tùng";
				$queryInsert = "INSERT INTO users(username,password,enable,created,createdby) VALUES ('$username','$password','$enable','$created','$createdby')";
				$result = mysqli_query($this->con,$queryInsert);
				$last_id = mysqli_insert_id($this->con);
				// die($queryInsert);
				return $last_id;
			}

			if($action == 'update'){
				$id = $request['id'];
				$username = $request['username'];
				$enable = $request['enable'];
				$queryUpdate = "UPDATE users SET username = '$username' , enable = '$enable' where id = $id ";
				$result = mysqli_query($this->con,$queryUpdate);
			// die($queryUpdate);
				return $result;
			}
		}

		public function storeEmployee($request,$action){
			$fullname = $request['fullname'];
			$deptid = $request['deptid'];
			$birthday = $request['birthday'];
			$address = $request['address'];
			$email = $request['email'];
			$thumb = $request['thumb'];
			$role = $request['role'];
			if($action == 'create'){
				$userid = $request['userid'];
				$queryInsert = "INSERT INTO employees(userid,fullname,deptid,birthday,address,email,thumb,role) 
								VALUES ($userid,'$fullname',$deptid,'$birthday','$address','$email','$thumb','$role')";
				$result = mysqli_query($this->con,$queryInsert);
				return $result;
			}

			if($action == 'update'){
				$userid = $request['id'];
				$queryUpdate = "UPDATE employees SET fullname  = '$fullname' , 
												deptid     = '$deptid',
												birthday   = '$birthday',
												address    = '$address',
												email      = '$email',
												thumb      = '$thumb',
												role       = '$role'
								where userid = $userid ";
				$result = mysqli_query($this->con,$queryUpdate);
				// echo $queryUpdate;
				// die;
				return $result;
			}
		}

		public function checkUniqueName($request){
			$username = $request['username'];
			$id   = $request['id'];
			if(empty($id)){
				$queryGet = "SELECT * FROM users WHERE username ='$username'";
			}else{
				$queryGet = "SELECT * FROM users WHERE username ='$username' AND id <> $id";
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
			$queryDelete = "DELETE FROM users WHERE ID =". $id;
			$result = mysqli_query($this->con,$queryDelete);
			return $result;
		}

		public function changeStatus($request){
			$enable = $request['enable'];
			$id   = $request['id'];
			$updateEnable = ($enable == 'active') ? 'inactive' : 'active';
			$queryUpdate = "UPDATE users SET enable = '$updateEnable' where id = $id ";
			$result = mysqli_query($this->con,$queryUpdate);
			return $result;
		}

	}
?>