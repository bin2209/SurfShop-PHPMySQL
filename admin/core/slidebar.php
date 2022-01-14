      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo card" href="index.php"><img src="assets/images/logo.png"></a>
          <a class="sidebar-brand brand-logo-mini card" href="index.php"><img src="assets/images/logo.png"></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <?php if($_SESSION['avatar']==NULL){
                    echo '<img class="img-xs rounded-circle " src="assets/images/faces/no-avatar.jpg" alt="">';
                  }else{
                    echo'<img class="img-xs rounded-circle " src="'.$_SESSION['avatar'].'" alt="">';
                  } ?>
                
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['name']; ?></h5>
                  <span>Admin</span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="?slidebar=customer">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple-outline"></i>
              </span>
              <span class="menu-title">Customer</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="?slidebar=store">
              <span class="menu-icon">
                <i class="mdi mdi-shopping"></i>
              </span>
              <span class="menu-title">Store</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="?slidebar=services">
              <span class="menu-icon">
                <i class="mdi mdi-code-string"></i>
              </span>
              <span class="menu-title">Services</span>
            </a>
          </li>
     
         <!--   <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#user-auth" aria-expanded="false" aria-controls="user-auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Home </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Services </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Store </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Map </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> About </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Login </a></li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>