var map ;
var marker = [];
var stats;
var resultBar = false;
var filterBar = false;
var geoAvailabe = false;
var zone_check = false;
var userPos = {};
var show_side= false;


function removeCharacters(str){
	for (var i=0;i<str.length;i++){
	//Replace "á é í ó ú"
		if (str.charAt(i)=="á") str = str.replace(/á/,"a");
		if (str.charAt(i)=="é") str = str.replace(/é/,"e");
		if (str.charAt(i)=="í") str = str.replace(/í/,"i");
		if (str.charAt(i)=="ó") str = str.replace(/ó/,"o");
		if (str.charAt(i)=="ú") str = str.replace(/ú/,"u");
	}
	return str;
}

//Start Map Function called from google maps API URL
function initMap() {
	var jsonResult = "";
	var myLatLng = {lat: 20.68017, lng: -101.35437};

	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: myLatLng
	});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			userPos = pos;
			geoAvailabe = true;
			map.setCenter(pos);
			map.setZoom(11);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	}else {
		// Browser doesn't support Geolocation
		$("#check-zone-container").hide();
		console.log("Este navegador no soporta geolocalización");
	}


	//Database webservice call
	jQuery.ajax({
		headers: { "cache-control": "no-cache" },
		type: "GET",
		url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/stores_info.php",
		dataType: 'json',
		success: function(data){
			jsonResult = data;
			var image = {
				url: 'https://www.socialpro.mx/apps/facebook/img/Pin.png',
				size: new google.maps.Size(90, 90),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 45)
	    	};
			addMarkers(jsonResult);

			ini();
			states();
			stores_type();
			filters();
			add_li(jsonResult);
		},

		error:function(err){
			//alert("error: " + JSON.stringify(err));
			//alert("Error de conexión");
		}
	});
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  //infoWindow.setPosition(pos);
  //infoWindow.setContent(browserHasGeolocation ?
  //                      'Error: The Geolocation service failed.' :
  //                      'Error: Your browser doesn\'t support geolocation.');
  console.log("Geolocalización no permitida");
  $("#check-zone-container").hide();
}


function addMarkers(x){

	deleteMarkers();
	jsonResult = x;

	var image = {
      url: 'https://www.socialpro.mx/apps/facebook/img/Pin.png',
      size: new google.maps.Size(90, 90),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 45)
    };

	var total = jsonResult.length;

	for(i=0; i<total; i++){

		marker[i] = new google.maps.Marker({
			position: {lat: Number(jsonResult[i].latitud), lng: Number(jsonResult[i].longitud)},
			map: map,
			icon: image,
			idTienda: jsonResult[i].id_tienda,
			dir1: jsonResult[i].direccion_1,
			dir2: jsonResult[i].direccion_2,
			ret: jsonResult[i].retailer,
			tipo: jsonResult[i].tipo
		});
		markerEvent(marker[i]);

	}
}

function markerEvent(pin){
	var contentString='<b>'+ pin.ret +'</b> ---- ( '+pin.tipo+')<br>'+pin.dir1+'<br>'+pin.dir2;
	var infowindow = new google.maps.InfoWindow({
	    content: contentString
	});
	pin.addListener('click', function() {
		$( document ).ready(function() {

		    var isMobile = window.matchMedia("only screen and (max-width: 760px)");
		    if (isMobile.matches) {
		    	map.setZoom(15);
				map.setCenter(pin.getPosition());
		    	infowindow.open(map, pin);
		    }
		    else{
		    	map.setZoom(19);
				map.setCenter(pin.getPosition());
				showTienda(pin.idTienda);
		    }
		 });

	});

}

function deleteMarkers() {
 	for (var i=0; i<marker.length; i++) {
	  marker[i].setMap(null);
	}
}


