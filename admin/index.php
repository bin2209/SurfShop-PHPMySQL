<?php
include('includes/header.php');
require_once("../core/db_conn.php");
require_once("../classes/Functions.php");
session_start();
if(!isset($_SESSION['user_id']) && (!isset($_SESSION['type']))){
header('Location: ../login.php');
exit;
} else{
// LOGINED
if ($_SESSION['type']!=1){
header('Location: ../account');
exit;
}else if($_SESSION['type']==1){
?>
<body>
  <style type="text/css">
    .card-description{
      float: right;
    }
  </style>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'includes/slidebar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <?php include 'includes/navbar.php'; ?>
      <!-- partial -->
      
      <div class="main-panel">
        <div id="content-wrapper" class="content-wrapper">
          <?php
          $xss = new Anti_xss;
          if (isset($_GET['slidebar'])){
            $slidebar = $xss->clean_up($_GET['slidebar']);
            switch ($slidebar) {
            case 'customer':
              require_once 'content/customer.php';
              break;
            case 'store':
              require_once 'content/store.php';
              break;
            case 'services':
              require_once 'content/services.php';
              break;
            case 'mail-settings':
              require_once 'content/mail-settings.php';
              break;
            case 'settings':
              require_once 'content/settings.php';
              break;
            default:
              echo '<div class="row">';
              include("content/todolist.php");
              include("content/transaction.php");
              echo '</div>';
              break;
            }
          }else{
            echo '<div class="row">';
            include("content/todolist.php");
            include("content/transaction.php");
            echo '</div>';
          }
         
          ?>

        </div>
        <?php include('includes/footer.php'); ?>
      </div>
    </div>
  </div>
  <?php include('includes/scripts.php'); ?>
</body>
</html>
<?php }} ?>