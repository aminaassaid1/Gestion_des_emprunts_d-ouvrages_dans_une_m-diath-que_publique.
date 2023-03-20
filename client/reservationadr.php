<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
session_start();
if (isset($_GET['reserve'])){
    $id_adr=$_SESSION["id_adr"];
    $idouv  = $_GET["ID_ouv"];
    // ------------test1
    $sqlres ="SELECT * FROM `ouvrage` WHERE ID_ouvrage ='$idouv'";
    $result = mysqli_query($con,$sqlres);
    $fetch= mysqli_fetch_assoc($result);
    $fetch["state_ouvrage"] = "Torn";
    if($fetch["state_ouvrage"] == "Torn" ){
        header('Location: homeadr.php?response=Torn');
        exit();
    }
    // ------------test2

    // $sqlres= "INSERT INTO `reservation`( `ID_adhérent`, `ID_ouvrage`) VALUES ('$id_adr','$idouv')";
    // mysqli_query($con,$sqlres);
};
?>