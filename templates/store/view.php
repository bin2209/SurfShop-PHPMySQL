<?php 
$title = 'Services';
@session_start();
@include '../../includes/header.php'; 
@include '../../includes/navbar.php';

?>
<link rel="stylesheet" href="<?php echo $_DOMAIN; ?>/assets/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $_DOMAIN; ?>/assets/owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo $_DOMAIN; ?>/assets/css/view.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<style type="text/css">.desktop-store a{opacity: 1 !important;; color: #ffffff !important;} .mobile-store a{color: #ffffff !important;}</style>

<section class=" store content-center">
  <div class="box-content-center">
   <?php 
   if (isset($_GET['id'])){
     $main_id = trim(addslashes(htmlspecialchars($_GET['id']))); 
     // Lấy dữ liệu hàng trong db
     $stmt = $conn->prepare("SELECT * FROM store WHERE id=?");
     $stmt->execute([$main_id]);
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
      $category = $row["category"];
      $folder = $row["folder"]; // to show images not using with id column 

      if ($category == 1){
        $s_type = $LANG_store_surf;
        $s_backlink = 'surf';
      }else if ($category == 2){
       $s_type = $LANG_store_skate;
       $s_backlink = 'skate';
     }else if ($category == 3){
       $s_type = $LANG_store_clothes;
       $s_backlink = 'clothes';
     }else if ($category == 4){
       $s_type = $LANG_store_other;
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
    <img id="zoomLens" class="content-center" src="../uploads/products/'.$images.'">



    </div>

    <div class="column column-right">

    <span class="product-title" >'. $store_name.'</span><br>
    <span class="product-price" >'. s_PriceFormat($price).'₫</span><br>
    <span class="product-brand">'.  $brand.'</span><br>
    <br>
    <br>

    <button type="button" id="add-cart" class="add-cart">'.$LANG_addtobag.'</button>


    </div>


    <div class="product-item" style="text-align:left; height: auto;">'?>

    <div class="owl-carousel">
      <?php
      if (isset($list_images)){
        $i=0; 
        foreach ($array as $item) {
          $i++;
          echo '
          <div class="item-show-product">
          <div class="show-product">
          <img onclick="replaceImages(this.src)" src="../uploads/products/'.$folder.'/'.$item.'"/>
          </div>
          </div>
          ';
        }
      } 
      ?>
    </div>

    <script type="text/javascript">
      function replaceImages(data){
        $("#zoomLens" ).replaceWith('<img id="zoomLens" class="content-center" src="'+data+'">' );
      }
    </script>


    <?php
    // if (isset($list_images)){
    //   $i=0; 
    //   foreach ($array as $item) {
    //     $i++;
    //     echo '

    //     <img onclick="currentDiv('.$i.')" src="../uploads/products/'.$main_id.'/'.$item.'"/>';
    //   }
    // }
    echo '
    </div>


    <div class="column product-description" style="width: 100%;">
    <h2>'.$LANG_decription.'</h2>
    <p>'.$store_description.'</p>
    </div>
    </div>
    ';
  }else{
    // echo 'Không có kết quả nào';
    echo "<script>window.location.href='../store';</script>";
  }
} 
?>

</div>
</div>
</section>
<section class="content-center" style="background: #ffffff;  padding: 2em;">
  <div class="" style="padding: 0 1em;">
    <div class="owl-carousel">
      <?php
      $sql = "SELECT * FROM store where category=".$category;
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
          <div class="item">
          <a href="/product/'.$id.'" data-handle="" >
          <div class="background-blur product">
          <img class="content-center" src="../uploads/products/'.$images.'"/>
          </div>
          </a>  
          <div class="product-info">
          <p>'.$name.'</p>
          <p>'.s_PriceFormat($price).'₫</p>
          </div>
          </div>
          ';}
        }
        ?>
      </div>
    </div>
  </section>
 
    <script type="text/javascript">
    $("#add-cart").click(function(){
      $.post("<?=$_DOMAIN?>/request/addtobag.php",{
        id: "<?=$main_id?>"
        },
        function(data,status){
          Swal.fire({
            icon: "success",
            text: "<?=$LANG_popup_addbag?>",
            showConfirmButton: false,
            timer: 1500
            });
            $("#globalbar").load(location.href+" #globalbar>*","");
            });
            });
            </script>

          

          <script type="text/javascript">
            // Đề xuất sản phẩn cùng category
            $('.owl-carousel').owlCarousel({
              loop: false,
              margin: 10,
              nav: true,
              slideSpeed: 10,
              navText: [
              '<i class="fas fa-chevron-left" style="font-size: 40px;"></i>',
              '<i class="fas fa-chevron-right" style="font-size: 40px;"></i>'
              ],

              autoplay: true,
              pagination : true,
              paginationSpeed : 200,
              slideSpeed : 300,
              autoplaySpeed:300,
              autoplayHoverPause: true,
              responsive: {
                0: {
                  items: 2
                },
                600: {
                  items: 3
                },
                1000: {
                  items: 5
                }
              }
            })
          </script>

          <?php include('../../includes/footer.php'); ?>

