<?php

include_once("config.php");


$result = $dbConn->query("SELECT * FROM empleado ORDER BY id DESC");
?>

<html>
<head>	
	<title>Crear Empleado</title>
</head>

<body>
<a href="add.html">Adicionar Empleado</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Direccion</td>
		<td>Genero</td>
		<td>Numero</td>
		<td>Email</td>
		<td>Cod_barrio</td>
		<td>Cod_Ciudad</td>
		<td>Tip_crontato</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['Nombre']."</td>";
		echo "<td>".$row['Apellido']."</td>";
		echo "<td>".$row['Direccion']."</td>";
		echo "<td>".$row['Genero']."</td>";
		echo "<td>".$row['Numero']."</td>";
		echo "<td>".$row['Email']."</td>";
		echo "<td>".$row['Cod_barrio']."</td>";	
		echo "<td>".$row['Cod_Ciudad']."</td>";	
		echo "<td>".$row['Tip_crontato']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	
</body>
</html>

