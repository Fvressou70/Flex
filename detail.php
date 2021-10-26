<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="detail.css">
    <title>Document</title>
</head>

<body>
    <header>
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-primary bg-black ">
            <div class="container-fluid">
            <a class="navbar-brand text-primary" href="accueil.php">Flex Films</a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="accueil.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Séries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Films</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Animations</a>
                        </li>
                            

                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2 border-dark" type="search" placeholder="Rechercher"
                            aria-label="Search">
                        <button class="btn btn-outline-success text-black border-dark bg-primary"
                            type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Fvressougawton470", "flex_films");
 $id=$_GET["id"];
 mysqli_set_charset($link, "utf8");

 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM films WHERE id='$id'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            echo "<div class=\" row mx-auto text-center text-white\">\n";
            echo "        <h1 class=\" mt-1\">Détails</h1>\n";
            echo "        <figure class=\" centrage figure \">\n";
            echo "            <img src=\"".$row['affiche']."\" class=\"figure-img img-fluid rounded \" alt=\"...\" style=\"width: 23rem;\">\n";
            echo "        </figure>\n";
            echo "        <div class=\" row mx-auto text-center text-white\">\n";
            echo "            <h1 class=\" mt-1\">Titre : ".$row['titre']."</h1>\n";
            echo "        </div>\n";
            echo "        <div class=\" row mx-auto text-center text-white\">\n";
            echo "            <h3 class=\" mt-1\">Réalisateur : </h3>\n";
            echo "            <p>".$row['realisateur']."</p>\n";
            echo "        </div>\n";
            echo "    </div>\n";
            echo "    <div class=\" row mx-auto text-center text-white\">\n";
            echo "        <h3 class=\" mt-1\">Acteur(s) : </h3>\n";
            echo "        <p>".$row['acteurs']."</p>\n";
            echo "    </div>\n";
            echo "    <div class=\" row mx-auto text-center text-white\">\n";
            echo "        <h3 class=\" mt-1\">Date de sortie : </h3>\n";
            echo "        <p>".$row['date']."</p>\n";
            echo "    </div>\n";
            echo "    <div class=\" row mx-auto text-center text-white \">\n";
            echo "        <h3 class=\" mt-1\">Synopsis et détails : </h3>\n";
            echo "        <p>".$row['synopsis']."</p>\n";
            echo "    </div>\n";
            echo "    <div class=\"   text-white\">\n";
            echo "        <h2 class=\" text-center mt-1\">Bande annonce ↓ </h2>\n";
            echo "<iframe class=\"row mx-auto mb-4 \" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$row['video']."\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";  
        }
       
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
    
    </div>
</body>

</html>