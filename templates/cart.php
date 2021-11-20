<?php 
@session_start();
$title = 'Cart';
$ipv4 = $_SESSION['ipv4'];
if($_SESSION['login']==true){
	$email = $_SESSION['user_email'];
	// LẤY USER DATA
	$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
	$stmt->execute([$email]);
	if ($stmt->rowCount() === 1) {
		$user = $stmt->fetch();
		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_name = $user['name'];
		$user_avatar = $user['avatar'];
		$user_phone = $user['phone'];
		$user_password = $user['password'];
	}
}else{
	// LẤY USER DATA GUEST
	$email = $ipv4;
	$_SESSION['avatar'] = '../assets/img/default-user.png';
	$_SESSION['name'] = $ipv4;
}

// LẤY BAG DATA
$stmt = $conn->prepare("SELECT * FROM bag WHERE email='$email'");
$stmt->execute();
if ($stmt->rowCount() === 1) {
	$bag = $stmt->fetch();
	$bag_item = $bag['item'];
	$bag_item_id = $bag['item_id'];
    $bag_item_quantity = $bag['quantity'];
}
?>

<link href="../assets/css/cart.css" rel="stylesheet">
<link href="../assets/css/popup.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="content-center">
    <div class="background-content">
        <div class="member-information">
            <div class="logo-avt"><img src="<?php echo $_SESSION['avatar'] ?>" /></div>
            <h3 class="h3-dark content-center"><?php echo $_SESSION['name'] ?></h3>
        </div>
        <div id="order-products" class="row">
            <div class="col-12 grid-margin">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
									$total_price = 0;
									if ($bag_item==''){
										echo '
										<img style="width: 6rem; " src="../assets/img/media/bag-empty.png">
										<br>
										<span class="order-empty">'.$LANG_bag_empty.'</span>';
									}else{
                                        $bag_item = explode(',',$bag_item);
										$bag_item_id = explode(',',$bag_item_id);
                                        $bag_item_quantity = explode(',',$bag_item_quantity);
										$i = 0;
                                        $count_qtym = 0;
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
												$total_price += $item["price"];
											}
                                            // REMOVE PRODUCT FOLLOWING item_id ~ this.id
                                            echo ' 
                                            <div class="Cart-product">
                                            <div class="left-content">
                                                <input onclick="selectOne(this)" type="checkbox" name="product"
                                                    value="'.$item_price.'">
                                                <a href="../product/'.$item_id.'">
                                                    <img src="../uploads/products/'.$item_images.'">
                                                </a>
                                            </div>
                                            <div class="right-content">
                                                <div class="Erow">
                                                   <i id="'.$item_id[$i].'" onclick="remove_cart(this.id)" class="fas fa-times"></i> 
                                                </div>
                                                <div class="Crow">
                                                    <span> '.$item_type.'| '.$item_name.'</span>
                                                    <span>'.$item_brand.'</span>
                                                    <span class="price">'.s_PriceFormat($item_price).' ₫</span>

                                                    <div class="qtym">
                                                    <button onclick="var result = document.getElementById(`qtym'.$count_qtym.'`); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro > 1 ) result.value--;return false;" >-</button>
                                                    <input  id="qtym'.$count_qtym.'" type="number" value="'.$bag_item_quantity[$i].'" min="0" maxlength="12" size="4" readonly>
                                                    <button onclick="var result = document.getElementById(`qtym'.$count_qtym.'`); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;">+</button>
                                                    </div>
                                                    <span id="total_price">Total: '.s_PriceFormat($item_price).' ₫</span>

                                                </div>
                                            </div>
                                        </div>';
                                        $count_qtym++;
                                        }
                                    }
                                    ?>
                    <script>
                            function Totalprice(value){
                                console.log(value);
                            }
                    </script>

                    </div>
                </div>
            </div>
        </div>

        <div id="total-products" class="row total-product">
            <span style="margin-left: initial;"><input id="selectAllbutton" type="checkbox" onclick="selectAll(this);"
                    style="position:relative; display: inline;"> <?php echo $LANG_selectall ?> </span>
            <span class="total-payment-span"><?php echo $LANG_payment ?>: <p id="total-price-result"
                    style="display: inline;"></p> ₫</span>
            <span class="checkout-span"><button id="checkout" class="checkout-button"><?php echo $LANG_checkout ?> (<p
                        id="quantity-result" style="display: inline;"></p>)</button></span>
        </div>
    </div> <!--  // backgound content -->
</section>
</body>
</div>

<div class="pop-up checkout">
    <div class="content">
        <div class="container">
            <span class="close">close</span>
            <div class="title">
                <h1><?=$LANG_checkout;?></h1>
            </div>
            <div id="checkout-content" class="checkout-content">
            </div>
        </div>
    </div>
</div>
<style>
.pop-up .content .container {
    padding: 2em;
}

.pop-up {
    min-width: 350px;
}

.checkout-content {
    text-align: left;
}
</style>
<script type="text/javascript">
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
            $("#globalbar").load(location.href + " #globalbar>*", "");
            $("#order-products").load(location.href + " #order-products>*", "");
            $("#total-products").load(location.href + " #total-products>*", "");
            //reset sum spice | varible js
            sum_price = 0;
            quantity = 0;
        });
}
</script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/total-price.js"></script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/total-product-ispined.js"></script>

</html>
<?php include('includes/footer.php'); ?>