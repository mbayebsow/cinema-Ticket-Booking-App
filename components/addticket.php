<?php
    $num = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

    if(isset($_GET['id'])){
        include('../partials/connection.php');
        $catid = $_GET['id'];

        $query_prog = "SELECT * FROM programmes WHERE id = '$catid'";
        $run_query_prog = $conn->query($query_prog);
        while($row_prog = $run_query_prog->fetch_assoc()) {
            $programme_id = $row_prog['id'];
            $catalogue_id_prog = $row_prog['catalogue_id'];
            $jour_prog = $row_prog['jour'];
            $heure_debut_prog = $row_prog['heure_debut'];
            $date_id_prog = $row_prog['date_id'];
            $salle_id_prog = $row_prog['salle_id'];
            $prix_adulte_prog = $row_prog['prix_adulte'];
            $prix_enfant_prog = $row_prog['prix_enfant'];

            $query = "SELECT * FROM catalogues WHERE id = '$catalogue_id_prog'";
            $run_query = $conn->query($query);
            while($row = $run_query->fetch_assoc()) {
                $titre = $row['titre'];
                $description = $row['description'];
                $annee = $row['annee'];
                $duree = $row['dure'];
                $image = $row['image'];
                $genre = $row['genre'];
                $note = $row['note'];
                $trailer = $row['bande_annonce'];
            }
        }
    }
?>
<div class="tik_container">
    <div class="prix-total">TOTAL : <div id="prix-total"></div></div>
    <div class="row_container">
        <div class="row adulte">
            <div class="tik_detail prix_adulte">
                <span>Adulte : </span><?php echo $prix_adulte_prog ?> FCFA
            </div>
            <div id="counter-one" class="counter" min="1" max="10" step="1"></div>
        </div>
        <div class="row enfant">
            <div class="tik_detail prix_enfant">
                <span>Enfant : </span><?php echo $prix_enfant_prog ?> FCFA
            </div>
            <div id="counter-two" class="counter" min="0" max="10" step="1"></div>
        </div>
    </div>
    <button id="ValidatTicket" class="btn buy_ticket">ACHETER</button>
</div>

<script type="text/javascript" src="src/js/plugin.js"></script>
<script type="text/javascript">
    $("#counter-one").htmlNumberSpinner();
    $("#counter-two").htmlNumberSpinner();

    function TotalPrice() {
        valuea = $("#counter-one").getSpinnerValue();
        prixa = <?php echo $prix_adulte_prog ?>;
        totala = (prixa * valuea);
        valuee = $("#counter-two").getSpinnerValue();
        prixe = <?php echo $prix_enfant_prog ?>;
        totale = (prixe * valuee);
        total = (totala + totale)
        $('#prix-total').text(total + ' FCFA');
    }
    setInterval(TotalPrice, 100);

    $(document).ready(function() {
        $("#ValidatTicket").click(function(){
            $.ajax({				
                type : 'POST',
                url  : 'partials/postticket.php',
                data: {
                    nticket: '<?php echo $num ?>',
                    user: SessionId,
                    pid: '<?php echo $programme_id ?>',
                    qa: valuea,
                    qe: valuee,
                    pmid: 'NULL',
                    tid: '1'
                },
                success : function(dataresponse){
                    var result = jQuery.parseJSON(dataresponse);

                    if (result.code == 200){
                        $('#modaledata').html(result.message);
                    }
                    else if (result.code == 201){
                        
                    }
                    else if (result.code == 202){
                        
                    }
                }
            });
        });
    });
</script>

