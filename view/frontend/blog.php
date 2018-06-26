<!--page blog all chapter -->
<?php $title = "Blog"?>

<?php ob_start(); ?>


<section class="my-5">
    <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-5">Mes articles</h2>
        <p class="text-center w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="row">
            <div class="col-lg-5">
                <div class=" mb-lg-0 mb-4">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg" alt="Sample image">
                    <div class="mask rgba-white-slight"></div>
                </div>  
            </div>
            <div class="col-lg-7">
                <h3 class="font-weight-bold mb-3"><strong>Title of the news</strong></h3>
                <p>by <a><strong>Carine Fox</strong></a>, 19/08/2018</p>
                <a class="btn btn-success btn-md">Read more</a>
            </div>
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col-lg-7">
                <h3 class="font-weight-bold mb-3"><strong>Title of the news</strong></h3>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                <p>by <a><strong>Carine Fox</strong></a>, 14/08/2018</p>
                <a class="btn btn-pink btn-md mb-lg-0 mb-4">Read more</a>
            </div>
            <div class="col-lg-5">
                <div class="view overlay rounded z-depth-2">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(34).jpg" alt="Sample image">
                    <div class="mask rgba-white-slight"></div>
                </div>
            </div>
        </div>
        <hr class="my-5">
    <div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>