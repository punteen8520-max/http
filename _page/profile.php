<?php if(!$_SESSION['username']){ ?>
<script>window.location.href = "./"</script>
<?php }else{ ?> 
     <div class="row no-gutters">

        <!-- User Profile -->
        <div class="col-12 col-lg-5 p-2">
          <div class="card text-center web-bg-white shadow-dark radius-border p-4 h-100">
            <img src="assets/images/logoani_236x236.jpg" width="99px" class="img-fluid rounded-circle ml-auto mr-auto mb-3">
            <font class="text-muted">Username</font>
            <h5><b><?php echo $_SESSION['username'] ?></b></h5>
            <font class="text-muted">ยอดเงิน คงเหลือ</font>
            <h5><b><?php echo number_format($player['point'],2); ?> บาท</b></h5>
            <font class="text-muted">E-mail</font>
            <h5><b>****<?= substr($player['email'],strlen($player['email'])/2 - 4); ?></b></h5>
          </div>
        </div>
		
        <div class="col-12 col-lg-7 p-2">
          <div class="card web-bg-white shadow-dark radius-border p-4 h-100">
          <div class="card-body">

            <h4 class="mt-0 mb-4 text-center"><i class="fal fa-key mr-2"></i>เปลี่ยนรหัสผ่าน</h4>
          
            <form method="POST">
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
              </div>
              <input id="password_old" type="password" class="form-control form-control-sm web-form-control" placeholder="Password ( รหัสผ่านเก่า )" autocomplete="off" required>
            </div>
  
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
              </div>
              <input id="password_new" type="password" class="form-control form-control-sm web-form-control" placeholder="NewPassword ( รหัสผ่านใหม่ )" required>
            </div>

            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
              </div>
              <input id="repassword_new" type="password" class="form-control form-control-sm web-form-control" placeholder="Confirm-NewPassword ( ยืนยัน-รหัสผ่านใหม่ )" required>
            </div>
  
            <div class="form-group">
			 <div class="row justify-content-center">
			    <div class="g-recaptcha" data-sitekey="6LeOlEEeAAAAALVCmq9mWSG08GKV1BZ7FRklcOK5"></div>
			 </div>
		    </div>  
  
            <center><button type="submit" id="resetpassword" class="btn btn-sm web-btn-orange w-100" type="submit"><i class="fal fa-key mr-1"></i> เปลี่ยนรหัสผ่าน</button></center>
            </form>

          </div>
          </div>
        </div>
      </div>	  
<?php } ?>	  