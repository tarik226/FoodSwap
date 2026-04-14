<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password - FoodSwap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .state-content { display: none; }
        .state-content.active { display: block; }
    </style>
</head>
<body class="bg-white min-h-screen">

    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="md:w-1/2 relative min-h-[300px] md:min-h-screen overflow-hidden">
            <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?q=80&w=1200" 
                 class="absolute inset-0 w-full h-full object-cover" alt="Campus cafeteria">
            
            <div class="absolute inset-0 bg-green-600/85 p-8 md:p-16 text-white flex flex-col justify-between">
                <div>
                    <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium hover:underline mb-12">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Login
                    </a>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Reset Password</h1>
                    <p class="text-lg mb-10 opacity-90">Don't worry, it happens to the best of us. We'll help you get back into your account in no time.</p>
                    
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl max-w-sm">
                        <h3 class="font-bold mb-2 text-white">Security First</h3>
                        <p class="text-sm opacity-90 leading-relaxed text-white/90">
                            We use industry-standard encryption to ensure your account details and swap history remain private and secure.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 p-8 md:p-24 flex flex-col justify-center items-center">
            <div class="w-full max-w-md">
                
                <div id="request-state" class="state-content active">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Forgot Password?</h2>
                    <p class="text-slate-500 mb-8">Enter the email address associated with your account and we'll send you a code to reset your password.</p>

                    <form action="{{route('sendEmail')}}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <input type="email" name="email" required placeholder="john@university.edu" 
                                    class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none transition">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-green-600 text-white py-3.5 rounded-xl font-bold hover:bg-green-700 transition flex items-center justify-center">
                            Send Reset Link <i class="fas fa-paper-plane ml-2 text-sm"></i>
                        </button>
                    </form>
                </div>

                <div id="success-state" class="state-content text-center">
                    <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Email Sent!</h2>
                    <p class="text-slate-500 mb-8 leading-relaxed">
                        We've sent a password reset link to <br>
                        <span class="font-semibold text-slate-900">john@university.edu</span>. <br>
                        Please check your inbox and follow the instructions.
                    </p>

                    <div class="space-y-4">
                        <a href="{{ route('login') }}" class="block w-full bg-green-600 text-white py-3.5 rounded-xl font-bold hover:bg-green-700 transition">
                            Return to Sign In
                        </a>
                        <p class="text-sm text-slate-500">
                            Didn't receive the email? 
                            <button onclick="location.reload()" class="text-green-600 font-bold hover:underline">Click to resend</button>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Example logic for demonstration
        // In your Laravel project, you would likely trigger this based on 
        // the session('status') variable.
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('sent')) {
            document.getElementById('request-state').classList.remove('active');
            document.getElementById('success-state').classList.add('active');
        }
    </script>
</body>
</html>