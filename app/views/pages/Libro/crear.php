<div class="container">
    <h2>Agregar Nuevo Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/libro/crear" method="post">
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

        <button type="submit">Guardar Libro</button>
    </form>
</div>