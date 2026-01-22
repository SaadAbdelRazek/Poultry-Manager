<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة مزارع الدواجن | Poultry Farm Management System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Cairo Arabic Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-900 text-slate-100 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="glass-morphism fixed top-0 w-full z-50 py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3 space-x-reverse">
                <div class="w-10 h-10 rounded-full emerald-gradient flex items-center justify-center">
                    <i class="fas fa-egg text-white text-xl"></i>
                </div>
                <span class="text-xl font-bold text-white">دواجن <span class="text-gold-300">برو</span></span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 space-x-reverse">
                <a href="#home"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium">الرئيسية</a>
                <a href="#services"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium">الخدمات</a>
                <a href="#consultations"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium">الاستشارات</a>
                <a href="#dashboard"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium">لوحة
                    التحكم</a>
            </div>

            <!-- Login Button & Mobile Menu Toggle -->
            <div class="flex items-center space-x-4 space-x-reverse">

                @guest
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 border-2 border-emerald-500 text-emerald-400
            hover:bg-emerald-500 hover:text-white
            rounded-full transition-all duration-300
            font-medium inline-block">
                        تسجيل الدخول
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-emerald-500 text-white
            border-2 border-emerald-500
            hover:bg-transparent hover:text-emerald-400
            rounded-full transition-all duration-300
            font-medium inline-block">
                        حساب جديد
                    </a>
                @endguest


                @auth
                    <!-- زر الداشبورد -->
                    <a href="{{ route('dashboard') }}"
                        class="px-6 py-2 bg-emerald-500 text-white
            border-2 border-emerald-500
            hover:bg-transparent hover:text-emerald-400
            rounded-full transition-all duration-300
            font-medium inline-block">
                        الداشبورد
                    </a>

                    <!-- زر تسجيل الخروج -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-6 py-2 border-2 border-red-500 text-red-400
                hover:bg-red-500 hover:text-white
                rounded-full transition-all duration-300
                font-medium inline-block">
                            تسجيل الخروج
                        </button>
                    </form>
                @endauth

            </div>

            <button id="mobile-menu-toggle" class="md:hidden text-slate-300 hover:text-gold-300">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4">
            <div class="flex flex-col space-y-4">
                <a href="#home"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium py-2">الرئيسية</a>
                <a href="#services"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium py-2">الخدمات</a>
                <a href="#consultations"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium py-2">الاستشارات</a>
                <a href="#dashboard"
                    class="text-slate-300 hover:text-gold-300 transition-colors duration-300 font-medium py-2">لوحة
                    التحكم</a>
                <div class="flex items-center space-x-4 space-x-reverse">

                    @guest
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 border-2 border-emerald-500 text-emerald-400
            hover:bg-emerald-500 hover:text-white
            rounded-full transition-all duration-300
            font-medium inline-block">
                            تسجيل الدخول
                        </a>

                        <a href="{{ route('register') }}"
                            class="px-6 py-2 bg-emerald-500 text-white
            border-2 border-emerald-500
            hover:bg-transparent hover:text-emerald-400
            rounded-full transition-all duration-300
            font-medium inline-block">
                            حساب جديد
                        </a>
                    @endguest


                    @auth
                        <!-- زر الداشبورد -->
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-2 bg-emerald-500 text-white
            border-2 border-emerald-500
            hover:bg-transparent hover:text-emerald-400
            rounded-full transition-all duration-300
            font-medium inline-block">
                            الداشبورد
                        </a>

                        <!-- زر تسجيل الخروج -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-6 py-2 border-2 border-red-500 text-red-400
                hover:bg-red-500 hover:text-white
                rounded-full transition-all duration-300
                font-medium inline-block">
                                تسجيل الخروج
                            </button>
                        </form>
                    @endauth

                </div>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home"
        class="pt-32 pb-20 px-6 bg-gradient-to-b from-slate-900 to-slate-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div
                class="absolute top-10 left-10 w-72 h-72 rounded-full bg-emerald-500 mix-blend-multiply filter blur-3xl opacity-20">
            </div>
            <div
                class="absolute bottom-10 right-10 w-72 h-72 rounded-full bg-gold-500 mix-blend-multiply filter blur-3xl opacity-20">
            </div>
        </div>

        <div class="container mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        <span class="text-white">أحدث تقنيات</span>
                        <span class="text-emerald-400">إدارة مزارع الدواجن</span>
                        <span class="text-white">بين يديك</span>
                    </h1>
                    <p class="text-slate-300 text-lg mb-10 max-w-2xl">
                        نظام إدارة متكامل يوفر لك التحكم الكامل في مزرعتك من خلال تقنيات الذكاء الاصطناعي وإنترنت
                        الأشياء. راقب أداء مزرعتك، زد إنتاجيتك، وقلل التكاليف من أي مكان وفي أي وقت.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="gold-gradient text-slate-900 font-bold px-8 py-4 rounded-full hover:shadow-xl hover:shadow-gold-500/30 transition-all duration-300 text-lg">
                            ابدأ الآن <i class="fas fa-arrow-left mr-2"></i>
                        </button>
                        <button
                            class="border-2 border-slate-500 text-slate-300 font-bold px-8 py-4 rounded-full hover:border-emerald-500 hover:text-emerald-400 transition-all duration-300 text-lg">
                            شاهد العرض التوضيحي
                        </button>
                    </div>
                </div>
                <div class="lg:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="floating-element">
                            <div class="dashboard-preview p-6 max-w-lg">
                                <div class="flex justify-between items-center mb-8">
                                    <h3 class="text-xl font-bold text-white">نظرة عامة على المزرعة</h3>
                                    <div class="text-emerald-400">
                                        <i class="fas fa-signal text-lg"></i>
                                        <span class="mr-2 font-medium">مباشر</span>
                                    </div>
                                </div>

                                <div class="dashboard-grid mb-6">
                                    <div class="bg-slate-800 rounded-xl p-4">
                                        <h4 class="text-slate-300 mb-4 font-medium">معدل النمو اليومي</h4>
                                        <div class="flex items-end h-32 space-x-2 space-x-reverse">
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 70%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الأحد</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 85%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الاثنين</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 65%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الثلاثاء</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 90%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الأربعاء</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 95%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الخميس</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 80%"></div>
                                                <span class="text-slate-400 text-xs mt-2">الجمعة</span>
                                            </div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="chart-bar" style="height: 75%"></div>
                                                <span class="text-slate-400 text-xs mt-2">السبت</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-slate-800 rounded-xl p-4">
                                        <h4 class="text-slate-300 mb-4 font-medium">الحالة الصحية</h4>
                                        <div class="flex items-center justify-center h-32">
                                            <div class="relative">
                                                <div
                                                    class="w-24 h-24 rounded-full border-8 border-emerald-500 border-r-transparent transform rotate-45">
                                                </div>
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <span class="text-2xl font-bold text-emerald-400">94%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-slate-800 rounded-xl p-4">
                                        <h4 class="text-slate-300 mb-4 font-medium">المستشعرات النشطة</h4>
                                        <div class="flex items-center">
                                            <div
                                                class="w-12 h-12 rounded-full emerald-gradient flex items-center justify-center mr-3">
                                                <i class="fas fa-thermometer-half text-white text-xl"></i>
                                            </div>
                                            <div>
                                                <p class="text-white font-bold text-xl">48/52</p>
                                                <p class="text-slate-400 text-sm">مستشعر نشط</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-slate-800 rounded-xl p-4">
                                        <h4 class="text-slate-300 mb-4 font-medium">الاستهلاك اليومي</h4>
                                        <div class="flex items-center">
                                            <div
                                                class="w-12 h-12 rounded-full gold-gradient flex items-center justify-center mr-3">
                                                <i class="fas fa-weight text-slate-900 text-xl"></i>
                                            </div>
                                            <div>
                                                <p class="text-white font-bold text-xl">2.4 طن</p>
                                                <p class="text-slate-400 text-sm">عالٍ بـ 8%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center text-slate-500 text-sm">
                                    بيانات حية من مزرعة دواجن النخبة
                                </div>
                            </div>
                        </div>

                        <!-- Floating Elements -->
                        <!-- <div class="absolute -top-4 -right-4 w-16 h-16 rounded-full gold-gradient flex items-center justify-center text-slate-900 text-2xl shadow-2xl">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 rounded-full emerald-gradient flex items-center justify-center text-white text-2xl shadow-2xl"> -->
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Features Grid Section -->
    <section id="services" class="py-20 px-6 bg-slate-800">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">حلول <span class="text-emerald-400">متكاملة</span> لإدارة <span
                        class="text-gold-300">مزرعتك</span></h2>
                <p class="text-slate-300 text-lg max-w-3xl mx-auto">نقدم مجموعة من الحلول المتكاملة التي تساعدك على
                    إدارة مزرعة الدواجن بكفاءة عالية باستخدام أحدث التقنيات</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-slate-900 rounded-2xl p-8 card-hover border border-slate-700">
                    <div class="w-16 h-16 rounded-xl emerald-gradient flex items-center justify-center mb-6">
                        <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">إدارة المزرعة</h3>
                    <p class="text-slate-300 mb-6">
                        نظام متكامل للتحكم الكامل في المزرعة مع تتبع في الوقت الفعلي، إدارة المخزون، وتحليل الأداء. احصل
                        على تقارير مفصلة تساعدك على اتخاذ القرارات الصحيحة.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>تتبع في الوقت الحقيقي</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>تقارير أداء تفصيلية</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>إدارة المخزون والموارد</span>
                        </li>
                    </ul>
                    <a href="#"
                        class="text-emerald-400 font-medium hover:text-emerald-300 transition-colors duration-300">
                        اكتشف المزيد <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-slate-900 rounded-2xl p-8 card-hover border border-slate-700">
                    <div class="w-16 h-16 rounded-xl gold-gradient flex items-center justify-center mb-6">
                        <i class="fas fa-temperature-low text-slate-900 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">التحكم في المفقس</h3>
                    <p class="text-slate-300 mb-6">
                        حلول متطورة تعتمد على إنترنت الأشياء للتحكم الدقيق في درجة الحرارة والرطوية والتهوية في المفقس
                        لتحقيق أعلى معدلات الفقس والحفاظ على صحة الكتاكيت.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>إنترنت الأشياء والتحكم بالحرارة</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>مراقبة الرطوبة والتهوية</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>تنبيهات فورية للمشاكل</span>
                        </li>
                    </ul>
                    <a href="#"
                        class="text-emerald-400 font-medium hover:text-emerald-300 transition-colors duration-300">
                        اكتشف المزيد <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-slate-900 rounded-2xl p-8 card-hover border border-slate-700">
                    <div class="w-16 h-16 rounded-xl emerald-gradient flex items-center justify-center mb-6">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">استشارات الخبراء</h3>
                    <p class="text-slate-300 mb-6">
                        تواصل مع أفضل الخبراء البيطريين واستشاريي تربية الدواجن عبر منصتنا. احصل على نصائح مخصصة
                        باستخدام الذكاء الاصطناعي لحل المشكلات وتحسين الإنتاجية.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>استشارات بيطرية عن بعد</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>نصائح الذكاء الاصطناعي</span>
                        </li>
                        <li class="flex items-center text-slate-300">
                            <i class="fas fa-check-circle text-emerald-400 ml-3"></i>
                            <span>خطط إدارة مخصصة</span>
                        </li>
                    </ul>
                    <a href="#"
                        class="text-emerald-400 font-medium hover:text-emerald-300 transition-colors duration-300">
                        اكتشف المزيد <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview Section -->
    <section id="dashboard" class="py-20 px-6 bg-slate-900">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-12">
                    <h2 class="text-4xl font-bold mb-6">لوحة تحكم <span class="text-gold-300">ذكية</span> تجعل إدارتك
                        <span class="text-emerald-400">أسهل</span>
                    </h2>
                    <p class="text-slate-300 mb-8 text-lg">
                        تم تصميم لوحة التحكم الخاصة بنا لتوفير تجربة مستخدم فائقة تمكنك من مراقبة وإدارة كل جوانب مزرعتك
                        من مكان واحد. بيانات حية، رسوم بيانية تفاعلية، وتقارير قابلة للتخصيص.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 rounded-full bg-emerald-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-bolt text-emerald-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">بيانات في الوقت الحقيقي</h4>
                                <p class="text-slate-300">احصل على تحديثات فورية عن أداء مزرعتك مع تنبيهات فورية لأي
                                    مشكلة محتملة.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-gold-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-chart-pie text-gold-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">تحليلات متقدمة</h4>
                                <p class="text-slate-300">استخدم أدوات التحليل المتقدمة لفهم اتجاهات الإنتاجية وتحسين
                                    عمليات المزرعة.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div
                                class="w-12 h-12 rounded-full bg-emerald-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-mobile-alt text-emerald-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">متوفر على جميع الأجهزة</h4>
                                <p class="text-slate-300">ادخل إلى نظامك من أي جهاز - كمبيوتر، لوحي، أو هاتف ذكي - مع
                                    تجربة مستخدم متكاملة.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <div class="dashboard-preview p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex space-x-4 space-x-reverse">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            </div>
                            <h3 class="text-xl font-bold text-white">لوحة التحكم الرئيسية</h3>
                            <div class="text-slate-400">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="bg-slate-800 rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-emerald-400">98%</div>
                                <div class="text-slate-400 text-sm">معدل الفقس</div>
                            </div>
                            <div class="bg-slate-800 rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-gold-400">24.5°C</div>
                                <div class="text-slate-400 text-sm">متوسط الحرارة</div>
                            </div>
                            <div class="bg-slate-800 rounded-lg p-4 text-center">
                                <div class="text-2xl font-bold text-emerald-400">12.4K</div>
                                <div class="text-slate-400 text-sm">عدد الطيور</div>
                            </div>
                        </div>

                        <div class="bg-slate-800 rounded-lg p-4 mb-6">
                            <h4 class="text-slate-300 mb-3 font-medium">توزيع الصحة حسب الحظائر</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-slate-300">الحظيرة أ</span>
                                        <span class="text-emerald-400 font-bold">96%</span>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="h-full emerald-gradient rounded-full" style="width: 96%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-slate-300">الحظيرة ب</span>
                                        <span class="text-emerald-400 font-bold">89%</span>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="h-full emerald-gradient rounded-full" style="width: 89%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-slate-300">الحظيرة ج</span>
                                        <span class="text-gold-400 font-bold">78%</span>
                                    </div>
                                    <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="h-full gold-gradient rounded-full" style="width: 78%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center text-slate-500 text-sm">
                            لوحة تحكم تفاعلية - بيانات حية من مزرعة العميل
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultations Section -->
    <section id="consultations" class="py-20 px-6 bg-slate-800">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">استشارات <span class="text-emerald-400">متخصصة</span> لتحقيق <span
                        class="text-gold-300">أفضل النتائج</span></h2>
                <p class="text-slate-300 text-lg max-w-3xl mx-auto">تواصل مع أفضل الخبراء والمستشارين في مجال تربية
                    الدواجن للحصول على إرشادات مخصصة تساعدك على تحقيق أقصى إنتاجية</p>
            </div>

            <div class="max-w-4xl mx-auto bg-slate-900 rounded-2xl p-8 border border-slate-700">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 mb-8 md:mb-0">
                        <div class="relative">
                            <div
                                class="w-64 h-64 rounded-full emerald-gradient mx-auto flex items-center justify-center">
                                <i class="fas fa-headset text-white text-7xl"></i>
                            </div>
                            <div
                                class="absolute -bottom-2 -right-2 w-20 h-20 rounded-full gold-gradient flex items-center justify-center">
                                <i class="fas fa-robot text-slate-900 text-3xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-2/3 md:pr-8">
                        <h3 class="text-3xl font-bold mb-6">تواصل مع الخبراء <span
                                class="text-emerald-400">الآن</span></h3>
                        <p class="text-slate-300 mb-6 text-lg">
                            من خلال منصتنا، يمكنك الوصول إلى شبكة من الخبراء البيطريين والمتخصصين في تربية الدواجن. سواء
                            كنت بحاجة إلى استشارة سريعة أو خطة إدارة شاملة، فريقنا جاهز لمساعدتك.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-900/30 flex items-center justify-center mr-3">
                                    <i class="fas fa-video text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">استشارات فيديو مباشرة</span>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-gold-900/30 flex items-center justify-center mr-3">
                                    <i class="fas fa-file-prescription text-gold-400"></i>
                                </div>
                                <span class="text-slate-300">خطط علاج مخصصة</span>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-900/30 flex items-center justify-center mr-3">
                                    <i class="fas fa-brain text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">تحليل بالذكاء الاصطناعي</span>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-gold-900/30 flex items-center justify-center mr-3">
                                    <i class="fas fa-chart-line text-gold-400"></i>
                                </div>
                                <span class="text-slate-300">توقعات أداء مزرعتك</span>
                            </div>
                        </div>

                        <button
                            class="gold-gradient text-slate-900 font-bold px-8 py-3 rounded-full hover:shadow-xl hover:shadow-gold-500/30 transition-all duration-300 text-lg">
                            احجز استشارة مجانية <i class="fas fa-calendar-alt mr-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 pt-12 pb-8 px-6">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center space-x-3 space-x-reverse mb-6">
                        <div class="w-12 h-12 rounded-full emerald-gradient flex items-center justify-center">
                            <i class="fas fa-egg text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-white">دواجن<span class="text-gold-300">Pro</span></span>
                    </div>
                    <p class="text-slate-400 mb-6">
                        نظام إدارة مزارع الدواجن الرائد في المنطقة، يوفر حلولاً تقنية متكاملة لتحسين إنتاجية المزارع
                        وزيادة أرباحها.
                    </p>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-500 flex items-center justify-center text-slate-300 hover:text-white transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-500 flex items-center justify-center text-slate-300 hover:text-white transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-500 flex items-center justify-center text-slate-300 hover:text-white transition-colors duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 hover:bg-emerald-500 flex items-center justify-center text-slate-300 hover:text-white transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-6 text-white">روابط سريعة</h4>
                    <ul class="space-y-3">
                        <li><a href="#home"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">الرئيسية</a>
                        </li>
                        <li><a href="#services"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">الخدمات</a>
                        </li>
                        <li><a href="#consultations"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">الاستشارات</a>
                        </li>
                        <li><a href="#dashboard"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">لوحة
                                التحكم</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-6 text-white">الخدمات</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">إدارة
                                المزرعة</a></li>
                        <li><a href="#"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">التحكم في
                                المفقس</a></li>
                        <li><a href="#"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">استشارات
                                الخبراء</a></li>
                        <li><a href="#"
                                class="text-slate-400 hover:text-emerald-400 transition-colors duration-300">التقارير
                                والتحليلات</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-6 text-white">اتصل بنا</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center text-slate-400">
                            <i class="fas fa-map-marker-alt text-emerald-400 ml-3"></i>
                            <span>الرياض، المملكة العربية السعودية</span>
                        </li>
                        <li class="flex items-center text-slate-400">
                            <i class="fas fa-phone text-emerald-400 ml-3"></i>
                            <span>+966 11 123 4567</span>
                        </li>
                        <li class="flex items-center text-slate-400">
                            <i class="fas fa-envelope text-emerald-400 ml-3"></i>
                            <span>info@dawagen-pro.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 text-center">
                <p class="text-slate-500">
                    © 2026 دواجنPro. جميع الحقوق محفوظة. | تم التصميم والتطوير باستخدام أحدث التقنيات
                </p>
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>

</html>
