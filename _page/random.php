<?php 
if(isset($_POST['random'])) {
			$query = $connect->query('SELECT * FROM random');
			$shop = $query->fetch_assoc();
				$filename =  '../assets/id/'.$shop['dist'];
				$data = rmtxt($filename);
				if($data == "Stock" || $data == "Error") {
					echo '</body><script> swal("Error","ไอดีหมดแล้ว !","error").then(function() {window.location = "";});</script>';
				}else{
				$lib = explode(":",$data);
			    $name = ('ไอดีฟรี');
			    $time_date = date("d-m-Y G:i");				
				$connect->query("INSERT INTO log_random (name, time, username, email, password) VALUES ('".$name."', '".$time_date." ', '".$_SESSION['username']."', '".$lib[0]."', '".$lib[1]."'); ");				
				echo '</body><script> swal("ยินดีด้วย","คุณได้รับมันแล้ววว Enjoy!","success").then(function() {window.location = "";});</script>';
	}		
}

function rmtxt($FileName) {
	$text = array();
	$open = fopen($FileName, 'r+');
	if($open)
	{
		while(!feof($open))
		{
			$file = fgets($open, 4096);
			array_push($text, str_replace("\n", "", $file));
		}
		fclose($open);
		if(count($text) <= 1)
			return "Stock";
		else
		{
			$Buy = $text[rand(0, count($text)-1)];
			$text = null;
			$text = array();
			$open = fopen($FileName, 'r+');
			while(!feof($open))
			{
				$file = fgets($open, 4096);
				if(str_replace("\n", "", $file) != $Buy)
					array_push($text, str_replace("\n", "", $file));
			}
			fclose($open);
			$open = fopen($FileName, 'w');
			for($i = 0; $i <= count($text)-1; $i++)
			{
				if($i == count($text)-1)
					$t[$i] = $text[$i];
				else
					$t[$i] = $text[$i].'
';
				fwrite($open, $t[$i]); 
			}
			if($open) 
			{
				return $Buy;
			}
			else
			{
				return "Error";
			}
			fclose($open);
		}
	}
	else
	{
		return "Error";
	}
}
function stock($filename) {
	  @$data = file_get_contents('./assets/id/'.$filename);
	  if(!$data) {
		  file_put_contents('./assets/id/'.$filename);
	  }
	  $count = explode("\n",$data);
	  if($data == NULL) {
	  $count = 0; 
	  }else {
		  $count = count($count);
	  }
	return $count;
}
if($website['random2'] == "true"){ 
?>
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fas fa-gift"></i>  รับไอดีแท้ฟรี</h5>
                            <hr>
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">	
			                    <center>
			                    <img src="" width="150">							
                                <div class="h5 my-2">สุ่มไอดีแท้ฟรีทุกๆ 5 นาที!</div>
			                    </center>							
							   <hr> 
                               <form name="random" method="POST">
                                <div class="form-group">
				                <?php if ($_SESSION['username'] == NULL) {?>
	                            <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                            <?php }else{ ?>
                                <button type="submit" name="random" class="btn btn-outline-danger btn-block">สุ่มไอดีแท้</button>
                                <?php } ?>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>	 	
 </div>
</div>
<?php if(!$_SESSION['username']){ ?>

<?php }else{ ?>
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fas fa-history"></i>  ประวัติการสุ่มไอดีแท้ฟรี</h5>
                            <br>
                <table class="table table-bordered" id="historys" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">id</th>
							<th class="text-center align-middle" scope="col">รายการ</th>
                            <th class="text-center align-middle" scope="col">E-mail/Password</th>
                            <th class="text-center align-middle" scope="col">สถานะID</th>
							<th class="text-center align-middle" scope="col">เวลา</th>
                        </tr>
                    </thead>
				       <tbody>
					   
				       </tbody>
                    </table>							
 </div>
</div>
<?php } ?>
<?php }else{ ?>
<script>window.location.href = "./"</script>
<?php } ?>