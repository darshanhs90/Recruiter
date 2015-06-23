<?php 
	//error_reporting(0);
	session_start();
	require("../../config.php");
	$conn = new mysqli($host, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
   $semail = $_SESSION['user'];
   $query = "select fname,lname,email,companyname from users where email = '$semail'"; 
   $result = $conn->query($query);
         
        while ($line = $result->fetch_assoc()) { 
   		$fname=$line['fname'];
   		$lname=$line['lname'];
		$email=$line['email'];
		$univname=$line['companyname'];
		}
		 
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
			  <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.theme.css">
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
		 <script src="../../js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="../../js/employerProfile.js"></script>		
	</head>
	<body class="subpage">
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
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="12u">

									<!-- Main Content -->
										<section>
											<header>
												<h2>My Profile</h2>
											</header>
											
											<div class="row">
    <div class="jumbotron col-sm-12" >
    <form action="updateEmployerProfile.php" method="post" role="form" class="col-sm-6" name="myForm" novalidate >
       <div class="row">
       <div class="form-group col-sm-6">
      <label for="name">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter Firstname" required="true" value='<?php echo $fname; ?>' >
    </div>
       <div class="form-group col-sm-6">
      <label for="name">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Lastname" required="true" value='<?php echo $lname; ?>'>
    </div>
       </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" required="true" disabled="true" value='<?php echo $email; ?>'>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Change password" required="true"  title="Minimum Password Length is 8 Characters">
    </div>
    <button type="submit" class="btn btn-success" ng-show="myForm.$invalid" ng-disabled="myForm.$invalid" id="sbmt">Update Changes</button>
    <!-- <button type="button" class="btn btn-success" ng-show="myForm.$valid" id="btnsbmt" >Update Changes</button> -->
    </form>
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