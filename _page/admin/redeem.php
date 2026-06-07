 <?php
		if(isset($_POST['ac'])) {
			   if(empty($_POST['price'])) {
				echo '</body><script> swal("Error Empty","กรุณาอย่าเว้นช่องว่าง!","error").then(function() {window.location = "";});</script>';
	}else {
		$c_query = $connect->query('SELECT * FROM redeem WHERE code = "'.$_POST['code'].'"');
		
		$code_num = $c_query->num_rows;
		if ($code_num){
			echo '</body><script> swal("Error Already","โค้ดนี้ซ้ำกับโค้ดอื่น!","error").then(function() {window.location = "";});</script>';
		}else {
	$rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567891112131415161718192122232425'),0,10);		
	$query = $connect->query("INSERT INTO redeem (code, price) VALUES ('{$rand}', '{$_POST['price']}')");
	
	echo '</body><script> swal("Success Add","เพิ่มคูปองเรียบร้อย!","success").then(function() {window.location = "";});</script>';
}
	}
		}

if(isset($_POST['delete_itemp']))
    {
        $delete_itemp = $connect->query("DELETE FROM redeem WHERE id = '".$_POST['delete_itemp']."'");

        echo '</body><script> swal("Success Delete","ลบข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';
    }	
?>
 <div id="return"></div>
 <div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;เพิ่มคูปอง</div>
	<div class="card-body">
<form method="post" name="ac" action="">
			  
			   <label>จำนวนเงิน</label>
			    <input type="text" name="price" id="price" class="form-control" placeholder="จำนวนเงิน">
			  <br>
			  <button class="btn btn-info" name="ac" type="submit"><i class="fa fa-plus"></i>&nbsp;ยืนยัน</button>
			  
			</form></div>
			</div>
                </div>
        </div>

 <div class="col-12" style="margin-top: 5px;">
            <div class="card">
		<div class="card-header"><i class="fa fa-money"></i>&nbsp;จัดการคูปอง</div>
			<div class="card-body">
		                        <table id="datatable" class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">โค็ด</th>
                                                <th class="text-center align-middle" scope="col">จำนวนเงิน</th>
                                                <th class="text-center align-middle" scope="col">สถานะ</th>
												<th class="text-center align-middle" scope="col">ลย</th>
                                            </tr>
<tbody>
					<?php 
                                        $logs = $connect->query('SELECT * FROM redeem order by id desc');
                                            if($logs->num_rows == 0) {
	                                           echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                            }
									   $i=0;
                                                while($log = $logs->fetch_assoc())
                                                {
							if($log['status'] == 'UnRedeem') {
							$log['status'] = '<center><i class="fa fa-check-circle" style="color: #00C851;"> ใช้งานได้</i></center>'; 
								}
							elseif($log['status'] == 'Redeem') {
							$log['status'] = '<center><i class="fa fa-times-circle" style="color: #ff4444;"> ใช้งานแล้ว</i></center>';}
					echo '
						<tr>
						    <td class="text-center align-middle">#</td>
							<td class="text-center align-middle">'.$log['code'].'</td>
							<td class="text-center align-middle">'.$log['price'].'</td>
							<td class="text-center align-middle">'.$log['status'].'</td>
							<td class="text-center align-middle"><form method="post"><button name="delete_itemp" value="'.$log['id'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></form></td>
						</tr>
						';
						$i++;
						}
						?>
				</tbody>
                                    </table>		
			</div>
                </div>
	</div>		