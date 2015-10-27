<?php
    include_once "bd.php";
    session_start();
    if(!$_SESSION['entrar']) die();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql="INSERT INTO Producto (nombre, info, tipo, foto, album) VALUES
            ('".$_POST['nombre']."','".$_POST['info']."','".$_POST['tipo']."','".$_POST['foto']."', '".$_POST['album']."')";
        if (mysqli_query($con,$sql)) {
            $mensaje="Datos creados correctamente";
        }else {
            echo "Error en la creacion " . mysqli_error($con);
        }   
    }
    $options = array();
    $result = mysqli_query($con,"SELECT * FROM Tipo");
    while($fila = mysqli_fetch_array($result)) {
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $options[] = "<option value='{$id}'>{$nombre}</option>";
    }
?>
<html>
    <head>
        <title>Crear</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php echo $mensaje;?>
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <center><h2 class="text-primary">Crear Arreglo</h2></center>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="info">Información:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="info" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="tipo">Tipo:</label>
                        <div class="col-sm-6">
                            <select class="form-control" size="1" name="tipo">
                            <?php echo implode("\n", $options); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="foto">Foto:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="foto" placeholder="Nombre de la foto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="album">Albúm:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="album" placeholder="Link de la album">
                        </div>
                    </div>
                    <center>
                        <input class="btn btn-info" type="submit" value="Crear"/>
                    </center>
                </form>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="listado.php"><button class="btn btn-warning">Listado</button></a>
                </div>
            </div>
        </div>
    </body>
</html>