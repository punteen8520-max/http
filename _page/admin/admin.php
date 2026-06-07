<?php
                $now_month = "-".date("m")."-";
                $sql_list_topup_wallet = 'SELECT * FROM topup WHERE type = "เติมเงินด้วย ซองของขวัญ" AND date LIKE "%'.$now_month.'%"';
		$query_list_topup_wallet = $connect->query($sql_list_topup_wallet);
                $amount_wallet = 0;
                while($topup_wallet = $query_list_topup_wallet->fetch_assoc())
		{
			$amount_wallet += $topup_wallet['amount'];
		}
                $amount_tmn = 0;
?>

 <h3 class="text-center mt-4">--- เมนูการจัดการเว็บไซต์ ---</h3>
<div class="row no-gutters mt-4">

    <div class="col-6 col-lg-4 p-2">
        <a href="<?= $url ?>admin/shop"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-gamepad"></i></h1>
            <h1 class="mt-0 mb-0"><?php echo $product_row; ?></h1>
            <font class="text-muted">สินค้าทั้งหมดในระบบ</font>
        </div></a>
    </div>
    
    <div class="col-6 col-lg-4 p-2">
      <a href="<?= $url ?>admin/stock"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-check-circle"></i></h1>
            <h1 class="mt-0 mb-0"><?php echo $stock_row; ?></h1>
            <font class="text-muted">ไอดีพร้อมจำหน่าย</font>
        </div></a>
    </div>
    
    <div class="col-6 col-lg-4 p-2">
      <a href="#"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-box-full"></i></h1>
            <h1 class="mt-0 mb-0"><?php echo $stock1_row; ?></h1>
            <font class="text-muted">ไอดีถูกจำหน่ายแล้ว</font>
        </div></a>
    </div>

    <div class="col-6 col-lg-4 p-2">
      <a href="<?= $url ?>admin/user"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-users"></i></h1>
            <h1 class="mt-0 mb-0"><?php echo number_format($user); ?></h1>
            <font class="text-muted">ผู้ใช้งานในระบบ</font>
        </div></a>
    </div>

    <div class="col-6 col-lg-4 p-2">
      <a href="<?= $url ?>admin/topup"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-coins"></i></h1>
            <h1 class="mt-0 mb-0"><?php echo number_format($amount_wallet + $amount_tmn); ?></h1>
            <font class="text-muted">รายได้ในเดือนนี้</font>
        </div></a>
    </div>
	
    <div class="col-6 col-lg-4 p-2">
      <a href="<?= $url ?>admin/redeem"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-wallet"></i></h1>
            <h1 class="mt-0 mb-0">คูปอง</h1>
            <font class="text-muted">เพิ่มคูปอง</font>
        </div></a>
    </div>	
	
    <div class="col-6 col-lg-4 p-2">
      <a href="<?= $url ?>admin/category"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-folder-open"></i></h1>
            <h1 class="mt-0 mb-0">หมวดหมู่สินค้า</h1>
            <font class="text-muted">เพิ่มหมวดหมู่</font>
        </div></a>
    </div>	

    <div class="col-6 col-lg-8 p-2">
      <a href="<?= $url ?>admin/website"><div class="card shadow-dark radius-border-6 web-bg-white text-center p-3 web-card">
            <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-cogs"></i></h1>
            <h1 class="mt-0 mb-0">ตั้งค่า</h1>
            <font class="text-muted">ตั้งค่าเว็บไซต์</font>
        </div></a>
    </div>

</div>	  
	  
	  
<div class="container dwebsite">
<div class="row">
<?php
                    if(!$_GET){$_GET["menu"] = 'home';}
					if(!$_GET["menu"])
                    {
                      $_GET["menu"] = "home";
                    }
                     if($_GET["menu"] == "home"){
                         include_once __DIR__.'/home.php';
                    }elseif($_GET['menu'] == "shop"){
                        include_once __DIR__.'/shop.php';
                    }elseif($_GET['menu'] == "shopedit"){
                        include_once __DIR__.'/shopedit.php';	
                    }elseif($_GET['menu'] == "redeem"){
                        include_once __DIR__.'/redeem.php';						
                    }elseif($_GET['menu'] == "download"){
                        include_once __DIR__.'/download.php';
                    }elseif($_GET['menu'] == "category"){
                        include_once __DIR__.'/category.php';						
                    }elseif($_GET['menu'] == "topup"){
                        include_once __DIR__.'/topup.php';
                    }elseif($_GET['menu'] == "stock"){
                        include_once __DIR__.'/stock.php';
                    }elseif($_GET['menu'] == "login"){
                        include_once __DIR__.'/login.php';
                    }elseif($_GET['menu'] == "website"){
                        include_once __DIR__.'/website.php';
                    }elseif($_GET['menu'] == "user"){
                        include_once __DIR__.'/user.php';
                    }
                     ?>
</div>
</div>
	<script>
		$(document).ready( function () {
			$('#products').DataTable();
			$('#stock').DataTable();
			$('#editu').DataTable();
		} );
	</script>
