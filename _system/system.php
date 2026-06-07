<?php
require('setting.php');
require('_database.php');
$errorMSG = "";

    $player_q = $connect->query("SELECT * FROM member where username = '".$_SESSION['username']."'");
    $player = $player_q->fetch_assoc();

	$config_q = $connect->query("SELECT * FROM config");
    $config = $config_q->fetch_assoc();
	
    $website_q = $connect->query("SELECT * FROM website");
    $website = $website_q->fetch_assoc();	

$user = $connect->query("SELECT * FROM member")->num_rows;

$product_r_q = $connect->query("SELECT * FROM products");
$product_row = $product_r_q->num_rows;

$stock_r_q = $connect->query("SELECT * FROM stock WHERE owner=''");
$stock_row = $stock_r_q->num_rows;

$stock1_r_q = $connect->query("SELECT * FROM log_buy");
$stock1_row = $stock1_r_q->num_rows;

$views_q = $connect->query("SELECT * FROM views");
$views = $views_q->fetch_assoc();	
$view_add = $views["view"]+1;
$connect->query("UPDATE views SET view = '".$view_add."'");
	
define('SecretKey', '6LeOlEEeAAAAAOzbDgl3O2uJcH6H4gqO6oIJv4UL');
$query_params = [
	'secret' => SecretKey,
	'response' => filter_input(INPUT_POST, 'rcaptcha'),
	'remoteip' => $_SERVER['REMOTE_ADDR']
];
$url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($query_params);
$result = json_decode(file_get_contents($url), true);

if(isset($_POST['id'])){
		    if ($_SESSION['username'] == NULL) {
			  $errorMSG = 'กรุณาเข้าสู่ระบบก่อนดำเนินการ';
		    }else{	
			$id = $_POST['id'];
			if(empty($id)) {
			  $errorMSG = 'ไม่พบสินค้านี้';
			}
			$query = $connect->query('SELECT * FROM products WHERE id = "'.$id.'"');
			$shop = $query->fetch_assoc();			
			$query2 = $connect->query("SELECT * FROM member WHERE username='".$_SESSION['username']."'");
            $player = $query2->fetch_assoc();
			$query1 = $connect->query('SELECT * FROM stock WHERE type = "'.$shop['id'].'" AND owner="" ORDER BY RAND() LIMIT 1');
			$result = $query1->fetch_assoc();		
			if($query->num_rows == 0) {
			$errorMSG = 'ไม่พบสินค้านี้';
			}	
			if($player['point'] >= $shop['price']) {
				if($result) {
				$date = date('Y-m-d H:i:s');
				$connect->query("UPDATE member SET point = point-'".$shop['price']."' WHERE username = '".$_SESSION['username']."'");
				$connect->query("INSERT INTO log_buy (type, price, user) VALUES ('".$shop['id']."','".$shop['price']."','".$_SESSION['username']."')");
				$connect->query('UPDATE stock SET owner= "'.$_SESSION['username'].'", date= "'.$date.'" WHERE id= "'.$result['id'].'"');
			}else {
				$errorMSG = 'สินค้าหมด';
			   }			
			     }else {
				 $errorMSG = 'ยอดเงินของคุณไม่เพียงพอ';
			}
		}
       if(empty($errorMSG)){
        echo json_encode(['code'=>200,]);
       }else{
        echo json_encode(['code'=>500, 'msg'=>$errorMSG]);
      }		
} 

class classoop{
	
}	
?>