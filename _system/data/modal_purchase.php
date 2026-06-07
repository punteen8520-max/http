<?php
require('../system.php');
$query3 = $connect->query("SELECT * FROM products WHERE id = '".$_GET['id']."'");
    while($row = $query3->fetch_assoc()){
			$product_id = $row['id'];
			$product_name = $row['name'];
			$product_desc = $row['description'];
			$product_img = $row['image'];
			$product_price = $row['price'];
			$product_help = $row['help'];
			$product_patt = $row['pattern'];
    }	
		    $result1 = $connect->query("SELECT * FROM stock WHERE type = '".$product_id."' AND owner = ''")->num_rows;
		    $query = $connect->query("SELECT * FROM stock WHERE type = '".$product_id."' AND owner = ''");
			$result = $query->fetch_assoc();
            if ($result > 0) {
            $stock_text = "<i class='fa fa-shopping-basket'></i> สินค้าเหลือ $result1 ชิ้น";
            }else{
            $stock_text = "<i class='fa fa-shopping-basket'></i> สินค้าหมด";
            }			
			$stock = $result;
?>
<div id="modalPurchase" class="modal fade animated slideIn faster" id="additem" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $product_name?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- <img src="<?=$product_img?>" alt="<?php echo $product_name?>" style="height:245px;" class="card-img-top"> -->
			<div class="modal-body">
				<strong>ราคา <?=$product_price?> บาท</strong>
				<br>
				<br>
				<h5 style="color: rgb(206, 0, 0);font-family: 'Kanit', sans-serif;">คำเตือน : อ่านทั้งหมดให้จบก่อน แล้วค่อยกดซื้อหรือสอบถาม </h5>
				<?php echo nl2br($product_desc); ?>
			</div>
			<div class="modal-footer">
				<span class="mr-auto text-muted"><?php echo $stock_text; ?></span>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
		</div>
	</div>
</div>
</div>