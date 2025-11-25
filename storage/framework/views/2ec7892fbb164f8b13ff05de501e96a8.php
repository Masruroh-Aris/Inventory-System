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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-indigo-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                                My Transactions 📜
                            </h2>
                            <p class="text-gray-500 mt-2">History of your stock movements.</p>
                        </div>
                        <a href="<?php echo e(route('transactions.create')); ?>" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-md transform transition hover:scale-105 hover:shadow-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            New Transaction
                        </a>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-r shadow-sm animate-pulse" role="alert">
                            <p class="font-bold">Success!</p>
                            <p><?php echo e(session('success')); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="overflow-x-auto rounded-xl shadow-sm border border-gray-100">
                        <table class="min-w-full bg-white">
                            <thead class="bg-indigo-600 text-white">
                                <tr>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Invoice</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Product</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Type</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Quantity</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Total</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-indigo-50 transition duration-150 transform hover:scale-[1.01]">
                                        <td class="py-4 px-6 text-sm text-gray-700">
                                            <div class="font-bold text-indigo-600"><?php echo e($transaction->invoice_code ?? '-'); ?></div>
                                            <div class="text-xs text-gray-500"><?php echo e($transaction->date->format('d M Y')); ?></div>
                                        </td>
                                        <td class="py-4 px-6 font-bold text-gray-800"><?php echo e($transaction->product->name); ?></td>
                                        <td class="py-4 px-6">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full <?php echo e($transaction->type === 'in' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'); ?>">
                                                <?php echo e(ucfirst($transaction->type)); ?>

                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-bold text-gray-700">
                                            <?php echo e($transaction->quantity); ?> <?php echo e($transaction->product->unit); ?>

                                        </td>
                                        <td class="py-4 px-6 text-sm font-bold text-gray-700">
                                            Rp <?php echo e(number_format($transaction->total_price, 0, ',', '.')); ?>

                                        </td>
                                        <td class="py-4 px-6 text-sm">
                                            <?php if($transaction->invoice_code): ?>
                                                <a href="<?php echo e(route('transactions.show', $transaction->invoice_code)); ?>" class="text-indigo-600 hover:text-indigo-900 font-bold hover:underline flex items-center">
                                                    View Invoice
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>
                                            <?php else: ?>
                                                <span class="text-gray-400 italic">Legacy</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 00 2 2h10a2 2 0 00 2-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                <p>No transactions found.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <?php echo e($transactions->links()); ?>

                    </div>

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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/transactions/history.blade.php ENDPATH**/ ?>