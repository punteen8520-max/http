<?php
require('../system.php');

if(isset($_POST['redeem'])){
	
	if (empty($_POST['code'])){
		$errorMSG = "กรุณาอย่าเว้นช่องว่าง!";
 	}else if(isset($_POST['code'])){
		$time_date = date("d-m-Y H:i");
		$code = $connect->real_escape_string($_POST['code']);
        $query2 = $connect->query("SELECT * FROM member WHERE username='".$_SESSION['username']."'");
        $player = $query2->fetch_assoc();
		$query = $connect->query('SELECT * FROM redeem WHERE code = "'.$code.'" and status = "UnRedeem" ');
		$code_check = $query->num_rows;
		$cq = $query->fetch_assoc();
		if ($code_check == 1){
			$pt = $player['point'] + $cq['price'];
			$su = $connect->query("UPDATE redeem SET status = 'Redeem' WHERE id = '".$cq['id']."'");
			$up = $connect->query("UPDATE `member` SET `point` = '$pt' WHERE `id` = ".$_SESSION['id']);
			$connect->query("INSERT INTO `topup` (`id`, `type`, `TW_id`, `date`, `amount`, `username`, `status`) VALUES (NULL, 'เติมเงินด้วยคูปอง', '".$_POST['code']."', '".$time_date."', '".$cq['price']."', '".$_SESSION['username']."', 'success'); ");
			if ($su || $up){
				
			}
		}else {
			$errorMSG = "โค้ดนี้ถูกใช้ไปเเล้ว หรือ กรอกผิด!";
		}
	 }
	if(empty($errorMSG)){
        echo json_encode(['code'=>200,]);
    }else{
        echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
    }
 }
?>