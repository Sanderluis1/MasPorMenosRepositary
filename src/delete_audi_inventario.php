<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from audi_inventario where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/audi_inventario/$row[name]");

mysqli_query($conexion,"DELETE from audi_inventario where id='$del'");

header("Location:audi_inventario.php");

?>