<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo RUTA_URL;?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo RUTA_URL;?>/css/estilosAdmin.css" rel="stylesheet">
    <link href="<?php echo RUTA_URL;?>/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title><?php echo NOMBRESITIO;?> </title>
</head>

<body id="page-top">
    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-3 px-3" href="#">UNLZ Biblioteca</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-md-6">
        <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="navbar-nav ms-auto">
        <div class="nav-item text-nowrap">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <span>Cerrar Sesión</span>
            </a>
        </div>
        </div>
    </header>