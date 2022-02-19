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
	<link rel="stylesheet" type="text/css" href="assets/css/jobseeker-myprofile.css">
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
						<li><a href="jobseeker-savedjobs.php">Saved Jobs</a></li>
						<li><a href="jobseeker-appliedjobs.php">Applied Jobs</a></li>
						<li><a href="jobseeker-myprofile.php" class="active">My Profile</a></li>
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
			<div class="row" style="background-color: #999;border-top-left-radius:50px;border-top-right-radius:50px;">
				<img src="assets/images/index/metierfind.png" class="this-image" width="300px">
			</div>

			<div class="row" id="main-profile">
				<h2 class="title">Basic Information</h2>
				<div class="col-1">
					<img src="assets/images/index/profile-img.jpg" id="my-profile-img" width="200px" height="200px" style="border-radius: 50%;">
					<p id="my-profile-name"></p>
					<p id="my-profile-number"></p>
					<p style="margin-bottom: 10px;" id="my-profile-email"></p>
					<input type="file" id="comp-img" onchange="previewFile()" style="margin-left: 70px;margin-bottom: 10px;"><br>
					<button class="change-profile" id="change-profile">Change Profile Photo</button>
				</div>
			</div>

			<div class="row" id="job-preference">
				<h2 class="title">Job Preferences</h2>
				<div class="col-1">
					<label for="">Availability</label><br>
					<input type="checkbox" id="prefer-checkbox">I can start work anytime <br><br>

					<label for="">What Job Types do you prefer?</label><br>
					<input type="radio" name="per" id="fulltime-prefer">Full Time<br>
					<input type="radio" name="per" id="parttime-prefer">Part Time<br>
					<input type="radio" name="per" id="contract-prefer">Contract<br><br>


					<label for="">Expected Salary</label><br>
					<input type="text" placeholder="0" maxlength="6" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="expected-prefer">
					<select name="" id="per-prefer" style="margin-bottom: 10px;">
						<option value="per hour">per hour</option>
						<option value="per day">per day</option>
						<option value="per week">per week</option>
						<option value="per month">per month</option>
					</select><br>

					<button class="update-preference" id="update-prefer">Update Job Preference</button>

				</div>
			</div>

			<div class="row" id="about-me">
				<h2 class="title">About me</h2>
				<div class="col-1">
					<form onsubmit="return false">
						<label for="">Email</label><br>
						<input type="email" id="about-me-email"><br><br>

						<label for="">Mobile Number</label><br>
						<input type="text" id="about-me-number" maxlength="11" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57"><br><br>

						<label for="">Full Name</label><br>
						<input type="text" id="about-me-name"><br><br>

						<label for="">Highest Education</label><br>
						<select name="" id="about-me-education" style="margin-bottom: 10px;">
							<option value="Junior High School">Junior High School</option>
							<option value="Senior High School">Senior High School</option>
							<option value="College Level">College Level</option>
							<option value="College Degree">College Degree </option>
						</select><br><br>

						<label for="">Gender</label><br>
						<input type="radio" name="gender" id="about-me-male">Male
						<input type="radio" name="gender" id="about-me-female">Female<br><br>

						<label for="">Birthday</label><br>
						<input type="date" id="about-me-birthday"><br><br>

						<label for="">Introduce Yourself</label><br>
						<textarea name="" id="about-me-intro" cols="40" rows="6"></textarea><br>

						<button type="submit" class="update-preference" id="update-about-me">Update About me</button>
					</form>
				</div>
			</div>

			<div class="row" id="resume">
				<h2 class="title">Resume</h2>
				<div class="col-1">
					<img src="assets/images/index/resume.png" width="200px"><br>
					<input type="file" id="comp-img-file" ><br>
					<button class="update-preference" id="update-resume" style="margin-bottom:10px;">Update Resume</button><br>
					<a href="" id="view-resume" style="color: #777;">View Resume</a>

					<!-- <iframe src="https://docs.google.com/gview?url=http://remote.url.tld/path/to/document.doc&embedded=true"> -->
					<!-- <button class="update-preference" id="view-resume">View Resume</button> -->
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
	<script src="assets/js/jobseeker-myprofile.js"></script>
</body>

</html>