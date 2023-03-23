<?php
session_start();
$id_biblio = $_SESSION["id_bib"];
if(isset($_GET["retour"])){
    $id_emp = $_GET["idemprent"];
    $con = mysqli_connect('localhost', 'root','', 'gestion_des_emprunts');
    $SQL_retour= "UPDATE `emprunt` SET `date_retour`=CURRENT_TIMESTAMP,`id_gerant_retour`='$id_biblio' WHERE ID_emprunt = '$id_emp'";
    $result = mysqli_query($con,$SQL_retour);
    if ($result==TRUE){
        $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM emprunt WHERE ID_emprunt = '$id_emp'"));
        $date_emprunt = strtotime($row['date_emprunt']);
        $date_retour = strtotime($row['date_retour']);
        $days_diff = floor(($date_retour - $date_emprunt) / (60 * 60 * 24));
        if ($days_diff > 15) {
            $rowss = mysqli_fetch_array(mysqli_query($con, "SELECT ID_adhérent  FROM reservation WHERE ID_reservation IN (SELECT ID_reservation FROM emprunt WHERE ID_emprunt='$id_emp'"));
            $ID_adhérent  = $rowss['ID_adhérent '];
            $query_banned = "UPDATE adhérent SET pénalité = pénalité + 1 WHERE ID_adhérent  ='$ID_adhérent'";
            if(mysqli_query($con, $query_banned)){
                header('Location: emprent.php');
            }
        }else{
            header('Location: emprent.php');
        }
    }
}
?>