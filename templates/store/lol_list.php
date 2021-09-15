<script>
                status = 1;
                int_1 = 0;
                int_2 = 0;
                int_3 = 0;
                int_4 = 0;
                int_5 = 0;
                high_light = "";
                varchar_1 = "";
                varchar_2 = "";
                varchar_3 = "";
                varchar_4 = "";
                varchar_5 = "";
                longtext_1 = "";
                longtext_2 = "";
                longtext_3 = "";
                server = 1;
                game = 1;
                page = 1; 
</script>
<div class="all"> 
<section class="content homepage content-boxed">

<div class="clip_pr">
                    <iframe width="650" height="250"
                    src="<?php echo $data_site['video_home']; ?>">
                    </iframe>
                    <div class="pr_profile">



                        <div class="banner_auto_buy">
                           <br/>
                            <div class="list_auto_buy">
                                <table id="list_auto_buy">
    <?php                                
    $sql_get_list_buy = "SELECT * FROM `history_buy` ORDER BY `time` DESC LIMIT 15";
    if ($db->num_rows($sql_get_list_buy)){
        foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_buy){   
    ?>
                                    <tr>
                                        <td style="width: 40%;"><p><a href="https://facebook.com/<?php echo $data_buy['username']; ?>" target="_blank"><?php echo $data_buy['name']; ?></a></p></td>
                                        <td style="width: 13%;"><a href="<?php echo $_DOMAIN.''.$data_buy['id_post']; ?>.html" target="_blank">#<?php echo $data_buy['id_post']; ?></a></td>
                                        <td style="width: 22%;"><span><?php echo number_format($data_buy["price"], 0, '.', '.'); ?>đ</span></td>
                                        <td style="width: 25%;"><?php echo time_elapsed_string($data_buy['time']); ?></td>
                                    </tr>
    <?php
    }   }
    ?>
                              </table>
                            </div>
                        </div>
                        <img style="margin: 0;margin-top: -15px;" src="assets/img/header/list.png"/>






                    </div>
                    <div class="clear"></div>
                </div>


                <div class="menu_top">
                    <div class="middle">
                        <ul>
                                                            <li onclick="location.href='/LMHT'" class="">Liên Minh</li>
                                <li onclick="location.href='/LQM'" class="">Liên Quân</li>
                                <li onclick="location.href='/FIFA'" class="">FIFA</li>
                                <li onclick="location.href='/CF'" class="">CF</li>
                                                        <div class="clear"></div>
                        </ul>
                    </div>
                    <div class="right">
                        <button class="active" onclick="fitler_div(this)">Bộ Lọc</button>
                    </div>
                    <div class="clear"></div>
                </div>

                <div style="display: block;" class="fitler">
                    <ul>
                        <li style="display:block;width: 100%;margin-right:0"><p>Mức giá</p><div id="ranged-value" style="width: 100%;"></div></li>
                    </ul>
                    <ul>
                                                    <li><p>Số IP tối thiểu</p><input class="only_num" onkeyup="format_price(this)" maxlength="20" id="int_3" value="" /></li>
                            <li>
                                <p>Số bảng ngọc tối thiểu</p>
                                <select id="int_4">
                                                                        <option selected=''>0</option>
                                                                        <option >1</option>
                                                                        <option >2</option>
                                                                        <option >3</option>
                                                                        <option >4</option>
                                                                        <option >5</option>
                                                                        <option >6</option>
                                                                        <option >7</option>
                                                                        <option >8</option>
                                                                        <option >9</option>
                                                                        <option >10</option>
                                                                        <option >11</option>
                                                                        <option >12</option>
                                                                        <option >13</option>
                                                                        <option >14</option>
                                                                        <option >15</option>
                                                                        <option >16</option>
                                                                        <option >17</option>
                                                                        <option >18</option>
                                                                        <option >19</option>
                                                                        <option >20</option>
                                                                    </select>
                            </li>
                            <li><p>Số tướng tối thiểu</p><input class="only_num" onkeyup="format_price(this)" maxlength="20" id="int_1" value="" /></li>
                            <li>
                                <p>Rank tối thiểu</p>
                                <select id="int_5" name="int_5">
                                    <option value="0">Không cần rank</option>
                                                                            <option  value="2">Đồng V</option>
                                                                            <option  value="3">Đồng IV</option>
                                                                            <option  value="4">Đồng III</option>
                                                                            <option  value="5">Đồng II</option>
                                                                            <option  value="6">Đồng I</option>
                                                                            <option  value="7">Bạc V</option>
                                                                            <option  value="8">Bạc IV</option>
                                                                            <option  value="9">Bạc III</option>
                                                                            <option  value="10">Bạc II</option>
                                                                            <option  value="11">Bạc I</option>
                                                                            <option  value="12">Vàng V</option>
                                                                            <option  value="13">Vàng IV</option>
                                                                            <option  value="14">Vàng III</option>
                                                                            <option  value="15">Vàng II</option>
                                                                            <option  value="16">Vàng I</option>
                                                                            <option  value="17">Bạch Kim V</option>
                                                                            <option  value="18">Bạch Kim IV</option>
                                                                            <option  value="19">Bạch Kim III</option>
                                                                            <option  value="20">Bạch Kim II</option>
                                                                            <option  value="21">Bạch Kim I</option>
                                                                            <option  value="22">Kim Cương V</option>
                                                                            <option  value="23">Kim Cương IV</option>
                                                                            <option  value="24">Kim Cương III</option>
                                                                            <option  value="25">Kim Cương II</option>
                                                                            <option  value="26">Kim Cương I</option>
                                                                            <option  value="27">Cao Thủ</option>
                                                                            <option  value="28">Thách Đấu</option>
                                                         
                                </select>
                            </li>
                            <li><p>Sỡ hữu trang phục ( ngăn bằng dấu phẩy) </p><input placeholder="Riven Quán Quân, Riot Graves" id="longtext_1" value="" /></li>
                            <li><p>Số trang phục tối thiểu</p><input class="only_num" onkeyup="format_price(this)" maxlength="20" id="int_2" value="" /></li>
                            <li>
                                <p>Khung hiện tại</p>
                                <select id="varchar_1" name="varchar_1">
                                    <option value="">Không cần khung</option>
                                    <option value="0">Không khung</option>
                                    <option value="1">Khung Bạc</option>
                                    <option value="2">Khung Vàng</option>
                                    <option value="3">Khung Bạch Kim</option>
                                    <option value="4">Khung Kim Cương</option>
                                    <option value="5">Khung Cao Thủ</option>
                                    <option value="6">Khung Thách Đấu</option>
                                </select>
                           </li>
                           <li><p>Sỡ hữu tướng ( ngăn bằng dấu phẩy , không dấu ) </p><input placeholder="Riven,Graves" id="longtext_2" value="" /></li>
                                           </ul>
                    <div class="clear"></div>
                    <button onclick="fitler();" class="button_fitler hover_red">Tìm kiếm</button>
                    <div class="clear"></div>
                </div>




    
                <div style="display: block;" class="list_account"></div>
                <div id="loading">
                    <img src="assets/images/loading.gif" />
                </div>
            </div>
