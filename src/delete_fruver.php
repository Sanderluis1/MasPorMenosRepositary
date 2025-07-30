<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from fruver where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/fruver/$row[name]");

mysqli_query($conexion,"DELETE from fruver where id='$del'");

header("Location:fruver.php");

?>