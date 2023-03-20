<?php
session_start();
$msgs="";
if (isset($_POST['Bibliothécaire'])){
$email = $_POST['email'];
$password = $_POST['password'];
$con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
$sql = mysqli_query($con, "SELECT * FROM `bibliothécaire` WHERE email='$email'");
$row = mysqli_fetch_array($sql);
if (is_array($row)) {
    if ($password ==$row['password']){
        
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["id_bib"]=$row["ID_bibliothécaire"];
        $_SESSION["fname"]=$row["first_name"];
        $_SESSION["lname"]=$row["last_name"];
        header("location:home.php");
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
    <link rel="stylesheet" href="style.css">
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
                                <input class="infoLog" style="width: 80px;"  type="submit" name="signup" value="sign up" placeholder="sign up">
                            </div>
                            <div>
                                <input class="infoLog" style="width: 80px;" type="submit" name="Bibliothécaire" value="Bibliothécaire" placeholder="Bibliothécaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
 
</body>
</html>


