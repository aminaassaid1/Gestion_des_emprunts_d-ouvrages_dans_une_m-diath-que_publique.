<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top" class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SOLI-LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">AMINA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="members.php">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Borrowings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ouvrage</a>
                        </li>
                </div>
            </div>
        </div>
    </nav>
    <section style="margin-top:5%;">
    <h1>Membres</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
            $sql = "SELECT * FROM adhérent"; 
            $result = mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="card col-md-5 col-lg-3 p-0 m-0">
                    <img src="<?php echo $row["profile"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["user_name"]?></h5>
                        <p class="card-text"><?php echo $row["first_name"]?> <?php echo $row["last_name"]?></p>
                        <p class="card-text"><?php echo $row["CIN"]?></p>
                        <p class="card-text"><?php echo $row["phone"]?></p>
                        <p class="card-text"><?php echo $row["email"]?></p>
                    </div>
                </div>
                <?php
            }
       ?>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>


<!-- <img src=".$ligne['image']." class'card-img-top'>
                            
                            <p>".$ligne['Type_annonce']."</p>
                            <h5 style='color:#3F34B8;'>".$ligne['Montant']."</h5>
                            <p>".$ligne['description']."</p>
                            <form action='delet.php' method='POST'>
                            <input type='number' value=".$ligne["ID"]." class='btn btn-danger d-none' name='ID' id='id'>
                            <input type='submit' class='btn btn-danger' value='Delete' >
                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target=#".$ligne["ID"].">Edit</button>
                            </form> -->