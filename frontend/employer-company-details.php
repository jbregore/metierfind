<?php
session_start();
if (isset($_SESSION['employerid'])) {
} else {
	header("Location: employer-site.php");
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Metierfind | Employer Site</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/employer-company-details.css">
	</link>

	<link rel="shortcut icon" href="my-icon.ico">

	<!--fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>	
	<div>
	<input type="hidden" name="" id="j_employerid">
	<input type="hidden" name="" id="j_name">
	<input type="hidden" name="" id="j_location">
	<input type="hidden" name="" id="j_website">
	<input type="hidden" name="" id="j_contactname">
	<input type="hidden" name="" id="j_mobile">
	<input type="hidden" name="" id="j_email">
	<input type="hidden" name="" id="j_password">
	<input type="hidden" name="" id="j_photo">
	</div>

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
						<li><a href="employer-create-job.php">Create Job</a></li>
						<li><a href="employer-company-details.php" class="active">Company Details</a></li>
						<li><a href="employer-jobseekers-application.php">Job Applicants</a></li>
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

			<div class="row" id="company-details">
				<h2 class="title">Company Details</h2>
				<div class="col-1">
					<img src="assets/images/index/company.png" id="my-company-profile-img" width="200px" height="200px" style="border-radius: 50%;"><br>

					<input type="file" onchange="previewFile()" id= "comp-img" style="margin-bottom: 10px;"><br>

					<label for="">Company Name</label><br>
					<input type="text" id="text-company-name"><br><br>

					<label for="">Company Location</label><br>
					<input type="text" id="text-company-location"><br><br>

					<label for="">Company Website</label><br>
					<input type="text" id="text-company-website"><br><br>

					<label for="">Contact Person Name</label><br>
					<input type="text" id="text-company-contact-name"><br><br>

					<label for="">Mobile Number</label><br>
					<input type="text" maxlength="11" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="text-company-contact-num"><br><br>

					<label for="">Email</label><br>
					<input type="email" id="email-company-email"><br><br>

					<label for="">Password</label><br>
					<input type="password" id="password-company-password"><br><br>

					<label for="">Confirm Password</label><br>
					<input type="password" id="password-company-conf-password"><br><br>


					<button id="update-details">Update Details</button>
				</div>
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
	<script src="assets/js/employer-company-details.js"></script>
</body>

</html>