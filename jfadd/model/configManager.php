<?php
/*page configuration manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

class configManager extends Manager{
    /*select admins dor dashboard admins*/
    public function selectAdmins($pseudo,$email){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT admins.pseudo, admins.email FROM admins WHERE admins.pseudo=? or admins.email=?");
        $req->execute(array($pseudo,$email));
        $data=$req->fetch();

        return $data;
    }
    /*add admins validation*/
    public function addAdmins($name,$pseudo,$email,$password){
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $db=$this->dbConnect();
        $admins = $db->prepare("INSERT INTO admins (admins.name, admins.pseudo, admins.email, admins.password,admins.date)
         VALUES (?, ?, ?, ?, NOW() )");
        $affectedLines = $admins->execute(array($name,$pseudo,$email,$pass_hache));

        return $affectedLines;
    }
}