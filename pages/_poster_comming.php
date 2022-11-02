<?php
    if(isset($_GET['src'])){
 
        $query_comming = "SELECT * FROM a_venir WHERE id = '$catid'";
        $run_query_comming = $conn->query($query_comming);
        while($row_comming = $run_query_comming->fetch_assoc()) {
            $date_dispo = $row_comming['date_dispo'];
            $catalogue_id_comming = $row_comming['catalogue_id'];

            $query = "SELECT * FROM catalogues WHERE id = '$catalogue_id_comming'";
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
                        if ($annee != 'NULL'){?>
                            <div class="cat_detail annee">
                                <i class="fas fa-calendar-day"></i><span>Année</span><?php echo $annee ?>
                            </div>
                            <?php 
                        }
                        if ($note != 'NULL'){?>
                            <div class="cat_detail note">
                                <i class="fas fa-clock"></i><span>Note</span><?php echo $note ?>
                            </div>
                            <?php 
                        }
                        ?>
                        <div class="cat_detail dispo">
                            <span>Disponible</span><?php echo strftime("%a %d %b", strtotime($date_dispo)) ?>
                        </div>
                    <?php 
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
            </div>

        </div>
    <?php }
?>