<?php 
use App\Models\User;
use App\Models\Demande;
use App\Models\Component;
?>
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
    <button id="burger"  class="p-3 text-emerald-500 hover:text-emerald-900 transition">
        <i class="fa-solid fa-bars text-2xl"></i>
    </button>

    <aside id="sidebar"  class="fixed top-0 left-0 h-screen w-64 bg-slate-900 text-white flex flex-col z-40 -translate-x-full">

        <button id="burger_close"  class="p-3 text-emerald-500 hover:text-emerald-900 transition">
        <i class="fa-solid fa-bars text-2xl"></i>
    </button>
        <div class="p-6">
            <span class="text-2xl font-black text-emerald-500 tracking-tight">FoodSwap</span>
        </div>

        <nav class="flex-1 px-4 space-y-2">
            <a href="/home" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition text-slate-300 hover:text-white">
                <i class="fa-solid fa-house w-5 text-center"></i>
                <span class="font-medium">Home</span>
            </a>

            <a href="/dashboard" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition text-slate-300 hover:text-white">
                <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <button id="notif-trigger" class="w-full flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition text-slate-300 hover:text-white relative group">
                <div class="relative">
                    <i class="fa-solid fa-bell w-5 text-center"></i>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-emerald-500 border-2 border-slate-900 rounded-full"></span>
                </div>
                <span class="font-medium">Notifications</span>
            </button>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-4 px-4 py-3 rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition">
                    <i class="fa-solid fa-power-off w-5 text-center"></i>
                    <span class="font-medium">Déconnexion</span>
                </button>
            </form>
        </div>
    </aside>

    <div id="notif-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
        <div id="modal-content" class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <h3 class="text-xl font-bold text-slate-900">Recent Activity</h3>
                <button id="close-modal" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white hover:shadow-sm text-slate-400 hover:text-red-500 transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            @foreach($tradespot as $trade)
               
                    <div class="max-h-[450px] overflow-y-auto p-4 space-y-3">
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-100 cursor-pointer hover:bg-emerald-100 transition">
                            <p class="text-sm font-bold text-slate-800">Trade Request</p>
                            <p class="text-xs text-slate-600 mt-1">
                                {{ User::find($trade->sender_id)->name }} wants to swap a 
                                <span class="font-bold text-emerald-700">
                                    {{ Component::find(Demande::find($trade->demande_id)->component_id)->name }}
                                </span> 
                                for your Dessert.
                            </p>
                            <span class="text-[10px] text-slate-400 font-bold uppercase mt-2 block">
                                {{ $trade->created_at->diffForHumans() }}
                            </span>

                            <!-- Action buttons -->
                            <div class="flex gap-2 mt-3">
                                <a href="{{ route('trade.accept', ['trade' => $trade->id]) }}"
                                class="px-3 py-1 text-xs font-bold text-white bg-emerald-600 rounded hover:bg-emerald-700 transition">
                                Accept
                                </a>
                                <a href="{{ route('trade.decline', ['trade' => $trade->id]) }}"
                                class="px-3 py-1 text-xs font-bold text-white bg-red-600 rounded hover:bg-red-700 transition">
                                Decline
                                </a>
                            </div>
                        </div>
                    </div>
                
            @endforeach

        </div>
    </div>

    <main class="mx-auto p-8">
        <h2 class="text-3xl font-bold text-slate-800">Welcome back!</h2>
        <p class="text-slate-500 mt-2">This is where your main marketplace content goes.</p>
    </main>
    <div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Marketplace</h1>
                <p class="text-slate-500">Live trades happening now</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-slate-200 rounded-xl bg-white w-64 focus:ring-2 focus:ring-green-500 outline-none">
                </div>
                <button class="p-2 border border-slate-200 rounded-xl bg-white text-slate-400 hover:text-green-600">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>

        <div class="flex space-x-8 border-b border-slate-200 mb-8">
            <button onclick="switchTab('offers')" id="tab-offers" class="pb-4 text-green-600 border-b-2 border-green-600 font-bold transition">
                Available Offers
            </button>
            <button onclick="switchTab('requested')" id="tab-requested" class="pb-4 text-slate-500 hover:text-green-600 font-bold transition">
                Requested Items
            </button>
            <button onclick="switchTab('activity')" id="tab-activity" class="pb-4 text-slate-500 hover:text-green-600 font-bold transition">
                My Activity
            </button>
        </div>

        <div class="flex space-x-4 mb-10 overflow-x-auto pb-2">
            <button class="px-6 py-2 bg-slate-900 text-white rounded-full font-medium">Alls</button>
            <button class="px-6 py-2 bg-white border border-slate-200 text-slate-600 rounded-full font-medium hover:border-green-600 hover:text-green-600 transition">Starters</button>
            <button class="px-6 py-2 bg-white border border-slate-200 text-slate-600 rounded-full font-medium hover:border-green-600 hover:text-green-600 transition">Mains</button>
            <button class="px-6 py-2 bg-white border border-slate-200 text-slate-600 rounded-full font-medium hover:border-green-600 hover:text-green-600 transition">Desserts</button>
        </div>

        <div id="offers-content" class="grid md:grid-cols-3 gap-6">
            @foreach($offers as $offer)
                <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative group max-w-sm">
                    <div class="flex justify-end items-end mb-4">
                        <span class="text-slate-400 text-[10px] flex items-center bg-slate-50 px-2 py-1 rounded-lg">
                            <i class="far fa-clock mr-1"></i> {{ $offer->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-slate-100 shadow-inner">
                                <img src="{{asset('storage/'.$offer->component->image)}}" alt="Turkey Sandwich" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 mt-2 text-center">{{$offer->component->name}}</h3>
                        </div>

                        <div class="text-slate-300">
                            <i class="fas fa-exchange-alt text-xl"></i>
                        </div>

                        <div class="flex flex-col items-center flex-1">
                            <div onclick="openSwapModalOffer({{ $offer->component->id }},{{$offer->id}})" 
                                class="relative w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-200 group-hover:border-emerald-400 cursor-pointer transition-all hover:bg-slate-50">
                                <span class="text-2xl font-bold text-slate-400 group-hover:text-emerald-500 transition-colors">?</span>
                                
                                <button type="button" 
                                        class="absolute bottom-0 right-0 w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-white shadow-sm transform group-hover:scale-110 transition">
                                    <i class="fas fa-plus text-[10px]"></i>
                                </button>
                            </div>
                            <span class="text-[10px] font-medium text-slate-400 mt-2 uppercase tracking-wider group-hover:text-emerald-600 transition-colors">Add Offer</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center pt-4 border-t border-slate-50">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white uppercase" 
                                title="{{ $offer->user->name }}">
                                {{ substr($offer->user->name, 0, 1) }}
                            </div>
                            <span class="text-xs font-semibold text-slate-700">You  
                                <!-- the autheticated user -->
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div id="swap-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden">
                
                <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden mx-4">
                    
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                    <i class="fa-solid fa-handshake-angle"></i>
                                </span>
                                <h3 class="text-2xl font-black text-slate-900">Choose Your Counterpart</h3>
                            </div>
                            <p class="text-sm text-slate-500 font-medium">Select an item from your tray to trade for the <span class="text-orange-600 font-bold">{{$menutoday->menu->EntryComponent->name}}</span>.</p>
                        </div>
                        <button onclick="closeSwapModal()" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-red-500 transition shadow-sm">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <form action="{{route('swaps.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="modal_request_id" id="modal_request_id" value="">
                        <input type="hidden" name="modal_offer_id" id="modal_offer_id" value="">
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Starters</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->EntryComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{ asset('storage/' . $menutoday->menu->EntryComponent->image) }}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->EntryComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Mains</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->MainComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{asset('storage/'.$menutoday->menu->MainComponent->image)}}" alt="{{asset('storage'.$menutoday->menu->MainComponent->image)}}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->MainComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Desserts</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->DessertComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-yellow-500 peer-checked:bg-blue-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{asset('storage/'.$menutoday->menu->DessertComponent->image)}}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->DessertComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="p-8 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-slate-500">
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[10px] font-bold">{{ substr($offer->user->name, 0, 1) }}</div>
                                    <div class="w-8 h-8 rounded-full border-2 border-white bg-emerald-500 flex items-center justify-center text-[10px] font-bold text-white">ME 
                                        // the autheticated user name
                                    </div>
                                </div>
                                <span class="text-xs font-medium">You are trading with <span class="font-bold text-slate-900">{{$offer->user->first()->name}}</span></span>
                            </div>
                            
                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="button" onclick="closeSwapModal()" class="flex-1 sm:flex-none px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">Cancel</button>
                                <button type="submit" class="flex-1 sm:flex-none bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-3 rounded-2xl font-black text-sm transition-all shadow-lg shadow-emerald-200 flex items-center justify-center gap-2">
                                    Send Proposal <i class="fa-solid fa-paper-plane text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="requested-content" class="grid md:grid-cols-3 gap-6 hidden">
            @foreach($demandes as $demande)
                <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative group max-w-sm">
                    <div class="flex justify-end items-end mb-4">
                        <span class="text-slate-400 text-[10px] flex items-center bg-slate-50 px-2 py-1 rounded-lg">
                            <i class="far fa-clock mr-1"></i> {{ $demande->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-slate-100 shadow-inner">
                                <img src="{{asset('storage/'.$demande->component->image)}}" alt="Turkey Sandwich" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 mt-2 text-center">{{$demande->component->name}}</h3>
                        </div>

                        <div class="text-slate-300">
                            <i class="fas fa-exchange-alt text-xl"></i>
                        </div>

                        <div class="flex flex-col items-center flex-1">
                            <div onclick="openSwapModalDemande({{$demande->id}})" 
                                class="relative w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-200 group-hover:border-emerald-400 cursor-pointer transition-all hover:bg-slate-50">
                                <span class="text-2xl font-bold text-slate-400 group-hover:text-emerald-500 transition-colors">?</span>
                                
                                <button type="button" 
                                        class="absolute bottom-0 right-0 w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-white shadow-sm transform group-hover:scale-110 transition">
                                    <i class="fas fa-plus text-[10px]"></i>
                                </button>
                            </div>
                            <span class="text-[10px] font-medium text-slate-400 mt-2 uppercase tracking-wider group-hover:text-emerald-600 transition-colors">Add demande</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-center pt-4 border-t border-slate-50">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white uppercase" 
                                title="{{ $demande->user->name }}">
                                {{ substr($demande->user->name, 0, 1) }}
                            </div>
                            <span class="text-xs font-semibold text-slate-700">You  
                                <!-- the autheticated user -->
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div id="swap-modal-demande" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden">
                
                <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden mx-4">
                    
                    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                    <i class="fa-solid fa-handshake-angle"></i>
                                </span>
                                <h3 class="text-2xl font-black text-slate-900">Choose Your Counterpart</h3>
                            </div>
                            <p class="text-sm text-slate-500 font-medium">Select an item from your tray to trade for the <span class="text-orange-600 font-bold">{{$menutoday->menu->EntryComponent->name}}</span>.</p>
                        </div>
                        <button onclick="closeSwapModalDemande()" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-red-500 transition shadow-sm">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <form action="{{route('swaps.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="modal_request_id_demande" id="modal_request_id_demande" value="">
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Starters</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->EntryComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{ asset('storage/' . $menutoday->menu->EntryComponent->image) }}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->EntryComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Mains</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->MainComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{asset('storage/'.$menutoday->menu->MainComponent->image)}}" alt="{{asset('storage'.$menutoday->menu->MainComponent->image)}}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->MainComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between px-2">
                                        <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Desserts</h4>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="relative group cursor-pointer block">
                                            <input type="radio" name="component" value="{{$menutoday->menu->DessertComponent->id}}" class="peer hidden">
                                            <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-yellow-500 peer-checked:bg-blue-50/30">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                                        <img src="{{asset('storage/'.$menutoday->menu->DessertComponent->image)}}" class="w-full h-full object-cover">
                                                        <!-- the image of the authenticated user's menu's component (entry) -->
                                                    </div>
                                                    <div class="min-w-0">
                                                        <p class="text-xs font-black text-slate-800 truncate">{{$menutoday->menu->DessertComponent->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="p-8 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3 text-slate-500">
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[10px] font-bold">{{ substr($demande->user->name, 0, 1) }}</div>
                                    <div class="w-8 h-8 rounded-full border-2 border-white bg-emerald-500 flex items-center justify-center text-[10px] font-bold text-white">ME 
                                        // the autheticated user name
                                    </div>
                                </div>
                                <span class="text-xs font-medium">You are trading with <span class="font-bold text-slate-900">{{$demande->user->first()->name}}</span></span>
                            </div>
                            
                            <div class="flex gap-3 w-full sm:w-auto">
                                <button type="button" onclick="closeSwapModal()" class="flex-1 sm:flex-none px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">Cancel</button>
                                <button type="submit" class="flex-1 sm:flex-none bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-3 rounded-2xl font-black text-sm transition-all shadow-lg shadow-emerald-200 flex items-center justify-center gap-2">
                                    Send Proposal <i class="fa-solid fa-paper-plane text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="activity-content" class="grid md:grid-cols-3 gap-6 hidden">
            @include('marketplace.partials.activity-grid')
        </div>

    </div>
</div>

<script>
    function switchTab(type) {
        const offersTab = document.getElementById('tab-offers');
        const reqTab = document.getElementById('tab-requested');
        const activeTab = document.getElementById('tab-activity');
        const offersContent = document.getElementById('offers-content');
        const reqContent = document.getElementById('requested-content');
        const activeContent = document.getElementById('activity-content');


        if(type === 'offers') {
            offersTab.className = "pb-4 text-green-600 border-b-2 border-green-600 font-bold transition";
            reqTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            activeTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            offersContent.classList.remove('hidden');
            reqContent.classList.add('hidden');
            activeContent.classList.add('hidden');
        } else if (type == 'requested') {
            reqTab.className = "pb-4 text-green-600 border-b-2 border-green-600 font-bold transition";
            offersTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            activeTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            reqContent.classList.remove('hidden');
            offersContent.classList.add('hidden');
            activeContent.classList.add('hidden');
        }else{
            activeTab.className = "pb-4 text-green-600 border-b-2 border-green-600 font-bold transition";
            offersTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            reqTab.className = "pb-4 text-slate-500 hover:text-green-600 font-bold transition";
            reqContent.classList.add('hidden');
            offersContent.classList.add('hidden');
            activeContent.classList.remove('hidden');
        }

        
    }



    function openSwapModalOffer(requestId,offerId) {
        document.getElementById('modal_request_id').value = requestId;
        document.getElementById('modal_offer_id').value = offerId;
        const modal = document.getElementById('swap-modal');
        modal.classList.remove('hidden');
    }

    function openSwapModalDemande(requestId) {
        document.getElementById('modal_request_id_demande').value = requestId;
        const modal = document.getElementById('swap-modal-demande');
        modal.classList.remove('hidden');
    }

    function closeSwapModal() {
        const modal = document.getElementById('swap-modal');
        modal.classList.add('hidden');
    }

    function closeSwapModalDemande() {
        const modal = document.getElementById('swap-modal-demande');
        modal.classList.add('hidden');
    }


    
    
        document.addEventListener('DOMContentLoaded', () => {
        const trigger = document.getElementById('notif-trigger');
        const modal = document.getElementById('notif-modal');
        const content = document.getElementById('modal-content');
        const closeBtn = document.getElementById('close-modal');

        function openModal() {
            modal.classList.remove('hidden');
            setTimeout(() => {
            modal.classList.add('opacity-100');
            content.classList.add('scale-100');
            content.classList.remove('scale-95');
        }, 10);
        }

        function closeModal() {
            modal.classList.remove('opacity-100');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }

        // Event Listeners
        trigger.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);

        // Close on clicking the backdrop
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    });


    

    

    document.addEventListener('DOMContentLoaded', () => {
        const burger = document.getElementById('burger');
        const sidebar = document.getElementById('sidebar');
        burger.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } 
        });

        document.getElementById('burger_close').addEventListener('click', () => {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
        })
    });


    

</script>
</body>
</html>