function states(){
	jQuery.ajax({
		headers: { "cache-control": "no-cache" },
		type: "GET",
		url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/estados.php",
		dataType: 'json',
		success: function(data){
			stats = data;
			tot=stats.length;
			for(i=0; i<tot; i++){
				var cadena='<option name='+stats[i]['estado']+' value='+stats[i]['id']+'>'+stats[i]['estado']+'</option>"';
            	$("#select-state").append(cadena.replace("\r" , " "));
			}
		},
		error:function(err){
			//alert("error: " + JSON.stringify(err));
			//alert("Error de conexión");
		}
	});
}


function stores_type() {
	jQuery.ajax({
		headers: { "cache-control": "no-cache" },
		type: "GET",
		url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/store_type.php",
		dataType: 'json',
		success: function(data){

			stats = data;
			tot=stats.length;

			for(i=0; i<tot; i++){
				var cadena='<option value='+stats[i]['id']+'>'+stats[i]['tipo']+'</option>"';
	        	$("#select-store").append(cadena.replace("\r" , " "));
			}
		},
		error:function(err){
			//alert("error: " + JSON.stringify(err));
			//alert("Error de conexión");
		}
	});
}


function cambiar(id) {
	if(id!=""){
			jQuery.ajax({
			headers: { "cache-control": "no-cache" },
			type: "GET",
			url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/city.php?id_es="+id,
			dataType: 'json',
			success: function(data){
				stats = data;
				tot=stats.length;

				$("#select-city").remove();
		    	$("#container-city").append(' <select class="style-select font-select" id="select-city" name="city"> </select>');
		        $("#select-city").append('<option value="" name="">Selecciona una localidad</option>"');

				for(i=0; i<tot; i++){
					var cadena='<option value='+stats[i]['id']+'>'+stats[i]['municipio']+'</option>"';
		        	$("#select-city").append(cadena.replace("\r" , " "));
				}
			},
			error:function(err){
				//alert("error: " + JSON.stringify(err));
				//alert("Error de conexión");
			}
		});
	}
	else{
				$("#select-city").remove();
		    	$("#container-city").append(' <select class="style-select font-select" id="select-city" name="city"> </select>');
		        $("#select-city").append('<option value="" name="">Selecciona una localidad</option>"');
	}


}


