<?php
                if (isset($_POST['ajouter'])){
                    $firstname =$_POST['FName'];
                    $profil = $_FILES['profil']['name'];
                    $lastname = $_POST['LName'];
                    $email = $_POST['email'];
                    $phone= $_POST['phone'];
                    $cin= $_POST['cin'];
                    $password = $_POST['password'];
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $inscription = $_POST['inscription'];
                    $birthday=$_POST['birthday'];
                    $username=$_POST['username'];
                    $type =$_POST['type'];
                    move_uploaded_file($_FILES['profil']['tmp_name'], "./img/".$profil);
                    $sqlADD = "INSERT INTO `adhérent`( `profile`, `first_name`, `last_name`, `user_name`, `email`, `phone`, `birthday`, `CIN`, `date_inscription`, `type_adhérenent`, `password`) VALUES ('../img/$profil','$firstname','$lastname','$username','$email','$phone','$birthday','$cin','$inscription','$type','$hashed_password')";
                    $con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
                    $result = mysqli_query($con,$sqlADD);
                    
                
                };          
                header('Location: members.php')   
        ?>