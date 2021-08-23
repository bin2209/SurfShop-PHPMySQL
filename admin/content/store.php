<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All</h4>
        <p class="card-description"> View page <a href="../../store/" target="_blank">store</a></p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Description - English</th>
                <th>Description - Vietnam</th>
                <th>Price</th>
                <th>More</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql= 'SELECT * FROM store';
              $result = mysqli_query($db,$sql);
              while($row = mysqli_fetch_assoc($result)) {
               foreach ($row as $field => $value) {
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
                  $price = 'FREE?';
                }
              }
              echo '<tr>';
              echo '<td><img src="../../upload/'.$images.'" alt="image" / >'.$id.'</td>';
              echo ' <td>'.$name.'</td>';
              echo '<td>'.$description_en.'</td>';
              echo '  <td>'.$description_vi.'</td>';
              echo ' <td>'.$price.'</td>';
              echo ' <td><label class="badge badge-warning">Edit</label> <label class="badge badge-danger">Remove</label></td>';
              echo '</tr>';
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


      <form class="forms-sample" action="function/upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputName1">ID</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Auto" disabled>
        </div>
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
      function listFolderFiles($dir){
        $ffs = scandir($dir);

        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
        if (count($ffs) < 1)
          return;

        foreach($ffs as $ff){
          echo '<li>'.$ff;
          if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
          echo '</li>';
        }
      }

      listFolderFiles('../upload');
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