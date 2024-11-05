<?php require RUTA_APP . '/views/layout/admin/header.php'; ?>
<?php require RUTA_APP . '/views/layout/admin/menu.php'; ?>

<div class="container">
    <h2>Listado de Libros</h2>
    <a href="<?php echo RUTA_URL; ?>/libro/crearLibro" class="btn btn-primary">Agregar Libro</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editorial</th>
                <th>Año de Edición</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['libro'])): ?>
                <tr>
                    <td colspan="8">No hay libros disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['libro'] as $libro): ?>
                    <tr>
                        <td><?php echo $libro->id_libro; ?></td>
                        <td><?php echo $libro->Titulo; ?></td>
                        <td><?php echo $libro->Editorial; ?></td>
                        <td><?php echo $libro->AñoEdicion; ?></td>
                        <td><?php echo $libro->Cantidad; ?></td>
                        <td><?php echo $libro->categoria_id; ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL; ?>/libro/detallesLibro/<?php echo $libro->id_libro; ?>">Detalles</a> |
                            <a href="<?php echo RUTA_URL; ?>/libro/editarLibro/<?php echo $libro->id_libro; ?>">Editar</a> |
                            <a href="<?php echo RUTA_URL; ?>/libro/eliminarLibro/<?php echo $libro->id_libro; ?>" onclick="return confirm('¿Seguro que deseas eliminar este libro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require RUTA_APP . '/views/layout/admin/footer.php'; ?>