<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل البيانات الشخصية | لوحة تحكم مزرعة الدواجن</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Cairo for Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/user-data.css')
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Main Profile Edit Card -->
    <div class="dark-card w-full max-w-4xl overflow-hidden">
        <!-- Header Section -->
        <div class="p-8 pb-6 border-b section-divider">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">تعديل البيانات الشخصية</h1>
                    <p class="text-gray-400 mt-1">قم بتحديث معلومات حسابك الشخصية وبيانات المزرعة</p>
                </div>
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="w-10 h-10 rounded-full bg-emerald-900/30 flex items-center justify-center">
                        <i class="fas fa-user-edit text-emerald-400"></i>
                    </div>
                    <div class="hidden md:block">
                        <span class="text-xs text-emerald-400 bg-emerald-900/30 px-3 py-1 rounded-full">آخر تحديث: منذ ٣ أيام</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="p-8">
            <!-- Profile Photo Section -->
            <div class="flex flex-col items-center mb-10">
                <div class="avatar-container mb-4">
                    <div class="w-40 h-40 rounded-full overflow-hidden emerald-border">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="صورة الملف الشخصي" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="avatar-upload" id="uploadTrigger">
                        <i class="fas fa-camera text-white text-lg"></i>
                    </div>
                </div>
                
                <div class="text-center">
                    <h3 class="text-xl font-bold text-white mb-1">الحاج أحمد</h3>
                    <p class="text-gray-400">مالك ومشرف مزرعة دواجن</p>
                    <p class="text-sm text-emerald-400 mt-2">انقر على أيقونة الكاميرا لتغيير الصورة الشخصية</p>
                </div>
            </div>
            
            <!-- Hidden File Input for Avatar Upload -->
            <input type="file" id="avatarUpload" class="hidden" accept="image/*">
            
            <!-- Form Fields Grid -->
            <form id="profileForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Field 1: Full Name -->
                    <div>
                        <label for="fullName" class="block text-white font-medium mb-2">
                            <i class="fas fa-user ml-2 text-emerald-400"></i>
                            الاسم بالكامل
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="fullName" 
                                   class="dark-input w-full rounded-xl py-3 px-4 pr-12"
                                   placeholder="أدخل الاسم الكامل"
                                   value="الحاج أحمد محمد إبراهيم"
                                   required>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-check-circle text-emerald-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">يجب أن يحتوي الاسم على الأقل على ٣ أحرف</p>
                    </div>
                    
                    <!-- Field 2: Job Title -->
                    <div>
                        <label for="jobTitle" class="block text-white font-medium mb-2">
                            <i class="fas fa-briefcase ml-2 text-emerald-400"></i>
                            المسمى الوظيفي
                        </label>
                        <div class="relative">
                            <select id="jobTitle" 
                                    class="dark-input w-full rounded-xl py-3 px-4 pr-12 appearance-none">
                                <option value="owner" selected>مالك المزرعة</option>
                                <option value="manager">مدير المزرعة</option>
                                <option value="supervisor">مشرف مزرعة</option>
                                <option value="veterinarian">طبيب بيطري</option>
                                <option value="other">منصب آخر</option>
                            </select>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">المسمى الوظيفي الظاهر في لوحة التحكم</p>
                    </div>
                    
                    <!-- Field 3: Address/Location -->
                    <div>
                        <label for="address" class="block text-white font-medium mb-2">
                            <i class="fas fa-map-marker-alt ml-2 text-emerald-400"></i>
                            العنوان / المنطقة
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="address" 
                                   class="dark-input w-full rounded-xl py-3 px-4 pr-12"
                                   placeholder="العنوان التفصيلي للمزرعة"
                                   value="المنطقة الزراعية - طريق القاهرة الإسكندرية الزراعي - القليوبية"
                                   required>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-map-pin text-emerald-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">يستخدم لإرسال الطلبات والتواصل</p>
                    </div>
                    
                    <!-- Field 4: Phone Number -->
                    <div>
                        <label for="phoneNumber" class="block text-white font-medium mb-2">
                            <i class="fas fa-phone-alt ml-2 text-emerald-400"></i>
                            رقم التواصل
                        </label>
                        <div class="relative">
                            <input type="tel" 
                                   id="phoneNumber" 
                                   class="dark-input w-full rounded-xl py-3 px-4 pr-12"
                                   placeholder="مثال: +20 100 123 4567"
                                   value="+20 100 123 4567"
                                   required>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-mobile-alt text-emerald-400"></i>
                            </div>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="w-3 h-3 rounded-full bg-emerald-400 ml-2"></div>
                            <p class="text-xs text-emerald-400">رقم التواصل مؤكد</p>
                        </div>
                    </div>
                    
                    <!-- Field 5: Main Farm Name -->
                    <div class="md:col-span-2">
                        <label for="farmName" class="block text-white font-medium mb-2">
                            <i class="fas fa-tractor ml-2 text-emerald-400"></i>
                            اسم المزرعة الرئيسية
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="farmName" 
                                   class="dark-input w-full rounded-xl py-3 px-4 pr-12"
                                   placeholder="الاسم الرسمي للمزرعة الرئيسية"
                                   value="مزرعة دواجن النخبة - المقر الرئيسي"
                                   required>
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-warehouse text-emerald-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">الاسم الذي يظهر في الفواتير والعقود الرسمية</p>
                    </div>
                </div>
        
        <!-- Action Buttons Footer -->
        <div class="p-8 pt-6 border-t section-divider">
            <div class="flex flex-col-reverse md:flex-row md:items-center md:justify-between gap-4">
                <!-- Cancel Button -->
                <button id="cancelBtn" class="cancel-btn font-medium py-3 rounded-xl hover:bg-gray-800/50 transition-colors duration-200 md:w-auto">
                    <i class="fas fa-times ml-2"></i>
                    إلغاء
                </button>
                
                <!-- Save Button -->
                <button id="saveBtn" class="gold-btn py-3 px-8 rounded-xl font-bold text-lg md:w-auto w-full flex items-center justify-center">
                    <i class="fas fa-save ml-2"></i>
                    حفظ التعديلات
                </button>
            </div>
        </div>
    </div>

    <!-- Success Toast Notification -->
    <div id="successToast" class="fixed bottom-6 left-6 bg-emerald-600 text-white p-4 rounded-xl shadow-2xl z-50 hidden transform transition-all duration-300 translate-y-10">
        <div class="flex items-center space-x-3 space-x-reverse">
            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center">
                <i class="fas fa-check text-lg"></i>
            </div>
            <div>
                <p class="font-bold">تم الحفظ بنجاح!</p>
                <p class="text-sm text-emerald-100">تم تحديث بياناتك الشخصية</p>
            </div>
        </div>
    </div>

    <!-- Error Toast Notification -->
    <div id="errorToast" class="fixed bottom-6 left-6 bg-red-600 text-white p-4 rounded-xl shadow-2xl z-50 hidden transform transition-all duration-300 translate-y-10">
        <div class="flex items-center space-x-3 space-x-reverse">
            <div class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-lg"></i>
            </div>
            <div>
                <p class="font-bold">حدث خطأ!</p>
                <p class="text-sm text-red-100">يرجى التحقق من البيانات المدخلة</p>
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden p-4">
        <div class="dark-card max-w-md w-full">
            <div class="p-6 border-b section-divider">
                <h2 class="text-xl font-bold text-white">تغيير الصورة الشخصية</h2>
                <p class="text-gray-400 text-sm mt-1">اختر صورة جديدة للملف الشخصي</p>
            </div>
            
            <div class="p-6">
                <div class="border-2 border-dashed border-gray-600 rounded-2xl p-8 text-center mb-6 hover:border-emerald-500 transition-colors duration-200 cursor-pointer" id="dropZone">
                    <div class="w-16 h-16 rounded-full bg-emerald-900/30 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cloud-upload-alt text-emerald-400 text-2xl"></i>
                    </div>
                    <p class="text-white font-medium mb-2">اسحب وأفلت الصورة هنا</p>
                    <p class="text-gray-400 text-sm">أو انقر لاختيار ملف من جهازك</p>
                    <p class="text-gray-500 text-xs mt-2">JPG, PNG أو GIF. الحجم الأقصى 5MB</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <button id="closeUploadModal" class="cancel-btn font-medium py-2 px-6 rounded-lg">
                        إلغاء
                    </button>
                    <button id="uploadPhotoBtn" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200">
                        رفع الصورة
                    </button>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/user-dashboard.js')
</body>
</html>