<?php
	function get_array_from_file($filepath, $with_keys)
	{
		$filesize = filesize($filepath);
		$file = fopen($filepath, "r");
		$content = fread($file, $filesize);
		$content_array = json_decode($content, $with_keys, $filesize);
		fclose($file);
		
		return $content_array;
	}
?>