<?php
session_start();
$id_user = $_SESSION['idUser'];
include "../conexion.php";
if(isset($_POST['submit'])!=""){
    $name=$_FILES['photo']['name'];
    $size=$_FILES['photo']['size'];
    $type=$_FILES['photo']['type'];
    $temp=$_FILES['photo']['tmp_name'];
    $date = date('Y-m-d H:i:s');
    $caption1=$_POST['caption'];
    $link=$_POST['link'];
    
    move_uploaded_file($temp,"../files/normas/".$name);
  
  $query=$conexion->query("INSERT INTO normas (name,date) VALUES ('$name','$date')");
  if($query){
  header("location:normas.php");
  }
  else{
  die(mysqli_error($conn));
  }
  }

include_once "includes/header.php";
?>


                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white titulo-centro">
                        Normas Generales
                    </div>
                    <div class="card-body">
                    <embed src="../assets/pdf/normas.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
               
<?php include_once "includes/footer.php"; ?>