<?php
session_start();
if(!isset($_SESSION['user'])) {
header("location: login.php");
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
		<title>Techruit AppP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.theme.css">
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
 <script src="js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="js/studentJobPostings.js"></script>		
	</head>
	<body class="subpage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">Techruit-Student</a></h1>

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
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="6u 12u(mobile)">

									<!-- Sidebar -->
										<section>
											<header>
												<h2>Video Interview</h2>
											</header>
																						
<a href="answer_video_call.html"> <button type="button" class="btn btn-success" ng-show="myForm.$valid" id="btnsbmt" ng-click="makevid()">Receive Video Call</button></a>
										</section>
										

								</div>
								<div class="6u 12u(mobile) important(mobile)">

									<!-- Main Content -->
										<section>
											<header>
												<h2>Text Editor</h2>
											</header>
<a href="cobrowsing_agent.html"> 
   		 <button type="button" class="btn btn-success" ng-show="myForm.$valid" id="btnsbmt" ng-click="makeshare()">Start Screen Share session</button></a>


										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

								<!-- Links -->
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

								<!-- Blurb -->
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