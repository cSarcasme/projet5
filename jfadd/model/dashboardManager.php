<?php
/*page all dashboard manager(publication+comment+admins)*/
namespace ced\stream\model;

require_once("model/manager.php");

    class DashboardManager extends Manager{

        private $perPage = 30;
        private $cPage = 1;
/*part comments */
        /*count nbr comments total on the website */
        public function tableCountComments(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT SUM( somme ) as idComments FROM ( SELECT COUNT( id ) somme FROM comments
            UNION ALL SELECT COUNT( id ) somme FROM comments_film)table_temp;');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments valid by admins in dashboard*/
        public function tableCountCommentsSeen(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="1"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments valid by admins in dashboard*/
        public function tableCountCommentsFilmSeen(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments_film WHERE comments_film.seen="1"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments valid by admins in dashboard*/
        public function tableCountCommentsSeenToValid(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments valid by admins in dashboard*/
        public function tableCountCommentsFilmSeenToValid(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments_film WHERE comments_film.seen="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments reported by user in tableau de bdashboard*/
        public function tableCountCommentsSeenSignal(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="2"');
            $nbr = $req -> fetch();
            return $nbr;
        }
         /*count nbr comments valid by admins in dashboard*/
         public function tableCountCommentsFilmSeenSignal(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments_film WHERE comments_film.seen="2"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /* get comments*/
        public function getComments($cPage){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT comments.id, comments.name, comments.email, comments.comment, comments.post_id, comments.date, comments.seen, posts.title 
            FROM comments JOIN posts ON comments.post_id = posts.id WHERE comments.seen="0" OR comments.seen="2"  ORDER BY comments.date DESC LIMIT '.(($cPage-1)*$this->perPage).", $this->perPage");
            
            return $req;
        }
        /* get comments film*/
        public function getCommentsFilm($cPage){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT comments_film.id, comments_film.name, comments_film.comment, comments_film.date, films.title,comments_film.seen,comments_film.email 
            FROM comments_film JOIN films ON comments_film.film_id = films.id WHERE comments_film.seen="0" OR comments_film.seen="2"  ORDER BY comments_film.date DESC LIMIT '.(($cPage-1)*$this->perPage).", $this->perPage");
            
            return $req;
        }
        /*delete comments*/
        public function deleteComment($commentId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM comments WHERE comments.id=?');
            $req->execute(array($commentId));
            
            return $req;
        }
        /*delete comments film*/
        public function deleteCommentFilm($commentId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM comments_film WHERE comments_film.id=?');
            $req->execute(array($commentId));
            
            return $req;
        }
        /*delete comments with post*/
        public function deleteCommentsWithPost($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM comments WHERE comments.post_id =?');
            $req->execute(array($postId));
            
            return $req;
        }
        /*update comments blog*/
        public function updateComments($commentId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   comments SET comments.seen = "1" WHERE comments.id=?');
            $req->execute(array($commentId));
            
            return $req;
        }
        /*update comments film*/
        public function updateCommentsFilm($commentId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE comments_film SET comments_film.seen = "1" WHERE comments_film.id=?');
            $req->execute(array($commentId));
            
            return $req;
        }
        /*pagination comments board*/
        public function nbPagesBoardComments(){
            $countComments= $this->tableCountComments();
            $nbrArt = $countComments['idComments'] ;
            $nbPages = ceil($nbrArt/$this->perPage);
            return$nbPages;
        }

/*part post */
        /*count nbr post  total*/
        public function tableCountPosts(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr post publish  total*/
        public function tableCountPostsPublish(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts WHERE posts.posted="1"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr post no publish  total*/
        public function tableCountPostsNoPublish(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts WHERE posts.posted="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*get posts article*/
        public function getPosts($cPage){
            
            $db = $this-> dbConnect();       
            $req =$db->query('SELECT posts.id, posts.title, posts.content, posts.posted, posts.date, admins.name
            FROM posts JOIN admins ON posts.writter = admins.email WHERE posts.posted="0" OR posts.posted="1"  ORDER BY posts.date DESC LIMIT '.(($cPage-1)*$this->perPage).", $this->perPage");
            
            return $req;
        }
        /*delete post article*/
        public function deletePost($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM posts WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }
        /*update post article publish*/
        public function updatePostPublish($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   posts SET posts.posted = "1" WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }
        /*update post article no publish*/
        public function updatePostNoPublish($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   posts SET posts.posted = "0" WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }
        /*pagination publications board*/
        public function nbPagesBoardPosts(){
            $countPosts= $this->tableCountPosts();
            $nbrArt = $countPosts['idPosts'] ;
            $nbPages = ceil($nbrArt/$this->perPage);
            return$nbPages;
        }

/*part admins */
    /*count nbr Admins*/
    public function tableCountAdmins(){
        $db = $this -> dbConnect();
        $req =$db->query('SELECT COUNT(id)as idAdmins FROM admins');
        $nbr = $req -> fetch();
        return $nbr;
    }
    /*count nbr Admins*/
    public function tableCountUsers(){
        $db = $this -> dbConnect();
        $req =$db->query('SELECT COUNT(id)as idUsers FROM users');
        $nbr = $req -> fetch();
        return $nbr;
    }
    /*count nbr Admins + users*/
    public function tableCountAdminsUsers(){
        $db = $this -> dbConnect();
        $req =$db->query('SELECT SUM( somme ) as idAdmins FROM ( SELECT COUNT( id ) somme FROM admins
        UNION ALL SELECT COUNT( id ) somme FROM users)table_temp;');
        $nbr = $req -> fetch();
        return $nbr;
    }
    /*get admins*/
    public function selectAdmins($cPage){
        $db=$this->dbConnect();
        $req = $db->query("SELECT admins.id, admins.name, admins.pseudo, admins.email, admins.date FROM admins
        ORDER BY admins.date DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");

        return $req;
    }
    /*get users*/
    public function selectUsers($cPage){
        $db=$this->dbConnect();
        $req = $db->query("SELECT users.id, users.name, users.pseudo, users.email, users.date FROM users 
        ORDER BY users.date DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");

        return $req;
    }
    /*delete admin article*/
    public function deleteAdmin($adminId){
    $db = $this-> dbConnect();
    $req =$db->prepare('DELETE  FROM admins WHERE admins.id=?');
    $req->execute(array($adminId));
    
    return $req;
    }

     /*delete admin article*/
     public function deleteUser($userId){
        $db = $this-> dbConnect();
        $req =$db->prepare('DELETE  FROM admins WHERE admins.id=?');
        $req->execute(array($adminId));
        
        return $req;
    }

    /*pagination publications board*/
    public function nbPagesBoardAdmins(){
        $countPosts= $this->tableCountAdminsUsers();
        $nbrArt = $countPosts['idAdmins'] ;
        $nbPages = ceil($nbrArt/$this->perPage);
        return$nbPages;
    }
}