<?php

require_once('model/homeManager.php');
require_once('model/blogManager.php');
require_once('model/postManager.php');
require_once('model/commentManager.php');

/*page home */
    function home(){
        $filmManager=new ced\stream\model\homeManager();
        $postFilms = $filmManager->getfilms();

    require('view/frontend/home.php');
    }
/*page blog*/
    function blog(){
        

        require('view/frontend/blog.php');
    }
/*page post*/
    function post(){
      
        require('view/frontend/post.php');          
    }
/*page films*/
    function movies(){
        
        require('view/frontend/movies.php');          
    }
/*page series*/
function series(){
        
    require('view/frontend/series.php');          
}  