<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Code - FoodSwap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        /* Chrome, Safari, Edge, Opera - Remove arrows from number input */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="bg-white min-h-screen">

    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="md:w-1/2 relative min-h-[300px] md:min-h-screen overflow-hidden">
            <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?q=80&w=1200" 
                 class="absolute inset-0 w-full h-full object-cover" alt="Campus cafeteria">
            
            <div class="absolute inset-0 bg-green-600/85 p-8 md:p-16 text-white flex flex-col justify-between">
                <div>
                    <a href="{{route('forget_password')}}" class="inline-flex items-center text-sm font-medium hover:underline mb-12">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Verify Identity</h1>
                    <p class="text-lg mb-10 opacity-90">We've sent a 6-digit security code to your email. Please enter it to continue resetting your password.</p>
                    
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl max-w-sm">
                        <h3 class="font-bold mb-2">Check your Spam</h3>
                        <p class="text-sm opacity-90 leading-relaxed">
                            If you don't see the email in your inbox within 2 minutes, please check your junk or spam folder.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 p-8 md:p-24 flex flex-col justify-center items-center">
            <div class="w-full max-w-md">
                
                <h2 class="text-3xl font-bold text-slate-900 mb-2 text-center md:text-left">Enter Code</h2>
                <p class="text-slate-500 mb-8 text-center md:text-left">A 6-digit code has been sent to your email.</p>

                <form action="" method="GET">
                    @csrf
                    @method('')
                    <div class="flex justify-between gap-2 mb-8" id="otp-container">
                        @for ($i = 1; $i <= 6; $i++)
                            <input type="number" 
                                   name="code[]" 
                                   maxlength="1" 
                                   class="w-12 h-14 md:w-14 md:h-16 text-center text-2xl font-bold border-2 border-slate-200 rounded-xl focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none transition"
                                   required>
                        @endfor
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-xl font-bold hover:bg-green-700 transition-all shadow-lg shadow-green-200">
                        Verify Code
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-slate-500 mb-2">Didn't receive the code?</p>
                    <button type="button" class="text-green-600 font-bold hover:underline">
                        Resend New Code
                    </button>
                </div>

                @if ($errors->any())
                    <div class="mt-6 p-4 bg-red-50 border border-red-100 rounded-xl text-red-600 text-sm flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Auto-focus and backspace logic for the 6-digit input
        const inputs = document.querySelectorAll('#otp-container input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length > 1) {
                    e.target.value = e.target.value.slice(0, 1);
                }
                if (e.target.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            // Handle paste event
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text').slice(0, 6).split('');
                pasteData.forEach((char, i) => {
                    if (inputs[i]) inputs[i].value = char;
                });
                if (inputs[pasteData.length - 1]) inputs[pasteData.length - 1].focus();
            });
        });
    </script>
</body>
</html>