<?php
// Página de inicio - Eventos Yekari
// Archivo: /c:/xampp/htdocs/eventosyekari/eventosyekari/proyecto0/vista/Home.php

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos Yekari - Inicio</title>

    <!-- CSS principal del tema -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <!-- Estilos específicos del header -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/header.css">
    <!-- Estilos específicos del footer -->
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
</head>
<body>

    <!-- Header compartido -->
    <?php include __DIR__ . '/header.php'; ?>

    <main>
        <!-- Sección hero: carrusel de fondo con overlay y contenido principal -->
        <section class="hero" id="inicio">
            <!-- Cada div .hero-bg representa una imagen del carrusel (fondo) -->
            <div id="hero-bg1" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_1.jpg');opacity:1"></div>
            <div id="hero-bg2" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_2.jpg');opacity:0"></div>
            <div id="hero-bg3" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_3.jpg');opacity:0"></div>
            <div id="hero-bg4" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_4.jpg');opacity:0"></div>
            <div id="hero-bg5" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_5.jpg');opacity:0"></div>

            <!-- Capa semitransparente sobre las imágenes para mejorar legibilidad -->
            <div class="hero-overlay"></div>

            <!-- Contenido visible en el hero: título y subtítulo -->
            <div class="hero-content">
                <h1>Eventos Yekari</h1>
                <p>Entretenimiento infantil.</p>
            </div>
        </section>
        
        <!-- Sección de Servicios: lista de servicios ofrecidos -->
        <section id="servicios" class="section container">
            <h2 class="section-title">Nuestros Servicios</h2>

            <!-- Grid de tarjetas de servicio; role="list" para accesibilidad -->
            <div class="services-grid-new" role="list">
                <!-- Service Card 1: estructura reutilizable -->
                <div class="service-card-expandable card-color-1" role="listitem" aria-expanded="false">
                    <!-- Cabecera de la tarjeta: imagen, título, duración, precio y botón -->
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x3.jpg" alt="Brinkis 5x3" class="service-image">
                        <h3>BRINKIS 5x3</h3>
                        <!-- Duración del servicio -->
                        <p class="service-duration">3 HORAS</p>
                        <!-- Precio mostrado -->
                        <p class="service-price">$130.000</p>
                        <!-- Botón para alternar detalles (JS controla la apertura/cierre) -->
                        <button class="toggle-details" aria-label="Ver más detalles" aria-expanded="false">
                            <span class="toggle-icon">+</span>
                        </button>
                    </div>

                    <!-- Detalles expandidos: lista de especificaciones del producto/servicio -->
                    <div class="service-details">
                        <ul>
                            <li><strong>Medidas:</strong> 5m x 3m</li>
                            <li><strong>Resbaladeros:</strong> 2</li>
                            <li><strong>Colores:</strong> Naranja, verde, azul, amarillo</li>
                            <li><strong>Modelo:</strong> Castillo</li>
                            <li><strong>Capacidad:</strong> 10 niños</li>
                            <li><strong>Estatura máx:</strong> 1.30cm</li>
                            <li><strong>Incluye:</strong> Transporte en Cúcuta</li>
                        </ul>
                    </div>
                </div>

                <!-- Service Card 2: otro ejemplo, mantener la misma estructura para consistencia -->
                <div class="service-card-expandable card-color-2" role="listitem" aria-expanded="false">
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x3_1.jpg" alt="BRINKIS 5x3" class="service-image">
                        <h3>BRINKIS 5x3</h3>
                        <p class="service-duration">3 HORAS</p>
                        <p class="service-price">$130.000</p>
                        <button class="toggle-details" aria-label="Ver más detalles" aria-expanded="false">
                            <span class="toggle-icon">+</span>
                        </button>
                    </div>
                    <div class="service-details">
                        <ul>
                            <li><strong>Medidas:</strong> 5m x 3m</li>
                            <li><strong>Resbaladeros:</strong> 2</li>
                            <li><strong>Colores:</strong> azul, rosado, verde, rojo</li>
                            <li><strong>Modelo:</strong> Castillo</li>
                            <li><strong>Capacidad:</strong> 10 niños</li>
                            <li><strong>Estatura máx:</strong> 1.30 cm</li>
                            <li><strong>Incluye:</strong> Transporte en Cúcuta</li>
                        </ul>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card-expandable card-color-3" role="listitem" aria-expanded="false">
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x6.jpg" alt="BRINKIS 5x6" class="service-image">
                        <h3>BRINKIS 5x6</h3>
                        <p class="service-duration">3 HORAS</p>
                        <p class="service-price">$150.000</p>
                        <button class="toggle-details" aria-label="Ver más detalles" aria-expanded="false">
                            <span class="toggle-icon">+</span>
                        </button>
                    </div>
                    <div class="service-details">
                        <ul>
                            <li><strong>Medidas:</strong> 5m x 6m</li>
                            <li><strong>Resbaladeros:</strong> 3</li>
                            <li><strong>Colores:</strong> rojo, negro, verde, azul, amarillo</li>
                            <li><strong>Modelo:</strong> Castillo</li>
                            <li><strong>Capacidad:</strong> 15 niños</li>
                            <li><strong>Estatura máx:</strong> 1.30 m</li>
                            <li><strong>Incluye:</strong> Transporte en Cúcuta</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Enlace a catálogo completo de servicios -->
            <div class="more-services" style="text-align:center;margin-top:20px;">
                 <a href="/eventosyekari/eventosyekari/proyecto0/vista/catalogo.php" class="cta">Ver servicios</a>
            </div>
        </section>

        <!-- Sección de testimonios: feedback de clientes -->
        <section class="testimonials" aria-labelledby="testi-title">
            <h2 id="testi-title" class="section-title">Testimonios</h2>

            <!-- Grid de testimonios; cada tarjeta incluye imagen, nombre y comentario -->
            <div class="t-grid">
                <!-- Testimonio 1 -->
                <div class="testimonial" style="display:flex;flex-direction:column;align-items:center;text-align:center">
                    <!-- Imagen redonda del cliente; onerror usa un placeholder si no carga -->
                    <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Testimonio_1.jpeg" alt="Cliente 1" onerror="this.src='img/person-placeholder.png'"
                         style="width:120px;height:120px;object-fit:cover;border-radius:50%;margin-bottom:12px">
                    <div>
                        <div class="meta"><strong>María Gómez</strong><small>Cliente</small></div>
                        <p>Excelente servicio, cuidaron cada detalle y superaron nuestras expectativas.</p>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="testimonial" style="display:flex;flex-direction:column;align-items:center;text-align:center">
                    <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Testimonio_2.jpeg" alt="Cliente 2" onerror="this.src='img/person-placeholder.png'"
                         style="width:120px;height:120px;object-fit:cover;border-radius:50%;margin-bottom:12px">
                    <div>
                        <div class="meta"><strong>Carlos Pérez</strong><small>Cliente</small></div>
                        <p>Profesionales y empáticos. La organización fue impecable.</p>
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div class="testimonial" style="display:flex;flex-direction:column;align-items:center;text-align:center">
                    <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Testimonio_3.jpeg" alt="Cliente 3" onerror="this.src='img/person-placeholder.png'"
                         style="width:120px;height:120px;object-fit:cover;border-radius:50%;margin-bottom:12px">
                    <div>
                        <div class="meta"><strong>Luisa Fernández</strong><small>Cliente</small></div>
                        <p>Recomendados 100%. Hicieron de nuestro día algo mágico.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- WhatsApp flotante: enlace directo para contactar por WhatsApp -->
    <a href="https://wa.me/573232495465?text=Hola,%20me%20gustaría%20información%20sobre%20sus%20servicios" 
       class="whatsapp-float" 
       target="_blank"
       aria-label="Contactar por WhatsApp">
        <!-- Icono SVG de WhatsApp, mantiene color actual mediante CSS (currentColor) -->
        <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path d="M16 0c-8.837 0-16 7.163-16 16 0 2.825 0.737 5.607 2.137 8.048l-2.137 7.952 7.933-2.127c2.42 1.37 5.173 2.127 8.067 2.127 8.837 0 16-7.163 16-16s-7.163-16-16-16zM16 29.467c-2.482 0-4.908-0.646-7.07-1.87l-0.507-0.292-4.713 1.262 1.262-4.669-0.292-0.508c-1.207-2.100-1.847-4.507-1.847-6.924 0-7.435 6.050-13.485 13.485-13.485s13.485 6.050 13.485 13.485c0 7.435-6.050 13.485-13.485 13.485zM21.960 18.735c-0.353-0.177-2.085-1.030-2.408-1.147-0.323-0.117-0.558-0.177-0.793 0.177s-0.912 1.147-1.117 1.383c-0.205 0.235-0.41 0.265-0.763 0.088s-1.487-0.548-2.833-1.748c-1.048-0.935-1.755-2.090-1.960-2.443s-0.022-0.543 0.155-0.72c0.159-0.159 0.353-0.41 0.530-0.617 0.177-0.205 0.235-0.353 0.353-0.587 0.117-0.235 0.058-0.44-0.030-0.617s-0.793-1.913-1.088-2.618c-0.287-0.687-0.578-0.593-0.793-0.605-0.205-0.010-0.44-0.012-0.675-0.012s-0.617 0.088-0.94 0.44c-0.323 0.353-1.235 1.207-1.235 2.943s1.265 3.413 1.44 3.647c0.177 0.235 2.485 3.797 6.020 5.325 0.842 0.364 1.5 0.582 2.012 0.745 0.847 0.267 1.617 0.229 2.227 0.139 0.679-0.102 2.085-0.852 2.38-1.675s0.295-1.528 0.205-1.675c-0.088-0.147-0.323-0.235-0.675-0.41z"/>
        </svg>
    </a>

    <!-- Footer compartido -->
    <?php include __DIR__ . '/footer.php'; ?>

    <!-- Script para animaciones / interactividad (p. ej. carrusel y toggle de detalles) -->
    <script src="/eventosyekari/eventosyekari/proyecto0/public/js/animations.js"></script>
</body>
</html>
