<?php
    function sendNotification($type, $groupType, $groupName, $sender, $reciever)
    {
        switch($type)
        {
            case "post":
                switch($groupType)
                {
                    case "class":
                        $f = "teachers/".sha1($sender)."/classes/".$groupName."/students.json";
                        $file = fopen($f, "r");
                        $students = fread($file, filesize($f));
                        $student_array = json_decode($students);
                        fclose($file);
                        for($i = 0; $i < count($student_array); $i++)
                        {
                            $path = "students/".$student_array[$i]."/notifications.json";
                            $file = fopen($path, "r");
                            $notifications_array = json_decode(fread($file, filesize($path)), false, filesize($path));
                            fclose($file);
                            $date = date("m/d/Y");
                            $message = "<button class='emOnHover' style='width: 95%; height: 40px; background-color: #ebebeb; text-align: left; padding: 2px;' onclick='window.location.assign(groups/".$groupName.".php);'><b>".$date."</b><br><strong>".$sender."</strong> posted in <strong>".$groupName."</strong></button>";
                            $notification = array($date, $sender, $groupName, $message);
                            array_push($notifications_array, $notification);
                            $file = fopen($path, "w");
                            fwrite($file, json_encode($notifications_array));
                            fclose($file);
                        }
                                               
                    break;
                    case "club":
                    break;
                    case "team":
                    break;
                    case "staff":
                    break;
                    case "all":
                    break;
                    default:
                }
            break;
            case "message":
            break;
            case "assignment":
            break;
            case "quiz":
            break;
            default: errMsg("WTF", "Notification Error");
        }
    }
    
    /*
    =======================================================================================
    */
    function newThread($type, $sender, $reciever)
    {
        $threadID = $sender.$reciever;
        $threadInfo = array($type, $threadID);
        echo $threadInfo[0]."<br>".$threadInfo[1]."<br>";
        echo "students/".$sender."/threads.json<br>";
        echo "students/".$reciever."/threads.json<br>";
        switch($type)
        {
            case "s+s":
            $threadLocation = "communications/student+studentThreads/".$sender.$reciever.".json";
            echo $threadLocation."<br>";
            $threadUsersArray = array($sender, $reciever);
            $threadUsers = json_encode($threadUsersArray);
            $thread = fopen($threadLocation, "w");
            fwrite($thread, $threadUsers);
            fclose($thread);
            
            appendRecord("students/".$sender."/threads.json", $threadInfo);
            appendRecord("students/".$reciever."/threads.json", $threadInfo);
            break;
            
            case "s+t":
            $threadLocation = "communications/student+teacherThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            if(file_exists("students/".$sender.".json"))
            {
                appendRecord("students/".$sender."/threads.json", $threadInfo);
                appendRecord("teachers/".sha1($reciever)."/threads.json", $threadInfo);
            }
            else
            {
                $sFile = fopen("students/".$reciever."/threads.json", "w");
                fclose($sFile);
                $rFile = fopen("teachers/".sha1($sender)."/threads.json", "w");
                fclose($rFile);
            }
            break;
            
            case "s+c":
            $threadLocation = "communications/student+coachThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            
            if(file_exists("students/".$sender.".json"))
            {
                appendRecord("students/".$sender."/threads.json", $threadInfo);
                appendRecord("coaches/".sha1($reciever)."/threads.json", $threadInfo);
            }
            else
            {
                appendRecord("students/".$reciever."/threads.json", $threadInfo);
                appendRecord("coaches/".sha1($sender)."/threads.json", $threadInfo);
            }
            break;
            case "t+t":
            $threadLocation = "communications/teacher+teacherThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            case "t+c":
            $threadLocation = "communications/teacher+coachThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            case "t+a":
            $threadLocation = "communications/teacher+adminThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            case "c+c":
            $threadLocation = "communications/coach+coachThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            case "c+a":
            $threadLocation = "communications/coach+adminThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            case "a+a":
            $threadLocation = "communications/admin+adminThreads/".$sender.$reciever.".json";
            $thread = fopen($threadLocation, "w");
            fclose($thread);
            break;
            default: errMsg("thread error", "Invalid thread type.");
            
        }
    }
    
    function sendMessage($type, $threadID, $sender, $content)
    {
        switch($type)
        {
            case "s+s": 
            $threadLocation = "communications/student+studentThreads/".$threadID.".json";
            break;
            case "s+t":
            $threadLocation = "communications/student+teacherThreads/".$threadID.".json";
            break;
            case "s+c":
            $threadLocation = "communications/student+coachThreads/".$threadID.".json";
            break;
            case "t+t":
            $threadLocation = "communications/teacher+teacherThreads/".$threadID.".json";
            break;
            case "t+c":
            $threadLocation = "communications/teacher+coachThreads/".$threadID.".json";
            break;
            case "t+a":
            $threadLocation = "communications/teacher+adminThreads/".$threadID.".json";
            break;
            case "c+c":
            $threadLocation = "communications/coach+coachThreads/".$threadID.".json";
            break;
            case "c+a":
            $threadLocation = "communications/coach+adminThreads/".$threadID.".json";
            break;
            case "a+a":
            $threadLocation = "communications/admin+adminThreads/".$threadID.".json";
            break;
            default: errMsg("thread error", "Invalid thread type.");
        }
        $thread = fopen($threadLocation, "r");
        $messages = fread($thread, filesize($threadLocation));
        $messagesArray = json_decode($messages, false, filesize($threadLocation));
        fclose($thread);
        
        $message = array($sender, $content);
        array_push($messagesArray, $message);
        
        $messages = json_encode($messagesArray);
        $thread = fopen($threadLocation, "w");
        fwrite($thread, $messages);
        fclose($thread);
    }
    
    /*
    =======================================================================================
    */
    function showMessages($threadID, $type)
    {
        $type = "s+s";
        switch($type)
        {
            case "s+s": 
            $threadLocation = "communications/student+studentThreads/".$threadID.".json";
            break;
            case "s+t":
            $threadLocation = "communications/student+teacherThreads/".$threadID.".json";
            break;
            case "s+c":
            $threadLocation = "communications/student+coachThreads/".$threadID.".json";
            break;
            case "t+t":
            $threadLocation = "communications/teacher+teacherThreads/".$threadID.".json";
            break;
            case "t+c":
            $threadLocation = "communications/teacher+coachThreads/".$threadID.".json";
            break;
            case "t+a":
            $threadLocation = "communications/teacher+adminThreads/".$threadID.".json";
            break;
            case "c+c":
            $threadLocation = "communications/coach+coachThreads/".$threadID.".json";
            break;
            case "c+a":
            $threadLocation = "communications/coach+adminThreads/".$threadID.".json";
            break;
            case "a+a":
            $threadLocation = "communications/admin+adminThreads/".$threadID.".json";
            break;
            default: errMsg("thread error", "Invalid thread type.");
        }
        
        $thread = fopen($threadLocation, "r");
        $messages = fread($thread, filesize($threadLocation));
        $messagesArray = json_decode($messages, false, filesize($threadLocation));
        fclose($thread);
        for($i = 2; $i < count($messagesArray); $i++)
        {
            
        }
        
        
        for($i = 0; $i < count($messagesArray); $i++)
        {
            echo "
            <div style='height: auto; width: 100%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
                <b>".$messagesArray[$i][0]."<b>
                <br>
                <p>".$messagesArray[$i][1]."
            <div>
            <br>
            ";
        }
    }
    
    function displayThreads($user, $type)
    {
        switch($type)
        {
            case "s":
            $f = "students/".$user."/threads.json";
            $file = fopen($f, "r");
            $threadsList = fread($file, filesize($f));
            $threadsArray = json_decode($threadsList, false, 512);
            fclose($file);
            $threads = "";
            for($i = 0; $i < count($threadsArray); $i++)
            {
                $threads .= "<div id='conversation-".$i."' style='width: 100%; height: 40px; background-color: white'>
                    <div style='width: 20%; height: 40px; float: left;'>
                        <img src='img/download.png' style='width: 100%; height: 40px;'>
                    </div>
                    <div style='width: 80%; height: 40px; float: right; line-height: 15px;'>
                        <br><span>".$threadsArray[$i][1]."</span>
                    </div>
                </div>
                ";
            }
            return $threads;
        }
    }
    
    function getFirstName($type, $id)
    {
        switch($type)
        {
            case "student": 
            $fileLoc = "students/".$id.".json";
            $file = fopen($fileLoc, "r");
            $info = fread($file, filesize($fileLoc));
            $infoArray = json_decode($info, true, filesize($fileLoc));
            fclose($file);
            return $infoArray["Fname"];
        }
    }
    
    function displayNotifications($user)
    {
        
    }
    
    /*
    =======================================================================================
    */
    
    function studentSearch($query)
    {
        $f = fopen("students/students.json", "r");
        $s = fread($f, filesize("students/students.json"));
        $db = json_decode($s, TRUE, filesize("students/students.json"));
        fclose($f);
        echo "";
        $results = array(); 
        echo "<html>
                <head>
                    <meta name='viewport' content='initial-scale=1, maximum-scale=1, user-scalable=no'>
                    <link rel='stylesheet' type='text/css' href='css/style.css'>
                    <meta charset='utf-8'>
                    <title>Admin Tools</title>
                </head>
                <body style='background-color: #cbcbcb; margin-top: 0px;'>
                    <div style='height: auto; width: 100%; background-color: #cbcbcb; position: fixed; margin-top: 0px;'><form action='ssresults.php' method='get' style='background-color: #bf1d32;'>
                        <input name='query' type='text' placeholder='Enter Student Number' class='UI' style='margin-left: auto; margin-right: auto; width: 75%;'>
                        <input type='submit' value='Search' style='width: 23%; border: none; background-color: #bf1d32; color: white;'>
                    </form>
						<form action='studentSearch.php' method='get' style='background-color: #bf1d32;'>
                            <input type='hidden' name='io' value='true'>
							<input type='hidden' name='query' value='1234567890'>
							<input type='submit' value='Show All' style='text-align: center; width: 100%; background-color: #bf1d32; color: white; border: none;'>
						</form>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        
						<div style='width: 95%; height: auto; background-color: transparent; font-size: 30px; color: black;'>Results: </div>
                </body>
            </html>
        ";
        for($i=0; $i<count($db); $i++)
        {
            $m = $db[$i];
            if($query == $m)
            {
                array_push($results, $m);
            }
        }
        $q = substr($query, 0, 5);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 1, 5);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 0, 4);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 1, 4);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 2, 4);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 0, 3);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 1, 3);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 2, 3);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 3, 3);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 0, 2);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 1, 2);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 2, 2);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 3, 2);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 4, 2);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 0, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 1, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 2, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 3, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 4, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        $q = substr($query, 5, 1);
        for($i=0; $i<count($db); $i++)
        {
            if(strpos($db[$i], $q)!=FALSE)
            {
                array_push($results, $db[$i]);
            }
        }
        if(count($results)==0)
        {
            return "No Results";
        }
        else
        {
			  for($i=count($results)-1; $i>0; $i--)
			  {
                for($j=($i-1); $j>=0; $j--)
					{
						if($results[$i]==$results[$j])
						{
							$results[$i] = "";
						}
					}
			  }
			  $infoArrF = array();
            $infoArrL = array();
			  for($i=0; $i<count($results); $i++)
			  {
					if($results[$i]!="")
					{
						$file = fopen("students/".$results[$i].".json", "r");
						$content = fread($file, filesize("students/".$results[$i].".json"));
						$content = json_decode($content, true, filesize("students/".$results[$i].".json"));
						fclose($file);
                    array_push($infoArrF, $content["Fname"]);
                    array_push($infoArrL, $content["Lname"]);
					}
			  }
            $counter = 0;
            for($i=0; $i<count($results); $i++)
            {
					if($results[$i]!="")
					{
						$value = $infoArrL[$counter].", ".$infoArrF[$counter];
                		echo "<form id='res' method='get' action='viewStudent.php'>
									<input type='hidden' name='id' value='".$results[$i]."'>
									<button class='result' onclick='document.getElementById(\"res\").submit();'><div style='width: auto; float: left;'>".$results[$i]."</div><div style='width: auto; float: right;'>".$value."</div></button> 
								</form>";
						$counter++;
					}
            }
            echo "<form>
                <button type='button' class='result' style='height: 20px; border: none; font-size: 15px;' onclick='window.location.assign(\"adminCreate.php\");'><div style='width: auto; float: left; color: gray;'>New Student</div><div style='width: auto; float: right; color: gray;'>+</div></button>
                </form>";
            return "";
        }
    }
    
    /*
    =======================================================================================
    */
    
    function teacherSearch($query)
    {
        $q = $query;
        //Get Teacher Records
        $f = "teachers/teachers.json";
        $file = fopen($f, "r");
        $rawData = fread($file, filesize($f));
        $data = json_decode($rawData, true, filesize($f));
        fclose($file);
        //Search Teacher Files
        $unsortedRecords = array();
        $recordIndecies = array();
        for($i = 0; $i < count($data); $i++)
        {
            $contains = strpbrk($data[$i][0], $q);
            if($contains!=false)
            {
                    array_push($unsortedRecords, $data[$i]);
                    array_push($recordIndecies, $i);
            }
        }
        echo "<body style='margin-top: 0px; background-color: #cbcbcb;'><div style='height: auto; width: 98%; background-color: transparent; position: fixed; margin-top: 20px; margin-left: 1%; margin-right: 1%;'><form action='tsresults.php' method='get' style='background-color: #bf1d32;'>
                        <input name='query' type='text' class='UI' style='margin-left: auto; margin-right: auto; width: 75%;'>
                        <input type='submit' value='Search' style='width: 23%; border: none; background-color: #bf1d32; color: white;'>
                    </form>
                    <form action='tsresults.php' method='get' style='background-color: #7b7b7b;'>
						<input type='hidden' name='query' value='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'>
						<input type='submit' value='Show All' style='text-align: center; width: 100%; background-color: #bf1d32; color: white; border: none;'>
					</form>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style='width: 95%; height: auto; background-color: transparent; font-size: 30px; color: black;'>Results: </div>
                    ";
        for($i = 0; $i < count($unsortedRecords); $i++)
        {
            $value = $unsortedRecords[$i][2].", ".$unsortedRecords[$i][1];
            echo "<link rel='stylesheet' type='text/css' href='css/style.css'>
                    <form id='res' method='get' action='viewTeacher.php'>
                    <input type='hidden' name='id' value='".$unsortedRecords[$i][0]."'>
                    <input type='hidden' name='index' value='".$recordIndecies[$i]."'>
                    <button class='result' onclick='document.getElementById(\"res\").submit();'><div style='width: auto; float: left;'>".$unsortedRecords[$i][0]."</div><div style='width: auto; float: right;'>".$value."</div></button> 
			      </form>";
        }
        echo "<body>";
    }
    
    /*
    =======================================================================================
    */
    
	function delStudent($id)
	{
		unlink("students/".$id."/notifications.json");
		rmdir("students/".$id);
		unlink("students/".$id.".json");
		unlink(sha1($id).".txt");
		$file = fopen("students/students.json", "r");
		$content = fread($file, filesize("students/students.json"));
		$content = json_decode($content, false, filesize("students/students.json"));
		fclose($file);
		$user = $id;
		$index = array_search($user, $content);
       unset($content[$index]);
       $output = json_encode($content);
       $file = fopen("students/students.json", "w");
       fwrite($file, $output);
       fclose($file);
		echo $user."'s account was deleted succesfully<br><a href='studentSearch.php'>Back to Search</a>";
	}
    
    /*
    =======================================================================================
    */
    
    function delTeacher($teacher, $index)
    {
        
    }
    
    /*
    =======================================================================================
    */
    
    function errMsg($status, $description)
    {
        echo "<html>
            <head>
                <title>".$status."</title>
                <link rel='stylesheet' type='text/css' href='css/style.css'>
            </head>
            <body>
                <div style='width: 100%;'>
                    <a href='http://northcountyhs.org'>
                        <img alt='This Image Cannot Be Loaded' src='img/nclogo.jpg' style='margin-left: 25%; width: 50%; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
                    </a>
                </div>
                <button onclick='history.back()' style='margin-left: auto; margin-right: auto; margin-top: 15%; background-color: #bf1d32; border-radius: 3px; height: 50px; width: 30%; color: black;'>
                    <br>".$description." Click to go back
                </button>
            </body>
        </html>";
    }
    
    /*
    =======================================================================================
    */
    
    function statusUpdate($status, $description)
    {
        
    }
    
    /*
    =======================================================================================
    */
    
    function coachSearch($q)
    {
        $file = "coaches/coaches.json";
        $f = fopen($file, "r");
        $coaches = fread($f, filesize($file));
        $coaches = json_decode($coaches, false, filesize($file));
        fclose($f);
        
        $unsortedRecords = array();
        $recordIndecies = array();
        
        for($i = 0; $i < count($coaches); $i++)
        {
            $contains = strpbrk($coaches[$i][0], $q);
            if($contains!=false)
            {
                array_push($unsortedRecords, $data[$i]);
                array_push($recordIndecies, $i);
            }
        }
        echo "<div style='height: auto; width: 100%; background-color: white; position: fixed;'><form action='csresults.php' method='get' style='background-color: #bf1d32;'>
                        <input name='query' type='text' class='UI' style='margin-left: auto; margin-right: auto; width: 75%;'>
                        <input type='submit' value='Search' style='width: 23%; border: none; background-color: #bf1d32; color: white;'>
                    </form>
                    <form action='csresults.php' method='get' style='background-color: #bf1d32;'>
						<input type='hidden' name='query' value='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'>
						<input type='submit' value='Show All' style='text-align: center; width: 100%; background-color: #bf1d32; color: white; border: none;'>
					</form></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style='width: 95%; height: auto; background-color: transparent; font-size: 30px; color: black;'>Results: </div>
                    ";
        for($i = 0; $i < count($unsortedRecords); $i++)
        {
            $value = $unsortedRecords[$i][2].", ".$unsortedRecords[$i][1];
            echo "<link rel='stylesheet' type='text/css' href='css/style.css'>
                    <form id='res' method='get' action='viewTeacher.php'>
                    <input type='hidden' name='id' value='".$unsortedRecords[$i][0]."'>
                    <input type='hidden' name='index' value='".$recordIndecies[$i]."'>
                    <button class='result' onclick='document.getElementById(\"res\").submit();'><div style='width: auto; float: left;'>".$unsortedRecords[$i][0]."</div><div style='width: auto; float: right;'>".$value."</div></button> 
			      </form>";
        }
    }
    
    function appendRecord($fileLocation, $object)
    {
        //Get any content previously in the file
        $file = fopen($fileLocation, "r");
        $content = fread($file, filesize($fileLocation));
        echo "Content: ".$content."<br>";
        $contentArray = json_decode($content, false, 512);
        fclose($file);
        //Append the new information to the array
        echo array_push($contentArray, $object);
        //Rewrite the file with the new information
        $newContent = json_encode($contentArray);
        $file = fopen($fileLocation, "w");
        fwrite($file, $newContent);
        fclose($file);
        return true;
    }
?>