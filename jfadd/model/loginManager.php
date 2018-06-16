<?php
/*page login manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

class loginManager extends Manager{
    /*verification is  login exist*/
    public function is_Admin($email,$pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admins.name, admins.pseudo, admins.email, admins.password
          FROM admins WHERE  (admins.email = ? OR admins.pseudo = ?  ) ');
        $req->execute(array($email,$pseudo));
        $result=$req->fetch();
        
        return $result;    
    }
}