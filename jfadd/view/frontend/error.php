<!--page error -->
<?php $title = "Error"; ?>
<?php ob_start(); ?>
<?php http_response_code(404); ?>
 
 <?php include('body/topbar.php'); ?>

<div class="container">
    <h1>Aie aie aie  ERREUR 404.....</h1>
    <?= $e->getMessage() ?>
    <figure>
        <img src="../public/images/error.jpg" alt="error image" />
    </figure>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>





