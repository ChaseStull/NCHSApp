<html>
	<head>
		<title>NCHS</title>
		<link rel='stylesheet' type='text/css' href='../css/styles.css'>
		<meta name='viewport' content='width=device-width'>
		<script src='../js/functions.js'></script>
	</head>
	<body class='sharp' style='background-color: rgba(0,0,0,0.8);'>
		<div class='header' style='z-index: 4;'> 
			<span class='header-text'>About</span>
			<button class='top-nav-dropdown' onclick='showHide("form");'><span class='header-text' style='padding-top: 0px;'>Sign In &blacktriangledown;</span></button>
				<div id='form' class='sign-in-form-container'>
					<div class='tab-general-container'>
						<div id='login-button' class='tab-general' style='float: left; background-color: lightslategrey;' onclick='show("login"); hide("register"); document.getElementById("login-button").style.backgroundColor = "lightslategray"; document.getElementById("register-button").style.backgroundColor = "white";'>Sign In</div>
						<div id='register-button' class='tab-general' style='float: right;' onclick='show("register"); hide("login"); document.getElementById("register-button").style.backgroundColor = "lightslategray"; document.getElementById("login-button").style.backgroundColor = "white";'>Register</div>
					</div>
					<br>
					<form id='login' method='post' action='login.php' class='sign-in-form' style='background-color: lightslategray; line-height: 50%;'>
						<input type='text' name='email' placeholder='Email' class='user-input'>
						<br>
						<br> 
						<input type='password' name='password' placeholder='Password' class='user-input'>
						<br>
						<br>
						<input type='submit' value='Sign In' class='form-submit'>
					</form>
					<form id='register' method='post' action='register.php' class='sign-in-form' style='display: none; lightslategray; line-height: 50%;'>
						<input type='text' name='email' placeholder='Enter Your Email Address' class='user-input'>
						<br>
						<br>
						<input type='password' name='password' placeholder='Choose A Password' class='user-input'>
						<br>
						<br>
						<input type='password' name='password_confirm' placeholder='Confirm Your Password' class='user-input'>
						<br>
						<br>
						<input type='text' name='first_name' placeholder='First Name' class='user-input'>
						<br>
						<br>
						<input type='text' name='Last_name' placeholder='Last Name' class='user-input'>
						<br>
						<br>
						<input id='id' type='text' name='student_id_number' placeholder='Student ID Number' class='user-input'>
					</form>
				</div>
			</button>
			<a class='spacer' href=''><span class='header-text' style='padding-top: 38px;'></span></a>
			<a class='top-nav-link' href='../application'><span class='header-text' style='padding-top: 38px;'>Portal</span></a>
			<a class='top-nav-link' href='/features'><span class='header-text' style='padding-top: 38px;'>Features</span></a>
			<a class='top-nav-link' style='background-color: #bf1d32;' href='/about'><span class='header-text' style='padding-top: 38px;'>About</span></a>
			<a class='top-nav-link' href='../'><span class='header-text' style='padding-top: 38px;'>Home</span></a>
		</div>
		<div class='text-container' style='width: 90%; margin-top: 150px;'>
			<h1 class='about-header'><strong>Our Mission</strong></h1>
			<p>
				&nbsp&nbsp&nbsp&nbsp&nbspWe want to make everything easier for you. Simple as that. We strive to make your school experience accessible and centralized, so you don't have to spend time going to countless different websites for information. Everything is right here.
			</p>
		</div>
		<br>
		<br>
		<div class='horizontal-container' style='height: 500px;'>
			<div class='info-panel-left'>
				<h2 class='info-panel-header'>Grades</h2>
				<p class='info-panel-span'>
					We bring your grades to you. No more checking parent connect when you can just come here!
				</p>
			</div>
			<img class='info-panel-right-image' style='z-index: 0;' src='../img/capture109.png'>
			<img class='info-panel-right-image' style='z-index: 1; position: absolute; height: 300px; width: auto; margin-left: 10%; margin-top: 100px;' src='../img/do-not-enter.png'>
		</div>
		<br>
		<div class='horizontal-container' style='height: 500px;'>
			<div class='info-panel-right'>
				<h2 class='info-panel-header'>Alerts</h2>
				<p class='info-panel-span'>
					No need for Remind101, we&#39;ve got all of your notifications here!
				</p>
			</div>
			<a href='alerts'><img class='info-panel-left-image' style='z-index: 0;' src='../img/notes.png'></a>
		</div>
		<a href='sample' class='alert'>Click here to view a sample homepage</a>
		<br>
		<br>
	</body>
</html>