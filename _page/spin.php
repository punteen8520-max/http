<?php if($website['spin2'] == "true"){ ?>
<div class="container" style="padding-top: 110px;">   
<div class="card shadow-dark radius-border">
    <div class="card-body p-0 text-center pt-4">
        <h4>สุ่มของรางวัล</h4>
        <hr/>
        <div class="superwheel" data-aos="fade-down"></div>
        <button class="spin-button btn btn-sm web-btn-success my-3">สุ่มเลยย ( 10 บาท )</button>
        <p>ยอดเงินคงเหลือ <span id="pointnow"><?php echo number_format($player['point'],2); ?></span> บาท</p>
    </div>
</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $('.superwheel').superWheel({
        slices: [
        <?php $query2 = $connect->query("SELECT * FROM setting_spin");   
	        while($data = $query2->fetch_assoc()){?>
            {
                text: "<?php echo $data[image]; ?>",
                value: <?php echo $data['id']; ?>,
                message: "<?php echo $data[message]; ?>",
                background: "#424242",
                color: "#fff"
            },
        <?php }?>
        ],
        width: 700,
        frame: 1,
        type: "spin",
        text: {
            type:"image",
            color: "#ccc",
            size: 20,
            offset: 8,
            orientation: "h",
            arc: false
        },
        line: {
            color: "#278ea5"
        },
        outer: {
            color: "#278ea5"
        },
        inner: {
            color: "#278ea5"
        },
        center: {
            rotate: true,
            image: {
                url: "https://i.pinimg.com/originals/1c/a5/ba/1ca5ba6ee4774c4a595b2a859bc7c8e3.gif"
            }
        },
        marker: {
            animate: "true"
        }
    });
    var tick = new Audio('https://www.22codes.com/demo/javascript/superwheel/dist/tick.mp3');
    $(document).on('click','.spin-button',function(e){
        e.preventDefault();
        $('.spin-button').attr('disabled', 'disabled');
        $.ajax({
            type:'post',
            url:'/api/v1/spin',
        }).then((res)=>{
            var obj = JSON.parse(res);
            if (obj.status == "success"){
                $('.superwheel').superWheel('start','value',obj.spin_value);
                setTimeout(function(){
                    $('#pointnow').html(obj.pointnow);
                }, 5000);
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'สุ่มของFreeFire',
                    text: obj.info,
                })
            }
        });
    });
    $('.superwheel').superWheel('onComplete',function(results){
        Swal.fire({
            icon: 'success',
            title: 'สุ่มของFreeFire',
            text: results.message,
            footer: 'หากได้รับของกรุณาไปกรอกรับใน <a href="/history">ประวัติ</a>'
        })
        $('.spin-button').removeAttr("disabled");
        console.log(results)
    });
    $('.superwheel').superWheel('onStep',function(results){

        if (typeof tick.currentTime !== 'undefined')
            tick.currentTime = 0;

        tick.play();

    });

</script>
<?php }else{ ?>
<script>window.location.href = "./"</script>
<?php } ?>