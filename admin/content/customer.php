         <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Customer</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Client Name </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Start Date </th>
                        <th>  Status </th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php
                      $sql= 'SELECT * FROM user';
                      $result = mysqli_query($db,$sql);

                      while($row = mysqli_fetch_assoc($result)) {
                       foreach ($row as $field => $value) {
                        $name = $row["name"];
                        $user = $row["username"];
                        $email = $row["email"];
                        if ($email==''){
                          $email = 'None';
                        }
                        $phone = $row["phone"];
                        if ($phone==''){
                          $phone = 'None';
                        }
                        $about = $row["about"];
                        $avatar = $row["avatar"];
                        $startdate = $row["startdate"];

                        if ($row["status"]==0){
                          $status = 'OK';
                        }
                      }
                      echo '<tr>';
                      echo '<td><img src="'.$avatar.'" alt="image" / ><span class="pl-2">'.$name.'</span></td>';
                      echo '<td>'.$user.'</td>';
                      echo '<td>'.$email.'</td>';
                      echo '<td>'.$phone.'</td>';
                      echo '<td>'.$startdate.'</td>';
                      echo '<td><div class="badge badge-outline-success">'.$status.'</div></td>';
                      echo '</td>';
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>