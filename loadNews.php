<?php
	$dir = "news";
	if(is_dir($dir))$dh=opendir($dir);
	else echo $dir . " is not a valid directory";

	$list = scandir($dir);
	$list = array_reverse($list);
	$fcontent = "";
	
	foreach($list as $news){
		
		$path = "news//" . $news;
		if(filetype($path) == "file" ){
			$file = fopen($path, "r") or die("file not found");
			$user = fgets($file);
			$ftitle = fgets($file);
			$ftime = fgets($file);
			while(!feof($file)){
				$fcontent = $fcontent . fgets($file);
			}
			fclose($file);
			
			echo "<li>";
			echo "<h3>" . $ftitle . " - " . $ftime . " - ". $user ."</h3>";
			echo "<p>" . $fcontent . "</p>";
			echo "</li>";
			$fcontent="";//lo vaciamos por seguridad.
		}
		
	}
	closedir($dh)
?>