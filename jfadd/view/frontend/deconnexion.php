<!--page for deconnexion mode admin-->
<?php
    unset($_SESSION['admin']['email']);
    unset($_SESSION['admin']['pseudo']);
    header('Location:../index.php?page=home');