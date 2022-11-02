<form id="login-form" class="form-container">
  <h1>Connection</h1>
  <input id="user_email" class="form-control" placeholder="Entrez votre téléphone ou email" type="text" name="user_email" required>
  <input id="password" class="form-control" placeholder="Votre mot de passe" type="password" name="password" required>
  <button id="login_button" name="login_button" type="submit" class="btn">Se connecter</button>
  <div id="inscription" onclick="inscription()" class="cmt">Vous n'avez pas de compte? S'inscrire ici!</div>
</form>
  <script>
  $('document').ready(function() { 
    $("#login-form").validate({
      rules: {
        password: {
          required: true,
        },
        user_email: {
          required: true,
        },
      },
      messages: {
        password:{
          required: "S'il vous plait entrez votre mot de passe"
        },
        user_email: "Veuillez saisir votre adresse e-mail",
      },
      submitHandler: submitForm	
    });	   
    /* Handling login functionality */
    function submitForm() {		
      var data = $("#login-form").serialize();			
      $.ajax({				
        type : 'POST',
        url  : 'partials/login_registre_api.php',
        data : data,
        beforeSend: function(){	
          $("#login_button").html('Connexion en cour ...');
        },
        success : function(dataresponse){
          var result = jQuery.parseJSON(dataresponse);

          if (result.code == 200){
            Alert()
            $("#alert").html(result.message)
            setCookie("session_id",result.id,30);
            UserPage()
            setTimeout(function() { 
              closeForm();
            }, 2000);
          }
          else if (result.code == 201){
            Alert()
            $("#alert").html('<div class="alert-danger">'+result.message+'!</div>')
            $("#login_button").html('Se connecter');
          }
          else if (result.code == 202){
            Alert()
            $("#alert").html('<div class="alert-danger">'+result.message+'!</div>')
            $("#login_button").html('Se connecter');
          }
        }
      });
      return false;
    }   
  });	
</script>