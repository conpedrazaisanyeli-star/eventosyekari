<?php
// Página de inicio - Eventos Yekari
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos Yekari - Inicio</title>
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/theme.css">
    <link rel="stylesheet" href="/eventosyekari/eventosyekari/proyecto0/public/css/footer.css">
</head>
<body>

    <header class="site-header">
        <nav class="nav" aria-label="Menú principal">
            <a href="#inicio">Inicio</a>
            <a href="/eventosyekari/eventosyekari/proyecto0/vista/nuestraHistoria.php">Nuestra Historia</a>
            <a href="#servicios">Servicios</a>
            <a class="btn-login" href="login.php">Iniciar sesión</a>
        </nav>
        <div class="brand">
            <img src="/eventosyekari/eventosyekari/proyecto0/public/img/logo.png" alt="Logo Eventos Yekari" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=48 height=48><rect width=48 height=48 fill=%23FF6666/><text x=50% y=50% dominant-baseline=middle text-anchor=middle fill=%23fff font-size=18>EY</text></svg>'">
            <div>
                <div style="font-weight:700">Eventos Yekari</div>
                <small>Creando recuerdos</small>
            </div>
        </div>
    </header>

    <main>
        <section class="hero" id="inicio">
            <div id="hero-bg1" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_1.jpg');opacity:1"></div>
            <div id="hero-bg2" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_2.jpg');opacity:0"></div>
            <div id="hero-bg3" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_3.jpg');opacity:0"></div>
            <div id="hero-bg4" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_4.jpg');opacity:0"></div>
            <div id="hero-bg5" class="hero-bg" style="background-image:url('/eventosyekari/eventosyekari/proyecto0/public/img/Carrusel_5.jpg');opacity:0"></div>
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <h1>Eventos Yekari</h1>
                <p>Entretenimiento infantil.</p>
            </div>
        </section>
        <section id="servicios" class="section container">
            <h2 class="section-title">Nuestros Servicios</h2>

            <div class="services-grid-new" role="list">
                <!-- Service Card 1 -->
                <div class="service-card-expandable card-color-1" role="listitem">
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x3.jpg" alt="Brinkis 5x3" class="service-image">
                        <h3>BRINKIS 5x3</h3>
                        <p class="service-duration">3 HORAS</p>
                        <p class="service-price">$130.000</p>
                        <button class="toggle-details" aria-label="Ver más detalles">
                            <span class="toggle-icon">+</span>
                        </button>
                    </div>
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

                <!-- Service Card 2 -->
                <div class="service-card-expandable card-color-2" role="listitem">
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x3_1.jpg" alt="BRINKIS 5x3" class="service-image">
                        <h3>BRINKIS 5x3</h3>
                        <p class="service-duration">3 HORAS</p>
                        <p class="service-price">$130.000</p>
                        <button class="toggle-details" aria-label="Ver más detalles">
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
                <div class="service-card-expandable card-color-3" role="listitem">
                    <div class="service-header">
                        <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Brinkis_5x6.jpg" alt="BRINKIS 5x6" class="service-image">
                        <h3>BRINKIS 5x6</h3>
                        <p class="service-duration">3 HORAS</p>
                        <p class="service-price">$150.000</p>
                        <button class="toggle-details" aria-label="Ver más detalles">
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

            <div class="more-services" style="text-align:center;margin-top:20px;">
                 <a href="/eventosyekari/eventosyekari/proyecto0/vista/Catalogo.php" class="cta">Ver servicios</a>
            </div>
        </section>

                <!-- Add more service cards here following the same structure -->

            </div>
        </section>

        <section class="testimonials" aria-labelledby="testi-title">
            <h2 id="testi-title" class="section-title">Testimonios</h2>
            <div class="t-grid">
            <div class="testimonial" style="display:flex;flex-direction:column;align-items:center;text-align:center">
                <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Testimonio_1.jpeg" alt="Cliente 1" onerror="this.src='img/person-placeholder.png'"
                 style="width:120px;height:120px;object-fit:cover;border-radius:50%;margin-bottom:12px">
                <div>
                <div class="meta"><strong>María Gómez</strong><small>Cliente</small></div>
                <p>Excelente servicio, cuidaron cada detalle y superaron nuestras expectativas.</p>
                </div>
            </div>

            <div class="testimonial" style="display:flex;flex-direction:column;align-items:center;text-align:center">
                <img src="/eventosyekari/eventosyekari/proyecto0/public/img/Testimonio_2.jpeg" alt="Cliente 2" onerror="this.src='img/person-placeholder.png'"
                 style="width:120px;height:120px;object-fit:cover;border-radius:50%;margin-bottom:12px">
                <div>
                <div class="meta"><strong>Carlos Pérez</strong><small>Cliente</small></div>
                <p>Profesionales y empáticos. La organización fue impecable.</p>
                </div>
            </div>

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

    <!-- WhatsApp flotante -->
    <a href="https://wa.me/573162402680?text=Hola,%20me%20gustaría%20información%20sobre%20sus%20servicios" 
       class="whatsapp-float" 
       target="_blank"
       aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path d="M16 0c-8.837 0-16 7.163-16 16 0 2.825 0.737 5.607 2.137 8.048l-2.137 7.952 7.933-2.127c2.42 1.37 5.173 2.127 8.067 2.127 8.837 0 16-7.163 16-16s-7.163-16-16-16zM16 29.467c-2.482 0-4.908-0.646-7.07-1.87l-0.507-0.292-4.713 1.262 1.262-4.669-0.292-0.508c-1.207-2.100-1.847-4.507-1.847-6.924 0-7.435 6.050-13.485 13.485-13.485s13.485 6.050 13.485 13.485c0 7.435-6.050 13.485-13.485 13.485zM21.960 18.735c-0.353-0.177-2.085-1.030-2.408-1.147-0.323-0.117-0.558-0.177-0.793 0.177s-0.912 1.147-1.117 1.383c-0.205 0.235-0.41 0.265-0.763 0.088s-1.487-0.548-2.833-1.748c-1.048-0.935-1.755-2.090-1.960-2.443s-0.022-0.543 0.155-0.72c0.159-0.159 0.353-0.41 0.530-0.617 0.177-0.205 0.235-0.353 0.353-0.587 0.117-0.235 0.058-0.44-0.030-0.617s-0.793-1.913-1.088-2.618c-0.287-0.687-0.578-0.593-0.793-0.605-0.205-0.010-0.44-0.012-0.675-0.012s-0.617 0.088-0.94 0.44c-0.323 0.353-1.235 1.207-1.235 2.943s1.265 3.413 1.44 3.647c0.177 0.235 2.485 3.797 6.020 5.325 0.842 0.364 1.5 0.582 2.012 0.745 0.847 0.267 1.617 0.229 2.227 0.139 0.679-0.102 2.085-0.852 2.38-1.675s0.295-1.528 0.205-1.675c-0.088-0.147-0.323-0.235-0.675-0.41z"/>
        </svg>
    </a>

    <!-- Footer con Redes Sociales -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Eventos y Ekari</h3>
                    <p>Creando momentos memorables desde 2012</p>
                </div>
                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <div class="social-links">
                        <a href="https://instagram.com" target="_blank" class="social-icon instagram" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.059-1.281-.073-1.689-.073-4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://facebook.com" target="_blank" class="social-icon facebook" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://tiktok.com" target="_blank" class="social-icon tiktok" aria-label="TikTok">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Eventos y Ekari. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="/eventosyekari/eventosyekari/proyecto0/public/js/animations.js"></script>
</body>
</html>
