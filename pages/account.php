<?php 
    require_once '../vendor/autoload.php';
    use YoHang88\LetterAvatar\LetterAvatar;		
    include('../partials/connection.php'); 

    if(isset($_COOKIE["session_id"])) {

        $cookie = $_COOKIE["session_id"];
        $query_user = "SELECT * FROM users WHERE id = '$cookie'" ; 
        $result_user = mysqli_query($conn , $query_user);
        if (mysqli_num_rows($result_user) > 0 ) {
            $row = mysqli_fetch_array($result_user);
            $userid = $row['id'];
            $userprenom = $row['prenom'];
            $usernom = $row['nom'];
            $usertelephone = $row['telephone'];
            $useremail = $row['email'];
            $userprofile = $row['profile'];
        }
        $avatarImage = '';
        if($userprofile != NULL) {
            $avatarImage = $userprofile;
        } else {
            $memberName = $userprenom;
            $avatarImage = new LetterAvatar($memberName, 'circle', 200);
        }
        ?>
            <div id="page-wrapper">
                <div class="jhsdcvhqvdcg">
                    <img class="kjdbcouyqdc" src="<?php echo $avatarImage; ?>">
                </div>
                <div class="dhchjbedhje flex">
                    <div class="ejhfbjehvfhu" id="bookmark">
                        <i class="fas fa-bookmark"></i>
                        <div class="hgfdhcg">Mes favoris</div>
                    </div>
                    <div class="ejhfbjehvfhu" id="invoice">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <div class="hgfdhcg">Historique</div>
                    </div>
                </div>
                <div class="jggjhghdsf">
                    <div class="jshdvjhvbhj">
                        <div class="hgfdhcg">Pronom & nom</div>
                        <div class="jshdkfgs"><?php echo $userprenom.' '.$usernom ?> </div>
                    </div>
                    <div class="jshdvjhvbhj">
                        <div class="hgfdhcg">Numéro de téléphone</div>
                        <div class="jshdkfgs"><?php echo $usertelephone ?> </div>
                    </div>
                    <div class="jshdvjhvbhj">
                        <div class="hgfdhcg">Adresse mail</div>
                        <div class="jshdkfgs"><?php echo $useremail ?> </div>
                    </div>
                </div>
                    <div id="disconnect" class="dfbsdsqq">Se deconnecter</div>
            </div>
        <?php
    }
    else {
        include('../components/loginbutton.php');
    }
?>
<style>

#header-wrapper {
    display: none;
}
.jhsdcvhqvdcg {
    margin: 0 auto;
    width: 100%;
    height: 120px;
    padding: 5px;
    background: radial-gradient(circle, rgb(253 253 196) 20%, var(--principale-color) 100%);
    text-align: center;
    box-shadow: 0px 0px 15px -2px #0000002c;
    margin-bottom: 70px;
}
.dhchjbedhje {
    margin: 20px 15px;
}
.ejhfbjehvfhu {
    background: #fff;
    padding: 10px;
    border-radius: 20px;
    width: 47%;
    box-shadow: 0px 0px 15px -2px #0000002c;
    text-align: center;
}
.ejhfbjehvfhu .fas {
    background: no-repeat;
    font-size: 25px;
    font-weight: bold;
}
.kjdbcouyqdc {
    width: 120px;
    border-radius: 50%;
    margin: 50px auto;
    border: 2px solid #000000;
    padding: 3px;
    background: #fff;
    box-shadow: 0px 0px 15px -2px #0000002c;
}
.jggjhghdsf {
    padding: 15px;
    margin: 20px 15px;
    box-shadow: 0px 0px 15px -2px #0000002c;
    border-radius: 20px;
    background: #fff;
}
.jshdvjhvbhj {
    margin: 0 10px;
    border-bottom: 1px solid #dbdada;
    padding: 10px 0;
}
.jshdkfgs {
    margin-top: -5px;
}
.dfbsdsqq {
    text-align: center;
    color: #cf0303;
    padding: 10px;
}
</style>