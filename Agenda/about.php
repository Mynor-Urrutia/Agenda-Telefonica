<?php

    require "database.php";

    $sql = "SELECT * FROM sistema";

    try{
        $statement = $conn->prepare($sql);
        $statement -> execute();
        $resultado = $statement->fetchAll();
    } catch (PDOException $error){
        echo $erro->getMessage();
    }

?>
<?php require 'php_header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio de Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<?php if(!empty($message)): ?>
        <p><?= $message ?></p>
	<?php endif; ?>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">Agenda Telefonica</a>
	</nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/Logo.png" alt="IMG">
				</div>
                <?php foreach ($resultado as $fila) : ?>
				<form action="login.php" method="post" class="login100-form validate-form">
                    
					<span class="login100-form-title">
                    <i class="fas fa-address-card"></i>
						Acerca de	
					</span>
					<div class="wrap-input100 validate-input">
                        <label for="">Nombre de la Aplicación:</label><br>
						<label for=""><?php echo $fila["nombre"]; ?></label>
					</div><br>
					<div class="wrap-input100 validate-input" data-validate = "Ingresa la contraseña">
                    <label for="">Creador de la Aplicación:</label><br>
						<label for=""><?php echo $fila["creador"]; ?></label>
					</div><br>
					<div class="wrap-input100 validate-input">
                        <label for="">Versión de la Aplicación:</label><br>
						<label for=""><?php echo $fila["version"]; ?></label>
					</div>
                    <div class="wrap-input100 validate-input">
                        <label for="">Licencia de la Aplicación:</label><br>
						<label for=""><?php echo $fila["licencia"]; ?></label>
					</div>
				</form>
                <?php endforeach; ?>
			</div>
		</div>
	</div>

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
