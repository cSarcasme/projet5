<?php
/*page configuration manager*/
namespace ced\stream\model;

require_once("model/manager.php");

class InscriptionManager extends Manager{
    /*select users for pseudo and email verification if exist in bbd*/
    public function IfExist($pseudo,$email){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT users.pseudo, users.email FROM users WHERE users.pseudo=? or users.email=?");
        $req->execute(array($pseudo,$email));
        $data=$req->fetch();

        return $data;
    }
    /*add users validation*/
    public function addUser($name,$pseudo,$email,$password,$image){
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $db=$this->dbConnect();
        $users = $db->prepare("INSERT INTO users (users.name, users.pseudo, users.email, users.password,users.image, users.date)
         VALUES (?, ?, ?, ?, ?, NOW() )");
        $affectedLines = $users->execute(array($name,$pseudo,$email,$pass_hache,$image));

        return $affectedLines;
    }
}