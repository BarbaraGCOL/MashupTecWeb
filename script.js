function preencheTabela()
{
	var xmlhttp = new XMLHttpRequest();
	var url = "buscaEnderecos.php";

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		 document.getElementById("tabelaCadastro").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function preencheForm(latitude, longitude, endereco, nome)
{
    document.getElementById("address").value = endereco;
    document.getElementById("nome").value = nome;

    var latlong = new google.maps.LatLng(latitude, longitude);

    showLocation(latlong);
}

function writeAddressName(latLng) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
       "location": latLng
    },
    function(results, status) {
        if (status == google.maps.GeocoderStatus.OK){
			document.getElementById("address").value = results[0].formatted_address;
			document.getElementById("local").value = results[0].formatted_address;
		}else
            document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
    });
}
     
function geolocationSuccess(position) {
	var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    writeAddressName(userLatLng);
     
    showLocation(userLatLng);
}
     
function geolocationError(positionError) {
    document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
}
     
function geolocateUser() {
	
    if (navigator.geolocation)
    {
		var positionOptions = {
			enableHighAccuracy: true,
			timeout: 10 * 1000
		};
		navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
    }
    else
		document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
}

function addMarker( )
{
    var geocoder = new google.maps.Geocoder(); 
        
    var address = document.getElementById( "address" ).value;
   
    geocoder.geocode( { 'address': address }, function(results, status) {
		var addr_type = results[0].types[0];

		if ( status == google.maps.GeocoderStatus.OK ) {
			showLocation( results[0].geometry.location);
			document.getElementById("local").value = results[0].formatted_address;
			document.getElementById("address").value = results[0].formatted_address;
		}else{     
			alert("Falha na Localização: " + status);        
		} 
    });
}      

function showLocation(latlng)
{
    document.getElementById( "latlong" ).value = latlng;
    var myOptions = {
        zoom : 16,
        center : latlng,
        mapTypeId : google.maps.MapTypeId.ROADMAP
    };
    // console.log(myOptions);
    var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
    new google.maps.Marker({
        map: mapObject,
        position: latlng
    });
}

function confirmacao(id) {
     var resposta = confirm("Deseja remover essaa localidade?");
 
     if (resposta == true) {
          window.location.href = "excluir.php?id="+id;
     }
}

