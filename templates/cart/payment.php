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
 <?php
              if ($_SERVER['REQUEST_METHOD']=='POST'){
                  if (isset($_POST['FullName'])){
                // POST DELIVERY
                $_SESSION['P_FullName'] = $_POST['FullName'];
                $_SESSION['P_StreetName'] = $_POST['StreetName'];
                $_SESSION['P_BuildingName'] = $_POST['BuildingName'];
                $_SESSION['P_calc_shipping_provinces'] = $_POST['calc_shipping_provinces'];
                $_SESSION['P_calc_shipping_district'] = $_POST['calc_shipping_district'];
                $_SESSION['P_Ward'] = $_POST['Ward'];
                $_SESSION['P_Email'] = $_POST['Email'];
                $_SESSION['P_Phone'] = $_POST['Phone'];
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
            <li>ORDER COMPLETE</li>
        </ul>
        <div id="Delivery" class="row">
            <h3><?=$LANG_payment_method?></h3>
            <span>All transactions are safe and secure</span>
            <form id="Payment-form" method="POST">
                <div class="Payment-radio">
                    <input type="radio" name="payment-method" value="CASH_ON_DELIVERY" checked="">
                    <p style="margin-right:10px"><?=$LANG_Cash_on_delivery?></p>
                    <img src="<?=$_DOMAIN?>/assets/img/media/cash-on-delivery.svg">
                </div>
                <div class="Payment-content CASH_ON_DELIVERY">
                    Không cần thanh toán trực tuyến - trả tiền mặt bằng cách sử dụng thay đổi chính xác sau khi các mặt
                    hàng của bạn được giao!
                    <br>
                    Thông tin chi tiết về tài khoản ngân hàng của bạn sẽ chỉ được yêu cầu nếu bạn muốn trả lại bất kỳ
                    sản phẩm nào để được hoàn tiền.
                </div>
                <div class="Payment-radio">
                    <input type="radio" name="payment-method" value="CREDIT_CARD">
                    <p style="margin-right:10px"><?=$LANG_Transfer_money?></p>
                    <img src="<?=$_DOMAIN?>/assets/img/media/visa.svg">
                    <img src="<?=$_DOMAIN?>/assets/img/media/mastercard.svg">
                </div>
                <div class="Payment-content CREDIT_CARD" style="display:none">
                    Không cần thanh toán trực tuyến - trả tiền mặt bằng cách sử dụng thay đổi chính xác sau khi các mặt
                    hàng của bạn được giao!
                    <br>
                    Thông tin chi tiết về tài khoản ngân hàng của bạn sẽ chỉ được yêu cầu nếu bạn muốn trả lại bất kỳ
                    sản phẩm nào để được hoàn tiền.
                    <!-- No online payment needed – pay in cash using the exact change once your items are delivered!
                    Your bank account details will only be required if you wish to return anything for a refund. -->
                </div>
                <script>
                $('input[type=radio][name=payment-method]').change(function() {
                    if (this.value == 'CASH_ON_DELIVERY') {
                        $(".CREDIT_CARD").css("display", "none");
                        $(".CASH_ON_DELIVERY").css("display", "block");
                    } else if (this.value == 'CREDIT_CARD') {
                        $(".CASH_ON_DELIVERY").css("display", "none");
                        $(".CREDIT_CARD").css("display", "block");
                    }
                });
                </script>

                <!-- Thanh toán khi giao hàng
Cash on Delivery
Không cần thanh toán trực tuyến - trả tiền mặt bằng cách sử dụng thay đổi chính xác sau khi các mặt hàng của bạn được giao!

Thông tin chi tiết về tài khoản ngân hàng của bạn sẽ chỉ được yêu cầu nếu bạn muốn trả lại bất kỳ sản phẩm nào để được hoàn tiền. -->
                <br>
                <div style="width:100%;margin-top: 10px;">
                    <button id="checkout" type="submit"
                        class="payment-radius checkout-button"><?=$LANG_checkout?></button>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if (isset($_POST['payment-method'])){
                        $totalprice = $_SESSION['total_price'];
                        $payMethod = $_POST['payment-method'];
                        $today = date("Y-m-d");

                        // POST DELIVERY
                        $P_FullName = $_SESSION['P_FullName'];
                        $P_StreetName = $_SESSION['P_StreetName'];
                        $P_BuildingName = $_SESSION['P_BuildingName'];
                        $P_calc_shipping_provinces = $_SESSION['P_calc_shipping_provinces'];
                        $P_calc_shipping_district = $_SESSION['P_calc_shipping_district'];
                        $P_Ward = $_SESSION['P_Ward'];
                        $P_Email = $_SESSION['P_Email'];
                        $P_Phone = $_SESSION['P_Phone'];
                        $token = md5(microtime());
                        $token .= md5($email); // Tạo lớp 2 để khác biệt giữa microtime
                        $sql = "INSERT INTO `order`(id, Usession, bag_item, bag_item_quantity, total_price, guest_name, guest_street, guest_building, guest_province, guest_district, guest_ward, guest_email, guest_phone, payment_method,token) 
                                          VALUES ('0','$email','$bag_item','$bag_item_quantity','$totalprice','$P_FullName','$P_StreetName','$P_BuildingName','$P_calc_shipping_provinces','$P_calc_shipping_district','$P_Ward','$P_Email','$P_Phone','$payMethod','$token')";
                        $stmt=$conn->prepare($sql);
                        $result = $stmt->execute();

                        if($result){
                            echo '<script>window.location.href="/confirmation?orderToken='.$token.'";</script>';
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div> <!--  // backgound content -->
</section>
</body>
</div>

</html>
<?php include('includes/footer.php'); ?>