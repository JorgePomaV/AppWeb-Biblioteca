<?php require RUTA_APP .'/views/layout/landing/header.php';?>

<header>
        <div class="container">
            <p class="logo">Biblioteca UNLZ</p>
            <nav>
                <a href="#hero">Inicio</a>
                <a href="#final">Mas Informacion</a>
            </nav>
        </div>
    </header>
    <section id="hero">
        <h1>Biblioteca<br>UNLZ</h1>
        <button class="botton-index" type="botton" onclick="window.location.href='<?php echo RUTA_URL; ?>/AuthController/login'">Iniciar Sesion!</button>
        <button class="botton-index" type="button" onclick="window.location.href='<?php echo RUTA_URL; ?>/AuthController/register'">Crear cuenta!</button>
    </section>

    </section>

    <section id="final">
        <h2>Biblioteca</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum nisi quae dolor repellendus, rem eos a cupiditate perspiciatis accusamus sapiente aut numquam iure placeat excepturi architecto, temporibus suscipit reiciendis aspernatur!</p>
        <button>REGISTRATE YA!</button>
    </section>
</body>
<?php require RUTA_APP .'/views/layout/landing/footer.php';?>
