<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <main>
  <?= $content ?>
  </main>

  
    
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Bootstrap core JavaScript -->
    <script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/bootstrap.bundle.js"></script>
    <!--<script  src="public/js/searchMovie.js"></script>-->
    <script  src="public/js/tinymce/tinymce.js"></script>
    <script  src="public/js/script.js"></script>
    <script>
  tinymce.init({
   
    selector: '#writte',
    //entity_encoding : "raw",
    language : "fr_FR",
    encoding: "UTF-8",
    height: 300,
    theme: 'modern',
    forced_root_block : 'p',
  mobile: {
    theme: 'beta-mobile',
    plugins: [ 'autosave' ]
  },
  plugins: 'print preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template  table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools contextmenu colorpicker  help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    'fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    'www.tinymce.com/css/codepen.min.css'
  ],
  content_style: [
    'body{max-width:700px; padding:30px; margin:auto;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.3; letter-spacing: -0.03em;color:#222} h1,h2,h3,h4,h5,h6 {font-weight:400;margin-top:1.2em} h1 {} h2{} .tiny-table {width:100%; border-collapse: collapse;} .tiny-table td, th {border: 1px solid #555D66; padding:10px; text-align:left;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.6;} .tiny-table th {background-color:#E2E4E7}'
  ],
  visual_table_class: 'tiny-table'
    });
  </script>
  </body>
</html>