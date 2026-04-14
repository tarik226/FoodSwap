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
<body>

    
    <div class="min-h-screen bg-slate-50 p-8">
        <!-- <x-header></x-header> -->
        <div class="max-w-7xl mx-auto">
            <header class="flex justify-between items-end mb-10">
                <div>
                    <h1 class="text-3xl font-black text-slate-900">Composants de Repas</h1>
                    <p class="text-slate-500 mt-1">Gérez vos entrées, plats et desserts disponibles pour le troc.</p>
                </div>
                <a href="{{route('component.create')}}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-emerald-200">
                    <i class="fa-solid fa-plus"></i> Nouveau Composant
                </a>
            </header>

            <div class="flex gap-3 mb-8">
                <button data-filter="all" class="px-5 py-2 rounded-full bg-slate-900 text-white font-bold text-sm">All</button>
                <button data-filter="entry" class="px-5 py-2 rounded-full bg-white text-slate-500 font-bold text-sm border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 transition">Starters</button>
                <button data-filter="main" class="px-5 py-2 rounded-full bg-white text-slate-500 font-bold text-sm border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 transition">Mains</button>
                <button data-filter="dessert" class="px-5 py-2 rounded-full bg-white text-slate-500 font-bold text-sm border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 transition">Desserts</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach($components as $item)
                <div class="food-item" class="group relative bg-white rounded-[2.5rem] p-4 border border-slate-100 shadow-xl shadow-slate-200/40 transition-all hover:shadow-2xl hover:-translate-y-1" data-category="{{ $item->type }}">
                    
                    <div class="relative aspect-[4/3] rounded-[2rem] overflow-hidden bg-slate-100">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        
                        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4">
                            <a href="{{ route('component.edit', $item->id) }}" class="w-12 h-12">
                                <button 
                                    class="w-12 h-12 bg-white/20 hover:bg-white text-white hover:text-slate-900 rounded-full flex items-center justify-center backdrop-blur-md transition-all">
                                    <i class="fa-solid fa-eye text-lg"></i>
                                </button>
                            </a>
                            <button class="w-12 h-12 bg-white/20 hover:bg-red-500 text-white rounded-full flex items-center justify-center backdrop-blur-md transition-all">
                                <i class="fa-solid fa-trash-can text-lg"></i>
                            </button>
                        </div>

                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-[10px] font-black uppercase tracking-tighter text-slate-800 shadow-sm">
                            <i class="fa-solid fa-circle text-[6px] mr-1 @if($item->type === 'entry') text-green-500
                                @elseif($item->type === 'main') text-blue-500
                                @elseif($item->type === 'dessert') text-pink-500
                                @else text-gray-500
                                @endif  align-middle"></i> {{ $item->type }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-5 px-2 pb-2 flex justify-between items-start">
                        <div>
                            <h3 class="font-black text-slate-800 text-lg leading-tight">{{ $item->name }}</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">
                                Added {{ $item->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="text-emerald-500">
                            <i class="fa-solid fa-arrows-rotate text-sm opacity-50"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        const buttons = document.querySelectorAll('[data-filter]');
        const items = document.querySelectorAll('.food-item');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');

                items.forEach(item => {
                    if (filter == 'all' || item.getAttribute('data-category') == filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // // Optional: update button styles (active state)
                buttons.forEach(btn => {
            btn.classList.remove('bg-slate-900','text-white');
            btn.classList.add('bg-white','text-slate-500');
        });

        // Apply "All" button style to the clicked one
        button.classList.remove('bg-white','text-slate-500');
        button.classList.add('bg-slate-900','text-white');
            });
        });

    </script>
</body>
</html>