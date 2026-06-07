          <div id="carouselExampleInterval" class="carousel slide shadow-dark radius-border" data-ride="carousel">
            <div class="carousel-inner radius-border">
			<?php
			$sql_slide_image = $connect->query("SELECT * FROM image_slide ORDER BY id DESC");
			$active = 1;
                while($row = $sql_slide_image->fetch_assoc()){	
			?>
              <div class="carousel-item <?php if($active == 1){echo 'active'; } ?>" data-interval="7000">
                <img src="<?= $url ?>assets/images/<?php echo $row['image_name'] ?>" class="d-block w-100" alt="...">
              </div>			  
                <?php $active = 0; } ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

        </div>
        <!-- End Image Banner -->

        <!-- Site Banner Text -->
        <div class="card mt-4 shadow-dark radius-border web-bg-white">
        <div class="card-body">
        <div class="media">
            <img src="<?php echo $config['icon']; ?>" class="mr-3 img-fluid rounded-circle shadow-dark" style="width:17%;max-width: 130px;">
            <div class="media-body">
              <div class="mt-0 d-none d-lg-block">
                  <h1 class="mt-0 mb-1"><b><?php echo $config['name']; ?></b> เว็บไซต์บริการจำหน่ายไอดีมากมาย</h1>
              </div>
 <pre>
..
</pre>             
            </div>
        </div>
        </div>
        </div>

        <h1 class="text-center mt-4 mb-2">เกมที่มีไอดีพร้อมจำหน่าย</h1>
        <div class="row no-gutters">

        <?php
		  $sql_category = $connect->query("SELECT * FROM category");
          while($row = $sql_category->fetch_assoc()){ 
		  
		  $product_r_q = $connect->query("SELECT * FROM products WHERE cat='".$row['url']."'");
          while($product = $product_r_q->fetch_assoc()){ 
          $product_id = $product['id'];
		  }		  
		  $stock_sql = $connect->query("SELECT * FROM stock WHERE type = '".$product_id."' AND owner = ''");
          $stock = $stock_sql->num_rows;
		  
          if($sql_category <= 0){
          ?>
          <h4 class="text-center w-100 mt-4">ไม่มีเกมในขณะนี้</h4>
          <?php 
          }else{

        ?>
            <div class="col-6 col-lg-4 p-2">
                <a href="<?= $url ?>shop/<?php echo $row['url']; ?>">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-2 h-100 web-card">
                    <div class="media">
                        <img src="<?= $url ?>img/<?php echo $row['img']; ?>" class="align-self-center mr-3 rounded-circle d-none d-md-block" width="70px;">
                        <div class="media-body text-center text-md-left">
                          <img src="<?= $url ?>img/<?php echo $row['img']; ?>" class="ml-auto mr-auto rounded-circle d-block d-md-none" width="70px;">
                          <h4 class="mt-0 mb-1"><?php echo $row['name']; ?></h4>
                          <font class="text-muted"><?php echo $stock; ?> ไอดี</font>
                        </div>
                    </div>
                </div>
                </a>
            </div>
		  <?php } }?>

        </div>
		
        <div class="card mt-4 shadow-dark radius-border web-bg-white">
        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-newspaper"></i>&nbsp; ข่าวสารเเละอัพเดท</h5>
                            <br>		
 	    	<?php
	    		$query_announce = $connect->query('SELECT * FROM news ORDER BY id DESC LIMIT 5');
		        	$i =0 ;
		         	while($news = $query_announce->fetch_assoc())
		          	{
		            ?>
 			<table class="table table-striped table-bordered" >
				<tbody>
						<tr>
						 <td><span class="badge badge-info">News</span>&nbsp;<?php echo $news['info']; ?></td>
					     <td class="text-right">
		                	<?php echo $news['date']; ?>
		                </td>
						</tr>
				</tbody>
			</table>	
		          <?php
		        }
		    ?>		
        </div>
        </div>	

        <div class="card mt-4 shadow-dark radius-border web-bg-white">
        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-newspaper"></i>&nbsp;ประวัติการซื้อสินค้าล่าสุด</h5>
                            <br>
						<table class="table stylish-table">
							<thead>
							<tr>
								<th class="text-center align-middle" scope="col">ID</th>
								<th class="text-center align-middle" scope="col">ชื่อสินค้า</th>
								<th class="text-center align-middle" scope="col">ราคา</th>
								<th class="text-center align-middle" scope="col">ผู้ซื้อ</th>
							</tr>
							</thead>
                                        <tbody>
                                              <?php   
                                                $download_u_q = $connect->query("SELECT * FROM log_buy ORDER BY id DESC LIMIT 4");
                                                 if($download_u_q->num_rows == 0) {
	                                                echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                  }
                                                while($download_u = $download_u_q->fetch_assoc())
                                                        
                                                {
                                                    $i++;
											    $sql_products = $connect->query('SELECT * FROM products WHERE id = "'.$download_u['type'].'"');
                                                  while($products = mysqli_fetch_array($sql_products)){													
                                                   ?>
                                            <tr>
                                            <td class="text-center align-middle"><?php echo $download_u['id']; ?></td>
                                            <td class="text-center align-middle"><?php echo $products['name']; ?></td>
                                            <td class="text-center align-middle"><?php echo number_format($download_u['price'],2); ?></td>
                                            <td class="text-center align-middle"><?php echo $download_u['user']; ?></td>
                                                
                                            </tr>
											   <?php } ?>
                                                <?php } ?>
                                        </tbody>
						</table>
					</div>
				</div>
		
		
 <div class="row no-gutters mt-4">
            <div class="col-12 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-gamepad"></i></h1>
                    <h1 class="mt-0 mb-0"><?php echo $product_row; ?></h1>
                    <font class="text-muted">สินค้าทั้งหมดในระบบ</font>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-check-circle"></i></h1>
                    <h1 class="mt-0 mb-0"><?php echo $stock_row; ?></h1>
                    <font class="text-muted">ไอดีพร้อมจำหน่าย</font>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-box-full"></i></h1>
                    <h1 class="mt-0 mb-0"><?php echo $stock1_row; ?></h1>
                    <font class="text-muted">ไอดีถูกจำหน่ายแล้ว</font>
                </div>
            </div>
			
            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-chart-bar"></i></h1>
                    <h1 class="mt-0 mb-0"><?php echo number_format($views["view"]); ?></h1>
                    <font class="text-muted">ยอดเข้าชม</font>
                </div>
            </div>

            <div class="col-6 col-lg-4 p-2">
                <div class="card shadow-dark radius-border-6 web-bg-white text-center p-3">
                    <h1 class="mt-0 mb-0" style="font-size: 3.5rem;"><i class="fal fa-user"></i></h1>
                    <h1 class="mt-0 mb-0"><?php echo $user; ?></h1>
                    <font class="text-muted">สมาชิก</font>
                </div>
            </div>				

        </div>