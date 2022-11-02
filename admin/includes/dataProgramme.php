<?php
	require 'connection.php';
	
	if(ISSET($_POST['res'])){
		$query = mysqli_query($conn, "SELECT * FROM programmes ORDER BY id DESC") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
			setlocale(LC_TIME, "fr_FR");
			echo 
			"<tr>
				<td>".$fetch['catalogue_id']."</td>
				<td>".strftime("%a %d %b", strtotime($fetch['jour']))." à ".$fetch['heure_debut']."</td>
				<td>".$fetch['date_id']."</td>
				<td>".$fetch['salle_id']."</td>
				<td>".$fetch['prix_adulte']."</td>
				<td>".$fetch['prix_enfant']."</td>
				<td><div class='progress'><div class='progress-bar bg-success' role='progressbar' style='width: 65%;' aria-valuenow='65' aria-valuemin='0' aria-valuemax='100'></div></div></td>
			</tr>";
		}
	}
?>