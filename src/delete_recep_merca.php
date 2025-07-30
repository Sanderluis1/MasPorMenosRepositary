<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from recep_merca where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/recep_merca/$row[name]");

mysqli_query($conexion,"DELETE from recep_merca where id='$del'");

header("Location:recep_merca.php");

?>