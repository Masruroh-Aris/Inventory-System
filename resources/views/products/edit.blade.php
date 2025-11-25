<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-yellow-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-orange-600">
                            Edit Product ✏️
                        </h2>
                        <p class="text-gray-500 mt-2">Update the details of your product.</p>
                    </div>

                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Code -->
                            <div class="mb-4">
                                <label for="code" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Code</label>
                                <input type="text" name="code" id="code" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="{{ old('code', $product->code) }}" required>
                                @error('code') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Name</label>
                                <input type="text" name="name" id="name" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="{{ old('name', $product->name) }}" required>
                                @error('name') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Category</label>
                                <input type="text" name="category" id="category" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="{{ old('category', $product->category) }}" required>
                                @error('category') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="{{ old('price', $product->price) }}" required>
                                @error('price') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>

                            <!-- Stock (Correction) -->
                            <div class="mb-4">
                                <label for="stock" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Stock (Correction)</label>
                                <div class="flex space-x-2">
                                    <input type="number" name="stock" id="stock" class="w-2/3 rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="{{ old('stock', $product->stock) }}" required>
                                    <select name="unit" id="unit" class="w-1/3 rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200 bg-white">
                                        <option value="pcs" {{ old('unit', $product->unit) == 'pcs' ? 'selected' : '' }}>Pcs</option>
                                        <option value="box" {{ old('unit', $product->unit) == 'box' ? 'selected' : '' }}>Box</option>
                                        <option value="kg" {{ old('unit', $product->unit) == 'kg' ? 'selected' : '' }}>Kg</option>
                                        <option value="liter" {{ old('unit', $product->unit) == 'liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="unit" {{ old('unit', $product->unit) == 'unit' ? 'selected' : '' }}>Unit</option>
                                        <option value="pack" {{ old('unit', $product->unit) == 'pack' ? 'selected' : '' }}>Pack</option>
                                    </select>
                                </div>
                                <p class="text-xs text-gray-500 ml-1 mt-1">Use Transactions for normal stock flow.</p>
                                @error('stock') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                                @error('unit') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Description (Full Width) -->
                        <div class="mb-6 mt-2">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200">{{ old('description', $product->description) }}</textarea>
                            @error('description') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Update Product 💾
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
