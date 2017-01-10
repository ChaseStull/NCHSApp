<?php
	function format($array, $type)
	{
        $time = gmdate("m/d/Y \a\t h:i:s");
		switch($type)
		{
			case "group_option":
			{
				$options = "";
				for($i = 0; $i < count($array); $i++)
				{
					$options .= "<option value='".sha1($array[$i])."'>".$array[$i]."</option>";
				}
				return $options;
			}
			break;
			case "group_link":
			{
				$links = "";
				for($i = 0; $i < count($array); $i++)
				{
					if($i == count($array)-1)
					{
						$links .= "<a href='?group_id=".sha1($array[$i])."'>".$array[$i]."</a>";
					}
					else
					{
						$links .= "<a href='?group_id=".sha1($array[$i])."'>".$array[$i]."</a><div></div>";
					}
				}
				return $links;
			}
			case "post":
			{
                $posts = "";
				for($i = 0; $i < count($array); $i++)
                {
                    $post_info = $array[$i][0];                    
                    $post_head = $array[$i][1];
                    $post_type = $array[$i][2];
                    if($post_type == "post")
                    {
                        $post_body = $array[$i][3];
                        $post_attach = $array[$i][4];
                        if($post_attach != null)
                        {
                            if($post_attach == "image")
                            {
                                $img_src = $array[$i][5];
                                $posts .= "<div class='post'>
                                    <h5 class='post-info'>".$post_info."</h5>
                                    <img class='post-image' src='".$img_src."'>
                                    <h3 class='post-header'>".$post_head."</h3>
                                    <p>
                                        ".$post_body."
                                    </p>
                                </div>";
                            }
                        }
                        else
                        {
                            $posts .= "<div class='post'>
                                <h5 class='post-info'>".$post_info."</h5>
                                <h3 class='post-header'>".$post_head."</h3>
                                <p>
                                    ".$post_body."
                                </p>
                            </div>";
                        }
                    }
                    /*else if($post_type == "quiz")
                    {
                        echo "<div class='post'>
                            <h5 class='post-info'>".$info."</h5>
                            <h3 class='post-head'>".$head."</h3>
                            <form class='quiz'>
                        </div>";
                    }
                    else if($post_type == "homework")
                    {
                            
                    }*/
                }
                return $posts;
			}
            break;
            case "member_info_block":
            {
                $members = "";
                include("http://nchsapp.azurewebsites.net/application/functions/filesystem/json.php");
                for($i = 0; $i < count($array); $i++)
                {
                    $member_array = get_array_from_file("../../users/".sha1($array[$i]).".json");
                    $member_username = $member_array[0];
                    $member_first_name = $member_array[2];
                    $member_last_name = $member_array[3];
                    $member_quote = $member_array[4];
                    $member_type = $member_array[5];
                    $member_id = $member_array[6];
                    
                    $members .= "<br><div class='member-info-block'>
                        <h3>".$member_username."</h3><h4>".$member_type."</h4>
                        <table>
                            <thead>
                                <tr><th>First Name</th><th>Last Name</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>".$member_first_name."</td><td>".$member_last_name."</td></tr>
                            </tbody>
                        </table>
                        <div class='member-option-bar'>
                            <img class='delete-option' src='../../../img/trash-can-red.png'>
                        </div>
                    </div>
                    <br><br>";
                }
                return $members;
            }
            break;
            case "member_option":
			{
				$options = "";
				for($i = 0; $i < count($array[0]); $i++)
				{
                    if(!in_array($array[0][$i], $array[1]))
                    {
                        $options .= "<option value='".$array[0][$i]."'>".$array[0][$i]."</option>";
                    }
				}
				return $options;
			}
			break;
            case "alert":
            {
                $alerts = "";
                for($i = 0; $i < count($array); $i++)
                {
                    $alerts .= "<div class='alert'>
                        <form id='note-".$i."' action='functions/notifications/remove_notification.php' method='post' style='display: none;'>
                            <input type='hidden' name='index' value='".$i."'>
                        </form>
                        <div class='alert-option-bar'>
                            <img class='alert-option-bar-image' src='../img/trash-can-red.png' alt='O' onclick='if(confirm(\"Are you sure you want to remove this notification?\\n(This can not be undone)\") == true){document.getElementById(\"note-".$i."\").submit();}'>
                        </div>
                        <h3>".$array[$i][0]."</h3>
                        <p>
                            ".$array[$i][1]."
                        </p>
                    </div>";
                }
                return $alerts;
            }
            break;
            case "dir":
            {
                #Logging
                $log_statement = $time." DIRECTORY /users".sha1($_COOKIE["userid"])."/docs ACCESSED\n";
                $file = fopen("http://nchsapp.azurewebsites.net/users".sha1($_COOKIE["userid"])."/docs/log.dir", "r");
                $history = fread($file, filesize("http://nchsapp.azurewebsites.net/users".sha1($_COOKIE["userid"])."/docs/log.dir"));
                fclose($file);
                $file = fopen("http://nchsapp.azurewebsites.net/users".sha1($_COOKIE["userid"])."/docs/log.dir", "w");
                fwrite($file, $history.$log_statement);
                
                #Array operations
                $files = "";
                for($i = 0; $i < count($array); $i++)
                {
                    switch($array[$i][1])
                    {
                        case "resource":
                        {
                            $filesize = filesize("http://nchsapp.azurewebsites.net/docs/".sha1($_COOKIE["userid"])."/docs/".$array[$i][0]);
                            if(strlen($filesize) < 4)
                            {
                                $filesize_f = $filesize." B";
                            }
                            else
                            {
                                $filesize_f = substr($filesize, 0, 2)." MB";
                            }
                            $files .= "<a href='http://nchsapp.azurewebsites.net/docs/".sha1($_COOKIE["userid"])."/docs/".$array[$i][0]."'><div class='file'><h6>".$array[$i][0]."</h6><span>".$filesize_f."</span></div></a>";
                        }
                        break;
                    }
                }
            }
            break;
		}
	}
?>