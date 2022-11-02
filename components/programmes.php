<div class="home_data">       
    <?php
        include('../partials/connection.php'); 
        $query_prog = "SELECT * FROM programmes ORDER BY id DESC";
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

            $query_cat = "SELECT * FROM catalogues  WHERE id = '$catalogue_id_prog'";
            $run_query_cat = $conn->query($query_cat);
            while($row_cat = $run_query_cat->fetch_assoc()) {
                $catalogue_id = $row_cat['id'];
                $catalogue_titre = $row_cat['titre'];
                $catalogue_description = $row_cat['description'];
                $catalogue_dure = $row_cat['dure'];
                $catalogue_image = $row_cat['image'];
                $catalogue_genre = $row_cat['genre'];
                $catalogue_note = $row_cat['note'];
                $catalogue_bande_annonce = $row_cat['bande_annonce'];
                ?>
                <div class="card catalogue_item">
                    <a href="posterdetails?src=prog&id=<?php echo $programme_id ?>" >
                        <img class="catalogue_poster" loading="lazy"src="<?php echo $catalogue_image ?>">
                    </a>
                    <div class="catalogue_info">
                        <div class="catalogue_title1">
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
