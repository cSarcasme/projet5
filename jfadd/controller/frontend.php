<?php

require_once('model/loginManager.php');
require_once('model/dashboardManager.php');
require_once('model/writteManager.php');
require_once('model/postAdminManager.php');
require_once('model/modifPostManager.php');
require_once('model/configManager.php');
require_once('model/mediaManager.php');
require_once('model/infoManager.php');



/*page login*/
    function login(){
        class login{
            public function submitLogin($email,$pseudo){
                $loginManager = new ced\Blog\projet4\loginManager(); 
                $result = $loginManager->is_Admin($email,$pseudo);
                return $result;
            }
        }    
    require('view/frontend/login.php');
    }
/* *** all media dashboard *** */

    /* ** page series ** */
        function addSeries(){

            $mediaManager = new ced\Blog\projet4\mediaManager;
            /*count nbr films in bbd*/
            $countFilms = $mediaManager->countFilms();
            /*count nbr series in bbd*/
            $countSeries = $mediaManager->countSeries();
            /*pagination*/
            $nbPages = $mediaManager->nbPagesSeries();
            if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
                $cPage=$_GET['p'];
            }
            else{
                $cPage=1;
            }
            
            /*get Series in bbd */
            if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] ){
                $postSeries = $mediaManager -> getSeriesSearch($_POST['search'],$cPage);
            }
            else{
                $postSeries = $mediaManager -> getSeries($cPage);
            }
            
        
            require('view/frontend/addSeries.php');
        }

        /*add series info to bbd*/
        function add_Series($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> addSeries($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops); 
                
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les informations de la serie !');
            }
            else {
            header('Location:index.php?page=addSeries&p=1');
            }
        }

        /*update Serie into bbd*/
        function update_Serie($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$serieId){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> updateSerie($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$serieId);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible de modifier les informations de la serie !');
            }
            else {
            header('Location:index.php?page=addSeries&p=1');
            }
        }

        /*add link serie into bbd*/
        function add_LinkSerie($season,$episode,$title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> addLinkSerie($season,$episode,$title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les liens de la serie !');
            }
            else {
            header('Location:index.php?page=addSeries&p=1');
            }
        }

    /* ** page movies ** */
        function films(){
            
            $mediaManager = new ced\Blog\projet4\mediaManager;
            /*count nbr films in bbd*/
            $countFilms = $mediaManager->countFilms();
            /*count nbr seies in bbd*/
            $countSeries = $mediaManager->countSeries();
            /*pagination*/
            $nbPages = $mediaManager->nbPagesFilms();
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
        function add_Film($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> addFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops); 
                
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les informations du film !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }
        }

        /*update movie into bbd*/
        function update_Film($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> updateFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible de modifier les informations du film !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }
        }

        /*add link movie into bbd*/
        function add_LinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> addLinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible d \' ajouter les liens du film !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }
        }
        /*delete movie +links in bbd*/
        function delete_Film($title){
            $mediaManager = new ced\Blog\projet4\mediaManager;
            $affectedLines = $mediaManager -> deleteFilm($title);
            $affectedLines = $mediaManager -> deleteFilmLinks($title);
        
            if ($affectedLines === false) {
                throw new Exception('Impossible de supprimer le film et ces liens !');
            }
            else {
            header('Location:index.php?page=addFilms');
            }           
        }

    /* ** page animé ** */
        function addAnimés(){
            $mediaManager = new ced\Blog\projet4\mediaManager; 
                        
            require('view/frontend/addAnimes.php');
        }


