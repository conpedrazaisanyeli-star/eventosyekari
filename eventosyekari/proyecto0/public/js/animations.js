// Animaciones y efectos interactivos para Eventos Yekari
// Archivo: public/js/animations.js


/*
    NOTAS GENERALES:
    - Este archivo gestiona varias animaciones y efectos:
        1) Ciclo de fondos (fade in/out) en el hero.
        2) Animación de entrada para tarjetas de servicio.
        3) Toggle para tarjetas expandibles.
        4) Animación de color para el título del hero.
        5) Smooth scroll para enlaces ancla.
        6) Confetti al pulsar el botón CTA.
    - Se añaden comprobaciones básicas para evitar errores si
        ciertos elementos no existen en el DOM.
*/

// IIFE para manejar el cambio cíclico de fondos del "hero"
;(() => {
    // Selección de elementos de fondo por id.
    // Si algún elemento no existe, se mantendrá como null en el array.
    const backgrounds = [
        document.getElementById("hero-bg1"),
        document.getElementById("hero-bg2"),
        document.getElementById("hero-bg3"),
        document.getElementById("hero-bg4"),
        document.getElementById("hero-bg5"),
    ]

    // Filtramos elementos nulos para evitar errores posteriores.
    const validBackgrounds = backgrounds.filter(Boolean)

    // Si no hay fondos válidos, salimos (nada que animar).
    if (validBackgrounds.length === 0) return

    // Índice del fondo actualmente visible
    let currentIndex = 0

    // Aseguramos estado inicial: todos opacos 0 excepto el primero (si existe)
    validBackgrounds.forEach((bg, idx) => {
        bg.style.transition = "opacity 0.8s ease" // transición suave de fade
        bg.style.opacity = idx === currentIndex ? "1" : "0"
        bg.style.pointerEvents = "none" // evitar interacción accidental
    })

    // Cada 5 segundos se alterna entre fondos
    setInterval(() => {
        // Fade out del fondo actual
        validBackgrounds[currentIndex].style.opacity = "0"

        // Avanza al siguiente fondo (con wrap-around)
        currentIndex = (currentIndex + 1) % validBackgrounds.length

        // Fade in del siguiente fondo
        validBackgrounds[currentIndex].style.opacity = "1"
    }, 5000)
})()

// ------------------------------------------------------------------------------------
// Animación de entrada para las tarjetas de servicio (IntersectionObserver)
// ------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    // Selecciona todas las tarjetas de servicio
    const serviceCards = document.querySelectorAll(".service-card")

    // Si no hay tarjetas, no es necesario crear el observer
    if (!serviceCards || serviceCards.length === 0) return

    // Opciones del observer:
    // - threshold: porcentaje de visibilidad requerido para disparar la animación
    // - rootMargin: margen para adelantar/retrasar el disparador verticalmente
    const observerOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -100px 0px",
    }

    // El callback se ejecuta cuando las tarjetas entran en el viewport
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            // Si la tarjeta es visible, aplicamos la animación y dejamos de observarla.
            if (entry.isIntersecting) {
                // Aplicación de la animación CSS definida más abajo
                entry.target.style.animation = "cardSlideIn 0.6s ease-out forwards"
                observer.unobserve(entry.target) // optimiza recursos
            }
        })
    }, observerOptions)

    // Inicializamos el estilo de entrada de cada tarjeta y la observamos
    serviceCards.forEach((card) => {
        // Estado inicial: invisible y desplazada hacia abajo
        card.style.opacity = "0"
        card.style.transform = "translateY(50px)"
        // Observamos la tarjeta para disparar la animación cuando aparezca
        observer.observe(card)
    })

    // ----------------------------------------------------------------------------------
    // Toggle para tarjetas de servicio expandibles (mostrar/ocultar detalles)
    // ----------------------------------------------------------------------------------
    const toggleButtons = document.querySelectorAll(".toggle-details")

    // Inicializar estado de .service-details: la visibilidad la controla CSS por max-height
    // Nos aseguramos de eliminar posibles estilos inline previos que impidan la transición
    document.querySelectorAll('.service-details').forEach((d) => {
        if (d.style && d.style.display) d.style.display = ''
    })

    // Si hay botones de toggle, añadimos listeners
    toggleButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            // Buscamos la tarjeta contenedora más cercana con la clase esperada
            const card = this.closest(".service-card-expandable")
            if (!card) return // protección por si estructura HTML es distinta

            // Elemento con los detalles que se expanden/colapsan
            const details = card.querySelector(".service-details")
            if (!details) return

            // Alternamos la clase active en details (controla max-height en CSS)
            const expanded = details.classList.toggle("active")

            // No tocamos `display` para permitir que la transición en CSS (max-height)
            // maneje la apertura/cierre de forma suave. Solo usamos la clase .active.

            // Indicadores ARIA y clases en el botón
            this.classList.toggle("active", expanded)
            this.setAttribute('aria-expanded', expanded ? 'true' : 'false')
            card.setAttribute('aria-expanded', expanded ? 'true' : 'false')

            // Actualizar icono interno si existe
            const icon = this.querySelector('.toggle-icon')
            if (icon) icon.textContent = expanded ? '-' : '+'

            // Evita que el click por accidente propague si está dentro de un form
            if (e) e.stopPropagation()
        })
    })
})

