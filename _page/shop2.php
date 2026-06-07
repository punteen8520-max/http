<?php
	$query2 = $connect->query("SELECT * FROM products WHERE cat = '".$_GET['cat']."'");    
	while($row = $query2->fetch_assoc()){
		
        $stock_price = "฿ ".$row['price'];
		$result = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''")->num_rows;
		$query = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''");
        $result1 = $query->fetch_assoc();
        if ($result1 > 0) {
          $stock_text = $result."";
        }else{
          $stock_text = $result."";
        }
        if ($result1 > 0) {
          $stock_button_text = '<i class="fa fa-shopping-cart hvr-icon"></i> สั่งซื้อเดี๋ยวนี้';
        }else{
          $stock_button_text = "สินค้าหมด";
        }
        if ($result1 > 0) {
          $stock_button = "";
        }else{
          $stock_button = "disabled";
        }
        if ($result1 > 0) {
          $stock_onclick = 'onclick="BuyItem(this)" value="'.$row['id'].'"';
        }else{
          $stock_onclick = "";
        }		
        if ($result1 > 0) {
          $stock_button_disabled = "btn btn-sm web-btn-buy col-12 col-md-5 mb-2 mb-md-0 mr-0 mr-md-2";
        }else{
          $stock_button_disabled = "btn btn-sm web-btn-danger col-12 col-md-5 mb-2 mb-md-0 mr-0 mr-md-2";
        }
if ($_SESSION['username'] == NULL) {		
?>
            <div class="col-12 col-md-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white border-0 h-100">
                  <img src="<?= $url ?>img/<?php echo $row['image']?>" class="card-img-top img-fluid" style="border-top-left-radius: 0.6rem !important;border-top-right-radius: 0.6rem !important;">
                  <div class="card-body">
                    <h5 class="mt-0 mb-2" id="title<?php echo $row['id']; ?>" ><?php echo $row['name']?></h5>
                    <h5 class="mt-0" id="price<?php echo $row['id']; ?>" >ราคา <?=$stock_price?> บาท</h5>
                    <h6 class="mt-0 text-muted">เหลือจำนวน <?=$stock_text?> ไอดี</h6>
                    <div class="row no-gutters ml-auto mr-auto mt-3">
					<button disabled type="button" class="btn btn-sm web-btn-buy col-12 col-md-5 mb-2 mb-md-0 mr-0 mr-md-2"> เข้าสู่ระบบก่อน</button>
                    <button type="button" onclick="PurchaseModal(<?php echo $row['id']; ?>)" class="btn btn-sm web-btn-info col-12 col-md-6"><i class="fal fa-info-circle mr-1"></i>รายละเอียดเพิ่มเติม</button>
                    </div>
                  </div>
                </div>
            </div>
<?php }else{ ?>
            <div class="col-12 col-md-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white border-0 h-100">
                  <img src="<?= $url ?>img/<?php echo $row['image']?>" class="card-img-top img-fluid" style="border-top-left-radius: 0.6rem !important;border-top-right-radius: 0.6rem !important;">
                  <div class="card-body">
                    <h5 class="mt-0 mb-2" id="title<?php echo $row['id']; ?>" ><?php echo $row['name']?></h5>
                    <h5 class="mt-0" id="price<?php echo $row['id']; ?>" >ราคา <?=$stock_price?> บาท</h5>
                    <h6 class="mt-0 text-muted">เหลือจำนวน <?=$stock_text?> ไอดี</h6>
                    <div class="row no-gutters ml-auto mr-auto mt-3">
					<button <?=$stock_button?> type="button" <?=$stock_onclick?> class="<?=$stock_button_disabled?>"><?=$stock_button_text?></button>
                    <button type="button" onclick="PurchaseModal(<?php echo $row['id']; ?>)" class="btn btn-sm web-btn-info col-12 col-md-6"><i class="fal fa-info-circle mr-1"></i>รายละเอียดเพิ่มเติม</button>
                    </div>
                  </div>
                </div>
            </div>
  <?php } } ?>