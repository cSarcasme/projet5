<?php
/*manager of the page home*/
namespace ced\stream\model;

require_once("model/manager.php");

class HomeManager extends Manager{
    /*get movies*/
    public function getFilms(){
        $db=$this->dbConnect();
        $req = $db->query("SELECT  films.id, films.title, films.kind, films.datesortie, films.synopsis, films.image, films.date,
         films.note FROM films ORDER BY films.date DESC LIMIT 0,19");

        return $req;
    }

    public function getFilmsNote(){
        $db=$this->dbConnect();
        $req = $db->query("SELECT  films.id, films.title, films.kind, films.datesortie, films.synopsis, films.image, films.date,
         films.note FROM films ORDER BY films.note DESC LIMIT 0,12");

        return $req;
    }
    public function getFilmsAuto($term){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT  films.title FROM  films WHERE films.title LIKE :term");
        $req->execute(array('term' => '%'.$term.'%'));
        
        return $req;                
        
    }
   
}