<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from carniceria where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/carniceria/$row[name]");

mysqli_query($conexion,"DELETE from carniceria where id='$del'");

header("Location:carniceria.php");

?>