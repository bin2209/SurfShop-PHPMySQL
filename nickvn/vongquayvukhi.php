
<?php
require_once('TMQ/function.php');
require_once('TMQ/head.php');
?>
<div class="c-layout-page">

<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
<link href="assets/frontend/vongquay/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/frontend/vongquay/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
<link href="assets/frontend/vongquay/css/style.css" rel="stylesheet" type="text/css" />
<style>
    .ui-autocomplete {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .input-group-addon {
            background-color: #FAFAFA;
        }

        .input-group .input-group-btn > .btn, .input-group .input-group-addon {
            background-color: #FAFAFA;
        }

        .modal {
            text-align: center;
        }

        @media        screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .c-layout-header-fixed.c-layout-header-topbar .c-layout-page {
                margin-top: 245px;
            }
        }

        @media        screen and (max-width: 767px) {
            .modal-dialog:before {
                margin-top: 75px;
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }

            .modal-dialog {
                width: 100%;

            }

            .modal-content {
                margin-right: 20px;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;


        }

        .mfp-wrap {
            z-index: 20000 !important;
        }

        .c-content-overlay .c-overlay-wrapper {
            z-index: 6;
        }

        .z7 {
            z-index: 7 !important;
        }
        
        
        
        
        
    .nickdaquay{position:fixed;
    z-index:9999;
    bottom:170px;
    right:0px;
    max-width: 15%;
    min-width: 120px;
    min-height: 120px;}
    .anhbymanh{position:fixed;
    z-index:9999;
    bottom:80px;
    left:0px;
    max-width: 29%;
    min-height: 20px;}
    .napthebymanh{position:fixed;
    z-index:9999;
    bottom:100px;
    right:0px;
    max-width: 15%;
    min-height: 40px;
    min-width: 100px;
    }
    .flex-list .item {
        width: 50%;
        padding: 0 30px;
    }
        .rotation {
        text-align: center;
    }
    section {
        padding: 30px 0;
    }
        .rotation .play-spin {
        width: 100%;
        position: relative;
        margin: 0 auto;
    }
    .rotation .play-spin .ani-zoom {
        position: absolute;
        display: block;
        width: 110px;
        z-index: 5;
        top: calc(50% - 70px);
        left: calc(50% - 55px);
    }
    .ani-zoom {
        -webkit-transition: all .2s linear;
        -moz-transition: all .2s linear;
        -ms-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }
    img {
        max-width: 100%;
    }
    img {
        vertical-align: middle;
    }
    img {
        border: 0;
    }
    .text-center {
        text-align: center;
    }
    li{
        list-style: none;
    }

    .form-notication-bottom {
    position: fixed;
    bottom: 20px;
    left: 10px;
    width: 330px;
    height: auto;
    background-color: #fff;
    border-radius: 40px;
    z-index: 1;
    box-shadow: 2px 2px 10px 2px hsla(0,0%,60%,.2);
    animation: example 8s infinite;
    max-width: calc(90% - 10px);
    overflow: hidden;
}


@keyframes    example{0%{bottom: -100px;}25%{bottom: 20px;} 50%{bottom: 20px;}100%{bottom: -100px;}}

li {
    list-style-type: none
}
.history {
    width: 40% !important;
}
@media    only screen and (max-width: 800px) {
    .c-content-client-logos-slider-1 .item {
        width: 90%;
    }
    
    #rotate-play {
        width: 100% !important;
        max-width: 100% !important;
    }
    .rotation .play-spin .ani-zoom img {
        width: 85% !important;
    }
    .history {
        width: 100% !important;
    }
}
.c-content-box.c-size-md{
    padding: 0
}
.pd50{
    padding-top: 50px;
}
.list-roll{
    margin-top: 30px;
    margin-bottom: 30px;
}

@media    screen and (min-width: 800px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 400px;
        overflow-y: scroll;
        margin:0 auto;
    }
}

