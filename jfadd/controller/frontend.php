<?php
require_once('model/loginManager.php');
require_once('model/dashboardManager.php');
require_once('model/writteManager.php');
require_once('model/postAdminManager.php');
require_once('model/modifPostManager.php');
require_once('model/configManager.php');
require_once('model/mediaManager.php');
require_once('model/infoManager.php');



/* *** page login *** */

class Login{
    function loginBack(){
                 
    require('view/frontend/login.php');
    }
    public function submitLogin($email,$pseudo){
        $loginManager = new ced\stream\model\loginManager(); 
        $result = $loginManager->is_Admin($email,$pseudo);
        
        return $result;
    }
}
/* *** all media dashboard *** */

    /* ** page movies ** */
    class Movies{
        public function films(){      
            $mediaManager = new ced\stream\model\MediaManager;
            /*count nbr films in bbd*/
            $countFilms = $mediaManager->countFilms();
            /*pagination*/
            $nbPages = $mediaManager->nbPagesFilms();
            /*rules*/
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                $cPage=$_GET['p'];
            }
            else{
                $cPage=1;
            }
            /*get films in bbd */
            if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] ){
                $postFilms = $mediaManager -> getFilmsSearch($_POST['search'],$cPage);
            }
            else{
                $postFilms = $mediaManager -> getFilms($cPage);                
            }
            require('view/frontend/addFilms.php');
        }
        /*add movie info to bbd*/
        public function add_Film($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops){
            $mediaManager = new ced\stream\model\MediaManager;
            $affectedLines = $mediaManager -> addFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops); 
                
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les informations du film !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }
        }
        /*update movie into bbd*/
        public function update_Film($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId){
            $mediaManager = new ced\stream\model\MediaManager;
            $affectedLines = $mediaManager -> updateFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible de modifier les informations du film !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }
        }
        /*delete movie in bbd*/
        public  function delete_Film($title){
            $mediaManager = new ced\stream\model\MediaManager;
            $affectedLines = $mediaManager -> deleteFilm($title);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le film et ces liens !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }           
        }
    }

/* *** all page info *** */
        
    /* ** page movies info ** */
    class InfoMovies{
        public function moviesInfo(){        
            $infoManager = new ced\stream\model\InfoManager;
            /*get movie info from bbd */
            $movie = $infoManager -> getFilm($_GET['title']);

            require('view/frontend/infoMovies.php');
        }
        /* add link movie into bbd */
        public function add_LinkFilmInfo($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
            $infoManager = new ced\stream\model\infoManager;
            $affectedLines = $infoManager -> addLinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les liens du film !');
            }
            else {
            header("Location:index.php?page=moviesInfo&title=$title");
            }
        }
    }
