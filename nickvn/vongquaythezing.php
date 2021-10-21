<?php
include'TMQ/function.php';
include'TMQ/head.php';
?>


<div class="c-layout-page">

<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
<link href="assets/frontend/vongquay/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/frontend/vongquay/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
<link href="assets/frontend/vongquay/css/style.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="9MOtaLcBhwyaRGPJgMjaCZCLGJCIfibfKkEdRP7W">
<div class="c-content-title-1 pd50">
<h3 class="c-center c-font-uppercase c-font-bold">Vòng Quay Thẻ Zing VNG</h3>
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
<img style="width: 80%;max-width: 80%;opacity: 1;" src="/kimhung/vongquaythezing.jpg" alt="Play" id="rotate-play">
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
<a href="/luckywheel/logacc8" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
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
<p style="text-align:center"><strong>1 Lần Quay = 20k , SỐ TIỀN SẼ TRỪ TIỀN THEO SỐ&nbsp;LẦN QUAY CỦA&nbsp;BẠN&nbsp;</strong></p>
<p style="text-align:center">C&aacute;c phần thưởng như thẻ <strong>Zing&nbsp;ngẫu nhi&ecirc;n</strong> đến thẻ <strong>Zing 500k</strong>&nbsp;<br />
<br />
Ch&uacute;c c&aacute;c bạn c&oacute; những gi&acirc;y ph&uacute;t giải tr&iacute; v&agrave; thư gi&atilde;n c&ugrave;ng v&ograve;ng quay may mắn&nbsp;</p>
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
$get = $db->query("SELECT * FROM `HK_quaythezing` WHERE `menhgia` != '0' ORDER BY id DESC LIMIT 0,20");
if($get != null){
foreach($get as $ls){
?>			<tr>
<td><?= str_replace( substr(($ls['nguoiquay']), -3), '***', ($ls['nguoiquay']) );?></td>
<td>Thẻ Zing Mệnh Giá <?=number_format($ls['menhgia']);?><sup>VNĐ</sup></td>
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
                type: 'post',
                url: '/ajax/vongquaythezing.php',
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
    </script>


</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
&lt;p style=&quot;text-align:center&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://shopmeowdgame.vn/upload/userfiles/images/meowww/hot.gif&quot; /&gt;CH&amp;Agrave;O MỪNG BẠN ĐẾN VỚI SHOP B&amp;Aacute;N NICK&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;https://shopmeowdgame.vn/upload/userfiles/images/meowww/hot.gif&quot; /&gt;&lt;/p&gt;
&lt;p style=&quot;text-align:center&quot;&gt;&lt;strong&gt;Cập nhật Tự Động C&amp;aacute;c Dịch Vụ của NPH Garena: &lt;a href=&quot;/mo-ruong-may-man&quot;&gt;Click Xem Ngay&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align:center&quot;&gt;&amp;nbsp;&lt;/p&gt;
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
include'TMQ/end.php';
?>