
$(document).ready(function () {
    navega(1, 8, 1, 7, 1, 8);
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
        $(".email-mc").val(email);
        $(".name-mc").val(nombre);
        $(".futbol-2").val(transforma_opciones_cadena("futbol"));
        $(".nfl-2").val(transforma_opciones_cadena("nfl"));
        $(".mlb-2").val(transforma_opciones_cadena("mlb"));
        $(".lmp-2").val(transforma_opciones_cadena("lmp"));
        $(".lmb-2").val(transforma_opciones_cadena("lmb"));
        $(".nba-2").val(transforma_opciones_cadena("nba"));
        if ($(".street-style").is(':checked')) {
            $(".street").prop("checked", true);
        } else {
            $(".street").prop("checked", false);
        }
        setCookie("usuario",nombre,360);
        document.getElementById("mc-embedded-subscribe-form").submit();

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
        $('.' + categoria + ' input[type="checkbox"]:checked').each(function () {
            transformacion += $(this).val() + ",";
            //  alert(transformacion);
        });
    }
    if(transformacion!==""){
    setCookie(categoria,transformacion,365);
}
    return transformacion;
}
function valida_nombre(name) {
   if (name !== 'undefined' && name!=="") {
        document.getElementById('error-nombre').innerText = '';
        return true;
    } else {
        document.getElementById('error-nombre').innerText = '\u00BFC\u00f3mo te llamas?';
        //name.focus();
        return false;
    }
}
function validateEmail(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(re)) {
        document.getElementById('error-email').innerText = '\u00BFCu\u00e1l es tu email?';
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

function navega(nfl, nfl_groups, mlb, mlb_groups, nba, nba_groups) {
    $(".ant").click(function () {
        if ($(this).hasClass("ant-nfl")) {
            var j = 0;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-nfl-" + (nfl + j)).css("display", "none");
                    //  alert("grupo desaparecido " + (mlb + j));
                }
                nfl = nfl - 4;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-nfl-" + (nfl + j)).css("display", "inline-block");
                    //  alert("grupo aparecido " + (mlb + j));
                }
                if ((nfl * 16) < (nfl_groups) * 4) {
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
            } else {
                if ($(this).hasClass("ant-nba")) {
                    var j = 0;
                    for (var j = 0; j < 4; j++) {
                        $(".grupo-nba-" + (nba + j)).css("display", "none");
                        //  alert("grupo desaparecido " + (mlb + j));
                    }
                    nba = nba - 4;
                    for (var j = 0; j < 4; j++) {
                        $(".grupo-nba-" + (nba + j)).css("display", "inline-block");
                        //  alert("grupo aparecido " + (mlb + j));
                    }
                    if ((nba * 16) < (nba_groups) * 4) {
                        $(".sig-nba").css("display", "block");
                    } else {
                        $(".sig-nba").css("display", "none");
                    }
                    if (nba <= 4) {
                        $(".ant-nba").css("display", "none");
                    } else {
                        $(".ant-nba").css("display", "block");
                    }
                }
            }
        }
    });
    $(".sig").click(function () {

        if ($(this).hasClass("sig-nfl")) {
            var j = 0;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-nfl-" + (nfl + j)).css("display", "none");
                    // alert("grupo desaparecido " + (mlb + j));
                }
                nfl = nfl + 4;
                for (var j = 0; j < 4; j++) {
                    $(".grupo-nfl-" + (nfl + j)).css("display", "inline-block");
                    // alert("grupo aparecido " + (mlb + j));
                }
                if ((nfl * 16) < (nfl_groups) * 4) {
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
            } else {
                if ($(this).hasClass("sig-nba")) {
                    var j = 0;
                    for (var j = 0; j < 4; j++) {
                        $(".grupo-nba-" + (nba + j)).css("display", "none");
                        // alert("grupo desaparecido " + (mlb + j));
                    }
                    nba = nba + 4;
                    for (var j = 0; j < 4; j++) {
                        $(".grupo-nba-" + (nba + j)).css("display", "inline-block");
                        // alert("grupo aparecido " + (mlb + j));
                    }
                    if ((nba * 16) < (nba_groups) * 4) {
                        $(".sig-nba").css("display", "block");
                    } else {
                        $(".sig-nba").css("display", "none");
                    }
                    if (nba <= 4) {
                        $(".ant-nba").css("display", "none");
                    } else {
                        $(".ant-nba").css("display", "block");
                    }
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

/**función que crea una cookie**/
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires+";path=/";
    
}
/**función que obtiene una cookie**/

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/**función que verifica si una cookie existe**/

function checkCookie() {
    var user = getCookie("usuario");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }
    }
}