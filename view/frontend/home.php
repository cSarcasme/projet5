<!--page home-->
<?php $title = "home"?>
<?php ob_start(); ?>

<!-- slider -->
<section id="slider">
    
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>les derniers streaming ajoutés</h2>
                <div class="row ">
                    <div class="col-4">
                        <h4>Films</h4>
                        <!--table films-->
                        <table class="table tablor table-hover table-dark">
                            <tbody>
                            <?php
                                foreach($postFilms as $postFilm){
                                ?>
                                <tr><!--modal films-->
                                    <td><a href="" class="text-white" data-toggle="modal" data-target=".bd-example-modal-lg"><?= htmlspecialchars($postFilm['title']) ?></a>
                                    
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-dark font-weight-bold" id="exampleModalCenterTitle"><?=htmlspecialchars($postFilm['title']) ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="row">
                                                            <div class="col-3">
                                                                <h6 class="text-info font-weight-bold">Année:<span class="text-dark"> <?=htmlspecialchars($postFilm['year'])?></span></h6>
                                                            </div>
                                                            <div class="col-3">
                                                                <h6 class="text-info font-weight-bold">Genre:<span class="text-dark"> <?=htmlspecialchars($postFilm['gender'])?></span></h6>   
                                                            </div>
                                                            </div>
                                                            <p class="text-dark"><?=substr(htmlspecialchars($postFilm['synopsis']),0,500)?>...</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p id="homeDateFilm"><img src="public/images/posts/<?=$postFilm['image']?>" alt="image-film"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success">Voir</button>
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
                    <div class="col-4">
                        <h4>Series</h4>
                        <table class="table table-hover table-dark">
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                </tr>
                                <tr>
                                    <td><a href=""> Jacob</a></td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <h4>Animé</h4>
                        <table class="table table-hover table-dark">
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                </tr>
                                <tr>
                                    <td><a href=""> Jacob</a></td>
                                </tr>
                                <tr>
                                    <td>Larry the Bird</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="#"><p style="text-align:center;">Voir+</p></a>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

