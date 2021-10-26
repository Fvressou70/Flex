<!DOCTYPE html>
<html lang=" fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="accueil.css">
  

  <title>Document</title>
</head>

<body class="">
  <header>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent text">
      <div class="container-fluid">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-primary" href="#">Flex Films</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active text-primary " aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-primary" href="#">Films</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-primary" href="#">Séries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-primary" href="#">Animations</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success bg-primary text-black" type="submit">Rechercher</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <!-- Carousel ( Bannière) -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="Banniere1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="Banniere2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="Banniere3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <div id="controls">
</div>
  </div>

  <!-- Carte (Affiche) -->
  <div class="row mx-auto mt-5  ">

    <?php
                    // Include config file
                    require_once "../config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM films";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            
                                while($row = mysqli_fetch_array($result)){
                                  echo "<div class=\"card col-4  bg-transparent  mx-auto mb-3 text-white \" style=\"width:18rem ;\">\n";
                                  echo "      <img src= \"".$row['affiche']."\" class=\"card-img-top  \" alt=\"...\">\n";
                                  echo "      <div class=\"card-body bg-transparent\">\n";
                                  echo "        <h5 class=\"card-title\">".$row['titre']."</h5>\n";
                                  echo "        <p class=\"card-text\">".$row['resume']."</p>\n";
                                  echo "        <a href=\"detail.php?id=".$row['id']."\" class=\"btn text-primary border-primary bg-black\">Voir plus</a>\n";
                                  echo "      </div>\n";
                                  echo "    </div>";
                                }
                                
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>

  </div>



</body>

</html>