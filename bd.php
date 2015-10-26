<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    
/*    $servername ="mysql8.000webhost.com";
    $username = "a3435652_arreglo";
    $password = "david15";
    $database = "a3435652_arreglo";*/
    
    $con=mysqli_connect($servername,$username,$password,$database);
    if (mysqli_connect_errno())
    {
        echo "Error en la conexión BD: ". mysqli_connect_error();
    }
?>