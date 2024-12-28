<?php
session_start();
$isLoggedIn = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/Whatsapp.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="JS/carousel.js"></script>
    <title>GoodMornings</title>
</head>
<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <a href="https://api.whatsapp.com/send?phone=991688431&text=Hola!%20Quisiera%20saber%20m%C3%A1s%20informaci%C3%B3n." class="float" target="_blank">
        <div class="whatsapp">
        <i class="fa fa-whatsapp my-float"></i>
        </div>
     </a>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="respiracion">
                    <label for="" class="brand">
                        <a href="#"><img src="Images/file.png" alt="" class="img-fluid" style="max-height: 50px;"></a>
                    </label>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="container">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Nosotros">ACERCA DE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Productos">PRODUCTOS</a>
                            </li>

                            <?php if (!$isLoggedIn): ?>
                                <!-- Si no está logueado, muestra el texto "LOGIN" -->
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</a>
                                </li>
                            <?php else: ?>
                                <!-- Si está logueado, muestra "Bienvenido [nombre de usuario]" -->
                                <li class="nav-item">
                                <a class="nav-link">Bienvenido <?php echo $_SESSION['usuario']; ?></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="pedidos.php">PEDIDOS</a>  <!-- Cambié la URL a 'pedidos.php' -->
                                </li>

                                <!-- Opción para cerrar sesión -->
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">CERRAR SESIÓN</a>
                                </li>
                            <?php endif; ?>

                            <li class="nav-item">
                                <a class="nav-link cart-icon" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-count">0</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div><br><br>
            </nav>
        <marquee class="marquee">Bienvenido a GoodMornings, Disfrute de su estadía</marquee>
    </header>

    <main>
        <section class="banner">
            <div class="content-banner">
                <img src="Images/Fondo.jpg" alt="Portada" class="Imagen-Fondo">
            </div>
            <div class="carousel-container">
                <button class="carousel-button prev">&lt;</button>
                <div class="carousel-slides">
                    <!-- Primer producto -->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/Emoliente.png" alt="emoliente">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Emoliente</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Mejora la digestión</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Eliminar toxinas del cuerpo</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Rico en vitaminas y antioxidantes</p>
                            </div>
                        </div>
                    </div>
                    <!-- Segundo producto -->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/mate-de-coca.png" alt="mate-de-coca">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Mate de coca</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Ayuda a aliviar los cólicos</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Reduce la sensación de cansancio</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Previene y reduce los síntomas del mal de altura</p>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Tercer producto -->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/siete-semillas.png" alt="siete-semillas">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Siete Semillas</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Eliminan toxinas</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Fortalece las defensas del cuerpo</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Ayudan a regular el equilibrio hormonal</p>
                            </div>
                        </div>
                    </div>
                    <!-- Cuarto producto -->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/maca.png" alt="maca">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Maca</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Contiene vitaminas B, C y E</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Ideal para combatir la fatiga</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Ayuda al cuerpo a adaptarse al estrés físico y mental</p>                          
                            </div>
                        </div>
                    </div>
                    <!--Quinto producto-->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/jamaica.png" alt="jamaica">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Jamaica</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Conocida por su color rojo</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">sabor ácido y propiedades antioxidantes</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">ofrece beneficios al ser diurética y ayudar a regular la presión</p>
                            </div>
                        </div>
                    </div>
                    <!--Sexto producto-->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/jengibre.png" alt="jengibre">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Jengibre</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">Infusión de jengibre</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">conocida por su sabor picante y propiedades medicinales</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">alivia digestión, inflamación y resfriados</p>
                            </div>
                        </div>
                    </div>
                    <!--Séptimo producto-->
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/teconlimon.png" alt="jengibre">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Té con limón</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">bebida reconfortante que combina té caliente</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">ayuda a fortalecer el sistema inmunológico</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">alivia dolores de garganta y favorece la digestión</p>
                            </div>
                        </div>
                    </div>
                    <!--Octavo producto--> 
                    <div class="slide">
                        <div class="Carrusel">
                            <div class="imagen-bebida">
                                <img src="Images/Teverde.png" alt="jengibre">
                            </div>
                            <div class="descripcion-bebida">
                                <h2>Té verde</h2>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">bebida natural y saludable hecha a partir de las hojas de Camellia sinensis</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">conocido por sus múltiples beneficios para la salud</p>
                                <p style="text-align: center; margin-bottom: 5px; line-height: 1.2;">mejora el metabolismo y favorece la salud cardiovascular</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-button next">&gt;</button>
            </div>
        </section>

           <section class="us" id="Nosotros">
            <div class="About-us">
                <p class="Acerca"> GoodMornings ofrece bebidas 100% naturales, combinando tradición y bienestar en cada mezcla. Nuestras infusiones están elaboradas con hierbas de alta calidad, ideales para disfrutar de un momento saludable y equilibrado🌿
                </p>
            </div>
            <div class="wrapper">
                <div class="card"><img src="Images/modelo-emoliente2.jpg" alt="I1" class="img-fluid"></div>
                <div class="card"><img src="Images/modelo-emoliente3.jpg" alt="I2" class="img-fluid"></div>
                <div class="card"><img src="Images/modelo-emoliente4.jpg" alt="I3" class="img-fluid"></div>
                <div class="card"><img src="Images/modelo-emoliente5.jpg" alt="I4" class="img-fluid"></div>
            </div>    
           </section>
       
        <h2 style="color: white;"><i id="Productos"></i>Productos</h2>
        <br>

        <section class="container top-products">
            <div class="container-products">
                <!-- Emoliente -->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoEmoliente" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/Emoliente.png" alt="emoliente" class="img-fluid">
                        <span class="discount">-50%</span>
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <h3>Vaso de Emoliente</h3>
                        <span href="prendas.html" class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.4<span>S/.8</span></p>
                    </div>
                </div>
                <!-- Modal Emoliente -->
                    <div class="modal fade" id="productoEmoliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Emoliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-3">
                                        <img src="Images/Emoliente.png" alt="emoliente" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                    <h4>Descripción</h4>
                                    <p>Bebida tradicional peruana con propiedades medicinales:</p>
                                    <ul>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            <span>Mejora la digestión</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            <span>Elimina toxinas del cuerpo</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-check"></i>
                                            <span>Rico en vitaminas y antioxidantes</span>
                                        </li>
                                    </ul>
                                    <p class="fw-bold">Precio: S/.4 <span class="text-decoration-line-through text-muted">S/.8</span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Modal Emoliente -->
                    <!--Mate de coca-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoMate" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/mate-de-coca.png" alt="mate de coca" class="img-fluid">
                        <span class="discount">-33%</span>
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Mate de Coca</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.8<span>S/.12</span></p>
                    </div>
                </div>
                <!--Modal Mate de coca-->
                <div class="modal fade" id="productoMate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Mate de Coca</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/mate-de-coca.png" alt="emoliente" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Bebida tradicional originario de las regiones andinas de Perú, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Reduccion de colesterol</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Prevencion de enfermedades cardiovasculares</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Previene las infecciones urinarias</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.8 <span class="text-decoration-line-through text-muted">S/.12</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal Mate de coca-->
                <!--Siete semillas-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoSieteSemillas" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/siete-semillas.png" alt="siete semillas" class="img-fluid">
                        <span class="discount">-28%</span>
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Siete Semillas</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.5<span>S/.7</span></p>
                    </div>
                </div>
                <!--Modal Siete semillas-->
                <div class="modal fade" id="productoSieteSemillas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Siete Semillas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/siete-semillas.png" alt="emoliente" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Bebida tradicional de la gastronomía peruana con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Mejora la calcificacion de huesos</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Contiene gran cantidad de proteinas</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Retrasa el envejecimiento prematuro</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.5 <span class="text-decoration-line-through text-muted">S/.8</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal Siete semillas-->
                <!--Maca-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoMaca" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/maca.png" alt="maca" class="img-fluid">
                        <span class="discount">-40%</span>
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Maca</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.3<span>S/.5</span></p>
                    </div>
                </div>
                <!--Modal Maca-->
                <div class="modal fade" id="productoMaca" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Maca</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/maca.png" alt="maca" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Bebida tradicional originaria de la región de Cajamarca, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>la energía y la resistencia</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Estimula la función cognitiva</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Ayuda a reducir el estrés</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.3 <span class="text-decoration-line-through text-muted">S/.5</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal Maca-->
                <!--Jamaica-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoJamaica" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/jamaica.png" alt="jamaica" class="img-fluid">
                        <span class="discount">-50%</span>
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Jamaica</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.5<span>S/.10</span></p>
                    </div>
                </div>
                <!--Modal Jamaica-->
                <div class="modal fade" id="productoJamaica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Jamaica</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/jamaica.png" alt="jamaica" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Originaria de África tropical, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Rica en antioxidantes que combaten los radicales libres</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Ayuda a reducir la presión arterial</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Es diurética y favorece la eliminación de líquidos</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.5 <span class="text-decoration-line-through text-muted">S/.10</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal Jamaica-->
                <!--Te de jengibre-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoJengibre" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/jengibre.png" alt="jengibre class="img-fluid">
                        <div class="button-group">
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Jengibre</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">S/.5</p>
                    </div>
                </div>
                <!--Fin Modal Jengibre-->
                <div class="modal fade" id="productoJengibre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Té de jengibre</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/jengibre.png" alt="jamaica" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Originaria del este de asia, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>alivia náuseas y problemas digestivos</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Reduce la inflamación y el dolor muscular</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Fortalece el sistema inmunológico y combate resfriados</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.5 <span class="text-decoration-line-through text-muted">S/.10</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Té con limon-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoTeconlimon" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/teconlimon.png" alt="jengibre class="img-fluid">
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3>Té con limón</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping btn-add-cart"></i>
                        </span>
                        <p class="price">S/.4</p>
                    </div>
                </div>
                <!--Modal Té con limón-->
                <div class="modal fade" id="productoTeconlimon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Té con limón</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/teconlimon.png" alt="jamaica" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Bebida refrescante y saludable, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Ayuda a fortalecer el sistema inmunológico y mejora la digestión</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Ideal para aliviar resfriados</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Fortalece el sistema inmunológico gracias a su aporte de vitamina C y antioxidantes</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.4</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success"  data-bs-dismiss="modal">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal Té con limón-->
                <!--Té verde-->
                <div class="card-product" data-bs-toggle="modal" data-bs-target="#productoTeverde" style="cursor: pointer;">
                    <div class="container-img">
                        <img src="Images/Teverde.png" alt="jengibre class="img-fluid">
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Té verde</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping btn-add-cart"></i>
                        </span>
                        <p class="price">S/.4</p>
                    </div>
                </div>
                <!--Modal té verde-->
                <div class="modal fade" id="productoTeverde" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Té verde</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img src="Images/Teverde.png" alt="jamaica" class="img-fluid" style="max-width: 200px;">
                                </div>
                                <h4>Descripción</h4>
                                <p>Bebida caliente en base a té verde, con propiedades medicinales:</p>
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>mejora el metabolismo y ayuda en la quema de grasas</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Sus antioxidantes protegen las células y reducen el riesgo de enfermedades crónicas.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <span>Favorece la salud del corazón al reducir los niveles de colesterol</span>
                                    </li>
                                </ul>
                                <p class="fw-bold">Precio: S/.4</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer class="footer">
        
        <div class="container">
            
            <div class="footer-row">
                
                <div class="footer-links">
                    <h4>Compañia</h4>
                    <ul>
                        <li><a href="#Nosotros">Nosotros</a></li>
                        <li><a href="#Productos">Nuestros servicios</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="https://api.whatsapp.com/send?phone=991688431&text=Hola!%20Quisiera%20saber%20m%C3%A1s%20informaci%C3%B3n.">Preguntanos</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Tienda</h4>
                    <ul>
                        <li><a href="https://www.google.com.pe/maps/">Ubicanos</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Siguenos</h4>
                    <div class="social-link">
                        <a href="https://es-la.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://x.com/?logout=1725497299758"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.tiktok.com/es/"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión o Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabs para seleccionar Login o Registro -->
                <ul class="nav nav-tabs" id="loginRegisterTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="loginTab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="registerTab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registro</a>
                    </li>
                </ul>

                <!-- Contenido de los Tabs -->
                <div class="tab-content mt-3" id="loginRegisterTabsContent">
                    <!-- Formulario de Login -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="loginTab">
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>

                    <!-- Formulario de Registro -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="registerTab">
                        <form method="POST" action="registro.php">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo_registro" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo_registro" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="contraseña_registro" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña_registro" name="contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Carrito de Compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cart-items">
                    </div>
                    <div class="cart-total">
                        <h5>Total: S/.<span id="cart-total">0.00</span></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="checkout-btn">Proceder al pago</button>
                    </div>
            </div>
        </div>
    </div>


    <script src="JS/carrito.js"></script>    
</body>
</html>