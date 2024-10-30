<!-- views/layout/libros/layout.php -->
<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>
<?php require RUTA_APP . '/views/layout/admin/menu.php'; ?>

<div class="container">
    <?php 
        $viewContent = RUTA_APP . '/views/layout/libros/content.php';
        require_once $viewContent; 
    ?>
</div>

<?php require RUTA_APP . '/views/layout/admin/footer.php'; ?>