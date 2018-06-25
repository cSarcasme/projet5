<!--page movies-->   
<?php $title = "movies"?>

<?php ob_start(); ?>
<section id="slideFilm" class="mt-3">
    <div class="container">
        <?php include('body/connexion.php')?>
        <div class="d-flex flex-row bd-highlight owl-carousel" id="slideShow">
        <?php
            foreach ($films as $listFilm){
        ?>
        
            <div class="card  hovereffect "  id="slideFilm">
                <img class="card-img-top" src="<?= $listFilm['image']?>" height="250" alt="Card image cap">
                <div class="card-body  overlay">
                    <h5 class="font-weight-bold text-dark"><?= $listFilm['title']?></h5>
                    <p class="crSeSy"><?=htmlspecialchars(substr($listFilm['synopsis'],0,130))?> ...</p>
                                
                </div>
                <div class=" p-2 bg-dark text-white">
                    <div class="d-flex justify-content-center"><span class="font-weight-bold"><?= $listFilm['note'] ?></span><i class="fas fa-star text-warning p-1"></i></div>             
                </div>
            </div>  
      
        <?php
            }
        ?>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 class="shadow-sm mt-3 p-3 text-white bg-info"><?=htmlspecialchars($film['title'])?></h2>
                    </div>
                    <div class="col-3">      
                        <p class=""><img style="width:100%;" height="350" src="<?= $film['image']?>"></p>
                    </div>
                    <div class="col-9">
                        <iframe src="<?=$film['bandeannonce']?>" style="width:100%;" height="350"></iframe>
                    </div>
                    <div class="col-12">
                        <h6 class="font-weight-bold">synopsis</h6>
                        <p><?=htmlspecialchars($film['synopsis'])?></p>
                        <h6 class="font-weight-bold">Production</h6>
                        <p><?= htmlspecialchars($film['production'])?></p>
                        <h6 class="font-weight-bold">Acteur</h6>
                        <p><?= htmlspecialchars($film['acteur'])?></p>
                        <p><span class="font-weight-bold">Date de sortie: </span><?=htmlspecialchars($film['datesortie'])?></p>
                        <p><span class="font-weight-bold">note: <span><?= htmlspecialchars($film['note'])?><i class="fas fa-star text-warning"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php
            if(!isset($_SESSION['email'])){
                ?>
                    <p class="ml-1"><em>Il faut être inscrit pour laisser des commentaires (<a href="index.php?page=inscription">inscription</a>)</em></p>
                <?php
            }
            ?>
            <h2 class="text-muted">Commentaires</h2>
                <?php
                if(isset($comments)){
                    ?>
                        <p class="ml-1"><em>Soit le premier a commenter</em></p>
                    <?php
                }      
                    foreach($comments as $comment){
                          
                    ?>
                            
                    <div class="media border p-3 mb-3 mt-3">
                        <img src="public/images/users/<?= $_SESSION['user']['image'] ?>"alt="image comment user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">
                            <h4><?=htmlspecialchars($comment['name'])?> <span class="text-muted" id="chapterDateComment"><em> Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></em></span></h4>
                            <p><?= htmlspecialchars($comment['comment'])?></p>      
                            <a href="index.php?page=click&amp;id=<?=$post['id']?>&amp;idc=<?=$comment['id']?>" class="text-danger" style="float:right;"><i class="fas fa-flag mr-1"></i>Signaler un abus</a>
                        </div>
                    </div>
                    <?php
                        }                 
                    ?>
                    <script>
                    </script>
                <!-- submit comment from form -->
                <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $image = htmlspecialchars($_POST['image']);
                    $errors=array();
            
                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs ne sont pas remplis.";
                    }
                    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "L' adresse email n' est pas valide.";
                        }
                
                    if(!empty($errors)){
                        ?>
                        <div class="alert alert-danger"> 
                            <?php
                                foreach($errors as $error){
                                    echo "<strong>"."ATTENTION!!! "."</strong>". $error."<br/>";
                                }
                            ?>
                        </div>
                        <?php
                    }
                    else{
                        $send = new PageMoviesInfo;        
                        $send -> post_CommentFilm($_GET['id'], $name, $email, $comment, $image);
                        ?>
                        <div class="alert alert-success">
                            Commentaire envoyé 
                        </div>
                        <?php
                    }
                }
                if(isset($_SESSION['user']['email'])){
                ?>
                <h2 class="text-muted mb-2">Laisser un commentaire</h2>
                <!--form send comment -->
                <form method="post">
                    <div class="row postBlogComment">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="name"><i class="fas fa-user bg-danger text-white p-2"></i></label>
                            <input type="text" name="name" id="name" placeholder="Nom" value="<?= $_SESSION['user']['pseudo'] ?>" class="form-control formIns py-2"/>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="email"><i class="fas fa-envelope bg-danger text-white p-2"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" value="<?= $_SESSION['user']['email'] ?>" class="form-control formIns py-2"/>
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="comment"><i class="fas fa-comment-dots bg-danger text-white p-2"></i></label>
                            <textarea name="comment" id="comment" placeholder="Commentaire" class="form-control formIns py-2"></textarea>
                        </div>
                        <input type="hidden" name="image" value="<?= $_SESSION['user']['image'] ?>">
                        <div class="col-md-12 mb-3 d-flex justify-content-end ">
                            <button type="submit" name="submit" id="addComment" class="px-5 btn btn-dark font-weight-bold">Commenter</button>
                        </div>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>


