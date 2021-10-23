<?php 
if(isset($_POST['themsanpham']) && $_SESSION['type'] == 1){

  $productname = nht_boc($_POST['productname']);
  $descriptionEN = nht_boc($_POST['descriptionEN']);
  $descriptionVN = nht_boc($_POST['descriptionVN']);
  $price = nht_boc($_POST['price']);
  $category = nht_boc($_POST['category']);
  $type = nht_boc($_POST['type']);
  $brand = nht_boc($_POST['brand']);
  $img = nht_boc(htmlspecialchars(basename($_FILES["img"]["name"])));

  //FILES[]
  $countfiles = count($_FILES['files']['name']);


  //FILE IMAGES
  $target_dir = "../uploads/products/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // CHECK INPUT EMPTY
  if(empty($productname)||empty($descriptionEN)||empty($descriptionVN)||empty($price)||empty($category)||empty($type)||empty($brand)){
    echo '<script> Swal.fire({ icon: "error", title: "Oops...", text: "Something went wrong!", }) </script>';
  }else{
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    $FileImgUploaded = 0; // Trạng thái upload trường img File
    $FileImgsUploaded = 0; // Trạng thái upload trường imgs Files
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      // echo "File is not an image.";
      $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      // echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
      // echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
      // echo "Sorry, only JPG, JPEG, PNG files are allowed.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }else{
     if($countfiles != 0){
      //files
      $lastID = $conn->query("SELECT id FROM store ORDER BY id DESC LIMIT 1")->fetch();
      $lastID = (int)$lastID["id"];
      $lastID = $lastID + 1;  // nên chọn ID để trùng với 
      mkdir("$target_dir$lastID", 0755); // tạo thư mục | (link[id],)

      // Upload img
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $FileImgUploaded = 1; // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        // Loop all files
        $array_linkanh = array();

        for($i=0;$i<$countfiles;$i++){

        // File name
          $filename = $_FILES['files']['name'][$i];
          // Get extension
          $ext = explode(".", $filename);
          $ext = end($ext);

          // Valid image extension
          $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG");
          if(in_array($ext, $valid_ext)){
                // Upload file
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../uploads/products/'.$lastID.'/'.$filename)){
              array_push($array_linkanh,$filename);


              $FileImgsUploaded = 1;
            }else{
              $FileImgsUploaded = 0;
            }
          }
        }
      } else {
       $FileImgUploaded = 0;
        // echo "Lỗi file img.";
     }
     if ($FileImgUploaded == 1 && $FileImgsUploaded==1){
       $array_linkanh = implode(",",$array_linkanh);
      $sql = "
      INSERT INTO store(id, name, `description-en`, `description-vi`, price,images,category,type,`list-images`,brand) 
      VALUES      ('0','$productname','$descriptionEN','$descriptionVN','$price','$img','$category','$type','$array_linkanh','$brand')";

      $stmt=$conn->prepare($sql);
      $result = $stmt->execute();
      if($result){
       echo '<script> 
       $("#content-wrapper").load(location.href+" #content-wrapper>*","");
       Swal.fire({ icon: "success", title: "The product has been uploaded." });
       </script>';
     }
   }
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
    <input type="file" name="img" id="img" class="form-control file-upload-info" placeholder="Upload Image">
    <div id="preview-main-images"></div>
  </div>
</div>


<!-- LIST IMAGES UPLOAD -->
<div class="form-group">
  <label>Illustrating images (.png/.jpg/.jpge)</label>
  <div class="input-group col-xs-12">
    <input type="file" name="files[]" id="listImagesUpload" class="form-control file-upload-info" placeholder="Upload Image" multiple>
    <div id="preview-list-images"></div>
  </div>
</div>

<button type="submit" class="btn btn-primary mr-2" name="themsanpham">Submit</button>
</form>
</div>
</div>
</div>
<script type="text/javascript">
  // PREVIEW MAIN IMAGES
  var countImagesUpload = 0;
  function previewImages() {
    var preview = document.querySelector('#preview-main-images');

    if (this.files) {
      [].forEach.call(this.files, readAndPreview);
    }
    function readAndPreview(file) {
    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      countImagesUpload++;
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      // Xóa images có sẵn để thay thế || Mục đích chọn 1 ảnh chính
      if(countImagesUpload>1){
       preview.removeChild(preview.childNodes[0]);
     }
     preview.appendChild(image);

   });
    reader.readAsDataURL(file);
  }
}

document.querySelector('#img').addEventListener("change", previewImages);


 // PREVIEW LIST IMAGES    
 var countListImagesTimeUpload = 0;
 var countListImagesUpload = 0;
 function previewListImages() {
  var previewList = document.querySelector('#preview-list-images');
  
  countListImagesTimeUpload++;
  // Chạy for xóa ảnh cũ xóa xong thì đặt lại biến | countListImagesUpload = 0
  if (countListImagesTimeUpload>1){
    for(var i=0;i<countListImagesUpload;i++){
     previewList.removeChild(previewList.childNodes[i]);
   }
   var countListImagesUpload = 0;
 }
 

 console.log("Số lần:"+countListImagesTimeUpload);
 if (this.files) {
  [].forEach.call(this.files, readAndPreview);
}


function readAndPreview(file) {
    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      countImagesUpload++;
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      previewList.appendChild(image);
      countListImagesUpload++;
      console.log("Số ảnh/ lần:"+countListImagesUpload);

    });
    reader.readAsDataURL(file);
  }
}
document.querySelector('#listImagesUpload').addEventListener("change", previewListImages);

</script>
