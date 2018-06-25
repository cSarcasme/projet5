<?php
/*page add dashboard manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

    class infoManager extends Manager{
    
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

        public function getLinksFilmVf($title){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT  filmlinks.id, filmlinks.language, filmlinks.mango, filmlinks.open, filmlinks.oza, filmlinks.rapi, filmlinks.upto,
             filmlinks.nc FROM filmlinks WHERE filmlinks.titleL = ? AND filmlinks.language ='Vf'");
             $req->execute(array($title));

            $result = $req ->fetch();
            
             return $result;    
        }


        public function getLinksFilmVo($title){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT  filmlinks.id, filmlinks.language, filmlinks.mango, filmlinks.open, filmlinks.oza, filmlinks.rapi, filmlinks.upto,
             filmlinks.nc FROM filmlinks WHERE filmlinks.titleL = ? AND filmlinks.language ='Vo'");
             $req->execute(array($title));

            $result = $req ->fetch();
            
             return $result;    
        }

        /*update link film vf*/
        public function updateLinksFilmVf($title,$mango,$open,$oza,$rapi,$upto,$nc){
            $db=$this->dbConnect();
            $req = $db->prepare("UPDATE filmlinks SET filmlinks.mango = ? , filmlinks.open = ? , filmlinks.oza = ?,
             filmlinks.rapi = ?,filmlinks.upto = ?, filmlinks.nc = ? WHERE filmlinks.titleL = ? AND filmlinks.language ='Vf'");
            $affectedLines = $req->execute(array($mango,$open,$oza,$rapi,$upto,$nc,$title));

            return $affectedLines;    
        }

        /*update link film vo*/
        public function updateLinksFilmVo($title,$mango,$open,$oza,$rapi,$upto,$nc){
            $db=$this->dbConnect();
            $req = $db->prepare("UPDATE filmlinks SET filmlinks.mango = ? , filmlinks.open = ? , filmlinks.oza = ?,
             filmlinks.rapi = ?,filmlinks.upto = ?, filmlinks.nc = ? WHERE filmlinks.titleL = ? AND filmlinks.language ='Vo'");
            $affectedLines = $req->execute(array($mango,$open,$oza,$rapi,$upto,$nc,$title));

            return $affectedLines;    
        }

        /*insert link film*/
        public function addLinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
            $db=$this->dbConnect();
            $req = $db->prepare("INSERT INTO filmlinks (filmlinks.titleL,filmlinks.language, filmlinks.mango, filmlinks.open, filmlinks.oza, filmlinks.rapi, 
            filmlinks.upto, filmlinks.nc) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $affectedLines = $req->execute(array($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc));

            return $affectedLines;    
        }
    }
