<!--page home-->
<?php $title = "home"?>
<?php ob_start(); ?>

<section id="slider">
    <img src="public/images/slider-back4.jpg"  alt="">
    <div class="container">
        <?php include('body/connexion.php')?>
        <div id="slide">
            <div id="harrow_left">
                <i class="fas fa-caret-left fa-3x"></i>
            </div>
            <div id="harrow_right">
                <i class="fas fa-caret-right fa-3x"></i>
            </div>
            <div id="slide1" class="slide mt-4">
                <img  style="width:100%;" src="public/images/slider/westworld.png">
                <div class="slider-bottom">
                    <div class="slide-bottom p-2">
                        <a href="" class="btn btn-warning btn-sm">WESTWORLD</a>
                    </div>         
                </div>
            </div>
            <div id="slide2" class="slide mt-4">
                    <img  style="width:100%;" src="public/images/slider/the-walking-dead.jpg">
                <div class="slider-bottom">
                    <div class="slide-bottom p-2">
                        <a href="" class="btn btn-warning btn-sm">THE WALKING DEAD</a>

                    </div>
                </div>
            </div>
            <div id="slide3" class="slide mt-4">
                <img  style="width:100%;" src="public/images/slider/la-casa-de-papel.jpg">
                <div class="slider-bottom">
                    <div class="slide-bottom p-2">
                        <a href="" class="btn btn-warning btn-sm">LA CASA DE PAPEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
            <h5 class="font-weight-bold text-center">Films le mieux noté</h5>
                <div class="row">
                    
            <?php
            foreach($filmsNote as $filmNote){
            ?>
                <div class="col-3 mb-2">
                    <div class="card"  id="slideFilm">
                        <img class="card-img-top" src="<?= $filmNote['image']?>" height="190" alt="Card image cap">
                        <div class=" p-1">
                            <div class="clearfix">
                            <div class="float-left "><span class="font-weight-bold"><?= $filmNote['note'] ?></span><i class="fas fa-star text-warning p-1"></i></div>
                            <a href="#" title="Voir film" class="bg-success float-right seeHome px-2" style="height:26px;" data-toggle="modal" data-target="#note<?= htmlspecialchars($filmNote['id']) ?>"><i class="far fa-eye fa-md text-white"></i></a>
                                
                                <div class="modal fade" id="note<?= htmlspecialchars($filmNote['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark font-weight-bold" id="exampleModalCenterTitle"><?=htmlspecialchars($filmNote['title']) ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-8">
                                                        <div class="row">
                                                            <div class="col-3 col-lg-3">
                                                                <h6 class="text-info font-weight-bold">Année:<span class="text-dark"> <?=htmlspecialchars($filmNote['datesortie'])?></span></h6>
                                                            </div>
                                                            <div class="col-5 col-lg-5">
                                                                <h6 class="text-info font-weight-bold">Genre:<span class="text-dark"> <?=htmlspecialchars($filmNote['kind'])?></span></h6>   
                                                            </div>
                                                            <div class="col-4">
                                                            <div class="row justify-content-center">
                                                                <div class="col-6 d-lg-none">
                                                                    <p id="homeDateFilm"><img src="<?=$filmNote['image']?>"  alt="image-film"></p>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <p class="text-dark mt-2"><?=substr(htmlspecialchars($filmNote['synopsis']),0,500)?>...</p>
                                                    </div>
                                                    <div class="d-none d-lg-block col-lg-4">
                                                        <div class="row justify-content-center">
                                                        <div class="col-12 col-md-8">
                                                        <p id="homeDateFilm"><img src="<?=$filmNote['image']?>"  alt="image-film"></p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="index.php?page=infoMovies&amp;id=<?= $filmNote['id'] ?>"  class="btn btn-success">Voir Film</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                
                            </div>                   
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
            </div>
            <div class="col-12 col-lg-3">
                <h5 class="font-weight-bold text-center">Dernieres bande annonce</h5>
                    <!--table films-->
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th class="th1 text-primary" scope="col">Titre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($postFilms as $postFilm){
                            ?>
                            <tr><!--modal films-->
                                <td><a href="" class="text-white" data-toggle="modal" data-target="#<?= htmlspecialchars($postFilm['id']) ?>"><?= htmlspecialchars($postFilm['title']) ?></a>
                                
                                    <div class="modal fade" id="<?= htmlspecialchars($postFilm['id']) ?>" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-dark font-weight-bold" id="exampleModalCenterTitle"><?=htmlspecialchars($postFilm['title']) ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-8">
                                                            <div class="row">
                                                                <div class="col-3 col-lg-3">
                                                                    <h6 class="text-info font-weight-bold">Année:<span class="text-dark"> <?=htmlspecialchars($postFilm['datesortie'])?></span></h6>
                                                                </div>
                                                                <div class="col-5 col-lg-5">
                                                                    <h6 class="text-info font-weight-bold">Genre:<span class="text-dark"> <?=htmlspecialchars($postFilm['kind'])?></span></h6>   
                                                                </div>
                                                                <div class="col-4">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-6 d-lg-none">
                                                                        <p id="homeDateFilm"><img src="<?=$postFilm['image']?>"  alt="image-film"></p>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <p class="text-dark mt-2"><?=substr(htmlspecialchars($postFilm['synopsis']),0,500)?>...</p>
                                                        </div>
                                                        <div class="d-none d-lg-block col-lg-4">
                                                            <div class="row justify-content-center">
                                                            <div class="col-12 col-md-8">
                                                            <p id="homeDateFilm"><img src="<?=$postFilm['image']?>"  alt="image-film"></p>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="index.php?page=infoMovies&amp;id=<?= $postFilm['id'] ?>"  class="btn btn-success">Voir Film</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php var_dump($_SESSION) ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

