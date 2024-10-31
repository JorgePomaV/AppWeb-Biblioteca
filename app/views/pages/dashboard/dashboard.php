<?php require RUTA_APP . "/views/layout/admin/header.php";?>

<!-- Page Wrapper -->
<div id="wrapper">

<?php require RUTA_APP . "/views/layout/admin/menu.php";?>
    
<!-- Content Wrapper -->
<div class="d-flex flex-column flex-grow-1">

     <!-- Main Content -->
     <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Listado de Libros</h1>
                <a href="<?php echo RUTA_URL; ?>/LibroController/crear" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar Libro</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Generación dinámica de tarjetas -->
                <?php if (!empty($data['libro'])): ?>
                    <?php foreach ($data['libro'] as $libro): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo htmlspecialchars($libro->Titulo); ?></text>
                                </svg>
                                <div class="card-body">
                                    <p class="card-text">Editorial: <?php echo htmlspecialchars($libro->Editorial); ?></p>
                                    <p class="card-text">Año: <?php echo htmlspecialchars($libro->AñoEdicion); ?></p>
                                    <p class="card-text">Cantidad: <?php echo htmlspecialchars($libro->Cantidad); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="<?php echo RUTA_URL; ?>/LibroController/detalles/<?php echo $libro->id_libro; ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
                                            <a href="<?php echo RUTA_URL; ?>/LibroController/editar/<?php echo $libro->id_libro; ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                            <a href="<?php echo RUTA_URL; ?>/LibroController/eliminar/<?php echo $libro->id_libro; ?>" class="btn btn-sm btn-outline-secondary">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h4 class="text-secondary text-center">NO HAY LIBROS CARGADOS</h4>
                <?php endif; ?>
            </div>
            <!-- End Content Row -->
        </main>
        <!-- End of Main Content -->
    </div>
</div>
    
<?php require RUTA_APP . "/views/layout/admin/footer.php";?>