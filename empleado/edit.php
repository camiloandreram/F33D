<?php

include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
        $Nombre = $_POST['Nombre'];
		$Apellido = $_POST['Apellido'];
		$Direccion = $_POST['Direccion'];
		$Genero = $_POST['Genero'];
		$Numero = $_POST['Numero'];
		$Email = $_POST['Email'];

	if(empty($Nombre) || empty($Apellido) || empty($Direccion) || empty($Genero) || empty($Numero) || empty($Email)) {
				
		if(empty($Nombre)) {
			echo "<font color='red'>Nombre está vacio.</font><br/>";
		}
		
		if(empty($Apellido)) {
			echo "<font color='red'>Apellido está vacio.</font><br/>";
		}
		
		if(empty($Direccion)) {
			echo "<font color='red'>Direccion está vacio.</font><br/>";
		}
		if(empty($Genero)) {
			echo "<font color='red'>Genero está vacio.</font><br/>";
		}
		if(empty($Numero)) {
			echo "<font color='red'>Numero está vacio.</font><br/>";
		}
		if(empty($Email)) {
			echo "<font color='red'>Email está vacio.</font><br/>";
		}	
	} else {	

		$sql = "UPDATE empleado SET Nombre=:Nombre, Apellido=:Apellido, Direccion=:Direccion, Genero=:Genero, Numero=:Numero, Email=:Email WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':Nombre', $Nombre);
		$query->bindparam(':Apellido', $Apellido);
		$query->bindparam(':Direccion', $Direccion);
		$query->bindparam(':Genero', $Genero);
		$query->bindparam(':Numero', $Numero);
		$query->bindparam(':Email', $Email);
		$query->execute();
		
		
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM empleado WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $Nombre = $row['Nombre'];
	$Apellido = $row['Apellido'];
	$Direccion = $row['Direccion'];
	$Genero = $row['Genero'];
	$Numero = $row['Numero'];
	$Email = $row['Email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="Nombre" value="<?php echo $Nombre;?>"></td>
			</tr>
			<tr> 
				<td>Apellido</td>
				<td><input type="text" name="Apellido" value="<?php echo $Apellido;?>"></td>
			</tr>
			<tr> 
				<td>Direccion</td>
				<td><input type="Varchar" name="Direccion" value="<?php echo $Direccion;?>"></td>
			</tr>
			<tr> 
				<td>Genero</td>
				<td><input type="text" name="Genero" value="<?php echo $Genero;?>"></td>
			</tr>
			<tr> 
				<td>Numero</td>
				<td><input type="Int" name="Numero" value="<?php echo $Numero;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="Email" name="Email" value="<?php echo $Email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

