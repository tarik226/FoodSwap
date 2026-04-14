<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodSwap - Edit Component</title>
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
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900">Modify Component</h2>
                    <p class="text-slate-500 text-sm mt-1">Editing: <span class="text-emerald-600 font-bold">{{ $component->name }}</span></p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 bg-white p-2 px-3 rounded-full border border-slate-200">
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-bold">ME</div>
                        <span class="font-semibold text-slate-800">You</span>
                    </div>
                </div>
            </header>

            <form action="{{ route('component.update', $component->id) }}" method="POST" enctype="multipart/form-data" 
                  class="bg-white p-8 md:p-12 rounded-3xl shadow-xl shadow-slate-100 border border-slate-100">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    
                    <div class="flex flex-col items-center text-center space-y-6">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-slate-800">Step 1: The Visual</h3>
                            <p class="text-sm text-slate-500 max-w-xs">Update your photo or keep the current one. High quality images get more swaps!</p>
                        </div>
                        
                        <div class="w-full max-w-[280px]">
                            <label class="group relative block w-full aspect-square bg-slate-100 rounded-full border-4 border-dashed border-slate-300 hover:border-emerald-400 cursor-pointer overflow-hidden transition">
                                <input type="file" name="image" class="hidden" id="file-input">
                                
                                <div id="upload-placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-slate-500 group-hover:text-emerald-600 transition {{ $component->image ? 'opacity-0' : '' }}">
                                    <i class="fa-solid fa-cloud-arrow-up text-5xl mb-4"></i>
                                    <span class="font-semibold text-sm">Change Photo</span>
                                </div>

                                <img id="image-preview" 
                                     src="{{ $component->image ? asset('storage/' . $component->image) : '#' }}"  
                                     alt="{{asset('storage/' . $component->image)}}" 
                                     class="absolute inset-0 w-full h-full object-cover rounded-full {{ $component->image ? '' : 'hidden' }}">
                                
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i class="fa-solid fa-camera text-white text-3xl"></i>
                                </div>
                            </label>
                            <p class="text-xs text-slate-400 mt-4 italic">Click the circle to upload a new image</p>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-slate-800">Step 2: Component Details</h3>
                            <p class="text-sm text-slate-500">Update the name or category of this plate component.</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label for="name" class="block text-sm font-semibold text-slate-700">Name of Item</label>
                                <div class="relative">
                                    <i class="fa-solid fa-utensils absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" id="name" name="name" required 
                                        value="{{ old('name', $component->name) }}"
                                        class="w-full pl-12 pr-4 py-4 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500 transition shadow-sm">
                                </div>
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="space-y-3">
                                <label for="type" class="block text-sm font-semibold text-slate-700">Type of Component</label>
                                <div class="relative">
                                    <select id="type" name="type" required 
                                        class="w-full pl-5 pr-10 py-4 border border-slate-200 rounded-xl bg-white appearance-none focus:ring-2 focus:ring-emerald-200 focus:border-emerald-500 transition text-slate-800 cursor-pointer shadow-sm">
                                        <option value="entry" {{ (old('type', $component->type) == 'entry') ? 'selected' : '' }}>Entry / Starter</option>
                                        <option value="main" {{ (old('type', $component->type) == 'main') ? 'selected' : '' }}>Main Course</option>
                                        <option value="dessert" {{ (old('type', $component->type) == 'dessert') ? 'selected' : '' }}>Dessert / Snack</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                                </div>
                                @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                            <div class="flex gap-4">
                                <i class="fa-solid fa-circle-info text-emerald-500 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Marketplace Visibility</h4>
                                    <p class="text-xs text-slate-500 leading-relaxed mt-1">
                                        Changes to this component will be reflected immediately in all your active menus. 
                                        Make sure the photo corresponds accurately to the meal being served today to avoid exchange disputes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6">
                    <a href="{{ route('component.index') }}" class="text-slate-500 text-sm font-semibold hover:text-slate-700 transition underline">
                        Back to Inventory
                    </a>
                    <div class="flex gap-4">
                        <button type="button" onclick="window.history.back()" class="px-8 py-3 rounded-xl border border-slate-200 font-semibold text-slate-600 hover:bg-slate-50 transition">Cancel</button>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-3 rounded-xl font-bold flex items-center gap-2 transition shadow-lg shadow-emerald-200">
                            Save Changes <i class="fa-solid fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
        const fileInput = document.getElementById('file-input');
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('opacity-0');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>