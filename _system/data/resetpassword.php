<?php
require('../system.php');

if(isset($_POST['resetpassword'])){
	
	    $password_old = $_POST["password_old"];
		$password_new = $_POST['password_new'];
        $repassword_new = $_POST['repassword_new'];	
	
	if(empty($password_old) || empty($password_new) || empty($repassword_new))  {
		$errorMSG = "กรุณาอย่าเว้นช่องว่าง";
	}else{
	if ($result['success']) {			
        if($password_new !== $repassword_new){
			$errorMSG = "รหัสผ่านไม่ตรงกัน!";
        }else{
		if(password_verify($password_old, $player["password"])){	
                $encpass = password_hash($password_new, PASSWORD_BCRYPT);
                $update_pass = "UPDATE member SET password = '".$encpass."' WHERE username = '".$_SESSION['username']."'";
                $run_query = $connect->query( $update_pass);
                if($run_query){
				
                }else{
				    $errorMSG = "ไม่สามารถเปลี่ยนรหัสผ่านของคุณ!!";
                }
		    }else{
			    $errorMSG = "รหัสผ่านเก่าไม่ถูกต้อง";
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