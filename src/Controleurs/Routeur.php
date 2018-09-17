<?php
    require('../../config/Database.php');

    require('../Modeles/BilletModele.php');

    $model = new BilletModele();
    $model->obtenirTousLesBillets();
?>