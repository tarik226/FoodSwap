<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join FoodSwap - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .step-content { display: none; }
        .step-content.active { display: block; }
        .progress-bar { transition: width 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-white min-h-screen">
@if(session('message'))
    <div id="popup-message" 
         style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%);
                background-color: #4caf50; color: white; padding: 10px 20px; 
                border-radius: 5px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); 
                z-index: 9999;">
        {{ session('message') }}
    </div>
@endif

<div class="flex flex-col md:flex-row min-h-screen">
    <div class="md:w-1/2 relative min-h-[300px] md:min-h-screen overflow-hidden">
        <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?q=80&w=1200" 
             class="absolute inset-0 w-full h-full object-cover" alt="Campus cafeteria">
        
        <div class="absolute inset-0 bg-green-600/85 p-8 md:p-16 text-white flex flex-col justify-between">
            <div>
                <a href="/" class="inline-flex items-center text-sm font-medium hover:underline mb-12">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome Back!</h1>
                <p class="text-lg mb-10 opacity-90">Ready to find your next meal? Log in to see what's available in your cafeteria today.</p>
                
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl max-w-lg">
                    <h3 class="font-bold mb-2">Did you know?</h3>
                    <p class="text-sm opacity-90 leading-relaxed">
                        Last week, FoodSwap users saved over 500 meals from going to waste across campus cafeterias.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="md:w-1/2 p-8 md:p-24 flex flex-col justify-center items-center">
        <form action="{{route('login_process')}}" method="POST" class="w-full max-w-md">
            @csrf
            <h2 class="text-3xl font-bold text-slate-900 mb-2">Sign In to FoodSwap</h2>
            <p class="text-slate-500 mb-8">Please enter your details to continue</p>

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="far fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="john@university.edu" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="text-sm font-semibold text-slate-700">Password</label>
                        <a href="{{route('forget_password')}}" class="text-xs font-bold text-green-600 hover:underline">Forgot Password?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-3.5 rounded-xl font-bold hover:bg-green-700 transition flex items-center justify-center">
                    Sign In <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>

            <div class="mt-8 text-center text-sm text-slate-500">
                Don't have an account? <a href="{{route('register')}}" class="text-green-600 font-bold hover:underline">Sign Up</a>
            </div>
        </form>
    </div>
</div>
</body>
<script>
        setTimeout(() => {
            const popup = document.getElementById('popup-message');
            if (popup) {
                popup.style.display = 'none';
            }
        }, 2000); // 2 seconds
    </script>