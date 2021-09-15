<?php  // LẤY USER DATA
$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
$stmt->execute([$_SESSION['user_email']]);
if ($stmt->rowCount() === 1) {
	$user = $stmt->fetch();
	$user_id = $user['id'];
	$user_email = $user['email'];
	$user_name = $user['name'];
	$user_avatar = $user['avatar'];
	$user_phone = $user['phone'];
	$user_about = $user['about'];
}
?>
