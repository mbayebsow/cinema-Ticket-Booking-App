<?php
include_once("../partials/connection.php");

if(isset($_POST['login_button'])) {
	$user = trim($_POST['user_email']);
	$user_password = trim($_POST['password']);

	$phone = "SELECT * FROM users WHERE telephone = '$user'";
	$resulphone = mysqli_query($conn, $phone);

	$mail = "SELECT * FROM users WHERE email = '$user'";
	$resulmail = mysqli_query($conn, $mail);

	if (mysqli_num_rows($resulphone) == 1){
		$row = mysqli_fetch_assoc($resulphone);
	}
	elseif (mysqli_num_rows($resulmail) == 1) {
		$row = mysqli_fetch_assoc($resulmail);
	}
	else {
		$myObj = new stdClass();
		$myObj->code = 201;
		$myObj->message = 'Identifiant incorect';
		$myJSON = json_encode($myObj);
		echo $myJSON;
		exit;
	}
	if (!password_verify($user_password, $row['mot_de_passe'] )){				
		$myObj = new stdClass();
		$myObj->code = 202;
		$myObj->message = 'Mot de pass incorrect';
		$myJSON = json_encode($myObj);
		echo $myJSON;
	} 
	else {				
		$myObj = new stdClass();
		$myObj->code = 200;
		$myObj->id = $row['id'];
		$myObj->prenom = $row['prenom'];
		$myObj->nom = $row['nom'];
		$myObj->message = 'Connexion avec succes';
		$myJSON = json_encode($myObj);
		echo $myJSON;
	}		
}

if(isset($_POST['register_button'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$pass = $_POST['rpassword'];
	$user_password = password_hash("$pass" , PASSWORD_DEFAULT);

	$sql = "SELECT telephone FROM users WHERE telephone = '$phone'";
	$resultset = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($resultset);	

	if(isset($row['telephone'])){	
		$myObj = new stdClass();
		$myObj->code = 201;
		$myObj->message = 'Le numéro entré existe déjà';
		$myJSON = json_encode($myObj);
		echo $myJSON;
	} 
	else {				
		$query_users_registre = "INSERT INTO users(prenom, nom, telephone, email, mot_de_passe, profile) VALUES ('$first_name','$last_name','$phone','','$user_password','')";
		$users_registred = mysqli_query($conn , $query_users_registre) or die(mysqli_error($conn));		
		if (mysqli_affected_rows($conn) > 0) {

			$phone = "SELECT * FROM users WHERE telephone = '$phone'";
			$resulphone = mysqli_query($conn, $phone);
			$row = mysqli_fetch_assoc($resulphone);

			$myObj = new stdClass();
			$myObj->code = 200;
			$myObj->id = $row['id'];
			$myObj->prenom = $row['prenom'];
			$myObj->nom = $row['nom'];
			$myObj->message = 'Inscription avec succes';
			$myJSON = json_encode($myObj);
			echo $myJSON;
		}	 
	}
}
?>