<?php 

require "database.php";

    if (isset($_GET['id'])) {
        
        $sql = "DELETE FROM contactos WHERE id = :id";

        try{
            $statementDelete = $conn->prepare($sql);
            $statementDelete -> bindValue(':id', $_GET['id']);
            $statementDelete -> execute();
        }catch (PDOException $error){
            echo $error -> getMessage();
        }
    }

    $sql = "SELECT * FROM contactos";

    try{
        $statement = $conn->prepare($sql);
        $statement ->execute();
        $resultado = $statement -> fetchAll();

    }catch (PDOException $error){
        echo $error ->getMessage();
    }

?>
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
    <h2>Eliminar Contactos</h2>
    <?php if (isset($statementDelete)) echo "Contacto Eliminado"; ?>
    <table class="table">
        <thead class="thead-dark">
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
                    <td><a href="delete.php?id=<?php echo $fila["id"]; ?>" class="btn btn-outline-light  btn-lg btn-block">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>    
    </table>
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