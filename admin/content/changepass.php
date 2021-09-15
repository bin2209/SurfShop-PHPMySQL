<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body"><div class="chartjs-size-monitor"></div>
    <h4 class="card-title">Change Password</h4>
    <form method="post">
      <div class="add-items d-flex">
       <input name="value_of_form" value="password" style="display: none;">
       <input type="password" name="oldpw" value="" class="form-control todo-list-input" placeholder="Old password">
     </div>
     <div class="add-items d-flex">
      <input type="password" name="newpw" value="" class="form-control todo-list-input" placeholder="New password">
    </div>
    <div class="add-items d-flex">
      <input type="password" name="repeatpw" value="" class="form-control todo-list-input" placeholder="Repeat new password">
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
  </form>
  <div class="add-items d-flex">
  </div>
  <h4 class="card-title">Login history</h4>

  <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
    <div class="text-md-center text-xl-left">
      <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
    </div>
    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
    </div>
  </div>

</div>
</div>
</div>

<?php
$user_id = $_SESSION['user_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $user_password = $_SESSION['password'];
 $value_of_form = $_POST['value_of_form'];
  if ($value_of_form == 'password'){ // Thay đổi mật khẩu 
    $oldpw = $_POST["oldpw"];
    $newpw = password_hash($_POST["newpw"], PASSWORD_BCRYPT);
    $repeatpw = $_POST["repeatpw"];
    if ($_POST["oldpw"]==""){
     echo '<script>Swal.fire(`Oops!`, `Old password is required`, `error` )</script>';
   }else if ($_POST["newpw"]==""){
     echo '<script>Swal.fire(`Oops!`, `New password is required`, `error` )</script>';
   } else if ($_POST["repeatpw"]==""){
     echo '<script>Swal.fire(`Oops!`, `Repeat password is required`, `error` )</script>';
   }else {
    if (password_verify($oldpw, $user_password)) {
      $sql = 'UPDATE `admin` SET `pass`= "'.$newpw.'" WHERE  id="'.$user_id.'"';
      $stmt=$conn->prepare($sql);
      $result = $stmt->execute();
      if($result){
        echo '<script>Swal.fire(`Success!`, `Password was changed!`, `success` )</script>';
      }
    } else{
      echo '<script>Swal.fire(`Oops!`, `Old password not match`, `error` )</script>';
    }
  }
}
}
?>