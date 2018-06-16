<?php
/*page add dashboard manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

    class mediaManager extends Manager{
        /*insert in films info*/
        public function addFilm($imdb,$title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops){
            $db=$this->dbConnect();
            $req = $db->prepare("INSERT INTO films (films.imdb, films.title, films.kind , films.datesortie , films.tagline , films.image, 
            films.note, films.bandeannonce, films.production, films.acteur, films.date, films.synopsis)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
            $affectedLines = $req->execute(array($imdb,$title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops));

            return $affectedLines;    
        }

        /*get films*/
        public function getFilms(){
            $db=$this->dbConnect();
            $req = $db->query("SELECT films.imdb,films.id, films.title, films.kind , films.datesortie , films.tagline , films.image, 
            films.note, films.bandeannonce, films.production, films.acteur, films.synopsis FROM films ");

            
            return $req;
        }

        /*update film info*/
        public function updateFilm($title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops,$filmId){
            $db=$this->dbConnect();
            $req = $db->prepare("UPDATE films SET films.title = ?, films.kind = ?, films.datesortie = ?, films.tagline = ?,
             films.image = ?, films.note = ?, films.bandeannonce = ?, films.production = ?, films.acteur = ?, films.synopsis = ?,
             films.date= NOW() WHERE films.id = ?");
            $affectedLines = $req->execute(array($title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops,$filmId));

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

        /*get films*/
        public function getLinksFilm(){
            $db=$this->dbConnect();
            $req = $db->query("SELECT filmlinks.titleL, filmlinks.mango, filmlinks.open, filmlinks.oza, filmlinks.rapi, 
            filmlinks.upto, filmlinks.nc FROM filmlinks ");

            return $req;
        }
        
        

        /*delete film*/
        public function deleteFilm($title){
            $db=$this->dbConnect();
            $req = $db->prepare("DELETE FROM films  WHERE title=?");
            $affectedLines = $req->execute(array($title));

            return $affectedLines;    
        }

        /*delete film Links*/
        public function deleteFilmLinks($title){
            $db=$this->dbConnect();
            $req = $db->prepare("DELETE FROM filmlinks  WHERE titleL=?");
            $affectedLines = $req->execute(array($title));

            return $affectedLines;    
        }

        
    }