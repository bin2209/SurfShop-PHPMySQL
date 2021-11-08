<style type="text/css">.desktop-services a{opacity: 1 !important; color: #ffffff !important;} .mobile-services a{color: #ffffff !important;}</style>
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);


a {
	text-decoration: none;
}
h1 {
	font-family: "Open Sans", sans-serif;
	font-weight: 300;
}
.row {
	margin: 50px auto 0;
}
.card {
	float: left;
	padding: 0 1.7rem;
	width: 50%;
	max-width: 350px;
	margin-bottom: 3em;
}
.card .menu-content-services {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.card .menu-content-services::before,
.card .menu-content-services::after {
	content: "";
	display: table;
}
.card .menu-content-services::after {
	clear: both;
}
.card .menu-content-services li {
	display: inline-block;
}
.card .menu-content-services a {
	color: #fff;
}
.card .menu-content-services span {
	position: absolute;
	left: 50%;
	top: 0;
	font-size: 10px;
	font-weight: 700;
	font-family: "Open Sans";
	transform: translate(-50%, 0);
}
.card .wrapper-services {
	background-color: #fff;
	min-height: 540px;
	border-radius: 16px;
	position: relative;
	overflow: hidden;
	box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.2);
}
.card .wrapper-services:hover .data {
	transform: translateY(0);
	backdrop-filter: blur(10px);
}

.card .data {
	position: absolute;
	bottom: 0;
	width: 100%;
	transform: translateY(calc(70px + 1em));
	transition: transform 0.3s;
}
.card .data .content-services {
	padding: 1em;
	position: relative;
	z-index: 1;
}
.card .author {
	font-size: 12px;
}
.card .title {
	margin-top: 10px;
}
.card .text {
	height: 70px;
	margin: 0;
}
.card input[type="checkbox"] {
	display: none;
}
.card input[type="checkbox"]:checked + .menu-content-services {
	transform: translateY(-60px);
}

.servicesCard .wrapper-services:hover .menu-content-services span {
	transform: translate(-50%, -10px);
	opacity: 1;
}
.servicesCard .header {
	color: #fff;
	padding: 1em;
}
.servicesCard .header::before,
.servicesCard .header::after {
	content: "";
	display: table;
}
.servicesCard .header::after {
	clear: both;
}
.servicesCard .header .date {
	float: left;
	font-size: 12px;
}
.servicesCard .menu-content-services {
	float: right;
}
.servicesCard .menu-content-services li {
	margin: 0 5px;
	position: relative;
}
.servicesCard .menu-content-services span {
	transition: all 0.3s;
	opacity: 0;
}
.servicesCard .data {
	color: #000;
	transform: translateY(calc(70px + 4em));
}
.servicesCard .title a {
	color: #000;
	font-size: 2em;
}
.servicesCard .button {
	display: block;
	width: 100px;
	margin: 2em auto 1em;
	text-align: center;
	font-size: 12px;
	color: #fff;
	line-height: 1;
	position: relative;
	font-weight: 700;
}
.servicesCard .button::after {
	content: "\2192";
	opacity: 0;
	position: absolute;
	right: 0;
	top: 50%;
	transform: translate(0, -50%);
	transition: all 0.3s;
}
.servicesCard .button:hover::after {
	transform: translate(5px, -50%);
	opacity: 1;
}

</style>
<section class=" store content-center">
	<div class="row">
		<div class="servicesCard card">
			<div class="wrapper-services" style="background: url(<?=$_DOMAIN?>/assets/img/services/1.jpeg)center/cover no-repeat;">
				<div class="header">
					<div class="date">
						<span class="day">Active</span>
					</div>
					<ul class="menu-content-services">
						<li>
							<a href="#" class="fa fa-bookmark-o"></a>
						</li>
						<li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
						<li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
					</ul>
				</div>
				<div class="data">
					<div class="content-services">
						<span class="author">Services</span>
						<h1 class="title"><a href="#"><?php echo $LANG_services_title1 ?></a></h1>
						<p class="text"><?php echo $LANG_services_content1 ?></p>
						<br><br><br><br>
					</div>
				</div>
			</div>
		</div>

		<div class="servicesCard card">
			<div class="wrapper-services" style="background: url(<?=$_DOMAIN?>/assets/img/services/4.jpeg)center/cover no-repeat;">
				<div class="header">
					<div class="date">
						<span class="day">Active</span>
					</div>
					<ul class="menu-content-services">
						<li>
							<a href="#" class="fa fa-bookmark-o"></a>
						</li>
						<li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
						<li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
					</ul>
				</div>
				<div class="data">
					<div class="content-services">
						<span class="author"><?php echo $LANG_services ?></span>
						<h1 class="title"><a href="#"><?php echo $LANG_services_title4 ?></a></h1>
						<p class="text"><?php echo $LANG_services_content4 ?></p>
						<br><br>
					</div>
				</div>
			</div>
		</div>

		<div class="servicesCard card">
			<div class="wrapper-services" style="background: url(<?=$_DOMAIN?>/assets/img/services/2.jpeg)center/cover no-repeat;">
				<div class="header">
					<div class="date">
						<span class="day">Active</span>
					</div>
					<ul class="menu-content-services">
						<li>
							<a href="#" class="fa fa-bookmark-o"></a>
						</li>
						<li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
						<li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
					</ul>
				</div>
				<div class="data">
					<div class="content-services">
						<span class="author"><?php echo $LANG_services ?></span>
						<h1 class="title"><a href="#"><?php echo $LANG_services_title2 ?></a></h1>
						<p class="text"><?php echo $LANG_services_content2 ?></p>
						<br><br>
					</div>
				</div>
			</div>
		</div>

		<div class="servicesCard card">
			<div class="wrapper-services" style="background: url(<?=$_DOMAIN?>/assets/img/services/3.jpeg)center/cover no-repeat;">
				<div class="header">
					<div class="date">
						<span class="day">Active</span>
					</div>
					<ul class="menu-content-services">
						<li>
							<a href="#" class="fa fa-bookmark-o"></a>
						</li>
						<li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
						<li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
					</ul>
				</div>
				<div class="data">
					<div class="content-services">
						<span class="author"><?php echo $LANG_services ?></span>
						<h1 class="title"><a href="#"><?php echo $LANG_services_title3 ?></a></h1>
						<p class="text"><?php echo $LANG_services_content3 ?></p>
						<br><br><br><br>	
					</div>
				</div>
			</div>
		</div>

		<div class="servicesCard card">
			<div class="wrapper-services" style="background: url(<?=$_DOMAIN?>/assets/img/services/5.jpeg)center/cover no-repeat;">
				<div class="header">
					<div class="date">
						<span class="day">Active</span>
					</div>
					<ul class="menu-content-services ">
						<li>
							<a href="#" class="fa fa-bookmark-o"></a>
						</li>
						<li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
						<li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
					</ul>
				</div>
				<div class="data">
					<div class="content-services blackcard">
						<span class="author" style="color:#fff;"><?php echo $LANG_services ?></span>
						<h1 class="title" ><a href="#" style="color:#fff;"><?php echo $LANG_services_title5 ?></a></h1>
						<p class="text" style="color:#fff;"><?php echo $LANG_services_content5 ?></p>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Close row-->
</section>

