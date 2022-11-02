<?php
    if(isset($_GET['number'])){
        include_once("../partials/connection.php");
        $ticketnumber = $_GET['number'];

        $query_tickets = "SELECT * FROM tickets WHERE numero_ticket = '$ticketnumber'" ; 
        $result_tickets = $conn->query($query_tickets);
        $row = $result_tickets->fetch_assoc();
        $id = $row['id'];
        $numero_ticket = $row['numero_ticket'];
        $programe_id = $row['programe_id'];
        $qt_adulte = $row['qt_adulte'];
        $qt_enfant = $row['qt_enfant'];
        $promotion_id = $row['promotion_id'];
        $transaction_id = $row['transaction_id'];
        
        $query_prog = "SELECT * FROM programmes WHERE id = '$programe_id'";
        $run_query_prog = $conn->query($query_prog);
        $row_prog = $run_query_prog->fetch_assoc();
        $programme_id = $row_prog['id'];
        $catalogue_id_prog = $row_prog['catalogue_id'];
        $jour_prog = $row_prog['jour'];
        $heure_debut_prog = $row_prog['heure_debut'];
        $date_id_prog = $row_prog['date_id'];
        $salle_id_prog = $row_prog['salle_id'];
        $prix_adulte_prog = $row_prog['prix_adulte'];
        $prix_enfant_prog = $row_prog['prix_enfant'];

        $query_cat = "SELECT * FROM catalogues  WHERE id = '$catalogue_id_prog'";
        $run_query_cat = $conn->query($query_cat);
        $row_cat = $run_query_cat->fetch_assoc();
        $catalogue_id = $row_cat['id'];
        $catalogue_titre = $row_cat['titre'];
        $catalogue_description = $row_cat['description'];
        $catalogue_dure = $row_cat['dure'];
        $catalogue_image = $row_cat['image'];
        $catalogue_genre = $row_cat['genre'];
        $catalogue_note = $row_cat['note'];
        $catalogue_bande_annonce = $row_cat['bande_annonce'];   
        
        $query_salle = "SELECT * FROM salles WHERE id = '$salle_id_prog'";
        $run_query_salle = $conn->query($query_salle);
        $row_salle = $run_query_salle->fetch_assoc();
        $numero = $row_salle['numero'];
        $type_id = $row_salle['type_id'];
        $nombres_de_places = $row_salle['nombres_de_places'];
        ?>
            <div class="ticket">
                <div class="title">
                    <p class="cinema"><?php echo $type_id ?> - <?php echo $catalogue_dure ?></p>
                    <p class="movie-title"><?php echo $catalogue_titre ?></p>
                </div>
                <div class="poster" style="background-image: url(<?php echo $catalogue_image ?>);">
                    <img src='https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $numero_ticket ?>d&choe=UTF-8&chs=500x500'/>
                </div>
                <div class="info">
                    <div class="bigger"><span>SALLE</span><?php echo $numero ?></div>
                    <div class="bigger"><span>ADULTE</span><?php echo $qt_adulte ?></div>
                    <div class="bigger"><span>ENFANT</span><?php echo $qt_enfant ?></div>
                </div>
                <div class="info">
                    <div class="bigger"><span>PRIX</span>12000</div>
                    <div class="bigger"><span>DATE</span><?php echo strftime("%d %b", strtotime($jour_prog)) ?></div>
                    <div class="bigger"><span>HEURE</span><?php echo $heure_debut_prog ?></div>
                </div>
                <div class="serial">
                    <img src='components/barcode.php?codetype=code39&size=50&text=<?php echo $numero_ticket ?>'/>
                </div>
                <p class="cinema"><?php echo $numero_ticket ?></p>
            </div>
        <?php
    }
?>
<style>

.ticket {
    width: 100%;
    height: fit-content;
    background-color: white;
    margin: 25px auto;
    position: relative;
    border-radius: 20px;
    padding: 20px;
    text-align: center;
    box-shadow: 0px 0px 35px 15px #00000031;
}
.ticket .title {
  text-align: left;
}
.poster {
    text-align: center;
    height: 30vh;
    margin: 0px -20px 15px -20px;
    background-size: cover;
    position: relative;
}
.poster img {
    width: 45%;
    height: 62%;
    margin: auto;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
.cinema {
  font-size: 1.5rem;
}
.movie-title {
    font-size: 5vh;
    margin-top: -11px;
}
.info {
    display: flex;
}
.bigger span {
    font-size: 1vh;
    margin-bottom: -5px;
}
.bigger {
    font-size: 3vh;
    display: grid;
    width: -webkit-fill-available;
    margin: 5px;
    border-radius: 10px;
}
.serial {
    padding-top: 30px;
    border-top: dotted 1px #6c6a6a;
    margin-top: 30px;
}
.serial img {
    width: 100%;
    height: 55px;
}
</style>