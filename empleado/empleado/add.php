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
	$Cod_barrio = $_POST['Cod_barrio'];	
	$Cod_Ciudad = $_POST['Cod_Ciudad'];	
	$Cod_Ciudad = $_POST['Tip_crontato'];	
	
	
	if(empty($Nombre) || empty($Apellido) || empty($Direccion) || empty($Genero) || empty($Numero) || empty($Email) || empty($Cod_barrio) || empty($Cod_Ciudad) || empty($Tip_crontato) ) {
				
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
		if(empty($Cod_barrio)) {
			echo "<font color='red'>Campo: Cod_barrio esta vacio.</font><br/>";
		}
		if(empty($Cod_Ciudad)) {
			echo "<font color='red'>Campo: Cod_Ciudad esta vacio.</font><br/>";
		}
		if(empty($Tip_crontato)) {
			echo "<font color='red'>Campo: Tip_crontato esta vacio.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$sql = "INSERT INTO empleado (Nombre, Apellido, Direccion, Genero, Numero, Email, Cod_barrio, Cod_Ciudad, Tip_crontato ) VALUES(:Nombre, :Apellido, :Direccion, :Genero, :Numero, :Email, :Cod_barrio, :Cod_Ciudad, :Tip_crontato)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Apellido', $Apellido);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Genero', $Genero);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Email', $Email);
		$query->bindparam(':Cod_barrio', $Cod_barrio);
		$query->bindparam(':Cod_Ciudad', $Cod_Ciudad);
		$query->bindparam(':Tip_crontato', $Tip_crontato);
		$query->execute();
		
		

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>