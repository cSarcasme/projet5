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

/* *** part Series *** */

        /*count nbr films total*/
        public function countSeries(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idSeries FROM series');
            $nbr = $req -> fetch();
            
            return $nbr;
        }

        /*insert in series info*/
        public function addSeries($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops){
            $db=$this->dbConnect();
            $req = $db->prepare("INSERT INTO series ( series.title, series.kind , series.datesortie , series.image, 
            series.note, series.bandeannonce, series.production, series.acteur, series.date, series.synopsis)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
            $affectedLines = $req->execute(array($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops));

            return $affectedLines;    
        }

        /*get Series*/
        public function getSeries($cPage){
            $db=$this->dbConnect();
            $req = $db->query("SELECT * FROM series ORDER BY series.date
            DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");

            
            return $req;
        }

        /*update Serie info*/
        public function updateSerie($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$serieId){
            $db=$this->dbConnect();
            $req = $db->prepare("UPDATE series SET series.title = ?, series.kind = ?, series.datesortie = ?,
            series.image = ?, series.note = ?, series.bandeannonce = ?, series.production = ?, series.acteur = ?, series.synopsis = ?,
            series.date= NOW() WHERE series.id = ?");
            $affectedLines = $req->execute(array($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$serieId));

            return $affectedLines;    
        }

        /*insert link film*/
        public function addLinkSerie($season,$episode,$title,$lang,$mango,$open,$oza,$rapi,$upto,$nc){
            $db=$this->dbConnect();
            $req = $db->prepare("INSERT INTO serielinks (serielinks.season, serielinks.episode,serielinks.titleL,serielinks.language, serielinks.mango, serielinks.open, serielinks.oza, serielinks.rapi, 
            serielinks.upto, serielinks.nc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $affectedLines = $req->execute(array($season,$episode,$title,$lang,$mango,$open,$oza,$rapi,$upto,$nc));

            return $affectedLines;    
        }

        /*get films*/
  /*      public function getLinksFilm(){
            $db=$this->dbConnect();
            $req = $db->query("SELECT serielinks.titleL, serielinks.mango, serielinks.open, serielinks.oza, serielinks.rapi, 
            serielinks.upto, serielinks.nc FROM serielinks ");

            return $req;
        }



        /*delete film*/
 /*       public function deleteFilm($title){
            $db=$this->dbConnect();
            $req = $db->prepare("DELETE FROM films  WHERE title=?");
            $affectedLines = $req->execute(array($title));

            return $affectedLines;    
        }

        /*delete film Links*/
 /*       public function deleteFilmLinks($title){
            $db=$this->dbConnect();
            $req = $db->prepare("DELETE FROM serielinks  WHERE titleL=?");
            $affectedLines = $req->execute(array($title));

            return $affectedLines;    
        }
        /*gets films for search */
        public function getSeriesSearch($term,$cPage){
            $db=$this->dbConnect();
            $req = $db->prepare("SELECT * FROM series WHERE title  LIKE ? ORDER BY series.date
            DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");
            $req->execute(array('%'.$term.'%'));

        return $req;
        }

        /*pagination page films */
        public function nbPagesSeries(){
            $countSeries= $this->countSeries();
            $nbrArt = $countSeries['idSeries'] ;
            $nbPages = ceil($nbrArt/$this->perPage);
            return$nbPages;
        }
    }