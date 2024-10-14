<?php require RUTA_APP .'/views/layout/landing/header.php';?>

<header>
        <div class="container">
            <p class="logo">Biblioteca UNLZ</p>
            <nav>
                <a href="#hero">Inicio</a>
                <a href="#seccion-libros">Nuestros Libros</a>
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

    <section class="seccion-libros" id="seccion-libros">
        <h2>Nuestros Libros Destacados</h2>
        <div class="product-container">
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-1.png" alt="Producto 1">
                <h3>Libro 1</h3>
                <p>$25.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-2.png" alt="Producto 2">
                <h3>Libro 2</h3>
                <p>$30.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-3.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-4.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-5.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-6.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-7.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-8.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-9.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
            <div class="product-card">
                <img src="<?php echo RUTA_URL;?>/css/image/libro-10.png" alt="Producto 3">
                <h3>Libro 3</h3>
                <p>$20.00</p>
                <button>Añadir al carrito</button>
            </div>
        </div>
    </section>

    <section id="final">
        <h2>Biblioteca</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum nisi quae dolor repellendus, rem eos a cupiditate perspiciatis accusamus sapiente aut numquam iure placeat excepturi architecto, temporibus suscipit reiciendis aspernatur!</p>
        <button>REGISTRATE YA!</button>
    </section>
</body>
<?php require RUTA_APP .'/views/layout/landing/footer.php';?>
