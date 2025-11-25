<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Barcode Labels 🏷️</h3>
                            <p class="text-gray-500 text-sm mt-1">Select products to print labels.</p>
                        </div>
                    </div>

                    <form action="{{ route('barcodes.print') }}" method="POST" target="_blank">
                        @csrf
                        
                        <div class="mb-6 flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition transform hover:scale-105 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print Selected Labels
                            </button>
                        </div>

                        <div class="overflow-x-auto rounded-xl shadow-sm border border-gray-100">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50 text-gray-600">
                                    <tr>
                                        <th class="py-3 px-4 text-left w-10">
                                            <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        </th>
                                        <th class="py-3 px-4 text-left font-bold uppercase tracking-wider text-xs">Product Name</th>
                                        <th class="py-3 px-4 text-left font-bold uppercase tracking-wider text-xs">Code</th>
                                        <th class="py-3 px-4 text-left font-bold uppercase tracking-wider text-xs">Price</th>
                                        <th class="py-3 px-4 text-left font-bold uppercase tracking-wider text-xs">Stock</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($products as $product)
                                        <tr class="hover:bg-indigo-50 transition">
                                            <td class="py-3 px-4">
                                                <input type="checkbox" name="products[]" value="{{ $product->id }}" class="product-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            </td>
                                            <td class="py-3 px-4 font-medium text-gray-800">{{ $product->name }}</td>
                                            <td class="py-3 px-4 font-mono text-sm text-gray-500">{{ $product->code }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td class="py-3 px-4 text-sm font-bold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $product->stock }} {{ $product->unit }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</x-app-layout>
