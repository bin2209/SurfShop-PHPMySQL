<!DOCTYPE html>
<html>
<head>
	<?php include('core/header.php'); 
		
	?>
</head>
<body>
	<!-- BAR -->
	<?php include('core/navbar.php'); 
	?>
	<!-- ENDBAR -->

	


	<section>
		<div class="hero content-center">
			<!-- <h1 class="hero-h1 ">LST SURF DA NANG </h1> -->
			<img class="img-hero" src="img/logo-white">
		</div>
	</section>
	<section class="box-content trending">
		<h1 class="surf-h2-light content-center">Trending</h1>
		<div class="surf">
			<div class="Slides">
				<img class="img-80 content-center" src="img/board/b1.png"/>
				<p class="description">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
			</div>
			<div class="Slides">
				<img class="img-80 content-center" src="img/board/b2.png"/>
				<p class="description">
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
				</p>
			</div>
			<div class="Slides">
				<img class="img-80 content-center" src="img/board/b3.png"/>
				<p class="description">
					The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
				</p>
			</div>


			<div class="surf-control content-center">
				<button class="box-cicle" onclick="plusDivs(-1)">&#10094;</button>
				<span class="boardname">Name of surf board</span>
				<button class="box-cicle" onclick="plusDivs(+1)">&#10095;</button>
			</div>
		</div>
	</section>

	<section class="box-content store content-center">
		<h1 class="surf-h2-dark content-center">Store</h1>
		<div class="row">
			<div class="column product"><img class="content-center" src="img/board/b1.png"/></div>
			<div class="column product"><img class="content-center" src="img/board/b2.png"/></div>
			<div class="column product"><img class="content-center" src="img/board/b3.png"/></div>
			<div class="column product"><img class="content-center" src="img/board/b4.png"/></div>
			<div class="column product"><img class="content-center" src="img/board/b5.png"/></div>
			<div class="column product"><img class="content-center" src="img/board/b6.png"/></div>
		</div>
		<a href="/store" style="text-decoration: none;"><span class="more-button">More</span></a>
	</section>



	<?php include('core/footer.php'); ?>
	<!-- JS SLIDE INDEX -->
	<script type="text/javascript">
		var slideIndex = 1;
		showDivs(slideIndex);
		function plusDivs(n) {
			showDivs(slideIndex += n);
		}
		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("Slides");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";  
					}
					x[slideIndex-1].style.display = "block";  
				}
			</script>
		

		</body>
		</html>
