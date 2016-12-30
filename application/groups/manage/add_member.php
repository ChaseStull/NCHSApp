<?php
    require("../../functions/filesystem/json.php");

    $add_user_id = $_POST["user_id"];
    $group_id = $_POST["group_id"];
    $member_type = $_POST["member_type"];

    $add_user_info = get_array_from_file("../../users/".sha1($add_user_id).".json");
    if($add_user_info[5] == "student")
    {
        $member_type = "member";
    }

    $group_info = get_array_from_file("../".$group_id.".json");
?>