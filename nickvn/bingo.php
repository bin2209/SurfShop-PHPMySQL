    
<?php
require_once('TMQ/function.php');
require_once('TMQ/head.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.25.0/dist/sweetalert2.min.js"></script>

 <div class="c-layout-page">
<div class="c-layout-page">
<style>


    .square{
        width: 100%;
    }
    #squaredesktop .box{
        min-width: 40px;
        min-height: 40px;
        /*background-color: #ccc;*/
        padding: 10px;
    }
    #squaremobile .box{
        padding: 5px;
    }
    .box img.active{

          box-shadow:
            0 0  5px #fff, 
            0 0  10px #fff, 
            0 0  15px #fff, 
            0 0  20px #49fff7, 
            0 0  35px #49fff7
    }
    .outer-btn{
        width: 100%
    }
    .outer-btn:hover{
        opacity: 0.7
    }
    #squaremobile .outer-btn{
        margin-bottom: -50px;
    }
    .nopadding{
        padding: 0;
    }
</style>
<style>
@import  url('https://fonts.googleapis.com/css?family=Roboto');
@import  url('https://fonts.googleapis.com/css?family=Roboto+Mono');
a{
    color: #283593;
    text-decoration: none;
}
h3{
    margin-top: 12px;
}
*{
    margin:0px;
}
.game-list{
    width: 580px;
    margin: 0 auto;
}
@media  screen and (max-width: 580px) {
    .game-list{
        width: 320px;
    }
    #slot1, #slot2, #slot3{
        margin-left: 68px!important;
    }
}

main{
    border-radius: 5px;
    background-color: #EF5350;
    margin-top: 30px;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 15px;
    padding-right: 15px;
    /*margin-left: calc((100% - 580px) / 2);*/  
    width: 100%;
}
section#Slots{
    border-radius: 15px;
    background-color: #FAFAFA;
}
section#Gira{
    margin-top: 25px;
    padding-top: 25px;
    padding-bottom: 25px;
    border-radius: 5px;
    text-align: center;
    background-color: #FFFFFF;
    color: #ef5350;
    font-size: 25px;
    cursor: pointer;
}
section#Gira:hover{
    background-color: #fff57a;
}
section#info{
    background-color: #616161;
    padding-left: 12px;
    padding-bottom: 12px;
    border-radius: 5px;
    overflow: hidden;
    animation-duration: 1s;
    color: #BDBDBD;
    margin-top: 50px;
    margin-left: 30%;
    margin-right: 30%;
    display: none;
}
#slot1, #slot2, #slot3{
    display: inline-block;
    margin-top: 5px;
    margin-left: 15px;
    margin-right: 15px;
    background-size: 150px 150px;
    width: 150px;
    height: 150px;
}
        .a1{
        background-image: url("/bingo/tyfclwvdqj_1590123489.gif");
    }
        .a2{
        background-image: url("/bingo/qjdvydqauv_1590123551.gif");
    }
        .a3{
        background-image: url("/bingo/8movu4jf6j_1590123600.gif");
    }
        .a4{
        background-image: url("/bingo/okbw6r4lrd_1590123663.gif");
    }
        .a5{
        background-image: url("/bingo/fabdwsm3a1_1590123701.gif");
    }
        .a6{
        background-image: url("/bingo/yo2nq0tetp_1590123728.gif");
    }
        .a7{
        background-image: url("/bingo/lwvppqp6s3_1590123764.gif");
    }
            .a8{
        background-image: url("/bingo/1000.gif");
    }
                .a9{
        background-image: url("/bingo/2000.gif");
    }
                    .a10{
        background-image: url("/bingo/40.gif");
    }
                        .a11{
        background-image: url("/bingo/80.gif");
    }
/*.a1{
    background-image: url("/res/tiles/seven.png");
}
.a2{
    background-image: url("/res/tiles/cherries.png");
}
.a3{
    background-image: url("/res/tiles/club.png");
}
.a4{
    background-image: url("/res/tiles/diamond.png");
}
.a5{
    background-image: url("/res/tiles/heart.png");
}
.a6{
    background-image: url("/res/tiles/spade.png");
}
.a7{
    background-image: url("/res/tiles/joker.png");
}*/
</style>
<div class="sa-mainsa">
  <div class="container">
              <div class="sa-lprod">
            <div class="sa-lpmain">


                        <div class="sl-produl clearfix">
