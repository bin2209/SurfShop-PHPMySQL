<?php 
include('core/header.php');
echo '  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
include("../login/config.php");
session_start();
if(!isset($_SESSION['login_user'])){
  echo file_get_contents("pages/samples/login.html");
  // NOT LOGIN -> GO TO LOGIN

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']); 
    if (($_POST['username']=='')||($_POST['password']=='')){
      echo "<script>Swal.fire('Username & password cannot be empty.')</script>";
    } else{
      $sql = "SELECT * FROM admin WHERE user = '$username' and pass = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
        $_SESSION['login_user'] = $username;
        header("Refresh:0; url=/admin");
      }
    } 
  }

  exit;
} else{
  // LOGINED
 $sql = "SELECT * FROM admin WHERE 1";
 $result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);
 if($count == 1) {
  $name = $row["name"];
  $avatar = $row["avatar"];
}
}
?> 
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'core/slidebar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php include 'core/navbar.php'; ?>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0">Hi <?php echo $name; ?>. </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          if(empty($_GET["slidebar"])) {
           include("content/todolist.php");
         }else if ($_GET["slidebar"]=="customer"){
           include("content/customer.php");
         }else if ($_GET["slidebar"]=="store"){
           include 'content/store.php';
         }
         ?>
         <!-- row ended -->
       </div>
       <?php include('core/footer.php'); ?>
     </div>
   </div>
 </div>
 <?php include('core/scripts.php'); ?>
</body>
</html>
