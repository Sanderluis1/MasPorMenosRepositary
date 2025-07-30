<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from logistica where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/logistica/$row[name]");

mysqli_query($conexion,"DELETE from logistica where id='$del'");

header("Location:logistica.php");

?>