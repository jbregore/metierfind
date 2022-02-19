<!DOCTYPE html>
<html>

<head>
	<title>Metierfind | Employer Site</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/employer-site.css">
	</link>

	<link rel="shortcut icon" href="my-icon.ico">

	<!--fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
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
						<li><a href="index.php">Candidate Site</a></li>
						<li><button id="login-employer">Login</button></li>
					</ul>
				</nav>

				<img src="assets/images/menu.png" id="menu-icon" onclick="menuToggle()">
			</div>
			<!--end navbar-->

			<div class="row">
				<div class="col-2">
					<h1>#1 Job Posting <br> in Bulacan</h1>
					<p>Register with us and enjoy lite Ads for free.</p>
				</div>

				<div class="col-2">
					<div class="form-container">
						<p class="small-p"> Start Hiring With Us</p>
						<p class="small-p"> <i class="fa fa-check"></i>First choice among Filipino Job Seekers</p>
						<p class="small-p"> <i class="fa fa-check"></i>Access more than 12 million talents in the Philippines</p>
						<p class="small-p"> <i class="fa fa-check"></i>Most search for career partners</p>

						<form method="POST" id="LoginForm" enctype="multipart/form-data">
							<label for="">Company Name</label><br>
							<input type="text" name="" id="login-employer-company-name">

							<label for="">Company Location</label><br>
							<input type="text" name="" id="login-employer-company-location">

							<label for="">Company Website</label><br>
							<input type="text" name="" id="login-employer-company-site">

							<label for="">Contact Person Name</label><br>
							<input type="text" name="" id="login-employer-name">

							<label for="">Mobile Number</label><br>
							<input type="text" name="" id="login-employer-mobile" maxlength="11" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? 
					null : event.charCode >= 48 && event.charCode <= 57">


							<label for="">Email Address</label><br>
							<input type="email" name="" id="login-user-username">

							<label for="">Password</label><br>
							<input type="password" name="" id="login-user-password">

							<label for="">Confirm Password</label><br>
							<input type="password" name="" id="login-user-conf-password">

							<button type="button" class="btn" id="btnRegister">Register</button>
							<small>By continuing, you acknowledge that you accept Metierfind
								Privacies and Policies and Terms & Conditions. </small>

							<br><br>
							<small id="login-check"></small>
						</form>

					</div>
				</div>

			</div>


			<div class="modal-login" id="modal-login" style="display: none;">
				<div class="modal">
					<div class="modal-header">
						<span id="close-login">&times;</span>
					</div>

					<div class="row">

						<div class="col-2">
							<h1>Important Security Notice</h1>
							<p class="small-p"> <i class="fa fa-check"></i>Always make sure that you are on the official
						website (www.metierfind.com.ph/employers) and that it is secured before loggin in.</p>
							<p class="small-p"> <i class="fa fa-check"></i>Please keep your SiVA login details secured and do
						not respong to any login requests from other suspicious websites and scammers.</p>
							<p class="small-p"> <i class="fa fa-check"></i>Metierfind.com will never ask for your login details.</p>
						</div>

						<div class="col-2">

							<div class="modal-body">
								<h1>Employer Login</h1>
								<form method="POST" id="employer-login-form" enctype="multipart/form-data"
								onsubmit="return false">
									<label for="username">Email :</label>
									<input type="email" id="employer-email-username" required=""><br>

									<label for="password">Password :</label>
									<input type="password" id="employer-pass-password" required=""><br>

									<button type="submit" id="login">Login</button>
									<a href="">Forgot password</a>
								</form>
							</div>

						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
	<!--end header-->



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
	<script src="assets/js/employer-site.js"></script>

</body>

</html>