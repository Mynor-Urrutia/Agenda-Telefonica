<?php

    require "database.php";

    if (isset($_POST['submit'])){

        $sql = "SELECT * FROM contactos WHERE nombre = :nombre";

        try {
            $statement = $conn->prepare($sql);
            $statement -> bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
            $statement -> execute();

            $resultado = $statement->fetchAll();

        } catch (PDOException $error) {
            echo $error->getMessage();
        }

    }

?>

<?php
    if (isset($_POST['submit'])) {
        if($resultado && $statement ->rowCount() > 0) { ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Fecha de Cumpleaños</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $fila) : ?>
                    <tr>
                        <td><?php echo $fila["nombre"]; ?></td>
                        <td><?php echo $fila["apellidos"]; ?></td>
                        <td><?php echo $fila["telefono"]; ?></td>
                        <td><?php echo $fila["email"]; ?></td>
                        <td><?php echo $fila["f_nac"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        <?php } else {?>
            <blockquote>No hay contacto registrado con el nombre <?php echo $_POST['nombre']; ?>.</blockquote>
        <?php }
    } ?>
 <?php require 'php_header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <?php require 'head.php'; ?>
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            <h2>Buscar contacto</h2>
                <form action="" method="post"  class="login100-form validate-form">
                    
                    <div class="">
                        <input type="text" name="nombre" id="nombre" class="input100" placeholder="Ejemplo: Juan">
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Buscar"  name="submit">
                    </div>
                </form>
            </div>
		</div>
	</div>
</body>
</html>


    
