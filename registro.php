<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Reservas</title>
    <style type="text/css">
        table{
            border: solid 2px #7e7c7c;
            border-collapse: collapse;
        }

        th,h1{
            background-color: #edf797;
        }

        td,th{
            border: solid 1px #7e7c7c;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
$user = "root";
$pass = "grupo3trabajofinal";
$host = "localhost";

$connection = mysqli_connect("localhost","root","grupo3trabajofinal","reservy");

$nombre = $_POST["nombre"];
$hora = $_POST["hora"];
$dia = $_POST["dia"];

if(!$connection){
    echo "No se a podido conectar con el servidor" . mysql_error();
}
else{
    ?>
    <b><h3>Hemos conectado al servidor</h3></b>
    <?php
}

$insertar = "INSERT INTO reserva (nombre,hora,dia) VALUES ('$nombre','$hora','$dia')";
$resultado = mysqli_query($connection,$insertar);

$consulta = "SELECT * FROM reserva";

$result = mysqli_query($connection,$consulta);
if (!$result){
    echo "No se ha podido realizar la consulta";
}
?>
<table>
    <tr>
        <th><h1>Nombre</h1></th>
        <th><h1>Hora</h1></th>
        <th><h1>Dia</h1></th>
    </tr>
<?php
    while ($colum = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><h2>
                <?php
                $colum['nombre'];
                ?>
            </h2></td>
            <td><h2>
                <?php
                $colum['hora'];
                ?>
            </h2></td>
            <td><h2>
                <?php
                $colum['dia'];
                ?>
            </h2</td>
        </tr>
        <?php
    }
?>
</table>
<?php
mysqli_close($connection);
?>
<a href="index.html"> Volver Atras</a>
<?php
?>
