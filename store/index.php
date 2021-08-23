<?php 
include '../function/get_link_folder.php'; 
// HEADER
include($direct.'core/header.php');
// NAVBAR
include($direct.'core/navbar.php');
?>


	<section class="store content-center">
		<h1 class="surf-h2-dark content-center">Store</h1>
		<div class="row">
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
            echo '<div class="column product">';
            echo '<img class="content-center" src="../upload/'.$images.'"/>';
            echo '</div>';
           
          }
          ?>

			
		
		</div>
	</section>
	<?php include($direct.'core/footer.php'); ?>
</body>
</html>
