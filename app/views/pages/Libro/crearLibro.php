<div class="container">
    <h2>Agregar Nuevo Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/libro/crearLibro" method="post">
        <div class="form-group">
            <label asp-for="Titulo"></label>
            <input type="text" class="form-control" name="Titulo" required>
        </div>
        <div class="form-group">
            <label asp-for="Editorial"></label>
            <input type="text" class="form-control" name="Editorial">
        </div>
        <div class="form-group">
            <label asp-for="Año de Edición"></label>
            <input type="date" class="form-control" name="AnioEdicion">
        </div>
        <div class="form-group">
            <label asp-for="Cantidad"></label>
            <input type="number" class="form-control" name="Cantidad" min="1">
        </div>
        <div class="form-group">
            <label asp-for="categoria_id"></label>
            <input type="number" class="form-control" name="categoria_id">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a asp-action="Index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>