<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from tic where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/tic/$row[name]");

mysqli_query($conexion,"DELETE from tic where id='$del'");

header("Location:tic.php");

?>