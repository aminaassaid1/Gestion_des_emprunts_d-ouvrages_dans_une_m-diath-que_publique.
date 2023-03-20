<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadr.css">
    <title>Document</title>
</head>
<body>
    <div class="acceuil">
    <div class="landing">
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SOLI-LIBRARY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">AMINA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="profil.php"> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_reservation.php">My Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My borrowings </a>
                        </li>
                </div>
            </div>
        </div>
    </nav>
    </div>
    </div>
    <div class="home">
            <div>
                <input type="submit" class="search" placeholder="E-mail" >
            </div>
    </div>
    <section>
            <!-- CARD OUVRAGE -->
    <section>
        <?php
        if(isset($_GET["response"])){
            if($_GET["response"]== "Torn"){
                echo"<div id='popup-box'>
                <h2>Welcome to my website!</h2>
                <p>This is a popup box created using HTML, CSS, and JavaScript.</p>
                <button onclick='hidePopup()'>Close</button>
              </div>"
                // echo"this book is torn";
            }
        }
        ?>
                <?php
                    $SQL= "SELECT * FROM ouvrage";
                    $resulta = mysqli_query($con,$SQL);
                    while($lighn=mysqli_fetch_assoc($resulta)){
                        ?>
                        <div id="card" class="card col-md-5 col-lg-3 p-0 m-0" >
                            <img src="<?php echo $lighn["image_main"]?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5><?php echo $lighn["name_ouvrage"]?></h5>
                                <div>
                                    <p><?php echo $lighn["state_ouvrage"]?></p>
                                    <p><?php echo $lighn["type_ouvrage"]?></p>
                                </div>
                                <form action="reservationadr.php" method="GET">
                                    <input type="submit" value="reserve" name="reserve">
                                    <input type='hidden' value="<?=$lighn["ID_ouvrage"]?>" class='d-none' name='ID_ouv' id='id'>
                                </form>
                            </div> 
                        </div>
                        <?php
                    }
                ?>

    </section>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>