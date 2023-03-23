<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                            <a class="nav-link" href="resevation.php">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="emprent.php">Borrowings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ouvrage.php">Ouvrage</a>
                        </li>
                </div>
            </div>
        </div>
    </nav>
    <section>
                <?php
                    $SQL= "SELECT * FROM `emprunt` INNER JOIN reservation on emprunt.ID_reservation = reservation.ID_reservation INNER JOIN ouvrage on ouvrage.ID_ouvrage = reservation.ID_ouvrage";
                    $con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
                    $resulta = mysqli_query($con,$SQL);

                    echo '<div class = "row d-flex justify-content-around pt-5">';
                        while($lighn=mysqli_fetch_assoc($resulta)){
                            ?>
                            <div id="card" class="card col-md-4 col-lg-3 p-0 m-0" >
                                <img src="<?php echo $lighn["image_main"]?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5><?php echo $lighn["name_ouvrage"]?></h5>
                                    <div>
                                        <p> State : <?php echo $lighn["state_ouvrage"]?></p>
                                        <p>Type : <?php echo $lighn["type_ouvrage"]?></p>
                                    </div>
                                </div> 
                            </div>
                            <?php
                        }
                    echo '</div>';

                ?>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>