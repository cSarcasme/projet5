<?php
/*manager of the page home*/
namespace ced\stream\model;

require_once("model/manager.php");

class homeManager extends Manager{
    /*get post 3 chapters info*/
    public function getfilms(){
        $db=$this->dbConnect();
        $req = $db->query("SELECT films.id, films.title,films.gender, films.year, films.synopsis, films.image, films.date, films.note FROM films
         ORDER BY films.date DESC LIMIT 0,15");

        return $req;
    }
}