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
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Start Date </th>
                        <th>  Status </th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $stmt = $conn->prepare("SELECT * FROM user");
                     $stmt->execute();
                     while ($row = $stmt->fetch()){
                      $email = $row["email"];
                      $avatar = $row["avatar"];
                      $name = $row["name"];
                      $phone = $row["phone"];
                      $startdate = $row["startdate"];
                      $status = $row["status"];
                      if ($status=="0"){
                        $status = "Active";
                      }
                      echo '<tr>';
                      echo '<td><img src="'.$avatar.'" alt="image" / ><span class="pl-2">'.$name.'</span></td>';
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