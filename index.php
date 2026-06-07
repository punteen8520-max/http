<?php
date_default_timezone_set("Asia/Bangkok");
require('_system/system.php');
require "_system/directory.php";
if(!file_exists("_system/license.key"))
{
	header("location: install/install.php");
}
if($website['website'] == "true"){
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include 'body/hader.php'; ?>
 </head>
 <body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm" data-aos="fade-down">
 <div class="container">
  <a class="navbar-brand" href="<?= $url ?>">&nbsp;<?php echo $config['name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if($_GET['page'] == "home"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>"><i class="fa fa-home"></i> หน้าแรก</a>
        </li>            
        <li class="nav-item <?php if($_GET['page'] == "shop"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>shop"><i class="fa fa-shopping-cart"></i> สินค้า</a>
        </li><?php if(!$_SESSION['username']){ }else{ ?>		
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-wallet"></i> เติมเงิน</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="<?= $url ?>topup/truewalletgift">ซองอังเปา Wallet</a>
			<a class="dropdown-item " href="<?= $url ?>topup/truemoney">บัตรทรูมันนี่</a>
			<a class="dropdown-item " href="<?= $url ?>topup/giftcode_topup">GiftCode</a>
          </div>		
        </li><?php if($website['random'] == "true"){ ?>
		<li class="nav-item <?php if($_GET['page'] == "random"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>random"><i class="fa fa-gift"></i>  รับไอดีแท้ฟรี</a>
        </li><?php }else{ } }?> 	  
		<li class="nav-item <?php if($_GET['page'] == "rating"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>rating"><i class="fa fa-award"></i> อันดับของเว็บ</a>
        </li>	
        <li class="nav-item <?php if($_GET['page'] == "help"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>help"><i class="fas fa-hands-helping"></i> ช่วยเหลือ</a>
        </li>  	 		
        <li class="nav-item <?php if($_GET['page'] == "contact"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>contact"><i class="fas fa-contact"></i>☎ ติดต่อ</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto"><?php if(!$_SESSION['username']){ ?>			
        <li class="nav-item <?php if($_GET['page'] == "login"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>login"><i class="fal fa-sign-in-alt mr-1"></i> เข้าสู่ระบบ</a>
        </li>  	 		
        <li class="nav-item <?php if($_GET['page'] == "register"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?= $url ?>register"><i class="fal fa-user-plus mr-1"></i> สมัครสมาชิก</a>
        </li><?php }else{ ?>
        <li class="nav-item  dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		
          <a class="dropdown-item" href="#"><i class="fa fa-user"></i>&nbsp;ผู้ใช้งาน : <?php echo $_SESSION['username'] ?></a>
           <a class="dropdown-item" href="#"><i class="fa fa-cube"></i>&nbsp;พ้อย : <?php echo number_format($player['point'],2); ?></a>
           <a class="dropdown-item" href="#"><i class="fa fa-users"></i>&nbsp;แรงค์ : <?php echo $player['rank'] ?></a>
          
          <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="<?= $url ?>history"><i class="fa fa-history"></i> ประวัติทั้งหมด</a>
          <a class="dropdown-item" href="<?= $url ?>profile"><i class="fa fa-user"></i>&nbsp;แก้ไขข้อมูลส่วนตัว</a>
		  <?php if(isset($_SESSION['id']) && $player['rank'] == "admin" ){ ?>
		  <a class="dropdown-item" href="<?= $url ?>admin"><i class="fa fa-cog fa-lg"></i>&nbsp;จัดการระบบ</a>
		  <?php } ?>
         <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:logout();"><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a>
        </div>
       </li>  
        <?php } ?>   
      </ul>
    </div>
  </nav>
<div class="container" style="padding-top: 110px;">
<?php
                if (!isset($_SESSION['username'])) {
                    if($_GET["page"] == "home"){
                        include_once __DIR__.'/_page/home.php';	
                    }elseif($_GET['page'] == "shop"){
                        include_once __DIR__.'/_page/shop.php';						 
                    }elseif($_GET['page'] == "login"){
                        include_once __DIR__.'/_page/login.php';
                    }elseif($_GET['page'] == "register"){
                        include_once __DIR__.'/_page/register.php';	
                    }elseif($_GET['page'] == "help"){
                        include_once __DIR__.'/_page/help.php';
                    }elseif($_GET['page'] == "term"){
                        include_once __DIR__.'/_page/term.php';							
                    }elseif($_GET['page'] == "resetpassword"){
                        include_once __DIR__.'/_page/resetpassword.php';	
                    }elseif($_GET['page'] == "rating"){
                        include_once __DIR__.'/_page/rating.php';							
					}else{
						include_once __DIR__.'/_page/home.php';
					}						
				}else{
                    if($_GET["page"] == "home"){
                        include_once __DIR__.'/_page/home.php';
                    }elseif($_GET['page'] == "shop"){
                        include_once __DIR__.'/_page/shop.php';
                    }elseif($_GET['page'] == "history"){
                        include_once __DIR__.'/_page/history.php';
                    }elseif($_GET['page'] == "topup"){
                        include_once __DIR__.'/_page/topup.php';
                    }elseif($_GET['page'] == "rating"){
                        include_once __DIR__.'/_page/rating.php';						
                    }elseif($_GET['page'] == "help"){
                        include_once __DIR__.'/_page/help.php';
                    }elseif($_GET['page'] == "term"){
                        include_once __DIR__.'/_page/term.php';							
                    }elseif($_GET['page'] == "profile"){
                        include_once __DIR__.'/_page/profile.php';	
                    }elseif($_GET['page'] == "random"){
                        include_once __DIR__.'/_page/random.php';
                    }elseif($_GET['page'] == "spin"){
                        include_once __DIR__.'/_page/spin.php';							
                    }elseif($_GET['page'] == "logout"){
                        include_once __DIR__.'/_page/logout.php';						
                    }elseif($_GET['page'] == "editprofile"){
                        include_once __DIR__.'/_page/editprofile.php';						
                    }elseif($_GET['page'] == "topup"){
                        include_once __DIR__.'/_page/topup.php';
                    }elseif($_GET['page'] == "admin" && isset($_SESSION['username']) && $player['rank'] == "admin"){
                        include_once __DIR__.'/_page/admin/admin.php';
                    }else{
                        include_once __DIR__.'/_page/home.php';
                    }
			    }
?>
</div>
<br>

<script src="<?= $url ?>assets/js/user.js"></script>

<?php include 'body/footer.php'; ?> 
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

<style>
	*,.btn,button{
		font-family: 'Kanit';
	}
    .page-text-title {
        font-weight: 700;
        font-size: clamp(3rem, 2.5vw, 5rem);
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .blockTitle {
        color: #fff;
        text-shadow: 0 0 2px rgba(255, 255, 255, 0.6);
        padding: 0 0 1rem 2.3rem;
        position: relative
    }

    .blockTitle::before {
        content: '';
        position: absolute;
        top: 8px;
        left: 8px;
        width: 1em;
        height: 1em;
        border: 4px solid ;
        border-bottom: transparent;
        border-left: transparent;
        transform: rotate(45deg)
    }

    .blockText {
        color: #fff;
        text-align: center
    }

    .time {
        text-shadow: 0 0 3px #fff;
        color: #fff;
        font-size: 2.3em;
        padding: 20px 0;

    }

    .time small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .time {
            font-size: 2em
        }

        .time small {
            display: block;
            font-size: 12px
        }
    }

    .times small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .times {
            font-size: 2em
        }

        .times small {
            display: block;
        }
    }

    .countdown {
        display: flex;
        justify-content: space-around;
        box-shadow: 0 0 10px rgba(0, 0, 0)inset;
        text-align: center;
        margin-bottom: 1em;
        border-radius: 1em
    }




    .texbo {
        text-shadow: 0 0 3px #fff;
        color: #fff;
        font-size: 1.9em;
        padding: 20px 0;

    }

    .texbo small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .texbo {
            font-size: 2em
        }

        .texbo small {
            display: block;
            font-size: 12px
        }
    }

    .texbo small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .texbo {
            font-size: 2em
        }

        .texbo small {
            display: block;
        }
    }

    .page-text-title {
        font-weight: 700;
        font-size: clamp(3rem, 2.5vw, 5rem);
        margin-bottom: 0;
        text-transform: uppercase;
    }
