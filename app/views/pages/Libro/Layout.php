<!-- views/layout/libros/layout.php -->
<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>
<?php require RUTA_APP . '/views/layout/admin/menu.php'; ?>

<div class="container">
    <?php 
        // La variable `viewContent` se define en el controlador, y aquí carga la vista específica.
        require_once RUTA_APP . "/views/pages/libro/{$data['viewContent']}.php"; 
    ?>
</div>

<?php require RUTA_APP . '/views/layout/admin/footer.php'; ?>