<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodSwap - Plate Creation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <div class="flex flex-col md:flex-row min-h-screen">
        <x-header></x-header>

        <main class="flex-1 p-6 md:p-12">
            <header class="flex justify-between items-center mb-10 border-b pb-6 border-slate-200">
                <h2 class="text-3xl font-extrabold text-slate-900">Add/Update New Plate</h2>
                <div class="flex items-center gap-4">
                    <button class="text-slate-500 hover:text-emerald-600"><i class="far fa-bell text-lg"></i></button>
                    <div class="flex items-center gap-3 bg-white p-2 px-3 rounded-full border border-slate-200">
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-bold">ME</div>
                        <span class="font-semibold text-slate-800">You</span>
                    </div>
                </div>
            </header>

            <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-8 md:p-12 rounded-3xl shadow-xl shadow-slate-100 border border-slate-100">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    
                    <div class="flex flex-col items-center text-center space-y-6">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-slate-800">Step 1: The Visual</h3>
                            <p class="text-sm text-slate-500 max-w-xs">A clear photo of your plate component helps other swappers see what you have to offer.</p>
                        </div>
                        
                        <div class="w-full max-w-[280px]">
                            <label class="group relative block w-full aspect-square bg-slate-100 rounded-full border-4 border-dashed border-slate-300 hover:border-emerald-400 cursor-pointer overflow-hidden transition">
                                <input type="file" name="image" class="hidden" required>
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-500 group-hover:text-emerald-600 transition">
                                    <i class="fa-solid fa-cloud-arrow-up text-5xl mb-4"></i>
                                    <span class="font-semibold text-sm">Upload Photo</span>
                                    <span class="text-xs text-slate-400 mt-1">PNG, JPG up to 5MB</span>
                                </div>
                                <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden rounded-full">
                            </label>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-slate-800">Step 2: Plate Details</h3>
                            <p class="text-sm text-slate-500">Provide essential details to categorize your component correctly for the marketplace.</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label for="name" class="block text-sm font-semibold text-slate-700">Name of Item</label>
                                <div class="relative">
                                    <i class="fa-solid fa-utensils absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" id="name" name="name" required placeholder="e.g., Spaghetti Bolognese" 
                                        class="w-full pl-12 pr-4 py-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500 transition placeholder:text-slate-300">
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <label for="type" class="block text-sm font-semibold text-slate-700">Type of Component</label>
                                <div class="relative">
                                    <select id="type" name="type" required 
                                        class="w-full pl-5 pr-10 py-4 border border-slate-200 rounded-xl bg-white appearance-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500 transition text-slate-800 cursor-pointer">
                                        <option value="" disabled selected>Select category...</option>
                                        <option value="entry">Entry / Starter</option>
                                        <option value="main">Main Course</option>
                                        <option value="dessert">Dessert / Snack</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-slate-500 text-sm max-w-lg">By creating this Component, you confirm it's from a clean cafeteria and safe to share. Swappers must meet up to trade.</div>
                    <div class="flex gap-4">
                        <button type="button" class="px-8 py-3 rounded-xl border border-slate-200 font-semibold text-slate-600 hover:bg-slate-50 transition">Cancel</button>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-3 rounded-xl font-bold flex items-center gap-2 transition shadow-lg shadow-emerald-900/10">
                            Create/Update Component <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
        const fileInput = document.querySelector('input[name="image"]');
        const preview = document.getElementById('image-preview');
        const uploadIcon = document.querySelector('.group-hover\\:text-emerald-600');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.classList.remove('hidden');
                    // Hide the icon area
                    uploadIcon.classList.add('opacity-0');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>