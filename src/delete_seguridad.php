<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from seguridad where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/seguridad/$row[name]");

mysqli_query($conexion,"DELETE from seguridad where id='$del'");

header("Location:seguridad.php");

?>