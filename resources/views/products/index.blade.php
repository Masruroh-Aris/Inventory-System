<x-app-layout>


    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-pink-500">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded shadow-md animate-pulse" role="alert">
                            <span class="block sm:inline font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-800">Product List 📦</h3>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('products.create') }}" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-2 px-6 rounded-full shadow-lg transform transition hover:scale-110 hover:rotate-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Product
                            </a>
                        @endif
                    </div>

                    <div class="overflow-x-auto rounded-xl shadow-sm">
                        <table class="min-w-full bg-white border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-r from-pink-500 to-purple-500 text-white text-left">
                                    <th class="py-4 px-6 font-semibold rounded-tl-xl">Code</th>
                                    <th class="py-4 px-6 font-semibold">Name</th>
                                    <th class="py-4 px-6 font-semibold">Category</th>
                                    <th class="py-4 px-6 font-semibold">Price</th>
                                    <th class="py-4 px-6 font-semibold">Stock</th>
                                    <th class="py-4 px-6 font-semibold rounded-tr-xl text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($products as $product)
                                    <tr class="hover:bg-pink-50 transition duration-300 transform hover:scale-[1.01] hover:shadow-md cursor-pointer group">
                                        <td class="py-4 px-6 font-medium text-gray-700 group-hover:text-pink-600 transition">{{ $product->code }}</td>
                                        <td class="py-4 px-6 font-bold text-gray-800">{{ $product->name }}</td>
                                        <td class="py-4 px-6">
                                            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-purple-200">
                                                {{ $product->category }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-green-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td class="py-4 px-6">
                                            <span class="{{ $product->stock < 10 ? 'text-red-600 font-bold animate-pulse' : 'text-gray-700' }}">
                                                {{ $product->stock }} {{ $product->unit }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('products.show', $product) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-200 p-2 rounded-full transition transform hover:scale-125" title="View">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('barcodes.show', $product->id) }}" class="bg-indigo-100 text-indigo-600 hover:bg-indigo-200 p-2 rounded-full transition transform hover:scale-125" title="View QR Code">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4h2v-4zm-6 0H6.414a1 1 0 00-.707.293L2.586 18.414A1 1 0 002.586 20h18.828a1 1 0 00.707-1.707l-3.121-3.121A1 1 0 0018.293 15H12v-4c0-1.105.895-2 2-2h2a2 2 0 100-4h-2a2 2 0 00-2 2v2" />
                                                        </svg>
                                                    </a>
                                                @if(Auth::user()->isAdmin())
                                                    <a href="{{ route('products.edit', $product) }}" class="bg-yellow-100 text-yellow-600 hover:bg-yellow-200 p-2 rounded-full transition transform hover:scale-125" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 p-2 rounded-full transition transform hover:scale-125" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
