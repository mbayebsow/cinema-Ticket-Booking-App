
async function registerSW() {
    if ('serviceWorker' in navigator) {
        try {
            await navigator
            .serviceWorker
            .register('sw.js');
        }
        catch (e) {
            console.log('SW registration failed');
        }
    }
}
$(function(){
    $(window).scroll(function(){
    if($(window).scrollTop()){
        $("#header-wrapper").addClass("background")
    } else{
        $("#header-wrapper").removeClass("background")
    }
    });
});
// BOUTTON DE CONNEXION
$("#btnconnect").click(function () {
    modale()
    inscription();
});

// COOKIES
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
setCookie("session_id",1,30);
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var SessionId = getCookie("session_id");

// SPINNER LOADER
function spinner() {
    $("#page-wrapper").append('<div id="spinner"><svg viewBox="0 0 50 50"><circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle></svg></div>');
    $(window).load(function() {
        $('#spinner').remove();
    });
}

// ALERT
function Alert() {
    $("body").append('<div id="alert"></div>');
    setTimeout(function() { 
        $("#alert").remove();
    }, 3000);
    $("#spinner").remove();
}

// OPEN & CLOSE MODALE
function modale() {
    $("body").append('<div class="modale" id="modale"><div class="fbdbdgnq"><i class="fas fa-times" onclick="closeForm()"></i><div id="modaledata"></div></div> </div>');
    $('#spinner').remove();
}
function closeForm() {
    $('#modale').remove();
}

// CONNEXION & INSCRIPTION
function connexion() {
    $.ajax({
        method  :   "POST",
        url     :   "partials/_login.php",
        success :   function(data){
            $('#modaledata').html(data);
        }
    });
}
function inscription() {
    $.ajax({
        method  :   "POST",
        url     :   "partials/_registre.php",
        success :   function(data){
            $('#modaledata').html(data);
        }
    });
}

// PAGE DE NAVIGATION
function HomePage() {
    $.ajax({
        method  :   "POST",
        url     :   "pages/home.php",
        beforeSend: function(){	
            spinner()
        },
        success : function(data){
            $('#page-wrapper').html(data);
            $("#menuactive").animate({left: '10px'});
            $("#menuactive").css("right", "initial");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            Alert()
            $("#alert").html("<div class='alert-danger'>Impossible d'obtenir les données, vérifier votre connection internet! </div> ")
         }
    });
}
function TicketPage() {
    $.ajax({
        method  :   "POST",
        url     :   "pages/tickets.php",
        beforeSend: function(){	
            spinner()
        },
        success : function(data){
            $('#page-wrapper').html(data);
            $("#menuactive").animate({right: '33.33%'});
            $("#menuactive").css("left", "initial");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            Alert()
            $("#alert").html("<div class='alert-danger'>Impossible d'obtenir les données, vérifier votre connection internet! </div> ")
         }
    });
}
function UserPage() {
    $.ajax({
        method  :   "POST",
        url     :   "pages/account.php",
        beforeSend: function(){	
            spinner()
        },
        success : function(data){
            $('#page-wrapper').html(data);
            $("#menuactive").animate({right: '10px'});
            $("#menuactive").css("left", "initial");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            Alert()
            $("#alert").html("<div class='alert-danger'>Impossible d'obtenir les données, vérifier votre connection internet! </div> ")
         }
    });
}

// TICKET

