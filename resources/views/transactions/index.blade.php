<x-app-layout>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-purple-500">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Transaction Reports 📊</h3>
                            <p class="text-gray-500 text-sm mt-1">Track all stock movements here.</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('reports.print') }}" target="_blank" class="bg-white border border-purple-200 text-purple-600 hover:bg-purple-50 hover:text-purple-700 px-4 py-2 rounded-full font-bold text-sm shadow-sm transition transform hover:scale-105 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print Report
                            </a>
                            <div class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full font-semibold text-sm">
                                Total Transactions: {{ $transactions->total() }}
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-xl shadow-sm">
                        <table class="min-w-full bg-white border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-r from-purple-600 to-blue-500 text-white text-left">
                                    <th class="py-4 px-6 font-semibold rounded-tl-xl">Date</th>
                                    <th class="py-4 px-6 font-semibold">User</th>
                                    <th class="py-4 px-6 font-semibold">Product</th>
                                    <th class="py-4 px-6 font-semibold">Type</th>
                                    <th class="py-4 px-6 font-semibold">Quantity</th>
                                    <th class="py-4 px-6 font-semibold rounded-tr-xl">Notes</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($transactions as $transaction)
                                    <tr class="hover:bg-purple-50 transition duration-300 transform hover:scale-[1.01] hover:shadow-md cursor-default group">
                                        <td class="py-4 px-6 text-gray-700 font-medium">
                                            {{ $transaction->date->format('d M Y') }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="font-bold text-gray-800">{{ $transaction->user->name }}</div>
                                            <div class="text-xs text-gray-500 uppercase tracking-wider">{{ $transaction->user->role }}</div>
                                        </td>
                                        <td class="py-4 px-6 font-semibold text-gray-800 group-hover:text-purple-600 transition">
                                            {{ $transaction->product->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($transaction->type === 'in')
                                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide border border-green-200 flex items-center w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    </svg>
                                                    Stock In
                                                </span>
                                            @else
                                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide border border-red-200 flex items-center w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                    </svg>
                                                    Stock Out
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 font-bold text-gray-700">
                                            {{ $transaction->quantity }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-500 italic text-sm">
                                            {{ $transaction->notes ?: '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $transactions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
