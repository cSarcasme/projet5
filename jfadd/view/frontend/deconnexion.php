<!--page for deconnexion mode admin-->
<?php
    session_destroy();
    header('Location:../index.php?page=home');