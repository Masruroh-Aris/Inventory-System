<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-blue-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">
                                {{ $product->name }}
                            </h2>
                            <p class="text-gray-500 mt-1">Code: <span class="font-mono bg-gray-100 px-2 py-1 rounded">{{ $product->code }}</span></p>
                        </div>
                        <div class="text-right">
                            <span class="bg-purple-100 text-purple-800 text-sm font-bold px-3 py-1 rounded-full border border-purple-200">
                                {{ $product->category }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                        <!-- Price Card -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100 shadow-sm">
                            <p class="text-green-600 text-sm font-bold uppercase tracking-wide">Price</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>

                        <!-- Stock Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-100 shadow-sm">
                            <p class="text-blue-600 text-sm font-bold uppercase tracking-wide">Current Stock</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">
                                {{ $product->stock }} <span class="text-lg text-gray-500 font-medium">{{ $product->unit }}</span>
                            </p>
                        </div>

                        <!-- Description Card -->
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm">
                            <p class="text-gray-500 text-sm font-bold uppercase tracking-wide">Description</p>
                            <p class="text-gray-700 mt-2 leading-relaxed">{{ $product->description ?: 'No description available.' }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Recent History
                        </h3>
                        <div class="overflow-x-auto rounded-xl shadow-sm border border-gray-100">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="py-3 px-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Type</th>
                                        <th class="py-3 px-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="py-3 px-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">User</th>
                                        <th class="py-3 px-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse($product->transactions()->latest()->take(5)->get() as $transaction)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="py-3 px-4 text-sm text-gray-700">{{ $transaction->date->format('d M Y') }}</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ ucfirst($transaction->type) }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-sm font-bold text-gray-700">{{ $transaction->quantity }} {{ $product->unit }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-600">{{ $transaction->user->name }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-500 italic">{{ $transaction->notes ?: '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-4 px-4 text-center text-gray-500 text-sm">No transactions yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center">
                        <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold flex items-center transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to List
                        </a>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('products.edit', $product) }}" class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200 px-4 py-2 rounded-full font-bold transition duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00 2 2h11a2 2 0 00 2-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Product
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
