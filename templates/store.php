<style type="text/css">.desktop-store a{opacity: 1 !important;; color: #ffffff !important;} .mobile-store a{color: #ffffff !important;}</style>
<style type="text/css">
.store-row-navbar{
  border-radius: 12px;
  margin: 2em;
  flex-wrap: nowrap;
  display: flex;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
  background: #101010;
}
.store-column-narbar{
  font-weight: 600;
  width: 20%;
  padding: 15px;
  height: auto;
}
.store-column-narbar a:hover{
 opacity: 1;
 filter: brightness(200%);
 cursor: pointer;
 -webkit-transition: all 0.3s ease-in-out;
 -o-transition: all 0.3s ease-in-out;
 transition: all 0.3s ease-in-out;
}
.store-column-narbar a{
  text-decoration: none;
  opacity: 0.8;
  color: #fff;
}


.left-navbar{
 display: none;
 z-index: 3;
 position: fixed;
 float: left;
 top: 0;
 left: 0;
 height: 100vh;
 width: 300px;
 backdrop-filter: blur(10px);
 -webkit-backdrop-filter: blur(10px);
 background: rgba(0,0,0,.8);
}

.left-navbar dl {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  list-style: none;
  text-align: center;
}
.left-navbar a{
  color: #fff;
  opacity: 0.6;
  text-decoration: none;
  font-weight: 600;
}
.left-navbar a:hover{
 opacity: 1;
}
.left-navbar  dt{
  width: max-content;
  margin: 15px 0 0 0;
}
.left-navbar dd{
  width: max-content;
  text-align: left;
  margin-left: 28px;
  margin-top: 2px;
}
.left-navbar dt a{
 font-size: 18px;
}
.left-navbar dd a{
  font-size: 15px;
}

.close-slidebar{
 position: absolute;
 top: 50%;
 border: 0px solid;
 border-radius: 50%;
 background: #323233;
 height: 50px;
 width: 50px;
 left: 89%;
}
.close-slidebar i{
 position: relative;
 font-size: 40px;
 top: 4px;
 right: 2px;
 color: white;
}
#open-slidebar i{
  position: relative;
  top: 4px;
  left: 2px;
  font-size: 40px;
  color: white;
}
.close-slidebar, #open-slidebar i:hover{
  cursor: pointer;
}
#open-slidebar{
  z-index: 5;
  left: 12px;
  position: fixed;
  display: block;
  top: 50%;
  border: 0px solid;
  border-radius: 50%;
  background: #424243;
  height: 50px;
  width: 50px;
  right: 89%;;
}
.product-row-navbar{
  float: left;
  background: #1f1f1f;
}
@media only screen and (max-width: 992px) {
  .left-navbar{
    width: 100% !important;
  }
}
</style>
<section class="store content-center">



  <div id="Slidebar" class="left-navbar">
   <dl>
    <dt class="left-navbar-surf"><a href="/surf-board">SURF</a></dt>
    <dd><a href="/surf-board">BOARD</a></dd>
    <dd><a href="/surf-board">FINS</a></dd>
    <dd><a href="/surf-board">LEACHES</a></dd>
    <dd><a href="/surf-board">TRACTIONS</a></dd>

    <dt class="left-navbar-skate"><a href="/skate-board">SKATE</a></dt>
    <dd><a href="/surf-board">DECKS</a></dd>
    <dd><a href="/surf-board">TRUCKS</a></dd>
    <dd><a href="/surf-board">WHEELS</a></dd>
    <dd><a href="/surf-board">GRIPS</a></dd>
    <dd><a href="/surf-board">BREARINGS</a></dd>
    <dd><a href="/surf-board">HARDWARES</a></dd>

    <dt class="left-navbar-clothes"><a href="/clothes">CLOTHES</a></dt>
    <dd><a href="/surf-board">SHIRTS</a></dd>
    <dd><a href="/surf-board">PANTS</a></dd>
    <dd><a href="/surf-board">SHORTS</a></dd>
    <dd><a href="/surf-board">JACKETS</a></dd>
    <dd><a href="/surf-board">DRESSES</a></dd>
    <dd><a href="/surf-board">SHOES</a></dd>
    <dd><a href="/surf-board">BAGS</a></dd>
    <dd><a href="/surf-board">SWIMWEARS</a></dd>
    <dd><a href="/surf-board">WETSUITS</a></dd>

    <dt class="left-navbar-other"><a href="/other">OTHER</a></dt>
    <dd><a href="/surf-board">SUNCLASSES</a></dd>
    <dd><a href="/surf-board">SUNSCREEN</a></dd>

  </dl>
  <span class="close-slidebar" onclick="slidebar_close()"><i class="fas fa-angle-left"></i></span>


