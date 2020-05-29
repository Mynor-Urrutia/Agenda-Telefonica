<?php

    require "database.php";

    if (isset($_GET['id'])) {
        
        $sql = "SELECT * FROM users WHERE id = :id";

        try{
            $statement = $conn->prepare($sql);
            $statement -> bindValue(':id', $_GET['id']);
            $statement -> execute();

            $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $error){
            echo $error -> getMessage();
        }
    }else {
        echo "Se necesita un nombre";
        exit;
    }

    if (isset($_POST['submit'])){
        $usuario = [
            "id" =>$_POST['id'],
            "nombre" => $_POST['nombre'],
            "apellidos" => $_POST['apellidos'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "f_nac" => $_POST['f_nac'],
        ];

        $sql = "UPDATE contactos 
                SET id= :id,
                nombre = :nombre,
                apellidos = :apellidos,
                telefono = :telefono,
                email = :email,
                f_nac = :f_nac 
                WHERE id = :id";
        try{
            $statement = $conn->prepare($sql);
            $statement ->execute($usuario);
        }catch (PDOException $error){
            echo $error ->getMessage();
        }
    }
?>

<?php if(isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['nombre']; ?> modificado correctamente.</blockquote>
<?php endif; ?>
<?php require 'php_header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'head.php'; ?>
    
</head>
<body>
    <?php require 'header.php'; ?>
    <h2>Editar Usuario</h2>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

<form action="" method="post">
    <?php foreach ($usuario as $key => $value) : ?>
    <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
            value="<?php echo $value; ?>"<?php echo($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" value="Modificar" name="submit">
</form>
</div>
		</div>
	</div>
<style>
      body {
        
        background: #9053c7;
        background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0);
        background: -o-linear-gradient(-135deg, #c850c0, #4158d0);
        background: -moz-linear-gradient(-135deg, #c850c0, #4158d0);
        background: linear-gradient(-135deg, #c850c0, #4158d0);
      }
    </style>
</body>
</html>