/* *** Dashboard *** */
    
    class DashboardAll{
    /* ** Part comment ** */
        public function dashboard(){
            $dashboardManager = new ced\stream\model\DashboardManager;
        /* * count * */   
            /*total admins */
            $countAdmins = $dashboardManager->tableCountAdmins();
            /*total posts */
            $countPosts = $dashboardManager->tableCountPosts();
            /*total comments*/
            $countComments = $dashboardManager->tableCountComments();
            /* total comment valid */
            $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
            /* total comment film valid */
            $countCommentsFilmSeen = $dashboardManager->tableCountCommentsFilmSeen();
            /* total comment to valid */
            $tableCountCommentsSeenToValid = $dashboardManager->tableCountCommentsSeenToValid();
            /* total comment film to valid */
            $tableCountCommentsFilmSeenToValid = $dashboardManager->tableCountCommentsFilmSeenToValid();
            /* total comment signal by user */
            $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
            /* total comment film signal by user */
            $countCommentsFilmSeenSignal = $dashboardManager->tableCountCommentsFilmSeenSignal();
            /* nbr page / nbr comment */
            $nbPages = $dashboardManager -> nbPagesBoardComments();
            /* rules */
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                $cPage=$_GET['p'];
            }
            else{
                $cPage=1;
            }
            /* get comments */
            $comments = $dashboardManager -> getComments($cPage);
            /* get comments films */
            $commentsFilm = $dashboardManager -> getCommentsFilm($cPage);



            require('view/frontend/dashboard.php');
        }

        /* * delete comment blog * */
        public function delete_Comment($commentId){
            $dashboardManager = new ced\stream\model\DashboardManager;       
            $affectedLines = $dashboardManager -> deleteComment($commentId);    
            /* rules */
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le commentaire !');
            }
            else {
            header('Location:index.php?page=dashboard&p=1');
            }
        }

        /* * delete comment film * */
        public function delete_CommentFilm($commentId){
            $dashboardManager = new ced\stream\model\DashboardManager;       
            $affectedLines = $dashboardManager -> deleteCommentFilm($commentId);    
            /* rules */
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le commentaire !');
            }
            else {
            header('Location:index.php?page=dashboard&p=1');
            }
        }

        /* *update comment blog validation * */
        public function update_ValidComment($commentId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            $affectedLines = $dashboardManager -> updateComments($commentId);    
            
            if ($affectedLines === false) {
                throw new Exception('Impossible de update le commentaire !');
            }
            else {
            header('Location:index.php?page=dashboard&p=1');
            }
        }

        /* *update comment film validation * */
        public function update_ValidCommentFilm($commentId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            $affectedLines = $dashboardManager -> updateCommentsFilm($commentId);    
            
            if ($affectedLines === false) {
                throw new Exception('Impossible de update le commentaire !');
            }
            else {
            header('Location:index.php?page=dashboard&p=1');
            }
        }
        
    /* ** Part  publication ** */
        public function publications(){
            $dashboardManager = new ced\stream\model\DashboardManager;
        /* * count * */
            /* total admins */
            $countAdmins = $dashboardManager->tableCountAdmins();
            /* total comment */
            $countComments = $dashboardManager->tableCountComments();
            /* total posts */
            $countPosts = $dashboardManager->tableCountPosts();
            /* total post publish */
            $countPostsPublish = $dashboardManager->tableCountPostsPublish();
            /* total post no publish */
            $countPostsNoPublish = $dashboardManager->tableCountPostsNoPublish();
            /* nbr page / nbr comment */
            $nbPages = $dashboardManager -> nbPagesBoardPosts();
            /* rules */
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                $cPage=$_GET['p'];
            }
            else{
                $cPage=1;
            }
            /* getPost */
            $posts = $dashboardManager -> getPosts($cPage);

            require('view/frontend/publications.dash.php');
        }

        /* * update no publish post * */
        public function updapte_NoPublishPost($postId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            /* update bbd */
            $affectedLines = $dashboardManager -> updatePostNoPublish($postId);    
            /* rules */
            if ($affectedLines === false) {
                throw new Exception('Impossible de retirer la publication !');
            }
            else {
                header('Location:index.php?page=publications.dash&p=1');
            }
        }

        /* * update publish post * */
        function updapte_PublishPost($postId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            /* update bbd */
            $affectedLines = $dashboardManager -> updatePostPublish($postId);    
            /* rules */
            if ($affectedLines === false) {
                throw new Exception('Impossible de publier l\' article !');
            }
            else {
                header('Location:index.php?page=publications.dash&p=1');
            }
        }
        /* *delete post and comment from the post * */
        public function delete_Post($postId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            /* delete post */
            $affectedLines = $dashboardManager -> deletePost($postId);
            /* delete comment */
            $affectedLines = $dashboardManager -> deleteCommentsWithPost($postId);
            
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer l\' article !');
            }
            else {
                header('Location:index.php?page=publications.dash&p=1');
            }
                
        }
    /* ** part admin ** */
        public function admins(){
            $dashboardManager = new ced\stream\model\DashboardManager;
        /* * count * */
            /* total admins */
            $countAdmins = $dashboardManager->tableCountAdminsUsers();
            
            /* total comment */
            $countComments = $dashboardManager->tableCountComments();
            /* total posts */
            $countPosts = $dashboardManager->tableCountPosts();
            /* total admins */
            $countAdmin = $dashboardManager->tableCountAdmins();
            /* total users */
            $countUsers = $dashboardManager->tableCountUsers();
            
            /* nbr page / nbr comment */
            $nbPages = $dashboardManager -> nbPagesBoardAdmins();
            /* rules */
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                $cPage=$_GET['p'];
            }
            else{
                $cPage=1;
            }
            /*data of admin table */
            $datasAdmin = $dashboardManager->selectAdmins($cPage);
            /*data of user table */
            $datasUser = $dashboardManager->selectUsers($cPage);

            require('view/frontend/admins.dash.php');
        }
        /* * delete admin * */
        public function delete_Admin($adminId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            /* delete */
            $affectedLines=$dashboardManager->deleteAdmin($adminId);
            /* rules */
            if ($affectedLines == false) {
                throw new Exception('Impossible de supprimer l\' article !');
            }
            else {
                header('Location:index.php?page=admins.dash&p=1');
            }
        }

         /* * delete user * */
         public function delete_User($userId){
            $dashboardManager = new ced\stream\model\DashboardManager;
            /* delete */
            $affectedLines=$dashboardManager->deleteUser($userId);
            /* rules */
            if ($affectedLines == false) {
                throw new Exception('Impossible de supprimer l\' article !');
            }
            else {
                header('Location:index.php?page=admins.dash&p=1');
            }
        }
    }

