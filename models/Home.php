<?php 
	require_once('models/model.php');
	require_once('models/users.php');
	class Home extends model{
		public function loginAuth($username,$password){
            $con = $this->connection();
			$querySelect = "SELECT username,password,enable FROM users where username = '$username' and password = '$password'";
			$result = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) < 1){
				return 'Sai tên đăng nhập hoạt mật khẩu';
            }
            $auth = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if($auth[0]['enable'] == 'active'){
                return 0;
            }else{
                return 'Tài khoản đã bị khóa';
            }
        }


	}
?>