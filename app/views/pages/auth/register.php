<?php require RUTA_APP . "/views/layout/landing/header.php";?>

<div class="contenedor">
    <form class="form" action="<?php echo RUTA_URL; ?>/AuthController/registrarUsuario/"
    method="POST" enctype="multipart/form-data">
       <h2 class="h2-subtitulo">Crear una cuenta</h2>
       <div class="mb-3 div-flex">
          <label for="EntradaNombre" class="form-label">Nombre</label>
          <input name="nombre" type="text" class="form-control" id="EntradaNombre">
       </div>
       <div class="mb-3 div-flex">
          <label for="EntradaApellido" class="form-label">Apellido</label>
          <input name="apellido" type="text" class="form-control" id="EntradaApellido">
       </div>
       <div class="mb-3">
          <label for="EntradaDNI" class="form-label">DNI</label>
          <input name="dni" type="number" class="form-control" id="EntradaDNI" aria-describedby="ayudaDNI">
          <div id="ayudaDNI" class="form_text">Ingrese su DNI sin puntos.</div>
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
       <div class="mb-3 div-flex">
          <label for="EntradaContraseña" class="form-label">Contraseña</label>
          <input name="password" type="password" class="form-control" id="EntradaContraseña" aria-describedby="ayudaContraseña">
          <div id="ayudaContraseña" class="form_text">Ingrese su contraseña</div>
       </div>
       <div class="mb-3 div-flex">
          <input name="password2" type="password" class="form-control" id="EntradaContraseñaRepetir" aria-describedby="ayudaContraseñaRepetir">
          <div id="ayudaContraseñaRepetir" class="form_text">Repita la contraseña</div>
       </div>
       <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
       </div>
       <button type="submit" class="btn btn-primary">Crear cuenta</button>
    </form>
 </div>

<?php require RUTA_APP . "/views/layout/landing/footer.php";?>

<!--  
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo RUTA_URL;?>/AuthController/resetPassword">Olvidé mi comntraseña</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo RUTA_URL;?>/AuthController/login">Ya tenés cuenta?
                                Ingresá</a>
                        </div> -->