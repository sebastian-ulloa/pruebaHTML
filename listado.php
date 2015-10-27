<?php
    include_once "bd.php";
?>
<html>
    <head>
        <title>Consulta</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
        <table class="table table-hover">
            <caption>Listado de productos</caption>
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Info</th>
                <th>Tipo</th>
                <th>Foto</th>
                <th>Album</th>
            </tr>
            </thead>
            <tbody>

<?php
    $result = mysqli_query($con,"SELECT * FROM Producto");
    echo '<form method="post" action="editar.php">';
    while($fila = mysqli_fetch_array($result)) {
        $tipo ="";
        switch($fila['tipo']){
            case 1:
                $tipo = "Arreglo";
                break;
            case 3:
                $tipo = "Pantufla";
                break;
        }
        echo "<tr>";
        echo '<td><input type="submit" class="btn btn-link" name="producto" value="'.$fila ['id'] . '"/></td><td>'.$fila['nombre'].'</td><td> ' . $fila ['info']. "</td><td>" . $tipo. "</td><td>" . $fila ['foto']. "</td><td>" . $fila ['album']. "</td>";
        echo "</tr>";
    }
    echo "</form>";
?>
    

            </tbody>
        </table>
        <a href="crear.php"><button class="btn btn-link">Crear</button></a>
        </div>
    </body>
</html>