<?php
	//Gather basic info from the POST array
	require("functions.php");
	$type = $_POST["type"];
	$username = $_POST["username"];
	$usernameConfirm = $_POST["usernameConfirm"];
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$passwordConfirm = $_POST["passwordConfirm"];
	$verificationCode = $_POST["verificationCode"];
	//-------------------------------------
	
	//If a coach is registering
	if($type == "c")
	{
		if($password == $passwordConfirm)
		{
			if($username == $usernameConfirm)
			{
				$f = fopen("coaches/coaches.json", "r");
				$users = fread($f, filesize("coaches/coaches.json"));
				$users = json_decode($users, false, filesize("coaches/coaches.json"));
				fclose($f);
				for($i = 0; $i < count($users); $i++)
				{
					if($username == $users[$i][0])
					{
						$userExists = true;
					}
				}
				if(!$userExists)
				{
					//Get the coach's sport from the POST array
					$sport = $_POST["sport"];
					//-----------------------------------------
				
					//Open the file containing the database and get the file's contents
					$file = fopen("coaches/coaches.json", "r");
					$rawContent = fread($file, filesize("coaches/coaches.json"));
					$content = json_decode($rawContent, true, filesize("coaches/coaches.json"));
					fclose($file);
					//-----------------------------------------------------------------
					
					//Prepare the database for the addition of new info
					$newContent = array();
					for($i = 0; $i < count($content); $i++)
					{
						array_push($newContent, $content[$i]);
					}
					//-------------------------------------------------
					
					//Put the new coach's info into an array
					$newEntry = array($username, $fName, $lName, $email, sha1($password),  $sport);
					//--------------------------------------
					
					//Put the entry in the database
					array_push($newContent, $newEntry);
					//-----------------------------
					
					//Export the database to the JSON file
					$newContentExportable = json_encode($newContent);
					$file = fopen("coaches/coaches.json", "w");
					fwrite($file, $newContentExportable);
					fclose($file);
					echo "<div style='width: 100%;'>
						<a href='http://northcountyhs.org'>
							<img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
						</a>
					</div>
					<a href='coachHome.php' style='text-decoration: none;'>
						<div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Success! Your account has been registered</div>
					</a>";
				}
				else
				{
					errMsg("User Already exists", "Sorry, that username is taken!");
				}
			}
			else
			{
				errMsg("Bad Username", "Sorry, your usernames didn't match!");
			}
		}
		else
		{
			errMsg("Bad Password", "Sorry, your passwords didn't match!");		
		}
	}
?>