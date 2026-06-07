     <div class="card mt-4 shadow-dark radius-border web-bg-white ml-auto mr-auto" style="max-width:500px;">
        <div class="card-body">
          <h4 class="mt-0 mb-4 text-center"><i class="fas fa-sign-in-alt mr-2"></i>เข้าสู่ระบบ</h4> 
        <form method="POST">		  
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-user"></i></span>
            </div>
            <input id="username" type="text" class="form-control form-control-sm web-form-control" placeholder="Username ( ชื่อผู้ใช้งาน )" required>
          </div>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
            </div>
            <input id="password" type="password" class="form-control form-control-sm web-form-control" placeholder="Password ( รหัสผ่าน )" required>
          </div>

           <div class="form-group">
			<div class="row justify-content-center">
			 <div class="g-recaptcha" data-sitekey="6LeOlEEeAAAAALVCmq9mWSG08GKV1BZ7FRklcOK5"></div>
			</div>
		  </div>

          <button type="submit" id="login" class="btn btn-sm web-btn-success my-2 my-sm-0 mr-2 w-100"><i class="fal fa-sign-in-alt mr-1"></i> เข้าสู่ระบบ</button>
		</form>
<a href="resetpassword"><div class="float-right mb-2" style="font-size: 0.9rem;">ลืมรหัสผ่าน ?</div></a>

        </div>
      </div>