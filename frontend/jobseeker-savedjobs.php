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
	<link rel="stylesheet" type="text/css" href="assets/css/jobseeker-savedjobs.css">
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
						<li><a href="jobseeker-findjob.php">Find Jobs</a></li>
						<li><a href="jobseeker-savedjobs.php" class="active">Saved Jobs</a></li>
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
			<div id="here">
				<img src="assets/images/index/metierfind.png" class="this-image" width="300px">
			</div>
			

			<!-- <div class="row">

				<div class="col-70">
					<h1>Job Title</h1>
					<h2>Job Description</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Job Qualifications</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Additional Details</h2>
					<div class="additional-details">
						<p>Vacancies : <span>4</span></p>
						<p>Location : <span>Poblacion Bustos Bulacan</span></p>
						<p>Job Type : <span>Full Time</span></p>
					</div>
				</div>

				<div class="col-30">
					<img src="assets/images/index/employer-1.png" width="200px">
					<h1>Company Name</h1>
					<h2>Company Location</h2>
					<p><i class="fa fa-clipboard"></i>Posted 3 days ago</p>
					<p><i class="fa fa-globe "></i>samplecorp.com</p>
					<p><i class="fa fa-search"></i>More Jobs at samplecorp Inc</p>
					<h1 class="salary" style="color: #ff3e97;">Php 30,000</h1>
					<div class="buttons">
						<button class="apply-job-btn">Apply Now</button>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-70">
					<h1>Job Title</h1>
					<h2>Job Description</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Job Qualifications</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Additional Details</h2>
					<div class="additional-details">
						<p>Vacancies : <span>4</span></p>
						<p>Location : <span>Poblacion Bustos Bulacan</span></p>
						<p>Job Type : <span>Full Time</span></p>
					</div>
				</div>

				<div class="col-30">
					<img src="assets/images/index/employer-1.png" width="200px">
					<h1>Company Name</h1>
					<h2>Company Location</h2>
					<p><i class="fa fa-clipboard"></i>Posted 3 days ago</p>
					<p><i class="fa fa-globe "></i>samplecorp.com</p>
					<p><i class="fa fa-search"></i>More Jobs at samplecorp Inc</p>
					<h1 class="salary" style="color: #ff3e97;">Php 30,000</h1>
					<div class="buttons">
						<button class="apply-job-btn">Apply Now</button>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-70">
					<h1>Job Title</h1>
					<h2>Job Description</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Job Qualifications</h2>
					<ul>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
						<li>- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odio obcaecati,
							ad ea consectetur alias officia eligendi aut.</li>
					</ul>
					<h2>Additional Details</h2>
					<div class="additional-details">
						<p>Vacancies : <span>4</span></p>
						<p>Location : <span>Poblacion Bustos Bulacan</span></p>
						<p>Job Type : <span>Full Time</span></p>
					</div>
				</div>

				<div class="col-30">
					<img src="assets/images/index/employer-1.png" width="200px">
					<h1>Company Name</h1>
					<h2>Company Location</h2>
					<p><i class="fa fa-clipboard"></i>Posted 3 days ago</p>
					<p><i class="fa fa-globe "></i>samplecorp.com</p>
					<p><i class="fa fa-search"></i>More Jobs at samplecorp Inc</p>
					<h1 class="salary" style="color: #ff3e97;">Php 30,000</h1>
					<div class="buttons">
						<button class="apply-job-btn">Apply Now</button>
					</div>
				</div>

			</div> -->

			<div id="fetch-saved">

			</div>


		</div>
	</div>
	<!----- end categories ------>


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
	<script src="assets/js/jobseeker-savedjobs.js"></script>
</body>


</html>