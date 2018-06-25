<?php
require('controller/frontend.php');
session_start();
try{
	$pages = scandir('view/frontend/');
	if (isset($_GET['page'])) {
		if($_GET['page'] != 'login' && !isset($_SESSION['email'])){
			header('Location:index.php?page=login');
		}
/* ***page add media dashboard *** */

	/* **page movies ** */
		elseif ($_GET['page'] == 'addFilms') {		
			films();			
		}
		elseif ($_GET['page'] == 'jasonFilms'){
			jasonFilms($_GET['term']);
		}
		/* delete movie + links */
		elseif ($_GET['page'] == 'deleteFilm') {
			if (isset($_GET['title'])) {
				delete_Film($_GET['title']);
			}
		}

/* *** all page info *** */

	/* ** page info movies ** */
		elseif ($_GET['page'] == 'moviesInfo') {
			moviesInfo();
		}

/* *** page all dashboars *** */

	/* ** page dashboard comment ** */
		elseif ($_GET['page'] == 'dashboard') {
			dashboard();
		}
		elseif ($_GET['page'] == 'updateValidComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				updateValidComment($_GET['id']);
			}
		}
		elseif ($_GET['page'] == 'deleteComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				deleteComment($_GET['id']);
			}
		}
	/*page admins of dashboard*/
		elseif ($_GET['page'] == 'admins.dash') {
			admins();
		}
		elseif ($_GET['page'] == 'deleteadmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				deleteAdmin($_GET['id']);
			}
		}

	/*page publications of dashboard*/
		elseif ($_GET['page'] == 'publications.dash') {
			if(isset($_GET['p']) && $_GET['p']>0){
			publications();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		elseif ($_GET['page'] == 'adminpost') {
			if(isset($_GET['id']) && $_GET['id']>0){
			adminPost();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		elseif ($_GET['page'] == 'updapteNoPublishPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				updapteNoPublishPost($_GET['id']);
			}
		}
		elseif ($_GET['page'] == 'deletepost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				delete_Post($_GET['id'], $_GET['idco']);
			}
		}
		elseif ($_GET['page'] == 'updaptePublishPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				updaptePublishPost($_GET['id']);
			}
		}
	/* modification article */
		elseif ($_GET['page'] == 'modifpost') {
			if(isset($_GET['id']) && $_GET['id']>0){
				modifPost();
			}
		}

	/*page login connexion*/
		elseif ($_GET['page'] == 'login') {
				login();
		}
		elseif ($_GET['page'] == 'deconnexion') {
			deconnexion();
		}

	/*page write a article */
		elseif ($_GET['page'] == 'writte') {
			writte();
		}

	/* page configuration*/
		elseif ($_GET['page'] == 'config') {
			config();
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
		login();
	}
}
catch(Exception $e) {
	require('view/frontend/error.php');
}
?>




