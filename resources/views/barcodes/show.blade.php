<x-app-layout>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-center">
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Product QR Code 📱</h2>
                    <p class="text-gray-500 mb-8">Scan this code to view product details.</p>

                    <div id="printableArea" class="inline-block border-2 border-dashed border-gray-300 p-8 rounded-xl bg-gray-50 mb-8">
                        <div class="flex flex-row items-center space-x-8 text-left">
                            <!-- QR Code Section -->
                            <div id="qrcode" class="bg-white p-2 rounded-lg shadow-sm flex-shrink-0"></div>

                            <!-- Product Info Section -->
                            <div class="flex flex-col justify-center">
                                <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $product->name }}</h3>
                                <p class="text-gray-500 font-mono text-lg mb-2">{{ $product->code }}</p>
                                
                                <div class="mt-2">
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Price</span>
                                    <p class="text-xl font-bold text-indigo-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                                
                                <div class="mt-2">
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Category</span>
                                    <p class="text-gray-700 font-medium">{{ $product->category }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 no-print">
                        <a href="{{ url()->previous() }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full hover:bg-gray-300 transition font-semibold">
                            Kembali
                        </a>
                        <button onclick="downloadQR()" class="px-6 py-2 bg-green-100 text-green-700 rounded-full hover:bg-green-200 transition font-semibold flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download PNG
                        </button>
                        <button onclick="window.print()" class="px-6 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition font-semibold flex items-center shadow-lg transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak Label
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
    <script>
        // Generate QR Code
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ $product->code }}",
            width: 150,
            height: 150,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        // Download PNG Function
        function downloadQR() {
            // Wait for QR code to be generated (it's canvas or img)
            const qrContainer = document.getElementById("qrcode");
            const img = qrContainer.querySelector("img");
            
            if (img && img.src) {
                const link = document.createElement("a");
                link.href = img.src;
                link.download = "QR-{{ $product->code }}.png";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            } else {
                // Fallback if it's a canvas (qrcodejs sometimes uses canvas)
                const canvas = qrContainer.querySelector("canvas");
                if (canvas) {
                    const link = document.createElement("a");
                    link.href = canvas.toDataURL("image/png");
                    link.download = "QR-{{ $product->code }}.png";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
            }
        }
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printableArea, #printableArea * {
                visibility: visible;
            }
            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none;
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
            /* Reset background for printing */
            .bg-gray-50 {
                background-color: white !important;
            }
        }
    </style>
</x-app-layout>
