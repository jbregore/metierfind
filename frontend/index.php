<!DOCTYPE html>
<html>

<head>
	<title>Metierfind</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
						<li><a href="index.php#my-header">Home</a></li>
						<li><a href="index.php#my-categories">Categories</a></li>
						<li><a href="index.php#my-account">Account</a></li>
						<li><a href="index.php#about-us">About</a></li>
						<li><a href="index.php#contact-us">Contact</a></li>
					</ul>
				</nav>

				<img src="assets/images/menu.png" id="menu-icon" onclick="menuToggle()">
			</div>
			<!--end navbar-->

			<div class="row">
				<div class="col-2">
					<h1>#1 Job Posting <br> in Bulacan</h1>
					<p>Find Job that suits you <br>
						and your passion</p>
				</div>

				<div class="col-2">
					<div class="form-container">
						<div class="form-btn">
							<span >Login</span>
						</div>

						<form method="POST" id="jobseeker-login-form" enctype="multipart/form-data"
						onsubmit="return false">
							<label for="">Email</label><br>
							<input type="email" name=""  id="login-user-email" required="">
							<label for="">Password</label><br>
							<input type="password" name=""  id="login-user-password" required="">

							<input type="submit" class="btn" id="jobseeker-login-btn" value="Login"></button>
							<a href="">Forgot Password</a>

							<br><br>
							<small id="login-check"></small>
						</form>

					</div>
				</div>

			</div>

		</div>
	</div>
	<!--end header-->


	<!--start find-job-->
	<div class="small-container" id="find-job">
		<div class="row">
			<img src="assets/images/index/metierfind.png" class="this-image" width="300px">
		</div>


		<div class="row">
			<div class="col-3">
				<button>HR Assistant</button><br>
				<button>Book Keeper</button><br>
				<button>Store Crew</button><br>
			</div>
			<div class="col-3">
				<button>Senior Information Security</button><br>
				<button>Office Staff</button><br>
				<button>Admin Personnel</button><br>
			</div>
			<div class="col-3">
				<button>Category Assistant</button><br>
				<button>Store Supervisor</button><br>
				<button>Area Managers</button><br>
			</div>
		</div>

	</div>
	<!--start find-job-->


	<!----- categories ------>
	<div class="categories" id="my-categories">
		<div class="small-container">
			<h2 class="title">Categories</h2>


			<div class="row">
				<div class="col-1">
					<div class="job-cate">
						<ul>
							<li class="active">Full Time</li>
							<li>Part Time</li>
							<li>Contract</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-3">
					<h1>JOB'S NAME</h1>
					<h3>Poblacion Bustos Bulacan</h3>
					<div class="categories-small">
						<small>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							Quae delectus consequatur ipsam similique ut vero ea dolore non.
						</small>
					</div>

					<div class="categories-p">
						<p>4 VACANCIES</p>
						<p>FULL-TIME</p>
						<p>FAST-FOOD</p>
					</div>

					<div class="categories-p2">
						<p>Posted 3 days ago</p>
						<p>Ends at Feb 2, 2021</p>
					</div>
				</div>
				<div class="col-3">
					<h1>JOB'S NAME</h1>
					<h3>Poblacion Bustos Bulacan</h3>
					<div class="categories-small">
						<small>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							Quae delectus consequatur ipsam similique ut vero ea dolore non.
						</small>
					</div>

					<div class="categories-p">
						<p>4 VACANCIES</p>
						<p>FULL-TIME</p>
						<p>FAST-FOOD</p>
					</div>

					<div class="categories-p2">
						<p>Posted 3 days ago</p>
						<p>Ends at Feb 2, 2021</p>
					</div>
				</div>
				<div class="col-3">
					<h1>JOB'S NAME</h1>
					<h3>Poblacion Bustos Bulacan</h3>
					<div class="categories-small">
						<small>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
							Quae delectus consequatur ipsam similique ut vero ea dolore non.
						</small>
					</div>

					<div class="categories-p">
						<p>4 VACANCIES</p>
						<p>FULL-TIME</p>
						<p>FAST-FOOD</p>
					</div>

					<div class="categories-p2">
						<p>Posted 3 days ago</p>
						<p>Ends at Feb 2, 2021</p>
					</div>
				</div>
			</div>



		</div>
	</div>
	<!----- end categories ------>



	<!----- employers ------>
	<div class="employers">
		<div class="small-container">
			<h2 class="title">Our Employers</h2>
			<div class="row">
				<div class="col-4">
					<img src="assets/images/index/employer-1.png">
					<h4>Apple</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-2.jpg">
					<h4>Samsung Electronics</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-3.png">
					<h4>Foxcon</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-4.png">
					<h4>Alphabet</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					<img src="assets/images/index/employer-5.png">
					<h4>Microsoft</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-6.png">
					<h4>Huawei</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-7.png">
					<h4>Dell</h4>
				</div>

				<div class="col-4">
					<img src="assets/images/index/employer-8.jpg">
					<h4>Sony</h4>
				</div>
			</div>
			<a href="employer-site.php"><button>Sign up as Employer</button></a>
		</div>
	</div>
	<!----- end employers ------>


	<!----- account ------>
	<div class="account" id="my-account">
		<div class="small-container">
			<h2 class="title">Create your profile</h2>

			<div class="row">
				<div class="col-30">
					<div class="account-profile">
						<i class="fa fa-user fa-3x"></i>
					</div>

					<div class="account-profile1">
						<h4>John Doe</h4>
						<p>View my Profile</p>
					</div>

					<hr>

					<div class="account-profile2">
						<p>Experience</p>
						<p>Education</p>
						<p>Skills</p>
						<p>Language</p>
						<p>Additional Info</p>
						<p>About me</p>
						<p>Uploaded Resume</p>
						<p>Privacy Settings</p>
					</div>

				</div>

				<div class="col-70">
					<div class="account-profile-70">
						<i class="fa fa-user fa-4x"></i>
						<h1>John Doe</h1>
					</div>

					<div class="account-profile-71">
						<p><i class="fa fa-phone"></i> (63)9123456789 &nbsp;&nbsp; | &nbsp;&nbsp;
							<i class="fa fa-envelope-o"></i> johndoe@gmail.com &nbsp;&nbsp;| &nbsp;&nbsp;
							<i class="fa fa-map-marker"></i> Central Luzon
						</p>
					</div>

				</div>
				<a href="jobseeker-site.php"><button>Sign up Now</button></a>
			</div>
			
		</div>
	</div>
	<!----- end account ------>




	<!----- about-us ------>
	<div class="about-us" id="about-us">
		<div class="small-container">
			<h2 class="title">About Us</h2>
			<div class="row">
				<div class="col-2">
					<div class="row">
						<div class="col-1">
							<h2>Mission</h2>
							<p>
								MetierFind exist to produce professional
								workers that will contribute to the growth
								of the company, economy and their career
								and to avoid sluggish process of job
								application and to give easy access for job seekers.
							</p>
						</div>

						<div class="col-1">
							<h2>Vission</h2>
							<p>
								MetierFind is a job finder that allows
								applicants to find their qualified or
								dream job easily. Finding a job easily
								is what it envisioned for.
							</p>
						</div>

						<div class="col-1">
							<h2>How it Works</h2>
							<p>
								It works to help people find job by allowing
								them to post their own resume for hiring managers
								andd recruitment to find their searches.
							</p>
						</div>
					</div>
				</div>
				<div class="col-2">
					<img src="assets/images/index/about.jpg" class="this-image" width="900px">
				</div>
			</div>
		</div>
	</div>
	<!--end about-us -->


	<!----- contact-us ------>
	<div class="contact-us" id="contact-us">
		<div class="small-container">
			<h2 class="title">Contact us</h2>
			<div class="row">

				<div class="col-2">
					<form action="#">
						<div class="my-form">
							<label for="">Name</label><br>
							<input type="text" name="contact-name" id="contact-name" required><br>
							<label for="">Email</label><br>
							<input type="email" name="contact-email" id="contact-email" required><br>
							<label for="">Message</label><br>
							<textarea name="message" id="message" rows="5" cols="45" required></textarea><br>
							<a href=""><input type="submit" class="submit-btn"></a>
						</div>

					</form>
				</div>

				<div class="col-2">
					<h4>
						Metierfind.com Pte Ltd

					</h4>
					<p>
						Got a question ? We'd love to hear from you.
						Send us a message and we'll respond as soon as possible.
					</p><br>
					<p>For Employer Services, kindly contact our <a href="">Corporate Accounts Team</a> </p>
				</div>

			</div>
		</div>
	</div>
	<!--end contact-us -->



	<!----- footer ------>
	<div class="footer">
		<div class="container">
			<div class="row">

				<div class="col-4">
					<h3>Metierfind</h3>
					<ul>
						<li><a href="" >About us</a></li>
						<li><a href="" >Career @Meterfiend</a></li>
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
						<li><a href="" >Post a job Ad</a></li>
						<li><a href="" >Post a classified Job</a></li>
						<li><a href="">Advertise with us</a></li>
						<li><a href="">Company Profiles</a></li>
					</ul>
				</div>

				<div class="col-4">
					<h3>Social media </h3>
					<ul>
						<li><a href="" >Facebook</a></li>
						<li><a href="" >Instagram</a></li>
					</ul>
				</div>

			</div>
		</div>
	</div>




	<!----- script ------>
	<script src="assets/js/jobseeker-login.js"></script>
</body>

</html>