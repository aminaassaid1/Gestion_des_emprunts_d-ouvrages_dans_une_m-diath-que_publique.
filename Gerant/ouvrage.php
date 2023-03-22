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

    <div class="ajouter">
        <div class="T-members">
            <div  style="margin-top:5%;">
                <h1>OUVRAGE</h1>
            </div>
            <div>
            <button type="button" class="infoLog" data-bs-toggle="modal" data-bs-target="#exampleModal">+ADD</button>
            </div>
        </div>
    </div>


    <!-- CARD OUVRAGE -->
    <section>
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
                            </div> 
                        </div>
                        <?php
                    }

                ?>
    </section>



                    <!-- MODAL -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD OUVRAGE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                    <select name="state" class="form-select" aria-label="Default select example">
                        <option selected >state </option>
                        <option value="New">New</option>
                        <option value="Good">Good</option>
                        <option value="Acceptable"> Acceptable</option>
                        <option value="Somewhat Used">Somewhat Used</option>
                        <option value="Torn">Torn</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="date">date achat</label>
                        <input type="date" id="date" name="achat" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option selected >Type </option>
                        <option value="book">book</option>
                        <option value="novel">novel</option>
                        <option value="DVD"> DVD</option>
                        <option value="research paper ">research paper </option>
                        <option value="magazine">magazine</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="page">Nombre de page</label>
                        <input type="number" id="page" name="page" class="form-control" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">IMAGE OUVRAGE</label>
                    <input class="form-control" name="main" type="file" id="formFile">
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addouv"  > ADD</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- INSERT TO BDD OUVRAGE -->
<?php
                if (isset($_POST['addouv'])){
                    $name =addslashes($_POST['name']);
                    $main = addslashes("img/".$_FILES['main']['name']);
                    $state = $_POST['state'];
                    $achat = $_POST['achat'];
                    $type= $_POST['type'];
                    $page= $_POST['page'];
                    
                    move_uploaded_file($_FILES['main']['tmp_name'],$main);
                    $sqlADD_ouv = "INSERT INTO `ouvrage`( `name_ouvrage`, `state_ouvrage`, `date_achat`, `type_ouvrage`, `pages_ouvrage`, `image_main`) VALUES ('$name','$state',' $achat','$type','$page','$main')";
                    $result = mysqli_query($con,$sqlADD_ouv);
                    
                
                };             
        ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

