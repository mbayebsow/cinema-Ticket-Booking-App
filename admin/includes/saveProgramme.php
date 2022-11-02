<?php
	require_once 'connection.php';

	$catalogue = $_POST['catalogue'];
	$jour = $_POST['jour'];
	$heure = $_POST['heure'];
	$date = $_POST['date'];
	$salle = $_POST['salle'];
	$prixa = $_POST['prixa'];
	$prixe = $_POST['prixe'];

	
	$query_catalog = "INSERT INTO programmes(catalogue_id, jour, heure_debut, date_id, salle_id, prix_adulte, prix_enfant) VALUES('$catalogue', '$jour', '$heure', '$date', '$salle', '$prixa', '$prixe')";
	$post_catalog = mysqli_query($conn , $query_catalog) or die(mysqli_error($conn));

	echo "Data Sent!";
?>