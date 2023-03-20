<?php
session_start();
$msgs="";
if (isset($_POST['signin'])){
$email = $_POST['email'];
$password = $_POST['password'];
$con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
$sql = mysqli_query($con, "SELECT * FROM `adhérent` WHERE email='$email'");
$row = mysqli_fetch_array($sql);
if (is_array($row)) {
    if ($password ==$row['password']){
        $_SESSION["id_adr"]=$row["ID_adhérent"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["fname"]=$row["first_name"];
        $_SESSION["lname"]=$row["last_name"];
        $_SESSION["phone"]=$row["`phone`"];
        $_SESSION["cin"]=$row["CIN"];
        $_SESSION["type_adhérenent"]=$row["type_adhérenent"];
        header("location:homeadr.php");
    }
    
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleadr.css">
    <title>Document</title>
</head>
<body>
        <div class="main">
                <div class="login">
                    <form action="" method="post">
                        <h1>LOGIN</h1>
                    <div>
                        <input class="infoLog" type="email" name="email" placeholder="E-mail" >
                    </div>
                    <div>
                        <input class="infoLog" type="text" name="password" placeholder="password">
                    </div>
                        <div class ="radio">
                            <div>
                                <input class="infoLog" style="width: 80px;"  type="submit" name="signin" value="signin" placeholder="signin">
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
 
</body>
</html>


