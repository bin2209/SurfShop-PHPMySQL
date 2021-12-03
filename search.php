<?php 
$page_title = 'Search';
require_once ('includes/header.php'); 
require_once ('includes/navbar.php');
?>


<section class="section-search">

	<div id="div-search">
		<h1 class="surf-h2-dark content-center" >Search</h1>
		<form method="get">
			<input type="" name="src" placeholder="Search.." value="<?php echo(htmlspecialchars($_GET['src']))?>">
			<input type="submit" style="display:none;">
		</form>	
		<?php 
	// SEARCH FUNCTION
		$value_search = $_GET['src'];
		if(!empty($value_search)){

			$stmt = $conn->prepare("SELECT * FROM store WHERE name=?");
			$stmt->execute([$value_search]);

			if ($stmt->rowCount()==0){
				echo '<span class="result"><p>0 results found</p></span>';

			}else {
				$product = $stmt->fetch();
				$product_id = $product['id'];
				$product_images = $product['images'];
				$mota_en=$product['description-en'];
				$mota_vi=$product['description-vi'];
				if ($_COOKIE['language']=='en'){
					$mota = $mota_en;
				} else{
					$mota = $mota_vi;
				}

				echo '<span class="result result-box"><img src="upload/'.$product_images.'"><p>'.$mota.'</p></span>';
			}

		}

		?>

	</div>
	
</section>
<style type="text/css">
.result-box{
	font-size: 16px;
	background: #101011bf;
	color: white;
	width: 300px;
	font-size: 20px;
	margin-top: 1em;
	padding: 10px;
	border: 0px solid ;
	border-radius: 15px;
	margin-left: auto;
	margin-right: auto;

}
.result-box:hover{
	background: #101011bf;
}
.result-box img{
	float: left;
	width: 30px;
	height: 30px;
}
.result-box p{
	font-weight: 600;
	font-size: 16px;
	display: inline;
	position: relative;
}
.surf-h2-dark{
	color: white;
}
.result p{
	font-size: 20px;
	color: white;
}
.section-search{
	height: 70vh;
	background: url(assets/img/herosurf.jpg);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
}
.section-search h1{
	position: relative;
	top: 10%;
}

.section-search input{
	color: #afafaf;
	position: relative;
	margin-top: 10px;
	display: block;
	margin-left: auto;
	margin-right: auto;
	border: 0px solid ;
	background: #00000088;
	color: white;
	width: 300px;
	border-radius: 15px;
	font-size: 15px;
	padding: 10px;
}
.section-search form{
	position: relative;
	top: 10%;
}

#div-search{ 
	height: auto;
	position: relative;
	display: flex;

	backdrop-filter: saturate(180%) blur(3px);
	height: -webkit-fill-available;
	flex-direction: column;
	justify-content: flex-start;
	margin: 0;
	color: #101010;
}
#div-search .result{
	position: relative;
	top: 10%;
	margin-top: 20px;
	font-size: 15px;
	text-align: center;
}


</style>
<?php require_once('includes/footer.php'); ?>
