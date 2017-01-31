<html>
	<head>
		<title>NCHS</title>
		<link rel='stylesheet' type='text/css' href='../css/styles.css'>
		<meta name='viewport' content='width=device-width'>
		<script src='../js/functions.js'></script>
	</head>
	<body class='sharp' style='background-color: rgba(0,0,0,0.8); overflow: auto;'>
		<div class='header' style='z-index: 4;'> 
			<span class='header-text'>About</span>
			<button class='top-nav-dropdown' onclick='showHide("form");'><span class='header-text' style='padding-top: 0px;'>Sign In &blacktriangledown;</span></button>
				<div id='form' class='sign-in-form-container'>
					<div class='tab-general-container'>
						<div id='login-button' class='tab-general' style='float: left; background-color: lightslategrey;' onclick='show("login"); hide("register"); document.getElementById("login-button").style.backgroundColor = "lightslategray"; document.getElementById("register-button").style.backgroundColor = "white";'>Sign In</div>
						<div id='register-button' class='tab-general' style='float: right;' onclick='show("register"); hide("login"); document.getElementById("register-button").style.backgroundColor = "lightslategray"; document.getElementById("login-button").style.backgroundColor = "white";'>Register</div>
					</div>
					<br>
					<form id='login' method='post' action='../application/functions/login/login.php' class='sign-in-form' style='background-color: lightslategray; line-height: 50%;'>
						<input type='text' name='username' placeholder='Username' class='user-input'>
						<br>
						<br> 
						<input type='password' name='password' placeholder='Password' class='user-input'>
						<br>
						<br>
						<input type='submit' value='Sign In' class='form-submit'>
					</form>
					<form id='register' method='post' action='../application/functions/login/new_user.php' class='sign-in-form' style='display: none; lightslategray; line-height: 50%;'>
						<input type='text' name='username' placeholder='Choose a username' class='user-input' required>
						<br>
						<br>
						<input type='password' name='password' placeholder='Choose a password' class='user-input' required>
						<br>
						<br>
						<input type='password' name='passwordc' placeholder='Confirm your password' class='user-input' required>
						<br>
						<br>
						<input type='text' name='firstn' placeholder='First name' class='user-input' required>
						<br>
						<br>
						<input type='text' name='lastn' placeholder='Last name' class='user-input' required>
						<br>
						<br>
						<select class='user-input' name='acc_type' required>
							<option value='student'>Student</option>
							<option value='teacher'>Teacher</option>
						</select>
						<br>
						<br>
						<input id='id' type='text' name='quote' placeholder='Quote (optional)' class='user-input'>
						<br>
						<br>
						<input type='submit' value='Register' class='form-submit'>
					</form>
				</div>
			</button>
			<a class='spacer' href=''><span class='header-text' style='padding-top: 38px;'></span></a>
			<a class='top-nav-link' href='../application'><span class='header-text' style='padding-top: 38px;'>Portal</span></a>
			<a class='top-nav-link' href='/help'><span class='header-text' style='padding-top: 38px;'>Help</span></a>
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