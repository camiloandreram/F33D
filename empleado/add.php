<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Nombre = $_POST['Nombre'];
	$Apellido = $_POST['Apellido'];
	$Direccion = $_POST['Direccion'];
	$Genero = $_POST['Genero'];
	$Numero = $_POST['Numero'];
	$Email = $_POST['Email'];		

	if(empty($Nombre) || empty($Apellido) || empty($Direccion) || empty($Genero) || empty($Numero) || empty($Email)) {
				
		if(empty($Nombre)) {
			echo "<font color='red'>Campo: Nombre esta vacio.</font><br/>";
		}
		
		if(empty($Apellido)) {
			echo "<font color='red'>Campo: Apellido esta vacio.</font><br/>";
		}
		
		if(empty($DIreccion)) {
			echo "<font color='red'>Campo: Direccion esta vacio.</font><br/>";
		}
		if(empty($Genero)) {
			echo "<font color='red'>Campo: Genero esta vacio.</font><br/>";
		}
		
		if(empty($Numero)) {
			echo "<font color='red'>Campo: Numero esta vacio.</font><br/>";
		}
		
		if(empty($Email)) {
			echo "<font color='red'>Campo: Email esta vacio.</font><br/>";
		}
		

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$sql = "INSERT INTO empleado (Nombre, Apellido, Direccion, Genero, Numero, Email ) VALUES(:Nombre, :Apellido, :Direccion, :Genero, :Numero, :Email)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Apellido', $Apellido);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Genero', $Genero);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Email', $Email);
		$query->execute();
		
		

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>