// ------------------------------------------------------------------------------------
// Inserción de la animación CSS para las tarjetas (keyframes)
// - Se crea dinámicamente para mantener este archivo autocontenido.
// ------------------------------------------------------------------------------------
const style = document.createElement("style")
style.textContent = `
        /* Animación que desliza la tarjeta hacia arriba y la hace visible */
        @keyframes cardSlideIn {
                to {
                        opacity: 1;
                        transform: translateY(0);
                }
        }

        /* Ejemplo de estilos que puedes usar para .service-details cuando se expande:
        .service-details { max-height: 0; overflow: hidden; transition: max-height 0.4s ease; }
        .service-details.active { max-height: 500px; } 
        */
`
document.head.appendChild(style)

// ------------------------------------------------------------------------------------
// Animación de color aleatorio para el título del hero
// - Añade un efecto de glow (sombra) que cambia de color cada segundo.
// ------------------------------------------------------------------------------------
const animatedTitle = document.querySelector(".animated-title")
if (animatedTitle) {
    // Paleta de colores para el efecto
    const colors = ["#FF6666", "#FF3300", "#FF6600", "#FFFF33", "#66FF66", "#00CCC0", "#099FF0", "#0CCFF0"]
    let colorIndex = 0

    // Cambia la sombra de texto periódicamente
    setInterval(() => {
        colorIndex = (colorIndex + 1) % colors.length
        // Usamos textShadow para crear un resplandor (puedes ajustar valores para más o menos intensidad)
        animatedTitle.style.textShadow = `0 0 30px ${colors[colorIndex]}, 0 0 60px ${colors[colorIndex]}`
    }, 1000)
}

// ------------------------------------------------------------------------------------
// Smooth scroll para enlaces de navegación con href que comienza con '#'
// - Evita el salto brusco y usa scrollIntoView con comportamiento 'smooth'.
// ------------------------------------------------------------------------------------
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault()
        const target = document.querySelector(this.getAttribute("href"))

        // Si existe el destino, lo desplazamos suavemente
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            })
        }
    })
})

// ------------------------------------------------------------------------------------
// Efecto de confetti al hacer clic en el botón CTA
// - Crea pequeños elementos <div> con movimiento y los anima hasta desaparecer.
// - Nota: puede impactar rendimiento si se usa repetidamente; limitar cantidad si hace falta.
// ------------------------------------------------------------------------------------
const ctaButton = document.querySelector(".cta")
if (ctaButton) {
    // Al hacer clic en el botón, se genera confetti en la posición del cursor.
    ctaButton.addEventListener("click", (e) => {
        // e.clientX / e.clientY corresponden a la posición del clic en la ventana
        createConfetti(e.clientX, e.clientY)
    })
}

/*
    createConfetti:
    - x, y: coordenadas iniciales del confetti (en px, respecto a la ventana)
    - Se crean N pequeños elementos con color aleatorio y se asignan velocidades aleatorias.
    - Se delega la animación a animateConfetti por cada pieza.
*/
function createConfetti(x, y) {
    // Paleta de colores para los confetti
    const colors = ["#FF6666", "#FF3300", "#FFFF33", "#66FF66", "#099FF0", "#66FFFF"]

    // Número de partículas: puedes reducir si detectas lag
    for (let i = 0; i < 30; i++) {
        const confetti = document.createElement("div")
        // Posicionamos el confetti en modo 'fixed' para que no dependa del scroll
        confetti.style.position = "fixed"
        confetti.style.left = x + "px"
        confetti.style.top = y + "px"
        confetti.style.width = "10px"
        confetti.style.height = "10px"
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)]
        confetti.style.borderRadius = "50%" // forma circular
        confetti.style.pointerEvents = "none" // no interfiere con clicks
        confetti.style.zIndex = "9999" // por encima de la mayoría de elementos

        document.body.appendChild(confetti)

        // Direccion aleatoria y velocidad inicial
        const angle = Math.random() * Math.PI * 2
        const velocity = 5 + Math.random() * 10
        const vx = Math.cos(angle) * velocity
        const vy = Math.sin(angle) * velocity

        // Inicia la animación de la pieza
        animateConfetti(confetti, vx, vy)
    }
}

/*
    animateConfetti:
    - element: nodo DOM del confetti
    - vx, vy: velocidad inicial en px por frame (aprox)
    - Implementa una animación simple usando requestAnimationFrame.
    - Decrementa la opacidad hasta eliminar el elemento.
    - NOTA: No hay gravedad ni rotación compleja; se puede mejorar añadiendo 'ay' fijo,
        rotación CSS y límites para que la pieza "caiga" hacia abajo con el tiempo.
*/
function animateConfetti(element, vx, vy) {
    // ParseFloat para convertir "123px" en número
    let x = Number.parseFloat(element.style.left)
    let y = Number.parseFloat(element.style.top)
    let opacity = 1

    // Parámetros opcionales que puedes ajustar:
    const friction = 0.99 // reduce lentamente la velocidad para simular rozamiento
    const gravity = 0.15  // añadimos gravedad para que las piezas caigan hacia abajo
    const fadeSpeed = 0.02 // velocidad de desvanecimiento

    function update() {
        // Aplicar física básica
        vx *= friction
        vy = vy * friction + gravity

        x += vx
        y += vy
        opacity -= fadeSpeed

        // Actualiza la posición y la opacidad en el DOM
        element.style.left = x + "px"
        element.style.top = y + "px"
        element.style.opacity = opacity

        // Si aún es visible, pedimos el siguiente frame, si no, eliminamos el nodo
        if (opacity > 0.02) {
            requestAnimationFrame(update)
        } else {
            // Removemos el elemento del DOM para liberar memoria
            if (element && element.remove) element.remove()
        }
    }

    // Inicio del bucle de animación
    update()
}
