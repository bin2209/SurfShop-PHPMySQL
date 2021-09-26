<?php 
include('includes/header.php');
echo '  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';


include("../core/db_conn.php");

@session_start();
if(!isset($_SESSION['user_id'])){

  echo file_get_contents("pages/samples/login.html");
  // NOT LOGIN -> GO TO LOGIN

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
      header("Location: ?error=Username is required");
    }else if (empty($password)){
      header("Location: ?error=Password is required&username=$username");
    }else {
      $stmt = $conn->prepare("SELECT * FROM admin WHERE user=?");
      $stmt->execute([$username]);

      if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch();

        $user_id = $user['id'];
        $user_username = $user['user'];
        $user_password = $user['pass'];
        $user_avatar = $user['avatar'];
        $user_name = $user['name'];
        if ($username === $user_username) {
          if (password_verify($password, $user_password)) {
            @session_start();
          // GÁN BIẾN TOÀN CỤC KHỞI TẠO THÔNG TIN NGƯỜI DÙNG
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_username'] = $user_username;
            $_SESSION['password'] = $user_password;
            $_SESSION['avatar'] = $user_avatar;
            $_SESSION['name'] = $user_name;

            header("Location: ../admin");
            exit; 

          }else {
            header("Location: ?error=Incorect Username or password&email=$email");
          }
        }else {
          header("Location: ?error=Incorect Username or password&email=$email");
        }
      }else {
        header("Location: ?error=Incorect Username or password&email=$email");
      }
    }
  }
} else{
  // LOGINED
  @session_start();
  ?>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include 'includes/slidebar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include 'includes/navbar.php'; ?>
        <!-- partial -->
    
        <div class="main-panel">
          <div class="content-wrapper">
            <?php
            if(empty($_GET["slidebar"])) {
              echo '<div class="row">';
              include("content/todolist.php");
              include("content/transaction.php");
              include("content/changepass.php");
              echo '</div>';
            }else if ($_GET["slidebar"]=="customer"){
             include("content/customer.php");
           }else if ($_GET["slidebar"]=="store"){
             include 'content/store.php';
           }else if ($_GET["slidebar"]=="services"){
             include 'content/services.php';
           }
           ?>
           <!-- row ended -->
         </div>
         <?php include('includes/footer.php'); ?>
       </div>
     </div>
   </div>
   <?php include('includes/scripts.php'); ?>
 </body>
 </html>

 <?php } ?> 