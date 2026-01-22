// Mobile menu toggle
const mobileMenuButton = document.getElementById("mobileMenuButton");
const sidebar = document.querySelector(".sidebar");
const overlay = document.getElementById("overlay");

mobileMenuButton.addEventListener("click", () => {
    sidebar.classList.toggle("sidebar-open");
    overlay.classList.toggle("overlay-open");
});

overlay.addEventListener("click", () => {
    sidebar.classList.remove("sidebar-open");
    overlay.classList.remove("overlay-open");
});

// Actions menu toggle for table rows
document.querySelectorAll(".actions-button").forEach((button) => {
    button.addEventListener("click", function (e) {
        e.stopPropagation();

        // Close any open menus
        document.querySelectorAll(".actions-menu").forEach((menu) => {
            if (menu !== this.nextElementSibling) {
                menu.classList.add("hidden");
            }
        });

        // Toggle current menu
        const menu = this.nextElementSibling;
        menu.classList.toggle("hidden");
    });
});

// Close actions menus when clicking elsewhere
document.addEventListener("click", function () {
    document.querySelectorAll(".actions-menu").forEach((menu) => {
        menu.classList.add("hidden");
    });
});

// Set active state for sidebar items
document.querySelectorAll("aside nav a").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();

        // Remove active class from all links
        document.querySelectorAll("aside nav a").forEach((item) => {
            item.classList.remove("sidebar-active");
            item.classList.remove("text-emerald-600");
            item.querySelector("div").classList.remove("bg-emerald-50");
            item.querySelector("i").classList.remove("text-emerald-600");
        });

        // Add active class to clicked link
        this.classList.add("sidebar-active");
        this.classList.add("text-emerald-600");
        this.querySelector("div").classList.add("bg-emerald-50");
        this.querySelector("i").classList.add("text-emerald-600");
    });
});

// Quick action card interactions
document.querySelectorAll(".action-card").forEach((card) => {
    card.addEventListener("click", function () {
        const title = this.querySelector("h3").textContent;
        alert(`سيتم فتح نموذج: ${title}`);
    });
});
