<!--model for dashboard in file admin-->

<section>
    <h1 class="text-center">TABLEAU DE BORD STREAMING</h1>
    <div class="row mt-4">
        <!-- Publish-->
        <div class="col-12 col-sm-12 col-md-4 mb-2">
            <div class="card bg-success">
                <div class="card-header bg-white">
                    <div class="row justify-content-center">
                        <a href="index.php?page=publications.dash&amp;p=1" class="btn text-success btn-dark btn-sm font-weight-bold">Publications</a>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-text text-white"><?= $countPosts['idPosts'] ?></h3>
                </div>
            </div>       
        </div>
        <!-- Comment-->
        <div class="col-12 col-sm-12 col-md-4 mb-2">
            <div class="card bg-primary">
                <div class="card-header bg-white">
                    <div class="row justify-content-center">
                        <a href="index.php?page=dashboard&amp;p=1" class="btn text-primary btn-dark btn-sm font-weight-bold">Commentaires</a>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-text  text-white"><?= $countComments['idComments'] ?></h3>
                </div>
            </div>
                        
        </div>
        <!-- Admin-->
        <div class="col-12 col-sm-12 col-md-4 mb-2">
            <div class="card bg-warning">
                <div class="card-header bg-white">
                <div class="row justify-content-center">
                    <a href="index.php?page=admins.dash&amp;p=1" class="btn btn-dark text-warning btn-sm font-weight-bold">Administrateurs</a>                  
                </div>
                </div>
                <div class="card-body">
                    <h3 class="card-text  text-white"><?= $countAdmins['idAdmins'] ?></h3>
                </div>
            </div>
        
        </div>
    </div> 
</section>

