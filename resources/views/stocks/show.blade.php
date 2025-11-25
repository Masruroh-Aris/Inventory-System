<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Transaction Details 📋</h2>
                        <a href="{{ route('stocks.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center transition hover:-translate-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to List
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Product Info -->
                        <div class="bg-indigo-50 p-6 rounded-2xl">
                            <h3 class="text-lg font-bold text-indigo-700 mb-4">Product Information</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Product Name</label>
                                    <p class="text-lg font-semibold text-gray-800">{{ $stock->product->name }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Product Code</label>
                                    <p class="text-gray-700 font-mono">{{ $stock->product->code }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Transaction Info -->
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <h3 class="text-lg font-bold text-gray-700 mb-4">Transaction Info</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Date</label>
                                    <p class="text-gray-800 font-medium">{{ $stock->date->format('d F Y') }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Type</label>
                                    <div class="mt-1">
                                        @if($stock->type === 'in')
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide border border-green-200 inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                Stock In (Masuk)
                                            </span>
                                        @else
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide border border-red-200 inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                </svg>
                                                Stock Out (Keluar)
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Quantity</label>
                                    <p class="text-2xl font-bold text-gray-800">{{ $stock->quantity }} <span class="text-sm font-normal text-gray-500">{{ $stock->product->unit }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes & User -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Notes</label>
                            <div class="mt-2 p-4 bg-yellow-50 border border-yellow-100 rounded-xl text-gray-700 italic">
                                "{{ $stock->notes ?: 'No notes provided.' }}"
                            </div>
                        </div>
                        <div class="flex items-end justify-end">
                            <div class="text-right">
                                <label class="text-xs font-bold text-gray-500 uppercase">Created By</label>
                                <div class="flex items-center justify-end mt-1">
                                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-2">
                                        {{ substr($stock->user->name, 0, 1) }}
                                    </div>
                                    <p class="text-gray-800 font-medium">{{ $stock->user->name }}</p>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">{{ $stock->created_at->format('H:i A') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
