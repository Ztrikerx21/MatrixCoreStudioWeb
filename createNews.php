<html>
	<head>
		<title>
			Create News
		</title>
		<link rel="stylesheet" href="style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		
		<?php
		$titleErr = $newsErr = "";
		$title = $news = "";

		if($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty($_POST["title"])){
				$titleErr = "Title is a required field";
			}else{
				$title = fixText($_POST["title"]);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$title)) {
					$titleErr = "Only letters, white space and numbers allowed";
				}
			}
			if(empty($_POST["news"])){
				$newsErr = "News is a required field";
			}else{
				$news = htmlspecialchars($_POST["news"]);
				$news = str_ireplace("\n","<br>",$news);
				
				
				
			}
		}	
		
		function fixText($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
    
		if(empty($titleErr) && !empty($news) && empty($newsErr)){
		  
			$dir = "news";
			if(is_dir($dir)) $dh = opendir($dir);
			else echo "$dir is not a valid directory";
	 
			$list = scandir($dir);
			$numlist = count($list);
			
			//para mantener el formato de los archivos consistentemente.
			if($numlist < 10) $numlist = "00" . $numlist;
			elseif($numlist > 10 && $numlist < 100) $numlist = "0" . $numlist;
			
			$myFile = fopen("news/" . $numlist . str_replace(" ", "", $title) . ".html","w") or die("can't open file");		
			
			fwrite($myFile, "DefaultUser" . "\n");//default user sera actualizado al soportar seciones.
			fwrite($myFile, $title . "\n");
			fwrite($myFile, date("h:i:sa") . " " . date("d/m/y") . "\n");
			fwrite($myFile, $news . "\n");
			fclose($myFile);
			closedir($dh);
		  
			echo "All Ok!, boss";
		  

		
		}else{
			/*echo "some contenet is missing, please check:";
			//This is just por testing the  captured input
				echo "autor: ". $autor . " title: " . $title ." news: " . $news;
			*/
			if(!empty($titleErr) or !empty($newsErr))
			echo "<h3>Please correct fields, you may hit back to recover your article.</h3>";
		}
    

		?>
		
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			Title:<br>
			<input type="text" name="title"><span class="requiredField" >* <?php echo $titleErr; ?></span><br>
			News:<br>
			<textarea  name="news" rows="5" cols="40"></textarea><span class="requiredField" >* <?php echo $newsErr; ?></span><br>
			<input type="submit">
		</form>
		
	</body>
</html>