<br><br><br>
<?php 
if(isset($_POST['add']) == "shop"){		
			$req_name = $_POST['inputProductName'];
			$req_price = $_POST['inputProductPrice'];
			$req_desc = $_POST['inputProductDesc'];
			$req_cat = $_POST['inputProductcat'];
			$req_help = $_POST['inputProductHelp'];
			$req_patt = $_POST['inputProductPattern'];
            $imgfile=$_FILES["inputProductImg"]["name"];
            $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            if(!in_array($extension,$allowed_extensions))
           {
           echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}else{
          $imgnewfile=md5($imgfile).$extension;
          move_uploaded_file($_FILES["inputProductImg"]["tmp_name"],"./img/".$imgnewfile);			
			
			$q1 = $connect->query("INSERT INTO products (name, image, description, help, price, pattern, cat) VALUES ('".$req_name."', '".$imgnewfile."', '".$req_desc."', '".$req_help."', '".$req_price."', '".$req_patt."', '".$req_cat."')");
		    echo '</body><script> swal("Success Insert","เพิ่มสินค้าสำเร็จแล้ว!","success").then(function() {window.location = "";});</script>';
		  }
}elseif(isset($_POST['delete']) == "shop"){
    
    $DeleteProduct = $connect->query("DELETE FROM products WHERE id = '".$_POST['id']."'");
	    echo '</body><script> swal("Delete Success","ลบสินค้าสำเร็จแล้ว!","success").then(function() {window.location = "";});</script>';
}elseif(isset($_POST['setting']) == "topup"){
        $UpdateTopup = $connect->query("UPDATE wallet_account set mutiple='".$_POST['mutiple']."',phone='".$_POST['phone']."';");
		echo '</body><script> swal("Topup Success","ตั้งค่าการเติมเงินสำเร็จ!","success").then(function() {window.location = "";});</script>';
}elseif(isset($_POST['edit']) == "shop"){
        $name = $_POST['name'];
		$price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $help = $_POST['help'];
          $InsertProduct = $connect->query("UPDATE products set name='".$name."', price='".$price."', description='".$description."',help='".$help."', image='".$image."' WHERE id = '".$_POST['id']."';"); 
          echo '</body><script> swal("Edit Success","แก้ไขสินค้าสำเร็จแล้ว!","success").then(function() {window.location = "";});</script>';
}
if(isset($_POST['add_user']))
    {
        $insert_member = $connect->query("INSERT INTO member (username,point,password,active) VALUES ('".$_POST['username']."','".$_POST['point']."','".hashPassword($_POST['password'])."','".$_POST['active']."')");
        echo '</body><script> swal("Success Insert","เพิ่มผู้ใช้สำเร็จ!","success").then(function() {window.location = "";});</script>';
        }
    if(isset($_POST['edit_title'])){
        $edit_title = $connect->query("UPDATE config SET name = '".$_POST['name']."',title = '".$_POST['title_name']."',description = '".$_POST['description']."',icon = '".$_POST['icon']."',background = '".$_POST['background']."',page_id = '".$_POST['page_id']."',logged = '".$_POST['logged']."',announce = '".$_POST['announce']."'");
        echo '</body><script> swal("Success Update","แก้ไขข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
    }elseif(isset($_POST['edit_fanpage']))
    {
        $edit_title = $connect->query("UPDATE website SET pageurl = '".$_POST['pageurl']."',page = '".$_POST['page']."'");
        echo '</body><script> swal("Success Update","แก้ไขข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
        }elseif(isset($_POST['edit_video']))
    {
        $edit_title = $connect->query("UPDATE website SET videourl = '".$_POST['videourl']."',video = '".$_POST['video']."'");
        echo '</body><script> swal("Success Update","แก้ไขข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
        }elseif(isset($_POST['edit_topup']))
    {
        $edit_title = $connect->query("UPDATE website SET truewallet = '".$_POST['truewallet']."',truemoney = '".$_POST['truemoney']."'");
        echo '</body><script> swal("Success Update","แก้ไขข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
        }elseif(isset($_GET['news_delete']))
    {
        $delete_member = $connect->query("DELETE FROM news WHERE id = '".$_GET['news_id']."'");
        echo '</body><script> swal("Success Update","ลบข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';
    }elseif(isset($_POST['insert_news']))
    {
        $edit_title = $connect->query("INSERT INTO news (date,info) VALUES ('".$_POST['date']."','".$_POST['news']."')");
        echo '</body><script> swal("Success Update","เพิ่มข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
    }elseif(isset($_POST['edit_pointfree']))
    {   
        $edit_Pf = $connect->query("UPDATE website SET pointfree = '".$_POST['pointfree']."'");
        echo '</body><script> swal("Success Update","อัพเดทข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
    }elseif(isset($_POST['edit_random']))
    {   
        $edit_ra = $connect->query("UPDATE website SET random = '".$_POST['random']."',random2 = '".$_POST['random2']."'");
        echo '</body><script> swal("Success Update","อัพเดทข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';
	}	