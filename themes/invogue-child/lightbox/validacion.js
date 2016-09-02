$(document).ready(function () {

});
function validar() {
    var valido = true;
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    valido = valido && valida_nombre(nombre);
    valido = valido && validateEmail(email);
    return valido;
}
function valida_nombre(name) {
    var alphaExp = /^[a-zA-Z]+$/;
    if (name !== 'undefined' && name.match(alphaExp)) {
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
        alert("mail inválido");
        return false;
    }
     alert("mail válido");
    return true;
}