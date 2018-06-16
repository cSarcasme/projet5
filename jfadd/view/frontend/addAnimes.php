<!--page add dashboard-->    
<?php $title = "Animés"?>

<?php ob_start(); ?>   

<section>
    <div class="container">
        <?php include('body/adddashboard.php')?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>