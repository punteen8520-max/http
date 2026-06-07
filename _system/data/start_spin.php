<?php 
require('../system.php');
$use = new classoop;
if (empty($_SESSION['id'])) {
	echo json_encode(array('status'=>"error",'info'=>'กรุณาเข้าสู่ระบบก่อนทำการสุ่ม'));
}else{
	$spin = $use->spin($_POST['id']);
}
?>