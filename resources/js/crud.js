// Initialize Flatpickr with Arabic localization
flatpickr(".flatpickr", {
    locale: "ar",
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "j F Y",
    allowInput: true,
    disableMobile: true,
});

// Page Navigation
const listViewPage = document.getElementById("listViewPage");
const formViewPage = document.getElementById("formViewPage");
const listViewBtn = document.getElementById("listViewBtn");
const formViewBtn = document.getElementById("formViewBtn");
const backToListBtn = document.getElementById("backToListBtn");
const addNewFlockBtn = document.getElementById("addNewFlockBtn");
const cancelFormBtn = document.getElementById("cancelFormBtn");
const createModeBtn = document.getElementById("createModeBtn");
const editModeBtn = document.getElementById("editModeBtn");
const formTitle = document.getElementById("formTitle");

// Show List View
function showListView() {
    listViewPage.classList.remove("hidden");
    formViewPage.classList.add("hidden");
    listViewBtn.classList.add("bg-emerald-50", "text-emerald-700");
    formViewBtn.classList.remove("bg-emerald-50", "text-emerald-700");
}

// Show Form View
function showFormView() {
    listViewPage.classList.add("hidden");
    formViewPage.classList.remove("hidden");
    formViewBtn.classList.add("bg-emerald-50", "text-emerald-700");
    listViewBtn.classList.remove("bg-emerald-50", "text-emerald-700");
}

// Set form to Create mode
function setCreateMode() {
    formTitle.textContent = "إضافة دورة جديدة";
    createModeBtn.classList.add("bg-emerald-600", "text-white");
    editModeBtn.classList.remove("bg-emerald-600", "text-white");
    editModeBtn.classList.add("text-gray-700", "hover:bg-gray-50");

    // Reset form
    document.getElementById("flockForm").reset();
    document.getElementById("flockName").placeholder = "مثال: قطيع #F-2023-16";
}

// Set form to Edit mode
function setEditMode() {
    formTitle.textContent = "تعديل بيانات الدورة #F-2023-15";
    editModeBtn.classList.add("bg-emerald-600", "text-white");
    createModeBtn.classList.remove("bg-emerald-600", "text-white");
    createModeBtn.classList.add("text-gray-700", "hover:bg-gray-50");

    // Populate form with example data
    document.getElementById("flockName").value = "قطيع #F-2023-15";
    document.getElementById("startDate").value = "2023-05-15";
    document.getElementById("birdCount").value = "10000";
    document.getElementById("breedType").value = "broiler";
    document.getElementById("breedSubtype").value = "cobb500";
    document.getElementById("housingType").value = "tunnel";
    document.getElementById("farmSection").value = "section4";
    document.getElementById("responsiblePerson").value = "محمد أحمد";
    document.getElementById("targetWeight").value = "2.5";
    document.getElementById("targetAge").value = "42";
    document.getElementById("trialCycle").checked = false;
    document.getElementById("autoAlerts").checked = true;
    document.getElementById("additionalNotes").value =
        "قطيع دجاج لاحم - سلالة كوب 500 - الحظيرة 4";
}

// Event Listeners for page navigation
listViewBtn.addEventListener("click", showListView);
formViewBtn.addEventListener("click", () => {
    showFormView();
    setCreateMode();
});
backToListBtn.addEventListener("click", showListView);
addNewFlockBtn.addEventListener("click", () => {
    showFormView();
    setCreateMode();
});
cancelFormBtn.addEventListener("click", showListView);
createModeBtn.addEventListener("click", setCreateMode);
editModeBtn.addEventListener("click", setEditMode);

// Filter Dropdown Toggle
const filterDropdownBtn = document.getElementById("filterDropdownBtn");
const filterDropdown = document.getElementById("filterDropdown");

filterDropdownBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    filterDropdown.classList.toggle("hidden");
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
    if (!filterDropdown.contains(e.target) && e.target !== filterDropdownBtn) {
        filterDropdown.classList.add("hidden");
    }
});

// Search Input Focus Effect
const searchInput = document.getElementById("searchInput");
searchInput.addEventListener("focus", function () {
    this.parentElement.classList.add(
        "ring-2",
        "ring-gold-200",
        "border-gold-400",
    );
});

searchInput.addEventListener("blur", function () {
    this.parentElement.classList.remove(
        "ring-2",
        "ring-gold-200",
        "border-gold-400",
    );
});

// Input Focus Effects
document.querySelectorAll(".input-focus").forEach((input) => {
    input.addEventListener("focus", function () {
        this.classList.add("border-emerald-500", "ring-2", "ring-emerald-200");
    });

    input.addEventListener("blur", function () {
        this.classList.remove(
            "border-emerald-500",
            "ring-2",
            "ring-emerald-200",
        );
    });
});

// Form Validation
const flockForm = document.getElementById("flockForm");
const flockNameError = document.getElementById("flockNameError");
const birdCountError = document.getElementById("birdCountError");

flockForm.addEventListener("submit", function (e) {
    e.preventDefault();
    let isValid = true;

    // Validate Flock Name
    const flockName = document.getElementById("flockName").value;
    if (!flockName.trim()) {
        flockNameError.classList.remove("hidden");
        document.getElementById("flockName").classList.add("input-error");
        isValid = false;
    } else {
        flockNameError.classList.add("hidden");
        document.getElementById("flockName").classList.remove("input-error");
    }

    // Validate Bird Count
    const birdCount = document.getElementById("birdCount").value;
    if (!birdCount || birdCount <= 0) {
        birdCountError.classList.remove("hidden");
        document.getElementById("birdCount").classList.add("input-error");
        isValid = false;
    } else {
        birdCountError.classList.add("hidden");
        document.getElementById("birdCount").classList.remove("input-error");
    }

    if (isValid) {
        // Show success toast
        const successToast = document.getElementById("successToast");
        successToast.classList.remove("hidden");

        // Hide toast after 3 seconds
        setTimeout(() => {
            successToast.classList.add("hidden");
        }, 3000);

        // Switch back to list view after successful submission
        setTimeout(() => {
            showListView();
        }, 1000);
    }
});

// Delete Modal Functionality
const deleteModal = document.getElementById("deleteModal");
const deleteButtons = document.querySelectorAll(".delete-btn");
const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

deleteButtons.forEach((button) => {
    button.addEventListener("click", () => {
        deleteModal.classList.remove("hidden");
    });
});

cancelDeleteBtn.addEventListener("click", () => {
    deleteModal.classList.add("hidden");
});

confirmDeleteBtn.addEventListener("click", () => {
    deleteModal.classList.add("hidden");
    // Show success message
    const successToast = document.getElementById("successToast");
    successToast.querySelector("p.font-bold").textContent = "تم الحذف بنجاح!";
    successToast.querySelector("p.text-sm").textContent =
        "تم حذف بيانات القطيع من النظام";
    successToast.classList.remove("hidden");

    setTimeout(() => {
        successToast.classList.add("hidden");
    }, 3000);
});

// Edit button functionality
document.querySelectorAll(".edit-btn").forEach((button) => {
    button.addEventListener("click", () => {
        showFormView();
        setEditMode();
    });
});

// Close modal when clicking outside
window.addEventListener("click", (e) => {
    if (e.target === deleteModal) {
        deleteModal.classList.add("hidden");
    }
});

// Initialize with list view
showListView();
