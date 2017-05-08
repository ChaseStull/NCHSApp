<?php
	function get_group()
	{
		require("functions/filesystem/php.json");
		if(isset($_COOKIE["userid"]))
		{
			if((isset($_GET["group_id"])) && ($_GET["group_id"] != null) && (file_exists("groups/".$_GET["group_id"].".json")))
			{
				$group_array = get_array_from_file("groups/".$_GET["group_id"].".json", false);
				return $group_array;
			}
		}
	}
?>