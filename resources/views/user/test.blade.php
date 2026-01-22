<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة مزارع الدواجن | سجل قطعان المزرعة</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Cairo for Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Flatpickr for Date Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @vite('resources/css/crud.css')
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-sm border-b border-gray-100 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3 space-x-reverse">
                <div class="w-10 h-10 rounded-xl emerald-gradient flex items-center justify-center">
                    <i class="fas fa-egg text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">دواجن<span class="text-gold-600">Pro</span></h1>
                    <p class="text-sm text-gray-500">لوحة تحكم نظام إدارة المزارع</p>
                </div>
            </div>
            <div class="flex items-center space-x-6 space-x-reverse">
                <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home ml-2"></i>
                        <span>الرئيسية</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-chart-line ml-2"></i>
                        <span>التقارير</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-cog ml-2"></i>
                        <span>الإعدادات</span>
                    </a>
                </div>
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="relative">
                        <button class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                            <i class="fas fa-bell"></i>
                        </button>
                        <span class="absolute -top-1 -left-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </div>
                    <div class="flex items-center space-x-3 space-x-reverse">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                 alt="Profile" 
                                 class="w-full h-full rounded-full object-cover">
                        </div>
                        <div class="hidden md:block">
                            <p class="font-medium text-gray-900">الحاج أحمد</p>
                            <p class="text-xs text-gray-500">مالك المزرعة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Page Switcher Controls -->
        <div class="mb-8 flex justify-center">
            <div class="inline-flex rounded-xl bg-white p-1 shadow-sm border border-gray-200">
                <button id="listViewBtn" class="px-6 py-3 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-list ml-2"></i>
                    عرض القائمة
                </button>
                <button id="formViewBtn" class="px-6 py-3 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    <i class="fas fa-plus-circle ml-2"></i>
                    نموذج الإضافة
                </button>
            </div>
        </div>

        <!-- Data List View Page (Initially Visible) -->
        <div id="listViewPage" class="page-transition">
            <!-- Page Header Area -->
            <div class="mb-8">
                <!-- Breadcrumbs -->
                <nav class="flex mb-4" aria-label="breadcrumb">
                    <ol class="inline-flex items-center space-x-1 space-x-reverse text-sm text-gray-500">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center hover:text-emerald-600">
                                <i class="fas fa-home ml-2"></i>
                                الرئيسية
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-left text-gray-400"></i>
                                <a href="#" class="mr-2 hover:text-emerald-600">إدارة القطعان</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-left text-gray-400"></i>
                                <span class="mr-2 text-emerald-600 font-medium">سجل قطعان المزرعة</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <!-- Page Title and Action Bar -->
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-3xl font-bold text-gray-900">سجل قطعان المزرعة</h1>
                        <p class="text-gray-600 mt-2">عرض وإدارة جميع قطعان الدواجن في مزرعتك</p>
                    </div>
                    
                    <!-- Action Bar -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 sm:space-x-reverse">
                        <!-- Search Input -->
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="searchInput" 
                                   class="input-focus bg-white border border-gray-300 rounded-xl py-3 pr-10 pl-4 w-full sm:w-64 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200" 
                                   placeholder="بحث في القطعان...">
                        </div>
                        
                        <!-- Filter Dropdown -->
                        <div class="relative">
                            <button id="filterDropdownBtn" class="flex items-center bg-white border border-gray-300 rounded-xl py-3 px-4 hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-filter text-gray-500 ml-2"></i>
                                <span>تصفية النتائج</span>
                                <i class="fas fa-chevron-down text-gray-400 mr-2 text-sm"></i>
                            </button>
                            <div id="filterDropdown" class="absolute left-0 mt-2 w-64 bg-white rounded-xl shadow-lg border border-gray-200 z-10 hidden">
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-800 mb-3">خيارات التصفية</h3>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-sm text-gray-700 mb-1">الحالة</label>
                                            <select class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm input-focus">
                                                <option value="">جميع الحالات</option>
                                                <option value="active">نشط</option>
                                                <option value="sold">مباع</option>
                                                <option value="completed">مكتمل</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-700 mb-1">نوع السلالة</label>
                                            <select class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm input-focus">
                                                <option value="">جميع السلالات</option>
                                                <option value="broiler">دجاج لاحم</option>
                                                <option value="layer">دجاج بياض</option>
                                                <option value="breeder">أمهات</option>
                                            </select>
                                        </div>
                                        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-lg font-medium transition-colors duration-200">
                                            تطبيق التصفية
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Primary Action Button -->
                        <button id="addNewFlockBtn" class="emerald-gradient text-white font-bold py-3 px-6 rounded-xl hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-plus-circle ml-2"></i>
                            + إضافة قطيع جديد
                        </button>
                    </div>
                </div>
            </div>

            <!-- The Data Table -->
            <div class="glass-card rounded-2xl shadow-sm overflow-hidden">
                <!-- Table Container -->
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-right">
                        <!-- Table Headers -->
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">#</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">رقم القطيع</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">تاريخ الدخول</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">العدد الحالي</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">العمر بالأسابيع</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">نوع السلالة</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">الحالة</th>
                                <th class="py-4 px-6 font-bold text-gray-700 text-sm">الإجراءات</th>
                            </tr>
                        </thead>
                        
                        <!-- Table Body -->
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="table-row-hover border-b border-gray-100 hover:border-gold-200">
                                <td class="py-4 px-6 text-gray-500">1</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">قطيع #F-2023-15</div>
                                    <div class="text-sm text-gray-500">دجاج لاحم - الحظيرة 4</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">٢٠ مارس ٢٠٢٣</div>
                                    <div class="text-sm text-gray-500">قبل ٨ أسابيع</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center ml-3">
                                            <i class="fas fa-dove text-green-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">٩٨٥٠</div>
                                            <div class="text-xs text-green-600">معدل بقاء ٩٨٫٥٪</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">٨</div>
                                    <div class="text-xs text-gray-500">٢٨ يوم متبقي</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">دجاج لاحم</div>
                                    <div class="text-xs text-gray-500">سلالة كوب ٥٠٠</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="badge-active px-3 py-1 rounded-full text-xs font-bold">نشط</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <button class="view-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="edit-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="delete-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="table-row-hover border-b border-gray-100 bg-gray-50/50">
                                <td class="py-4 px-6 text-gray-500">2</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">قطيع #F-2023-14</div>
                                    <div class="text-sm text-gray-500">دجاج بياض - الحظيرة 2</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">١٠ فبراير ٢٠٢٣</div>
                                    <div class="text-sm text-gray-500">قبل ١٤ أسبوع</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center ml-3">
                                            <i class="fas fa-dove text-green-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">٤٨٠٠</div>
                                            <div class="text-xs text-green-600">معدل بقاء ٩٦٪</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">١٤</div>
                                    <div class="text-xs text-gray-500">بداية الإنتاج</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">دجاج بياض</div>
                                    <div class="text-xs text-gray-500">سلالة هاي لاين</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="badge-active px-3 py-1 rounded-full text-xs font-bold">نشط</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <button class="view-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="edit-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="delete-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 3 -->
                            <tr class="table-row-hover border-b border-gray-100">
                                <td class="py-4 px-6 text-gray-500">3</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">قطيع #F-2023-13</div>
                                    <div class="text-sm text-gray-500">دجاج لاحم - الحظيرة 5</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">٥ يناير ٢٠٢٣</div>
                                    <div class="text-sm text-gray-500">قبل ٢٠ أسبوع</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center ml-3">
                                            <i class="fas fa-dove text-red-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">٠</div>
                                            <div class="text-xs text-red-600">تم البيع</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">٧</div>
                                    <div class="text-xs text-gray-500">دورة مكتملة</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">دجاج لاحم</div>
                                    <div class="text-xs text-gray-500">سلالة روس ٣٠٨</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="badge-sold px-3 py-1 rounded-full text-xs font-bold">مباع</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <button class="view-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="edit-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="delete-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 4 -->
                            <tr class="table-row-hover border-b border-gray-100 bg-gray-50/50">
                                <td class="py-4 px-6 text-gray-500">4</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">قطيع #F-2023-12</div>
                                    <div class="text-sm text-gray-500">أمهات - الحظيرة 1</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">١٥ ديسمبر ٢٠٢٢</div>
                                    <div class="text-sm text-gray-500">قبل ٢٤ أسبوع</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center ml-3">
                                            <i class="fas fa-dove text-green-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">٢٤٠٠</div>
                                            <div class="text-xs text-green-600">معدل بقاء ٩٦٪</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">٢٤</div>
                                    <div class="text-xs text-gray-500">إنتاج البيض</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">أمهات</div>
                                    <div class="text-xs text-gray-500">سلالة كوب ٥٠٠</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="badge-active px-3 py-1 rounded-full text-xs font-bold">نشط</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <button class="view-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="edit-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="delete-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 5 -->
                            <tr class="table-row-hover">
                                <td class="py-4 px-6 text-gray-500">5</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">قطيع #F-2023-11</div>
                                    <div class="text-sm text-gray-500">دجاج لاحم - الحظيرة 3</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">١٠ نوفمبر ٢٠٢٢</div>
                                    <div class="text-sm text-gray-500">قبل ٢٨ أسبوع</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center ml-3">
                                            <i class="fas fa-dove text-red-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">٠</div>
                                            <div class="text-xs text-red-600">معدل نفوق مرتفع</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900">٦</div>
                                    <div class="text-xs text-gray-500">دورة مكتملة</div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-medium">دجاج لاحم</div>
                                    <div class="text-xs text-gray-500">سلالة كوب ٥٠٠</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="badge-completed px-3 py-1 rounded-full text-xs font-bold">مكتمل</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <button class="view-btn w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="edit-btn w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="delete-btn w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 flex items-center justify-center">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
                <div class="flex flex-col md:flex-row md:items-center justify-between px-6 py-4 border-t border-gray-200">
                    <div class="text-sm text-gray-600 mb-4 md:mb-0">
                        عرض <span class="font-bold">١</span> إلى <span class="font-bold">٥</span> من أصل <span class="font-bold">٥٠</span> قطيع
                    </div>
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            ١
                        </button>
                        <button class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold">
                            ٢
                        </button>
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            ٣
                        </button>
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            ...
                        </button>
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            ٥
                        </button>
                        <button class="w-10 h-10 rounded-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-800">القطعان النشطة</h3>
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <i class="fas fa-dove text-emerald-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-emerald-600 mb-2">٣ قطعان</p>
                    <p class="text-sm text-gray-600">٦٠٪ من إجمالي القطعان</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-800">إجمالي الطيور</h3>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-feather-alt text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-blue-600 mb-2">١٧,٠٥٠ طائر</p>
                    <p class="text-sm text-gray-600">متوسط معدل بقاء: ٩٧٫٢٪</p>
                </div>
                
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-800">متوسط عمر القطعان</h3>
                        <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-amber-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-amber-600 mb-2">١٤٫٤ أسبوع</p>
                    <p class="text-sm text-gray-600">أقدم قطيع: ٢٤ أسبوع</p>
                </div>
            </div>
        </div>

        <!-- Form View Page (Initially Hidden) -->
        <div id="formViewPage" class="hidden page-transition">
            <!-- Page Header Area -->
            <div class="mb-8">
                <!-- Back Link -->
                <div class="mb-4">
                    <a href="#" id="backToListBtn" class="inline-flex items-center text-emerald-600 hover:text-emerald-800 font-medium">
                        <i class="fas fa-arrow-right ml-2"></i>
                        عودة للقائمة
                    </a>
                </div>
                
                <!-- Page Title -->
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900" id="formTitle">إضافة دورة جديدة</h1>
                        <p class="text-gray-600 mt-2">أدخل بيانات القطيع الجديد بدقة لضمان متابعة صحيحة</p>
                    </div>
                    
                    <!-- Form Mode Switcher -->
                    <div class="mt-4 md:mt-0">
                        <div class="inline-flex rounded-xl bg-white p-1 shadow-sm border border-gray-200">
                            <button id="createModeBtn" class="px-4 py-2 rounded-lg font-medium text-white bg-emerald-600">
                                إضافة جديد
                            </button>
                            <button id="editModeBtn" class="px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-gray-50">
                                تعديل بيانات
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Form Container -->
            <div class="max-w-4xl mx-auto">
                <div class="glass-card rounded-2xl shadow-lg p-8">
                    <!-- Form Sections -->
                    <form id="flockForm">
                        <!-- Basic Information Section -->
                        <div class="mb-10">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center ml-4">
                                    <i class="fas fa-info-circle text-emerald-600"></i>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900">البيانات الأساسية</h2>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Flock Name/ID -->
                                <div>
                                    <label for="flockName" class="block text-gray-700 font-medium mb-2">اسم/رقم القطيع</label>
                                    <input type="text" 
                                           id="flockName" 
                                           class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                           placeholder="مثال: قطيع #F-2023-16"
                                           required>
                                    <div id="flockNameError" class="hidden text-red-600 text-sm mt-2">
                                        <i class="fas fa-exclamation-circle ml-1"></i>
                                        يرجى إدخال اسم/رقم للقطيع
                                    </div>
                                </div>
                                
                                <!-- Start Date -->
                                <div>
                                    <label for="startDate" class="block text-gray-700 font-medium mb-2">تاريخ بداية الدورة</label>
                                    <input type="text" 
                                           id="startDate" 
                                           class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4 flatpickr"
                                           placeholder="اختر التاريخ"
                                           required>
                                </div>
                                
                                <!-- Initial Bird Count -->
                                <div>
                                    <label for="birdCount" class="block text-gray-700 font-medium mb-2">العدد المبدئي للطيور</label>
                                    <div class="relative">
                                        <input type="number" 
                                               id="birdCount" 
                                               class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                               placeholder="مثال: 10000"
                                               min="1"
                                               required>
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                                            طائر
                                        </div>
                                    </div>
                                    <div id="birdCountError" class="hidden text-red-600 text-sm mt-2">
                                        <i class="fas fa-exclamation-circle ml-1"></i>
                                        العدد يجب أن يكون أكبر من الصفر
                                    </div>
                                </div>
                                
                                <!-- Breed Type -->
                                <div>
                                    <label for="breedType" class="block text-gray-700 font-medium mb-2">نوع السلالة</label>
                                    <select id="breedType" class="input-focus select-custom w-full border border-gray-300 rounded-xl py-3 px-4 appearance-none">
                                        <option value="" disabled selected>اختر نوع السلالة</option>
                                        <option value="broiler">دجاج لاحم</option>
                                        <option value="layer">دجاج بياض</option>
                                        <option value="breeder">أمهات (تكاثر)</option>
                                        <option value="dual">سلالة مزدوجة الغرض</option>
                                    </select>
                                </div>
                                
                                <!-- Breed Subtype -->
                                <div>
                                    <label for="breedSubtype" class="block text-gray-700 font-medium mb-2">السلالة التفصيلية</label>
                                    <select id="breedSubtype" class="input-focus select-custom w-full border border-gray-300 rounded-xl py-3 px-4 appearance-none">
                                        <option value="" disabled selected>اختر السلالة التفصيلية</option>
                                        <option value="cobb500">كوب ٥٠٠</option>
                                        <option value="ross308">روس ٣٠٨</option>
                                        <option value="hubbard">هابارد</option>
                                        <option value="hyline">هاي لاين</option>
                                        <option value="lohmann">لوهمان</option>
                                    </select>
                                </div>
                                
                                <!-- Housing Type -->
                                <div>
                                    <label for="housingType" class="block text-gray-700 font-medium mb-2">نوع السكن</label>
                                    <select id="housingType" class="input-focus select-custom w-full border border-gray-300 rounded-xl py-3 px-4 appearance-none">
                                        <option value="" disabled selected>اختر نوع السكن</option>
                                        <option value="open">مفتوح</option>
                                        <option value="closed">مغلق</option>
                                        <option value="tunnel">نفق تهوية</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Farm & Management Section -->
                        <div class="mb-10">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center ml-4">
                                    <i class="fas fa-tractor text-blue-600"></i>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900">بيانات المزرعة والإدارة</h2>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Farm Section -->
                                <div>
                                    <label for="farmSection" class="block text-gray-700 font-medium mb-2">القسم/الحظيرة</label>
                                    <select id="farmSection" class="input-focus select-custom w-full border border-gray-300 rounded-xl py-3 px-4 appearance-none">
                                        <option value="" disabled selected>اختر القسم/الحظيرة</option>
                                        <option value="section1">الحظيرة ١</option>
                                        <option value="section2">الحظيرة ٢</option>
                                        <option value="section3">الحظيرة ٣</option>
                                        <option value="section4">الحظيرة ٤</option>
                                        <option value="section5">الحظيرة ٥</option>
                                    </select>
                                </div>
                                
                                <!-- Responsible Person -->
                                <div>
                                    <label for="responsiblePerson" class="block text-gray-700 font-medium mb-2">المشرف المسؤول</label>
                                    <input type="text" 
                                           id="responsiblePerson" 
                                           class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                           placeholder="اسم المشرف المسؤول">
                                </div>
                                
                                <!-- Target Weight -->
                                <div>
                                    <label for="targetWeight" class="block text-gray-700 font-medium mb-2">الوزن المستهدف (كجم)</label>
                                    <div class="relative">
                                        <input type="number" 
                                               id="targetWeight" 
                                               class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                               placeholder="مثال: 2.5"
                                               step="0.1"
                                               min="0.5">
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                                            كجم
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Target Age -->
                                <div>
                                    <label for="targetAge" class="block text-gray-700 font-medium mb-2">العمر المستهدف (أسبوع)</label>
                                    <div class="relative">
                                        <input type="number" 
                                               id="targetAge" 
                                               class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                               placeholder="مثال: 42"
                                               min="1">
                                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                                            أسبوع
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Settings -->
                        <div class="mb-10">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center ml-4">
                                    <i class="fas fa-cogs text-amber-600"></i>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900">إعدادات إضافية</h2>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Trial Cycle Toggle -->
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl">
                                    <div>
                                        <p class="font-medium text-gray-900">دورة تجريبية</p>
                                        <p class="text-sm text-gray-600">تفعيل لمراقبة أداء سلالة جديدة</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="trialCycle">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                
                                <!-- Automatic Alerts -->
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl">
                                    <div>
                                        <p class="font-medium text-gray-900">تنبيهات تلقائية</p>
                                        <p class="text-sm text-gray-600">إشعارات عند انحراف المؤشرات</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="autoAlerts" checked>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Notes -->
                        <div class="mb-10">
                            <label for="additionalNotes" class="block text-gray-700 font-medium mb-2">ملاحظات إضافية</label>
                            <textarea id="additionalNotes" 
                                      rows="4" 
                                      class="input-focus w-full border border-gray-300 rounded-xl py-3 px-4"
                                      placeholder="أي ملاحظات إضافية حول القطيع..."></textarea>
                        </div>
                        
                        <!-- Form Actions Footer -->
                        <div class="pt-8 border-t border-gray-200">
                            <div class="flex flex-col-reverse sm:flex-row justify-between space-y-4 sm:space-y-0 space-y-reverse">
                                <!-- Cancel Button -->
                                <button type="button" id="cancelFormBtn" class="px-8 py-3 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-colors duration-200">
                                    إلغاء
                                </button>
                                
                                <!-- Save Button -->
                                <button type="submit" class="emerald-gradient text-white font-bold py-3 px-8 rounded-xl hover:shadow-lg transition-all duration-300 mb-4 sm:mb-0">
                                    <i class="fas fa-save ml-2"></i>
                                    حفظ البيانات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Form Help Text -->
                <div class="mt-6 p-6 bg-emerald-50 rounded-2xl border border-emerald-100">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center ml-4 flex-shrink-0">
                            <i class="fas fa-lightbulb text-emerald-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-emerald-800 mb-2">نصائح لإدخال البيانات</h3>
                            <ul class="text-emerald-700 space-y-1">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-emerald-500 ml-2 mt-1"></i>
                                    <span>تأكد من صحة بيانات بداية الدورة فهي أساسية لجميع الحسابات اللاحقة</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-emerald-500 ml-2 mt-1"></i>
                                    <span>اختر السلالة المناسبة بدقة لأنها تؤثر على جداول التغذية والتحصين</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-emerald-500 ml-2 mt-1"></i>
                                    <span>تفعيل التنبيهات التلقائية يساعد في اكتشاف المشاكل مبكراً</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4">
            <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4">تأكيد الحذف</h3>
            <p class="text-gray-600 text-center mb-8">هل أنت متأكد من رغبتك في حذف هذا القطيع؟ لا يمكن التراجع عن هذا الإجراء.</p>
            <div class="flex space-x-4 space-x-reverse">
                <button id="cancelDeleteBtn" class="flex-1 py-3 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-colors duration-200">
                    إلغاء
                </button>
                <button id="confirmDeleteBtn" class="flex-1 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition-colors duration-200">
                    نعم، احذف
                </button>
            </div>
        </div>
    </div>

    <!-- Success Message Toast -->
    <div id="successToast" class="fixed bottom-4 left-4 bg-emerald-600 text-white p-4 rounded-xl shadow-lg z-50 hidden flex items-center space-x-3 space-x-reverse">
        <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center">
            <i class="fas fa-check text-xl"></i>
        </div>
        <div>
            <p class="font-bold">تم الحفظ بنجاح!</p>
            <p class="text-sm text-emerald-100">تم حفظ بيانات القطيع في النظام</p>
        </div>
    </div>

    <!-- Flatpickr Date Picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
    @vite('resources/js/crud.js')
</body>
</html>