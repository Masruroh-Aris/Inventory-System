<x-app-layout>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-pink-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600">
                            Add New Product ✨
                        </h2>
                        <p class="text-gray-500 mt-2">Fill in the details to add a new item to your inventory.</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Code -->
                            <div class="mb-4">
                                <label for="code" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Code</label>
                                <input type="text" name="code" id="code" class="w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" value="{{ old('code') }}" placeholder="e.g., P001" required>
                                @error('code') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Name</label>
                                <input type="text" name="name" id="name" class="w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" value="{{ old('name') }}" placeholder="e.g., Cute Doll" required>
                                @error('name') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Category</label>
                                <input type="text" name="category" id="category" class="w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" value="{{ old('category') }}" placeholder="e.g., Toys" required>
                                @error('category') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" class="w-full rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" value="{{ old('price') }}" placeholder="e.g., 50000" required>
                                @error('price') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Initial Stock -->
                            <div class="mb-4">
                                <label for="stock" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Initial Stock</label>
                                <div class="flex space-x-2">
                                    <input type="number" name="stock" id="stock" class="w-2/3 rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" value="{{ old('stock', 0) }}" required>
                                    <select name="unit" id="unit" class="w-1/3 rounded-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200 bg-white">
                                        <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pcs</option>
                                        <option value="box" {{ old('unit') == 'box' ? 'selected' : '' }}>Box</option>
                                        <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>Kg</option>
                                        <option value="liter" {{ old('unit') == 'liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="unit" {{ old('unit') == 'unit' ? 'selected' : '' }}>Unit</option>
                                        <option value="pack" {{ old('unit') == 'pack' ? 'selected' : '' }}>Pack</option>
                                    </select>
                                </div>
                                @error('stock') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                                @error('unit') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Description (Full Width) -->
                        <div class="mb-6 mt-2">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-pink-500 focus:ring-pink-500 px-4 py-2 transition duration-200" placeholder="Enter product description...">{{ old('description') }}</textarea>
                            @error('description') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Create Product 🚀
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
