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
<div class="col-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add new product</h4>
      <form class="forms-sample">
        <div class="form-group">
          <label for="exampleInputName1">ID</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail3">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword4">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleSelectGender">Gender</label>
          <select class="form-control" id="exampleSelectGender">
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="img[]" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputCity1">City</label>
          <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-dark">Cancel</button>
      </form>
    </div>
  </div>
</div>