<?php
    session_start();
    include_once "bd.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $result = mysqli_query($con,"SELECT * FROM Usuario WHERE nombreusuario = '".$_POST['username']."'");
        if(mysqli_num_rows($result) > 0){
            $fila = mysqli_fetch_array($result);
            $Contrasena="";
            if($fila['contrasena'] == $_POST['pwd']){
                    $_SESSION['entrar'] = true;
                    header("Location: /crear.php");
            }else{
                $errorContrasena = "Contraseña incorrecta";
            }
        }else{
            $errorUsuario = "El usuario ingresado no existe";
        }
    }
?>
<html>
    <head>
        <title>Login</title>
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
                <div class="border">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <center><h2 class="text-primary">Inicio de Sesión</h2></center>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="username">Nombre de usuario:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario">
                                    <p><?php echo $errorUsuario;?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Password:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="pwd" placeholder="Ingrese su contraseña">
                                    <p><?php echo $errorContrasena;?></p>
                                </div>
                            </div>
                            <center>
                                <input class="btn btn-info" type="submit" value="Iniciar Sesión"/>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>