<meta name="csrf-token" content="ukzEkN9kXqbUFz4UWIc8UqvyOe4JsLlF4lNOlOEk">
<div class="c-content-title-1 pd50">
    <h3 class="text-center">Bảo Trì!!! <?php $dulieutile = $db->query("SELECT * FROM `HK_tilebingo`")->fetch(); echo number_format($dulieutile[wheel_price]);?><sup>VNĐ</sup></h3>
    <div class="c-line-center c-theme-bg"></div>
</div>
<div class="col-lg-1 col-md-hidden"></div>
<div id="boxfull" class="col-lg-6 col-md-12">
    <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">

        <div class="row-flex-safari game-list" style="margin-bottom: 40px">
            <main>
                <section id="status"></section>
                <section id="Slots">
                    <div id="slot1" class="a1"></div>
                    <div id="slot2" class="a1"></div>
                    <div id="slot3" class="a1"></div>
                </section>
                <section id="Gira">CHƠI NGAY</section>
            </main>
        </div>
    </div>
</div>
<div class="col-lg-1 col-md-hidden"></div>
<div class="col-lg-3 col-md-12 col-sm-12 btn-right">
    <!-- <div class="btn-top"> -->
    <div class="text-center">           
                            <h3 class="num-play">Bạn còn <span><?php echo number_format($TMQ['cash']);?></span> VNĐ.</h3>
                                          <a style="" class="ani-zoom btn-img deposit-btn disabled" href="/nap-the-tu-dong" ><img src="https://accgame24h.vn/anh/mualuot.png" alt=""></a>

                                                          </a>
    </div>
    <br>
    <a href="#" class="col-xs-12 thele btn btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">
        <span>
            <i class="la la-cloud-upload"></i>
            <span>Thể Lệ</span>
        </span>
    </a>
  
    <a href="/history/bingo.html" class="col-xs-12 btn btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">
        <span>
            <i class="la la-cloud-upload"></i>
            <span>Lịch sử quay trúng vật phẩm</span>
        </span>
    </a>
   
    <a href="/user/withdrawruby/2" class="col-xs-12 btn btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">
        <span>
            <i class="la la-cloud-upload"></i>
            <span>Rút vật phẩm</span>
        </span>
    </a>
   <!-- <a href="/user/withdrawservice/0" class="col-xs-12 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
        <span>
            <i class="la la-cloud-upload"></i>
            <span>Rút dịch vụ</span>
        </span>
    </a>-->
        
    <div class="text-center"> &nbsp</div>
    <!-- </div> -->
</div>

</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="theleModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thể Lệ</h4>
            </div>

            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                <p><span style="color:#2980b9"><strong>1 Lần Quay <?php $dulieutile = $db->query("SELECT * FROM `HK_tilebingo`")->fetch(); echo number_format($dulieutile[wheel_price]);?><sup>VNĐ</sup> - KHI BẠN C&Oacute; ĐỦ <?php $dulieutile = $db->query("SELECT * FROM `HK_tilebingo`")->fetch(); echo number_format($dulieutile[wheel_price]);?><sup>VNĐ</sup> BẠN CHỈ CẦN NHẤP QUAY L&Agrave; N&Oacute; QUAY</strong></span></p>

<p><span style="color:#2980b9"><strong>Khi 3 &ocirc; qu&agrave; tr&ugrave;ng nhau l&agrave; bạn sẽ tr&uacute;ng giải , &ocirc; qu&agrave; lệch nhau l&agrave; bạn đ&atilde; kh&ocirc;ng tr&uacute;ng nh&eacute;</strong></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".thele").on("click", function(){
            $("#theleModal").modal('show');
        })
        $(".uytin").on("click", function(){
            $("#uytinModal").modal('show');
        })
        $(".luotquay").on("click", function(){
            $("#luotquayModal").modal('show');
        })
    });
</script>
<div class="modal fade" id="uytinModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Uy Tín</h4>
            </div>

            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                <p><span style="color:#27ae60"><strong>shop ch&iacute;nh chủ Nam Lầy</strong></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="luotquayModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Lượt chơi gần đây</h4>
            </div>

            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                                Đang cập nhật...
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                </div>

                <div class="modal-footer">
                    <a href="/html/kimcuong" id="btnWithdraw" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill" >Rút quà</a>
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    
    <input type="hidden" id="numgift" value="9">

    <input type="hidden" id="withdrawruby_1" value="Rút Mở Rương Kim Cương">
    <script>
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    if( isMobile.any() ) {
        $('#squaredesktop').remove();
        $('#boxfull').addClass('nopadding');
    }else{
        $('#squaremobile').remove();
    }
