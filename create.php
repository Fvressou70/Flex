 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="create.php" method="post">
    <p>
        <label for="affiche">Affiche:</label>
        <input type="text" name="affiche" id="affiche">
    </p>
    <p>
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre">
    </p>
    <p>
        <label for="resume">Resume:</label>
        <input type="text" name="resume" id="resume">
    </p>
    <p>
        <label for="realisateur">Realisateur:</label>
        <input type="text" name="realisateur" id="realisateur">
    </p>
    <p>
        <label for="acteurs">Acteurs:</label>
        <input type="text" name="acteurs" id="acteurs">
    </p>
    <p>
        <label for="date">Date:</label>
        <input type="text" name="date" id="date">
    </p>
    <p>
        <label for="synopsis">Synopsis:</label>
        <input type="text" name="synopsis" id="synopsis">
    </p>
    <p>
        <label for="video">Video:</label>
        <input type="text" name="video" id="video">
    </p>
    <input type="submit" value="Submit">
</form>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Fvressougawton470", "flex_films");
 /* Modification du jeu de résultats en utf8 */
mysqli_set_charset($link, "utf8");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$affiche = mysqli_real_escape_string($link, $_REQUEST['affiche']);
$titre = mysqli_real_escape_string($link, $_REQUEST['titre']);
$resume = mysqli_real_escape_string($link, $_REQUEST['resume']);
$realisateur = mysqli_real_escape_string($link, $_REQUEST['realisateur']);
$acteurs = mysqli_real_escape_string($link, $_REQUEST['acteurs']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$synopsis = mysqli_real_escape_string($link, $_REQUEST['synopsis']);
$video = mysqli_real_escape_string($link, $_REQUEST['video']);
 if (empty($affiche)&&empty($titre)&&empty($resume)&&empty($realisateur)&&empty($acteurs)&&empty($date)&&empty($synopsis)&&empty($video)) {
     
 }else {
    // Attempt insert query execution
$sql = "INSERT INTO films (affiche, titre, resume, realisateur, acteurs, date, synopsis, video ) VALUES ('$affiche', '$titre', '$resume', '$realisateur', '$acteurs', '$date', '$synopsis', '$video')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 }

 
// Close connection
mysqli_close($link);
?>
</body>
</html>
