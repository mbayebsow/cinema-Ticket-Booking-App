<?php
    if(isset($_COOKIE["session_id"])) {
        include_once("../partials/connection.php");
        $cookie = $_COOKIE["session_id"];

        $query_tickets = "SELECT * FROM tickets WHERE user_id = '$cookie'" ; 
        $result_tickets = $conn->query($query_tickets);
        while($row = $result_tickets->fetch_assoc()) {
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
                <div class="item"  onclick="Ticket<?php echo $numero_ticket ?>()">
                    <div class="item-right" style="background-image: url(<?php echo $catalogue_image ?>);">
                        <div class="kjbjshd">
                            <p class="fhfhgf">Salle<span><?php echo $numero ?></span></p>
                            <p class="fhfhgf">Type<span><?php echo $type_id ?></span></p>
                        </div>
                    </div>
                    <span class="dotted"></span>
                    <div class="item-left">
                        <img src='components/barcode.php?codetype=code39&size=50&text=<?php echo $numero_ticket ?>&orientation=vertical'/>
                        <p class="event">#<?php echo $numero_ticket ?></p>
                        <h2 class="title"><?php echo $catalogue_titre ?></h2>
                        <div class="sce">
                            <p><?php echo strftime("%a %d %B", strtotime($jour_prog)) ?> <br/> <?php echo $heure_debut_prog ?> - <?php echo $catalogue_dure ?></p>
                        </div>
                    </div>
                    <script>
                        function Ticket<?php echo $numero_ticket ?>() {
                            modale()
                            var ticket = <?php echo $numero_ticket ?>;
                            $( "#modaledata" ).load( "partials/ticketdetails.php?number="+ticket, 
                            function( response, status, xhr ) {
                                if ( status == "error" ) {
                                    $( "#modaledata" ).html( "<span class='red'>Recupération des données imposible !<br>Resseyaez plutard.</span>" );
                                }
                            });
                        };
                    </script>
                </div>
            <?php
        }
    }
    else {
        include('../components/loginbutton.php');
    }
?>
<style>
.item {
    width: calc(100% - 30px);
    background: var(--white-color);
    overflow: hidden;
    margin: 15px;
    display: flex;
    border-radius: 20px;
    box-shadow: 0px 0px 23px -9px #00000031;
}
  .item-right, .item-left {
    float: left;
    padding: 20px 
  }
  .item-right {
    width: 25%;
    position: relative;
    height: auto;
    background-size: cover;
    color: #fff;
}
  .item-left {
    width: 75%;
    position: relative;
    
  } 
  .item-left img {
    position: absolute;
    width: 12%;
    margin: auto 0;
    top: 0;
    bottom: 0;
    right: 15px;
    border-radius: 0;
    background: #fff;
    padding: 3px;
    height: 82%;
    border-radius: 10px;
}
.kjbjshd {
    position: absolute;
    background: #00000099;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 15px;
}
.fhfhgf {
    display: grid;
    width: fit-content;
    margin: auto;
    text-align: center;
}
.fhfhgf span {
    font-size: 3rem;
    margin-top: -11px;
}
span.dotted {
    border-left: 3px dotted #eff1f3;
    margin-left: -1px;
    position: initial;
    z-index: 0;
}
  .item-right .up-border, .item-right .down-border {
      padding: 10px;
      background-color: #eff1f3;
      border-radius: 50%;
      position: absolute
  }
  .item-right .num {
    font-size: 50px;
    text-align: center;
}
  .item-right .day, .item-left .event {
    font-size: 15px;
  }
  .item-right .day {
    text-align: center;
    font-size: 25px;
  }
  .item-left .title {
    font-size: 25px;
  }
  .item-left .sce {
    display: flex;
  }
  .item-left .sce .icon, .item-left .sce p, .fix {
    clear: both;
    margin-right: 10px;
    font-size: 12px;
}
  .item .tickets, .booked, .cancel{
      color: #fff;
      padding: 6px 14px;
      float: right;
      margin-top: 10px;
      font-size: 18px;
      border: none;
      cursor: pointer
  }
  .item .tickets {background: #777}
  .item .booked {background: #3D71E9}
  .item .cancel {background: #DF5454}
  .linethrough {text-decoration: line-through}

</style>