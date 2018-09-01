<?php
$hostname_localhost="localhost";
$database_localhost="position";
$username_localhost="root";
$password_localhost="";

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		
$consulta="SELECT * FROM datos WHERE id=(SELECT MAX(id) FROM datos)";
$resultado=mysqli_query($conexion,$consulta);
$registro = mysqli_fetch_array($resultado);
mysqli_close($conexion);

echo "<table border=\"1\" >";
echo "	<tr>";		
echo "		<td>Longitud</td>";			
echo "		<td>Latitud</td>";			
echo "		<td>Fecha</td>";			
echo "		<td>Hora</td>";			
echo "	</tr>";		
echo "	<tr>";		
echo "		<td>" . $registro['Longitud'] . "</td>";			
echo "		<td>" . $registro['Latitud'] . "</td>";			
echo "		<td>" . $registro['Fecha'] . "</td>";			
echo "		<td>" . $registro['Hora'] . "</td>";			
echo "	</tr>";		
echo "</table>";	


echo "<script>";
echo "	var lat = 11.019485699999999 ;";//" . $registro['Latitud'] . " ;";//11.009527, -74.828632 mi casa
echo "	var lng = -74.8515944 ;";//" . $registro['Longitud'] . " ;";//11.019485699999999,  -74.8515944 la U
echo "</script>";

echo "<div id=\"mapid\" style=\"width: 600px; height: 400px;\"></div>";

echo "<script>	";
echo "	var mymap = L.map('mapid').setView([lat, lng], 15);";
echo "	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {";
echo "		maxZoom: 18,";
echo "		attribution: 'Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, ' +";
echo "			'<a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, ' +";
echo "			'Imagery © <a href=\"https://www.mapbox.com/\">Mapbox</a>',";
echo "		id: 'mapbox.streets'";
echo "	}).addTo(mymap);";
echo "	L.marker([lat, lng]).addTo(mymap)";
echo "		.bindPopup(\"YO Estoy aqui...XD\").openPopup();";
echo "	var popup = L.popup();";
echo "	function onMapClick(e) {";
echo "		popup";
echo "			.setLatLng(e.latlng)";
echo "			.setContent(\"Haz hecho click en: \" + e.latlng.toString())";
echo "			.openOn(mymap);";
echo "	}";
echo "	mymap.on('click', onMapClick);";
echo "</script>";


?>