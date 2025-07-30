<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: src/');
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Ingrese el usuario y contraseña
                    </div>';
        } else {
            require_once "conexion.php";
            $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
            $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$clave'");
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $dato['idusuario'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['user'] = $dato['usuario'];
                header('Location: src/index.php');
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Contraseña incorrecta
                        </div>';
                session_destroy();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MásXMenos</title>
    <link rel="shortcut icon" href="assets/img/shortcut.png"/>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/css/material-dashboard.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" />
</head>

<body class="bg">
<div class="img-fluid circulo">
    <div class="circulo-pequeño"></div>
</div>
<div class="green-lines"></div>
<div>
    <img src="assets/img/cornerleft.png" class="cornerleft">
</div>
<div>
    <img src="assets/img/+.png" class="plus animate__animated animate__pulse animate__infinite">
</div>
<div>
    <img src="assets/img/x.png" class="px animate__animated animate__pulse animate__infinite">
</div>
<p class="p- animate__animated animate__pulse animate__infinite animate__delay-3s">-</p>
<div class="img-fluid centro animate__animated animate__slideOutRight animate__delay-3s">		
	<img class="" src="assets/img/aikozlogo.png" width="220px"/>								
</div>
<div class="img-fluid centro animate__animated animate__slideOutLeft animate__delay-3s">		
	<img class="" src="assets/img/logo.png" width="220px"/>								
</div>
<div>
    <p class="title animate__animated animate__fadeIn animate__slower animate__delay-3s">Grupo Abreu</p>
    <p class="subtitle animate__animated animate__fadeIn animate__slower animate__delay-3s">SISTEMA GESTIÓN DE PROCESOS</p>
</div>

    <div class="col-md-3 centro animate__animated animate__slideOutDown animate__delay-3s">
                        <div class="card">
                                <div class="card-header card-header-primary text-center">
									<h4 class="card-title">Iniciar Sesión</h4>
								</div>
								<div class="card-body">
                                <?php echo isset($alert) ? $alert : ''; ?>
									<form action="" method="post">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg text-center" id="exampleInputEmail1" placeholder="Ingrese su usuario" name="usuario">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-lg text-center" id="exampleInputPassword1" placeholder="Ingrese su contraseña" name="clave">
										</div>
										<div class="mt-3">
											<button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" type="submit">Ingresar</button>
										</div>
									</form>
								</div>
						</div>                   
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/material-dashboard.js"></script>
    <!-- endinject -->
</body>
</html>