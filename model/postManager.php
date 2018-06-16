<?php
/*manager of the page post*/
namespace ced\stream\model;

require_once("model/manager.php");

class postManager extends Manager{
    /*get post chapters info*/
    public function getPosts($postId){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT posts.id,posts.title,posts.image,posts.date,posts.content,admins.name FROM posts JOIN admins
        ON posts.writer=admins.email WHERE posts.id= ? AND posts.posted='1' ");
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}