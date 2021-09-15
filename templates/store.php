<style type="text/css">.desktop-store{opacity: .56;} .mobile-store a{color: #ffffff !important;}</style>
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
</style>
<section class="store content-center">
  <h1 class="surf-h2-dark content-center"><?php echo $LANG_store; ?></h1>
  <div class="store-row-navbar">
    <div class="store-column-narbar"><a href="/surf-board"><i class="fas fa-snowboarding"></i> <?php echo $LANG_store_surfboard; ?></a></div>
    <div class="store-column-narbar"><a href="/skate-board"><i class="fas fa-skating"></i> <?php echo $LANG_store_skateboard; ?></a></div>
    <div class="store-column-narbar"><a href="/clother"><i class="fas fa-tshirt"></i> <?php echo $LANG_store_clother; ?></a></div>
    <div class="store-column-narbar"><a href="/orther"><i class="fas fa-pills"></i> <?php echo $LANG_store_orther; ?></a></div>
  </div>
  <?php
  // STORE VIEW
  if (isset($_GET['view'])){
    $view = $_GET['view'];
  }

  if (!isset($view)||($view=='surf-board')){
    ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM store where type=1";
      $result = $conn->query($sql);
      foreach ($result as $row) {
        $id = $row["id"];
        $images = $row["images"];
        $name = $row["name"];
        $description_vi = utf8_encode($row["description-vi"]);
        if ($description_vi==''){
          $description_vi = 'None';
        }

        //LANGUAGE
        if ($_COOKIE['language']=='en'){
          $description = $row["description-en"];
        }else{
          $description = $row["description-vi"];
        }
        
        $price = $row["price"];

        echo '
        <div class="column">
        <a href="/store/'.$id.'" data-handle="" >
        <div class="background-blur product">

        <img class="content-center" src="../upload/'.$images.'"/>
      

        </div>
        </a>

        <div class="product-info">
        <p>'.$description.'</p>
        <p>'.$price.'</p>
        </div>

        </div>
        ';
      }
      ?>
    </div>

  <?php }else if($view == 'skate-board'){?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM store where type=2";
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

        <div class="background-blur product">

        <img class="content-center" src="../upload/'.$images.'"/>
        <div class="blur-store">
        <span class="store-more-button">Tùy chỉnh</span>
        <span class="store-more-button">Xem nhanh</span>
        </div>

        </div>

        <div class="product-info">
        <p>'.$description.'</p>
        <p>'.$price.'</p>
        </div>

        </div>';
        
      }
      ?>
    </div>

  <?php }else if($view == 'clother'){?>
   <div class="row">
    <?php
    $sql = "SELECT * FROM store where type=3";
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

      <div class="background-blur product">

      <img class="content-center" src="../upload/'.$images.'"/>
      <div class="blur-store">
      <span class="store-more-button">Tùy chỉnh</span>
      <span class="store-more-button">Xem nhanh</span>
      </div>

      </div>

      <div class="product-info">
      <p>'.$description.'</p>
      <p>'.$price.'</p>
      </div>

      </div>';
    }
    ?>
  </div>
<?php }else if($view == 'orther'){?>
 <div class="row">
  <?php
  $sql = "SELECT * FROM store where type=4";
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

    <div class="background-blur product">

    <img class="content-center" src="../upload/'.$images.'"/>
    <div class="blur-store">
    <span class="store-more-button">Tùy chỉnh</span>
    <span class="store-more-button">Xem nhanh</span>
    </div>

    </div>

    <div class="product-info">
    <p>'.$description.'</p>
    <p>'.$price.'</p>
    </div>

    </div>';
  }
  ?>
</div>
<?php }
?>

</section>
