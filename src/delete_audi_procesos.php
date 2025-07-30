<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from audi_procesos where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/audi_procesos/$row[name]");

mysqli_query($conexion,"DELETE from audi_procesos where id='$del'");

header("Location:audi_procesos.php");

?>