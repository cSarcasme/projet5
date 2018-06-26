<?php

require_once('model/HomeManager.php');
require_once('model/blogManager.php');
require_once('model/postManager.php');
require_once('model/commentManager.php');
require_once('model/infoManager.php');
require_once('model/InscriptionManager.php');
require_once('model/loginUserManager.php');
require_once('model/moviesManager.php');
require_once('model/configurationManager.php');

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
                while($donnee = $postFilms->fetch()){ 
                    
                array_push($array, $donnee['title']); 
                }

                echo json_encode($array);
        }
    }

/* ** login users ** */

    class LoginUserConnexion{
        /*verif email or pseudo exist in bbd*/
        public function is_User($email,$pseudo){
            $loginUserManager = new ced\stream\model\loginUserManager;
            $result = $loginUserManager -> isUser($email,$pseudo);
            
            return $result;
        }
    }

    /* * deconnexion users * */
    class UserDeconnexion{
        public function deconnexion(){
            unset($_SESSION['user']['email']) ;
            unset($_SESSION['user']['pseudo']);
            unset($_SESSION['user']['image']);
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
    /* * verif the name or emaild don' t exist in bbd * */
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

/* ** page movies ** */

    class PageMovies{
            public function movies(){
                $movies = new ced\stream\model\Movies;
                /* nbr page */
                $nbPages = $movies -> nbPagesBoardPosts();
                /*rules*/
                if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                    $cPage=$_GET['p'];
                }
                else{
                    $cPage=1;
                }

                /*get all movie from bbd */
                $films = $movies -> getFilms($cPage);

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
            /*get comments for page film info */
            $comments = $commentManager->getCommentsFilm($_GET['id']);

            if ($film == false) {
                throw new Exception('Ce n\'est pas la bonne page');
            }
            else {
            require('view/frontend/infoMovies.php');
            }          
        }

        /*post comment on page movies*/
        public function post_CommentFilm($filmId,$name, $email, $comment,$image){
            $commentManager=new ced\stream\model\CommentManager();
            $affectedLines = $commentManager->postCommentFilm($filmId,$name, $email, $comment,$image);
            
            /*if error*/
            if ($affectedLines == false) {
                throw new Exception('impossible de poster le commentaire');
            }
        }

        /*comment abuse signal*/
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

/* ** page configuration users ** */

    class PageConfig{
        public function config(){
            
            require('view/frontend/configuration.php'); 
        }
        public function update_User($name,$pseudo,$image,$email){
            $configurationManager = new ced\stream\model\ConfigurationManager;
            $update = $configurationManager -> updateUser($name,$pseudo,$image,$email);
        }
        /* verif passord by email */
        public function is_Email($email){
            $configurationManager = new ced\stream\model\ConfigurationManager;
            $result = $configurationManager -> isEmail($email);
            
            return $result;
        }
    
    }