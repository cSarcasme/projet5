<?php
/*page login manager*/
namespace ced\stream\model;

require_once("model/manager.php");

class loginUserManager extends Manager{
    /*verification is  login exist*/
    public function isUser($email,$pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT users.name, users.pseudo, users.email, users.password,users.image
          FROM users WHERE  (users.email = ? OR users.pseudo = ?  ) ');
        $req->execute(array($email,$pseudo));
        $result=$req->fetch();
        
        return $result;    
    }
}