</script>
<script type="text/javascript">
    // alert('ok')
    document.addEventListener('touchmove', function (event) {
      if (event.scale !== 1) { event.preventDefault(); }
    }, false);
    
    var lastTouchEnd = 0;
    document.addEventListener('touchend', function (event) {
      var now = (new Date()).getTime();
      if (now - lastTouchEnd <= 300) {
        event.preventDefault();
      }
      lastTouchEnd = now;
    }, false);
    function animate(options) {

      var start = performance.now();

      requestAnimationFrame(function animate(time) {
        // timeFraction от 0 до 1
        var timeFraction = (time - start) / options.duration;
        if (timeFraction > 1) timeFraction = 1;

        // текущее состояние анимации
        var progress = options.timing(timeFraction)
        
        options.draw(progress);

        if (timeFraction < 1) {
          requestAnimationFrame(animate);
        }

      });
    }
</script>
<script type="text/javascript">
$(document).ready(function(e){
    var roll_check = true;
    var num_loop = 3;
    var num = 0;
    var num_current = 0;
    var target = 0;
    $('#Gira').click(function(){
        if(roll_check){
            num = 0;
            num_current = 0;
            roll_check = false;
            $.ajax({
                url: '/ajax/bingo.php',
                datatype:'json',
                data:{
                },
                type: 'post',
                success: function (data) {
                                                        var data = jQuery.parseJSON(data);

                    if(data.status=='ERROR'){
                        roll_check = true;
                        $('.content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        return;
                    }
                    if(data.status=='LOGIN'){
                        location.href='/dang-nhap.php';
                        return;
                    }
                    gift_detail = data.msg;
                    num_roll_remain = data.num_roll_remain;
                    if(data.locale == 1){
                        var num1 = parseInt(data.pos)+1;
                        var num2 = num1 + 1;
                        if(num2 > parseInt(11)){
                            num2 = num2 - parseInt(11);
                        }
                        var num3 = num2 + 1;
                        if(num3 > parseInt(11)){
                            num3 = num3 - parseInt(11);
                        }
                    }else{
                        var num1 = parseInt(data.pos)+1;
                        var num2 = parseInt(data.pos)+1;
                        var num3 = parseInt(data.pos)+1;
                    }
                    doSlot(num1,num2,num3,num_roll_remain);
                },
                error: function(){
                    $('.content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    })

    function doSlot(one, two, three, num_roll_remain){
        document.getElementById("slot1").className='a1'
        document.getElementById("slot2").className='a1'
        document.getElementById("slot3").className='a1'
        var numChanges = randomInt(1,4)*11;
        var numeberSlot1 = numChanges+one
        var numeberSlot2 = numChanges+2*11+two
        var numeberSlot3 = numChanges+4*11+three
        var i1 = 0;
        var i2 = 0;
        var i3 = 0;
        var sound = 0
        //status.innerHTML = "SPINNING"
        slot1 = setInterval(spin1, 50);
        slot2 = setInterval(spin2, 50);
        slot3 = setInterval(spin3, 50);
        function spin1(){
            i1++;
            if (i1>=numeberSlot1){
                clearInterval(slot1);
                return null;
            }
            slotTile = document.getElementById("slot1");
            if (slotTile.className=="a11"){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
        function spin2(){
            i2++;
            if (i2>=numeberSlot2){
                clearInterval(slot2);
                return null;
            }
            slotTile = document.getElementById("slot2");
            if (slotTile.className=="a11"){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
        function spin3(){
            i3++;
            if (i3>=numeberSlot3){
                clearInterval(slot3);
                testWin();
                return null;
            }
            slotTile = document.getElementById("slot3");
            if (slotTile.className=="a11"){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
    }

    function testWin(){
        roll_check = true;
        $("#btnWithdraw").show();
        console.log(gift_detail)
        if(gift_detail.locale == 1)
        {
            $("#btnWithdraw").hide();
        }
        else
        {
         
            
        }

        swal({
                                title: 'Trúng',
                                type: 'success',
                                text: gift_detail
                            });






        $('.num-play span').text(num_roll_remain);
    }

    $('body').delegate('.reLoad','click',function(){
        location.reload();
    })

    function randomExpert(min, max, expert, expert1){
        var value = Math.floor((Math.random() * (max-min+1)) + min);
        if(value == expert){
            randomExpert(min, max, expert, expert1);
        }
        if(value == expert1){
            randomExpert(min, max, expert, expert1);
        }
        return value;
    }

    function randomInt(min, max){
        return Math.floor((Math.random() * (max-min+1)) + min);
    }
});
</script>
<link rel="stylesheet" type="text/css" href="https://accgame24h.vn/src/bubbler4.css">
</div></div>

<?php
require_once('TMQ/end.php');
?>