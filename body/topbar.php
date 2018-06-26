<header>
    <div class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-7 col-md-2">
                    <p><img src="public/images/logo-StreamAddikt.png" alt="" width="200" height="50"></p>
                </div>
                <div class="col-5 col-md-8 offset-md-2">
                    <div class="form" method="get">
                        <div class="input-group w-100">
                            <input type="search" name="search" id="search" class="form-control  ">
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-warning" name="submit">
                                    <span><i class="fas fa-search text-dark"></i></span>
                                </button>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light p-2 bg-dark">
        <div class="container">        
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-start" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white font-weight-bold" href="index.php?page=home">ACCUEIL <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?page=movies">FILMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?page=blog">BLOG</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ARTICLE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>          
            </div>
            <div class="d-flex align items center mr-4">
                <?php
                    if(isset($_SESSION['user']['email'])){
                        ?>
                        
                        <div class="text-white mr-2 py-2 user">Bienvenue <em class="text-muted mr-1 "><?= $_SESSION['user']['pseudo']?></em></div>
                        <a href="index.php?page=config" class="py-2 mr-2" title="config"><i class="fas fa-cog fa-lg text-danger"></i></a>
                        <a href="index.php?page=deconnexion" class="py-2" title="Deconnexion"><i class="fas fa-sign-out-alt fa-lg text-info"></i></a>
                        <?php
                }
                else{
                ?>
                    <a href="#" title="Connexion" class="py-2" id="userConex" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-user-tie fa-lg text-info"></i></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>
</header>