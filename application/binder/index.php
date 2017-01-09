<?php
	require("../functions/filesystem/");
	
	if(isset($_COOKIE["userid"]))
	{ 
		$user_info = get_array_from_file("../users/".sha1($_COOKIE["userid"]).".json", false);
		if($_COOKIE["userid"] == $user_info[0])
		{
			$user_id = $user_info[0];
			$user_first_name = $user_info[2];
			$user_last_name = $user_info[3];
			$user_quote = $user_info[4];
			$user_account_type = $user_info[5];
			$user_account_id = $user_info[6];
			$user_account_verification_status = $user_info[7];
			$user_account_quota_status = $user_info[8];
			
			$files = 
			
			echo
		}
		else
		{
			echo "<script>onload = location.assign(\"../../\")</script>";
		}
	}
	else
	{
		echo "<script>onload = location.assign(\"../../\")</script>";
	}
?>