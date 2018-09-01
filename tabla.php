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

?>