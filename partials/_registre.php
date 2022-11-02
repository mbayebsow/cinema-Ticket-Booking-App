<form id="register-form"  class="form-container">
  <h1 id="jshdvjh">Inscription</h1>
  <div class="form-group">
    <input id="first_name" type="text" class="form-control" placeholder="Prenom" name="first_name"/>
    <input id="last_name" type="text" class="form-control" placeholder="Nom" name="last_name"/>
  </div>
  <div class="form-group">
    <input id="phone" type="number" class="form-control" placeholder="Téléphone" name="phone"/>
  </div>
  <div class="form-group">
    <input id="rpassword" type="password" class="form-control" placeholder="Mot de passe" name="rpassword"/>
    <input id="cpassword" type="password" class="form-control" placeholder="Retaper le mot de passe" name="cpassword"/>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-default" name="register_button" id="btn-submit">S'inscrire</button> 
  </div> 
  <div id="connexion" onclick="connexion()"  class="cmt">Vous avez deja un compte? Se Connectez ici!</div>
</form>

<script>
  $('document').ready(function() {   
    $("#register-form").validate({
      rules:{
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        rpassword: {
          required: true,
          minlength: 6,
          maxlength: 15
        },
        cpassword: {
          required: true,
          equalTo: '#rpassword'
        },
        phone: {
          required: true,
        },
      },
      messages: {
        first_name: "veuillez entrer un prenom correct",
        last_name: "veuillez entrer un nom correct",
        rpassword:{
          required: "veuillez fournir un mot de passe",
          minlength: "le mot de passe comporte au moins 6 caractères"
        },
        phone: "S'il vous plaît, mettez un numéro valide",
        cpassword:{
          required: "merci de retaper votre mot de passe",
          equalTo: "le mot de passe ne correspond pas !"
        }
      },
      submitHandler: submitForm 
    });  
      /* handle form submit */
    function submitForm() {  
      var data = $("#register-form").serialize();    
      $.ajax({    
        type : 'POST',
        url  : 'partials/login_registre_api.php',
        data : data,
        beforeSend: function() { 
          $("#btn-submit").html('Verification des saisis ...');
        },
        success : function(dataresponse){
          var result = jQuery.parseJSON(dataresponse);

          if (result.code == 200){
            $('#jshdvjh').html(result.message);
            setCookie("session_id",result.id,30);

            setTimeout(function() { 
              closeForm();
              function timedRefresh(timeoutPeriod) {
                setTimeout("location.reload(true);",timeoutPeriod);
              }
              window.onload = timedRefresh();
            }, 2000);

          }
          else if (result.code == 201){
            $('#jshdvjh').html(result.message);
            $("#btn-submit").html('S\'inscrire');
          }
        }
      });
      return false;
    }
  });
</script>