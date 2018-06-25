<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vous êtes sur le site de Jean Forteroche qui vous propose son nouveau roman nouvelle au format web.
                                      Toutes les semaines ,un nouveau chapitre est publié.">
    <meta name="keyword" content="roman,nouvelle,alaska,billet pourl' alaska,Jean Forteroche,intrigue,chapitre,blog,livre,mystere,vol pour l'alaska,livre sur l'alaska,tresor">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
      
      <?php
      include('body/topbar.php');
      ?>
      
  </header>
  <main>
  <?= $content ?>
  </main>

  <footer>
      <?php
      include('body/footer.php');
      ?>
  </footer>
    
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="public/js/bootstrap.js"></script>
    <script src="public/js/script.js"></script>
    <script src="public/js/slider.js"></script>
    <script src="public/js/owl.carousel.js"></script>
    <script src="public/js/searchMovie.js"></script>
  </body>
</html>