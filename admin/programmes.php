<?php include('partials/_header.php');?>
<?php             
$query_cat = "SELECT id, titre FROM catalogues";
$fetch_cat = mysqli_query($conn, $query_cat) or die(mysqli_error($conn));

$query_salle = "SELECT id, numero FROM salles";
$fetch_salle = mysqli_query($conn, $query_salle) or die(mysqli_error($conn));

$query_semaine = "SELECT id, nom FROM dates";
$fetch_semaine = mysqli_query($conn, $query_semaine) or die(mysqli_error($conn));
?>
    <div class="container-scroller">
      <?php include('partials/_navbar.php');?>
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="form-inline_c">
                      <div class="form-group_c">
                        <label for="exampleInputUsername1">Catalogue</label>
                        <select class="form-control" name="catalogue" id="catalogue">
                            <?php while ($catalogue = mysqli_fetch_array($fetch_cat)) { ?>
                              <option value="<?php echo $catalogue['id']; ?> "> <?php echo $catalogue['titre']; ?></option>
                              <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputUsername1">Salle</label>
                        <select class="form-control" name="catalogue" id="salle">
                            <?php while ($salle = mysqli_fetch_array($fetch_salle)) { ?>
                              <option value="<?php echo $salle['id']; ?> "> <?php echo $salle['numero']; ?></option>
                              <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputUsername1">Semaine</label>
                        <select class="form-control" name="catalogue" id="date">
                            <?php while ($semaine = mysqli_fetch_array($fetch_semaine)) { ?>
                              <option value="<?php echo $semaine['id']; ?> "> <?php echo $semaine['nom']; ?></option>
                              <?php
                            }
                            ?>
                        </select>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputPassword1">Jour</label>
                        <input type="date" class="form-control" id="jour"/>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputConfirmPassword1">Heure</label>
                        <input type="time" class="form-control" id="heure"/>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputConfirmPassword1">Prix adulte</label>
                        <input type="number" class="form-control" id="prixa"/>
                      </div>
                      <div class="form-group_c">
                        <label for="exampleInputConfirmPassword1">Prix enfant</label>
                        <input type="number" class="form-control" id="prixe"/>
                      </div>
                      <button type="button" id="save" class="btn btn-primary mb-2"><span class="glyphicon glyphicon-save"></span> Save</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Programe de la semaine</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Catalogue</th>
                            <th>Jour & heure</th>
                            <th>Semaine</th>
                            <th>Salle</th>
                            <th>Prix adulte</th>
                            <th>Prix enfant</th>
                            <th>N Tickets</th>
                          </tr>
                        </thead>
                        <tbody id="data"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include('partials/_js.php');?>
  </body>
</html>