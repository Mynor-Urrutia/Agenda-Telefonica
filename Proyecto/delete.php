<?php 

require "config.php";

    if (isset($_GET['id'])) {
        
        $sql = "DELETE FROM contactos WHERE id = :id";

        try{
            $statementDelete = $conexion->prepare($sql);
            $statementDelete -> bindValue(':id', $_GET['id']);
            $statementDelete -> execute();
        }catch (PDOException $error){
            echo $error -> getMessage();
        }
    }

    $sql = "SELECT * FROM contactos";

    try{
        $statement = $conexion->prepare($sql);
        $statement ->execute();
        $resultado = $statement -> fetchAll();

    }catch (PDOException $error){
        echo $error ->getMessage();
    }

?>

<?php require "template/header.php"; ?>

    <h2>Editar Usuarios</h2>
    <?php if (isset($statementDelete)) echo "Contacto Eliminado"; ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Eliminar</th>
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
                    <td><a href="delete.php?id=<?php echo $fila["id"]; ?>">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
    <a href="index.php">Vovler</a>
<?php require "template/footer.php"; ?>