/* *** all page info *** */

    /* ** page movies info ** */
        function moviesInfo(){

            /* add link movie into bbd */
            function add_LinkFilmInfo($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines = $infoManager -> addLinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);
            
                if ($affectedLines === false) {
                    throw new Exception('Impossible d \' ajouter les liens du film !');
                }
                else {
                header("Location:index.php?page=moviesInfo&title=$title");
                }
            }

            /* update link movie vf in bbd */
            function update_LinksFilmVf($title,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines =  $infoManager -> updateLinksFilmVf($title,$mango,$open,$oza,$rapi,$upto,$nc);

                if ($affectedLines === false) {
                    throw new Exception('Impossible de mettre a jour les liens du film vf !');
                }
                else {
                header("Location:index.php?page=moviesInfo&title=$title");
                }
            }

            /* update link movie vo in bbd */
            function update_LinksFilmVo($title,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines =  $infoManager -> updateLinksFilmVo($title,$mango,$open,$oza,$rapi,$upto,$nc);

                if ($affectedLines === false) {
                    throw new Exception('Impossible de mettre a jour les liens du film vo !');
                }
                else {
                header("Location:index.php?page=moviesInfo&title=$title");
                }
            }

            $infoManager = new ced\Blog\projet4\infoManager;
            /*get movie info from bbd */
            $movie = $infoManager -> getFilm($_GET['title']);
            /*get movie link vf from bbd */
            $linkVf = $infoManager -> getLinksFilmVf($_GET['title']);
            /*get movie link vo from bbd */
            $linkVo = $infoManager -> getLinksFilmVo($_GET['title']);
            
            require('view/frontend/infoMovies.php');
        }

    /* ** page series info ** */
        function seriesInfo(){
            /* add link movie into bbd */
            function add_LinkSerieInfo($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines = $infoManager -> addLinkSerie($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);
            
                if ($affectedLines === false) {
                    throw new Exception('Impossible d \' ajouter les liens du film !');
                }
                else {
                header("Location:index.php?page=seriesInfo&title=$title");
                }
            }

            /* update link movie vf in bbd */
            function update_LinksSerieVf($title,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines =  $infoManager -> updateLinksSerieVf($title,$mango,$open,$oza,$rapi,$upto,$nc);

                if ($affectedLines === false) {
                    throw new Exception('Impossible de mettre a jour les liens du film vf !');
                }
                else {
                header("Location:index.php?page=seriesInfo&title=$title");
                }
            }

            /* update link movie vo in bbd */
            function update_LinksSerieVo($title,$mango,$open,$oza,$rapi,$upto,$nc){
                $infoManager = new ced\Blog\projet4\infoManager;
                $affectedLines =  $infoManager -> updateLinksSerieVo($title,$mango,$open,$oza,$rapi,$upto,$nc);

                if ($affectedLines === false) {
                    throw new Exception('Impossible de mettre a jour les liens du film vo !');
                }
                else {
                header("Location:index.php?page=seriesInfo&title=$title");
                }
            }

            $infoManager = new ced\Blog\projet4\infoManager;
            /*get movie info from bbd */
            $serie = $infoManager -> getSerie($_GET['title']);
            /*get movie link vf from bbd */
            if(isset($_POST['season']) && !empty($_POST['episode'])){
                $linkVf = $infoManager -> getLinksSerieVf($_GET['title'],$_POST['season'],$_POST['episode']);
            }
            else{
                $linkVf = $infoManager -> getLinksSerieVfOpen($_GET['title']);
            }
            /*get movie link vo from bbd */
            $linkVo = $infoManager -> getLinksSerieVo($_GET['title']);
        
            require('view/frontend/infoSeries.php');
        }
/* page center of dashboard with comment*/
    function dashboard(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        /*comments*/
        $countComments = $dashboardManager->tableCountComments();
        $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
        $tableCountCommentsSeenToValid = $dashboardManager->tableCountCommentsSeenToValid();
        $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
        $nbPages = $dashboardManager -> nbPagesBoardComments();
        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
            $cPage=$_GET['p'];
        }
        else{
            $cPage=1;
        }
        $comments = $dashboardManager -> getComments($cPage);

        require('view/frontend/dashboard.php');
    }
    /*delete comment*/
    function deleteComment($commentId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> deleteComment($commentId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        }
        else {
        header('Location:admin.php?page=dashboard');
        }
    }
    /*update comment validation*/
    function updateValidComment($commentId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updateComments($commentId);    
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de update le commentaire !');
        }
        else {
        header('Location:admin.php?page=dashboard');
        }
    }
