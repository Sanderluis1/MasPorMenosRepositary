<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from alimentos_bebidas where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/alimentos_bebidas/$row[name]");

mysqli_query($conexion,"DELETE from alimentos_bebidas where id='$del'");

header("Location:alimentos_bebidas.php");

?>