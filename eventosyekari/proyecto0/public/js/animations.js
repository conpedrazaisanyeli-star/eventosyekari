// Animaciones y efectos interactivos para Eventos Yekari

;(() => {
  const backgrounds = [
    document.getElementById("hero-bg1"),
    document.getElementById("hero-bg2"),
    document.getElementById("hero-bg3"),
    document.getElementById("hero-bg4"),
    document.getElementById("hero-bg5"),
  ]

  let currentIndex = 0

  setInterval(() => {
    // Fade out current background
    backgrounds[currentIndex].style.opacity = "0"

    // Move to next background
    currentIndex = (currentIndex + 1) % backgrounds.length

    // Fade in next background
    backgrounds[currentIndex].style.opacity = "1"
  }, 5000)
})()

// Animación de entrada para las tarjetas de servicio
document.addEventListener("DOMContentLoaded", () => {
  const serviceCards = document.querySelectorAll(".service-card")

  const observerOptions = {
    threshold: 0.2,
    rootMargin: "0px 0px -100px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.animation = "cardSlideIn 0.6s ease-out forwards"
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  serviceCards.forEach((card) => {
    card.style.opacity = "0"
    card.style.transform = "translateY(50px)"
    observer.observe(card)
  })

  // Toggle functionality for expandable service cards
  const toggleButtons = document.querySelectorAll(".toggle-details")

  toggleButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const card = this.closest(".service-card-expandable")
      const details = card.querySelector(".service-details")

      // Toggle active class
      this.classList.toggle("active")
      details.classList.toggle("active")
    })
  })
})

// Animación CSS para las tarjetas
const style = document.createElement("style")
style.textContent = `
    @keyframes cardSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`
document.head.appendChild(style)

// Animación de color aleatorio para el título del hero
const animatedTitle = document.querySelector(".animated-title")
if (animatedTitle) {
  const colors = ["#FF6666", "#FF3300", "#FF6600", "#FFFF33", "#66FF66", "#00CCC0", "#099FF0", "#0CCFF0"]
  let colorIndex = 0

  setInterval(() => {
    colorIndex = (colorIndex + 1) % colors.length
    animatedTitle.style.textShadow = `0 0 30px ${colors[colorIndex]}, 0 0 60px ${colors[colorIndex]}`
  }, 1000)
}

// Smooth scroll para los enlaces de navegación
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))

    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// Efecto de confetti al hacer clic en el botón CTA
const ctaButton = document.querySelector(".cta")
if (ctaButton) {
  ctaButton.addEventListener("click", (e) => {
    createConfetti(e.clientX, e.clientY)
  })
}

function createConfetti(x, y) {
  const colors = ["#FF6666", "#FF3300", "#FFFF33", "#66FF66", "#099FF0", "#66FFFF"]

  for (let i = 0; i < 30; i++) {
    const confetti = document.createElement("div")
    confetti.style.position = "fixed"
    confetti.style.left = x + "px"
    confetti.style.top = y + "px"
    confetti.style.width = "10px"
    confetti.style.height = "10px"
    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)]
    confetti.style.borderRadius = "50%"
    confetti.style.pointerEvents = "none"
    confetti.style.zIndex = "9999"

    document.body.appendChild(confetti)

    const angle = Math.random() * Math.PI * 2
    const velocity = 5 + Math.random() * 10
    const vx = Math.cos(angle) * velocity
    const vy = Math.sin(angle) * velocity

    animateConfetti(confetti, vx, vy)
  }
}

function animateConfetti(element, vx, vy) {
  let x = Number.parseFloat(element.style.left)
  let y = Number.parseFloat(element.style.top)
  let opacity = 1

  function update() {
    x += vx
    y += vy
    opacity -= 0.02

    element.style.left = x + "px"
    element.style.top = y + "px"
    element.style.opacity = opacity

    if (opacity > 0) {
      requestAnimationFrame(update)
    } else {
      element.remove()
    }
  }

  update()
}
