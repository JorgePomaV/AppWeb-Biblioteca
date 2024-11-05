<div class="container">
    <h2>Detalle del Libro</h2>
    <p><strong>Título:</strong> <?php echo $data['libro']->Titulo; ?></p>
    <p><strong>Editorial:</strong> <?php echo $data['libro']->Editorial; ?></p>
    <p><strong>Año de Edición:</strong> <?php echo date('Y', strtotime($data['libro']->AñoEdicion)); ?></p>
    <p><strong>Cantidad:</strong> <?php echo $data['libro']->Cantidad; ?></p>
    <p><strong>Categoría ID:</strong> <?php echo $data['libro']->categoria_id; ?></p>
    <a href="<?php echo RUTA_URL; ?>/libro" class="btn btn-primary">Volver</a>
</div>