<?php
require('../system.php');

if(isset($_POST['login'])){
	
    $username = $_POST['username'];
    $password = $_POST['password'];	
	
	if(empty($username) || empty($password))  {
		$errorMSG = "กรุณาอย่าเว้นช่องว่าง";
	}else{	
	if ($result['success']) {		
        $check_user = "SELECT * FROM member WHERE username = '".$username."'";
        $res = $connect->query($check_user);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
			  if($fetch['active'] == "false"){
				  $errorMSG = "บัญชีของคุณถูกระงับการใช้งาน";
              }else{	
                $query_log = $connect->query("SELECT * FROM member WHERE username = '".$username."'");
                $login = $query_log->fetch_assoc();
                $_SESSION['id'] = $login['id'];				
                $_SESSION['username'] = $username;
                $connect->query("UPDATE member SET ip = '".$_SERVER['REMOTE_ADDR']."' WHERE username = '".$username."'");				
			  }
			}else{
				$errorMSG = "รหัสผ่านไม่ถูกต้อง";
            }
        }else{
			$errorMSG = "ไม่พบชื่อผู้ใช้งานนี้";
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