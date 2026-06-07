<?php
		$sql_wallet = 'SELECT * FROM wallet_account';
			$query_wallet = $connect->query($sql_wallet);
				$wallet = $query_wallet->fetch_assoc();

if(isset($_POST['redeem'])){
	if (empty($_POST['code'])){
		echo '</body><script>swal("ผิดพลาด" ,"กรุณาอย่าเว้นช่องว่าง!" ,"error",{button:{className:"web-btn-notoutline-danger",},closeOnClickOutside:false,}).then(function(){ window.location = "";});</script>';
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
				echo '</body><script>swal("Redeem Success !!!" ,"แลกคูปองเรียบร้อยแล้ว คุณได้รับ!" ,"success",{button:{className:"web-btn-notoutline-danger",},closeOnClickOutside:false,}).then(function(){ window.location = "";});</script>';
			}
		}else {
			echo '</body><script>swal("ผิดพลาด" ,"โค้ดนี้ถูกใช้ไปเเล้ว หรือ กรอกผิด!" ,"error",{button:{className:"web-btn-notoutline-danger",},closeOnClickOutside:false,}).then(function(){ window.location = "";});</script>';
		}
	 }
  }
   
if(isset($_POST['topup'])){
class topup {
    function giftcode($hash = null,$phone = null) {
        if (is_null($hash) || is_null($phone)) return false;
        $ch = curl_init();
    $hash = explode('?v=',$hash)[1];
        $headers  = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        $postData = [
            'mobile' => $phone,
            'voucher_hash' => $hash
        ];
        curl_setopt($ch, CURLOPT_URL,"https://gift.truemoney.com/campaign/vouchers/$hash/redeem");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt ($ch, CURLOPT_SSLVERSION, 7);
        curl_setopt( $ch, CURLOPT_USERAGENT, "aaaaaaaaaaa" );
        $result     = curl_exec ($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return json_decode($result,true);
    }
}	
	
$tc = new topup();
$vc = (object) $tc->giftcode("$_POST[ref_id]","$wallet[phone]"); 
if($vc->status['code'] != 'ERROR'){
	echo '</body><script> swal("ผิดพลาด","เกิดข้อผิดผลาดกับระบบ โปรดติดต่อผู้ดูแล API!","error").then(function() {window.location = "";});</script>';
}
if($vc->status['code'] != 'SUCCESS'){
	echo '</body><script> swal("ผิดพลาด","ไม่พบซองอังเปาหรือลิงค์ไม่ถูกต้อง!","error").then(function() {window.location = "";});</script>';
}else{
    if($vc->data['voucher']['member'] != "1"){
		echo '</body><script> swal("ผิดพลาด","ผู้รับซองต้องเป็น 1 คนเท่านั้น !!","error").then(function() {window.location = "";});</script>';
    }else{
    $amounts = $vc->data['voucher']['amount_baht'];
    $links = $vc->data['voucher']['link'];
		
    $valueEx = $amounts*$wallet['mutiple'];
	$type = ('เติมเงินด้วย ซองของขวัญ');
	$time_date = date("d-m-Y G:i");
	$status = ('success');
	
    echo '</body><script> swal("เติมเงินเรียบร้อย","[ '.$_SESSION['username'].' ] จำนวน '.$amounts.' ได้รับ '.$valueEx.' พ้อย","success").then(function() {window.location = "";});</script>';
    $connect->query("UPDATE `member` SET `point`=`point`+$valueEx ,`topup`=`topup`+$amounts WHERE `username`='$_SESSION[username]'");
    $connect->query("INSERT INTO topup (TW_id,amount,status,date,type,username) VALUES ('$links', '$amounts', '$status', '$time_date', '$type', '$_SESSION[username]'); ");			
    }
  }	
}
if(isset($_GET['truemoney'])) { 
?> 
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-wallet"></i> การเติมเงิน</h5>
                            <br>
<script type="text/javascript" src='https://www.tmtopup.com/topup/3rdTopup.php?uid=<?php echo $config['tmtopup_uid'] ?>'></script>							
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="h5 my-2">TrueMoney <small>(19.4%)</small></div>
                                <hr>
								<div id="return"></div>		
                                <form name="" method="POST"> 
                                    <div class="form-group">
                                        <label><b>รหัสบัตรทรู 14 หลัก</b></label>
									<?php if ($_SESSION['username'] == NULL) {?>
									    <input disabled type="text" class="form-control" placeholder="รหัสบัตรทรู 14 หลัก" required>
									<?php }else{ ?>
                                         <input disabled type="text" name="tmn_password" id="tmn_password" class="form-control" placeholder="รหัสบัตรทรู 14 หลัก">
                                    <?php } ?>
                                    </div>

                                    <div class="form-group">
									<?php if ($_SESSION['username'] == NULL) {?>
	                                  <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                                <?php }else{ ?>
                                       <input name="ref1" type="hidden" id="ref1" value="<?php echo $_SESSION['id']; ?>" />
                                       <input name="ref2" type="hidden" id="ref2" value="TOPUP_SYSTEM" />
                                       <input name="ref3" type="hidden" id="ref3" value="webshop" />
                                       <button disabled type="button" class="btn btn-outline-danger btn-block" onclick="submit_tmnc()">ปิดปรับปรุง</button>
                                    <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>							
 </div>
</div>								
<?php
}else{
if(isset($_GET['giftcode_topup'])) { 
?> 
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-wallet"></i> การเติมเงิน</h5>
                            <br>				
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="h5 my-2">คูปองเงินสด <small>(ไม่มีค่าธรรมเนียม)</small></div>
                                <hr>
								<div id="return"></div>		
                                <form method="post">
                                    <div class="form-group">
                                        <label><b>คูปองเงินสด</b></label>
									<?php if ($_SESSION['username'] == NULL) {?>
									    <input disabled type="text" class="form-control" placeholder="รหัสคูปองที่ท่านได้มา" required>
									<?php }else{ ?>
                                         <input type="text" name="code" id="code" class="form-control" placeholder="รหัสคูปองที่ท่านได้มา">
                                    <?php } ?>
                                    </div>

                                    <div class="form-group">
									<?php if ($_SESSION['username'] == NULL) {?>
	                                  <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                                <?php }else{ ?>
									  <button type="submit" id="redeem" class="btn btn-outline-success btn-block"><i class="fa fa-check-circle fa-lg"></i>&nbsp; ตรวจสอบ</button>
                                    <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>							
  </div>
</div>							
<?php
}else{
if(isset($_GET['truewalletgift'])) { 
?>  
      <div class="card shadow-dark radius-border">
            <div class="card-body p-0 text-center pt-4">

                  <img src="<?= $url ?>assets/images/tw.png" style="width: 15%;" class="mb-4 pr-4 border-right">
                  <img src="<?= $url ?>assets/images/termwallet.png" style="width: 70%;" class="mb-4 pl-4">


                  <h4>ใส่ลิ้งซองของขวัญ</h4>
                  <h6>คงเหลือ <?php echo number_format($player['point'],2); ?> บาท</h6>
				  <form name="topup" method="POST"> 
					<?php if ($_SESSION['username'] == NULL) {?>
					    <input type="text" class="text-center form-control form-control-sm web-form-control ml-auto mr-auto" placeholder="กรอกลิ้งซองอั่งเปา" style="max-width:350px;width:80%;border: 1px solid #343a40;" autocomplete="off">
					<?php }else{ ?>
                        <input type="text" name="ref_id" class="text-center form-control form-control-sm web-form-control ml-auto mr-auto" placeholder="กรอกลิ้งซองอั่งเปา" style="max-width:350px;width:80%;border: 1px solid #343a40;" required autocomplete="off">
                    <?php } ?>
                  <small id="giftlinkHelp" class="form-text" style="opacity: 0.7;">ตัวอย่างลิ้ง : https://gift.truemoney.com/campaign/?v=cofi9...</small>
				<?php if ($_SESSION['username'] == NULL) {?>
				    <button disabled type="submit" class="btn btn-sm web-btn-success mt-3 ml-auto mr-auto w-100 mb-3" style="max-width:250px;"><i class="far fa-check-circle pr-1 pt-1"></i> เข้าสู่ระบบก่อน</button>
	            <?php }else{ ?>
					<button type="submit" name="topup" class="btn btn-sm web-btn-success mt-3 ml-auto mr-auto w-100 mb-3" style="max-width:250px;"><i class="far fa-check-circle pr-1 pt-1"></i> ตรวจสอบการทำรายการ</button>
                <?php } ?>                  
                  <button type="button" class="btn btn-sm web-btn-primary mt-3 ml-auto mr-auto w-100 mb-3" style="max-width:200px;" data-toggle="modal" data-target="#exampleModalLong">
                        วิธีเติมซองอั่งเปา
                  </button>
                </form>
                  <!-- Modal -->
                  <div class="modal-dialog " style="margin-right: 100px;">
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                </button>
                                          </div>
                                          <div class="modal-body">
                                                <img src="<?= $url ?>assets/images/wallet.png" style="width: 100%;" class="img-responsive">
                                          </div>
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  </br>

            </div>
      </div>						
<?php }else{ ?>		
<script>window.location.href = "<?= $url ?>"</script>
<?php } } }?>		