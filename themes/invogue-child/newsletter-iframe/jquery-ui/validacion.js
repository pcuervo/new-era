$(document).ready(function () {

});
function validar() {
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var valido_nombre = valida_nombre(nombre);
    var valido_nombre = validateEmail(email);
    var valido_equipos = valida_equipos();
    if (valido_nombre && valido_nombre && valido_equipos) {
        document.getElementById("suscribirse").action = "https://app.getresponse.com/add_subscriber.html";
         document.getElementById("suscribirse").submit(); 
    }
}
function valida_nombre(name) {
    var alphaExp = /^[a-zA-Z]+$/;
    if (name !== 'undefined' && name.match(alphaExp)) {
         document.getElementById('error-nombre').innerText = '';
        return true;
    } else {
        document.getElementById('error-nombre').innerText = '¿Cómo podemos llamarte?';
        //name.focus();
        return false;
    }
}
function validateEmail(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(re)) {
        document.getElementById('error-email').innerText = 'Email inválido';
        //alert("mail inválido");
        return false;
    }
   document.getElementById('error-email').innerText = '';
    return true;
}

function valida_equipos() {
    alert($('input[type="checkbox"]').prop("checked"));
    if($('input[type="checkbox"]').prop("checked") === false){
       // alert("error equipos");
        document.getElementById('error-equipos').innerText = 'Selecciona al menos uno de tus equipos favoritos';
        return false;
    }else{
         document.getElementById('error-equipos').innerText = '';
    }
    return true;
}