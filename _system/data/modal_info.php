<?php
require('../system.php');
$query1 = $connect->query("SELECT * FROM stock WHERE owner = '".$_SESSION["username"]."' AND id = '".$_GET['id']."'");
    while($product = $query1->fetch_assoc()){
        $item_id = $product['id'];
        $item_type = $product['type'];
        $item_contents = $product['contents'];
        $item_date = $product['date'];
        $item_owner = $product['owner'];
    }		
$query2 = $connect->query("SELECT * FROM products WHERE id = '".$item_type."'");
    while($row = $query2->fetch_assoc()){	
        $product_id = $row['id'];
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_help = $row['help'];
        $product_patt = $row['pattern'];
    }
    if ($product_patt == 'usr:eml:psw') {
        $order_preset = $item_contents;
        $array =  explode(':', $order_preset);
        $order['user'] = array_values($array)[0];
        $order['email'] = array_values($array)[1];
        $order['pass'] = array_values($array)[2];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents .= '<b>Username</b>: '.$order['user'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($product_patt == 'usr:psw') {
        $order_preset = $item_contents;
        $array =  explode(':', $order_preset);
        $order['user'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order_contents = '<b>Username</b>: '.$order['user'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($product_patt == 'eml:psw') {
        $order_preset = $item_contents;
        $array =  explode(':', $order_preset);
        $order['email'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($product_patt == 'code') {
        $order_contents = '<b>Code</b>: ' . $item_contents;
    }elseif ($product_patt == 'normaltext') {
        $order_contents = $item_contents;
    }elseif ($product_patt  == "eml:psw:prf:pin") {
        $order_contents = $item_contents;
        $array =  explode(':', $order_preset);
        $order['email'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order['profile'] = array_values($array)[2];
        $order['pin'] = array_values($array)[3];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents = '<b>Password</b>: '.$order['pass'].'<br>';
        $order_contents = '<b>Profile</b>: '.$order['profile'].'<br>';
        $order_contents = '<b>Pin</b>: '.$order['pin'];
    }
?>
<div id="modalInfo" class="modal fade animated slideIn faster" id="additem" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $product_name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>ข้อมูลสินค้าที่สั่งซื้อ</b><br>
        <?php echo $order_contents ?>
        <br><br><b>คำแนะนำในการใช้งานสินค้า</b><br>
        <?php echo nl2br($product_help) ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>