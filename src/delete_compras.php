
<?php
extract($_REQUEST);
include('../conexion.php');

$sql=mysqli_query($conexion,"SELECT * from compras where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("../files/compras/$row[name]");

mysqli_query($conexion,"DELETE from compras where id='$del'");

header("Location:compras.php");

?>