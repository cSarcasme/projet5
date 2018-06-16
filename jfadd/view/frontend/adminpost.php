<!--page admin post view-->    
<?php $title = "chapitre"?>

<?php ob_start(); ?>   
    
<section  class="postContentImage" id="postImageChapter">
        <!--<div class="container-fluid">   -->
            <div class="postContentImage" >
                <img src="../public/images/posts/<?= htmlspecialchars($post['image'])?>" alt="image du titre"  id="imageChapter" class="postContentImage" />
            </div>
            <div  id="postTitle">
                <div class="d-flex justify-content-center">
                    <h1 class="text-center text-black p-1">BILLET POUR L' ALASKA</h1>
                </div>
            </div>
     <!--   </div>-->
    </section>

    <section class="post-content-section pt-3">
            <div class="container">
                <div class="row" id="encadr"> 
                    <div class="col-lg-9 col-md-9 col-md-12" >
                        <p class="text-right size1 mt-4 mr-4  text-muted">Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></p> 
                        <div id="chapterTextContent">
                        <div class="d-flex justify-content-center">
                            <h3 class="text-center text-white px-2 pb-1 bg-danger"><?= htmlspecialchars($post['title'])?></h3>
                        </div>
                        <p class="lead font-weight-bold">Toutes les semaines venez retrouver un nouveau chapitre du roman nouvelle de Jean Forteroche</p>
                        <div id="text-post"><?= html_entity_decode($post['content']);?></div>
                        <p class="text-center font-weight-bold text-dark">Jean Forteroche</p>
                    </div>
                    </div>
                    <div class="col-lg-3  col-md-3 col-md-12">
                        <aside class="well mt-4 px-3" id="auteur">                
                            <img src="../public/images/Jean_forteroche.jpg" class="rounded-circle mx-auto d-block" alt="Jean forteroche" width="150" height="100">    
                            <p>Jean forteroche est un écrivain français né en 1965 en Normandie. Il connaît son premier grand succès en 2011 avec Nymphéas Noirs. Ses polars se vendent à des milliers d'exemplaires, le classant 2e auteur le plus vendu de France en 2017. 
                                Aujourdh'ui il nous propose son nouveau roman nouvelle <strong>BILLET POUR L' ALASKA</strong> au format web .
                            </p>
                        </aside>
                    </div>
                    <!--form modification post-->
                    <form method="post" action="admin.php?page=modifpost&amp;id=<?= $post['id']?>">
                        <div class="col-md-12 mt-2 mb-3">
                            <button class="btn btn-info">Modifier l' article</button>
                        </div>
                    </form>
                </div>
            </div> 
    </section> 



 <?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>