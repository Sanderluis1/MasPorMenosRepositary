<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from caja where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/caja/$row[name]");

mysqli_query($conexion,"DELETE from caja where id='$del'");

header("Location:caja.php");

?>