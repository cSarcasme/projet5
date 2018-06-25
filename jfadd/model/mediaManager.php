<?php
/*page add dashboard manager*/
namespace ced\Blog\projet4;

require_once("model/manager.php");

    class mediaManager extends Manager{

        private $perPage = 20;
        private $cPage = 1;
/* *** part movie *** */
        /*count nbr films total*/
        public function countFilms(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idFilms FROM films');
            $nbr = $req -> fetch();
            
            return $nbr;
        }

        /*insert in films info*/
        public function addFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops){
            $db=$this->dbConnect();
            $req = $db->prepare("INSERT INTO films ( films.title, films.kind , films.datesortie, films.image, 
            films.note, films.bandeannonce, films.production, films.acteur, films.date, films.synopsis)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
            $affectedLines = $req->execute(array($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops));

            return $affectedLines;    
        }

        /*get films*/
        public function getFilms($cPage){
            $db=$this->dbConnect();
            $req = $db->query("SELECT films.imdb,films.id, films.title, films.kind , films.datesortie  , films.image, 
            films.note, films.bandeannonce, films.production, films.acteur, films.synopsis FROM films ORDER BY films.date
            DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");

            
            return $req;                
            
        }

        public function getFilmsAuto($term){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT  films.title FROM  films WHERE films.title LIKE :term");
            $req->execute(array('term' => '%'.$term.'%'));
            
            return $req;                
            
        }

       
       
        /*update film info*/
        public function updateFilm($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId){
            $db=$this->dbConnect();
            $req = $db->prepare("UPDATE films SET films.title = ?, films.kind = ?, films.datesortie = ?,
             films.image = ?, films.note = ?, films.bandeannonce = ?, films.production = ?, films.acteur = ?, films.synopsis = ?,
             films.date= NOW() WHERE films.id = ?");
            $affectedLines = $req->execute(array($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$filmId));

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
        /*gets films for search */
        public function getFilmsSearch($term,$cPage){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT * FROM films WHERE title  LIKE ? ORDER BY films.date
            DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");
             $req->execute(array('%'.$term.'%'));

          return $req;
        }
        

        /*pagination page films */
        public function nbPagesFilms(){
            $countFilms= $this->countFilms();
            $nbrArt = $countFilms['idFilms'] ;
            $nbPages = ceil($nbrArt/$this->perPage);
            return$nbPages;
        }

    }