function ini() {

	var direcciones;
	var datos=[];

	jQuery.ajax({
		headers: { "cache-control": "no-cache" },
		type: "GET",
		url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/stores_info.php",
		dataType: 'json',
		success: function(data){
			direcciones = data;
			var dat= data
		},
		error:function(err){
			//alert("error: " + JSON.stringify(err));
			//alert("Error de conexión");
		}
	});

		function searcher(){
		var word = document.getElementById("word").value;
		word = word.toLowerCase();

		//Palabra sin acento
		var word2 = removeCharacters(word);

		//arreglo completo sin acentos
		var direccionesSinAcento = JSON.stringify(direcciones);
		direccionesSinAcento = removeCharacters(direccionesSinAcento);
		direccionesSinAcento = direccionesSinAcento.toLowerCase();
		direccionesSinAcento = JSON.parse(direccionesSinAcento);

		//búsqueda por palabras sin acento
		var dir1 = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.direccion_1.toLowerCase().indexOf(word2);
		});
		//console.log(JSON.stringify(dir1));
		//Metiendo matches en arreglo
		for (i=0; i<dir1.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(dir1[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		//búsqueda por palabras sin acento
		var dir2 = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.direccion_2.toLowerCase().indexOf(word2);
		});

		//Metiendo matches en arreglo
		for (i=0; i<dir2.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(dir2[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		//búsqueda por palabras sin acento
		var es = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.estado.toLowerCase().indexOf(word2);
		});

		//Metiendo matches en arreglo
		for (i=0; i<es.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(es[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		//búsqueda por palabras sin acento
		var mpio = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.municipio.toLowerCase().indexOf(word2);
		});

		//Metiendo matches en arreglo
		for (i=0; i<mpio.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(mpio[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		var cp = _.filter(direcciones, function(obj) {
		    return ~obj.codigo_postal.toLowerCase().indexOf(word);
		});
		for (i=0; i<cp.length; i++){
			datos.push(cp[i]);
		}

		//búsqueda por palabras sin acento
		var ret = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.retailer.toLowerCase().indexOf(word2);
		});

		//Metiendo matches en arreglo
		for (i=0; i<ret.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(ret[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		//búsqueda por palabras sin acento
		var type = _.filter(direccionesSinAcento, function(obj) {
		    return ~obj.tipo.toLowerCase().indexOf(word2);
		});

		//Metiendo matches en arreglo
		for (i=0; i<type.length; i++){
			for(j=0; j<direcciones.length; j++){
				if(type[i].id_tienda == direcciones[j].id_tienda){
					datos.push(direcciones[j]);
				}
			}
		}

		var x = _.uniq(_.collect( datos, function( x ){return  x ;}));

		var cen = {lat: 20.68017, lng: -101.35437};
				map.setCenter(cen);
		map.setZoom(5);
		add_list(x);

		datos =[];

		return datos

		return	_.filter(direcciones, function(a){
		    return _.find(direcciones, function(b){
		        return b.id === a.id;
		    });
		});
	}

	$("#searcher").click(function(){
		searcher();
	});

	$("#word").enterKey(function () {
		searcher();
	})
	//Close search function
}//Finish search function


function filters() {

	var direcciones;
	var datos=[];

	jQuery.ajax({
		headers: { "cache-control": "no-cache" },
		type: "GET",
		url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/stores_info.php",
		dataType: 'json',
		success: function(data){
			direcciones = data;
			var dat= data
		},
		error:function(err){
			//alert("error: " + JSON.stringify(err));
			//alert("Error de conexión");
		}
	});

	$("#button-filter").click(function(){

		var state = document.getElementById("select-state").value;
		var city = document.getElementById("select-city").value;
		var store = document.getElementById("select-store").value;
		datos = filtra(direcciones,"zone", state);
		datos = filtra(datos,"estado_id", state);
		datos = filtra(datos,"municipio", city);
		datos = filtra(datos,"tipo", store);

		var x = _.uniq( _.collect( datos, function( x ){

		    return  x ;

		}));

		add_list(x);

		datos =[];
		if (state!=0) {
			if (x.length!=0) {
				var NewPos = {
				lat: Number(x[0]['latitud']),
				lng: Number(x[0]['longitud'])
			};
			map.setZoom(11);
			map.setCenter(NewPos);
			}
			else{
				var posCenter = {lat: 20.68017, lng: -101.35437};
				map.setZoom(5);
				map.setCenter(posCenter);
			}

		}
		else{
			var posCenter = {lat: 20.68017, lng: -101.35437};
			map.setZoom(5);
		map.setCenter(posCenter);
		}
		return datos
		return	_.filter(direcciones, function(a){
				    return _.find(direcciones, function(b){
				        return b.id === a.id;
				    });
				});

	});
}


function add_list(x){

    if (x.length!=0) {
    	$("#pins-container").remove();
		$(".banner-left").append('<div id="pins-container"></div>');

        for(i=0; i<x.length; i++){

        	var cadena='';
        	if(x[i]['direccion_2']==""){
	        	cadena='<div class="padding-div" id="store-'+x[i]["id_tienda"]+'"><img class="pin" src="img/Pin.png"><span class="style-titles">'+x[i]['retailer']+'- <span class="style-subtitle" ">'+x[i]['tipo']+'</span></span><br><p class="style-adress">'+ x[i]['direccion_1'] +'<br>'+  x[i]['estado'] + x[i]['municipio'] + '<br> C.P. '+ x[i]['codigo_postal']+' </p></div>';
        	}else{
	        	cadena='<div class="padding-div" id="store-'+x[i]["id_tienda"]+'"><img class="pin" src="img/Pin.png"><span class="style-titles">'+x[i]['retailer']+'- <span class="style-subtitle" ">'+x[i]['tipo']+'</span></span><br><p class="style-adress">'+ x[i]['direccion_2'] +'<br>'+ x[i]['direccion_1'] +', <br>'+ x[i]['estado']+ x[i]['municipio']+'<br> C.P. '+x[i]['codigo_postal']+' </p></div>';
        	}

			$("#pins-container").append(cadena.replace("\r" , " "));

			addEvent(x[i]["id_tienda"]);

        }
    }
    else{
		$("#pins-container").remove();
		$(".banner-left").append('<div id="pins-container"></div>');
    	var cadena='<div><div class=""><span class="style-titles" id="title-store" >Sin resultados <span class="style-subtitle" ></span></span><br><p class="style-adress">  </p></div></div>';
    	$("#pins-container").append(cadena.replace("\r" , " "));
    }
    close_info();
    addMarkers(x);
    side_show();


}
function add_li(x){

    if (x.length!=0) {
    	$("#pins-container").remove();
		$(".banner-left").append('<div id="pins-container"></div>');

        for(i=0; i<x.length; i++){

        	var cadena='';
        	if(x[i]['direccion_2']==""){
	        	cadena='<div class="padding-div" id="store-'+x[i]["id_tienda"]+'"><img class="pin" src="img/Pin.png"><span class="style-titles">'+x[i]['retailer']+'- <span class="style-subtitle" ">'+x[i]['tipo']+'</span></span><br><p class="style-adress">'+ x[i]['direccion_1'] +'<br>'+  x[i]['estado'] + x[i]['municipio'] + '<br> C.P. '+ x[i]['codigo_postal']+' </p></div>';
        	}else{
	        	cadena='<div class="padding-div" id="store-'+x[i]["id_tienda"]+'"><img class="pin" src="img/Pin.png"><span class="style-titles">'+x[i]['retailer']+'- <span class="style-subtitle" ">'+x[i]['tipo']+'</span></span><br><p class="style-adress">'+ x[i]['direccion_2'] +'<br>'+ x[i]['direccion_1'] +', <br>'+ x[i]['estado']+ x[i]['municipio']+'<br> C.P. '+x[i]['codigo_postal']+' </p></div>';
        	}

			$("#pins-container").append(cadena.replace("\r" , " "));

			addEvent(x[i]["id_tienda"]);

        }
    }
    else{
		$("#pins-container").remove();
		$(".banner-left").append('<div id="pins-container"></div>');
    	var cadena='<div><div class=""><span class="style-titles" id="title-store" >Sin resultados <span class="style-subtitle" ></span></span><br><p class="style-adress">  </p></div></div>';
    	$("#pins-container").append(cadena.replace("\r" , " "));
    }
}

function addEvent(idTienda){

	$('#store-'+idTienda).click(function(){
		showTienda(idTienda);
	});

}

function showTienda(idTienda){
	jQuery.ajax({
	headers: { "cache-control": "no-cache" },
	type: "GET",
	url: "http://localhost:8888/new-era/wp-content/themes/invogue-child/ws/info.php?id_l=" + idTienda,
	dataType: 'json',
	success: function(data){


		$(".store").animate(
	        {
	            left: "0px"
	        },
	        {
	            duration: 'slow',
	            easing: 'easeOutBounce'
	        }
	    );

	    resultBar = true;
		$("#store-title").text(data["retailer"]);
		$("#store-subtitle").text("Tienda "+ data["tipo"]);
		$("#plaza").text(data["direccion_2"]);
		$("#store-adress").text(data["direccion_1"]);
		$("#store-cp").text(data["estado"] +", "+ data["municipio"] + " C.P: " + data["codigo_postal"]);

		if(data["logo"] != ""){
			$("#store-logo").attr('src', data["logo"]);
		}else{
			$("#store-logo").attr('src', "https://www.socialpro.mx/apps/facebook/img/new_era.png");
		}

		var pos = {
			lat: Number(data["latitud"]),
			lng: Number(data["longitud"])
		};
		map.setCenter(pos);
		map.setZoom(19);
	},
	error:function(err){

		//alert("Error de conexión");
	}
});
}

function show_ba(){

	var stateBar = false;

	$(".banner-left").animate(
        {
            left: "0px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

	stateBar = true;

}
function side_show(){
			$(".side").animate(
		        {
		            left: "320px"
		        },
		        {
		            duration: 'slow',
		            easing: 'easeOutBounce'
		        }
		    );
		    show_ba();
			show_side=true;
			$("#show_hide").attr('src', "https://www.socialpro.mx/apps/facebook/img/arrowSmallLeft.svg");
}
function side_hide() {
		$(".side").animate(
	        {
	            left: "0px"
	        },
	        {
	            duration: 'slow',
	            easing: 'easeOutBounce'
	        }
	    );
	    hide_ba();
		show_side=false;
		$("#show_hide").attr('src', "https://www.socialpro.mx/apps/facebook/img/arrowSmall.svg");
	}
$(".side").click(function(){
	if (show_side==false) {
		side_show();
	}
	else{
		side_hide();
	}

});



function hide_ba(){

	$(".banner-left").animate(
        {
			left: "-680px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

	//map.setZoom(6);
    filterBar = false;

}


function close_bar(){

	$(".barFilters").animate(
        {
			top: "-950px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

	//map.setZoom(6);
    filterBar = false;

}
function close_info(){
		$(".store").animate(
	        {
	            left: "-320px"
	        },
	        {
	            duration: 'slow',
	            easing: 'easeOutBounce'
	        }
	    );
	    resultBar = false;
}

$(".arrow").click(function(){
	side_hide();
    stateBar = false;
});

$(".close-bar").click(function(){

	$(".store").animate(
        {
            left: "-320px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

	//map.setZoom(6);
    resultBar = false;

});


$(".filter").click(function(){

	$(".barFilters").animate(
        {
            top: "60px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

    filterBar = true;

});

$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}


$(".close-bar2").click(function(){

	$(".barFilters").animate(
        {
            top: "-950px"
        },
        {
            duration: 'slow',
            easing: 'easeOutBounce'
        }
    );

	//map.setZoom(6);
    filterBar = false;

});


function filtra(datos, filtro, word){

	var datosFiltrados=[];

	_.filter(datos,function(i){

		if (filtro=="zone"){
			if (zone_check==true){
					var lld1 = new LatLng (userPos.lat, userPos.lng);
					var nearbys = [];
					var d;
					for (i=0; i<datos.length; i++){
						var lld2 = new LatLng (Number(datos[i].latitud), Number(datos[i].longitud));
						d = lld1.distance(lld2);
							if(d<1){
								datosFiltrados.push(datos[i]);
							}
					}
			}
			else{
				datosFiltrados=datos;
			}
		}
		if (filtro=="estado_id"){
			if (word!=0){
				for (i=0; i<datos.length; i++){
					if(word==datos[i].estado_id){
						datosFiltrados.push(datos[i]);
					}
				}
			}
			else{
				datosFiltrados=datos;
			}

		}
		if (filtro=="municipio"){
			if (word!=0){
				if(i.municipio_id.indexOf(word) == 0){
					datosFiltrados.push(i);
				}
			}
			else{
				datosFiltrados=datos;
			}
		}
		if (filtro=="tipo"){
			if(word!=0){
				if(i.tipo_id.indexOf(word) == 0){
					datosFiltrados.push(i);
				}
			}
			else{
				datosFiltrados=datos;
			}
		}


	});

	return datosFiltrados;

}

$("#zone-check").click(function(){

	if(zone_check == false){
		$("#zone-check").attr('src', "https://www.socialpro.mx/apps/facebook/img/select_checked.svg");
		zone_check = true;
	}else{
		$("#zone-check").attr('src', "https://www.socialpro.mx/apps/facebook/img/select_empty.svg");
		zone_check = false;
	}
});

