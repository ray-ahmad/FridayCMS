<?php

class Play_file {
	public function all_files($dir) {
		if (!file_exists($dir) or !is_dir($dir))
			return show_error("Directory {$dir} is not exists!", 503, "PlayCMS Warning");

		$handle = opendir($dir);
		$files = array();
		while($file = readdir($handle)) {
			if ($file === "." or $file === "..") 
				continue;

			$files[] = $file;
		}

		return $files;
	}
	public function recurse_copy($src, $dst) { 
		$dir = opendir($src); 
		while($file = readdir($dir)) {

			if ($file === "." or $file === "..")
				continue;
			else {
				if (is_dir("{$src}/{$file}"))
					$this->recurse_copy("{$src}/{$file}", "{$dst}/{$file}"); 
				else
					copy("{$src}/{$file}", "{$dst}/{$file}");
			}
		} 
		closedir($dir); 
	}
}