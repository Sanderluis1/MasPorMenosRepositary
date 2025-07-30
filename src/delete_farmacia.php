<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from farmacia where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/farmacia/$row[name]");

mysqli_query($conexion,"DELETE from farmacia where id='$del'");

header("Location:farmacia.php");

?>