 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
						 <h5 class="m-0"><i class="fa fa-award"></i>&nbsp;อันดับของเว็บ</h5>
                        <hr>							
			<div class="selectpage">
				<div class="meaoobuttonselect">
					<table class="faketabelhehe">
						<tr class="faketabelhehe">
							<th class="faketabelhehe">
								<a href="<?= $url ?>rating/1">
									<button type="button" class="btn btn-outline-info">ผู้เติมเงินล่าสุด</button>
								</a>
							</th>
							<th class="faketabelhehe">
								<a href="<?= $url ?>rating/2">
									<button type="button" class="btn btn-outline-info">ผู้เติมสูงสุด</button>
								</a>
							</th>
							<th class="faketabelhehe">
								<a href="<?= $url ?>rating/3">
									<button type="button" class="btn btn-outline-info">ผู้ซื้อซื้อค้าล่าสุด</button>
								</a>
							</th>
						</tr>
					</table>
				</div>
			</div>
<?php			
if(isset($_GET['1'])) { 
?>			
			<center>
				<h5 style="font-weight: bold;"> การเติมเงินล่าสุด ( ลำดับ 1-10 )</h5>
			</center>
			<table class="table mt-3">
				<thead class="thead">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ผู้ใช้</th>
						<th scope="col">จำนวน</th>
					</tr>
				</thead>
                   <?php
                        $sql_last_m = 'SELECT * FROM topup ORDER BY id DESC LIMIT 10';
                        $query_last_m = $connect->query($sql_last_m);
                    ?>				
				<tbody style="background-color: #fbfbfb;">
				<?php
                      while($list_topup = $query_last_m->fetch_assoc()) {
                    ?>	
						<tr>
							<td>
								<h5 class="m-0">#</h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo $list_topup['username']; ?></h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo number_format($list_topup['amount'],2); ?>฿</h5>
							</td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>			
<?php
}else{
if(isset($_GET['2'])) { 
?> 			
			<center>
				<h5 style="font-weight: bold;"> อันดับเติมเงินสูงสุด ( ลำดับ 1-10 )</h5>
			</center>
			<table class="table mt-3">
				<thead class="thead">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ผู้ใช้</th>
						<th scope="col">จำนวนเงิน</th>
					</tr>
				</thead>
                     <?php					 
                        $sql_list = 'SELECT * FROM member ORDER BY topup DESC LIMIT 10';
                        $query_list = $connect->query($sql_list);
                    ?>				
				<tbody style="background-color: #fbfbfb;">
				    <?php
                      while($list = $query_list->fetch_assoc()) {
                      ?>	
						<tr>					
							<td>
								<h5 class="m-0">#</h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo $list['username']; ?></h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo number_format($list['topup'],2); ?>฿</h5>
							</td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>			
<?php
}else{
if(isset($_GET['3'])) { 
?>  
			<center>
				<h5 style="font-weight: bold;"> การซื้อสินค้าล่าสุด ( ลำดับ 1-10 )</h5>
			</center>
			<table class="table mt-3">
				<thead class="thead">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ผู้ใช้</th>
						<th scope="col">ไอดีสินค้า</th>
					</tr>
				</thead>
                <?php					 
                    $sql_stock_m = "SELECT * FROM log_buy ORDER BY id DESC LIMIT 10";
                    $query_stock_m = $connect->query($sql_stock_m);
                ?>					
				<tbody style="background-color: #fbfbfb;">
				<?php
                      while($list_topup = $query_stock_m->fetch_assoc()) {
                    ?>				
						<tr>
							<td>
								<h5 class="m-0">#</h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo $list_topup['user']; ?></h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo $list_topup['type']; ?></h5>
							</td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>
<?php }else{ ?>		
			<center>
				<h5 style="font-weight: bold;"> การเติมเงินล่าสุด ( ลำดับ 1-10 )</h5>
			</center>
			<table class="table mt-3">
				<thead class="thead">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ผู้ใช้</th>
						<th scope="col">จำนวน</th>
					</tr>
				</thead>
                   <?php
                        $sql_last_m = 'SELECT * FROM topup ORDER BY id DESC LIMIT 10';
                        $query_last_m = $connect->query($sql_last_m);
                    ?>				
				<tbody style="background-color: #fbfbfb;">
				<?php
                      while($list_topup = $query_last_m->fetch_assoc()) {
                    ?>	
						<tr>
							<td>
								<h5 class="m-0">#</h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo $list_topup['username']; ?></h5>
							</td>
							<td>
								<h5 class="m-0"><?php echo number_format($list_topup['amount'],2); ?>฿</h5>
							</td>
						</tr>
					<?php } ?>	
				</tbody>
			</table>
<?php } } }?>				
            </div>
        </div>
    </div>