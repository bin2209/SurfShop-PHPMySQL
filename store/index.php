<?php 
$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
$GLOBALS['host_link']= $_SERVER['HTTP_HOST'];
$link_directory = $_SERVER['PHP_SELF'];
$GLOBALS['direct'] = '';

$GLOBALS['link_directory_array'] = array('about/','services/','store/','login/');

for($i=0;$i<count($link_directory_array);$i++){
	$pos = strpos($link_directory,$link_directory_array[$i]);
	if ($pos == true){
		$direct = '../';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
	include($direct.'core/header.php'); 


	?>
</head>
<body>
	<!-- BAR -->
	<?php include($direct.'core/navbar.php'); 
	// echo .'../core/navbar.php';
	
	?>
	<!-- ENDBAR -->

	<section>
		<div class="hero content-center">
			<!-- <h1 class="hero-h1 ">LST SURF DA NANG </h1> -->
			<img class="img-hero" src="<?php echo $direct; ?>img/logo-white">
		</div>
	</section>
<!-- 	<section class="box-content trending">
		<h1 class="surf-h2-light content-center">Trending</h1>
		<div class="surf">

			
		</div>
	</section> -->

	<section class="box-content store content-center">
		<h1 class="surf-h2-dark content-center">Store</h1>
		<div class="row">
			 <?php
			 include('../login/config.php'); 

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