/* *** page post view post in backend *** */

    class Post{
        function get_Post(){
            $postAdmin=new ced\stream\model\PostAdminManager;
            /*get post*/
            $post = $postAdmin->getPosts($_GET['id']);
            if ($post == false) {
                throw new Exception('Ce n\'est pas la bonne page');
            }
            else{
                require('view/frontend/adminpost.php');
            }
        }
    }

/* *** modification of post article *** */

    class ModifPost{
    /* ** get post for modification ** */
        function get_Post(){
            $postAdmin=new ced\stream\model\PostAdminManager;
            /* get post */
            $post = $postAdmin->getPosts($_GET['id']);
            /*  rules  */
            if ($post == false) {
                throw new Exception('Ce n\'est pas la bonne page');
            }
            else {
                require('view/frontend/modifpost.php');
            }       
        }

    /* ** update modification of post ** */    
        function modif_Post($postId, $title, $content, $posted){
            $modifUpdatePost=new ced\stream\model\ModifPostManager();
            $affectedLines = $modifUpdatePost->modifPost($postId, $title, $content, $posted);
            
            header('Location:index.php?page=publications.dash&p=1');
        }
    }

/* *** deconnexion *** */

    class Deconnexion{
        public function deconnexionBackend(){
            unset($_SESSION['admin']['email']);
            unset($_SESSION['admin']['pseudo']);
            header('Location:../index.php?page=home');
        }
    }

/* *** page writte a article *** */

    class AddArticle{
        function writte(){
            require('view/frontend/writte.php');
        }
        /* inset data to bbd */
        function post_Post($title, $content,$writer, $image, $posted){
            $postManager=new ced\stream\model\WritteManager;
            $affectedLines = $postManager->postPost($title, $content,$writer, $image, $posted);
            
            if ($affectedLines === false) {
                throw new Exception('Impossible d\' ajouter l\' article !');
            }
            else {
                header('Location:index.php?page=publications.dash&p=1');
        }   }
    }

/* ***  page configuration *** */
    class Configuration{
        function config(){
        
            require('view/frontend/config.php');
        }
        public function add_Admins($name,$pseudo,$email,$password){
            $configManager=new ced\stream\model\ConfigManager();
            $affectedLines = $configManager->addAdmins($name,$pseudo,$email,$password);
            header('Location:index.php?page=admins.dash');
        }
        public function verifConfig($pseudo,$email){
            $configManager=new ced\stream\model\ConfigManager();
            $data = $configManager->selectAdmins($pseudo,$email);
            
            return $data;
        }
    }