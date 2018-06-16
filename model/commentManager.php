<?php
/*manager of the page comment*/
namespace ced\stream\model;

require_once("model/manager.php");

class commentManager extends Manager{
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
}