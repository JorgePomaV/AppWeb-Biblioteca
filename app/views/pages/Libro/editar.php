<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>
<?php require RUTA_APP . '/views/layout/admin/menu.php'; ?>

<div class="container">
    <h2>Editar Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/libro/editar/<?php echo $data['libro']->id_libro; ?>" method="post">
        <label for="Titulo">Título:</label>
        <input type="text" name="Titulo" value="<?php echo $data['libro']->Titulo; ?>" required>

        <label for="Editorial">Editorial:</label>
        <input type="text" name="Editorial" value="<?php echo $data['libro']->Editorial; ?>">

        <label for="AñoEdicion">Año de Edición:</label>
        <input type="date" name="AñoEdicion" value="<?php echo $data['libro']->AñoEdicion; ?>">

        <label for="Cantidad">Cantidad:</label>
        <input type="number" name="Cantidad" value="<?php echo $data['libro']->Cantidad; ?>" min="1">

        <label for="categoria_id">Categoría ID:</label>
        <input type="number" name="categoria_id" value="<?php echo $data['libro']->categoria_id; ?>">

        <button type="submit">Actualizar Libro</button>
    </form>
</div>

<?php require RUTA_APP . '/views/layout/admin/footer.php'; ?>
