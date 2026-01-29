<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تسجيل العمال - نظام إدارة مزارع الدواجن</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --emerald: #10b981;
            --emerald-light: #d1fae5;
            --alert-red: #ef4444;
            --alert-red-light: #fee2e2;
            --production-gold: #f59e0b;
            --production-gold-light: #fef3c7;
        }
        
        * { font-family: 'Cairo', sans-serif; }
        body { background-color: #f3f4f6; }
        
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); }
        .hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); }

        /* Sticky Footer styling adapted for Desktop/Mobile */
        .sticky-footer-container {
            position: sticky;
            bottom: 0;
            z-index: 20;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            border-top: 1px solid #e5e7eb;
        }

        .number-input::-webkit-outer-spin-button,
        .number-input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        
        .counter-btn {
            width: 3rem; height: 3rem; display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem; font-weight: bold; border-radius: 0.75rem; transition: all 0.2s;
        }
        .counter-btn:active { transform: scale(0.95); }
        
        .input-field {
            font-size: 1.75rem; font-weight: bold; text-align: center; width: 100%; max-width: 8rem;
            border: 2px solid #e5e7eb; border-radius: 0.75rem; transition: all 0.2s; background: white;
        }
        .input-field:focus { outline: none; border-color: var(--emerald); box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
        
        /* Card Borders */
        .mortality-card { border-right: 5px solid var(--alert-red); }
        .feed-card { border-right: 5px solid var(--emerald); }
        .eggs-card { border-right: 5px solid var(--production-gold); }
        
        /* Pulse Animation */
        @keyframes pulse-custom {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        .pulse-btn { animation: pulse-custom 2s infinite; }

        /* Toast */
        .toast {
            position: fixed; top: 1.5rem; left: 50%; transform: translateX(-50%) translateY(-100px);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); z-index: 50;
        }
        .toast.show { transform: translateX(-50%) translateY(0); }
    </style>
</head>
<body class="min-h-screen text-gray-800">

    <header class="bg-white shadow-sm sticky top-0 z-30">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center border-2 border-white shadow-sm">
                            <i class="fas fa-user-hard-hat text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-gray-900 leading-tight">أهلاً يا محمد</h1>
                            <p class="text-xs text-gray-500">مشرف عنبر</p>
                        </div>
                    </div>
                    <div class="md:hidden w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center">
                        <i class="fas fa-bell text-gray-400"></i>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center gap-3 bg-gray-50 p-1.5 rounded-xl border border-gray-200">
                    <span class="text-sm text-gray-500 pr-2 hidden md:inline">تسجيل لـ:</span>
                    <select id="houseSelector" class="bg-transparent font-bold text-gray-800 text-sm md:text-base outline-none w-full md:w-64 cursor-pointer">
                        <option value="house1">عنبر رقم ١ - دجاج لاحم</option>
                        <option value="house2">عنبر رقم ٢ - دجاج بياض</option>
                        <option value="house3">عنبر رقم ٣ - أمهات</option>
                    </select>
                    <i class="fas fa-chevron-down text-gray-400 text-xs pl-2"></i>
                </div>

                <div class="hidden md:block text-left">
                    <div class="text-lg font-bold text-gray-800 date-display"></div>
                    <div class="text-xs text-emerald-600 font-medium date-sub-display"></div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6 md:py-10 pb-32">
        
        <div class="md:hidden mb-6 flex justify-between items-end">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 date-display"></h2>
                <p class="text-gray-500 text-sm date-sub-display"></p>
            </div>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-4 gap-3 md:gap-6 mb-8">
            <div class="bg-white rounded-xl p-3 md:p-4 shadow-sm text-center border border-gray-100">
                <div class="text-xs md:text-sm text-gray-500 mb-1">النافق اليوم</div>
                <div class="text-xl md:text-2xl font-bold text-red-600" id="headerMortality">0</div>
            </div>
            <div class="bg-white rounded-xl p-3 md:p-4 shadow-sm text-center border border-gray-100">
                <div class="text-xs md:text-sm text-gray-500 mb-1">العلف (كجم)</div>
                <div class="text-xl md:text-2xl font-bold text-emerald-600" id="headerFeed">0</div>
            </div>
            <div class="bg-white rounded-xl p-3 md:p-4 shadow-sm text-center border border-gray-100">
                <div class="text-xs md:text-sm text-gray-500 mb-1">البيض (طبق)</div>
                <div class="text-xl md:text-2xl font-bold text-amber-500" id="headerEggs">0</div>
            </div>
            <div class="hidden md:block bg-white rounded-xl p-4 shadow-sm text-center border border-gray-100">
                <div class="text-sm text-gray-500 mb-1">الحرارة</div>
                <div class="text-2xl font-bold text-blue-500">24°C</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 items-start">

            <div class="mortality-card bg-white rounded-2xl card-shadow p-5 md:p-6 hover-lift">
                <div class="flex items-center gap-4 mb-6 border-b border-gray-100 pb-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center">
                        <i class="fas fa-skull-crossbones text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">تسجيل النافق</h3>
                        <p class="text-xs text-gray-500">حالات الوفاة اليومية</p>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-4 mb-6 w-full justify-center">
                        <button class="counter-btn bg-red-50 text-red-600 hover:bg-red-100" onclick="updateValue('mortality', -1)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" id="mortalityCount" class="input-field number-input text-red-600" value="0" min="0">
                        <button class="counter-btn bg-red-50 text-red-600 hover:bg-red-100" onclick="updateValue('mortality', 1)">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-4 gap-2 w-full mb-4">
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-red-50 hover:text-red-600 transition" onclick="updateValue('mortality', 0, true)">reset</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-red-50 hover:text-red-600 transition" onclick="updateValue('mortality', 1)">+1</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-red-50 hover:text-red-600 transition" onclick="updateValue('mortality', 5)">+5</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-red-50 hover:text-red-600 transition" onclick="updateValue('mortality', 10)">+10</button>
                    </div>
                    
                    <select class="w-full text-sm border border-gray-200 rounded-lg p-2.5 bg-gray-50 focus:bg-white transition">
                        <option>سبب غير معروف</option>
                        <option>إجهاد حراري</option>
                        <option>كوكسيديا</option>
                    </select>
                </div>
            </div>

            <div class="feed-card bg-white rounded-2xl card-shadow p-5 md:p-6 hover-lift">
                <div class="flex items-center gap-4 mb-6 border-b border-gray-100 pb-4">
                    <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center">
                        <i class="fas fa-wheat-alt text-emerald-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">استهلاك العلف</h3>
                        <p class="text-xs text-gray-500">الكمية بالكيلو جرام</p>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-4 mb-6 w-full justify-center">
                        <button class="counter-btn bg-emerald-50 text-emerald-600 hover:bg-emerald-100" onclick="updateValue('feed', -10)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" id="feedAmount" class="input-field number-input text-emerald-600" value="0" min="0">
                        <button class="counter-btn bg-emerald-50 text-emerald-600 hover:bg-emerald-100" onclick="updateValue('feed', 10)">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-4 gap-2 w-full mb-4">
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition" onclick="updateValue('feed', 0, true)">reset</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition" onclick="updateValue('feed', 25)">+25</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition" onclick="updateValue('feed', 50)">+50</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition" onclick="updateValue('feed', 100)">+100</button>
                    </div>

                    <div class="w-full bg-gray-100 rounded-lg p-2 flex justify-between text-xs text-gray-500">
                        <span>النوع: بادئ (23%)</span>
                        <span>رصيد: 5 طن</span>
                    </div>
                </div>
            </div>

            <div class="eggs-card bg-white rounded-2xl card-shadow p-5 md:p-6 hover-lift">
                <div class="flex items-center gap-4 mb-6 border-b border-gray-100 pb-4">
                    <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center">
                        <i class="fas fa-egg text-amber-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">إنتاج البيض</h3>
                        <p class="text-xs text-gray-500">عدد الأطباق المجمعة</p>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-4 mb-6 w-full justify-center">
                        <button class="counter-btn bg-amber-50 text-amber-600 hover:bg-amber-100" onclick="updateValue('eggs', -1)">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" id="eggsCount" class="input-field number-input text-amber-600" value="0" min="0">
                        <button class="counter-btn bg-amber-50 text-amber-600 hover:bg-amber-100" onclick="updateValue('eggs', 1)">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-4 gap-2 w-full mb-4">
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-amber-50 hover:text-amber-600 transition" onclick="updateValue('eggs', 0, true)">reset</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-amber-50 hover:text-amber-600 transition" onclick="updateValue('eggs', 1)">+1</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-amber-50 hover:text-amber-600 transition" onclick="updateValue('eggs', 5)">+5</button>
                        <button class="py-2 bg-gray-50 rounded-lg text-xs font-bold text-gray-600 hover:bg-amber-50 hover:text-amber-600 transition" onclick="updateValue('eggs', 10)">+10</button>
                    </div>

                    <div class="flex gap-2 w-full">
                         <div class="w-1/2">
                             <label class="text-xs text-gray-500 mb-1 block">تالف</label>
                             <input type="number" class="w-full border border-gray-200 rounded-lg p-2 text-sm text-center" placeholder="0">
                         </div>
                         <div class="w-1/2">
                            <label class="text-xs text-gray-500 mb-1 block">مشروخ</label>
                            <input type="number" class="w-full border border-gray-200 rounded-lg p-2 text-sm text-center" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 bg-white rounded-2xl card-shadow p-5 md:p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-3">ملاحظات عامة</h3>
                <textarea class="w-full h-24 border border-gray-200 rounded-xl p-4 resize-none focus:ring-2 focus:ring-emerald-100 focus:border-emerald-400 outline-none transition" placeholder="اكتب أي ملاحظات فنية أو مشاكل واجهتك اليوم..."></textarea>
            </div>

        </div>
    </main>

    <div class="sticky-footer-container w-full">
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <div class="hidden md:flex gap-6 text-sm text-gray-600">
                <span><i class="fas fa-info-circle ml-1"></i> ملخص الإرسال:</span>
                <span class="font-bold text-gray-900">عنبر ١</span>
            </div>

            <button id="submitBtn" class="w-full md:w-auto md:px-12 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-xl text-lg shadow-lg shadow-emerald-200 transition-all flex items-center justify-center gap-2 pulse-btn">
                <span>إرسال التقرير</span>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <div id="toast" class="toast bg-gray-800 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4">
        <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <h4 class="font-bold text-sm">تم الحفظ بنجاح</h4>
            <p class="text-xs text-gray-300">تم تسجيل بيانات اليوم للعنبر.</p>
        </div>
    </div>

    <script>
        // Set Dates
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const today = new Date();
        document.querySelectorAll('.date-display').forEach(el => el.textContent = today.toLocaleDateString('ar-EG', dateOptions));
        document.querySelectorAll('.date-sub-display').forEach(el => el.textContent = `اليوم ${today.getDate()} من الشهر`);

        // Generic Update Function
        function updateValue(type, amount, isReset = false) {
            let inputId = '';
            let headerId = '';

            if (type === 'mortality') { inputId = 'mortalityCount'; headerId = 'headerMortality'; }
            else if (type === 'feed') { inputId = 'feedAmount'; headerId = 'headerFeed'; }
            else if (type === 'eggs') { inputId = 'eggsCount'; headerId = 'headerEggs'; }

            const input = document.getElementById(inputId);
            const header = document.getElementById(headerId);
            
            let currentVal = parseInt(input.value) || 0;
            
            if (isReset) {
                input.value = 0;
            } else {
                let newVal = currentVal + amount;
                if (newVal < 0) newVal = 0;
                input.value = newVal;
            }

            // Sync Header
            header.textContent = input.value;
            
            // Visual Feedback
            input.classList.add('bg-gray-50');
            setTimeout(() => input.classList.remove('bg-gray-50'), 100);
        }

        // Submit Logic
        document.getElementById('submitBtn').addEventListener('click', function() {
            const btn = this;
            const originalContent = btn.innerHTML;
            
            // Loading State
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';
            btn.classList.remove('pulse-btn');
            btn.classList.add('bg-gray-400');

            setTimeout(() => {
                // Show Toast
                const toast = document.getElementById('toast');
                toast.classList.add('show');
                
                // Reset Button
                btn.disabled = false;
                btn.innerHTML = originalContent;
                btn.classList.remove('bg-gray-400');
                btn.classList.add('pulse-btn');

                // Hide Toast after 3s
                setTimeout(() => toast.classList.remove('show'), 3000);
            }, 1500);
        });
    </script>
</body>
</html>