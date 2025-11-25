<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                            New Transaction 🛍️
                        </h2>
                        <p class="text-gray-500 mt-2">Record a new transaction.</p>
                    </div>

                    <form action="{{ route('transactions.store') }}" method="POST" x-data="transactionForm()">
                        @csrf
                        
                        <!-- Type Selector (Visual Cards) -->
                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-4 text-center">Select Transaction Type</label>
                            <div class="grid grid-cols-2 gap-6">
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
                                        <p class="text-sm text-gray-500">Barang Keluar (Sale)</p>
                                    </div>
                                </label>

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
                                        <p class="text-sm text-gray-500">Barang Masuk (Return)</p>
                                    </div>
                                </label>
                            </div>
                            @error('type') <span class="text-red-500 text-xs block text-center mt-2">{{ $message }}</span> @enderror
                        </div>

                        <!-- Date -->
                        <div class="mb-6">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Date</label>
                            <input type="date" name="date" id="date" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" value="{{ date('Y-m-d') }}" required>
                            @error('date') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Scanner UI -->
                        <div x-show="showScanner" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" style="display: none;">
                            <div class="bg-white p-4 rounded-lg shadow-xl max-w-lg w-full relative">
                                <button @click="stopScanner()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <h3 class="text-lg font-bold mb-4 text-center">Scan Barcode</h3>
                                <div id="reader" width="600px"></div>
                            </div>
                        </div>

                        <div class="mb-6 flex justify-center">
                            <button type="button" @click="startScanner()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition transform hover:scale-105 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                                Scan Barcode 📷
                            </button>
                        </div>

                        <!-- Items List -->
                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-4 ml-1">Items</label>
                            <div class="space-y-4">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 relative animate-fade-in-up">
                                        <button type="button" @click="removeItem(index)" class="absolute top-2 right-2 text-red-400 hover:text-red-600" x-show="items.length > 1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                                            <div class="md:col-span-6">
                                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Product</label>
                                                <select :name="'items['+index+'][product_id]'" x-model="item.product_id" @change="updatePrice(index)" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                                                    <option value="">Select Product...</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->code }} - {{ $product->name }} (Stock: {{ $product->stock }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Price</label>
                                                <input type="text" :value="formatRupiah(item.price)" class="w-full rounded-lg border-gray-200 bg-gray-100 text-gray-500 text-sm cursor-not-allowed" readonly>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Qty</label>
                                                <input type="number" :name="'items['+index+'][quantity]'" x-model="item.quantity" min="1" class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm" required>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Subtotal</label>
                                                <input type="text" :value="formatRupiah(item.price * item.quantity)" class="w-full rounded-lg border-gray-200 bg-gray-100 text-gray-800 font-bold text-sm" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="addItem()" class="mt-4 text-indigo-600 hover:text-indigo-800 font-semibold text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Another Item
                            </button>
                        </div>

                        <!-- Grand Total -->
                        <div class="mb-6 bg-indigo-50 p-4 rounded-xl flex justify-between items-center border border-indigo-100">
                            <span class="text-lg font-bold text-indigo-900">Grand Total</span>
                            <span class="text-2xl font-bold text-indigo-600" x-text="formatRupiah(calculateGrandTotal())"></span>
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" placeholder="e.g., Customer purchase..."></textarea>
                            @error('notes') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('transactions.history') }}" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Submit Transaction 🚀
                            </button>
                        </div>
                    </form>

                    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
                    <script>
                        function transactionForm() {
                            return {
                                type: 'out',
                                items: [{ product_id: '', quantity: 1, price: 0 }],
                                showScanner: false,
                                html5QrcodeScanner: null,
                                productList: @json($products),
                                
                                addItem() {
                                    this.items.push({ product_id: '', quantity: 1, price: 0 });
                                },
                                removeItem(index) {
                                    this.items.splice(index, 1);
                                },
                                updatePrice(index) {
                                    const select = document.getElementsByName('items['+index+'][product_id]')[0];
                                    const option = select.options[select.selectedIndex];
                                    this.items[index].price = option.getAttribute('data-price') || 0;
                                },
                                calculateGrandTotal() {
                                    return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
                                },
                                formatRupiah(number) {
                                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
                                },
                                startScanner() {
                                    this.showScanner = true;
                                    this.html5QrcodeScanner = new Html5QrcodeScanner(
                                        "reader", 
                                        { fps: 10, qrbox: {width: 250, height: 250} },
                                        /* verbose= */ false
                                    );
                                    this.html5QrcodeScanner.render(this.onScanSuccess.bind(this), this.onScanFailure);
                                },
                                stopScanner() {
                                    if (this.html5QrcodeScanner) {
                                        this.html5QrcodeScanner.clear().then(_ => {
                                            this.showScanner = false;
                                        }).catch(error => {
                                            console.error("Failed to clear html5QrcodeScanner. ", error);
                                            this.showScanner = false;
                                        });
                                    } else {
                                        this.showScanner = false;
                                    }
                                },
                                onScanSuccess(decodedText, decodedResult) {
                                    // Handle on success condition with the decoded message.
                                    console.log(`Scan result: ${decodedText}`, decodedResult);
                                    
                                    // Find product by code
                                    const product = this.productList.find(p => p.code === decodedText);
                                    
                                    if (product) {
                                        // Play beep sound
                                        this.playBeep();
                                        
                                        // Check if last item is empty, if so use it, otherwise add new
                                        let lastItem = this.items[this.items.length - 1];
                                        if (lastItem.product_id === '') {
                                            lastItem.product_id = product.id;
                                            lastItem.price = product.price;
                                        } else {
                                            // Check if product already exists in list, if so increment qty
                                            let existingItem = this.items.find(item => item.product_id == product.id);
                                            if (existingItem) {
                                                existingItem.quantity++;
                                            } else {
                                                this.items.push({ product_id: product.id, quantity: 1, price: product.price });
                                            }
                                        }
                                        
                                        // Close scanner after successful scan? Or keep open for multiple?
                                        // Let's keep it open but maybe show a toast? For now just beep.
                                        // If we want to close: this.stopScanner();
                                        alert(`Product found: ${product.name}`);
                                        this.stopScanner();
                                    } else {
                                        alert(`Product not found for code: ${decodedText}`);
                                    }
                                },
                                onScanFailure(error) {
                                    // handle scan failure, usually better to ignore and keep scanning.
                                    // console.warn(`Code scan error = ${error}`);
                                },
                                playBeep() {
                                    const audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
                                    audio.play().catch(e => console.log('Audio play failed', e));
                                }
                            }
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
