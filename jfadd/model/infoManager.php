<?php
/*page add dashboard manager*/
namespace ced\stream\model;

require_once("model/manager.php");

    class InfoManager extends Manager{
    
    /* ** info movies ** */
        /* select movie */
        public function getFilm($title){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT films.id, films.title, films.kind, films.datesortie, films.image,
             films.note, films.bandeannonce, films.production, films.acteur, films.synopsis FROM films WHERE films.title = ? ");
             $req->execute(array($title));

            $result = $req ->fetch();
            
             return $result;    
        }
    }
