<style type="text/css">.desktop-home a{-webkit-filter: brightness(150%); opacity: 1 !important; color: #ffffff !important;} .mobile-home a{color: #ffffff !important;}</style>
<section>
	
		<div class="hero content-center">
			<img class="img-hero" src="assets/img/logo.png">
		</div>
	<div class="overplay"></div>
</section>
<section class="trending">
	<h1 class="surf-h2-light content-center"><?php echo $LANG_trending; ?></h1>
	<div class="owl-carousel">
		<div class="cardBoard">
			<img class="" src="uploads/products/b1.png"/>
		</div>
		<div class="cardBoard">
			<img class="" src="uploads/products/b2.png"/>
		</div>
		<div class="cardBoard">
			<img class="" src="uploads/products/b3.png"/>
		</div>
	</div>
</section>
<section class="store content-center">
	<div class="row">
		<?php
		$sql = "SELECT * FROM store";
		$result = $conn->query($sql);
		$count = 0;
		foreach ($result as $row) {
			if ($count == 6){
				break; 
			}
			$count++;
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
				$price = 'FREE';
			}

			echo '<div class="column">
				<a href="/product/'.$id.'" data-handle="">
				    <div class="background-blur product">
						<img class="content-center" src="../uploads/products/'.$images.'"/>
					</div>
				</a>
			 </div>
			';
		}
		?>
	</div>
	<a href="/store" style="text-decoration: none;"><span class="more-button"><?php echo $LANG_morebutton; ?></span></a>
	<style>
		.trending{
			height: fit-content;
		}
		.cardBoard{
			width: 100%;
			height: -webkit-fill-available;
  			margin: auto;
			max-width: 650px;	
			padding: 20px 0;
		}
		.cardBoard img{
			width: auto;
			height: 100%;
			margin: auto;
		}
		.owl-dots{
			padding-bottom:20px;
			text-align: center;
			width: 100%;
		}
		.owl-dots span {
			background: none repeat scroll 0 0 #869791;
			border-radius: 20px;
			display: block;
			height: 12px;
			margin: 5px 7px;
			opacity: 0.5;
			width: 12px;
		}
	</style>
	<script>
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				center: true, 
				items: 1
			});
		});
	</script>
</section>

