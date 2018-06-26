<!--page movies-->   
<?php $title = "movies"?>
<?php ob_start(); ?>

<section>
    <div class="container">
        <?php include('body/connexion.php')?>   
        <div class="row mt-4">
            
                <?php
                    foreach ($films as $listFilm){
                ?>
                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                <div class="card  hovereffect mb-2"  id="slideFilm">
                    <img class="card-img-top" src="<?= $listFilm['image']?>" height="200" alt="Card image cap">
                    <div class="card-body  overlay">
                        <h6 class="font-weight-bold text-dark"><?= htmlspecialchars(substr($listFilm['title'],0,15))?></h6>
                        <p class="crSeSy" style="font-size:12px;"><?=htmlspecialchars(substr($listFilm['synopsis'],0,130))?> ...</p>                
                        <div class="ovelaybottom">
                            <a href="index.php?page=infoMovies&amp;id=<?= $listFilm['id'] ?>" class="px-4 py-1 bg-white text-info font-weight-bold">Regarger</a>
                        </div>
                    </div>
                    <div class=" p-2 bg-dark text-white">
                        <div class="d-flex justify-content-center"><span class="font-weight-bold"><?= $listFilm['note'] ?></span><i class="fas fa-star text-warning p-1"></i></div>             
                    </div>
                </div>
                </div>  
                <?php
                    }
                ?> 
        </div>
        <!-- pagination -->
        <div class="row justify-content-center">
            <nav aria-label="Page navigation example">               
            <ul class="pagination ">
                <!--decrease harrow left-->
                <?php if (isset($_GET["p"]) && $_GET['p']>1 && $_GET['p']<=$nbPages) {
                    ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                }
                else{
                ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]=1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                }
                ?>
                <!--number pagination-->
                <?php
                for($i=1; $i<=$nbPages; $i++){
                ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=movies&amp;p=<?=$i?>"><?=$i?></a></li>
                <?php
                }
                ?>
                <!--increase harrow right-->
                <?php
                if (isset($_GET["p"]) && $_GET['p']>0 && $_GET['p']<$nbPages) {                           
                ?>
                <li class="page-item">
                <a class="page-link" href="index.php?page=movies&amp;p=<?=$_GET["p"]+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                <?php
                }
                else{
                    ?>
                        <li class="page-item">
                <a class="page-link" href="index.php?page=movies&amp;p=<?=$_GET["p"]=$nbPages?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>;
                <?php
                }
                ?>
            </ul>            
            </nav>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
