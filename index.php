<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Amateur game design">
	  <meta name="keywords" content="game design, matrix core studio">
  	<meta name="author" content="Matrix Core Studio, special thx to Traversy Media">
    <title>Matrix Core Studio | Principal</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <?php
      include "header.php";
    ?>

    <section id="main">
      <div class="container">
        <article id="mainNews">
          <h1 class="page-title">News and Updates</h1> 
          <h3><a href="#" onClick="window.open('createNews.php','Create News','resizable,height=260,width=370'); return false;" id="createNews">Create a new article</a></h3>
		  
          <ul id="news">
			
			
				<?php
					require "loadNews.php";
				?>

            <!--<li>
              <iframe src="news/001-Opened.html">
              </iframe>
            </li>-->  

          </ul>
        </article>
         <aside id="sidebar">
          <div class="dark">
            <h3>Proxima reunion f&#237;sica:</h3>
            <p>
              <time>
                25-Ago-2017 - Badshot´s House of Pizza.
              </time>
            </p>
            <h3>Hipchat</h3>
            <p>
              Recuerda inciar hipdat diariamente para estar actualiazo en cambios o deciciones importantes.
            </p>
           <h3>Nota</h3>
            <p>
              Disculpen los acentos y las enies. Son una flojera escribirlas en html.
            </p>
          </div>
        </aside>
      </div>
    </section>


    <footer>
      <p>Matrix Core Studio, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>