<!--page error -->
<?php $title = "Error"; ?>
<?php ob_start(); ?>
<div class="container">
    <h1>Aie aie aie .....</h1>
    <?= $e->getMessage() ?>
    <figure>
        <img src="../public/images/error.jpg" alt="error image" />
    </figure>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>





