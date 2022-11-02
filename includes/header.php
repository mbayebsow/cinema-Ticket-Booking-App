<?php 
include('partials/connection.php'); 
setlocale(LC_TIME, "fr_FR");
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>ccos</title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1 viewport-fit=cover">
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
            <meta name="apple-mobile-web-app-status-bar" content="#ffffff">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="icon" href=".#" type="image/x-icon" />  
            <meta name="theme-color" content="#ffffff"> 
            <link rel="apple-touch-icon" href="/src/img/logo-2.png">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <link rel="stylesheet" href="/src/css/loader.css"/>
            <link rel="stylesheet" href="/src/css/app.css?v=0"/>
            <script src="/src/js/jquery.min.js"></script>
            <script type="text/javascript" src="/src/js/app.js?v=0"></script>
            <script src="/src/js/validation.min.js"></script>
            <link rel="manifest" href="../manifest.json"/>
        </head>
    <body>
    <?php 
        if(isset($_GET['src'])){
            include('includes/cataloguenav.php');
        }
        else {
            include('includes/homenav.php');
        }
    ?>
