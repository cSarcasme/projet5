<?php
require('controller/frontend.php');
session_start();
try{
	
	$pages = scandir('view/frontend/');
	
	if (isset($_GET['page'])) {
		/* page home */
        if ($_GET['page'] == 'home') {
			$home = new PageHome;
			$home -> home(); 
		}
		/*data json for search */
		elseif ($_GET['page'] == 'jasonFilms'){
			$home = new PageHome;
			$home-> jasonFilms($_GET['term']);
		}
		/* inscription user */
		elseif ($_GET['page'] == 'inscription') {
			$inscription = new PageInscription;
			$inscription -> inscription();
		}
		/* inscription user */
		elseif ($_GET['page'] == 'config') {
			$config = new PageConfig;
			$config -> config();
		}
		/* deconnexion user */
		elseif ($_GET['page'] == 'deconnexion') {
			$deconnexion = new UserDeconnexion;
			$deconnexion -> deconnexion();
		}
		/* page blog */
		elseif ($_GET['page'] == 'blog') {
			blog();
		}
		/* page post */
		elseif ($_GET['page'] == 'post') {
			post();
		}
		elseif ($_GET['page'] == 'movies') {
			$movies = new PageMovies;
			$movies -> movies();
		}
		/* page movies */
		elseif ($_GET['page'] == 'infoMovies') {
			if(isset($_GET['id']) && $_GET['id']> 0){
				$movies = new PageMoviesInfo;
				$movies -> infoMovies();
			}
		}
		/* search page exist */
		elseif(in_array($_GET['page'],$pages)){
			$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');			
		}
	}
	else{
		$home = new PageHome;
		$home -> home();
	}
	
}
catch(Exception $e) {
	require('view/frontend/error.php');
	
}
?>