</style>
<script type="text/javascript">$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                }

            );
        }

    );

</script>
 <style>
 .page-text-title {
        font-weight: 700;
        font-size: clamp(3rem, 2.5vw, 5rem);
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .blockTitle {
        color: #fff;
        text-shadow: 0 0 2px rgba(255, 255, 255, 0.6);
        padding: 0 0 1rem 2.3rem;
        position: relative
    }

    .blockTitle::before {
        content: '';
        position: absolute;
        top: 8px;
        left: 8px;
        width: 1em;
        height: 1em;
        border: 4px solid ;
        border-bottom: transparent;
        border-left: transparent;
        transform: rotate(45deg)
    }

    .blockText {
        color: #fff;
        text-align: center
    }

    .time {
        text-shadow: 0 0 3px #fff;
        color: #fff;
        font-size: 2.3em;
        padding: 20px 0;

    }

    .time small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .time {
            font-size: 2em
        }

        .time small {
            display: block;
            font-size: 12px
        }
    }

    .times small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .times {
            font-size: 2em
        }

        .times small {
            display: block;
        }
    }

    .countdown {
        display: flex;
        justify-content: space-around;
        box-shadow: 0 0 10px rgba(0, 0, 0)inset;
        text-align: center;
        margin-bottom: 1em;
        border-radius: 1em
    }




    .texbo {
        text-shadow: 0 0 3px #fff;
        color: #fff;
        font-size: 1.9em;
        padding: 20px 0;

    }

    .texbo small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .texbo {
            font-size: 2em
        }

        .texbo small {
            display: block;
            font-size: 12px
        }
    }

    .texbo small {
        display: block;
        font-size: 18px
    }

    @media only screen and (max-width:575px) {
        .texbo {
            font-size: 2em
        }

        .texbo small {
            display: block;
        }
    }

    .page-text-title {
        font-weight: 700;
        font-size: clamp(3rem, 2.5vw, 5rem);
        margin-bottom: 0;
        text-transform: uppercase;
    }

    /* .category-panel .category-details {
        width: 100%;
        padding: 10px 16px 6px;
        background: #decebf;
        background: linear-gradient(0deg, #decebf 0%, #fff3e2 100%);
        border-radius: 5px;
    } */

    /* .category-panel .category-details .category-name {
        width: 100%;
        font-weight: 500;
        font-size: 1.2rem;
    } */

    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
</style>
<?php
 
}else{ 

include $config['body'];
} 
?>