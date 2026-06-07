<?php if(!$_SESSION['username']){ ?>
<script>window.location.href = "./"</script>
<?php }else{ ?>
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> สินค้า</h5>
                            <br>
	                       <table class="table table-hover text-center w-100" id="historys">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">id</th>
                                                <th class="text-center align-middle" scope="col">ประเภท</th>
                                                <th class="text-center align-middle" scope="col">วันที่ทำการซื้อ</th>
												<th class="text-center align-middle" scope="col">รายละเอียด</th>
                                            </tr>
                                        </thead>
				<tbody>
					<?php 								  
                      $query1 = $connect->query("SELECT * FROM stock WHERE owner = '".$_SESSION["username"]."'");
                              while($product = $query1->fetch_assoc()){
					  $query2 = $connect->query("SELECT * FROM products WHERE id = '".$product['type']."'");
                              while($row = $query2->fetch_assoc()){			  
					echo '
						<tr>
						    <td class="text-center align-middle">'.$product['id'].'</td>
							<td class="text-center align-middle">'.$row['name'].'</td>
							  <td class="text-center align-middle">'.$product['date'].'</td>
							<td class="text-center align-middle"><button type="button" class="btn btn-info" onclick="PurchaseInfo('.$product['id'].')">รายละเอียด</button></td>
						</tr>
						';
					}
			    }						
				?>
				</tbody>
                                    </table>									
                                </div>
</div>
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> ประวัติการเติมเงิน</h5>
                            <br>
                                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
												<th class="text-center align-middle" scope="col">อ้างอิง</th>
                                                <th class="text-center align-middle" scope="col">ช่องทางการเติมเงิน</th>
                                                <th class="text-center align-middle" scope="col">จำนวนเงิน</th>
												<th class="text-center align-middle" scope="col">เวลา</th>
												<th class="text-center align-middle" scope="col">สถานะ</th>
                                            </tr>
                                        </thead>
				<tbody>
					<?php 
                                        $logs = $connect->query("SELECT * FROM topup WHERE username = '".$_SESSION["username"]."' order by id desc");
                                                  if($logs->num_rows == 0) {
	                                                 echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                   }										
                                                while($log = $logs->fetch_assoc())
                                                {
							if($log['status'] == 'success') {
							$log['status'] = '<center><i class="fa fa-check-circle" style="color: #00C851;"> สำเร็จ</i></center>'; 
								}
							elseif($log['status'] == 'failed') {
							$log['status'] = '<center><i class="fa fa-times-circle" style="color: #ff4444;"> ล้มเหลว</i></center>'; 
								}
							else {
							$log['status'] = '<b style="color: #ff6f00"><i class="fa fa-spinner fa-spin"></i> รอตรวจสอบ</b>'; }
					echo '
						<tr>
						    <td class="text-center align-middle">#</td>
							<td class="text-center align-middle">'.$log['TW_id'].'</td>
							<td class="text-center align-middle">'.$log['type'].'</td>
							<td class="text-center align-middle">'.number_format($log['amount']).'</td>
							<td class="text-center align-middle">'.$log['date'].'</td> 
							<td class="text-center align-middle">'.$log['status'].'</td>
						</tr>
						';
						}
						?>
				</tbody>
                                    </table>
</div>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#historys').DataTable();
    });
</script>  

