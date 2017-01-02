<?php
	if(isset($_COOKIE["userid"]))
	{
		echo "<script>onload = location.assign(\"/application\");</script>";
	}
?>
<html>
	<head>
		<title>NCHS</title>
		<link rel='stylesheet' type='text/css' href='css/styles.css'>
		<meta name='viewport' content='width=device-width'>
		<script src='js/functions.js'></script>
		<script src='js/slideshow.js'>
			onload = hide_slides();
		</script>
	</head>
	<body class='sharp' style='overflow: auto;'>
		<div class='header' style='margin-top: -100px;'> 
			<span class='header-text'>North County High School App</span>
			<div class='top-nav-dropdown' onclick='showHide("form");'><span class='header-text' style='padding-top: 0px;'><br>Sign In &blacktriangledown;</span></div>
				<div id='form' class='sign-in-form-container' style='overflow: auto;'>
					<div class='tab-general-container'>
						<div id='login-button' class='tab-general' style='float: left; background-color: lightslategrey;' onclick='show("login"); hide("register"); document.getElementById("login-button").style.backgroundColor = "lightslategray"; document.getElementById("register-button").style.backgroundColor = "white";'>Sign In</div>
						<div id='register-button' class='tab-general' style='float: right;' onclick='show("register"); hide("login"); document.getElementById("register-button").style.backgroundColor = "lightslategray"; document.getElementById("login-button").style.backgroundColor = "white";'>Register</div>
					</div>
					<br>
					<form id='login' method='post' action='application/functions/login/login.php' class='sign-in-form' style='background-color: lightslategray; line-height: 50%;'>
						<input type='text' name='username' placeholder='username' class='user-input'>
						<br>
						<br> 
						<input type='password' name='password' placeholder='Password' class='user-input'>
						<br>
						<br>
						<input type='submit' value='Sign In' class='form-submit'>
					</form>
					<form id='register' method='post' action='application/functions/login/new_user.php' class='sign-in-form' style='display: none; lightslategray; line-height: 50%;'>
						<input type='text' name='username' placeholder='Choose a username' class='user-input'>
						<br>
						<br>
						<input type='password' name='password' placeholder='Choose a password' class='user-input'>
						<br>
						<br>
						<input type='password' name='passwordc' placeholder='Confirm your password' class='user-input'>
						<br>
						<br>
						<input type='text' name='firstn' placeholder='First name' class='user-input'>
						<br>
						<br>
						<input type='text' name='lastn' placeholder='Last name' class='user-input'>
						<br>
						<br>
						<select class='user-input' name='acc_type'>
							<option value='student'>Student</option>
							<option value='teacher'>Teacher</option>
						</select>
						<br>
						<br>
						<textarea id='id' type='text' name='quote' placeholder='Quote (optional)' class='user-input'></textarea>
						<br>
						<br>
						<input type='submit' value='Register' class='form-submit'>
					</form>
				</div>
			</button>
			<a class='spacer' href=''><span class='header-text' style='padding-top: 38px;'></span></a>
			<a class='top-nav-link' href='/application'><span class='header-text' style='padding-top: 38px;'>Portal</span></a>
			<a class='top-nav-link' href='/features'><span class='header-text' style='padding-top: 38px;'>Features</span></a>
			<a class='top-nav-link' href='/about'><span class='header-text' style='padding-top: 38px;'>About</span></a>
			<a class='top-nav-link' style='background-color: #bf1d32;' href='../'><span class='header-text' style='padding-top: 38px;'>Home</span></a>
		</div>
		<div class='slideshow-container'>
			<div id='2' class='slide' style='display: block;'>
				<img id='image2' src='img/nclogo.jpg' height='auto' width="auto" class='slide-image'>
				<span class='slide-caption'>North County Logo</span>
			</div>
			<div id='3' class='slide'>
				<img id='image3' src='img/north-county-hs-5.jpg' class='slide-image'>
				<span class='slide-caption'>New Gym</span>
			</div>
			<div id='4' class='slide'>
				<img id='image4' src='img/north-county-hs-6.jpg' class='slide-image'>
				<span class='slide-caption'>Sports Awards</span>
			</div>
			<div id='5' class='slide'>
				<img id='image5' src='img/1293383640_orig.png' class='slide-image'>
				<span class='slide-caption'>NCHS Music Presents - Disney: Concert Under the Stars</span>
			</div>
			<div id='6' class='slide'>
				<img id='image6' src='img/TrackPanorama.jpeg' class='slide-image'>
				<span class='slide-caption'>Regional Track Meet Spring 2016</span>
			</div>
		</div>
		<div class='horizontal-container'>
			<br>
			<div style='width: 30%; float: right; margin-right: 2.5%;'>
				<div class='text-container'>
					<h1 onclick='location.assign("/about");'>What We Do</h1>
					<p>
						Come see what we&#39;re about. We do things differently, mainly making things easier for you!
					</p>
				</div>
			</div>
			<div style='width: 30%; float: right; margin-right: 2.5%;'>
				<div class='text-container'>
					<h1 onclick='location.assign("/features");'>New Features</h1>
					<p>
						Check out the new features available from the app. We&#39;ve got loads to tell you about!
					</p>
				</div>
			</div>
			<div style='width: 30%; float: right; margin-right: 2.5%'>
				<div class='text-container'>
					<h1 onclick='location.assign("/");'>Welcome!</h1>
					<p>
						Thank you for using the brand-new North County High School App!
					</p>
				</div>
			</div>
		</div>
		<br>
	</body>
	<script>
			onload = slide_switch(document.getElementsByClassName("slide").length);
	</script>
</html>