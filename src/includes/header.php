<?php
$permiso = 'usuarios';
$bloquear = 'bloquear';
$id_user = $_SESSION['idUser'];
include "../conexion.php";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    
}
if (empty($_SESSION['active'])) {
    header('Location: ../');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="../assets/img/shortcut.png"/>
    <title>MAS X MENOS</title>
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <script src="../assets/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand home-button" href="index.php">
                            <i class="fa fa-home fa-2x" aria-hidden="true" style="top: 10%;
                                                                                    left: -3%;
                                                                                    position: relative;"></i>
                            <img src="../assets/img/logowhite.png" width="250" height="50" alt="">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="sidebar" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end nav-scroll">
                        <ul class="navbar-nav nav-scroll"  style="white-space: nowrap;">
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="normas.php">
                                    Normas Generales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="compras.php">
                                    Compras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="recep_merca.php">
                                    Recepcion de Mercancia
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="logistica.php">
                                    Logistica
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="piso_ventas.php">
                                    Piso de Ventas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="fruver.php">
                                    Fruver
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="carniceria.php">
                                    Carniceria
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="charcuteria.php">
                                    Charcuteria
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="alimentos_bebidas.php">
                                    Alimentos y Bebidas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="caja.php">
                                    Caja
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="farmacia.php">
                                    Farmacia
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="audi_inventario.php">
                                    Auditoria de Inventario
                                </a> 
                            </li>   
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="tic.php">
                                    TIC
                                </a>    
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="seguridad.php">
                                    Seguridad
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="rrhh.php">
                                    RRHH
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="mercadeo.php">
                                    Mercadeo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="admin_finanzas.php">
                                    Admin. y Finanzas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="contabilidad.php">
                                    Contabilidad
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex grow-btn" href="audi_procesos.php">
                                    Auditoria de Proceso
                                </a>
                            </li>
                        </ul>
                    </div>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <p class="d-lg-none d-md-block">Cuenta</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">

                        <?php
                                    $sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$bloquear'");
                                    $existe = mysqli_fetch_all($sql);
                                    if (empty($existe) && $id_user != 1) {
                                        echo '';
                                    }   
                                        else{
                                        ?>
                        <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <?php ;} ?>
                            <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="ayuda.php">¿Ayuda?</a> 
                         </div>
                    </li>
                </ul>
            </div>
         </div>
    </nav>
        <!-- End Navbar -->
            <div class="content bg">
                <div class="container-fluid">