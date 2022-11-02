<?php include('partials/_header.php');?>
    <div class="container-scroller">
      <?php include('partials/_navbar.php');?>
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Catalogue</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <?php 
              $query = mysqli_query($conn, "SELECT * FROM catalogues ORDER BY id DESC") or die(mysqli_error());
              while($fetch = mysqli_fetch_array($query)){
                echo 
                "
                <div class='card' style='width: 11rem;'>
                  <img src=".$fetch['image']." class='card-img-top'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$fetch['titre']."</h5>
                    <a href='#' class='btn btn-primary'>Voir</a>
                  </div>
                </div>
                ";
              }?>
            </div>
          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php include('partials/_js.php');?>
  </body>
</html>