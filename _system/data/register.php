<?php
require('../system.php');

if(isset($_POST['register'])){
	if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']))  {
		$errorMSG = "กรุณาอย่าเว้นช่องว่าง";
	}else{	
  if ($result['success']) {	
	if (!preg_match('/^[a-zA-Z0-9\_]*$/', $_POST['username'])) {
		$errorMSG = "ชื่อผู้ใช้ไม่ถูกต้อง ต้องเป็น A-Z 0-9 เท่านั้น !!.";
	}
	if(mb_strlen($_POST['username']) <= 4) {
		$errorMSG = "ชื่อผู้ใช้อย่างน้อย 5 ตัวขึ้นไป !!";
	}
	if(mb_strlen($_POST['username']) >= 25) {
		$errorMSG = "ชื่อผู้ใช้สูงสุด 24 ตัวขึ้นไป !!";
	}
	if(strlen($_POST['password']) <= 4) {
		$errorMSG = "รหัสผ่านอย่างน้อย 5 ตัวขึ้นไป !!";
	}
	if(mb_strlen($_POST['password']) >= 25) {
		$errorMSG = "รหัสผ่านสูงสุด 24 ตัว !!";
	}
	if($_POST['password'] != $_POST['repassword'])  {
		  $errorMSG = "รหัสผ่าน ไม่ตรงกัน !! !!";
        }
        $query_user_reg = $connect->query("SELECT * FROM member WHERE username = '".$_POST['username']."'");
       $reg_user = $query_user_reg->fetch_assoc();
       if ($reg_user) {
		   $errorMSG = "ชื่อผู้ใช้ มีผู้ใช้งานไปแล้ว !!";
        }else{
	   $query_email_reg = $connect->query("SELECT * FROM member WHERE email = '".$_POST['email']."'");
       $reg_email = $query_email_reg->fetch_assoc();		
       if ($reg_email) {
		   $errorMSG = "อีเมลนี้มีผู้ใช้งานไปแล้ว";
        }else{	
          $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $query_reg2 = $connect->query("INSERT INTO member (username,email,ip,password) VALUES ('".$_POST['username']."','".$_POST['email']."','".$_SERVER['REMOTE_ADDR']."','".$password_hash."')");         
        }
	}
	}else{	
	   $errorMSG = "กรุณายืนยันตัวตน";
    }
	
    }
    if(empty($errorMSG)){
        echo json_encode(['code'=>200,]);
    }else{
        echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
    }
  
}
?>