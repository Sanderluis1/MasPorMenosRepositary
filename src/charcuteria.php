<?php
session_start();
$permiso = 'charcuteria';
$descargar = 'descargar';
$eliminar = 'eliminar';
$subir = 'subir';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
if(isset($_POST['submit'])!=""){
    $name=$_FILES['photo']['name'];
    $size=$_FILES['photo']['size'];
    $type=$_FILES['photo']['type'];
    $temp=$_FILES['photo']['tmp_name'];
    $date = date('Y-m-d H:i:s');
    $caption1=$_POST['caption'];
    $link=$_POST['link'];
    
    move_uploaded_file($temp,"../files/charcuteria/".$name);
  
  $query=$conexion->query("INSERT INTO charcuteria (name,date) VALUES ('$name','$date')");
  if($query){
  header("location:charcuteria.php");
  }
  else{
  die(mysqli_error($conn));
  }
  }
include_once "includes/header.php";
?>
<div class="card">
    <div class="card-body">
    <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white titulo-centro">
                        Charcuteria
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post">
                            <div class="row">
                            <?php
                                    $sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$subir'");
                                    $existe = mysqli_fetch_all($sql);
                                    if (empty($existe) && $id_user != 1) {
                                        echo '';
                                    }   
                                        else{
                                        ?>
                                <div class="col-md-12">
                                    <div class="box">
                                        <input type="file" name="photo" id="photo" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple required/>
                                        <label for="photo"><i class="fa fa-upload" aria-hidden="true"></i><span>Seleccione un archivo&hellip;</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <input type="submit" class="btn btn-success" value="Enviar" name="submit">
                                </div>
                                <?php ;} ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tbl">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Archivo</th>
                            <th>Fecha</th>
                            <th>Visualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
					$query=mysqli_query($conexion,"SELECT * from charcuteria ORDER BY id DESC")or die(mysqli_error($conexion));
					while($row=mysqli_fetch_array($query)){
					$id=$row['id'];
					$name=$row['name'];
					$date=$row['date'];
					?>
					<tr>
					    <td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['date'] ?></td>
					    <td><?php
                                $sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$descargar'");
                                $existe = mysqli_fetch_all($sql);
                                if (empty($existe) && $id_user != 1) {
                                    echo '<a class="btn btn-success-disabled" title="No tienes permiso"><i class="fa fa-download" aria-hidden="true"></i></a>';
                                }   
                                    else{
                                    ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_<?php echo $id; ?>"><i class="fa fa-expand" aria-hidden="true"></i></button>

                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Vista Previa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <embed src="../files/charcuteria/<?php echo $name;?>#toolbar=0" type="application/pdf" width="100%" height="600px" />
                                        </div>
                                        </div>
                                    </div>
                                    </div>    
                                    <?php ;} ?> 
                        </td>
						<td>
                        <?php
                                $sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$eliminar'");
                                $existe = mysqli_fetch_all($sql);
                                if (empty($existe) && $id_user != 1) {
                                    echo '<a class="btn btn-success-disabled" title="No tienes permiso"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                }   
                                    else{
                                    ?>
                                    <a class="btn btn-danger" href="delete_charcuteria.php?del=<?php echo $row['id']?>"><i class="fa fa-trash"></i></a>
                                    <?php ;} ?>
                                </td>
					        </tr>
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>