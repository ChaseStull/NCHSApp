<?php
    $SID = $_POST["IDConfirm"];
    $Password = $_POST["PasswordConfirm"];
    $uSID = $_POST["Username"];
    $uPassword = $_POST["Password"];
    $Type = $_POST["type"];
    $VerCod = sha1($_POST["numVer"]);
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $Email = $_POST["email"];
    $Code;
    for($i = 1; $i <= 14; $i++)
    {
        $cf = sha1("code-".$i).".txt";
        $codeFile = fopen($cf, "r");
        $cn = fread($codeFile, filesize($cf));
        $Code = $Code."".$cn;
        fclose($codeFile);
    }
    if ((strlen($SID)==6)||($Type == "T")||($Type == "C"))
    {
    if (!file_exists(sha1($SID).".txt"))
    {
    $fileToOpen = sha1($SID).".txt";
    if (($SID==$uSID)&&($Password==$uPassword))
    {
        if($Type == "S")
        {
            //Create and set up account files
            $File = fopen($fileToOpen,"w");
            $EPass = sha1($Password);
            fwrite($File,$EPass);
            fclose($File);
            if($Email == "")
            {
                $Email = $SID."@aacps.org";
            }
            $arr = array("Fname"=>$Fname, "Lname"=>$Lname, "Email"=>$Email);
            $F = "students/".$SID.".json";
            $FJSON = fopen($F, "w");
            fwrite($FJSON, json_encode($arr));
            fclose($FJSON);
            mkdir("students/".$SID);
            $File = fopen("students/".$SID."/notifications.json", "w");
            fclose($File);
            $File = fopen("students/".$SID."/threads.json", "w");
            fclose($File);
            //Display HTML
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='studentHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black; text-align: center;'><br>Success! Tap here to go to your home page</div></a>";
            //Sign Student In
            setcookie("Student", $SID, time()+43200, "/");
            //Log New Student's Student ID
            $File = fopen("students/students.json", "r");
            $content = fread($File, filesize("students/students.json"));
			$json = json_decode($content, TRUE, filesize("students/students.json"));
            fclose($File);
			array_push($json, $uSID);
			$jsonWriteable = json_encode($json);
            $File = fopen("students/students.json", "w");
            fwrite($File, $jsonWriteable);
            fclose($File);
        }
        //If it is a teacher registration
        if($Type == "T")
        {
            if($VerCod == sha1($Code))
            {
                //Set up account files
                $File = fopen($fileToOpen,"w");
                $EPass = sha1($Password);
                fwrite($File,$EPass);
                fclose($File);
                $arr = array("Fname"=>$Fname, "Lname"=>$Lname, "Email"=>$Email);
                $F = "teachers/".$SID.".json";
                $FJSON = fopen($F, "w");
                fwrite($FJSON, json_encode($arr));
                fclose($FJSON);
                //Sign Teacher In
                setcookie("Teacher", $SID, time()+43200, "/");
                //Set up account directories
                mkdir("teachers/".sha1($SID));
                mkdir("teachers/".sha1($SID)."/classes");
                mkdir("teachers/".sha1($SID)."/clubs");
                $F = "teachers/".sha1($SID)."/classes.json";
                $JSON = fopen($F, "w");
                fwrite($JSON, "{\"class1\":, \"class2\":, \"class3\":, \"class4\":, \"class5\":, \"class6\":}");
                fclose($JSON);

                $File = fopen("teachers/".sha1($SID)."/notifications.json", "w");
                fclose($File);
                $File = fopen("yeachers/".sha1($SID)."/threads.json", "w");
                fclose($File);
                
                mkdir("teachers/".sha1($SID)."/classes/students");
                $F = "teachers/".sha1($SID)."/classes/students.json";
                $JSON = fopen($F, "w");
                fwrite($JSON, json_encode(array("newClub")));
                fclose($JSON);

                //Log New Teacher's Information
                $info = array($SID, $Fname, $Lname, $Email);
                $File = fopen("teachers/teachers.json", "r");
                $rawData = fread($File, filesize("teachers/teachers.json"));
                $data = json_decode($rawData, true, filesize("teachers/teachers.json"));
                fclose($File);
                array_push($data, $info);
                $dataEx = json_encode($data);
                $File = fopen("teachers/teachers.json", "w");
                fwrite($File, $dataEx);

                //Display HTML
                echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='teacherHome.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Success! Your account has been registered</div></a>";
            }
            else
            {
                echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><button onclick='history.back()'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Sorry, that verification code is invalid! Click to go back</div></button>";
            }
        }
		if($Type == "C")
		{
			
		}
    }
    else
    {
        if($Type=="T")
        {
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newTeacher.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'>Registration Failed! Check that your Usernames match, and that your passwords match<br></div></a>";
        }
        if($Type=="S")
        {
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'>Registration Failed! Check that your Student ID is correct, and that your passwords match<br></div></a>";
        }
    }
    }
    else
    {
        if($Type=="S")
        {
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newUser.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Sorry, that account already exists! Please choose a different Student ID<br></div></a>";
        }
        if($Type=="T")
        {
            echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><a href='newTeacher.php' style='text-decoration: none;'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Sorry, that account already exists! Please choose a different Username<br></div></a>";
        }
    }
    }
    else
    {        
        echo "<div style='width: 100%;'><a href='http://northcountyhs.org'><img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'></a></div><button onclick='history.back()'><div style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'><br>Sorry, that's not a valid Student ID! Please enter a valid 6-Digit Student ID<br></div></button>";
    }
?>
