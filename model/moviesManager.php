<?php
/*manager of the page movies*/
namespace ced\stream\model;

require_once("model/manager.php");

class Movies extends Manager{

    private $perPage = 24;
    private $cPage = 1;
    
    /*get movies for slide*/
    public function getFilms($cPage){
        $db=$this->dbConnect();
        $req = $db->query("SELECT films.id, films.title,films.synopsis, films.image,films.note FROM films  ORDER BY films.date 
        DESC LIMIT ".(($cPage-1)*$this->perPage).", $this->perPage");

        return $req;
    }
    /*count nbr films  total*/
    public function tableCountFilms(){
        $db = $this-> dbConnect();
        $req =$db->query('SELECT COUNT(id)as idMovie FROM films');
        $nbr = $req -> fetch();
        
        return $nbr;
    }
    /*retrurn nbr art/nbr article by page*/
    public function nbPagesBoardPosts(){
        $countPosts= $this->tableCountFilms();
        $nbrArt = $countPosts['idMovie'] ;
        $nbPages = ceil($nbrArt/$this->perPage);
        
        return$nbPages;
    }
}