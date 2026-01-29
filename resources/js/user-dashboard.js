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

//-------------------

// DOM Elements
const uploadTrigger = document.getElementById("uploadTrigger");
const avatarUpload = document.getElementById("avatarUpload");
const uploadModal = document.getElementById("uploadModal");
const closeUploadModal = document.getElementById("closeUploadModal");
const dropZone = document.getElementById("dropZone");
const saveBtn = document.getElementById("saveBtn");
const cancelBtn = document.getElementById("cancelBtn");
const successToast = document.getElementById("successToast");
const errorToast = document.getElementById("errorToast");
const profileForm = document.getElementById("profileForm");

// Avatar Upload Functionality
uploadTrigger.addEventListener("click", () => {
    uploadModal.classList.remove("hidden");
});

closeUploadModal.addEventListener("click", () => {
    uploadModal.classList.add("hidden");
});

dropZone.addEventListener("click", () => {
    avatarUpload.click();
});

// Close modal when clicking outside
uploadModal.addEventListener("click", (e) => {
    if (e.target === uploadModal) {
        uploadModal.classList.add("hidden");
    }
});

// File upload preview
avatarUpload.addEventListener("change", function (e) {
    if (this.files && this.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            // Update the avatar image
            document.querySelector(".avatar-container img").src =
                e.target.result;

            // Show success message
            showToast("تم تحديث الصورة بنجاح!", "success");

            // Close modal
            uploadModal.classList.add("hidden");
        };

        reader.readAsDataURL(this.files[0]);
    }
});

// Form Validation and Submission
saveBtn.addEventListener("click", (e) => {
    e.preventDefault();

    // Get form values
    const fullName = document.getElementById("fullName").value.trim();
    const phoneNumber = document.getElementById("phoneNumber").value.trim();
    const farmName = document.getElementById("farmName").value.trim();

    // Simple validation
    if (!fullName || fullName.length < 3) {
        showToast("يرجى إدخال اسم صحيح (3 أحرف على الأقل)", "error");
        document.getElementById("fullName").focus();
        return;
    }

    if (!phoneNumber || phoneNumber.length < 10) {
        showToast("يرجى إدخال رقم هاتف صحيح", "error");
        document.getElementById("phoneNumber").focus();
        return;
    }

    if (!farmName) {
        showToast("يرجى إدخال اسم المزرعة", "error");
        document.getElementById("farmName").focus();
        return;
    }

    // Simulate API call with loading state
    saveBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin ml-2"></i> جاري الحفظ...';
    saveBtn.disabled = true;

    setTimeout(() => {
        // Show success message
        showToast("تم تحديث البيانات الشخصية بنجاح", "success");

        // Reset button state
        saveBtn.innerHTML = '<i class="fas fa-save ml-2"></i> حفظ التعديلات';
        saveBtn.disabled = false;

        // In a real app, you would submit the form here
        // profileForm.submit();
    }, 1500);
});

// Cancel button functionality
cancelBtn.addEventListener("click", () => {
    // Show confirmation before discarding changes
    if (
        confirm(
            "هل أنت متأكد من إلغاء التعديلات؟ سيتم فقدان جميع التغييرات غير المحفوظة.",
        )
    ) {
        // Reset form to original values
        profileForm.reset();
        showToast("تم إلغاء التعديلات", "error");
    }
});

// Toast notification function
function showToast(message, type = "success") {
    if (type === "success") {
        successToast.querySelector("p.font-bold").textContent = message;
        successToast.classList.remove("hidden");
        successToast.classList.remove("translate-y-10");

        // Hide after 3 seconds
        setTimeout(() => {
            successToast.classList.add("translate-y-10");
            setTimeout(() => {
                successToast.classList.add("hidden");
            }, 300);
        }, 3000);
    } else {
        errorToast.querySelector("p.font-bold").textContent = message;
        errorToast.classList.remove("hidden");
        errorToast.classList.remove("translate-y-10");

        // Hide after 3 seconds
        setTimeout(() => {
            errorToast.classList.add("translate-y-10");
            setTimeout(() => {
                errorToast.classList.add("hidden");
            }, 300);
        }, 3000);
    }
}

// Input field focus effects
const inputs = document.querySelectorAll("input, select");
inputs.forEach((input) => {
    input.addEventListener("focus", function () {
        this.parentElement.classList.add("ring-1", "ring-emerald-500");
    });

    input.addEventListener("blur", function () {
        this.parentElement.classList.remove("ring-1", "ring-emerald-500");
    });
});

// Initialize with form validation check
document.addEventListener("DOMContentLoaded", () => {
    // Check initial form validity
    const fullName = document.getElementById("fullName").value.trim();
    const phoneNumber = document.getElementById("phoneNumber").value.trim();
    const farmName = document.getElementById("farmName").value.trim();

    if (fullName && phoneNumber && farmName) {
        saveBtn.disabled = false;
    }
});

//---------------------------


