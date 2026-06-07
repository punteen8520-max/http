function PurchaseModal(id) {

  $.get("../_system/data/modal_purchase.php?id="+id, function(html) {

    $(html).appendTo('body').modal();

  });

}
function PurchaseInfo(id) {

  $.get("../_system/data/modal_info.php?id="+id, function(html) {

    $(html).appendTo('body').modal();

  });

}
function logout() {
				Swal.fire({
					title: 'คุณแน่ใจมั้ย?',
					text: "คุณต้องการที่จะออกจากระบบจริงๆหรอ!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#00C851',
					cancelButtonColor: '#d33',
					cancelButtonText: 'ไม่',
					confirmButtonText: 'ใช่'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url:"?page=logout",
							success:function(data){
								Swal.fire({
									text: 'ออกจากระบบสำเร็จ',
									type: 'success',
									timer: 2500, 
									confirmButtonColor: '#00C851',
									confirmButtonText: 'ตกลง'
								}).then((result)=>{
									window.location.href="./";
								});
							}
						});
					}
				})
			}						
function BuyItem(id){

        var id = id.value;

        swal({
        title: 'ต้องการซื้อสินค้านี้หรือไม่',
        text: 'สินค้า '+$('#title'+id).html(),
        icon: "info",
        buttons: {
          confirm : {text:'ซื้อสินค้า',className:'web-btn-notoutline-success'},
          cancel : 'ยกเลิก'
        },
        closeOnClickOutside:false,
        })
        .then((willDelete) => {
          if (willDelete) {

            $.ajax({
      
                  type: "POST",
                  url: "../_system/system.php",
                  dataType: "json",
                  data: {id:id},

                  beforeSend: function() {	
				  
                  swal({text: 'กำลังทำรายการโปรดรอสักครู่..',button:false,closeOnClickOutside:false,});    
              
			      },

                  success : function(data){
                  setTimeout(function() {
                      if (data.code == "200"){
                          swal("ซื้อสินค้า สำเร็จ!", "ระบบกำลังพาท่านไป...", "success",{button:false,closeOnClickOutside:false,});
                          setTimeout(function(){ window.location.href = '../history'; }, 1500);
                        }else{
                          swal(data.msg ,"" ,"error",{button:{className:'web-btn-notoutline-danger',},closeOnClickOutside:false,});
                        }
                    }, 2000);
                }

            });

        }
    });     

}