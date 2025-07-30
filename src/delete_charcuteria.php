<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from charcuteria where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/charcuteria/$row[name]");

mysqli_query($conexion,"DELETE from charcuteria where id='$del'");

header("Location:charcuteria.php");

?>