/*page publication of dashboard*/
    function publications(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        /*comment*/
        $countComments = $dashboardManager->tableCountComments();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        $countPostsPublish = $dashboardManager->tableCountPostsPublish();
        $countPostsNoPublish = $dashboardManager->tableCountPostsNoPublish();
        $nbPages = $dashboardManager -> nbPagesBoardPosts();
        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
            $cPage=$_GET['p'];
        }
        else{
            $cPage=1;
        }
        $posts = $dashboardManager -> getPosts($cPage);

        require('view/frontend/publications.dash.php');
    }
    /*update no publish post */
    function updapteNoPublishPost($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updatePostNoPublish($postId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de retirer la publication !');
        }
        else {
            header('Location:admin.php?page=publications.dash&p=1');
        }
    }
    /*update publish post */
    function updaptePublishPost($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updatePostPublish($postId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de publier l\' article !');
        }
        else {
            header('Location:admin.php?page=publications.dash&p=1');
        }
    }
    /*delete post and comment from the post*/
    function delete_Post($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> deletePost($postId);
        $affectedLines = $dashboardManager -> deleteCommentsWithPost($postId);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer l\' article !');
        }
        else {
            header('Location:admin.php?page=publications.dash&p=1');
        }
            
    }
/*page admins of dashboard*/
    function admins(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();

        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        $datas = $dashboardManager->selectAdmins();
        /*comment*/
        $countComments = $dashboardManager->tableCountComments();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        

        require('view/frontend/admins.dash.php');
    }
    /* delete admin*/
    function deleteAdmin($adminId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines=$dashboardManager->deleteAdmins($adminId);

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer l\' article !');
        }
        else {
            header('Location:admin.php?page=admins.dash');
        }
    }
/*page  post view of file admin*/
    function adminPost(){
        $postAdmin=new ced\Blog\projet4\postAdminManager();
        $post = $postAdmin->getPosts($_GET['id']);

        if ($post == false) {
            throw new Exception('Ce n\'est pas la bonne page');
        }
        else {
            require('view/frontend/adminpost.php');
        }

        
    }
/*page modif article view*/
    function modifPost(){
        $postAdmin=new ced\Blog\projet4\postAdminManager();
        $post = $postAdmin->getPosts($_GET['id']);

        if ($post == false) {
            throw new Exception('Ce n\'est pas la bonne page');
        }
        else {
            require('view/frontend/modifpost.php');
        }       
    }
    function modif_Post($postId, $title, $content, $posted){
        $modifUpdatePost=new ced\Blog\projet4\modifPostManager();
        $affectedLines = $modifUpdatePost->modifPost($postId, $title, $content, $posted);
        
        header('Location:admin.php?page=publications.dash&p=1');
    }
/*page deconnexion*/
    function deconnexion(){
        require('view/frontend/deconnexion.php');
    }
/* page writte a article */
    function writte(){
        require('view/frontend/writte.php');
    }   
    function post_Post($title, $content,$writer, $image, $posted){
        $postManager=new ced\Blog\projet4\writteManager();
        $affectedLines = $postManager->postPost($title, $content,$writer, $image, $posted);
        
        header('Location:admin.php?page=publications.dash&p=1');
    }
/* page configuration */
    function config(){
        class config{
            public function verifConfig($pseudo,$email){
                $configManager=new ced\Blog\projet4\configManager();
                $data = $configManager->selectAdmins($pseudo,$email);
                
                return $data;
            }
        }

        function add_Admins($name,$pseudo,$email,$password){
            $configManager=new ced\Blog\projet4\configManager();
            $affectedLines = $configManager->addAdmins($name,$pseudo,$email,$password);
            header('Location:admin.php?page=admins.dash');
        }
        require('view/frontend/config.php');
    }