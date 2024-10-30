<!-- views/layout/admin/menu.php -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div>
            <img class="avatar" src="<?php echo RUTA_AVATAR . $_SESSION['avatar']; ?>" alt="Avatar">
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['nombre']; ?></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Gestión de Biblioteca</div>

    <!-- Nav Item - Libros -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/libros">
            <i class="fas fa-book"></i>
            <span>Lista de Libros</span>
        </a>
    </li>
    
    <!-- Nav Item - Agregar Libro -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/libro/crear">
            <i class="fas fa-plus-circle"></i>
            <span>Agregar Libro</span>
        </a>
    </li>

    <!-- Nav Item - Categorías -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/categorias">
            <i class="fas fa-list"></i>
            <span>Categorías</span>
        </a>
    </li>

    <!-- Nav Item - Usuarios -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL; ?>/usuarios">
            <i class="fas fa-user"></i>
            <span>Usuarios</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Logout Modal Trigger -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerrar Sesión</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->