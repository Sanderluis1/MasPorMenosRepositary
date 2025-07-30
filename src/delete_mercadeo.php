<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from mercadeo where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/mercadeo/$row[name]");

mysqli_query($conexion,"DELETE from mercadeo where id='$del'");

header("Location:mercadeo.php");

?>