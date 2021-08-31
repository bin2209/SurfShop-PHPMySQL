<?php 
$title = 'Store';
include('core/header.php'); 
include('core/navbar.php');


?>
<style type="text/css">.desktop-store{opacity: .56;}</style>
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
    <div class="store-column-narbar"><a href="?view=surf-board"><i class="fas fa-snowboarding"></i> Surf Board</a></div>
    <div class="store-column-narbar"><a href="?view=skate-board"><i class="fas fa-skating"></i> Skate Board</a></div>
    <div class="store-column-narbar"><a href="?view=clother"><i class="fas fa-tshirt"></i> Clother</a></div>
    <div class="store-column-narbar"><a href="?view=orther"><i class="fas fa-pills"></i> Orther</a></div>
  </div>
  <?php
  // STORE VIEW
  if (isset($_GET['view'])){
    $view = htmlspecialchars($_GET['view']);
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
        $description_en = $row["description-en"];
        if ($description_en==''){
          $description_en = 'None';
        }
        $price = $row["price"];
        if ($price == ''){
          $price = 'FREE';
        }
        echo '<div class="column product">';
        echo '<img class="content-center" src="../upload/'.$images.'"/>';
        echo '</div>';
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
        $description_vi = utf8_encode($row["description-vi"]);
        if ($description_vi==''){
          $description_vi = 'None';
        }
        $description_en = $row["description-en"];
        if ($description_en==''){
          $description_en = 'None';
        }
        $price = $row["price"];
        if ($price == ''){
          $price = 'FREE';
        }
        echo '<div class="column product">';
        echo '<img class="content-center" src="../upload/'.$images.'"/>';
        echo '</div>';
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
        $description_vi = utf8_encode($row["description-vi"]);
        if ($description_vi==''){
          $description_vi = 'None';
        }
        $description_en = $row["description-en"];
        if ($description_en==''){
          $description_en = 'None';
        }
        $price = $row["price"];
        if ($price == ''){
          $price = 'FREE';
        }
        echo '<div class="column product">';
        echo '<img class="content-center" src="../upload/'.$images.'"/>';
        echo '</div>';
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
        $description_vi = utf8_encode($row["description-vi"]);
        if ($description_vi==''){
          $description_vi = 'None';
        }
        $description_en = $row["description-en"];
        if ($description_en==''){
          $description_en = 'None';
        }
        $price = $row["price"];
        if ($price == ''){
          $price = 'FREE';
        }
        echo '<div class="column product">';
        echo '<img class="content-center" src="../upload/'.$images.'"/>';
        echo '</div>';
      }
      ?>
    </div>
    <?php }
  ?>



</section>
<?php include('core/footer.php'); ?>
</body>
</html>
