<?php
    if(isset($_GET['src']) & isset($_GET['id'])){
        include('includes/header.php');
        $catid = $_GET['id'];

        if ($_GET['src'] == 'prog') {
            include('pages/_poster_prog.php');
        }
        elseif ($_GET['src'] == 'comming') {
            include('pages/_poster_comming.php');
        };
        
    }
?>