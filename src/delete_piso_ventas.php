<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from piso_ventas where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/piso_ventas/$row[name]");

mysqli_query($conexion,"DELETE from piso_ventas where id='$del'");

header("Location:piso_ventas.php");

?>