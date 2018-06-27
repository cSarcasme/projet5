<?php
/*page post admin manager*/
namespace ced\stream\model;

require_once("model/manager.php");

class PostAdminManager extends Manager{
    /*get post for admin post*/
    public function getPosts($postId){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT posts.id,posts.title,posts.image,posts.date,posts.content,admins.name FROM posts JOIN admins
        ON posts.writter=admins.email WHERE posts.id= ? AND (posts.posted='1' OR posts.posted='0') ");
        $req->execute(array($postId));
        $result = $req->fetch();

        return $result;
    }
}