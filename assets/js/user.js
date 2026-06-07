     $('#login').click(function(login){
        login.preventDefault();
		
        var login = $("#login").val();
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
      
              type: "POST",
              url: "../_system/data/login.php",
              dataType: "json",
              data: {
				  login:login,
                  username: username,
                  password: password,
                  rcaptcha: grecaptcha.getResponse(),			  
			  },
      
              beforeSend: function() {				  
              swal({icon: 'info',title: 'Loading..',text: "กรุณารอสักครู่!",button:false,closeOnClickOutside:false,});    
              
			  },
      
              success : function(data){
              setTimeout(function() {
                  if (data.code == "200"){
                      swal("เข้าสู่ระบบ สำเร็จ!", "ระบบกำลังพาท่านไป...", "success",{button:false,closeOnClickOutside:false,});
                      setTimeout(function(){ window.location.href = './';}, 1500);
                  } else {
					  grecaptcha.reset()
                      swal(data.msg ,"" ,"error",{button:{className:'web-btn-notoutline-danger',},closeOnClickOutside:false,});
                  }
              }, 1500);
              }
      
        });
      
   });

$('#register').click(function(register){
        register.preventDefault();
      
        var register = $("#register").val();
		var username = $("#username").val();
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        var email = $("#email").val();

        $.ajax({
      
              type: "POST",
              url: "../_system/data/register.php",
              dataType: "json",
              data: {
				 register:register,
				 username:username,
				 password:password,
				 repassword:repassword,
				 email:email,
				 rcaptcha: grecaptcha.getResponse(),
				 },
      
              beforeSend: function() {				  
              swal({icon: 'info',title: 'Loading..',text: "กรุณารอสักครู่!",button:false,closeOnClickOutside:false,});    
              
			  },
      
              success : function(data){
              setTimeout(function() {
                  if (data.code == "200"){
                      swal("สมัครสมาชิก สำเร็จ!", "ระบบกำลังพาท่านไป...", "success",{button:false,closeOnClickOutside:false,});
                      setTimeout(function(){ window.location.href="./login";}, 1500);
                  } else {
                      swal(data.msg ,"" ,"error",{button:{className:'web-btn-notoutline-danger',},closeOnClickOutside:false,});
                  }
              }, 1500);
            }
        });  
    });  

$('#resetpassword').click(function(resetpassword){
      resetpassword.preventDefault();

      var resetpassword = $("#resetpassword").val();
	  var password_old = $("#password_old").val();
      var password_new = $("#password_new").val();
      var repassword_new = $("#repassword_new").val();
      $.ajax({

              type: "POST",
              url: "../_system/data/resetpassword.php",
              dataType: "json",
              data: {
				resetpassword:resetpassword,  
			    password_old:password_old,
			    password_new:password_new,
				repassword_new:repassword_new,
				rcaptcha: grecaptcha.getResponse(),
				},

              beforeSend: function() {				  
              swal({icon: 'info',title: 'Loading..',text: "กรุณารอสักครู่!",button:false,closeOnClickOutside:false,});    
              
			  },

              success : function(data){
              setTimeout(function() {
                  if (data.code == "200"){
                      swal("เปลี่ยนรหัสผ่าน สำเร็จ!", "ระบบกำลังพาท่านไป...", "success",{button:false,closeOnClickOutside:false,});
                      setTimeout(function(){ window.location.href="../?page=logout";}, 2000);
                  } else {
                      swal(data.msg ,"" ,"error",{button:{className:'web-btn-notoutline-danger',},closeOnClickOutside:false,});
                  }
              }, 2000);
            }
        });
    });

$('#redeem').click(function(redeem){
      redeem.preventDefault();

      var redeem = $("#redeem").val();
	  var code = $("#code").val();
      $.ajax({

              type: "POST",
              url: "../_system/data/redeem.php",
              dataType: "json",
              data: {
				redeem:redeem,  
			    code:code,
				},

              beforeSend: function() {				  
              swal({icon: 'info',title: 'Loading..',text: "กรุณารอสักครู่!",button:false,closeOnClickOutside:false,});    
              
			  },

              success : function(data){
              setTimeout(function() {
                  if (data.code == "200"){
                      swal("Redeem Success !!!", "แลกคูปองเรียบร้อยแล้ว คุณได้รับ.", "success",{button:false,closeOnClickOutside:false,});
                      setTimeout(function(){ window.location.reload();}, 2000);
                  } else {
                      swal(data.msg ,"" ,"error",{button:{className:'web-btn-notoutline-danger',},closeOnClickOutside:false,});
                  }
              }, 2000);
            }
        });
    });		