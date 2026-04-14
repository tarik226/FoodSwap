<div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative group max-w-sm">
    <div class="flex justify-end items-end mb-4">
        <span class="text-slate-400 text-[10px] flex items-center bg-slate-50 px-2 py-1 rounded-lg">
            <i class="far fa-clock mr-1"></i> Just now
        </span>
    </div>

    <div class="flex items-center justify-between gap-4 mb-6">
        <div class="flex flex-col items-center flex-1">
            <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-slate-100 shadow-inner">
                <img src="{{asset('storage/images/mains/briwa.webp')}}" alt="Turkey Sandwich" class="w-full h-full object-cover">
            </div>
            <h3 class="text-sm font-bold text-slate-900 mt-2 text-center">Turkey Sandwich</h3>
        </div>

        <div class="text-slate-300">
            <i class="fas fa-exchange-alt text-xl"></i>
        </div>

        <div class="flex flex-col items-center flex-1">
            <div onclick="openSwapModal(2)" 
                 class="relative w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-200 group-hover:border-emerald-400 cursor-pointer transition-all hover:bg-slate-50">
                <input type="hidden" id="modal-request-id" value="">
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
            <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold text-white uppercase">
                ME
            </div>
            <span class="text-xs font-semibold text-slate-700">You</span>
        </div>
    </div>
</div>




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
                <p class="text-sm text-slate-500 font-medium">Select an item from your tray to trade for the <span class="text-orange-600 font-bold">Turkey Sandwich</span>.</p>
            </div>
            <button onclick="closeSwapModal()" class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 hover:text-red-500 transition shadow-sm">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form action="#" method="POST">
            @csrf
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between px-2">
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-slate-400">Your Starters</h4>
                        </div>
                        <div class="space-y-3">
                            <label class="relative group cursor-pointer block">
                                <input type="radio" name="offer" value="1" class="peer hidden">
                                <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50/30">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                            <img src="{{asset('storage/images/mains/brake.webp')}}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs font-black text-slate-800 truncate">Greek Salad</p>
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
                                <input type="radio" name="offer" value="2" class="peer hidden">
                                <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50/30">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                            <img src="{{asset('storage/images/mains/rice.webp')}}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs font-black text-slate-800 truncate">Vegetarian Pizza</p>
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
                                <input type="radio" name="offer" value="3" class="peer hidden">
                                <div class="p-3 rounded-2xl border-2 border-slate-100 bg-white transition-all peer-checked:border-yellow-500 peer-checked:bg-blue-50/30">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-2xl overflow-hidden bg-slate-100 shrink-0">
                                            <img src="{{asset('storage/images/dessert/yaou.webp')}}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs font-black text-slate-800 truncate">Yaoughrt</p>
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
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[10px] font-bold">SJ</div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-emerald-500 flex items-center justify-center text-[10px] font-bold text-white">ME</div>
                    </div>
                    <span class="text-xs font-medium">You are trading with <span class="font-bold text-slate-900">Sarah J.</span></span>
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


<script>
    function openSwapModal(requestId) {
        document.getElementById('modal-request-id').value = requestId;
        const modal = document.getElementById('swap-modal');
        modal.classList.remove('hidden');
        // Animate in
        // setTimeout(() => {
        //     modal.querySelector('div').classList.add('scale-100', 'opacity-100');
        // }, 10);
    }

    function closeSwapModal() {
        const modal = document.getElementById('swap-modal');
        modal.classList.add('hidden');
    }
</script>