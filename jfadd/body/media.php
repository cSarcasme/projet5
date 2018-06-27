<!--model for adddashboard-->
<h1 class="text-center">TABLEAU DES MEDIAS</h1>
<div class="row mt-4 justify-content-center">
    <!-- Films-->
    <div class="col-8 col-xl-8">        
        <div class="card bg-success">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success btn-sm px-4 font-weight-bold" title="tableau des films" href="index.php?page=addFilms&amp;p=1">Films</a>
                </div> 
            </div>
            <div class="card-body">          
                <h3 class="card-text cardDashboard text-white"><?= $countFilms['idFilms'] ?></h3>
            </div>
        </div>       
    </div>
</div>           
