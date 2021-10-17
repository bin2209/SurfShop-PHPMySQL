<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <?php
        if(isset($_GET['category'])){
        $where_category = $_GET['category'];
        }
        if(isset($_GET['type'])){
        $where_type = $_GET['type'];
        }

        $array_category = array("None",
        array("Surf","Board","Fins","Leaches","Tractions"),
        array("Skate","Board","Decks","Trucks","Wheels","Grips","Brearings","Hardwares"),
        array("Clothes","Shirts","Pants","Shorts","Jackets","Dresses","Shoes","Bags","Swimwears","Wetsuits"),
        array("Other","Sun glasses","Sun screen"));
        
        ?>
        <h5 style="width: -webkit-fill-available; display: inline;">Category:</h5>
        <select id="type" onchange="location = this.value;" style="top: 20px; left: 20px;">
          <option value="?slidebar=store" <?php if(!isset($where_category)){echo 'selected';}?>>All</option>
          <?php
          for($i=1;$i<count($array_category);$i++){
          if(isset($where_category)&&$where_category==$i){
          $selected = 'selected';
          }else{
          $selected = '';
          }
          echo "<option value='?slidebar=store&category=$i' $selected>".$array_category[$i][0]."</option>";
          }
          ?>
        </select>
        <?php if(isset($where_category)){?>
        <h5 style="width: -webkit-fill-available; display: inline;"> Type: </h5>
        
        <select id="type" onchange="location = this.value;" style="top: 20px; left: 20px;">
          <option value="?slidebar=store&category=<?php echo $where_category;?>" <?php if(!isset($where_type)){echo 'selected';}?>>All</option>
          <?php
          for($i=1;$i<count($array_category[$where_category]);$i++){
          if(isset($where_type)&&$where_type==$i){
          $selected = 'selected';
          }else{
          $selected = '';
          }
          echo "<option value='?slidebar=store&category=$where_category&type=$i' $selected>".$array_category[$where_category][$i]."</option>";
          }
          ?>
          
        </select>
        <?php }?>
        <p class="card-description"> View page <a href="../../store" target="_blank">store</a></p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price</th>
                <th>More</th>
              </tr>
            </thead>
            <tbody>
              <?php
              function print_Product($stmt,$array_category){
              $stmt->execute();
              while ($row = $stmt->fetch()){
              $id = $row["id"];
              $images = $row["images"];
              $name = $row["name"];
              $brand = $row["brand"];
              $description_vi = $row["description-vi"];
              $description_en = $row["description-en"];
              $price = $row["price"];
              $category = $row["category"];
              $type = $row["type"];

              //  CATEGORY - TYPE
              $s_category = $array_category[$category][0];
              $s_type = $array_category[$category][$type];
    
              echo '<tr>';
                echo '<td>'.$id.' <img src="../../upload/'.$images.'" alt="image" / ></td>';
                echo ' <td>'.$name.'</td>';
                echo ' <td>'.$brand.'</td>';
                echo ' <td>'.$s_category.' | '.$s_type.'</td>';
                echo ' <td>'.s_PriceFormat($price).'₫</td>';
                echo ' <td>
                  <label class="badge badge-primary" onclick="show_Product('.$id.',`'.$name.'`,`'.$images.'`,`'.$price.'`,`'.$description_en.'`,`'.$description_vi.'`,`'.$brand.'`)">Detail</label>
                  <label class="badge badge-warning" onclick="edit_Product('.$id.',`'.$name.'`,`'.$images.'`,`'.$price.'`,`'.$description_en.'`,`'.$description_vi.'`,`'.$brand.'`)">Edit</label>
                  <label class="badge badge-danger" onclick="delete_Product('.$id.')">Delete</label></td>';
                echo '</tr>';
                }
                }
                if (isset($where_type) && isset($where_category)){
                $stmt = $conn->prepare("SELECT * FROM store WHERE category = $where_category&&type=$where_type");
                print_Product($stmt,$array_category);
                }elseif (isset($where_category)){
                $stmt = $conn->prepare("SELECT * FROM store WHERE category = $where_category");
                print_Product($stmt,$array_category);
                }else{
                $stmt = $conn->prepare("SELECT * FROM store");
                print_Product($stmt,$array_category);
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add new product</h4>
          <form class="forms-sample" action="request/upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputName1">Product's name</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Product's name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Description - English</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Description - English"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Description - Vietnam</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Description - Vietnam"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Type</label>
              <br>
              <select id="type" name="type">
                <option value="surf">Surf Board</option>
                <option value="skate">Skate Board</option>
                <option value="clothes">Clothes</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Price</label>
              <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Price">
            </div>
            <div class="form-group">
              <label>File upload (.png/.jpg/.jpge)</label>
              <div class="input-group col-xs-12">
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control file-upload-info" placeholder="Upload Image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div id="uploadfiles" class="card">
        <div class="card-body">
          <h4 class="card-title">Upload Images</h4>
          <form class="forms-sample" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>File upload (.png/.jpg/.jpge)</label>
              <div class="input-group col-xs-12">
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control file-upload-info" placeholder="Upload Image">
                <input type="text" name="type_of_form" value="uploadimages" required="true" style="display: none;">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="submit">Upload</button>
                </span>
              </div>
            </div>
          </form>
          <?php
          function categoryFolderFiles($dir){
          $ffs = scandir($dir);
          unset($ffs[array_search('.', $ffs, true)]);
          unset($ffs[array_search('..', $ffs, true)]);
          // prevent empty ordered elements
          if (count($ffs) < 1)
          return;
          foreach($ffs as $ff){
          echo '<li>'.$ff;
            if(is_dir($dir.'/'.$ff)) categoryFolderFiles($dir.'/'.$ff);
          echo '</li>';
          }
          }
          categoryFolderFiles('../upload');
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  //UPLOAD FILE
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST["type_of_form"])=='uploadimages'){
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
  // echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
  } else {
  // echo "File is not an image.";
  $uploadOk = 0;
  }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
  // echo "Sorry, your file is too large.";
  $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  echo '<script>Swal.fire({ icon: "success", text: "The file  has been uploaded.", showConfirmButton: true, timer: 2500, willClose: () =>{ location.reload(); } });</script>';
  } else {
  // echo "Sorry, there was an error uploading your file.";
  echo '<script>Swal.fire({ icon: "error", text: "There was an error uploading your file", showConfirmButton: true, timer: 2500, willClose: () =>{ location.reload(); } });</script>';
  }
  }
  }
  }
  ?>