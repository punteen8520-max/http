<?php if(!$_SESSION['username']){ ?>
      <div class="card mt-4 shadow-dark radius-border web-bg-white ml-auto mr-auto" style="max-width:500px;">
        <div class="card-body">
          <h4 class="mt-0 mb-4 text-center"><i class="fal fa-user-plus mr-2"></i>สมัครสมาชิก</h4>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-user"></i></span>
            </div>
            <input id="username" type="text" class="form-control form-control-sm web-form-control" placeholder="Username ( ชื่อผู้ใช้งาน )" required autocomplete="off">
          </div>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
            </div>
            <input id="password" type="password" class="form-control form-control-sm web-form-control" placeholder="Password ( รหัสผ่าน )" required autocomplete="off">
          </div>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
            </div>
            <input id="repassword" type="password" class="form-control form-control-sm web-form-control" placeholder="Confirm-Password ( ยืนยัน-รหัสผ่าน )" required autocomplete="off">
          </div>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-envelope"></i></span>
            </div>
            <input id="email" type="email" class="form-control form-control-sm web-form-control" placeholder="E-mail ( อีเมล )" required>
          </div>
		  
          <div class="form-group">
			<div class="row justify-content-center">
				<div class="g-recaptcha" data-sitekey="6LeOlEEeAAAAALVCmq9mWSG08GKV1BZ7FRklcOK5"></div>
			</div>
		  </div>		  

          <button id="register" class="btn btn-sm web-btn-orange my-2 my-sm-0 mr-2 w-100" type="button"><i class="fal fa-user-plus mr-1"></i> สมัครสมาชิก</button>

        </div>
      </div>
<?php }else{ ?> 
<script>window.location.href = "./"</script>
<?php } ?>