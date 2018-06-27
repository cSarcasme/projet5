<!--page admin post view-->    
<?php $title = "chapitre"?>

<?php ob_start(); ?>   

    <?php include('body/topbar2.php'); ?>

<div class="color">
    <div class="container right left">
        <section  class="postContentImage" id="postImageChapter">      
            <div class="row">
                <div class="col-12">
                    <div class="postContentImage" >
                        <img src="../public/images/posts/<?= $post['image']?>" alt="image du titre"  id="imageChapter" class="postContentImage" />
                    </div>
                    <div  id="postTitle">
                        <div class="d-flex justify-content-center">
                            <h1 class="text-center text-uppercase font-weight-bold text-white p-1"><?= $post['title']?></h1>
                        </div>
                    </div>
                    <div id="postName">
                        <div class="d-flex justify-content-center">
                            <p class="font-weight-bold text-center text-warning">Par <em><?= $post['name'] ?></em></p>
                        </div>
                    </div>
                </div>
            </div>      
        </section>
    
        <section class="">
            <div class="row" id="encadr"> 
                <div class=" col-12" >
                    <p class="text-right size1 mt-2 mr-5 font-weight-bold  text-dark">Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></p> 
                    <div id="text-post" class="mx-5"><?= html_entity_decode($post['content']);?></div>
                    <hr>
                    <div>
                    <a href="index.php?page=modifpost&amp;id=<?= $_GET['id'] ?>" class="mr-5 float-right btn btn-success btn sm" title="Modifier">Modifier article</a>
                    </div>
                </div>   
            </div>
        </section> 
    </div>  
</div>

 <?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>