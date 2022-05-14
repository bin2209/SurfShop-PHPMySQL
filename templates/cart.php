
<link href="../assets/css/cart.css" rel="stylesheet">
<link href="../assets/css/popup.css" rel="stylesheet">
<style>
.pop-up .content .container { padding: 2em; } .pop-up { min-width: 350px; } .checkout-content { text-align: left; }
</style>
<section class="content-center">
    <div class="background-content">
        <div class="member-information">
            <div class="logo-avt"><img src="<?=$_SESSION['avatar']?>" /></div>
            <h3 class="h3-dark content-center"><?=$_SESSION['user_email']?></h3>

        <?php echo $_COOKIE[$cookie_name]; ?>
            
        </div>

        <div id="order-products" class="row">
            <div class="col-12 grid-margin">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                            $bag_item = $_SESSION['bag_item'];
                            $bag_item_id = $_SESSION['bag_item_id'];
                            $bag_item_quantity = $_SESSION['bag_quantity'];
                            $total_price = 0;
                            $i = 0;
							if ($bag_item==''){
								echo '<img style="width: 6rem; " src="../assets/img/media/bag-empty.png"><br>
										<span class="order-empty">'.$LANG_bag_empty.'</span>';
							}
                            else{
                                $bag_item = explode(',',$bag_item);
								$bag_item_id = explode(',',$bag_item_id);
                                $bag_item_quantity = explode(',',$bag_item_quantity);
                                foreach ($bag_item as $item) {
									$stmt = $conn->prepare("SELECT * FROM store WHERE id=?");
									$stmt->execute(array($item));
									if ($stmt->rowCount() === 1) {
										$item = $stmt->fetch();
										$item_id = $item["id"];
										$item_images = $item["images"];
                                        $item_type = $item["type"];
										$item_name = $item["name"];
										$item_price = $item["price"];
										$item_brand = $item["brand"];
                                    }
                                    // REMOVE PRODUCT FOLLOWING item_id ~ this.id
                                    $total_price_once = $item_price*$bag_item_quantity[$i];
                                    $total_price += $total_price_once;
                                    echo '<div class="Cart-product">
                                            <div class="left-content">
                                                <a href="../product/'.$item_id.'">
                                                    <img src="../uploads/products/'.$item_images.'">
                                                </a>
                                            </div>
                                            <div class="right-content">
                                                <div class="Erow">
                                                   <i id="'.$item_id.'" onclick="remove_cart(this.id)" class="fas fa-times"></i> 
                                                </div>
                                                <div class="Crow">
                                                    <span> '.$item_type.'| '.$item_name.'</span>
                                                    <span>'.$item_brand.'</span>
                                                    <span>'.s_PriceFormat($item_price).' ₫</span>

                                                    <div class="qtym">
                                                    <button id="'.$item_id.'" onclick="var result = document.getElementById(`qtym'.$i.'`); var qtypro = result.value; if (!isNaN(qtypro) && qtypro > 1) { result.value--; changeQuantity(this.id,`-1`); } else { return false; }" ><i class="fas fa-minus"></i></button>
                                                    <input  id="qtym'.$i.'" class="qtym" type="number" value="'.$bag_item_quantity[$i].'" min="0" maxlength="12" size="4" readonly>
                                                    <button id="'.$item_id.'" onclick="var result = document.getElementById(`qtym'.$i.'`); var qtypro = result.value; if (!isNaN(qtypro)) { result.value++; changeQuantity(this.id,`+1`); } else { return false; }"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                    <span id="total_price_once" class="price">Total: '.s_PriceFormat($total_price_once).' ₫</span>
                                                </div>
                                            </div>
                                        </div>';
                                    $i++;
                                }
                            }?>
                    </div>
                </div>
            </div>
        </div>
        <div id="total-products" class="row total-product">
            <span style="margin-left: initial;" class="total-payment-span"><?php echo $LANG_payment ?>: <p
                    style="display: inline;"><?=s_PriceFormat($total_price)?></p> ₫</span>
            <span class="checkout-span"><button id="checkout" class="checkout-button"
                    style="<?php if($soluongsanpham==0) echo'background-color:#646464;'?>"><?php echo $LANG_checkout ?> (<p
                        style="display: inline;"><?=$soluongsanpham?></p>)</button></span>
        </div>
    </div> <!--  // backgound content -->
</section>
</body>
</div>

<div id="pop-up" class="pop-up checkout">
    <div class="content">
        <div class="container">
            <span class="close">close</span>
            <div class="title">
                <h1><?=$LANG_checkout;?></h1>
            </div>
            <div id="checkout-content" class="checkout-content">
                <div>
                    <span><?=$soluongsanpham?> <?=$LANG_product?></span>
                    <br>
                    <form method="POST" action="/delivery">
                        <span><?=$LANG_price?>: </span><span style="font-weight:600;"><span
                                id="SumPrice-js"><?=s_PriceFormat($total_price)?></span>
                            ₫</span> <br>
                        <span><?=$LANG_Delivery_charges?>: </span>
                        <span style="font-weight:600;"><?=$LANG_Delivery_free?></span>
                        <br>
                        <hr>
                        <span style="font-weight:600;"><?=$LANG_total_pay?>: </span><span style="font-weight:600;"><span
                                id="TotalSumPrice-js"><?=s_PriceFormat($total_price)?></span>
                            ₫</span><br>
                        (<?=$LANG_Tax_included?>)
                        <input name="" style="display:none;">
                        <button type="submit" id="delivery" class="checkout-button"
                            style="width:100%; margin-top:10px;"><?=$LANG_checkout?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
quantity = <?=$soluongsanpham?>;
$(document).ready(function() {
    $("#checkout").click(function() {
        if (quantity == 0) {
            $('#checkout').css({
                "background-color": "#646464"
            });
        } else {
            $('.checkout').addClass('open');
            $('.content-center').addClass('blur-filter');
            $('footer').addClass('blur-filter');
        }
    });

    $('.pop-up .content .close').click(function() {
        $('.pop-up').removeClass('open');
        $('.content-center').removeClass('blur-filter');
        $('footer').removeClass('blur-filter');
    });
});

function changeQuantity($id, value) {
    $.post("<?php echo $_DOMAIN;?>/request/changeQuantity.php", {
            id: $id,
            value: value
        },
        function(data, status) {
            $("#globalbar").load(location.href+" #globalbar>*","");
        });
}

function remove_cart($id) {
    $.post("<?php echo $_DOMAIN;?>/request/removefrombag.php", {
            id: $id
        },
        function(data, status) {
            Swal.fire({
                icon: "success",
                text: "<?php echo $LANG_popup_deletebag; ?>",
                showConfirmButton: false,
                timer: 1500
            });
            $("#globalbar").load(location.href+" #globalbar>*","");
            $("#order-products").load(location.href+" #order-products>*","");
            
        });
}
</script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/total-product-ispined.js"></script>

</html>
<?php include('includes/footer.php'); ?>