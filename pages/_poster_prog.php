<?php
    if(isset($_GET['src'])){

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
        ?>
        <div id="page-wrapper">
            <div class="cat_container" style="background-image: url(<?php echo $image ?>);"></div>
            <div class="blur"></div>
            <div class="cat_top">
                <div class="cat_top_left">
                    <img class="cat_poster" src="<?php echo $image ?>">
                </div>
                <div class="cat_top_right">
                    <?php 
                        if ($duree != 'NULL'){?>
                            <div class="cat_detail duree">
                                <i class="fas fa-stopwatch"></i><span>Durée</span><?php echo $duree ?>
                            </div>
                            <?php 
                        }
                        if ($jour_prog != 'NULL'){?>
                            <div class="cat_detail jour">
                                <i class="fas fa-calendar-day"></i><span>Date</span><?php echo strftime("%a %d %b", strtotime($jour_prog)) ?>
                            </div>
                            <?php 
                        }
                        if ($heure_debut_prog != 'NULL'){?>
                            <div class="cat_detail heure">
                                <i class="fas fa-clock"></i><span>H debut</span><?php echo $heure_debut_prog ?>
                            </div>
                            <?php 
                        }
                        if ($salle_id_prog != 'NULL'){?>
                            <div class="cat_detail salle">
                                <i class="fas fa-image"></i><span>Salle</span><?php echo $salle_id_prog ?>
                            </div>
                            <?php 
                        }
                    ?>
                </div>
            </div>

            <div class="cat_detail_container">
                <?php 
                    if ($trailer != 'NULL'){?>
                        <button class="cat_trailer"><i class="fas fa-play"></i></button>
                        <?php 
                    }
                ?>
                <div class="cat_detail_titre">
                    <?php echo $titre ?>
                </div>
                <div class="cat_detail_genre">
                    <span>Genre : </span><?php echo $genre ?>
                </div>
                <div class="cat_detail_description">
                    <?php echo $description ?>
                </div>
                <div class="cat_detail_bottom">
                    <button type="button" id="buyticket" class="btn add_ticket">ACHETER UN TICKET</button><div class="cata_note"><?php echo $note ?></div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#buyticket").click(function(){
                    modale();
                    $.ajax({
                        method  :   "POST",
                        url     :   "/components/addticket?id=<?php echo $programme_id ?>",
                        success :   function(data){
                            if(data!=""){
                                $('#modaledata').html(data);
                            }
                        }
                    });
                });
            });
        </script>
    <?php }
?>