<?php require RUTA_APP . "/views/layout/landing/header.php";?>

<div class="contenedor">
<!--//$_POST['...']: Captura los datos enviados a través del formulario (como nombre, apellido, email, usuario, contraseñas, etc.).-->
    <form class="form" action="<?php echo RUTA_URL; ?>/AuthController/registrarUsuario/" method="POST" enctype="multipart/form-data">
       <h2 class="h2-subtitulo">Crear una cuenta</h2>
       <div class="div-container">
            <div class="mb-3 div-flex div-1">
               <label for="EntradaNombre" class="form-label">Nombre</label>
               <input name="nombre" type="text" class="form-control" id="EntradaNombre">
            </div>
            <div class="mb-3 div-flex div-2">
               <label for="EntradaApellido" class="form-label">Apellido</label>
               <input name="apellido" type="text" class="form-control" id="EntradaApellido">
            </div>
       </div>
       <div class="mb-3">
          <label for="EntradaDNI" class="form-label">DNI</label>
          <input name="dni" type="number" class="form-control" id="EntradaDNI" aria-describedby="ayudaDNI">
          <div id="ayudaDNI" class="form_text">Ingrese su DNI sin puntos.</div>
       </div>
       <div class="mb-3">
          <label for="formFile" class="form-label ">Avatar</label>
          <input name="avatar" class="form-control" type="file" id="formFile">
          <div id="ayudaTamañoArchivo" class="form_text">Tamaño del archivo de imagen menor o igual a 10MB.</div>
         </div>
       <div class="mb-3">
          <label for="EntradaNumero" class="form-label">Numero de Celular</label>
          <input name="numero" type="number" class="form-control" id="EntradaNumero">
       </div>
       <div class="mb-3">
          <label for="EntradaEmail" class="form-label">Direccion de Email</label>
          <input name="email" type="email" class="form-control" id="EntradaEmail" aria-describedby="emailHelp">
          <div id="emailHelp" class="form_text">Ingrese su correo electronico.</div>
       </div>
       <div class="mb-3">
          <label for="EntradaUsuario" class="form-label">Nombre de Usuario</label>
          <input name="usuario" type="text" class="form-control" id="EntradaUsuario">
       </div>

       <div class="div-container">
            <div class="mb-3 div-flex div-1">
               <label for="EntradaContraseña" class="form-label">Contraseña</label>
               <input name="password" type="password" class="form-control" id="EntradaContraseña" aria-describedby="ayudaContraseña">
               <div id="ayudaContraseña" class="form_text">Ingrese su contraseña.</div>
            </div>
            <div class="mb-3 div-flex div-2">
               <label for="EntradaContraseña2" class="form-label">Contraseña</label>
               <input name="password2" type="password" class="form-control" id="EntradaContraseña2" aria-describedby="ayudaContraseñaRepetir">
               <div id="ayudaContraseña2" class="form_text">Repita la contraseña.</div>
            </div>
       </div>
       
       <button type="submit" class="btn btn-primary">Crear cuenta</button>
    </form>
 </div>

<?php require RUTA_APP . "/views/layout/landing/footer.php";?>