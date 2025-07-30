<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from admin_finanzas where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/admin_finanzas/$row[name]");

mysqli_query($conexion,"DELETE from admin_finanzas where id='$del'");

header("Location:admin_finanzas.php");

?>