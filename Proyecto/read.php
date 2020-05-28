<?php

    require "config.php";

    if (isset($_POST['submit'])){

        $sql = "SELECT * FROM contactos WHERE nombre = :nombre";

        try {
            $statement = $conexion->prepare($sql);
            $statement -> bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
            $statement -> execute();

            $resultado = $statement->fetchAll();

        } catch (PDOException $error) {
            echo $error->getMessage();
        }

    }

?>

<?php require "template/header.php"; ?>

<?php
    if (isset($_POST['submit'])) {
        if($resultado && $statement ->rowCount() > 0) { ?>
            <h2>Busqueda</h2>

            <table>
                <thead>
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

    <h2>Buscar contacto</h2>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Buscar" name="submit">
    </form>

    <a href="index.php">Volver</a>

    
<?php require "template/footer.php"; ?>
    
