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
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800"> Stock Products List 📦</h3>
                            <p class="text-gray-500 text-sm mt-1">List of all your stock movements.</p>
                        </div>
                        <div class="flex gap-4">
                            <?php if(!Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('stocks.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full shadow-md transition transform hover:scale-105 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    New Stock
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-xl shadow-sm">
                        <table class="min-w-full bg-white border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-r from-indigo-600 to-purple-500 text-white text-left">
                                    <th class="py-4 px-6 font-semibold rounded-tl-xl">Date</th>
                                    <th class="py-4 px-6 font-semibold">Product</th>
                                    <th class="py-4 px-6 font-semibold">Type</th>
                                    <th class="py-4 px-6 font-semibold">Quantity</th>
                                    <th class="py-4 px-6 font-semibold rounded-tr-xl">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-indigo-50 transition duration-300 transform hover:scale-[1.01] hover:shadow-md cursor-default group">
                                        <td class="py-4 px-6 text-gray-700 font-medium">
                                            <?php echo e($stock->date->format('d M Y')); ?>

                                        </td>
                                        <td class="py-4 px-6 font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                                            <?php echo e($stock->product->name); ?>

                                        </td>
                                        <td class="py-4 px-6">
                                            <?php if($stock->type === 'in'): ?>
                                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide border border-green-200 flex items-center w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    </svg>
                                                    Stock In
                                                </span>
                                            <?php else: ?>
                                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide border border-red-200 flex items-center w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                    </svg>
                                                    Stock Out
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-4 px-6 font-bold text-gray-700">
                                            <?php echo e($stock->quantity); ?>

                                        </td>
                                        <td class="py-4 px-6">
                                            <a href="<?php echo e(route('stocks.show', $stock->id)); ?>" class="text-indigo-600 hover:text-indigo-900 font-semibold hover:underline flex items-center">
                                                View Details
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-gray-400 italic">
                                            No stock history found. Start by creating a new stock transaction!
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <?php echo e($stocks->links()); ?>

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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/stocks/index.blade.php ENDPATH**/ ?>