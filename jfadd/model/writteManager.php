<?php
/*page writte ppost manager*/
namespace ced\stream\model;

require_once("model/manager.php");

class WritteManager extends Manager{
    /*send post after validation*/
    public function postPost($title, $content,$writer, $image, $posted){
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(posts.title, posts.content, posts.writter, posts.image, posts.posted, posts.date)
         VALUES(?, ?, ?, ?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content,$writer, $image, $posted));

        return $affectedLines;
    }
}