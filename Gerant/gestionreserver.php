<?php
    session_start();
    $id_bib = $_SESSION["id_bib"];
     if(isset($_GET["valider"])){
        $id_reservation = $_GET["ID_reserv"];
        $con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
        $sqlvalid = "INSERT INTO `emprunt`( `date_emprunt`, `date_retour`, `id_reservation`, `id_gerant_valide`, `id_gerant_retour`)
         VALUES (NOW() ,NULL,'$id_reservation','$id_bib',NULL)";
         $result = mysqli_query($con,$sqlvalid);
         header('Location: resevation.php');
     }
?>