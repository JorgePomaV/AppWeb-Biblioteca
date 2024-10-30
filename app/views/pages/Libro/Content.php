<!-- views/layout/libros/content.php -->
<?php if ($action == 'index'): ?>
    <h2>Listado de Libros</h2>
    <a href="<?php echo RUTA_URL; ?>/libro/crear" class="btn btn-primary">Agregar Libro</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editorial</th>
                <th>Año de Edición</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['libros'])): ?>
                <tr>
                    <td colspan="8">No hay libros disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['libros'] as $libro): ?>
                    <tr>
                        <td><?php echo $libro->id_libro; ?></td>
                        <td><?php echo $libro->Titulo; ?></td>
                        <td><?php echo $libro->Editorial; ?></td>
                        <td><?php echo $libro->AñoEdicion; ?></td> <!-- Asegúrate de que sea un año -->
                        <td><?php echo $libro->Cantidad; ?></td>
                        <td><?php echo $libro->categoria_id; ?></td>
                        <td><?php echo $libro->usuario_id; ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL; ?>/libro/detalles/<?php echo $libro->id_libro; ?>">Detalles</a> |
                            <a href="<?php echo RUTA_URL; ?>/libro/editar/<?php echo $libro->id_libro; ?>">Editar</a> |
                            <a href="<?php echo RUTA_URL; ?>/libro/eliminar/<?php echo $libro->id_libro; ?>" onclick="return confirm('¿Seguro que deseas eliminar este libro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<?php elseif ($action == 'crear'): ?>
    <h2>Agregar Nuevo Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/libro/agregar" method="post">
        <label for="Titulo">Título:</label>
        <input type="text" name="Titulo" required>

        <label for="Editorial">Editorial:</label>
        <input type="text" name="Editorial">

        <label for="AñoEdicion">Año de Edición:</label>
        <input type="date" name="AñoEdicion">

        <label for="Cantidad">Cantidad:</label>
        <input type="number" name="Cantidad" min="1">

        <label for="categoria_id">Categoría ID:</label>
        <input type="number" name="categoria_id">

        <label for="usuario_id">Usuario ID:</label>
        <input type="number" name="usuario_id">

        <button type="submit">Guardar Libro</button>
    </form>

<?php elseif ($action == 'detalle'): ?>
    <h2>Detalle del Libro</h2>
    <p><strong>Título:</strong> <?php echo $data['libro']->Titulo; ?></p>
    <p><strong>Editorial:</strong> <?php echo $data['libro']->Editorial; ?></p>
    <p><strong>Año de Edición:</strong> <?php echo date('Y', strtotime($data['libro']->AñoEdicion)); ?></p>
    <p><strong>Cantidad:</strong> <?php echo $data['libro']->Cantidad; ?></p>
    <p><strong>Categoría ID:</strong> <?php echo $data['libro']->categoria_id; ?></p>
    <p><strong>Usuario ID:</strong> <?php echo $data['libro']->usuario_id; ?></p>
    <a href="<?php echo RUTA_URL; ?>/libro" class="btn btn-primary">Volver</a>

<?php elseif ($action == 'editar'): ?>
    <h2>Editar Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/libro/editar/<?php echo $libro->id_libro; ?>" method="post">
        <label for="Titulo">Título:</label>
        <input type="text" name="Titulo" value="<?php echo $data['libro']->Titulo; ?>" required>

        <label for="Editorial">Editorial:</label>
        <input type="text" name="Editorial" value="<?php echo $data['libro']->Editorial; ?>">

        <label for="AñoEdicion">Año de Edición:</label>
        <input type="date" name="AñoEdicion" value="<?php echo $data['libro']->AñoEdicion; ?>">

        <label for="Cantidad">Cantidad:</label>
        <input type="number" name="Cantidad" min="1" value="<?php echo $data['libro']->Cantidad; ?>">

        <label for="categoria_id">Categoría ID:</label>
        <input type="number" name="categoria_id" value="<?php echo $data['libro']->categoria_id; ?>">

        <label for="usuario_id">Usuario ID:</label>
        <input type="number" name="usuario_id" value="<?php echo $data['libro']->usuario_id; ?>">

        <button type="submit">Actualizar Libro</button>
    </form>

<?php elseif ($action == 'eliminar'): ?>
    <h2>Eliminar Libro</h2>
    <p>¿Estás seguro de que deseas eliminar el libro "<strong><?php echo $data['libro']->Titulo; ?></strong>"?</p>
    <a href="<?php echo RUTA_URL; ?>/libro/eliminarConfirmado/<?php echo $data['libro']->id_libro; ?>" class="btn btn-danger">Eliminar</a>
    <a href="<?php echo RUTA_URL; ?>/libro" class="btn btn-secondary">Cancelar</a>

<?php endif; ?>    
<?php require RUTA_APP . '/views/layout/admin/footer.php'; ?>