<?php require RUTA_APP . "/views/layout/landing/header.php";?>

<div class="container-fluid login_container d-flex justify-content-center align-items-center">
  <div class="row login_box">
      <div class="img_login"></div>
      <div class="login_text px-5 d-flex flex-column justify-content-center">
        <h1 class="pb-4 fw-medium">Inicie Sesión</h1>
        <form id="loginForm" class="user" action="<?php echo RUTA_URL; ?>/AuthController/loginUsuario/" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail" class="form-label fs-5">Correo electrónico</label>
            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
          </div>
    
          <div class="form-group">
            <label for="exampleInputPassword" class="form-label fs-5">Contraseña</label>
            <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword">
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label fs-5" for="customCheck">Recordar inicio de sesión</label>
          </div>
      </div>

        <?php 
        if ($data['error_login']!=''){
          echo $data['error_login'];
        }
        ?>
        <div class="text-center">
          <button type="submit" class="btn btn btn-light btn-block fw-medium mt-4 p-3"> ENTRAR </button>
        </div>
        
      </form>

        <div class="text-center d-flex justify-content-between ">
          <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-5" href="<?php echo RUTA_URL;?>/AuthController/resetPassword">Olvidé mi contraseña</a>
          <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-5" href="<?php echo RUTA_URL;?>/AuthController/register">Crear Cuenta</a>
        </div>  
      </div>      
  </div>
</div>