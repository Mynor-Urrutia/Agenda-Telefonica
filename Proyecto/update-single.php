<?php

    require "config.php";

    if (isset($_GET['id'])) {
        
        $sql = "SELECT * FROM contactos WHERE id = :id";

        try{
            $statement = $conexion->prepare($sql);
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
            $statement = $conexion->prepare($sql);
            $statement ->execute($usuario);
        }catch (PDOException $error){
            echo $error ->getMessage();
        }
    }
?>

<?php require "template/header.php" ?>

<?php if(isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['nombre']; ?> modificado correctamente.</blockquote>
<?php endif; ?>

<h2>Editar Usuario</h2>

<form action="" method="post">
    <?php foreach ($usuario as $key => $value) : ?>
    <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
            value="<?php echo $value; ?>"<?php echo($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" value="Modificar" name="submit">
</form>

<a href="index.php">Volver</a>

<?php require "template/footer.php"; ?>