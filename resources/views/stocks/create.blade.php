<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                            New Stock 📦
                        </h2>
                        <p class="text-gray-500 mt-2">Record stock movement (In or Out).</p>
                    </div>

                    <form action="{{ route('stocks.store') }}" method="POST" x-data="{ type: 'in' }">
                        @csrf
                        
                        <!-- Type Selector (Visual Cards) -->
                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-4 text-center">Select Transaction Type</label>
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Stock In Option -->
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="in" class="hidden" x-model="type">
                                    <div class="border-2 rounded-2xl p-6 text-center transition duration-300 transform hover:scale-105"
                                         :class="type === 'in' ? 'border-green-500 bg-green-50 shadow-lg' : 'border-gray-200 hover:border-green-300'">
                                        <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4 text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        </div>
                                        <h3 class="font-bold text-lg text-gray-800">Stock In</h3>
                                        <p class="text-sm text-gray-500">Barang Masuk</p>
                                    </div>
                                </label>

                                <!-- Stock Out Option -->
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="out" class="hidden" x-model="type">
                                    <div class="border-2 rounded-2xl p-6 text-center transition duration-300 transform hover:scale-105"
                                         :class="type === 'out' ? 'border-red-500 bg-red-50 shadow-lg' : 'border-gray-200 hover:border-red-300'">
                                        <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4 text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                        </div>
                                        <h3 class="font-bold text-lg text-gray-800">Stock Out</h3>
                                        <p class="text-sm text-gray-500">Barang Keluar</p>
                                    </div>
                                </label>
                            </div>
                            @error('type') <span class="text-red-500 text-xs block text-center mt-2">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Product -->
                            <div class="mb-4 col-span-2">
                                <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product</label>
                                <select name="product_id" id="product_id" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200 bg-white" required>
                                    <option value="">Select Product...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }} (Stock: {{ $product->stock }} {{ $product->unit }})</option>
                                    @endforeach
                                </select>
                                @error('product_id') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="mb-4">
                                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Quantity</label>
                                <input type="number" name="quantity" id="quantity" min="1" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" required>
                                @error('quantity') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Date -->
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Date</label>
                                <input type="date" name="date" id="date" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" value="{{ date('Y-m-d') }}" required>
                                @error('date') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" placeholder="e.g., Restock from supplier..."></textarea>
                            @error('notes') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Submit New Stock 🚀
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
