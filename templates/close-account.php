<?php if (isset($_SESSION['user_email']) && isset($_SESSION['password'])) { ?>
<link href="../assets/css/account.css" rel="stylesheet">
<link href="../assets/css/popup.css" rel="stylesheet">
<link href="../assets/css/bootstrap.button.min.css" rel="stylesheet">

<section class="content-center">
    <div class="background-content">
        <div class="member-information">
            <div class="logo-avt"><img src="<?=$_SESSION['avatar']?>" /></div>
            <h3 class="h3-dark content-center"><?=$_SESSION['name']?></h3>
        </div>

        <div class="account-information">
            <div id="infomation" class="infomation " style="width:auto;">
                <h2 style="font-size: 20px; text-align: center; font-weight: 600; margin-bottom: 12px;">
                    <?=$LANG_delete_your_account?></h2>

                <p><?=$LANG_delete_content1?></p>
                <br><br>
                <p><?=$_SESSION['name']?>, <?=$LANG_delete_content2?></p>
            </div>
            <div class="button-div">
                <button class="btn btn-secondary" id="reCheckPass"><?=$LANG_continue?></button>
            </div>
        </div>
    </div>
</section>
</body>

<!-- Recheck PassWord -->
<div class="pop-up pop-up-reCheckPass">
    <div class="content">
        <div class="container" style="padding:3em 2em 1em;">
            <div class="title">
                <h1><?=$LANG_why_delete_account; ?></h1>
            </div>
            <div class="change-profile reCheckPass">
                <form method="POST" style="width:100%;">
                    <div>
                        <input type="radio" name="reason" value="1" required />
                        <label for="html"><?=$LANG_reason_delete_account1?></label>
                        <br>
                        <input type="radio" name="reason" value="2" required />
                        <label for="html"><?=$LANG_reason_delete_account2?></label>
                        <br>
                        <input type="radio" name="reason" value="3" required />
                        <label for="html"><?=$LANG_reason_delete_account3?></label>
                    </div>

                    <br>
                    <div class="notification" style="padding-bottom: 20px;"></div>

                    <div style="text-align: right; margin-top: 1em;">
                        <button type="button" class="btn btn-secondary close-popup"><?=$LANG_close;?></button>
                        <button type="submit" class="btn btn-danger"
                            name="submit_change"><?=$LANG_delete_account_Confirm;?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $user_email = $_SESSION['user_email'];
	// Thay đổi mật khẩu 
	if (isset($user_email)) {
        $sql = 'DELETE FROM `user` WHERE email = "'.$user_email.'"; DELETE FROM `bag` WHERE email = "'.$user_email.'";';
		$stmt=$conn->prepare($sql);
		$result = $stmt->execute();
	if($result){
		echo '<script>window.location.href="/logout"</script>';
	}else{
        echo '<script>Swal.fire(`Success!`, `Error!`, `error`)</script>';
    }
}
}
?>

<script type="text/javascript">
var reason = null;
$("input[name='reason']").click(function() {
    reason = this.value;
    console.log(reason);
    if (reason == 1) {
        $("div.notification").html('<?=$LANG_answer_delete_account1;?>');
    }
    if (reason == 2) {
        $("div.notification").html('<?=$LANG_answer_delete_account2;?>');
    }
    if (reason == 3) {
        $("div.notification").html('<?=$LANG_answer_delete_account3;?>');
    }
});
</script>
<script type="text/javascript">
// POPUP
$('#reCheckPass').click(function() {
    $('.pop-up-reCheckPass').addClass('open');
    $('.content-center').addClass('blur-filter');
    $('footer').addClass('blur-filter');
});
$('.pop-up .content .close-popup').click(function() {
    $('.pop-up').removeClass('open');
    $('.content-center').removeClass('blur-filter');
    $('footer').removeClass('blur-filter');
});
</script>
<?php }else{echo '<script>window.location.href="/login"</script>';}?>