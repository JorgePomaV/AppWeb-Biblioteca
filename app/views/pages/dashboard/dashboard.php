<?php require RUTA_APP . "/views/layout/admin/header.php";?>

<!-- Page Wrapper -->
<div id="wrapper">

<?php require RUTA_APP . "/views/layout/admin/menu.php";?>
    
<!-- Content Wrapper -->
<div class="d-flex flex-column flex-grow-1">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre'];?></span>
                        <img class="avatar" src="<?php echo RUTA_AVATAR.$_SESSION['avatar'];?>" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar Sesión
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Listado de Libros</h1> 
                <a href="<?php echo RUTA_URL;?>/LibroController/crear" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus-circle fa-sm text-white-50"></i> Agregar Libro</a>
            </div>

            <!-- Content Row -->
            <div class="row">
            
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Editorial</th>
                                    <th>Año de Edición</th>
                                    <th>Cantidad</th>
                                    <th>Categoría ID</th>
                                    <th class="text-center" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['libro'])):?>
                                <?php foreach($data['libro'] as $libro):?>
                                <tr>
                                    <td><?php echo $libro->Titulo;?></td>
                                    <td><?php echo $libro->Editorial;?></td>
                                    <td><?php echo $libro->AñoEdicion;?></td>
                                    <td><?php echo $libro->Cantidad;?></td>
                                    <td><?php echo $libro->categoria_id;?></td>
                                    <td><span class="text-info"><a
                                                href="<?php echo RUTA_URL;?>/LibroController/editar/<?php echo $libro->id_libro;?>"
                                                class="btn btn-outline-success btn-sm"><i
                                                    class="fas fa-pen mr-2"></i>
                                                Editar</a></span></td>
                                    <td><span class="text-danger"><a
                                                href="<?php echo RUTA_URL;?>/LibroController/eliminar/<?php echo $libro->id_libro;?>"
                                                class="btn btn-outline-danger btn-sm"><i
                                                    class="fas fa-trash-alt mr-2"></i>Eliminar</a></span></td>
                                </tr>
                                <?php endforeach;?>
                                <?php else:?>
                                <tr><td colspan="7"><h4 class="text-secondary text-center">NO HAY LIBROS CARGADOS</h4></td></tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        
    </div>
    
    <!-- End of Main Content -->
    <?php require RUTA_APP . "/views/layout/admin/footer.php";?>