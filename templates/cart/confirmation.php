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

if (isset($_GET['orderToken'])){
    $orderToken = $_GET['orderToken'];
    $stmt = $conn->prepare("SELECT * FROM `order` WHERE token='$orderToken'");
    $stmt->execute();
    if ($stmt->rowCount()===1){
        $order = $stmt->fetch();
        $order_id = $order['id'];
        $order_bag_item = $order['bag_item'];
        $order_bag_item_quantity = $order['bag_item_quantity'];
        $order_total_price = $order['total_price'];
        $order_guest_name = $order['guest_name'];
        $order_guest_street = $order['guest_street'];
        $order_guest_building = $order['guest_building'];
        $order_guest_province = $order['guest_province'];
        $order_guest_district = $order['guest_district'];
        $order_guest_ward = $order['guest_ward'];
        $order_guest_email = $order['guest_email'];
        $order_guest_phone = $order['guest_phone'];
        $order_payment_method = $order['payment_method'];
        $order_time = $order['time'];
        // LÀM TRÓNG GIỎ HÀNG
        $stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
        $stmt->execute([$email]);
        if ($stmt->rowCount()===1){
            $bag = $stmt->fetch();
            $bag_item = $bag['item'];
            if ($bag_item!=''){
                $stmt = $conn->prepare("UPDATE `bag` SET `item_id`='',`item`='',`quantity`='' WHERE email=?");
                $stmt->execute([$email]);
                echo '<script>$("#globalbar").load(location.href+" #globalbar>*","");</script>';
            }
        }
    }else{
        // back to home
        // echo '';
    }
}
?>
<link href="../assets/css/cart.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/data-location.js"></script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/validate/validate.rules.js"></script>
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
            <li class="active">PAYMENT</li>
            <li class="active">ORDER COMPLETE</li>
        </ul>
        <div id="Delivery" class="row">
            <h3 style="text-align:center !important;">ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC ĐẶT THÀNH CÔNG</h3>
            <span>Ngày đặt hàng: <?=$order_time?>s</span>
            <div class="owl-carousel">
                <?php
            $total_price = 0;
            $i = 0;
				if ($order_bag_item==''){
					echo '<script>window.location.href="/cart";<script/>';
				}else{
                    $order_bag_item = explode(',',$order_bag_item);
                    $order_bag_item_quantity = explode(',',$order_bag_item_quantity);
                    foreach ($order_bag_item as $item) {
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
                        $total_price_once = $item_price*$order_bag_item_quantity[$i];
                        $total_price += $total_price_once;
                        echo '<div class="Cart-product">
                        <div class="left-content">
                            <img src="../uploads/products/'.$item_images.'">
                            <div>x'.$order_bag_item_quantity[$i].'</div>
                        </div>
                        </div>
                        ';
                        $i++;
                    }
                }
                $_SESSION['total_price'] = $total_price; // Lưu tạm giá rồi xóa 
                ?>
            </div>
                <div class="Payment-content">
                    Mã đơn hàng: LST<?=$order_id?>
                    <br>
                    Xin chào <b><?=$order_guest_name?></b>, cảm ơn bạn đã mua sắm tại LSTSURF! Xác nhận đơn hàng đã được gửi đến <b><?=$order_guest_email?></b>.
                    <br>

                    <h3 style="margin: 16px 0 0;">SHIPPING ADDRESS</h3>
                    <div>
                    <?=$order_guest_name?>
                    <br>
                    <?php if($order_guest_building!=''){
                        echo $order_guest_building.' <br>';
                    }?>
                    <?=$order_guest_street?>, <?=$order_guest_ward?>, <?=$order_guest_district?>,  <?=$order_guest_province?>
                    <br>
                    <?=$order_guest_phone?>
                    </div>

                    <h3 style="margin: 16px 0 0;">CONTACT INFORMATION</h3>
                    <div>
                    <?=$order_guest_name?>
                    <br>
                    <?php if($order_guest_building!=''){
                        echo $order_guest_building.' <br>';
                    }?>
                    <?=$order_guest_street?>, <?=$order_guest_ward?>, <?=$order_guest_district?>,  <?=$order_guest_province?>
                    <br>
                    <?=$order_guest_phone?> <br>
                    <?=$order_guest_email?>
                    </div>

                    <div class="qrcode">
                    <?php
                    //QRCODE
                    //set it to writable location, a place for temp generated PNG files
                    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qrcode'.DIRECTORY_SEPARATOR;
                    //html PNG location prefix
                    $PNG_WEB_DIR = $_DOMAIN.'/templates/cart/qrcode/'; // thư mục chứa ảnh 
                    include "./QRcode/qrlib.php";   

                    // Cấu hình render QRCODE
                    $matrixPointSize = 3; // 1-10
                    $errorCorrectionLevel = 'H';
                    $DATA = $_DOMAIN.'/confirmation?orderToken='.$orderToken;
                    $filename = $PNG_TEMP_DIR.'qrcode'.md5($DATA.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                    QRcode::png($DATA, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    

                    if (!file_exists($PNG_TEMP_DIR)) mkdir($PNG_TEMP_DIR); // render ảnh
                    //display generated file
                    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  
                    ?>
                    <p>Save this QR code to order tracking every time, everywhere.</p>
                    </div>
                    <hr/>
                    
                </div>
                <br>
                <div style="width:100%;margin-top: 10px;">
                    <a href="/store"><button class="payment-radius checkout-button">Quay trở lại store</button></a>
                </div>
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
</html>
<?php include('includes/footer.php'); ?>