</section>
</div>
        <script>
            $(".game_opt_"+server).show();
            var s3 = $("#ranged-value").freshslider({
                range: true,
                step:50000,
                max:10000000,
                value:[0, 10000000],
                onchange:function(low, high){
                    min_price = low;
                    max_price = high;
                    $('.fss-left').text(addCommas($('.fss-left').text()+"đ"));
                    $('.fss-right').text(addCommas($('.fss-right').text()+"đ"));
                }
            });
            min_price = 0;
            max_price = 10000000;
            function fitler_div(button){
                    if($(".fitler").css("display") == "block"){
                        $(button).removeClass("active");
                        $(".fitler").slideUp(1000);
                    } else {
                        $(button).addClass("active");
                        $(".fitler").slideDown(1000);
                    }
                
            }
            function load_account(){
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/results.php", { status : status , min_price : min_price , max_price : max_price , int_1 : int_1 , int_2 : int_2 , int_3 : int_3 , int_4 : int_4 , int_5 : int_5 , high_light : high_light , varchar_1 : varchar_1 , varchar_2 : varchar_2 , varchar_3 : varchar_3 , varchar_4 : varchar_4 , varchar_5 : varchar_5 , longtext_1 : longtext_1 , longtext_2 : longtext_2 , longtext_3 : longtext_3 , server : server , page : page })
                .done(function(data) {
                    $(".list_account").html('');
                    $('.list_account').empty().append(data);
                    $("#loading").hide();
                    $(".list_account").show();   
                }); 
            }
            function format_price(div) {
                x = $(div).val();
                x = x.replace(/\./g,'');
                num = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $(div).val(num);
            }
            function fitler(){
                int_1 = $("#int_1").val();
                int_2 = $("#int_2").val();
                int_3 = $("#int_3").val();
                int_4 = $("#int_4 option:selected").val();
                int_5 = $("#int_5 option:selected").val();
                varchar_1 = $("#varchar_1 option:selected").val();
                longtext_1 = $("#longtext_1").val();
                longtext_2 = $("#longtext_2").val();
                load_account();                                                                                                                                          
            }
            $(document).ready(function (){
                $(".only_num").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) || 
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                $(".middle ul li").click(function(){
                    $(".middle ul li").removeClass("active");
                    $(this).addClass("active");
                    status = $(this).attr("target");
                    load_account();
                });
            });

            load_account();
        </script>
