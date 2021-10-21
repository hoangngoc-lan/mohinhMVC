<?php
if(isset($_POST['btn_xacnhan'])){
	$full_name = $_POST['full_name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];


	$oder_id=1;
	$data_oder=$db->get('oder',array());
	foreach ($data_oder as $key => $value) {
		$oder_id+=$value['id'];
	}
	foreach ($_SESSION['cart'] as $key => $value) {
		$db->insert('oder_detail',array(
			'oder_id'=>$oder_id,
			'product_id'=>$value['id'],
			'qty'=>$value['sl'],
			'price_sale'=>$value['price_sale'],
			'amount'=>$value['sl']*$value['price_sale']
		));
		// code...
	}
$data_oder_detail=$db->get('oder_detail',array('oder_id'));
 $amount=0;
 foreach ($data_oder_detail as $key => $value) {
 	$amount+=$value['amount'];
 	// code...
 }
$db->insert('oder',array(
	'id'=>$oder_id,
	'full_name'=>$full_name,
	'address'=>$address,
	'phone'=>$phone,
	'amount'=>$amount,
	'status'=>0


));


}
require_once('./view/V_thanhtoan.php');


?>