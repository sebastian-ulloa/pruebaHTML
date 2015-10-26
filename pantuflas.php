<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PanchaDetalles - Arreglos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
    include_once "bd.php";
?>
<body>
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigate">
                            <span class="sr-only">Mostrar / Ocultar menú</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.html" class="navbar-brand">PanchaDetalles</a>
                    </div>

                    <div class="collapse navbar-collapse" id="navigate">
                        <ul class="nav navbar-nav">
                            <li><a href="index.html">Inicio</a></li>
                            <li><a href="arreglos.php">Arreglos navideños</a></li>
                            <!-- <li><a href="munecos.php">Muñecos</a></li>-->
                            <li class="active"><a href="pantuflas.php">Pantuflas</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-divider"></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </nav>
        </div>
    </div>
    <div class="complete-img" style="background-image:linear-gradient(135deg, rgba(30, 33, 33, 0.81) 1%, rgba(32, 32, 32, 0.13) 98%), url(http://mejoresportadasfb.com/wp-content/uploads/877-navidad-la-mejor-epoca.jpg);">
    </div>

    <div class="container">
        <h1>Pantuflas  Disponibles</h1>
        <div class="row">
            <?php
                $result = mysqli_query($con,"SELECT * FROM Producto WHERE tipo=3");
                $num = 1;
                while($fila = mysqli_fetch_array($result)) {
                    echo '<div class="col-md-3 col-sm-6">
                        <a href="#imagen'.$num.'" class="thumbnail imagenes" data-toggle="modal">
                            <div class="img-th" style="background-image: url('.$fila['foto'].')"></div>
                            <div class="caption">
                                <h4>'.$fila['nombre'].'</h4>
                                <p>'.$fila['info'].'</p>
                            </div>
                        </a>
                    </div>';
                    $num++;
                }
            ?>
            
        </div>
    </div>
    <?php
                $result = mysqli_query($con,"SELECT * FROM Producto WHERE tipo=3");
                $num = 1;
                while($fila = mysqli_fetch_array($result)) {
                    echo '<div id="imagen'.$num.'" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4>'.$fila['nombre'].'</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-responsive" src="'.$fila['foto'].'">
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-info" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $num++;
                }
    ?>
    <div class="footer container-fluid">
        </br>
        <div class="col-md-12">
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>