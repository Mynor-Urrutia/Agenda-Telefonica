<?php

    require "config.php";

    $sql = "SELECT * FROM contactos";

    try{
        $statement = $conexion->prepare($sql);
        $statement -> execute();
        $resultado = $statement->fetchAll();
    } catch (PDOException $error){
        echo $erro->getMessage();
    }

?>

<?php require "template/header.php"; ?>

    <h2>Editar Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila) : ?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["nombre"]; ?></td>
                    <td><?php echo $fila["apellidos"]; ?></td>
                    <td><?php echo $fila["telefono"]; ?></td>
                    <td><?php echo $fila["email"]; ?></td>
                    <td><?php echo $fila["f_nac"]; ?></td>
                    <td><a href="update-single.php?id=<?php echo $fila["id"]; ?>">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
    <a href="index.php">Vovler</a>
<?php require "template/footer.php"; ?>