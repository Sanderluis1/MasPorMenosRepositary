<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from rrhh where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/rrhh/$row[name]");

mysqli_query($conexion,"DELETE from rrhh where id='$del'");

header("Location:rrhh.php");

?>