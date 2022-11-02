<?php
    include('includes/header.php');
    if (isset($_REQUEST["m"])){
        include("imdb.php");
        $movieName = $_REQUEST["m"];
        $i = new Imdb();
        $mArr = $i->getMovieInfo($movieName);
        //print_r($mArr['genres']);
        $pattern = array('/"/', "/'/"); 
        $replace = array('', '');
        ?>
        <div id="header-wrapper">
            <form class="form_search" method="post" action="" onsubmit="return do_search();">
                <input type="text" id="search_term" name="search_term" placeholder="Recherchez" onkeyup="do_search();">
            </form>
        </div>
        <div class="poster_result">
            <div class="poster_result_top">
                <div class="row_poster">
                    <img class="poster_result_poster" src="<?php echo $mArr['poster_large'] ?>">
                </div>
                <div class="row_details">
                    <p class="poster_details year"><?php echo $mArr['year'] ?></p>
                    <p class="poster_details duration"><?php echo $mArr['runtime'] ?></p>
                    <p class="poster_details rating"><?php echo $mArr['rating'] ?></p>
                </div>
            </div>
            <h1 class="poster_result_title"><?php echo $mArr['title'] ?></h1>
            <p class="poster_result_genre"></p>
            <p class="poster_result_description"><?php echo $mArr['description']; ?></p>

            <form role="form" id="CatalogPost" data-toggle="validator" class="shake">
                <input type="hidden" id="CatalogTitre" value="<?php echo $mArr['title'] ?>">
                <input type="hidden" id="CatalogDesc" value="<?php echo preg_replace($pattern, $replace, $mArr['description']); ?>">
                <input type="hidden" id="CatalogAnnee" value="<?php echo $mArr['year'] ?>">
                <input type="hidden" id="CatalogDuree" value="<?php echo $mArr['runtime'] ?>">
                <input type="hidden" id="CatalogImage" value="<?php echo $mArr['poster_large'] ?>">
                <input type="hidden" id="CatalogGenre" value="NULL">
                <input type="hidden" id="CatalogNote" value="<?php echo $mArr['rating'] ?>">
                <input type="hidden" id="CatalogTrailer" value="NULL">
                <button type="submit" id="submit" class="btn post_catalog"><i class="fa fa-check"></i> POSTER</button>
            </form>
        </div>
        <?php
    }
?>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function(e){
            e.preventDefault();
            var titre = $("#CatalogTitre").val();
            var description = $("#CatalogDesc").val();
            var annee = $("#CatalogAnnee").val();
            var duree = $("#CatalogDuree").val();
            var image = $("#CatalogImage").val();
            var genre = $("#CatalogGenre").val();
            var note = $("#CatalogNote").val();
            var trailer = $("#CatalogTrailer").val();
            $.ajax({
                type: "POST",
                url: "/includes/catalogPost.php",
                dataType: "json",
                data: {titre:titre, description:description, annee:annee, duree:duree, image:image, genre:genre, note:note, trailer:trailer},
                success : function(data){
                    if (data.code == "200"){
                        $("#alert_notif").html("<p>"+data.msg+"</p>");
                        $("#alert_notif").css("display","block");
                        $("#alert_notif").removeClass("alert-danger");
                    } else {
                        $("#alert_notif").addClass("alert-danger");
                        $("#alert_notif").html("<p>"+data.msg+"</p>");
                        $("#alert_notif").css("display","block");
                    }
                }
            });
            $('#alert_notif').delay(3000).fadeOut('slow');
        });
    });
</script>
</html>