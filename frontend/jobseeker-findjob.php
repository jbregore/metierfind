<?php
session_start();
if (isset($_SESSION['js_id'])) {
} else {
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Metierfind | Jobseeker Site</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/jobseeker-findjob.css">
	</link>

	<link rel="shortcut icon" href="my-icon.ico">

	<!--fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>

	<input type="hidden" id="js_id">
	<!--start header-->
	<div class="header" id="my-header">
		<div class="container">

			<!--start navbar-->
			<div class="navbar">

				<div class="logo">
					<!-- <img src="assets/images/index/metierfind.png"> -->
					<h1>Metierfind</h1>
				</div>

				<nav>
					<ul id="menuItems">
						<li><a href="jobseeker-findjob.php" class="active">Find Jobs</a></li>
						<li><a href="jobseeker-savedjobs.php">Saved Jobs</a></li>
						<li><a href="jobseeker-appliedjobs.php">Applied Jobs</a></li>
						<li><a href="jobseeker-myprofile.php">My Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>

				<img src="assets/images/menu.png" id="menu-icon" onclick="menuToggle()">
			</div>
			<!--end navbar-->

		</div>
	</div>
	<!--end header-->


	<!----- categories ------>
	<div class="categories" id="my-categories">
		<div class="small-container">
			<div class="row">
				<img src="assets/images/index/metierfind.png" class="this-image" width="300px">
			</div>

			<div class="row">
				<div class="col-1">
					<div class="job-cate">
						<ul id="myDiv">
							<li id="type1" onclick="viewFullTime()" class="active">Full Time</li>
							<li id="type2" onclick="viewPartTime()">Part Time</li>
							<li id="type3" onclick="viewContract()">Contract</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row" id="fetch-job">
			</div>

		</div>
	</div>
	<!----- end categories ------>

	<!-- style="display: none;" -->
	<div class="modal-view-job" id="modal-view-job" style="display: none;">
		<div class="modal">
			<div class="modal-header">
				<span id="close-view-job">&times;</span>
			</div>

			<div class="row">

				<div class="col-70">
					<h1 id="text-job-title-view">Job Title</h1>
					<h2>Job Description</h2>
					<ul>
						<li id="text-job-desc1-view"></li>
						<li id="text-job-desc2-view"></li>
						<li id="text-job-desc3-view"></li>
					</ul>
					<h2>Job Qualifications</h2>
					<ul>
						<li id="text-job-quali1-view"></li>
						<li id="text-job-quali2-view"></li>
						<li id="text-job-quali3-view"></li>
					</ul>
					<h2>Additional Details</h2>
					<div class="additional-details">
						<p>Vacancies : <span id="text-job-vacancies-view"></span></p>
						<p>Location : <span id="text-job-location-view"></span></p>
						<p>Job Type : <span id="sel-job-type-view"></span></p>
					</div>
				</div>

				<div class="col-30">
					<img width="200px" height="200px" id="comp-img-view">
					<h1 id="comp-name-view"></h1>
					<h2 id="comp-location-view"></h2>
					<p id="posted-date"><i class="fa fa-clipboard"></i></p>
					<p id="comp-site-view"><i class="fa fa-globe "></i>samplecorp.com</p>
					<p id="comp-site-view-more"><i class="fa fa-search"></i></p>
					<h1 class="salary" style="color: #ff3e97;" id="text-job-salary-view"></h1>
					<div class="buttons" id="fetch-button">
						
					</div>
				</div>

			</div>

		</div>
	</div>



	<!----- footer ------>
	<div class="footer">
		<div class="container">
			<div class="row">

				<div class="col-4">
					<h3>Metierfind</h3>
					<ul>
						<li><a href="">About us</a></li>
						<li><a href="">Career @Meterfiend</a></li>
						<li><a href="">News and Events</a></li>
						<li><a href="">FAQ's</a></li>
					</ul>
				</div>

				<div class="col-4">
					<h3>Job Seekers</h3>
					<ul>
						<li><a href="">Jobs by Specialization</a></li>
						<li><a href="">Jobs by Company Name</a></li>
						<li><a href="">Career Resources</a></li>
						<li><a href="">Testimonials</a></li>
					</ul>
				</div>

				<div class="col-4">
					<h3>Employers</h3>
					<ul>
						<li><a href="">Post a job Ad</a></li>
						<li><a href="">Post a classified Job</a></li>
						<li><a href="">Advertise with us</a></li>
						<li><a href="">Company Profiles</a></li>
					</ul>
				</div>

				<div class="col-4">
					<h3>Social media </h3>
					<ul>
						<li><a href="">Facebook</a></li>
						<li><a href="">Instagram</a></li>
					</ul>
				</div>

			</div>
		</div>
	</div>




	<!----- script ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/jobseeker-findjob.js"></script>
</body>

</html>