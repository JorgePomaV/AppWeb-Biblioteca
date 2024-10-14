<?php require RUTA_APP .'/views/layout/landing/header.php';?>

<body>
<!--<header>
    <nav class="navbar bg-body-secondary">
        <div class="container-fluid justify-content-end">
            <a class="btn btn-outline-primary me-2" type="button" href="<?php echo RUTA_URL; ?>/AuthController/login">Ingresar</a>
                </nav>
        </div>
        <div class="menu container">
                <a href="#" class="home">Home</a>
                <input type="checkbox" id="menu">
                <nav class="navbar">
                    <ul>
                        <li><a href="#">Iniciar Sesion</a></li>
                        <li><a href="#">Registrarse</a></li>
                    </ul>
                </nav>

            </div>

            <div class="header-container">
                <h1>Biblioteca UNLZ</h1>
                <input type="text" placeholder="buscar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <nav class="navbar-2">
                    <ul>
                        <li><a href="#">Categorías</a></li>
                        <li><a href="#">Ficción</a></li>
                        <li><a href="#">Académico</a></li>
                        <li><a href="#">Técnicos y Personales</a></li>
                    </ul>
                </nav>
            </div>
</header>-->
    <header>
        <div class="container">
            <p class="logo">Biblioteca UNLZ</p>
            <nav>
                <a href="#seccion-libros">Nuestros Libros</a>
                <a href="#final">Mas Informacion</a>
            </nav>
        </div>
    </header>
<!--<section class="container mt-3 mb-3">
    <h2 class="text-center text-white">Bienvenidos</h2>
    <div class="row">
        <div class="col-md-3">
            <p class="text-white">Nuestro sistema te ayudará a organizarte.</p>
            <h3 class="text-white">Decile adiós al <em>pulpo manotas</em></h3>
        </div>
        <div class="col-md-9">
            <img class="" src="<?php echo RUTA_URL;?>/img/tareas_landing.jpg" alt="">
        </div>
    </div>

</section>-->
    <section id="hero">
        <h1>Biblioteca<br>UNLZ</h1>
        <button>Iniciar Sesion!</button>
        <button>Crear cuenta!</button>
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
