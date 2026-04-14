<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .step-content { display: none; }
        .step-content.active { display: block; }
        .progress-bar { transition: width 0.3s ease-in-out; }
    </style>
    <title>Document</title>
</head>
<body>
<div class="flex min-h-screen">
    <div class="hidden lg:flex lg:w-1/2 bg-green-600 p-12 text-white flex-col justify-center relative overflow-hidden">
        <div class="z-10">
            <a href="{{ route('login') }}" class="text-sm flex items-center mb-8 hover:underline">
                <span class="mr-2">←</span> Back to Login
            </a>
            <h1 class="text-5xl font-bold mb-4">New Credentials</h1>
            <p class="text-lg opacity-90 mb-8">Set a strong password to keep your account and swap history secure.</p>
            
            <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-white/20 max-w-sm">
                <h3 class="font-bold mb-2">Security First</h3>
                <p class="text-sm opacity-80">We use industry-standard encryption to ensure your account details remain private.</p>
            </div>
        </div>
        <div class="absolute inset-0 opacity-20 bg-[url('/path-to-your-office-bg.jpg')] bg-cover bg-center"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Set New Password</h2>
            <p class="text-gray-500 mb-8">Please enter your email and choose a secure new password.</p>

            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <input type="email" name="email" value="{{$email}}" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-500 focus:outline-none" readonly>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" name="password" required autofocus
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all"
                           placeholder="••••••••">
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all"
                           placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg flex items-center justify-center transition-colors">
                    Reset Password
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>