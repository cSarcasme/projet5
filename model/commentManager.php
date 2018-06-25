<?php
/*manager of the page comment*/
namespace ced\stream\model;

require_once("model/manager.php");

class CommentManager extends Manager{

/* ** comments Blog ** */

    /*inset comment*/
    public function postComment($postId, $name, $email, $comment){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(comments.post_id, comments.name, comments.email, comments.comment, comments.date)
         VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $name, $email, $comment));

        return $affectedLines;
    }
    /*get comments info*/
    public function getComments($postId){
        $db = $this->dbConnect();
        $comments=$db->prepare("SELECT comments.id, comments.name, comments.email, comments.comment ,comments.seen FROM comments 
        WHERE comments.post_id=? ORDER BY comments.date DESC LIMIT 0,10");  
        
        $comments->execute(array($postId));

        return $comments;
    }
    /*update comments signal abuse*/
    public function updateComment($post_id){
        $db = $this-> dbConnect();
        $req =$db->prepare('UPDATE   comments SET comments.seen = "2" WHERE comments.id=?');
        $req->execute(array($post_id));
        
        return $req;
    }

/* ** comment Films ** */

    /*insert comments_film*/
    public function postCommentFilm($filmId, $name, $email, $comment, $image){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments_film(comments_film.film_id, comments_film.name, comments_film.email, comments_film.comment,
         comments_film.image, comments_film.date) VALUES(?, ?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($filmId, $name, $email, $comment,$image));

        return $affectedLines;
    }
    /*get comments_film info*/
    public function getCommentsFilm($filmId){
        $db = $this->dbConnect();
        $comments=$db->prepare("SELECT comments_film.id, comments_film.name, comments_film.email, comments_film.comment ,comments_film.seen,
        comments_film.image FROM comments_film WHERE comments_film.film_id=? ORDER BY comments_film.date DESC LIMIT 0,10");  
        
        $comments->execute(array($filmId));

        return $comments;
    }
    /*update comments_film signal abuse*/
    public function updateCommentFilm($filmId){
        $db = $this-> dbConnect();
        $req =$db->prepare('UPDATE   comments_film SET comments_film.seen = "2" WHERE comments_film.id=?');
        $req->execute(array($filmId));
        
        return $req;
    }
}