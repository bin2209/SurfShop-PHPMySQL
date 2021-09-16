<?php 
$title = 'Services';
@session_start();
include('../../includes/header.php'); 
include('../../includes/navbar.php');
?>
<style type="text/css">.desktop-services{opacity: .56;} .mobile-services a{color: #ffffff !important;}</style>
<style type="text/css">
.store{
  background: #0a0a0a;
}
.product-row{
 margin-left: auto;
 margin-right: auto;
 -webkit-box-sizing: border-box;
 box-sizing: border-box;
 -webkit-box-pack: center;
 -ms-flex-pack: center;
 display: -webkit-box;
 display: -ms-flexbox;
 display: flex;
 -ms-flex-wrap: wrap;
 flex-wrap: wrap;
 width: auto;
 justify-content: flex-start;
}

.product-row{
  margin-left: auto;
  margin-right: auto;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  width: auto;
  justify-content: center !important;
}

.box-content-center{
  width: 70%;
  margin-right: auto;
  margin-left: auto;
}
.column{
  text-align: left;
}
.column-right{
  min-width: 200px;
  float: right;
}
.column-left{
  text-align: left;
  float: left;
  width: 50%;
  min-width: 500px;
}
.column img{
 max-height: 600px;
 position: relative;
 width: -webkit-fill-available;
}
.product-title{
  font-family: "SF Pro Text","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
  color: #dedede;
  font-weight: 600;
  font-size: 25px;
  margin: 0px 0px 15px;
  line-height: normal;
}
.product-price{
  font-family: "SF Pro Text","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
  font-weight: 700;
  font-size: 25px;
  color: #dedede;
}
.product-description{
  text-align: left;
}
.product-description h2{
  font-weight: 600;
  font-size: 20px;
  color: #dedede;
}
.product-item{
  margin: 20px 0;
  max-width: -webkit-fill-available;
  height: 100px;
  width: 100%;
}
.product-item img{
  display: inline;
  border-radius: 5px;
  width: 85px;
  border: 2px solid #ffffffa3;
  margin: 4px;
}
.product-item img:hover{
  border: 2px solid #fff;
  -webkit-transition: all 0.1s ease-in-out;
  -o-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
  cursor: pointer;
}
.add-cart{
  background: #f27474;
  padding: 10px 20px;
  color: black;
  border: 0px solid;
  border-radius: 4px;
  font-size: 20px;
}
@media only screen and (max-width: 1120px) {
  /*VIEW PRODUCTS*/
  .product-row .column-right{
    min-width: -webkit-fill-available !important;
    width: 100% !important;
  }
}
</style>
<section class=" store content-center">

  <div class="box-content-center">
   <?php 
   if (isset($_GET['id'])){
     $id = trim(addslashes(htmlspecialchars($_GET['id']))); 
     // Lấy dữ liệu hàng trong db
     $stmt = $conn->prepare("SELECT * FROM store WHERE id=?");
     $stmt->execute([$id]);
     if ($stmt->rowCount() === 1) {
      $row = $stmt->fetch();
      $store_name = $row['name'];
      if ($_COOKIE['language']=='en'){
        $store_description = $row["description-en"];
      }else{
        $store_description = $row["description-vi"];
      }
      $price = $row["price"];
      $images = $row["images"];


      $type = $row["type"];
     

      if ($type == 1){
        $s_type = $LANG_store_surfboard;
         $s_backlink = 'surf-board';
      }else if ($type == 2){
       $s_type = $LANG_store_skateboard;
       $s_backlink = 'skate-board';
     }else if ($type == 3){
       $s_type = $LANG_store_clothes;
        $s_backlink = 'clothes';
     }else if ($type == 4){
       $s_type = $LANG_store_orther;
       $s_backlink = 'other';
     }

     if ($row["brand"]!=NULL){
       $brand = $row["brand"];
     }else{
      $brand='';
    }

    

    if ($row["list-images"]!=NULL){
      $list_images = $row["list-images"];

      //Xử lý mảng list-images
      $array = explode(',',$list_images);
    }
    //BREAKCRUMB
    echo '
    <div class="product-row-navbar">
    <div class="product-column-narbar"><a href="../">Home</a> / <a href="./">Store</a> / <a href="../'.$s_backlink.'">'. $s_type.'</a> / <a href="" style="color: #f27474;">'.$store_name.'</a></div>
    </div>

    <div class="product-row">
    <div class="column column-left">
    <img class="content-center" src="../upload/'.$images.'">




    </div>

    <div class="column column-right">

    <span class="product-title" >'. $store_name.'</span><br>
    <span class="product-price" >'. $price.'</span><br>
    <span class="product-brand">'.  $brand.'</span><br>
    <br>
    <br>
    <button class="add-cart">ADD TO CART</button>


    </div>
    <div class="product-item" style="text-align:left;">'?>
    <?php
    if (isset($list_images)){
      foreach ($array as $item) {
        echo '<img onclick="currentDiv()" src="../upload/'.$item.'"/>';
      }
    }
    echo '
    </div>
    <div class="column product-description" style="width: 100%;">
    <h2>'.$LANG_decription.'</h2>
    <p>'.$store_description.'</p>
    </div>
    </div>

    ';

  }else{
    echo 'Không có kết quả nào';
  }
} else{

}
?>
</div>
</div>
</section>
<section class="content-center" style="background: #ffffff;  padding: 2em;">
  <style type="text/css">
  .row-same-product{
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: nowrap;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    flex-direction: row;
  }
</style>
<div class="row-same-product">
  <?php
  $sql = "SELECT * FROM store where type=".$type;
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
    if ($id != $_GET['id']){
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
      ';}
    }
    ?>
  </div>
</section>

<?php include('../../includes/footer.php'); ?>

