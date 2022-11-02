
<div class="home_data">       
    <?php
        $query_comming = "SELECT * FROM a_venir ORDER BY id DESC";
        $run_query_comming = $conn->query($query_comming);
        while($row_comming = $run_query_comming->fetch_assoc()) {
            $comming_id = $row_comming['id'];
            $catalogue_id_comming = $row_comming['catalogue_id'];
            $date_dispo_comming = $row_comming['date_dispo'];

            $query_cat_comming = "SELECT * FROM catalogues  WHERE id = '$catalogue_id_comming'";
            $run_query_cat_comming = $conn->query($query_cat_comming);
            while($row_cat_comming = $run_query_cat_comming->fetch_assoc()) {
                $catalogue_id = $row_cat_comming['id'];
                $catalogue_titre = $row_cat_comming['titre'];
                $catalogue_description = $row_cat_comming['description'];
                $catalogue_dure = $row_cat_comming['dure'];
                $catalogue_image = $row_cat_comming['image'];
                $catalogue_genre = $row_cat_comming['genre'];
                $catalogue_note = $row_cat_comming['note'];
                $catalogue_bande_annonce = $row_cat_comming['bande_annonce'];
                ?>
                <div class="card coming_card">
                    <a href="posterdetails?src=comming&id=<?php echo $comming_id ?>" >
                        <img class="coming_card_poster" loading="lazy" src="<?php echo $catalogue_image ?>">
                    </a>
                    <div class="catalogue_info">
                        <div class="catalogue_title1">
                            <p class="comming catalogue_genre">Dispo : <?php echo strftime("%a %d %b", strtotime($date_dispo_comming)) ?></p>
                            <h3 class="catalogue_title"><?php echo $catalogue_titre ?></h3>
                            <p class="catalogue_genre"><?php echo $catalogue_genre ?></p>
                        </div>
                        <div class="catalogue_button">
                            <i class="far fa-bookmark"></i>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    ?>
</div>