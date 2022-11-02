<?php
include('connection.php');
$errorMSG = "";

if (empty($_POST["titre"])) {
    $errorMSG = "Name is required";
} else {
    $titre = $_POST["titre"];
}

if (empty($_POST["annee"])) {
    $errorMSG = "annee is required";
}else {
    $annee = $_POST["annee"];
}

if (empty($_POST["duree"])) {
    $errorMSG = "duree is required";
} else {
    $duree = $_POST["duree"];
}

if (empty($_POST["image"])) {
    $errorMSG = "image is required";
} else {
    $image = $_POST["image"];
}

if (empty($_POST["genre"])) {
    $errorMSG = "genre is required";
} else {
    $genre = $_POST["genre"];
}
$description = $_POST["description"];
$note = $_POST["note"];
$trailer = $_POST["trailer"];


if(empty($errorMSG)){
    $query_catalog = "INSERT INTO catalogues(titre, description, annee, dure, image, genre, note, bande_annonce) VALUES ('$titre','$description','$annee','$duree','$image','$genre','$note','$trailer')";
    $post_catalog = mysqli_query($conn , $query_catalog) or die(mysqli_error($conn));
    $msg = "Catalogue enregistrer avec succes.";
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
   
}
echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

?>