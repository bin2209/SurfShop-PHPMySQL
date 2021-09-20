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
  overflow: auto;
  display: block;
  z-index: 3;
  position: fixed;
  float: left;
  top: 48px;
  left: 0;
  height: 100vh;
  width: 300px;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  background: rgba(0,0,0,.8);
}
.left-navbar dl {
 position: absolute;
 top: 2%;
 width: auto;
 left: 23%;
 list-style: none;
 margin-bottom: 10em;
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
.left-navbar dt{
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
 top: 45%;
 border: 0px solid;
 border-radius: 50%;
 /*background: #323233;*/
 left: 89%;
}
.close-slidebar i{
 position: relative;
 font-size: 40px;
 top: 4px;
 color: white;
}
#open-slidebar,#open-slidebar-mobile i{
  position: relative;
  top: 14px;
  left: 0px;
  font-size: 22px;
  color: white;
}
.close-slidebar, #open-slidebar,#open-slidebar-mobile i:hover{
  cursor: pointer;
}
#open-slidebar,#open-slidebar-mobile{
  z-index: 5;
  left: 12px;
  position: fixed;
  display: none;
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
.row{
  margin-right: 1px;
}
/*MOBILE VER STORE VIEW*/
@media only screen and (max-width: 992px) {
  .close-slidebar{
    background: transparent;
  }
  .left-navbar dl{
    left: 38%;
  }
  .close-slidebar i{
    top: -44px;
  }
  .left-navbar{
    width: 100% !important;
  }
  .left-navbar{
    display: none;
  }
  #open-slidebar{
    display: none !important;
  }
  #open-slidebar-mobile{
    display: block;
  }

  #Slidebar{
    top: 48px;
  }
  #open-slidebar-mobile{
   display: none;
   z-index: 5;
   left: 88%;
   position: fixed;
   display: block;
   top: 50%;
   border: 0px solid;
   border-radius: 50%;
   background: #424243;
   height: 50px;
   width: 50px;
 }
 .row{
  margin-right: auto !important ;
}
}
/*SCROLL*/
#Slidebar::-webkit-scrollbar-track
{
  border-radius: 10px;
  background-color: rgb(50 50 51);
}
#Slidebar::-webkit-scrollbar
{
  width: 12px;
}
#Slidebar::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  background-color: #555;
}

</style>
<div>
  <div id="Slidebar" class="left-navbar">
   <dl>

    <dt class="left-navbar-surf"><a href="/surf">SURF</a></dt>
    <dd class="surf1"><a href="/surf/board">BOARD</a></dd>
    <dd class="surf2"><a href="/surf/fins">FINS</a></dd>
    <dd class="surf3"><a href="/surf/leaches">LEACHES</a></dd>
    <dd class="surf4"><a href="/surf/tractions">TRACTIONS</a></dd>
    

    <dt class="left-navbar-skate"><a href="/skate">SKATE</a></dt>
    <dd class="skate1"><a href="/skate/board">BOARD</a></dd>
    <dd class="skate2"><a href="/skate/decks">DECKS</a></dd>
    <dd class="skate3"><a href="/skate/trucks">TRUCKS</a></dd>
    <dd class="skate4"><a href="/skate/wheels">WHEELS</a></dd>
    <dd class="skate5"><a href="/skate/grips">GRIPS</a></dd>
    <dd class="skate6"><a href="/skate/brearings">BREARINGS</a></dd>
    <dd class="skate7"><a href="/skate/hardwares">HARDWARES</a></dd>
    

    <dt class="left-navbar-clothes"><a href="/clothes">CLOTHES</a></dt>
    <dd class="clothes1"><a href="/clothes/shirts">SHIRTS</a></dd>
    <dd class="clothes2"><a href="/clothes/pants">PANTS</a></dd>
    <dd class="clothes3"><a href="/clothes/shorts">SHORTS</a></dd>
    <dd class="clothes4"><a href="/clothes/jackets">JACKETS</a></dd>
    <dd class="clothes5"><a href="/clothes/dresses">DRESSES</a></dd>
    <dd class="clothes6"><a href="/clothes/shoes">SHOES</a></dd>
    <dd class="clothes7"><a href="/clothes/bags">BAGS</a></dd>
    <dd class="clothes8"><a href="/clothes/swimwears">SWIMWEARS</a></dd>
    <dd class="clothes9"><a href="/clothes/wetsuits">WETSUITS</a></dd>
    

    <dt class="left-navbar-other"><a href="/other">OTHER</a></dt>
    <dd class="other1"><a href="/other/sunglasses">SUN GLASSES</a></dd>
    <dd class="other2"><a href="/other/sunscreen">SUN SCREEN</a></dd>
    <dd style="margin-top: 12em;">.</dd>
    
  </dl>
  <span class="close-slidebar" onclick="slidebar_close()"><i class="fas fa-angle-left"></i></span>
</div>
<section class="store content-center">

  <span id="open-slidebar" onclick="slidebar_open()"><i class="fas fa-bars"></i></span>
  <span id="open-slidebar-mobile" onclick="slidebar_open()"><i class="fas fa-bars"></i></span>


  <?php
  $kihieu_store= '';
  // STORE VIEW || BREAKCRUMB
  if (isset($_GET['category'])){
    $category = $_GET['category'];
    if (isset($_GET['type'])){
      $type = $_GET['type'];
    }
  }

