<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password, nombre, apellido, telefono, direccion FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php require 'head.php'; ?>

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
					<img src="images/img-01.png" alt="IMG">
				</div>
	
				<form action="login.php" method="post" class="login100-form validate-form">
                <span class="login100-form-title">
                    <i class="fas fa-address-card"></i>
						Perfil	
					</span>
					<div class="wrap-input100 validate-input">
                        <label for="">Correo:</label><br>
						<label for=""><?= $user['email']; ?></label>
					</div><br>
					<div class="wrap-input100 validate-input" data-validate = "Ingresa la contraseña">
                    <label for="">Nombre:</label><br>
						<label for=""><?= $user['nombre']; ?> <?= $user['apellido']; ?></label>
					</div><br>
					<div class="wrap-input100 validate-input">
                        <label for="">Telefono:</label><br>
						<label for=""><?= $user['telefono']; ?></label>
					</div><br>
                    <div class="wrap-input100 validate-input">
                        <label for="">Dirección:</label><br>
						<label for=""><?= $user['direccion']; ?></label>
					</div>
					
					<div class="text-center p-t-40">
                    <div class="container-login100-form-btn">
                        <a href="update-perfil.php?id=<?php echo $user["id"]; ?>" class="login100-form-btn">Editar Perfil</a>
					</div>
					</div>
				</form>
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
