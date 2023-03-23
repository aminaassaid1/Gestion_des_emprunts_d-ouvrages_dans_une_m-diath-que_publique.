<?php
session_start();
if(isset($_GET['longout'])){
    unset($_SESSION["email"]);
    session_destroy();
    header('location:signinadh.php');
};
?>