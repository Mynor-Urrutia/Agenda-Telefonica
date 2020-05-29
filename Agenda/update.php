<?php

    require "database.php";

    $sql = "SELECT * FROM contactos";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contactos</title>
    <?php require 'head.php'; ?>
</head>
<body>
    <?php require 'header.php'; ?>
    <h2>Crear Contacto</h2>
<table class="table">
        <thead class="thead-dark">
            <tr >
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
                    <td><a href="update-single.php?id=<?php echo $fila["id"]; ?>" class="btn btn-outline-light  btn-lg btn-block">Editar</a></td>
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
    