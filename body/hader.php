<?php
$config_q = $connect->query("SELECT * FROM config");
 $config = $config_q->fetch_assoc();
 ?>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $config['title']; ?></title>
<link rel="shortcut icon" href="<?php echo $config['icon']; ?>" type="image/png">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">

<link rel="stylesheet" href="<?= $url ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= $url ?>assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="<?= $url ?>assets/fonts/ionicons.min.css">
<link href="<?= $url ?>assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= $url ?>assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?= $url ?>assets/css/dataTables.bootstrap4.min.css">
<link href="<?= $url ?>assets/css/animate.css" rel="stylesheet">
<link href="<?= $url ?>assets/css/web.css" rel="stylesheet">
<link href="<?= $url ?>assets/css/shop.css" rel="stylesheet">
<link href="<?= $url ?>assets/css/superwheel.css" rel="stylesheet">

<script src="<?= $url ?>assets/js/jquery-3.3.1.js"></script>
<script src="<?= $url ?>assets/js/sweetalert.min.js"></script>
<script src="<?= $url ?>assets/sweetalert.min.js"></script>
<script src="<?= $url ?>assets/js/i.js"></script>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-VhBcF/php0Z/P5ZxlxaEx1GwqTQVIBu4G4giRWxTKOCjTxsPFETUDdVL5B6vYvOt" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $url ?>assets/js/superwheel.js"></script>
<script>
  $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
      $('#datatable').DataTable();
  });
  </script>
  <style>
  .swal-modal .swal-text {
    text-align: center;
}
  </style>  
<style type="text/css">
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}
	::-webkit-scrollbar {
		width: 6px;
		background-color: #f5f5f5;
		border-radius: 12px;
	}
	::-webkit-scrollbar-thumb {
		background-color: #403838;
		border-radius: 12px;
	}
	::-webkit-scrollbar-thumb:hover {
		background: #211d1d;
		border-radius: 12px;
	}
			.top-body {
			padding-top: 90px;
		}

		@media (max-width: 991px){
			.manu-nav {
				top: 40;
			}
		}
	</style> 
<style>

	@import url(https://fonts.googleapis.com/css?family=Prompt&display=swap);

	* {
		font-family: 'Prompt', sans-serif;
	}
</style>	
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-customerchat"
 page_id="<?php echo $config['page_id']; ?>" 
 theme_color="#0084FF" 
 logged_in_greeting="<?php echo $config['logged']; ?>" 
 logged_out_greeting="<?php echo $config['logged']; ?>">
</div> 