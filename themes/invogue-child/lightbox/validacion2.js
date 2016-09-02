
$(document).ready(function () {
    navega(1, 9, 1, 7);
    //var json = '["e5b0b29c456930f8cd14bb5867c27922", {"campaign": "n4gDm", "name":"Fabiola","email": "n4gDm"}]';
    //var json ={"jsonrpc":"2.0","method":"add_contact","params":["e5b0b29c456930f8cd14bb5867c27922",{"name": "Jan Kowalski","email": "fabiola@cliento.mx", "campaign": "45661801"}]};
    // var json =["e5b0b29c456930f8cd14bb5867c27922",{"name": "Jan Kowalski","email": "fabiola@cliento.mx", "campaign": "45661801"}];
    // post_call ("https://api2.getresponse.com/",json);

    //   selecciona_equipo();
});
function validar() {
    var nombre = $("#name").val();
    var email = $("#email").val();
    var valido_nombre = valida_nombre(nombre);
    var valido_nombre = validateEmail(email);
    var valido_equipos = valida_equipos();
    if (valido_nombre && valido_nombre && valido_equipos) {
        transforma_opciones_cadena("futbol");
        /**document.getElementById("suscribirse").action = "https://app.getresponse.com/add_subscriber.html";
         $(".fancybox-close").click();
         document.getElementById("suscribirse").submit();**/

    }
}
/**
 * 
 * @param {type} categoria
 * Función que transforma las opciones elegidas de cierta categoria en una cadena que divide los equipos con comas
 * @returns {string}
 */
function transforma_opciones_cadena(categoria) {
    var elementos = $('.' + categoria + ' input[type="checkbox"]:checked');
    var numero_elementos = elementos.length;
    var transformacion = "";
    if (numero_elementos !== 0) {
        for (var i = 0; i < numero_elementos; i++) {
            transformacion = transformacion+ ","+elementos[i].val();
            alert(transformacion);
        }
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
        document.getElementById('error-email').innerText = '¿Cuál es tu email?';
        //alert("mail inválido");
        return false;
    }
    document.getElementById('error-email').innerText = '';
    return true;
}

function valida_equipos() {
//alert($('input[type="checkbox"]').prop("checked"));
    // if ($('input[type="checkbox"]').prop("checked") === false) {
    if ($('input[type="checkbox"]:checked').length === 0) {
        // alert("error equipos");
        document.getElementById('error-equipos').innerText = 'Selecciona al menos uno de tus equipos favoritos';
        return false;
    } else {
        document.getElementById('error-equipos').innerText = '';
    }
    return true;
}

function navega(nfl, nfl_groups, mlb, mlb_groups) {
    $(".ant").click(function () {
        if ($(this).hasClass("ant-nfl")) {
            for (var i = 0; i < 4; i++) {
                $(".grupo-nfl-" + (nfl + i)).css("display", "none");
                //   alert("grupo desaparecido " + (nfl + i));
            }
            nfl = nfl - 4;
            for (var i = 0; i < 4; i++) {
                $(".grupo-nfl-" + (nfl + i)).css("display", "inline-block");
                //  alert("grupo aparecido " + (nfl + i));
            }

            if (((nfl + 3) * 4) < (nfl_groups) * 4) {
                $(".sig-nfl").css("display", "block");
            } else {
                $(".sig-nfl").css("display", "none");
            }
            if (nfl <= 4) {
                $(".ant-nfl").css("display", "none");
            } else {
                $(".ant-nfl").css("display", "block");
            }
        } else {
            if ($(this).hasClass("ant-mlb")) {
                var j = 0;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-mlb-" + (mlb + j)).css("display", "none");
                    //  alert("grupo desaparecido " + (mlb + j));
                }
                mlb = mlb - 4;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-mlb-" + (mlb + j)).css("display", "inline-block");
                    //  alert("grupo aparecido " + (mlb + j));
                }
                if ((mlb * 16) < (mlb_groups) * 4) {
                    $(".sig-mlb").css("display", "block");
                } else {
                    $(".sig-mlb").css("display", "none");
                }
                if (mlb <= 4) {
                    $(".ant-mlb").css("display", "none");
                } else {
                    $(".ant-mlb").css("display", "block");
                }
            }
        }
    });
    $(".sig").click(function () {

        if ($(this).hasClass("sig-nfl")) {
            var i = 0;
            for (var i = 0; i < 4; i++) {
                $(".grupo-nfl-" + (nfl + i)).css("display", "none");
                // alert("grupo desaparecido " + (nfl + i));
            }
            nfl = nfl + 4;
            for (var i = 0; i < 4; i++) {
                $(".grupo-nfl-" + (nfl + i)).css("display", "inline-block");
                //   alert("grupo aparecido " + (nfl + i));
            }

            if ((nfl_groups - 1) * 4 - nfl * 4 <= 0) {
                $(this).css("display", "none");
            }
            if (nfl > 4) {
                $(".ant-nfl").css("display", "block");
            }
        } else {
            if ($(this).hasClass("sig-mlb")) {
                var j = 0;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-mlb-" + (mlb + j)).css("display", "none");
                    // alert("grupo desaparecido " + (mlb + j));
                }
                mlb = mlb + 4;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-mlb-" + (mlb + j)).css("display", "inline-block");
                    // alert("grupo aparecido " + (mlb + j));
                }
                if ((mlb * 16) < (mlb_groups) * 4) {
                    $(".sig-mlb").css("display", "block");
                } else {
                    $(".sig-mlb").css("display", "none");
                }
                if (mlb <= 4) {
                    $(".ant-mlb").css("display", "none");
                } else {
                    $(".ant-mlb").css("display", "block");
                }
            }
        }

    });
}

function post_call(url, params) {
    try {
        $.ajax({
            url: encodeURI(url),
            type: "POST",
            async: false,
            dataType: "JSON",
            data: JSON.stringify(params),
            crossDomain: true,
            contentType: "application/json",
            success: function (result) {
                if (result !== undefined & result !== null) {
                    alert('resultado ' + JSON.stringify(result));
                }
            },
            error: function (result) {
                console.log('error ' + JSON.stringify(result));
            }
        });
    } catch (e) {
        console.log('Error al hacer la llamada ajax ' + e)
    }

}
