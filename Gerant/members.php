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

    
    <div class="ajouter">
        <div class="T-members">
            <div  style="margin-top:5%;">
                <h1>Membres</h1>
            </div>
            <div>
            <button type="button" class="infoLog" data-bs-toggle="modal" data-bs-target="#exampleModal">+ADD</button>
            </div>
        </div>
    </div>


            <!-- CARD     -->
        <section>
            <?php
                $sql = "SELECT * FROM adhérent"; 
                $result = mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div id="card" class="card col-md-5 col-lg-3 p-0 m-0" >
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



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="FName">First name</label>
                        <input type="text" id="FName"  class="form-control" />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="LName">Last name</label>
                        <input type="text" id="LName" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" />
                    </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="cin">CIN</label>
                        <input type="email" id="cin" class="form-control" />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example2">Password</label>
                        <input type="text" id="form3Example2" class="form-control" />
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="FName">Fir</label>
                        <input type="text" id="FName"  class="form-control" />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="LName">Last name</label>
                        <input type="text" id="LName" class="form-control" />
                    </div>
                    </div>
                </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">profile</label>
                    <input class="form-control" type="file" id="formFile">
                </div>  
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>