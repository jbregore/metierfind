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
	<link rel="stylesheet" type="text/css" href="assets/css/employer-create-job.css">
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
						<li><a href="employer-create-job.php" class="active">Create Job</a></li>
						<li><a href="employer-company-details.php">Company Details</a></li>
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

			<div class="row">

				<div class="col-70">
					<h2 id="job-title-p">Job Title :</h2>
					<div>
						<input type="text" id="text-job-title">
					</div>

					<h2>Job Description :</h2>
					<ul>
						<li><input type="text" id="text-job-desc1"></li>
						<li><input type="text" id="text-job-desc2"></li>
						<li><input type="text" id="text-job-desc3"></li>
					</ul>
					<h2>Job Qualifications :</h2>
					<ul>
						<li><input type="text" id="text-job-quali1"></li>
						<li><input type="text" id="text-job-quali2"></li>
						<li><input type="text" id="text-job-quali3"></li>
					</ul>
					<h2>Additional Details :</h2>
					<div class="additional-details">
						<p> &nbsp;&nbsp; Vacancies : <input type="text" placeholder="0" maxlength="2" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="text-job-vacancies"></p>
						<p> &nbsp;&nbsp; Location : <input type="text" id="text-job-location"></p>
						<p> &nbsp;&nbsp; Job Type : <br>
							<select name="" id="sel-job-type">
								<option value="Full Time">Full Time</option>
								<option value="Part Time">Part Time</option>
								<option value="Contract">Contract</option>
							</select>
						</p>
					</div>
				</div>

				<div class="col-30">
					<img src="assets/images/index/company.png" width="200px" height="200px"  id="company-img">
					<h2 id="company-name"></h2>
					<h2 id="company-location"></h2>
					<!-- <p><i class="fa fa-clipboard"></i>Posted 3 days ago</p> -->
					<p id="company-website"><i class="fa fa-globe "></i></p>
					<p id="company-corp"><i class="fa fa-search"></i></p><br>
					<p>Salary per month: </p>
					<input type="text" style="color: #ff3e97;" placeholder="0" maxlength="6" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="text-job-salary">
					<input type="button" id="post-job-btn" value="Post Job">
					<!-- <button type="button" class="btn" id="btnRegister">Post Job</button> -->
				</div>

			</div>

			<!-- <div class="row"> -->
			<div class="row" id="fetch-job">
			</div>
			<!-- </div> -->
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
					<h2 id="job-title-p">Job Title :</h2>
					<div>
						<input type="text" id="text-job-title-view">
					</div>

					<h2>Job Description :</h2>
					<ul>
						<li><input type="text" id="text-job-desc1-view"></li>
						<li><input type="text" id="text-job-desc2-view"></li>
						<li><input type="text" id="text-job-desc3-view"></li>
					</ul>
					<h2>Job Qualifications :</h2>
					<ul>
						<li><input type="text" id="text-job-quali1-view"></li>
						<li><input type="text" id="text-job-quali2-view"></li>
						<li><input type="text" id="text-job-quali3-view"></li>
					</ul>
					<h2>Additional Details :</h2>
					<div class="additional-details">
						<p> &nbsp;&nbsp; Vacancies : <input type="text" placeholder="0" maxlength="2" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="text-job-vacancies-view"></p>
						<p> &nbsp;&nbsp; Location : <input type="text" id="text-job-location-view"></p>
						<p> &nbsp;&nbsp; Job Type : <br>
							<select name="" id="sel-job-type-view">
								<option value="Full Time">Full Time</option>
								<option value="Part Time">Part Time</option>
								<option value="Contract">Contract</option>
							</select>
						</p>
					</div>
				</div>

				<div class="col-30">
					<img src="assets/images/index/company.png" width="200px" height="190px" id="company-img-view">
					<h2 id="company-name-view"></h2>
					<h2 id="company-location-view"></h2>
					<!-- <p><i class="fa fa-clipboard"></i>Posted 3 days ago</p> -->
					<p id="company-website-view"><i class="fa fa-globe "></i></p>
					<p id="company-corp-view"><i class="fa fa-search"></i></p><br>
					<p>Salary per month: </p>
					<input type="text" style="color: #ff3e97;margin-left:0;" placeholder="0" maxlength="6" onkeypress="return (event.charCode == 8 ||
					 event.charCode == 0 || event.charCode == 13) 
					 ? null : event.charCode >= 48 && event.charCode <= 57" id="text-job-salary-view">
					<input type="submit" id="update-job-btn" value="Update">
					<input type="submit" id="delete-job-btn" value="Delete">
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
	<!-- <script src="assets/js/script.js"></script> -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/employer-create-job.js"></script>

</body>

</html>