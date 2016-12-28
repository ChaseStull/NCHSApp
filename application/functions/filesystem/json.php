<?php
	function get_array_from_file($filepath, $with_keys)
	{
		$filesize = filesize($filepath);
		$file = fopen($filepath, "r");
		$content = fread($file, $filesize);
		if($content == "")
		{
			return null;
		}
		else
		{
			$content_array = json_decode($content, $with_keys, $filesize);
			fclose($file);
			return $content_array;
		}
	}
	
	function write_array($filepath, $content_array)
	{
		$new_content = json_encode($content_array);
		$file = fopen($filepath, "w");
		fwrite($file, $new_content);
		fclose($file);
	}
?>