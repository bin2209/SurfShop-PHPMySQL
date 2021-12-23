<?php 
@session_start();
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
	$_SESSION['name'] = 'Guest';
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/validate/validate.rules.js"></script>
<link rel="stylesheet" href="<?php echo $_DOMAIN; ?>/assets/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $_DOMAIN; ?>/assets/owlcarousel/owl.theme.default.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<section class="content-center">
    <div class="background-content">
        <div class="member-information">
            <div class="logo-avt"><img src="<?=$_SESSION['avatar']?>" /></div>
            <h3 class="h3-dark content-center"><?=$_SESSION['name']?></h3>
        </div>
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">CART</li>
            <li class="active">DELIVERY</li>
            <li>PAYMENT</li>
            <li>ORDER COMPLETE</li>
        </ul>
        <div id="Delivery" class="row">
            <div class="owl-carousel">
                <?php
            $total_price = 0;
            $i = 0;
				if ($bag_item==''){
					echo '<script>window.location.href="/cart";<script/>';
				}else{
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
                            <img src="../uploads/products/'.$item_images.'">
                            <div>x'.$bag_item_quantity[$i].'</div>
                        </div>
                        </div>
                        ';
                        $i++;
                    }
                }
                   
                $_SESSION['total_price'] = $total_price; // Lưu tạm giá rồi xóa 
                ?>
            </div>
            <h3><?=$LANG_total;?>: <?=s_PriceFormat($total_price)?> ₫</h3>
            <h3>SHIPPING ADDRESS</h3>
            <form id="Delivery-form" method="POST" action="/payment">
                <input class="Delivery-address-input" type="text" name="FullName" placeholder="Full Name *">
                <input class="Delivery-address-input" type="text" name="StreetName"
                    placeholder="Street Number/Street Name *">
                <span for "">Example: 33 Le Duan street,...</span>
                <input class="Delivery-address-input" type="text" name="BuildingName"
                    placeholder="Building Name/ Floor Etc">
                <span for "">Example: Deutsches Haus; Block X1 - XYZ Apartment,...</span>
                <select class="Delivery-address-select" type="text" name="calc_shipping_provinces"
                    placeholder="Province *">
                </select>
                <select class="Delivery-address-select" type="text" name="calc_shipping_district"
                    placeholder="District *">
                </select>
                <input class="Delivery-address-input" type="text" name="Ward" placeholder="Ward">
                <span for "">Example: Ben Nghe ward, Ba Diem ward,...</span>
                <span><b>Country: Vietnam</b></span>
                <br>
                <h3>CONTACT INFORMATION</h3>
                <span>We'll use these details to keep you informed on your delivery.</span>
                <input class="Delivery-address-input" type="text" name="Email" placeholder="Email *">
                <input class="Delivery-address-input" type="text" name="Phone" placeholder="Phone Number *">
                <span for "">Example: 0912345678</span>
                <div class="dieukhoan">
                    <input class="Delivery-address-checkbox" name="dieukhoan1" type="checkbox">
                    <p for="dieukhoan1">My billing and delivery information are the same.</p>
                </div>
                <div class="dieukhoan">
                    <input class="Delivery-address-checkbox" name="dieukhoan2" type="checkbox">
                    <p for="dieukhoan2">Yes, I am over 15 years old.</p>
                </div>
                <div class="dieukhoan">
                    <input class="Delivery-address-checkbox" name="dieukhoan3" type="checkbox">
                    <p for="dieukhoan3">I have read, understood and accepted the Privacy Notice and Terms and
                        Conditions.</p>
                </div>
                <div style="width:100%;margin-top: 10px;">
                    <button id="checkout" type="submit"
                        class="payment-radius checkout-button"><?=$LANG_checkout?></button>
                </div>
            </form>
           
        </div>
    </div> <!--  // backgound content -->
</section>
</body>
</div>
<script type="text/javascript">
// Show lại product ở cart
$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 15,
    nav: true,
    slideSpeed: 10,
    navText: [
        '<i class="fas fa-chevron-left" style="font-size: 40px;"></i>',
        '<i class="fas fa-chevron-right" style="font-size: 40px;"></i>'
    ],

    autoplay: true,
    pagination: true,
    paginationSpeed: 200,
    slideSpeed: 300,
    autoplaySpeed: 300,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
})
</script>
<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/data-location.js"></script>
</html>
<?php include('includes/footer.php'); ?>