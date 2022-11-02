<?php
include_once("../partials/connection.php");

if(isset($_POST['nticket'])) {

	$nticket = $_POST['nticket'];
	$user = $_POST['user'];
	$pid = $_POST['pid'];
	$qa = $_POST['qa'];
	$qe = $_POST['qe'];
	$pmid = $_POST['pmid'];
	$tid = $_POST['tid'];

    $query_tickets_registre = "INSERT INTO tickets(numero_ticket, user_id, programe_id, qt_adulte, qt_enfant, promotion_id, transaction_id) VALUES ('$nticket','$user','$pid','$qa','$qe','$pmid','$tid')";
    $tickets_registred = mysqli_query($conn , $query_tickets_registre) or die(mysqli_error($conn));		
    if (mysqli_affected_rows($conn) > 0) {
        $myObj = new stdClass();
        $myObj->code = 200;
        $myObj->message = 'Achat ticket succes!';
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }	 
}
?>