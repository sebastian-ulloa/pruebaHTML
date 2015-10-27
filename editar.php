<?php
    include_once "bd.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['editar'])){
            $sql="UPDATE Producto SET nombre='".$_POST['nombre']."', info='".$_POST['info']."', tipo=".$_POST['tipo'].
            ", foto='".$_POST['foto']."', album='".$_POST['album']."' WHERE id=".$_SESSION['editando'];
            if (mysqli_query($con,$sql)) {
                $mensaje="Datos actualizados correctamente";
            }else {
                echo "Error en la creacion " . mysqli_error($con);
            }      
        }else{
            $_SESSION['editando']=$_POST['producto'];
            $result = mysqli_query($con,"SELECT * FROM Producto WHERE id=".$_SESSION['editando']);
            $fila1 = mysqli_fetch_array($result);
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
                    <center><h2 class="text-primary">Editar</h2></center>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $fila1['nombre'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="info">Información:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="info" rows="5"> <?php echo $fila1['info'];?></textarea>
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
                            <input type="text" class="form-control" name="foto" placeholder="Link de la foto" value="<?php echo $fila1['foto'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="album">Albúm:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="album" placeholder="Link de la album" value="<?php echo $fila1['album'];?>>
                        </div>
                    </div>
                    <center>
                        <input class="btn btn-info" type="submit" name="editar" value="Editar"/>
                    </center>
                </form>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="crear.php"><button class="btn btn-link">Crear</button></a>
                </div>
            </div>
        </div>
    </body>
</html>