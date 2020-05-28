<?php

    require "config.php";

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
            $statement = $conexion ->prepare($sql);
            $statement->execute($nuevo_usuario);
        } catch (PDOException $error) {
            echo $error->gerMessage();
        }

    }

?>

<?php require "template/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['nombre']; ?> se ha añadio correctamente.</blockquote>
<?php endif; ?>

    <h2>Crear Contacto</h2>
    
    <form action="" method="post">
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
        <input type="submit" value="Agregar" name="submit">        
    </form>

    <a href="index.php">Volver</a>

<?php require "template/footer.php"; ?>