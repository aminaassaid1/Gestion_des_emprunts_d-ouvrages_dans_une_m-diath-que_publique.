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
                            <a class="nav-link active" aria-current="page" href="homeadr.php"> HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="profil.php"> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_reservation.php">My Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="My_emprent.php">My borrowings </a>
                        </li>
                    </ul>
                    <div>
                        <form action="logout.php" method="get">
                                <input type="submit" value="Log out" name="longout">
                        </form>
                   </div>
                </div>
               
            </div>
        </div>
    </nav>
    </div>
    </div>
        <!-- search -->
    <section>
        <form  method="GET">
            <div id=search class="d-flex justify-content-around">
                <div id="filtrer_by_title_state" class="d-flex justify-content-end pt-5">
                    <div>
                        <input type="search"  name="search" placeholder="Title">
                    </div>
                    <div>
                        <select name="state_ouvrage" class="form-select" aria-label="Default select example">
                                <option selected >state </option>
                                <option value="New">New</option>
                                <option value="Good">Good</option>
                                <option value="Acceptable"> Acceptable</option>
                                <option value="Somewhat Used">Somewhat Used</option>
                                <option value="Torn">Torn</option>
                        </select>
                    </div>
                    <input type="submit" name="rechercher" value="SEARCH">
                </div>
            </div>          
        </form>
        <div class="d-flex">
            <form action="" method="GET">
                <button type="submit" name="book">Book</button>
            </form>
            <form action="" method="GET">
            <button type="submit" name="novel">Novel</button>
            </form>
            <form action="" method="GET">
                <button type="submit" name="DVD">DVD</button>
            </form>
            <form action="" method="GET">
            <button type="submit" name="paper">Research paper</button>
            </form>
            <form action="" method="GET">
            <button type="submit" name="magazine">Magazine</button>
            </form>
        </div>
       
        
        
    </section>
    
            <!-- CARD OUVRAGE -->
    <section>
        <?php
        if(isset($_GET["response"])){
            if($_GET["response"]== "Torn"){
                ?>
                <button id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>Launch static backdrop modal</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                        this book is torn
                        </div>
                        <div class="modal-footer">
                        <a href="homeadr.php"  class="btn btn-secondary" >Close</a>

                        </div>
                        </div>
                    </div>
                    </div>
                <?php
                
            }elseif($_GET["response"]== "pénalité"){
                ?>
                <button id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                        you have more than 3 penalties
                        </div>
                        <div class="modal-footer">
                        <a href="homeadr.php"  class="btn btn-secondary">Close</a>

                        </div>
                        </div>
                    </div>
                    </div>
                <?php
            }elseif($_GET["response"]== "reserve"){
                ?>
                <button id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>                        </div>
                            <div class="modal-body">
                            the book is not available
                            </div>
                            <div class="modal-footer">
                                <a href="homeadr.php"  class="btn btn-secondary">Close</a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php
            }elseif($_GET["response"]== "ok"){
                ?>
                <button id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                        bien reserver
                        </div>
                        <div class="modal-footer">
                        <a href="homeadr.php"  class="btn btn-secondary">Close</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php
                
            }elseif($_GET["response"]== "notdispo"){
                ?>
                <button id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Launch static backdrop modal</button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                        Not disponible
                        </div>
                        <div class="modal-footer">
                        <a href="homeadr.php"  class="btn btn-secondary">Close</a>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php
                
            };
           
        }
        ?>
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'gestion_des_emprunts');

                    $SQL="";
                    $resulta="";
                    if(isset($_GET["rechercher"])){
                        $state_ouvrage=$_GET["state_ouvrage"];
                        $TITLE=$_GET["search"];
                        if(!empty($state_ouvrage)){
                            $SQL="SELECT * FROM ouvrage WHERE state_ouvrage='$state_ouvrage'";
                            $resulta = mysqli_query($con,$SQL);
                        }
                        if(!empty($title)){
                            $SQL="SELECT * FROM ouvrage WHERE name_ouvrage LIKE '$title';                            ";
                            $resulta = mysqli_query($con,$SQL);
                        }
                        
                        

                    }elseif(isset($_GET['book'])){
                        $book = $_GET["book"];
                        $SQL="SELECT * FROM ouvrage WHERE type_ouvrage='book'";
                        $resulta = mysqli_query($con,$SQL);

                        
                    }elseif(isset($_GET['novel'])){
                        $SQL="SELECT * FROM ouvrage WHERE type_ouvrage='novel'";
                        $resulta = mysqli_query($con,$SQL);
                    }elseif(isset($_GET['DVD'])){
                        $SQL="SELECT * FROM ouvrage WHERE type_ouvrage='DVD'";
                        $resulta = mysqli_query($con,$SQL);
                    }elseif(isset($_GET['paper'])){
                        $SQL="SELECT * FROM ouvrage WHERE type_ouvrage='research paper'";
                        $resulta = mysqli_query($con,$SQL);
                    }elseif(isset($_GET['magazine'])){
                        $SQL="SELECT * FROM ouvrage WHERE type_ouvrage='magazine'";
                        $resulta = mysqli_query($con,$SQL);
                    }
                    else{
                        $SQL="SELECT * FROM `ouvrage`";
                        $resulta = mysqli_query($con,$SQL);
                    }


                    
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
                                    <form action="reservationadr.php" method="GET">
                                        <input type="submit" value="reserve" class="btn btn-success" name="reserve">
                                        <input type='hidden' value="<?=$lighn["ID_ouvrage"]?>" class='d-none' name='ID_ouv' id='id'>
                                    </form>
                                </div> 
                            </div>
                            <?php
                        }
                    echo '</div>';

                ?>

    </section>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php
if(isset($_GET["response"])){
    ?>
    <script>
        setTimeout(() => {
            document.getElementById('modal-btn').click()
        }, 200);
    </script>
    <?php
}?>
</body>
</html>