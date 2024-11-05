<!-- views/layout/admin/menu.php -->
<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <!-- Sidebar - Brand -->
                <div class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div>
                        <img class="avatar" src="<?php echo RUTA_AVATAR . $_SESSION['avatar']; ?>" alt="Avatar">
                    </div>
                    <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['nombre']; ?></div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">Gestión de Biblioteca</div>

                <!-- Opciones de Biblioteca -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL; ?>/dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL; ?>/libro/indexLibro">
                            <i class="fas fa-book"></i>
                            <span>Lista de Libros</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL; ?>/libro/crearLibro">
                            <i class="fas fa-plus-circle"></i>
                            <span>Agregar Libro</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL; ?>/categorias">
                            <i class="fas fa-list"></i>
                            <span>Categorías</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL; ?>/usuarios">
                            <i class="fas fa-user"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>
        </nav>