<?php
/*manager of the page post*/
namespace ced\stream\model;

require_once("model/manager.php");

class infoManager extends Manager{
/* ** info movies ** */

    /* select movies */
    public function getFilm($filmId){
        $db=$this->dbConnect();
        $req = $db->prepare("SELECT films.title, films.kind, films.datesortie,films.image, films.note,
         films.bandeannonce, films.production, films.acteur, films.synopsis FROM films  WHERE films.id = ? ");
         $req->execute(array($filmId));

        $result = $req ->fetch();
        
         return $result;    
    }

    /*get movies for slide*/
    public function getFilms(){
        $db=$this->dbConnect();
        $req = $db->query("SELECT films.id, films.title,films.synopsis, films.image,films.note FROM films  WHERE films.slide = '1' ");

        return $req;
    }

}