<div class="container">
    <h2>Eliminar Libro</h2>
    <p>¿Estás seguro de que deseas eliminar el libro "<?php echo $data['libro']->Titulo; ?>"?</p>
    <form action="<?php echo RUTA_URL; ?>/libro/eliminarLibro/<?php echo $data['libro']->id_libro; ?>" method="post">
        <button type="submit">Confirmar Eliminación</button>
    </form>
    <a href="<?php echo RUTA_URL; ?>/libro" class="btn btn-primary">Cancelar</a>
</div>