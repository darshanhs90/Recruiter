<?php
session_start();
if(!isset($_SESSION['user'])) {
header("location: ../../login.php");
exit();
}
/*else{
echo $_SESSION['user'];
}*/
?>
<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Techruit App</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="../../js/studentPostLoginHome.js"></script>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<<!-- Logo -->
									<h1><a href="studentPostLoginHome.php" id="logo">Techruit-Student</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="studentPostLoginHome.php">Homepage</a>
										<a href="studentInterviews.php">Interview Dashboard</a>
										<a href="studentCompanyInsights.php">Company Insights</a>
										<a href="studentZone.php">Interview Zone</a>
										<a href="studentProfile.php">My Profile</a>
										<a href="../../logout.php">Logout</a>
									</nav>

							</div>
						</div>
					</header>
					<div id="banner">
						<div class="container">
							<div class="row">
								<div class="6u 12u(mobile)">

									<!-- Banner Copy -->
										<p>Welcome, your QR code for the resume is avalable under MyProfile</p>
										<a href="studentProfile.php" class="button-big">Take me there!</a>

								</div>
								<div class="6u 12u(mobile)">

									<!-- Banner Image -->
										<a href="#" class="bordered-feature-image"><img src="../../images/banner.jpg" alt="" /></a>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Features -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div class="row">
								<div class="3u 12u(mobile)">

									
										<section>
											
											<h2>Welcome to Techruit</h2>
											<p>
												One stop for your career fair resume needs and company insights.
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									
										<section>
											
											<h2>Free for all</h2>
											<p>
												Yes! It's absolutely free for all.
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									
										<section>
											
											<h2>License Info</h2>
											<p>
												This app has been built by Darshan and Prajwal.
												Extensive use of Kandy has been made for all your interview 
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									
										<section>
											
											<h2>Contact Us!</h2>
											<p>
												<a href="mailto:hsdars@gmail.com">Darshan</a>
												<a href="mailto:prajwal19@gmail.com">Prajwal</a>
											</p>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>
<!-- 
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u(mobile)">

									
										<section>
											<header>
												<h2>Who We Are</h2>
												<h3>A subheading about who we are</h3>
											</header>
											<a href="#" class="feature-image"><img src="images/pic05.jpg" alt="" /></a>
											<p>
												Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
												Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet mollis
												justo facilisis quis. Sed sagittis mauris amet tellus gravida lorem ipsum.
											</p>
										</section>

								</div>
								<div class="4u 12u(mobile)">

									
										<section>
											<header>
												<h2>What We Do</h2>
												<h3>A subheading about what we do</h3>
											</header>
											<ul class="check-list">
												<li>Sed mattis quis rutrum accum</li>
												<li>Eu varius nibh suspendisse lorem</li>
												<li>Magna eget odio amet mollis justo</li>
												<li>Facilisis quis sagittis mauris</li>
												<li>Amet tellus gravida lorem ipsum</li>
											</ul>
										</section>

								</div>
								<div class="4u 12u(mobile)">

									
										<section>
											<header>
												<h2>What People Are Saying</h2>
												<h3>And a final subheading about our clients</h3>
											</header>
											<ul class="quote-list">
												<li>
													<img src="images/pic06.jpg" alt="" />
													<p>"Neque nisidapibus mattis"</p>
													<span>Jane Doe, CEO of UntitledCorp</span>
												</li>
												<li>
													<img src="images/pic07.jpg" alt="" />
													<p>"Lorem ipsum consequat!"</p>
													<span>John Doe, President of FakeBiz</span>
												</li>
												<li>
													<img src="images/pic08.jpg" alt="" />
													<p>"Magna veroeros amet tempus"</p>
													<span>Mary Smith, CFO of UntitledBiz</span>
												</li>
											</ul>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

								
									<section>
										<h2>Links to Important Stuff</h2>
										<div>
											<div class="row">
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
											</div>
										</div>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								
									<section>
										<h2>An Informative Text Blurb</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
											varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
											dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
											lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
										</p>
									</section>

							</div>
						</div>
					</footer>
				</div>
 -->
			<!-- Copyright -->
				<div id="copyright">
						&copy; All rights reserved. | Techruit App
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>