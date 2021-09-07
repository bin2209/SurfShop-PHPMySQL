<?php 
$title = 'Home';
include('core/header.php'); 
include('core/navbar.php');
?>


<section>
	
		<div class="hero content-center">
			<img class="img-hero" src="img/logo.png">
		</div>
	<div class="overplay"></div>
</section>
<section class="trending">
	<h1 class="surf-h2-light content-center"><?php echo $LANG_trending; ?></h1>
	<div class="surf">
		<div class="Slides">
			<img class="img-100 content-center" src="upload/b1.png"/>
		</div>
		<div class="Slides">
			<img class="img-100 content-center" src="upload/b2.png"/>
		</div>
		<div class="Slides">
			<img class="img-100 content-center" src="upload/b3.png"/>
		</div>
	</div>
	<div class="surf-control content-center">
		<span class="w3-badge w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
		<span class="w3-badge w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
		<span class="w3-badge w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
	</div>
</section>
<section class="store content-center">
	<h1 class="surf-h2-dark content-center"><?php echo $LANG_store; ?></h1>
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

			echo '<div class="column product">';
			echo '<img class="content-center" src="../upload/'.$images.'"/>';
			echo '</div>';
		}
		?>
	</div>
	<a href="/store" style="text-decoration: none;"><span class="more-button"><?php echo $LANG_morebutton; ?></span></a>
	<script type="text/javascript">
		var slideIndex = 1;
		showDivs(slideIndex);
		function plusDivs(n) {
			showDivs(slideIndex += n);
		}
//Khi click vào dot
function currentDiv(n) {
	showDivs(slideIndex = n);
}
function showDivs(n) {
	var i;
	var x = document.getElementsByClassName("Slides");
	var dots = document.getElementsByClassName("w3-badge");
	if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-white", "");
			}
			x[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " w3-white";
		}

		carousel(); // auto Slideshow
		function carousel() {
			plusDivs(1);
			setTimeout(carousel, 3000);
		}
	</script>
</section>

<?php include('core/footer.php'); ?>
<!-- JS SLIDE INDEX -->
</body>
</html>
