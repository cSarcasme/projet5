<?php

require_once('model/HomeManager.php');
require_once('model/blogManager.php');
require_once('model/postManager.php');
require_once('model/commentManager.php');
require_once('model/infoManager.php');
require_once('model/InscriptionManager.php');
require_once('model/loginUserManager.php');

/* ** page home ** */

    class PageHome{
        /* * page home view * */
        public function home(){

            $homeManager=new ced\stream\model\HomeManager();
            $postFilms = $homeManager -> getFilms();
            $filmsNote = $homeManager ->getFilmsNote();

            require('view/frontend/home.php');
        }
        /* * data to jason for search bar * */
        public function jasonFilms($term){
            $mediaManager = new ced\stream\model\HomeManager;
                $postFilms = $mediaManager -> getFilmsAuto($term);
                $array =[];
                while($donnee = $postFilms->fetch()){ // on effectue une boucle pour obtenir les données
                    
                array_push($array, $donnee['title']); // et on ajoute celles-ci à notre tableau
                }

                echo json_encode($array);
        }
    }
    /* * connexion users * */
    class LoginUserConnexion{
        public function is_User($email,$pseudo){
            $loginUserManager = new ced\stream\model\loginUserManager;
            $result = $loginUserManager -> isUser($email,$pseudo);
            return $result;
        }
    }
    /* * deconnexion users * */
    class UserDeconnexion{
        public function deconnexion(){
            session_destroy();
            header('Location:index.php?page=home');
        }
    }
/* ** page inscription ** */

    class PageInscription{
        public function inscription(){
                
            require('view/frontend/inscription.php');
        }
        /* add user into bbd */
        public function add_User($name,$pseudo,$email,$password,$image){
            $InscriptionManager = new ced\stream\model\InscriptionManager;
            $affectedLines = $InscriptionManager -> addUser($name,$pseudo,$email,$password,$image);
            
            if ($affectedLines === false) {
                throw new Exception('Impossible d\' ajouter l\' utilisateur !');
            }
            
        }
    }
    class VerifUsersIfExist{
        /*verif user email if exist in bbd*/
        public function If_Exist($pseudo,$email){
            $InscriptionManager = new ced\stream\model\InscriptionManager;
            $result = $InscriptionManager -> IfExist($pseudo,$email);
            return $result;
        }
    }
/*page blog*/
    function blog(){
        

        require('view/frontend/blog.php');
    }
/*page post*/
    function post(){
      
        require('view/frontend/post.php');          
    }


class PageMovies{
        public function movies(){
            $infoManager = new ced\stream\model\infoManager;
            /*get movie info from bbd */
            $film = $infoManager ;
            $films = $infoManager ;
            require('view/frontend/movies.php');          
        }
    }


/* ** page movies info ** */
    class PageMoviesInfo{
        /*page films*/
        public function infoMovies(){
            $infoManager = new ced\stream\model\infoManager;
            /*get movie info from bbd */
            $film = $infoManager -> getFilm($_GET['id']);
            $films = $infoManager -> getFilms();
        
            $commentManager=new ced\stream\model\commentManager();
            /*get comments of page film info */
            $comments = $commentManager->getCommentsFilm($_GET['id']);

            if ($film == false) {
                throw new Exception('Ce n\'est pas la bonne page');
            }
            else {
            require('view/frontend/infoMovies.php');
            }          
        }

        /*post comment film*/
        public function post_CommentFilm($filmId,$name, $email, $comment,$image){
            $commentManager=new ced\stream\model\CommentManager();
            $affectedLines = $commentManager->postCommentFilm($filmId,$name, $email, $comment,$image);
            
            if ($affectedLines == false) {
                throw new Exception('impossible de poster le commentaire');
            }
        }

        /*update signal abuse comment*/
        public function update_CommentSeen($film_Id,$filmId){
            $commentManager=new ced\stream\model\commentManager();
            $affectedLines = $commentManager -> updateComment($filmId);

            if ($affectedLines == false) {
                throw new Exception('impossible de signaler le commentaire');
            }
            else {
            header('Location:index.php?page=infoMovies&id='.$film_Id);
            }
        }

    }