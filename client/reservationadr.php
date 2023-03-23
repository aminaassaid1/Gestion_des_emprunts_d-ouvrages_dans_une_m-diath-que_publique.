<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
session_start();
if (isset($_GET['reserve'])){
    $id_adr=$_SESSION["id_adr"];
    $idouv  = $_GET["ID_ouv"];
    // ------------test1
    $sqlres ="SELECT * FROM `ouvrage` WHERE ID_ouvrage ='$idouv' AND ID_ouvrage NOT IN (SELECT ID_ouvrage FROM reservation WHERE TIMESTAMPDIFF(hour,date_reservation,CURRENT_TIMESTAMP) < 24); ";
    $result = mysqli_query($con,$sqlres);
    $fetch= mysqli_fetch_assoc($result);
    if($fetch["state_ouvrage"] == "Torn" ){
        header('Location: homeadr.php?response=Torn');
        exit();
    }
    if(mysqli_num_rows($result) == 0){
        header('Location: homeadr.php?response=notdispo');
            
    }else{
        $sql_emprunts="SELECT * FROM `ouvrage` WHERE ID_ouvrage ='$idouv' AND ID_ouvrage NOT IN (SELECT ID_ouvrage FROM reservation WHERE TIMESTAMPDIFF(hour,date_reservation,CURRENT_TIMESTAMP) < 24) AND (SELECT ID_ouvrage FROM emprunt WHERE ID_reservation IN (
            SELECT ID_reservation 
            FROM (
                SELECT DISTINCT r.ID_reservation
                FROM reservation r 
                INNER JOIN emprunt e ON r.ID_reservation = e.ID_reservation
                WHERE e.date_retour IS NOT NULL AND e.date_emprunt IS NOT NULL
            ) AS subquery
        ))";
        $results = mysqli_query($con,$sql_emprunts);
        $fetchs= mysqli_fetch_assoc($results);
        if(mysqli_num_rows($results)==0){
           $sqlresve= "INSERT INTO `reservation`( `ID_adhérent`, `ID_ouvrage`) VALUES ('$id_adr','$idouv')";
            mysqli_query($con,$sqlresve);
            header('Location: homeadr.php?response=ok');
            exit();
        }else{
            header('Location : homeadr.php?response=notdispo');
            exit();
        }
    }
    // ------------test2
    $sql_pinalite = "SELECT * FROM `adhérent` WHERE ID_adhérent='$id_adr'";
    $result = mysqli_query($con,$sql_pinalite);
    $fetch= mysqli_fetch_assoc($result);
    $pénalité = $fetch["pénalité"];
    if ($pénalité >= 3){
        header('Location: homeadr.php?response=pénalité');
        exit();
    }
    // ------------test3
    $date_res = "SELECT COUNT(*) AS count FROM `reservation` WHERE ID_adhérent ='$id_adr' AND TIMESTAMPDIFF(hour,date_reservation,CURRENT_TIMESTAMP) < 24 AND ID_reservation NOT IN (SELECT id_reservation FROM emprunt);";
    $result = mysqli_query($con,$date_res);
    $fetch= mysqli_fetch_assoc($result);
    $reservation = $fetch["count"];

    // ------------test5
   $sql_borrowing ="SELECT COUNT(*) AS counte FROM `emprunt` JOIN `reservation` r ON r.ID_reservation = emprunt.id_reservation WHERE ID_adhérent= '$id_adr' AND date_retour IS NULL " ;
   $result = mysqli_query($con,$sql_borrowing);
    $fetch= mysqli_fetch_assoc($result);
    $emprunt = $fetch["counte"];

    if($emprunt + $reservation >=3){
        if ($pénalité >= 3){
            header('Location: homeadr.php?response=reserve');
            exit();
        }
    }


};
?>