@media    screen and (min-width: 1600px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 600px;
        overflow-y: scroll;
        margin:0 auto;
    }
}
.btn-top{
    display: flex;
    justify-content: center;
    margin-bottom: 30px
}
.btn-top .btn{
    margin-left: 15px;
    margin-right: 15px;
    padding: 6px 20px;
}
.btn-top span{
    font-size: 25px;
}
@media    screen and (max-width: 640px) {
    .btn-top span{
        font-size: 17px;
    }
}
</style>
<meta name="csrf-token" content="Vwf0qspiSOkrrb5czPeVwcSkMfeiyBPmW2qMvSaD">
<div class="c-content-title-1 pd50">
<h3 class="c-center c-font-uppercase c-font-bold">Vòng Quay Vũ Khí ước Mơ </h3>
<div class="c-line-center c-theme-bg"></div>
</div>
<div class="col-lg-6 col-md-12">
<div class="c-content-box c-size-md c-bg-white">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
<div class="row row-flex-safari game-list" style="display: flex; flex-wrap: wrap">
<div class="item item-left">
<section class="rotation">
<div class="play-spin">
<a class="ani-zoom" id="start-played1"><img src="/assets/frontend/vongquay/image/IMG_3478.png" alt="Play Center"></a>
<img style="width: 80%;max-width: 80%;opacity: 1;" src="https://shophaidang.vn/upload-usr/images/PVLSMxVKh4_1589097215.png" alt="Play" id="rotate-play">
</div>

</section>
</div>
</div>
<div class="table-body scrollbar-inner">
<table class="table table-bordered">
<tbody></tbody>
</table>
</div>
</div>

</div>
</div>
<div class="col-lg-6 col-md-12 list-roll">
<div class="btn-top">
<a href="#" class="thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Thể Lệ</span>
</span>
</a>
<a href="/user/withdrawruby/2?withdraw_type=1" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Rút VP</span>
</span>
</a>
<a href="/rubywheel/logacc/2907" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Lịch sử quay</span>
</span>
</a>
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
    <b>Mỗi Lần Quay Bạn Sẽ Phải Tốn <i><font color='red'>17.000Đ</font></i> Để Quay</b><br>
    <b>Các Phần Quà Sẽ Tương Ứng Với Mốc Quay (VD: Bạn Quay Trúng 150 KiM Cương Thì Bạn Sẽ Được Cộng 150 Kim Cương Vào Tài Khoản)</b><br>
    <b>Nếu Bạn Quay Trúng Phần Quà Du Lịch Mùa Hè Thì Phần Quà Đấy Nghĩa Là <i>Chúc Bạn May Mắn Lần Sau ^^.</i></b>
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
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<div class="c-content-title-1" style="margin: 0 auto">
<h3 class="c-center c-font-uppercase c-font-bold">LƯỢT QUAY GẦN ĐÂY</h3>
</div>
<div class="list-roll-inner">
<table cellpadding="10" class="table table-striped">
<tbody>
<tr>
<th>Tài khoản</th>
<th>Giải thưởng</th>
<th>Thời gian</th>
</tr>
</tbody>
<tbody>

<?php
$get = $db->query("SELECT * FROM `CVH_quayvk` WHERE `kimcuong` != '0' ORDER BY id DESC LIMIT 0,20");
if($get != null){
foreach($get as $ls){
?>			<tr>
<td><?= str_replace( substr(($ls['nguoiquay']), -3), '***', ($ls['nguoiquay']) );?></td>
<td><?=number_format($ls['kimcuong']);?> Kim cương</td>
<td><?=$ls['date'];?></td></tr>
<?php }
 }else{?>
     <tr>
     <td>Không có lượt quay nào gần đây.</td>
<td>Không có lượt quay nào gần đây.</td>
<td>Không có lượt quay nào gần đây.</td></tr>
<?
 } ?>

</tbody>
</table>
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
<div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
àdsafdsafdsaf
</div>
<div class="modal-footer" id="kimhung">
<!--a href="/user/withdrawruby/2?withdraw_type=1" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">Rút quà</a>-->
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<style type="text/css">
        #start-played1{
            cursor: pointer;
        }
        .c-content-client-logos-slider-1 .item{
            width: 85%;
        }
    </style>
