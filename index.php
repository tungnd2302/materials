<?php 
session_start();
	$controller = isset($_GET['controller']) ? $_GET['controller'] : 'users';
	$action     = isset($_GET['action'])     ? $_GET['action'] : 'list';

	$controller = ucfirst($controller);
	$controllerClass = $controller."Controller";

	$controllerPath = "controllers/$controllerClass.php";

	if(!file_exists($controllerPath)){
		die("Đường dẫn đến controller không tồn tại");
	}

	require_once($controllerPath);

	$object = new $controllerClass;
	if(!method_exists($object, $action)){
		die("Phương thức không tồn tại trong controller");
	}

	$object->$action();
?>