// FUNCTION
  function print_product_store($sql,$conn){
   echo '<div class="row">';
   $result = $conn->prepare($sql);
   $result->execute();
 // $count = $result->rowCount();
 // echo $count;

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
  echo '</div>';
}





if (isset($category) && $category=='surf'){
  echo '<style>.left-navbar-surf a{ color:#fff !important; opacity: 1 !important}</style>';
  if (isset($type)){
    if ($type=='board'){
     echo '<style>.surf1 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=1 && type=1";
     print_product_store($sql,$conn);
   }
   if ($type=='fins') {
    echo '<style>.surf2 a{ color:#fff !important; opacity: 1 !important}</style>';
    $sql = "SELECT * FROM store where category=1 && type=2";
    print_product_store($sql,$conn);
  }
  if ($type=='leaches') {
    echo '<style>.surf3 a{ color:#fff !important; opacity: 1 !important}</style>';
    $sql = "SELECT * FROM store where category=1 && type=3";
    print_product_store($sql,$conn);
  }
  if ($type=='tractions') {
    echo '<style>.surf4 a{ color:#fff !important; opacity: 1 !important}</style>';
    $sql = "SELECT * FROM store where category=1 && type=4";
    print_product_store($sql,$conn);
  }
}else{
  $sql = "SELECT * FROM store where category=1";
  print_product_store($sql,$conn);
}
}

if(isset($category) && $category == 'skate'){
  echo '<style>.left-navbar-skate a{ color:#fff !important; opacity: 1 !important}</style>';
  if (isset($type)){
    if ($type=='board'){
     echo '<style>.skate1 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=1";
     print_product_store($sql,$conn);
   }
   if ($type=='decks') {
     echo '<style>.skate2 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=2";
     print_product_store($sql,$conn);
   }
   if ($type=='trucks') {
     echo '<style>.skate3 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=3";
     print_product_store($sql,$conn);
   }
   if ($type=='wheels') {
     echo '<style>.skate4 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=4";
     print_product_store($sql,$conn);
   }
   if ($type=='grips') {
     echo '<style>.skate5 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=5";
     print_product_store($sql,$conn);
   }
   if ($type=='brearings') {
     echo '<style>.skate6 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=6";
     print_product_store($sql,$conn);
   }
   if ($type=='hardwares') {
     echo '<style>.skate7 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=2 && type=7";
     print_product_store($sql,$conn);
   }
 }else{
   $sql = "SELECT * FROM store where category=2";
   print_product_store($sql,$conn);
 }
}

if(isset($category) &&  $category == 'clothes'){
  echo '<style>.left-navbar-clothes a{ color:#fff !important; opacity: 1 !important}</style>';
  if (isset($type)){
   if ($type=='shirts'){
     echo '<style>.clothes1 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=1";
     print_product_store($sql,$conn);
   }
   if ($type=='pants'){
     echo '<style>.clothes2 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=2";
     print_product_store($sql,$conn);
   }
   if ($type=='shorts'){
     echo '<style>.clothes3 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=3";
     print_product_store($sql,$conn);
   }
   if ($type=='jackets'){
     echo '<style>.clothes4 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=4";
     print_product_store($sql,$conn);
   }
   if ($type=='dresses'){
     echo '<style>.clothes5 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=5";
     print_product_store($sql,$conn);
   }
   if ($type=='shoes'){
     echo '<style>.clothes6 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=6";
     print_product_store($sql,$conn);
   }
   if ($type=='bags'){
     echo '<style>.clothes7 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=7";
     print_product_store($sql,$conn);
   }
   if ($type=='swimwears'){
     echo '<style>.clothes8 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=8";
     print_product_store($sql,$conn);
   }
   if ($type=='wetsuits'){
     echo '<style>.clothes9 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=3 && type=9";
     print_product_store($sql,$conn);
   }
 }else{
   $sql = "SELECT * FROM store where category=3";
   print_product_store($sql,$conn);
 }
}

if(isset($category) && $category == 'other'){
 echo '<style>.left-navbar-other a{ color:#fff !important; opacity: 1 !important}</style>';
 if (isset($type)){
   if ($type=='sunglasses'){
     echo '<style>.other1 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=4 && type=1";
     print_product_store($sql,$conn);
   }
   if ($type=='sunscreen'){
     echo '<style>.other2 a{ color:#fff !important; opacity: 1 !important}</style>';
     $sql = "SELECT * FROM store where category=4 && type=2";
     print_product_store($sql,$conn);
   }
 }else{
   $sql = "SELECT * FROM store where category=4";
   print_product_store($sql,$conn);
 }
}

if(!isset($category)){
 $sql = 'SELECT * FROM `store` WHERE 1';
 print_product_store($sql,$conn);
}

?>
</section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.parent').click(function() {
      $('.sub-nav').toggleClass('visible');
    });
  });
</script>
<script type="text/javascript">

  function slidebar_open() {
    document.getElementById("Slidebar").style.display = "block";
    document.getElementById("open-slidebar").style.display = "none";
    document.getElementById("open-slidebar-mobile").style.display = "none";
    document.getElementsByClassName("row")[0].style.marginRight = "1px";
  }
  function slidebar_close() {
    document.getElementsByClassName("row")[0].style.marginRight = "auto";
    document.getElementById("open-slidebar").style.display = "block";
    document.getElementById("Slidebar").style.display = "none";
    document.getElementById("open-slidebar-mobile").style.display = "block";
  }
</script>