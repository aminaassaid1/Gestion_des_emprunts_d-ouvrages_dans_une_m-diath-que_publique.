<?php
session_start();
$id_biblio = $_SESSION["id_bib"];
if(isset($_GET["retour"])){
    $id_emp = $_GET["ID_empret"];
    $con = mysqli_connect('localhost', 'root','', 'gestion_des_emprunts');
    $SQL_retour= "UPDATE `emprunt` SET `date_retour`=CURRENT_TIMESTAMP,`id_gerant_retour`='$id_biblio' WHERE ID_emprunt = '$id_emp'";
    $result = mysqli_query($con,$SQL_retour);
    header('Location: emprent.php')  ;
}
?>