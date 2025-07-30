<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from contabilidad where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/contabilidad/$row[name]");

mysqli_query($conexion,"DELETE from contabilidad where id='$del'");

header("Location:contabilidad.php");

?>