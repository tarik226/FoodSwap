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
<body class="bg-white text-slate-900">

    <nav class="flex items-center justify-between px-8 py-6 max-w-7xl mx-auto">
        <div class="text-2xl font-bold text-green-600">FoodSwap</div>
        <div class="flex items-center space-x-8">
            <a href="{{route('login')}}" class="text-slate-600 hover:text-green-600 transition">Sign In</a>
            <a href="{{route('register')}}" class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition">Sign Up</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h1 class="text-6xl font-extrabold leading-tight mb-6">
                Swap Cafeteria Meals, <br> <span class="text-slate-800">Save Money</span>
            </h1>
            <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                FoodSwap connects students and staff in your cafeteria to trade meals and food items. 
                Don't like today's lunch? Swap it with someone who does and get what you actually want.
            </p>
            <div class="flex space-x-4">
                <a href="#how-it-works" class="bg-green-600 text-white px-8 py-4 rounded-xl font-bold flex items-center hover:bg-green-700 transition">
                    Get Started <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#mission" class="border-2 border-green-600 text-green-600 px-8 py-4 rounded-xl font-bold hover:bg-green-50 transition">
                    Learn More
                </a>
            </div>
        </div>
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1547573854-74d2a71d0826?q=80&w=1000" alt="Students eating" class="rounded-3xl shadow-2xl">
        </div>
    </section>

    <section id="how-it-works" class="bg-green-50/50 py-20">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <h2 class="text-4xl font-bold mb-4">How FoodSwap Works</h2>
            <p class="text-slate-600 mb-16">Getting started is simple. Follow these four easy steps to begin swapping meals in your cafeteria.</p>
            
            <div class="grid md:grid-cols-4 gap-6">
                @php
                    $steps = [
                        ['icon' => 'fa-upload', 'title' => 'Post Your Meal', 'desc' => "Take a photo of your cafeteria meal or snack and list what you'd like to swap it for."],
                        ['icon' => 'fa-search', 'title' => 'Browse Available Swaps', 'desc' => 'See what others in your cafeteria are offering and find the perfect trade.'],
                        ['icon' => 'fa-comment-dots', 'title' => 'Connect & Negotiate', 'desc' => 'Message other users to agree on a fair swap and arrange a meeting spot.'],
                        ['icon' => 'fa-sync-alt', 'title' => 'Make the Swap', 'desc' => 'Meet up in the cafeteria, exchange meals, and enjoy what you actually wanted to eat!']
                    ];
                @endphp

                @foreach($steps as $index => $step)
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 relative">
                    <div class="absolute -top-4 -left-2 bg-green-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">
                        {{ $index + 1 }}
                    </div>
                    <div class="bg-green-600 text-white w-14 h-14 rounded-xl flex items-center justify-center mb-6 mx-auto text-xl">
                        <i class="fas {{ $step['icon'] }}"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-4">{{ $step['title'] }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="mission" class="max-w-7xl mx-auto px-8 py-24">
        <div class="grid md:grid-cols-2 gap-16 items-center mb-20">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000" alt="Community" class="rounded-3xl shadow-xl h-96 object-cover">
            <div>
                <h2 class="text-4xl font-bold mb-6">Our Mission</h2>
                <p class="text-slate-600 mb-6 text-lg">At FoodSwap, we believe cafeteria food shouldn't go to waste just because it's not your favorite. Our mission is to create a platform where students and staff can easily swap meals to get what they actually want.</p>
                <p class="text-slate-600 text-lg">By connecting people in cafeterias, we're not just reducing waste — we're building connections, saving money, and making lunch the highlight of everyone's day.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="p-8 rounded-2xl border border-slate-100 bg-white hover:shadow-lg transition">
                <div class="bg-green-100 text-green-600 w-12 h-12 rounded-lg flex items-center justify-center mb-6"><i class="fas fa-leaf text-xl"></i></div>
                <h3 class="font-bold text-xl mb-3">Reduce Food Waste</h3>
                <p class="text-slate-500">Millions of cafeteria meals go uneaten every day. We're changing that by letting students swap instead of waste.</p>
            </div>
            <div class="p-8 rounded-2xl border border-slate-100 bg-white hover:shadow-lg transition">
                <div class="bg-green-100 text-green-600 w-12 h-12 rounded-lg flex items-center justify-center mb-6"><i class="fas fa-users text-xl"></i></div>
                <h3 class="font-bold text-xl mb-3">Build Campus Community</h3>
                <p class="text-slate-500">Connect with classmates and colleagues through food swapping and discover new favorites together.</p>
            </div>
            <div class="p-8 rounded-2xl border border-slate-100 bg-white hover:shadow-lg transition">
                <div class="bg-green-100 text-green-600 w-12 h-12 rounded-lg flex items-center justify-center mb-6"><i class="fas fa-dollar-sign text-xl"></i></div>
                <h3 class="font-bold text-xl mb-3">Get What You Want</h3>
                <p class="text-slate-500">Don't settle for meals you don't like. Swap to get exactly what you're craving without spending extra money.</p>
            </div>
        </div>
    </section>

    <section class="max-w-3xl mx-auto px-8 py-24">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-slate-500">Got questions? We've got answers. Here are the most common questions about FoodSwap.</p>
        </div>

        <div class="space-y-4">
            <div class="border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <button class="w-full px-6 py-5 text-left font-bold flex justify-between items-center text-green-700 bg-slate-50">
                    Is FoodSwap really free to use?
                    <i class="fas fa-chevron-up"></i>
                </button>
                <div class="px-6 py-5 text-slate-600 bg-slate-50/50 border-t border-slate-200">
                    Yes! FoodSwap is completely free. There are no fees to post meals, browse swaps, or connect with other users. Just download the app and start swapping!
                </div>
            </div>

            @php
                $faqs = [
                    "Can I swap any cafeteria meal or food item?",
                    "What if no one wants to swap with me?",
                    "How do I meet up to make the swap?",
                    "Can I swap any cafeteria meal or food item?",
                    "What if no one wants to swap with me?",
                    "How do I meet up to make the swap?"
                ];
            @endphp

            @foreach($faqs as $faq)
            <div class="border border-slate-200 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-5 text-left font-bold flex justify-between items-center hover:bg-slate-50 transition">
                    {{ $faq }}
                    <i class="fas fa-chevron-down text-green-600"></i>
                </button>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="bg-[#0a1120] text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-3 gap-12 mb-16">
            <div>
                <h4 class="font-bold mb-6">Connect With Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-6">Contact Us</h4>
                <div class="flex items-center text-slate-400">
                    <i class="far fa-envelope mr-3 text-white"></i>
                    <span>support@foodswap.com</span>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-6">Location</h4>
                <div class="flex items-start text-slate-400">
                    <i class="fas fa-map-marker-alt mr-3 mt-1 text-white"></i>
                    <span>123 Community Street<br>San Francisco, CA 94102<br>United States</span>
                </div>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-8 pt-8 border-t border-slate-800 flex justify-between items-center">
            <div class="text-2xl font-bold text-green-500">FoodSwap</div>
            <div class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} FoodSwap. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>