</div>
<span id="open-slidebar" onclick="slidebar_open()"><i class="fas fa-angle-right"></i></span>
<script type="text/javascript">
  function slidebar_open() {
    document.getElementById("Slidebar").style.display = "block";
    document.getElementById("open-slidebar").style.display = "none";
  }

  function slidebar_close() {
    document.getElementById("open-slidebar").style.display = "block";
    document.getElementById("Slidebar").style.display = "none";
  }
</script>


<div class="row">
  <?php
  $kihieu_store= '';
  // STORE VIEW || BREAKCRUMB
  if (isset($_GET['view'])){

    $view = $_GET['view'];
    if ($view == 'surf-board'){
      $s_view = $LANG_store_surf;
      $s_backlink = 'surf-board';
    }else if ($view == 'skate-board'){
     $s_view = $LANG_store_skateboard;
     $s_backlink = 'skate-board';
   }else if ($view == 'clothes'){
     $s_view = $LANG_store_clothes;
     $s_backlink = 'clothes';
   }else if ($view == 'other'){
     $s_view = $LANG_store_other;
     $s_backlink = 'other';
   }
 }else{
  $s_view = '';
  $s_backlink = '';
  $s_storeBacklink = '<a href="" style="color: #f27474;">'.$LANG_store.'</a>';
}

if (!isset($s_storeBacklink)) {
 $s_storeBacklink = '<a href="/store">'.$LANG_store.'</a>';
 $kihieu_store = '/';
}


function print_product_store($sql,$conn){
  $result = $conn->query($sql);
  foreach ($result as $row) {
    $id = $row["id"];
    $images = $row["images"];
    $name = $row["name"];
      //LANGUAGE
    if ($_COOKIE['language']=='en'){
      $description = $row["description-en"];
    }else{
      $description = $row["description-vi"];
    }

    $price = $row["price"];
    echo '  <div class="column">

    <a href="/store/'.$id.'" data-handle="" >
    <div class="background-blur product">
    <img class="content-center" src="../upload/'.$images.'"/>
    </div>
    </a>


    <div class="product-info">
    <p>'.$description.'</p>
    <p>'.$price.'</p>
    </div>

    </div>';
  }
}



echo '
<!-- BREAKCRUMB -->
<div class="column" style="width:80%;">
<div class="product-row-navbar">
<div class="product-column-narbar"><a href="../">Home</a> / <a href="/store">'.$s_storeBacklink.'</a> '.$kihieu_store.' <a href="" style="color: #f27474;">'.$s_view.'</a></div>
</div>
</div>
';

if (isset($view) && $view=='surf-board'){
  echo '<style>.left-navbar-surf a{ color:#fff !important; opacity: 1 !important}</style>';
  ?>
  <?php
  $sql = "SELECT * FROM store where type=1";
  print_product_store($sql,$conn);
  ?>
</div>

<?php }else if(isset($view) && $view == 'skate-board'){
  echo '<style>.left-navbar-skate a{ color:#fff !important; opacity: 1 !important}</style>';
  ?>
  <div class="row">
    <?php
    $sql = "SELECT * FROM store where type=2";
    print_product_store($sql,$conn);
    ?>
  </div>

<?php }else if(isset($view) &&  $view == 'clothes'){
  echo '<style>.left-navbar-clothes a{ color:#fff !important; opacity: 1 !important}</style>';
  ?>
  <div class="row">
    <?php
    $sql = "SELECT * FROM store where type=3";
    print_product_store($sql,$conn);
    ?>
  </div>
<?php }else if(isset($view) && $view == 'other'){
 echo '<style>.left-navbar-other a{ color:#fff !important; opacity: 1 !important}</style>';
 ?>
 <div class="row">
  <?php
  $sql = 'SELECT * FROM `store` WHERE type = 4';
  print_product_store($sql,$conn);
  ?>
</div>
<?php }else if(!isset($view)){
 ?>
 <div class="row">
  <?php
  $sql = 'SELECT * FROM `store` WHERE 1';
  print_product_store($sql,$conn);
  
  
  ?>
</div>
<?php }
?>

</section>
