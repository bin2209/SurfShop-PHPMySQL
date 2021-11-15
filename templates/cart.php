<?php 
@session_start();
$title = 'Cart';

if (!isset($_SESSION['user_email'])){
	// header("Location: ../");
}

if (isset($_SESSION['user_email']) && isset($_SESSION['password'])) { 
	?>
	<?php  
	// LẤY USER DATA
	$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 1) {
		$user = $stmt->fetch();
		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_name = $user['name'];
		$user_avatar = $user['avatar'];
		$user_phone = $user['phone'];
		$user_password = $user['password'];
	}

	// KHỞI TẠO LẦN ĐẦU VÀO BAG || CỘT BAG DB
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	$total_product = $stmt->rowCount();
	if ($stmt->rowCount() === 0) {
		$sql = "INSERT INTO bag(id, email, item_id,item) VALUES (0,'$user_email','','')";
		$stmt=$conn->prepare($sql);
		$result = $stmt->execute();
	}

	// LẤY BAG DATA
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 1) {
		$bag = $stmt->fetch();
		$bag_item = $bag['item'];
		$bag_item_id = $bag['item_id'];
	}
	
	?>
	<link href="../assets/css/cart.css" rel="stylesheet">
	<link href="../assets/css/popup.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<section class="content-center">
		<div class="background-content">
			<div class="member-information">
				<div class="logo-avt"><img src="<?php echo $user_avatar ?>"/></div>
				<h3 class="h3-dark content-center"><?php echo $user_name ?></h3>
			</div>
			<div id="order-products" class="row">
				<div class="col-12 grid-margin">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
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
										$i = 0;
										echo '<thead>
										<tr>
										<th style="text-align: left;">'.$LANG_product.'</th>
										<th>'.$LANG_unit_price.'</th>
										<th>'.$LANG_quantity.'</th>
										<th>'.$LANG_total.'</th>
										<th>'.$LANG_manipulation.'</th>
										</tr>
										</thead>

										<tbody>';
										foreach ($bag_item as $item) {

											$stmt = $conn->prepare("SELECT * FROM store WHERE id=?");

											$stmt->execute(array($item));
											if ($stmt->rowCount() === 1) {
												$item = $stmt->fetch();
												$item_id = $item["id"];
												$item_images = $item["images"];
												$item_name = $item["name"];
												$item_price = $item["price"];
												$item_brand = $item["brand"];
												$total_price += $item["price"];
											}

											echo '<tr>';

											echo '<td>
											<span class="pl-2"><input onclick="selectOne(this)" type="checkbox" name="product" value="'.$item_price.'"></span>

											<img src="../uploads/products/'.$item_images.'"/>
											<div>

											<span class="pl-2">'.$item_name.'</span>
											<span class="pl-2">'.$item_brand.'</span>
											</div>
											</td>
											<td>'.s_PriceFormat($item_price).'₫</td>
											<td>1</td>
											<td>'.s_PriceFormat($item_price).'₫</td>
											<td>
											<button id="'.$bag_item_id[$i].'" class="remove-button" onclick="remove_cart(this.id)"  >'.$LANG_remove.'</button>
											</td>';
											echo '</tr>';
											$i++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="total-products" class="row total-product">
			<span style="margin-left: initial;"><input id="selectAllbutton" type="checkbox" onclick="selectAll(this);" style="position:relative; display: inline;"> <?php echo $LANG_selectall ?> </span>
			<span class="total-payment-span"><?php echo $LANG_payment ?>: <p id="total-price-result" style="display: inline;"></p> ₫</span>
			<span class="checkout-span"><button id="" class="checkout-button"><?php echo $LANG_checkout ?> (<p id="quantity-result" style="display: inline;"></p>)</button></span>
		</div>
	</div> <!--  // backgound content -->
</section>
</body>
</div>
<script type="text/javascript">
	function remove_cart($id){
		$.post("<?php echo $_DOMAIN;?>/request/removefrombag.php",{
			id: $id
		},
		function(data,status){
			Swal.fire({
				icon: "success",
				text: "<?php echo $LANG_popup_deletebag; ?>",
				showConfirmButton: false,
				timer: 1500
			});
			$("#globalbar").load(location.href+" #globalbar>*","");
			$("#order-products").load(location.href+" #order-products>*","");
			$("#total-products").load(location.href+" #total-products>*","");
					//reset sum spice | varible js
					sum_price = 0;
					quantity = 0;
				});
	}
</script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/total-price.js"></script>
<script type="text/javascript" src="<?php echo $_DOMAIN;?>/assets/js/total-product-ispined.js"></script>
</html>
<?php }
?>
<?php include('includes/footer.php'); ?>

