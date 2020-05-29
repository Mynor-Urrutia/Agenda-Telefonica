<?php

    require "database.php";

    if (isset($_POST['submit'])) {

        $nuevo_usuario = array(
            "nombre" => $_POST['nombre'],
            "apellidos" => $_POST['apellidos'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "f_nac" => $_POST['f_nac']
        );

        $sql = "INSERT INTO contactos(nombre, apellidos, telefono, email, f_nac)
                            VALUES (:nombre, :apellidos, :telefono, :email, :f_nac)";

        try {
            $statement = $conn ->prepare($sql);
            $statement->execute($nuevo_usuario);
        } catch (PDOException $error) {
            echo $error->gerMessage();
        }

    }

?>
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
<?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['nombre']; ?> se ha añadio correctamente.</blockquote>
<?php endif; ?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <h2>Crear Contacto</h2>
                <form action="" method="post" class="login100-form validate-form">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono">
                    <label for="email">Correo Electronico</label>
                    <input type="text" name="email" id="email">
                    <label for="f_nac">Cumpleaños</label>
                    <input type="date" name="f_nac" id="f_nac">  
                    <div class="text-center p-t-136">
                        <input type="submit" value="Agregar" name="submit">  
					</div>    
                </form>
            </div>
		</div>
	</div>
    </body>
</html>