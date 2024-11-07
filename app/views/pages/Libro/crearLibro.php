<div class="container">
    <h2>Agregar Nuevo Libro</h2>
    <form action="<?php echo RUTA_URL; ?>/LibroController/crear" method="post">
        <div class="form-group">
            <label asp-for="Titulo">Titulo2</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>
        <div class="form-group">
            <label asp-for="Editorial">Editorial</label>
            <input type="text" class="form-control" name="editorial">
        </div>
        <div class="form-group">
            <label asp-for="Año de Edición">Año de Edicion</label>
            <input type="date" class="form-control" name="anioEdicion">
        </div>
        <div class="form-group">
            <label asp-for="Cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" min="1">
        </div>
        <div class="form-group">
            <label asp-for="categoria_id">categoria</label>
            <input type="number" class="form-control" name="categoria_id">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a asp-action="Index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>