<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم مالك المزرعة | Poultry Farm Management</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Cairo for Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/user-dashboard.css')
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen overflow-x-hidden">
    <!-- Mobile menu button -->
    <div class="lg:hidden fixed top-4 right-4 z-50">
        <button id="mobileMenuButton" class="bg-emerald-600 text-white p-3 rounded-full shadow-lg">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Overlay for mobile menu -->
    <div id="overlay" class="overlay"></div>

    <!-- Main Dashboard Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation (Right Side - Sticky) -->
        <aside
            class="sidebar w-80 bg-white border-l border-gray-200 shadow-lg fixed h-full right-0 top-0 z-40 overflow-y-auto">
            <!-- Top Section with Logo & User Profile -->
            <div class="p-6 border-b border-gray-100">
                <!-- App Logo -->
                <div class="flex items-center space-x-3 space-x-reverse mb-8">
                    <div class="w-12 h-12 rounded-xl emerald-gradient flex items-center justify-center shadow-md">
                        <i class="fas fa-egg text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">دواجن<span class="text-gold-600">Pro</span></h1>
                        <p class="text-sm text-gray-500">نظام إدارة المزارع المتكامل</p>
                    </div>
                </div>

                <!-- User Profile Summary -->
                <div class="glass-card rounded-2xl p-4 shadow-sm">
                    <div class="flex items-center space-x-3 space-x-reverse">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-emerald-100">
                            <div
                                class="absolute bottom-0 left-0 w-5 h-5 bg-emerald-500 rounded-full border-2 border-white">
                            </div>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg text-gray-900">الحاج أحمد</h2>
                            <p class="text-sm text-gray-600">مالك المزرعة</p>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">نشط
                                    الآن</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-2 gap-2">
                        <div class="text-center">
                            <p class="text-xs text-gray-500">المزرعة</p>
                            <p class="font-bold text-gray-800">دواجن النخبة</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500">الدورة</p>
                            <p class="font-bold text-gray-800">#دورة-24</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="sidebar-active flex items-center space-x-3 space-x-reverse p-4 rounded-xl transition-colors duration-200">
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center">
                                <i class="fas fa-tachometer-alt text-emerald-600 text-lg"></i>
                            </div>
                            <span class="font-medium">الرئيسية</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 space-x-reverse p-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-dove text-gray-600 text-lg"></i>
                            </div>
                            <span class="font-medium">إدارة القطعان</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 space-x-reverse p-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-warehouse text-gray-600 text-lg"></i>
                            </div>
                            <span class="font-medium">المخزون والأعلاف</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 space-x-reverse p-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-chart-line text-gray-600 text-lg"></i>
                            </div>
                            <span class="font-medium">التقارير المالية</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 space-x-reverse p-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-cog text-gray-600 text-lg"></i>
                            </div>
                            <span class="font-medium">الإعدادات</span>
                        </a>
                    </li>
                </ul>

                <!-- Quick Stats in Sidebar -->
                <div class="mt-8 p-4 bg-emerald-50 rounded-xl border border-emerald-100">
                    <h3 class="font-bold text-emerald-800 mb-3 text-sm">ملخص سريع</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">إجمالي الإيرادات</span>
                            <span class="font-bold text-emerald-700">4.2M ج.م</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">تكلفة الدورة</span>
                            <span class="font-bold text-gray-700">3.1M ج.م</span>
                        </div>
                        <div class="pt-2 border-t border-emerald-100">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">صافي الربح</span>
                                <span class="font-bold text-gold-600">1.1M ج.م</span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Logout Button at Bottom -->
            <div class="absolute bottom-0 w-full p-6 border-t border-gray-100">
                <button
                    class="flex items-center justify-center space-x-3 space-x-reverse w-full p-4 rounded-xl bg-gray-50 hover:bg-gray-100 text-gray-700 hover:text-red-600 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="font-medium">تسجيل الخروج</span>
                </button>
                <div class="mt-4 text-center text-xs text-gray-500">
                    <p>الإصدار 2.4.1 | آخر تحديث: 10 مايو 2023</p>
                </div>
            </div>
        </aside>

        <!-- Main Content Area (Left Side) -->
        <main class="flex-1 mr-0 lg:mr-80 p-4 lg:p-8">
            <!-- Profile Header Section -->
            <div class="profile-banner rounded-2xl mb-8 p-8 text-white relative overflow-hidden">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between">
                    <div class="flex items-center space-x-6 space-x-reverse mb-6 lg:mb-0">
                        <!-- Profile Picture with Gold Border -->
                        <div class="relative">
                            <div class="w-28 h-28 rounded-full gold-border overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                    alt="الحاج أحمد" class="w-full h-full object-cover">
                            </div>
                            <div
                                class="absolute -bottom-2 -right-2 w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center border-4 border-white">
                                <i class="fas fa-crown text-white text-sm"></i>
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold mb-2">الحاج أحمد</h1>
                            <p class="text-xl text-emerald-200 mb-4">مالك ومشرف عام على مزرعة دواجن النخبة</p>
                            <div class="flex flex-wrap gap-3">
                                <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                                    <i class="fas fa-map-marker-alt ml-2 text-emerald-300"></i>
                                    <span>المنطقة الزراعية، القليوبية، مصر</span>
                                </div>
                                <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                                    <i class="fas fa-calendar-alt ml-2 text-emerald-300"></i>
                                    <span>عضو منذ: يناير 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Button -->
                    <a href="{{ route('edit-user-data') }}"
                        class="gold-gradient text-gray-900 font-bold px-8 py-3 rounded-xl
          hover:shadow-xl hover:shadow-yellow-500/30
          transition-all duration-300
          flex items-center space-x-2 space-x-reverse">
                        <i class="fas fa-user-edit"></i>
                        <span>تعديل البيانات الشخصية</span>
                    </a>
                </div>
                <!-- Farm Status Indicators -->
                <div class="mt-8 pt-8 border-t border-white/20 flex flex-wrap gap-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/30 flex items-center justify-center ml-3">
                            <i class="fas fa-warehouse text-emerald-300"></i>
                        </div>
                        <div>
                            <p class="text-sm text-emerald-200">المزرعة الرئيسية</p>
                            <p class="font-bold">مزرعة دواجن النخبة - المقر الرئيسي</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-blue-500/30 flex items-center justify-center ml-3">
                            <i class="fas fa-phone-alt text-blue-300"></i>
                        </div>
                        <div>
                            <p class="text-sm text-emerald-200">رقم التواصل</p>
                            <p class="font-bold">+20 100 123 4567</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Overview - High-Level Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1: Total Live Birds -->
                <div class="stat-card glass-card rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i class="fas fa-dove text-emerald-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+5% هذا
                            الموسم</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">إجمالي الطيور الحية</h3>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold text-gray-900">45,000</p>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">من أصل 50,000</p>
                            <p class="text-xs text-emerald-600">معدل بقاء 90%</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">الدجاج اللاحم</span>
                            <span class="font-bold text-gray-800">40,200</span>
                        </div>
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">الأمهات</span>
                            <span class="font-bold text-gray-800">4,800</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Health Status -->
                <div class="stat-card glass-card rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 rounded-xl bg-green-50 flex items-center justify-center">
                            <i class="fas fa-heartbeat text-green-600 text-2xl"></i>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">الحالة الصحية العامة</h3>
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-3xl font-bold text-gray-900">ممتازة</p>
                            <p class="text-2xl font-bold text-green-600">98%</p>
                        </div>
                        <div class="text-right">
                            <div class="w-16 h-16 relative">
                                <svg class="w-full h-full" viewBox="0 0 36 36">
                                    <path
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                        fill="none" stroke="#e5e7eb" stroke-width="3" />
                                    <path
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                        fill="none" stroke="#10b981" stroke-width="3"
                                        stroke-dasharray="98, 100" />
                                </svg>
                                <span
                                    class="absolute inset-0 flex items-center justify-center text-sm font-bold text-green-700">98%</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">آخر فحص طبي</span>
                            <span class="font-bold text-gray-800">أمس، 10:30 ص</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Monthly Profit -->
                <div class="stat-card glass-card rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 rounded-xl bg-amber-50 flex items-center justify-center">
                            <i class="fas fa-coins text-amber-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full">+12% عن الشهر
                            الماضي</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">الأرباح هذا الشهر</h3>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold text-amber-700">150,000 <span class="text-xl">ج.م</span></p>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">الإيرادات</p>
                            <p class="text-xl font-bold text-gray-900">420,000 ج.م</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">هامش الربح</span>
                            <span class="font-bold text-green-600">35.7%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                            <div class="bg-amber-500 h-2 rounded-full" style="width: 35.7%"></div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Important Alerts -->
                <div class="stat-card glass-card rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 rounded-xl bg-red-50 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-red-600 bg-red-50 px-3 py-1 rounded-full">تحتاج إلى
                            اهتمام</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">تنبيهات هامة</h3>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold text-gray-900">3 <span
                                class="text-xl text-gray-600">تنبيهات</span></p>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">آخر تحديث</p>
                            <p class="text-xs font-bold text-gray-800">اليوم، 08:45 ص</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-red-500 ml-2"></div>
                                <span class="text-sm text-gray-700">حرارة الحظيرة ٤ مرتفعة</span>
                            </div>
                            <span class="text-xs text-gray-500">منذ ساعتين</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-amber-500 ml-2"></div>
                                <span class="text-sm text-gray-700">نفوق أعلى من المتوسط</span>
                            </div>
                            <span class="text-xs text-gray-500">منذ ٥ ساعات</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 ml-2"></div>
                                <span class="text-sm text-gray-700">طلب علف جديد</span>
                            </div>
                            <span class="text-xs text-gray-500">منذ يوم</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Hub -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">إجراءات سريعة</h2>
                    <div class="flex space-x-3 space-x-reverse">
                        <button class="text-sm text-emerald-600 hover:text-emerald-800 flex items-center">
                            <i class="fas fa-history ml-2"></i>
                            <span>عرض السجل الكامل</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Add New Cycle Card -->
                    <div class="action-card emerald-gradient text-white rounded-2xl p-6 shadow-lg cursor-pointer">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-16 h-16 rounded-xl bg-white/30 flex items-center justify-center">
                                <i class="fas fa-plus-circle text-3xl"></i>
                            </div>
                            <div class="text-right">
                                <span class="text-sm bg-white/30 px-3 py-1 rounded-full">جديد</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold mb-3">إضافة دورة جديدة</h3>
                        <p class="text-emerald-100 mb-6">ابدأ دورة تربية جديدة مع إعدادات مخصصة ومتابعة ذكية</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm">متوسط الدورة: ٤٥ يوم</span>
                            <i class="fas fa-arrow-left"></i>
                        </div>
                    </div>

                    <!-- Log Daily Mortality Card -->
                    <div
                        class="action-card glass-card rounded-2xl p-6 border border-gray-100 shadow-sm cursor-pointer hover:border-emerald-200">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-16 h-16 rounded-xl bg-red-50 flex items-center justify-center">
                                <i class="fas fa-skull-crossbones text-red-600 text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-500">اليوم: ١٥ مايو</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">تسجيل نفوق يومي</h3>
                        <p class="text-gray-600 mb-6">سجل أعداد النفوق اليومي مع تحديد الأسباب للحظائر المختلفة</p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-history ml-1"></i>
                                <span>آخر تسجيل: ٤٨ طائر</span>
                            </div>
                            <i class="fas fa-arrow-left text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Add Vet Treatment Card -->
                    <div
                        class="action-card glass-card rounded-2xl p-6 border border-gray-100 shadow-sm cursor-pointer hover:border-emerald-200">
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-16 h-16 rounded-xl bg-blue-50 flex items-center justify-center">
                                <i class="fas fa-syringe text-blue-600 text-2xl"></i>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-full">مستعجل</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">إضافة معاملة بيطرية</h3>
                        <p class="text-gray-600 mb-6">سجل علاجات بيطرية جديدة أو برامج تحصين للقطعان</p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-user-md ml-1"></i>
                                <span>الدكتور: إيهاب صليح</span><br>
                                <i class="fas fa-user-md ml-1"></i>
                                <span>الدكتور: صلاح ضوه</span>
                            </div>
                            <i class="fas fa-arrow-left text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & CRUD Table -->
            <div class="glass-card rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">آخر العمليات المسجلة</h2>
                    <div class="flex space-x-3 space-x-reverse">
                        <button class="text-sm text-emerald-600 hover:text-emerald-800 flex items-center">
                            <i class="fas fa-filter ml-2"></i>
                            <span>تصفية</span>
                        </button>
                        <button class="text-sm text-gray-600 hover:text-gray-800 flex items-center">
                            <i class="fas fa-download ml-2"></i>
                            <span>تصدير</span>
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-4 font-bold text-gray-700">التاريخ</th>
                                <th class="pb-4 font-bold text-gray-700">نوع العملية</th>
                                <th class="pb-4 font-bold text-gray-700">التفاصيل</th>
                                <th class="pb-4 font-bold text-gray-700">الحالة</th>
                                <th class="pb-4 font-bold text-gray-700">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="table-row-hover border-b border-gray-100">
                                <td class="py-4">
                                    <div>
                                        <p class="font-bold">١٥ مايو ٢٠٢٣</p>
                                        <p class="text-sm text-gray-500">١٠:٣٠ صباحًا</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center ml-3">
                                            <i class="fas fa-utensils text-emerald-600"></i>
                                        </div>
                                        <span class="font-medium">تغذية</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">توزيع علف جديد للحظائر ١-٥</p>
                                    <p class="text-sm text-gray-500">كمية: ٢.٥ طن | نوع: علف بادي</p>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">مكتمل</span>
                                </td>
                                <td class="py-4">
                                    <div class="relative">
                                        <button class="actions-button p-2 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v text-gray-500"></i>
                                        </button>
                                        <div
                                            class="actions-menu hidden absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-lg border border-gray-200 z-10">
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>تعديل</span>
                                                <i class="fas fa-edit text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>نسخ</span>
                                                <i class="fas fa-copy text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-red-600 flex items-center justify-between">
                                                <span>حذف</span>
                                                <i class="fas fa-trash text-red-400"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="table-row-hover border-b border-gray-100">
                                <td class="py-4">
                                    <div>
                                        <p class="font-bold">١٤ مايو ٢٠٢٣</p>
                                        <p class="text-sm text-gray-500">٠٣:١٥ مساءً</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center ml-3">
                                            <i class="fas fa-skull-crossbones text-red-600"></i>
                                        </div>
                                        <span class="font-medium">نفوق</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">تسجيل نفوق يومي للحظائر</p>
                                    <p class="text-sm text-gray-500">إجمالي النفوق: ٤٨ طائر | السبب: أمراض تنفسية</p>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">قيد
                                        المراجعة</span>
                                </td>
                                <td class="py-4">
                                    <div class="relative">
                                        <button class="actions-button p-2 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v text-gray-500"></i>
                                        </button>
                                        <div
                                            class="actions-menu hidden absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-lg border border-gray-200 z-10">
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>تعديل</span>
                                                <i class="fas fa-edit text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>نسخ</span>
                                                <i class="fas fa-copy text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-red-600 flex items-center justify-between">
                                                <span>حذف</span>
                                                <i class="fas fa-trash text-red-400"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="table-row-hover border-b border-gray-100">
                                <td class="py-4">
                                    <div>
                                        <p class="font-bold">١٣ مايو ٢٠٢٣</p>
                                        <p class="text-sm text-gray-500">٠٩:٠٠ صباحًا</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center ml-3">
                                            <i class="fas fa-syringe text-blue-600"></i>
                                        </div>
                                        <span class="font-medium">علاج بيطري</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">تحصين ضد النيوكاسل</p>
                                    <p class="text-sm text-gray-500">الحظائر: ١،٢،٣ | العمر: ٢١ يوم</p>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">مكتمل</span>
                                </td>
                                <td class="py-4">
                                    <div class="relative">
                                        <button class="actions-button p-2 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v text-gray-500"></i>
                                        </button>
                                        <div
                                            class="actions-menu hidden absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-lg border border-gray-200 z-10">
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>تعديل</span>
                                                <i class="fas fa-edit text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>نسخ</span>
                                                <i class="fas fa-copy text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-red-600 flex items-center justify-between">
                                                <span>حذف</span>
                                                <i class="fas fa-trash text-red-400"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="table-row-hover">
                                <td class="py-4">
                                    <div>
                                        <p class="font-bold">١٢ مايو ٢٠٢٣</p>
                                        <p class="text-sm text-gray-500">٠٢:٠٠ مساءً</p>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center ml-3">
                                            <i class="fas fa-weight text-purple-600"></i>
                                        </div>
                                        <span class="font-medium">وزن</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <p class="font-medium">قياس متوسط وزن الدجاج</p>
                                    <p class="text-sm text-gray-500">الحظيرة ٤ | متوسط الوزن: ١.٨ كجم</p>
                                </td>
                                <td class="py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">مكتمل</span>
                                </td>
                                <td class="py-4">
                                    <div class="relative">
                                        <button class="actions-button p-2 rounded-lg hover:bg-gray-100">
                                            <i class="fas fa-ellipsis-v text-gray-500"></i>
                                        </button>
                                        <div
                                            class="actions-menu hidden absolute left-0 mt-2 w-40 bg-white shadow-lg rounded-lg border border-gray-200 z-10">
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>تعديل</span>
                                                <i class="fas fa-edit text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-gray-700 flex items-center justify-between">
                                                <span>نسخ</span>
                                                <i class="fas fa-copy text-gray-400"></i>
                                            </button>
                                            <button
                                                class="w-full text-right px-4 py-3 hover:bg-gray-50 text-red-600 flex items-center justify-between">
                                                <span>حذف</span>
                                                <i class="fas fa-trash text-red-400"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        عرض ١-٤ من ٨٦ عملية
                    </div>
                    <div class="flex space-x-2 space-x-reverse">
                        <button
                            class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center">
                            1
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                            2
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                            3
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @vite('resources/js/user-dashboard.js')
</body>

</html>
