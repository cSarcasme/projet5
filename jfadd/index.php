<?php
require('controller/frontend.php');
session_start();
try{
	$pages = scandir('view/frontend/');
	if (isset($_GET['page'])) {
		if($_GET['page'] != 'login' && !isset($_SESSION['admin']['email'])){
			header('Location:index.php?page=login');
		}
/* ***page add media dashboard *** */

	/* **page movies ** */
		elseif ($_GET['page'] == 'addFilms') {
			if(isset($_GET['p']) && $_GET['p']>0){
			$movies = new Movies;		
			$movies -> films();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}		
		}
		/* delete movie + links */
		elseif ($_GET['page'] == 'deleteFilm') {
			if (isset($_GET['title'])) {
				$delete = new Movies;
				$delete -> delete_Film($_GET['title']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
			
		}

/* *** all page info *** */

	/* ** page info movies ** */
		elseif ($_GET['page'] == 'moviesInfo') {
			$movies = new InfoMovies;
			$movies -> moviesInfo();
		}

/* *** page all dashboard *** */

	/* ** page dashboard comment ** */
		elseif ($_GET['page'] == 'dashboard') {
			if(isset($_GET['p']) && $_GET['p']>0){
			$dashboard = new DAshboardAll;
			$dashboard -> dashboard();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		/* update comment blog */
		elseif ($_GET['page'] == 'updateValidComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$update = new DAshboardAll;
				$update -> update_ValidComment($_GET['id']);
			}
		}
		/* update comment film */
		elseif ($_GET['page'] == 'updateValidCommentFilm') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$update = new DAshboardAll;
				$update -> update_ValidCommentFilm($_GET['id']);
			}
		}
		/* delete comment blog*/
		elseif ($_GET['page'] == 'deleteComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$delete = new DAshboardAll;
				$delete ->delete_Comment($_GET['id']);
			}
		}
		/* delete comment film */
		elseif ($_GET['page'] == 'deleteCommentFilm') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$delete = new DAshboardAll;
				$delete ->delete_CommentFilm($_GET['id']);
			}
		}
	/* ** page admins of dashboard ** */
		elseif ($_GET['page'] == 'admins.dash') {
			if(isset($_GET['p']) && $_GET['p']>0){
			$dashboard = new DashboardAll;
			$dashboard -> admins();
			}
		}
		elseif ($_GET['page'] == 'deleteadmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$delete = new DashboardAll;
				$delete  -> delete_Admin($_GET['id']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		elseif ($_GET['page'] == 'deleteuser') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$delete = new DashboardAll;
				$delete  -> delete_User($_GET['id']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}


	/* ** page publications of dashboard ** */
		elseif ($_GET['page'] == 'publications.dash') {
			if(isset($_GET['p']) && $_GET['p']>0){
				$dashboard = new DashboardAll;
				$dashboard -> publications();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		/* update publish to no */
		elseif ($_GET['page'] == 'updapteNoPublishPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$update = new DashboardAll;
				$update -> updapte_NoPublishPost($_GET['id']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		/* update publish to yes */
		elseif ($_GET['page'] == 'updaptePublishPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$update = new DashboardAll;
				$update -> updapte_PublishPost($_GET['id']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		/*delete post with comment */
		elseif ($_GET['page'] == 'deletepost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$delete = new DashboardAll;
				$delete -> delete_Post($_GET['id'], $_GET['idco']);
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}

/* *** page post view post in backend *** */	
		elseif ($_GET['page'] == 'adminpost') {
			if(isset($_GET['id']) && $_GET['id']>0){
				$post = new Post;
				$post-> get_Post();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
/* *** modification article *** */
		elseif ($_GET['page'] == 'modifpost') {
			if(isset($_GET['id']) && $_GET['id']>0){
				$post =new ModifPost;
				$post -> get_Post();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}

	/*page login connexion*/
		elseif ($_GET['page'] == 'login') {
				login();
		}
/* *** deconnexion *** */		
		elseif ($_GET['page'] == 'deconnexion') {
			$deconnexion = new Deconnexion;
			$deconnexion -> deconnexion();
		}

/* *** page write a article *** */
		elseif ($_GET['page'] == 'writte') {
			$writte = new AddArticle;
			$writte -> writte();
		}

/* *** page configuration *** */
		elseif ($_GET['page'] == 'config') {
			$config = new Configuration; 
			$config -> config();
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
		$login  = new Login;
		$login -> loginBack();
	}
}
catch(Exception $e) {
	require('view/frontend/error.php');
}
?>




