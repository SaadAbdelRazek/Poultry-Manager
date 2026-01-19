import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Mobile menu toggle functionality
document
    .getElementById("mobile-menu-toggle")
    .addEventListener("click", function () {
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");

        // Change icon
        const icon = this.querySelector("i");
        if (icon.classList.contains("fa-bars")) {
            icon.classList.remove("fa-bars");
            icon.classList.add("fa-times");
        } else {
            icon.classList.remove("fa-times");
            icon.classList.add("fa-bars");
        }
    });

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        const targetId = this.getAttribute("href");
        if (targetId === "#") return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            // Close mobile menu if open
            const mobileMenu = document.getElementById("mobile-menu");
            const menuToggle = document.getElementById("mobile-menu-toggle");
            const menuIcon = menuToggle.querySelector("i");

            if (!mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.add("hidden");
                menuIcon.classList.remove("fa-times");
                menuIcon.classList.add("fa-bars");
            }

            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: "smooth",
            });
        }
    });
});

// Add scroll effect to navbar
window.addEventListener("scroll", function () {
    const navbar = document.querySelector("nav");
    if (window.scrollY > 50) {
        navbar.classList.add("glass-morphism");
    } else {
        navbar.classList.remove("glass-morphism");
    }
});
