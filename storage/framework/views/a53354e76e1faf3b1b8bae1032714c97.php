<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Invoice Details 🧾</h2>
                            <p class="text-gray-500 text-sm mt-1">Invoice Code: <span class="font-mono font-bold text-indigo-600"><?php echo e($invoice_code); ?></span></p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="<?php echo e(route('transactions.history')); ?>" class="text-gray-600 hover:text-gray-800 font-semibold flex items-center transition hover:-translate-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back
                            </a>
                            <a href="<?php echo e(route('transactions.print', $invoice_code)); ?>" target="_blank" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md flex items-center transition transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print Receipt
                            </a>
                        </div>
                    </div>

                    <!-- Invoice Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <h3 class="text-lg font-bold text-gray-700 mb-4">Transaction Info</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Date</label>
                                    <p class="text-gray-800 font-medium"><?php echo e($transactions->first()->date->format('d F Y')); ?></p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Type</label>
                                    <div class="mt-1">
                                        <?php if($transactions->first()->type === 'in'): ?>
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide border border-green-200 inline-flex items-center">
                                                Stock In (Masuk)
                                            </span>
                                        <?php else: ?>
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wide border border-red-200 inline-flex items-center">
                                                Stock Out (Keluar)
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-500 uppercase">Cashier</label>
                                    <p class="text-gray-800 font-medium"><?php echo e($transactions->first()->user->name); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-indigo-50 p-6 rounded-2xl flex flex-col justify-center items-center text-center">
                            <h3 class="text-lg font-bold text-indigo-700 mb-2">Grand Total</h3>
                            <p class="text-4xl font-extrabold text-indigo-600">
                                Rp <?php echo e(number_format($transactions->sum('total_price'), 0, ',', '.')); ?>

                            </p>
                            <p class="text-sm text-indigo-400 mt-2"><?php echo e($transactions->count()); ?> Items</p>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="overflow-x-auto rounded-xl shadow-sm border border-gray-100 mb-8">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100 text-gray-600">
                                <tr>
                                    <th class="py-3 px-4 text-left text-xs font-bold uppercase tracking-wider">Product</th>
                                    <th class="py-3 px-4 text-left text-xs font-bold uppercase tracking-wider">Price</th>
                                    <th class="py-3 px-4 text-left text-xs font-bold uppercase tracking-wider">Qty</th>
                                    <th class="py-3 px-4 text-right text-xs font-bold uppercase tracking-wider">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-3 px-4">
                                            <p class="font-bold text-gray-800"><?php echo e($item->product->name); ?></p>
                                            <p class="text-xs text-gray-500 font-mono"><?php echo e($item->product->code); ?></p>
                                        </td>
                                        <td class="py-3 px-4 text-sm text-gray-600">
                                            Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?>

                                        </td>
                                        <td class="py-3 px-4 text-sm font-bold text-gray-800">
                                            <?php echo e($item->quantity); ?>

                                        </td>
                                        <td class="py-3 px-4 text-right font-bold text-gray-800">
                                            Rp <?php echo e(number_format($item->total_price, 0, ',', '.')); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Notes -->
                    <?php if($transactions->first()->notes): ?>
                        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-100 rounded-xl text-gray-700 italic">
                            <span class="font-bold not-italic text-gray-500 text-xs uppercase block mb-1">Notes:</span>
                            "<?php echo e($transactions->first()->notes); ?>"
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/transactions/show.blade.php ENDPATH**/ ?>