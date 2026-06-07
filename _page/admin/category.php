 <?php
if(isset($_POST['cat'])) {
            $imgfile=$_FILES["img"]["name"];
            $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            if(!in_array($extension,$allowed_extensions))
           {
           echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}else{
           $imgnewfile=md5($imgfile).$extension;
           move_uploaded_file($_FILES["img"]["tmp_name"],"./img/".$imgnewfile);
 
	$query = $connect->query("INSERT INTO category (url, img, name) VALUES ('".$_POST['url']."', '".$imgnewfile."', '".$_POST['name']."')");
	echo '</body><script> swal("Success Add","เพิ่มเรียบร้อย!","success").then(function() {window.location = "";});</script>';
 }
}		
?>
 <div id="return"></div>
 <div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-category"></i>&nbsp;หมวดหมู่สินค้า</div>
	<div class="card-body">
<form method="post" action="" enctype="multipart/form-data">
			  
			  <label>ชื่อหมวดหมู่</label>
			  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อหมวดหมู่">
			   <label>urlหมวดหมู่</label>
			    <input type="text" name="url" id="url" class="form-control" placeholder="urlหมวดหมู่">
	          <label>รูปภาพ</label>
			    <input type="file" name="img" id="img" class="form-control" placeholder="hypixel.jpg">			
			  <br>
			  <input type="hidden" name="cat">
			  <button class="btn btn-info" type="submit"><i class="fa fa-plus"></i>&nbsp;เพิ่ม</button>
			  
			</form></div>
			</div>
                </div>
        </div>

 <div class="col-12" style="margin-top: 5px;">
            <div class="card">
		<div class="card-header"><i class="fa fa-money"></i>&nbsp;จัดหมวดหมู่</div>
			<div class="card-body">
			                                    <table id="datatable" class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">name</th>
												<th class="text-center align-middle" scope="col">url</th>
                                                <th class="text-center align-middle" scope="col">img</th>
                                                <th class="text-center align-middle" scope="col">แก้ไข</th>
                                            </tr>
<tbody>
					<?php 
                                        $logs = $connect->query('SELECT * FROM category');
                                                  if($logs->num_rows == 0) {
	                                                 echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                   }	
                                       while($log = $logs->fetch_assoc()){
					echo '
						<tr>
						    <td class="text-center align-middle">#</td>
							<td class="text-center align-middle">'.$log['name'].'</td>
							<td class="text-center align-middle">'.$log['url'].'</td>
							<td class="text-center align-middle">'.$log['img'].'</td>
							<td class="text-center align-middle"><a class="btn btn-danger" href="'.$url.'admin/category/'.$log['id'].'"><i class="fa fa-cog"></i></a></td>
						</tr>
						';
						}
						?>
				</tbody>
                                    </table>
 <?php	
    if(isset($_POST['update']))
    {
        $update_member = $connect->query("UPDATE category SET name = '".$_POST['name']."', url = '".$_POST['url']."', img = '".$_POST['img']."' where id = '{$_GET['id']}'");

       echo '</body><script> swal("Success Saveed","เปลี่ยนแปลงข้อมูลสำเร็จ!","success").then(function() {window.location = "";});</script>';	
    }	

if(isset($_GET['id']) && $_GET['id'] != NULL && $_GET['id'] != "")
{
$topup_id = $_GET['id'];
$logs = $connect->query('SELECT * FROM category WHERE id = "'.$topup_id.'"');
while($topup = $logs->fetch_assoc()){
?>	
<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;จัดการหมวดหมู่</div>
	<div class="card-body">
         <div id="return"></div>
     <form method="post">
            <input type="hidden" name="update">	
			 <div class="input-group">
				<span class="input-group-text"><i class="fa fa-edit"></i>&nbsp;name</span>
                  <input type="text" class="form-control" name="name" value="<?php echo $topup['name'];?>">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-lock"></i>&nbsp;url</span>
              <input type="text" class="form-control" name="url" value="<?php echo $topup['url'];?>">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-lock"></i>&nbsp;img</span>
              <input type="text" class="form-control" name="img" value="<?php echo $topup['img'];?>">
			  </div>			  
			  <br>
			  <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก</button>
			</form>
			
			</div>
                </div>
        </div>
<?php } }?>
									
			</div>
                </div>
	</div>	