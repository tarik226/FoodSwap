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

    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="md:w-5/12 bg-green-600 p-8 md:p-16 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1000')] bg-cover bg-center"></div>
            
            <div class="relative z-10">
                <a href="/" class="inline-flex items-center text-sm font-semibold hover:opacity-80 transition mb-12">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Home
                </a>
                
                <h1 class="text-5xl font-bold mb-4">Join FoodSwap</h1>
                <p class="text-lg opacity-90 mb-12">Stop wasting cafeteria meals you don't want. Start swapping for what you love.</p>
                
                <ul class="space-y-6">
                    <li class="flex items-center space-x-4">
                        <div class="w-6 h-6 border-2 border-white rounded-full flex items-center justify-center text-xs">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-lg">Swap meals instantly with classmates</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-6 h-6 border-2 border-white rounded-full flex items-center justify-center text-xs">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-lg">Reduce food waste in your cafeteria</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-6 h-6 border-2 border-white rounded-full flex items-center justify-center text-xs">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-lg">Get exactly what you want to eat</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-6 h-6 border-2 border-white rounded-full flex items-center justify-center text-xs">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-lg">Connect with your campus community</span>
                    </li>
                </ul>
            </div>

            <div class="relative z-10 mt-12">
                <div class="flex space-x-2 mb-4">
                    <div id="p-bar-1" class="h-1.5 w-full bg-white rounded-full transition-opacity opacity-100"></div>
                    <div id="p-bar-2" class="h-1.5 w-full bg-white rounded-full transition-opacity opacity-30"></div>
                </div>
                <p class="text-sm font-medium" id="step-indicator">Step 1 of 2</p>
            </div>
        </div>

        <div class="md:w-7/12 p-8 md:p-24 flex items-center justify-center">
            <form action="{{route('register_process')}}" method="POST" class="w-full max-w-md">
                @csrf
                @method('POST')
                <div id="step-1" class="step-content active">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Let's start with the basics</h2>
                    <p class="text-slate-500 mb-8">Tell us a bit about yourself</p>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="far fa-user"></i>
                                </span>
                                <input type="text" name="name" placeholder="John Doe" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <input type="email" name="email" placeholder="john@university.edu" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                            <p class="text-xs text-slate-400 mt-2">Must be at least 8 characters</p>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Password Confirmation</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        <button type="button" onclick="nextStep(2)" class="w-full bg-green-600 text-white py-4 rounded-xl font-bold hover:bg-green-700 transition flex items-center justify-center">
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <div id="step-2" class="step-content">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Where do you eat?</h2>
                    <p class="text-slate-500 mb-8">Help us connect you with your cafeteria</p>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">School or Workplace</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="fas fa-building"></i>
                                </span>
                                <input type="text" name="university" placeholder="e.g., Stanford University" class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-4">I am a...</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach(['Student', 'Staff'] as $role)
                                <label class="cursor-pointer">
                                    <input type="radio" name="role" value="{{ strtolower($role) }}" class="peer hidden">
                                    <div class="text-center py-3 border border-slate-200 rounded-xl peer-checked:border-green-600 peer-checked:bg-green-50 peer-checked:text-green-700 transition font-medium">
                                        {{ $role }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex space-x-4 pt-6">
                            <button type="button" onclick="nextStep(1)" class="w-1/3 border border-slate-200 py-4 rounded-xl font-bold text-slate-700 hover:bg-slate-50 transition">Back</button>
                            <button type="submit" class="w-2/3 bg-green-600 text-white py-4 rounded-xl font-bold hover:bg-green-700 transition flex items-center justify-center">
                                Create Account <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- <div id="step-3" class="step-content">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Almost there!</h2>
                    <p class="text-slate-500 mb-8">Set your food preferences</p>
                    
                    <div class="space-y-4">
                        <p class="text-sm font-bold text-slate-700 mb-2">Dietary Preferences (Optional)</p>
                        
                        <div class="space-y-3">
                            @foreach(['Vegetarian', 'Vegan', 'Gluten-Free', 'Halal', 'Kosher', 'No Preferences'] as $pref)
                            <label class="flex items-center p-3 border border-slate-100 rounded-xl hover:bg-slate-50 cursor-pointer transition">
                                <input type="checkbox" name="preferences[]" value="{{ Str::slug($pref) }}" class="w-5 h-5 rounded border-slate-300 text-green-600 focus:ring-green-500">
                                <span class="ml-3 text-slate-600">{{ $pref }}</span>
                            </label>
                            @endforeach
                        </div>

                        <div class="bg-green-50 p-4 rounded-xl border border-green-100 mt-6">
                            <p class="text-sm text-green-800">
                                <span class="font-bold">Pro tip:</span> Adding dietary preferences helps us show you the most relevant swaps!
                            </p>
                        </div>

                        <div class="flex space-x-4 pt-6">
                            <button type="button" onclick="nextStep(2)" class="w-1/3 border border-slate-200 py-4 rounded-xl font-bold text-slate-700 hover:bg-slate-50 transition">Back</button>
                            <button type="submit" class="w-2/3 bg-green-600 text-white py-4 rounded-xl font-bold hover:bg-green-700 transition flex items-center justify-center">
                                Create Account <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <div class="mt-8 text-center">
                    <p class="text-slate-500">Already have an account? <a href="{{route('login')}}" class="text-green-600 font-bold hover:underline">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function nextStep(step) {
            // Hide all steps
            document.querySelectorAll('.step-content').forEach(el => el.classList.remove('active'));
            // Show current step
            document.getElementById('step-' + step).classList.add('active');
            
            // Update Progress Bar
            for(let i = 1; i <= 3; i++) {
                const bar = document.getElementById('p-bar-' + i);
                if(i <= step) {
                    bar.classList.remove('opacity-30');
                    bar.classList.add('opacity-100');
                } else {
                    bar.classList.remove('opacity-100');
                    bar.classList.add('opacity-30');
                }
            }
            
            // Update Text
            document.getElementById('step-indicator').innerText = 'Step ' + step + ' of 3';
            
            // Scroll to top for mobile
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>