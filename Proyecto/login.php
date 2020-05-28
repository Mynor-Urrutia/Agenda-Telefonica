<?php

	session_start();

    require 'config.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conexion->prepare('SELECT id, email, password FROM users WHERE email=:email');
		$records->bindParam('email', $_POST['email']);
		$records->execute();

		$results= $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['user_id'] = $results['id'];
			header('Locationn: /Proyecto');
		}else{
			$message='Cuenta invalida.';
		}
       
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>