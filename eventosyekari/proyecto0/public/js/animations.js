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
    backgrounds[currentIndex].style.opacity = "0"
    currentIndex = (currentIndex + 1) % backgrounds.length
    backgrounds[currentIndex].style.opacity = "1"
  }, 5000)
})()

document.addEventListener("DOMContentLoaded", () => {
  console.log("[v0] DOM loaded, initializing...")

  const serviceCards = document.querySelectorAll(".service-card-expandable")
  console.log("[v0] Found service cards:", serviceCards.length)

  const toggleButtons = document.querySelectorAll(".toggle-details")
  console.log("[v0] Found toggle buttons:", toggleButtons.length)

  if (toggleButtons.length === 0) {
    console.error("[v0] No toggle buttons found! Check HTML structure.")
  }

  toggleButtons.forEach((button, index) => {
    console.log(`[v0] Setting up button ${index}`)

    button.addEventListener("click", function (e) {
      e.preventDefault()
      e.stopPropagation()

      console.log(`[v0] Button ${index} clicked!`)

      // Find the parent card
      const card = this.closest(".service-card-expandable")
      if (!card) {
        console.error("[v0] Could not find parent card!")
        return
      }
      console.log("[v0] Found parent card:", card)

      // Find the details section
      const details = card.querySelector(".service-details")
      if (!details) {
        console.error("[v0] Could not find details section!")
        return
      }
      console.log("[v0] Found details section:", details)

      // Find the icon
      const icon = this.querySelector(".toggle-icon")
      if (!icon) {
        console.error("[v0] Could not find icon!")
        return
      }

      // Toggle the active class
      const isActive = details.classList.contains("active")
      console.log("[v0] Current state - isActive:", isActive)

      if (isActive) {
        // Close
        details.classList.remove("active")
        this.classList.remove("active")
        icon.textContent = "+"
        card.setAttribute("aria-expanded", "false")
        this.setAttribute("aria-expanded", "false")
        console.log("[v0] Closed details")
      } else {
        // Open
        details.classList.add("active")
        this.classList.add("active")
        icon.textContent = "−"
        card.setAttribute("aria-expanded", "true")
        this.setAttribute("aria-expanded", "true")
        console.log("[v0] Opened details")
      }

      // Force a reflow to ensure the transition happens
      details.offsetHeight
    })
  })

  // Smooth scroll for anchor links
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

  // Confetti effect on CTA button
  const ctaButton = document.querySelector(".cta")
  if (ctaButton) {
    ctaButton.addEventListener("click", (e) => {
      createConfetti(e.clientX, e.clientY)
    })
  }

  // Animated title color change
  const animatedTitle = document.querySelector(".animated-title")
  if (animatedTitle) {
    const colors = ["#FF6666", "#FF3300", "#FF6600", "#FFFF33", "#66FF66", "#00CCC0", "#099FF0", "#0CCFF0"]
    let colorIndex = 0

    setInterval(() => {
      colorIndex = (colorIndex + 1) % colors.length
      animatedTitle.style.textShadow = `0 0 30px ${colors[colorIndex]}, 0 0 60px ${colors[colorIndex]}`
    }, 1000)
  }
})

// Confetti animation function
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
