<?php 
$method=$_GET['method'];
$id=$_GET['id'];
switch ($method) {
	case 'minus':
		$_SESSION['cart'][$id]['sl']-=1;
		if($_SESSION['cart'][$id]['sl']==0){
			unset($_SESSION['cart'][$id]);
		}
		if(empty($_SESSION['cart'])){
			unset($_SESSION['cart']);

		}
		header('location:?controller=giohang');

		break;
		case'add':
		$_SESSION['cart'][$id]['sl']+=1;
		header('location:?controller=giohang');
		break;
		case'del':
		unset($_SESSION['cart'][$id]);
		if (empty($_SESSION['cart'])) {
			unset($_SESSION['cart']);
		}
		header('location:?controller=giohang');
		break;
	
	default:
	header('location:?controller=trangchu');
		break;
}



?>