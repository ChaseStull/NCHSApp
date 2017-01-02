<?php
    require("../../functions/filesystem/json.php");
    require("../../functions/notifications/functions.php");

    $add_user_id = $_POST["user_id"];
    $add_user_root = "../../users/".sha1($add_user_id);
    $group_id = $_POST["group_id"];
    $group_info = get_array_from_file("../".$group_id.".json");
    $member_type = $_POST["member_type"];

    $add_user_info = get_array_from_file($add_user_root.".json");
    if($add_user_info[5] == "student")
    {
        $member_type = "standard member";
    }
    $add_user_groups = get_array_from_file($add_user_root."/groups.json", false);
    array_push($add_user_groups, $group_info[0]);
    write_array($add_user_root."/groups.json");

    switch($member_type)
    {
        case "standard member":
        {
            array_push($group_info[5], $add_user_id);
        }
        break;
        case "administrator":
        {
            array_push($group_info[4], $add_user_id);
            array_push($group_info[5], $add_user_id);
        }
        break;
        default:
        {
            array_push($group_info[5], $add_user_id);
        }
    }
    write_array("../".$group_id.".json", $group_info);

    $user_filepaths = array();
    for($i = 0; $i < count($group_info[4]); $i++)
    {
        array_push($user_filepaths, "../../users/".sha1($group_info[4][$i]));
    }

    $note = create_notification($group_info[0], $_COOKIE["userid"]." has added ".$add_user_id." as a/an ".$member_type.".");
    send_notification($note, $user_filepaths);

    echo "<script>onload = location.assign(\"./?group_id=".$group_id."\");</script>";
?>