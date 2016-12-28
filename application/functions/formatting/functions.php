<?php
	function format($array, $type)
	{
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
		}
	}
?>