<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodSwap - Swap Cafeteria Meals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body>
    <div class="min-h-screen bg-slate-50 flex">
    <aside class="hidden lg:flex w-64 bg-white border-r border-slate-200 flex-col p-6">
        <div class="text-emerald-600 font-black text-2xl mb-10">FoodSwap</div>
        <nav class="space-y-2">
            <a href="#" class="flex items-center gap-3 p-3 bg-emerald-50 text-emerald-700 rounded-xl font-bold">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl font-bold transition">
                <i class="fa-solid fa-utensils"></i> My Menus
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-slate-500 hover:bg-slate-50 rounded-xl font-bold transition">
                <i class="fa-solid fa-arrows-rotate"></i> Marketplace
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-4 md:p-10">
        <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-900">Dashboard</h1>
                <p class="text-slate-500">Platform insights and your exchange history</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-3 bg-white border border-slate-200 rounded-xl text-slate-600 hover:bg-slate-50">
                    <i class="fa-solid fa-bell"></i>
                </button>
                <div class="flex items-center gap-3 bg-white p-2 pr-4 border border-slate-200 rounded-2xl">
                    <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center font-bold">JD</div>
                    <span class="font-bold text-slate-700">John Doe</span>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm shadow-emerald-900/5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center"><i class="fa-solid fa-chart-line"></i></div>
                    <span class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-lg">+12%</span>
                </div>
                <div class="text-2xl font-black text-slate-800">1,284</div>
                <div class="text-slate-400 text-sm font-medium">Total Exchanges</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm shadow-emerald-900/5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center"><i class="fa-solid fa-users"></i></div>
                    <span class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-lg">+5%</span>
                </div>
                <div class="text-2xl font-black text-slate-800">842</div>
                <div class="text-slate-400 text-sm font-medium">Active Users</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm shadow-emerald-900/5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center"><i class="fa-solid fa-utensils"></i></div>
                    <span class="text-slate-400 text-xs font-bold bg-slate-50 px-2 py-1 rounded-lg">0%</span>
                </div>
                <div class="text-2xl font-black text-slate-800">156</div>
                <div class="text-slate-400 text-sm font-medium">Daily Listings</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm shadow-emerald-900/5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center"><i class="fa-solid fa-clock"></i></div>
                    <span class="text-red-500 text-xs font-bold bg-red-50 px-2 py-1 rounded-lg">-2m</span>
                </div>
                <div class="text-2xl font-black text-slate-800">8m 30s</div>
                <div class="text-slate-400 text-sm font-medium">Avg. Trade Time</div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-slate-800">My Selected Plates</h2>
                    <button class="text-emerald-600 font-bold text-sm hover:underline">Customize All</button>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                    @php
                        $mySelection = [
                            ['name' => 'Tomato Soup', 'type' => 'Starter', 'color' => 'blue', 'img' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd?q=80&w=400'],
                            ['name' => 'Veggie Pizza', 'type' => 'Main', 'color' => 'emerald', 'img' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=400'],
                            ['name' => 'Apple Pie', 'type' => 'Dessert', 'color' => 'pink', 'img' => 'https://images.unsplash.com/photo-1568571780765-9276ac8b75a2?q=80&w=400']
                        ];
                    @endphp

                    @foreach($mySelection as $plate)
                    <div class="group relative bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 text-center transition-transform hover:-translate-y-1">
                        <div class="absolute top-4 right-4 z-10 w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center shadow-lg border-4 border-white">
                            <i class="fa-solid fa-check text-sm"></i>
                        </div>

                        <div class="mx-auto w-24 h-24 md:w-32 md:h-32 rounded-full ring-4 ring-slate-50 ring-offset-2 overflow-hidden mb-4 shadow-inner">
                            <img src="{{ $plate['img'] }}" class="w-full h-full object-cover">
                        </div>

                        <span class="inline-block px-3 py-1 rounded-full bg-{{ $plate['color'] }}-50 text-{{ $plate['color'] }}-600 text-[10px] font-black uppercase tracking-tighter mb-2">
                            {{ $plate['type'] }}
                        </span>
                        <h3 class="font-black text-slate-800 text-sm md:text-base">{{ $plate['name'] }}</h3>
                    </div>
                    @endforeach
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <h3 class="font-black text-slate-800">Recent Exchange History</h3>
                        <a href="#" class="text-emerald-600 text-sm font-bold">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-slate-400 text-[10px] uppercase font-black tracking-widest">
                                <tr>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">User</th>
                                    <th class="px-6 py-4">Given</th>
                                    <th class="px-6 py-4">Received</th>
                                    <th class="px-6 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <tr class="text-sm font-bold text-slate-600 hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 text-slate-400 font-medium">2026-02-19</td>
                                    <td class="px-6 py-4">Alex L.</td>
                                    <td class="px-6 py-4 text-red-400">Spaghetti</td>
                                    <td class="px-6 py-4 text-emerald-500">Caesar Salad</td>
                                    <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-[10px]">Completed</span></td>
                                </tr>
                                <tr class="text-sm font-bold text-slate-600 hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 text-slate-400 font-medium">2026-02-19</td>
                                    <td class="px-6 py-4">Alex L.</td>
                                    <td class="px-6 py-4 text-red-400">Spaghetti</td>
                                    <td class="px-6 py-4 text-emerald-500">Caesar Salad</td>
                                    <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-[10px]">Completed</span></td>
                                </tr>
                                <tr class="text-sm font-bold text-slate-600 hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 text-slate-400 font-medium">2026-02-19</td>
                                    <td class="px-6 py-4">Alex L.</td>
                                    <td class="px-6 py-4 text-red-400">Spaghetti</td>
                                    <td class="px-6 py-4 text-emerald-500">Caesar Salad</td>
                                    <td class="px-6 py-4"><span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-[10px]">Completed</span></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h3 class="font-black text-slate-800 mb-6">Top Traders</h3>
                    <div class="space-y-6">
                        @foreach(['Alex L.', 'Sarah J.', 'Mike R.'] as $trader)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-400">{{ substr($trader, 0, 1) }}</div>
                                <div>
                                    <div class="font-black text-slate-700 text-sm">{{ $trader }}</div>
                                    <div class="text-xs text-slate-400">15 trades completed</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-1 text-orange-400 font-bold text-sm">
                                <i class="fa-solid fa-star text-[10px]"></i> 4.9
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="w-full mt-8 py-3 rounded-xl border-2 border-slate-50 text-slate-400 font-bold hover:bg-slate-50 transition text-sm">
                        View Leaderboard
                    </button>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h3 class="font-black text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-thumbs-up text-emerald-500"></i> Most Sought After
                    </h3>
                    <div class="space-y-4">
                        @foreach(['Pizza' => 90, 'Burger' => 75, 'Pasta' => 60] as $item => $val)
                        <div>
                            <div class="flex justify-between text-xs font-bold text-slate-500 mb-1">
                                <span>{{ $item }}</span>
                                <span>{{ $val }}%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-50 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 rounded-full" style="width: {{ $val }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
</body>
</html>