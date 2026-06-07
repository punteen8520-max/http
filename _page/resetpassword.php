     <div class="card mt-4 shadow-dark radius-border web-bg-white ml-auto mr-auto" style="max-width:500px;">
      <div class="card-body">
        <h4 class="mt-0 mb-4 text-center"><i class="fal fa-key mr-2"></i>เปลี่ยนรหัสผ่าน</h4>
          
        <form method="POST">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-envelope"></i></span>
          </div>
          <input id="email" type="email" class="form-control form-control-sm web-form-control" placeholder="E-mail ( อีเมล )" autocomplete="off" required>
        </div>

        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
          </div>
          <input id="new_password" type="password" class="form-control form-control-sm web-form-control" placeholder="NewPassword ( รหัสผ่านใหม่ )" required>
        </div>

        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text web-bg-dark border-dark"><i class="fal fa-key"></i></span>
          </div>
          <input id="cnew_password" type="password" class="form-control form-control-sm web-form-control" placeholder="Confirm-NewPassword ( ยืนยัน-รหัสผ่านใหม่ )" required>
        </div>

        <center><button id="resetpassword" class="btn btn-sm web-btn-orange w-100" type="submit"><i class="fal fa-key mr-1"></i> เปลี่ยนรหัสผ่าน</button></center>
        </form>
      </div>
      </div>