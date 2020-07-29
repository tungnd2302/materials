<?php 
    require_once('models/Depts.php');
    require_once('models/Users.php');
    require_once('models/Categories.php');
    
    class Validate{
        public static function Store($request,$controllerName){
            if($controllerName == 'depts'){
                $name = $request['name'];
                if(strlen($name) < 10){
                    return 'Tên phòng ban không dưới 10 ký tự';
                }else{
                    $dept = new Depts;
                    $item = $dept->checkUniqueName($request);
                    if(count($item) > 0){
                        return 'Tồn tại phòng ban';
                    }
                }
            }
            //users
            if($controllerName == 'users'){
                $username = $request['username'];
                // username
                if(strlen($username) < 6){
                    return 'Username không dưới 6 ký tự';
                }else{
                    $user = new Users;
                    $item = $user->checkUniqueName($request);
                    if(count($item) > 0){
                        return 'Tồn tại username';
                    }
                }

                if(isset($request['password']) && strlen($request['password']) < 6){
                    return 'Password không dưới 6 ký tự';
                }

                if(isset($request['fullname']) && strlen($request['fullname']) < 10){
                    return 'Fullname không dưới 10 ký tự';
                }
                $typeThumbAccept = ['image/jpeg','image/png'];
                if(!empty($request['thumb']['name'])){
                    if(!in_array($request['thumb']['type'],$typeThumbAccept)){
                        return 'Ảnh tải lên chưa đúng định dạng';
                    }
                }
            }

            if($controllerName == 'categories'){
                $name = $request['name'];
                
                if(strlen($name) < 4){
                    return 'Tên loại vật liệu không dưới 4 ký tự';
                }else{
                    $categories = new Categories;
                    $item = $categories->checkUniqueName($request);
                    if(count($item) > 0){
                        return 'Tồn tại loại vật liệu';
                    }
                }
            }

            if($controllerName == 'products'){
                $name = $request['name'];
                $price = $request['price'];
                $quanlity = $request['quanlity'];
                if(strlen($name) < 4){
                    return 'Tên vật liệu không dưới 4 ký tự';
                }else{
                    $categories = new Categories;
                    $item = $categories->checkUniqueName($request);
                    if(count($item) > 0){
                        return 'Tồn tại vật liệu';
                    }
                }

                $typeThumbAccept = ['image/jpeg','image/png'];
                if(!empty($request['thumb']['name'])){
                    if(!in_array($request['thumb']['type'],$typeThumbAccept)){
                        return 'Ảnh tải lên chưa đúng định dạng';
                    }
                }

                if(!is_numeric($quanlity)){
                    return 'Số lượng nhập phải là số';
                }

                if(!is_numeric($price)){
                    return 'Số lượng nhập phải là số';
                }


            }



            
        }
    }

?>