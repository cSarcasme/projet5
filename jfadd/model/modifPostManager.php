<?php
/*page modification article manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

class modifPostManager extends Manager{
    /*modification of post*/
    public function modifPost($postId, $title, $content, $posted){
        $db=$this->dbConnect();
        $req = $db->prepare("UPDATE posts SET posts.title = ?, posts.content = ?, 
         posts.date = NOW(), posts.posted = ? WHERE posts.id = ?");
        $req->execute(array($title, $content, $posted, $postId));

        return $req;
    }
}