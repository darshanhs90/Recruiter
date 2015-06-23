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
		<script src="../../js/employerPostLoginHome.js"></script>		
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">Techruit-Employer</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="employerPostLoginHome.php">Homepage</a>
										<a href="employerInterviews.php">Interview Dashboard</a>
										<a href="employerAnalyseProfiles.php">Analyse Profiles</a>
										<a href="employerShortlists.php">Shortlisted Students</a>
										<a href="employerProfile.php">My Profile</a>
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
										<p>Welcome, please check your profile for the QR code</p>
										<a href="#" class="button-big">Go on, click me!</a>

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

									<!-- Feature #1 -->
										<section>
											
											<h2>Welcome to Halcyonic</h2>
											<p>
												This is <strong>Halcyonic</strong>, a free site template
												by <a href="http://n33.co/">AJ</a> for
												<a href="http://html5up.net">HTML5 UP</a>. It's responsive,
												built on HTML5 + CSS3, and includes 5 unique page layouts.
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									<!-- Feature #2 -->
										<section>
											
											<h2>Responsive You Say?</h2>
											<p>
												Yes! Halcyonic is built on the <a href="http://getskel.com">Skel</a>
												framework, so it has full responsive support for desktop, tablet,
												and mobile device displays.
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									<!-- Feature #3 -->
										<section>
											
											<h2>License Info</h2>
											<p>
												Halcyonic is licensed under the <a href="http://html5up.net/license">CCA 3.0</a> license,
												so use it for personal or commercial use as much as you like (just keep
												the footer credit intact).
											</p>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									<!-- Feature #4 -->
										<section>
											
											<h2>Volutpat etiam aliquam</h2>
											<p>
												Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse
												eu varius nibh. Suspendisse vitae magna eget odio amet mollis.
											</p>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Copyright -->
				<div id="copyright">
						&copy; All rights reserved. | Techruit App
				</div>

		</div>

		<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/skel-viewport.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../../assets/js/main.js"></script>

	</body>
</html>