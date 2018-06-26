<?php
/*page login manager*/
namespace ced\stream\model;

require_once("model/manager.php");

class ConfigurationManager extends Manager{
    /*verification is  login exist*/
    public function isEmail($email){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT users.password FROM users WHERE users.email = ?  ');
        $req->execute(array($email));
        $result=$req->fetch();
        
        return $result;    
    }

    /*update info users*/
    public function updateUser($name,$pseudo,$image,$email){
        $db = $this-> dbConnect();
        $req =$db->prepare('UPDATE   users SET users.name = ?, users.pseudo= ?, users.image = ? WHERE users.email=?');
        $req->execute(array($name,$pseudo,$image,$email));
        
        return $req;
    }
}