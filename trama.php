<?php
$hostname_localhost="localhost";
$database_localhost="position";
$username_localhost="root";
$password_localhost="";

echo "<table border=\"1\" >";
echo "	<tr>";		
echo "		<td>Longitud</td>";			
echo "		<td>Latitud</td>";			
echo "		<td>Fecha</td>";			
echo "		<td>Hora</td>";			
echo "	</tr>";	

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);		
$consulta="SELECT * FROM datos";
$resultado=mysqli_query($conexion,$consulta);

while($registro = mysqli_fetch_array($resultado)){

echo "	<tr>";		
echo "		<td>" . $registro['Longitud'] . "</td>";			
echo "		<td>" . $registro['Latitud'] . "</td>";			
echo "		<td>" . $registro['Fecha'] . "</td>";			
echo "		<td>" . $registro['Hora'] . "</td>";			
echo "	</tr>";		

}
echo "</table>";	

mysqli_close($conexion);

?>