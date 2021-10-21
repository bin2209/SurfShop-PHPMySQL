<?php 
if(isset($_POST['themsanpham']) && $_SESSION['type'] == 1){



  $productname = nht_boc($_POST['productname']);
  $descriptionEN = nht_boc($_POST['descriptionEN']);
  $descriptionVN = nht_boc($_POST['descriptionVN']);
  $price = nht_boc($_POST['price']);
  $category = nht_boc($_POST['category']);
  $type = nht_boc($_POST['type']);
  $brand = nht_boc($_POST['brand']);

  //FILE IMAGES
  $target_dir = "../upload/products/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // CHECK INPUT EMPTY
  if(empty($productname)||empty($descriptionEN)||empty($descriptionVN)||empty($price)||empty($category)||empty($type)||empty($brand)){
    echo '<script> Swal.fire({ icon: "error", title: "Oops...", text: "Something went wrong!", }) </script>';
  }else{
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
      echo "Sorry, only JPG, JPEG, PNG files are allowed.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }else{
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $sql = "
        INSERT INTO store(id, name, `description-en`, `description-vi`, price,images,category,type,`list-images`,brand) 
        VALUES      ('0','$productname','$descriptionEN','$descriptionVN','$price','','$category','$type','','$brand')";
        $stmt=$conn->prepare($sql);
        $result = $stmt->execute();
        if($result){
         echo '<script> Swal.fire({ icon: "success", title: "The product has been uploaded." }) </script>';
       }
       
     } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
}
?>

<div class="col-lg-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">New product</h4>
      <form class="forms-sample" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputName1">Product's name</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Product's name" name="productname">
        </div>

        <div class="form-group">
          <label for="Description-English">Description - English</label>
          <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Description - English" name="descriptionEN"></textarea>
        </div>

        <div class="form-group">
          <label for="Description-Vietnam">Description - Vietnam</label>
          <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Description - Vietnam" name="descriptionVN"></textarea>
        </div>

        <div  class="form-group">
          <label for="exampleSelectGender">Category</label>
          <br>
          <select id="Category"  name="category">
            <?php 
            for($i=0; $i<count($array_category);$i++){
              if ($i==0){
                echo '<option value="">Select</option>';
              }else{
               echo ' <option value="'.$i.'">'.$array_category[$i][0].'</option>';
             }
           }
           ?>
         </select>
       </div>

       <div class="form-group ">
         <label for="">Type</label>
         <br>
         <select id="Type" name="type">
           <?php
           for($i=1;$i<count($array_category);$i++){
            for($j=1;$j<count($array_category[$i]);$j++){
              echo '<option class="type type'.$i.'" value="'.$j.'">'.$array_category[$i][$j].'</option>';
            }
            echo '';
          }
          ?>

        </select>
      </div>

  <!-- <form id="type" class="form-group">
  <label for="exampleSelectGender">Type</label>
  <br>
  <select id="" name="type">
  <option value="surf">Surf Board</option>
  <option value="skate">Skate Board</option>
  <option value="clothes">Clothes</option>
  <option value="other">Other</option>
  </select>
</form> -->

<div class="form-group">
  <label>Brand</label>
  <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Brand" name="brand">
</div>
<div class="form-group">
  <label>Price</label>
  <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Price" name="price">
</div>

  <div class="form-group">
  <label>Main Images (.png/.jpg/.jpge)</label>
  <div class="input-group col-xs-12">
  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control file-upload-info" placeholder="Upload Image">
  <span class="input-group-append">
  </span>
  </div>
</div>

  <!--  <div class="form-group">
  <label>Illustrating images (.png/.jpg/.jpge)</label>
  <div class="input-group col-xs-12">
  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control file-upload-info" placeholder="Upload Image">
  <span class="input-group-append">
  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
  </span>
  </div>
</div> -->

<button type="submit" class="btn btn-primary mr-2" name="themsanpham">Submit</button>
</form>
</div>
</div>
</div>