<input type="hidden" id="ID_NROGEM" value="1802">
<input type="hidden" id="ID_NROCOIN" value="1801">
<input type="hidden" id="ID_NINJAXU" value="1795">
<input type="hidden" id="withdrawruby_1" value="Rút Quân Huy LQ">
<input type="hidden" id="withdrawruby_2" value="Rút Kim Cương FF">
<input type="hidden" id="withdrawruby_3" value="Rút +UC ( PUBG MB )">
<input type="hidden" id="withdrawruby_4" value="Rút +RP ( LMHT )">
<input type="hidden" id="withdrawruby_5" value="Rút Gem CF Mobile">
<input type="hidden" id="withdrawruby_6" value="Rút quà rương sohacoin ( làng lá )">
<input type="hidden" id="withdrawruby_7" value="Rút Quà Point (zingspeed mobile)">
<input type="hidden" id="withdrawruby_8" value="Rút Quà FC (FIFA ONLINE 4)">
<input type="hidden" id="numgift" value="8">
<script type="text/javascript">
    $(document).ready(function(e){
    var numrollbyorder = 0;
    var roll_check = true;
    var num_loop = 4;
    var angle_gift = '';
    var num_gift = $("#numgift").val();
    var gift_detail = '';
    var num_roll_remain = 0;
    var angles = 0;
    //Click nút quay
    $('body').delegate('#start-played1', 'click', function(){
        if(roll_check){
            roll_check = false;
            $.ajax({
                url: '/ajax/vongquayvukhi.php',
                type: 'post',
                    dataType: 'JSON',
                    data: {type: "so20k"},
                    success: function (data) {
                    if(data.status=='ERROR'){
                        roll_check = true;
                        $('#rotate-play').css({"transform": "rotate(0deg)"});
                        $('.content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        return;
                    }
                    if(data.status=='LOGIN'){
                        location.href='/dang-nhap.php';
                        return;
                    }
                    
					numrollbyorder = parseInt(data.numrollbyorder) + 1;
                    gift_detail = data.msg;
                    num_roll_remain = gift_detail.num_roll_remain;
                    $('#rotate-play').css({"transform": "rotate(0deg)"});
                    angles = 0;
                    angle_gift = gift_detail.pos*(360/num_gift);
                    loop();
                },
                error: function(){
                    $('.content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    });

    function loop() {
        $('#rotate-play').css({"transform": "rotate("+angles+"deg)"});
        
        if((parseInt(angles)-10)<=-(((num_loop*360)+angle_gift))){
            angles = parseInt(angles) - 2;
        }else{
            angles = parseInt(angles) - 10;
        }
        
        if(angles >= -((num_loop*360)+angle_gift)){
            requestAnimationFrame(loop);
        }else{
            roll_check = true;
                    
            $("#btnWithdraw").show();
            if(gift_detail.locale == 1)
            {
                $("#btnWithdraw").hide();
            }
            else
            {
                if(gift_detail.input_auto == 0)
                {
                    $("#btnWithdraw").html("Rút "+$("#withdrawruby_"+gift_detail.is_ruby).val());
                    $("#btnWithdraw").attr('href','/user/withdrawruby/'+gift_detail.is_ruby+"?withdraw_type=1");
                }
                else if(gift_detail.input_auto == 1)
                {
                    $("#btnWithdraw").html("Kiểm tra nick trúng");
                    $("#btnWithdraw").attr('href','/slotmachine/logaccgame/29'+1265);
                }
                else if(gift_detail.input_auto == $("#ID_NROCOIN").val())
                {
                    $("#btnWithdraw").html("Rút vàng");
                    $("#btnWithdraw").attr('href','/user/withdrawservice/'+$("#ID_NROCOIN").val()+"?withdraw_type=1");
                }
                else if(gift_detail.input_auto == $("#ID_NROGEM").val())
                {
                    $("#btnWithdraw").html("Rút ngọc");
                    $("#btnWithdraw").attr('href','/user/withdrawservice/'+$("#ID_NROGEM").val()+"?withdraw_type=1");
                }
                else if(gift_detail.input_auto == $("#ID_NINJAXU").val())
                {
                    $("#btnWithdraw").html("Rút xu");
                    $("#btnWithdraw").attr('href','/user/withdrawservice/'+$("#ID_NINJAXU").val()+"?withdraw_type=1");
                }
                else if(gift_detail.input_auto == 2){
                    $("#btnWithdraw").html("Load lại trang");
                    $("#btnWithdraw").removeAttr("href");
                    $("#btnWithdraw").addClass('reLoad');
                }else
                {
                    $("#btnWithdraw").hide();
                }
                
            }
            $('.content-popup').text('Kết quả: '+gift_detail.name);
            $('#noticeModal').modal('show');
            $('.num-play span').text(num_roll_remain);
            if(num_roll_remain==0){
                $('.deposit-btn').show();
            }else{
                $('.deposit-btn').hide();
            }
        }
    }
});

    $('body').delegate('.reLoad','click',function(){
        location.reload();
    })
</script>


</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script><div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>

<?php
require_once('TMQ/end.php');
?>