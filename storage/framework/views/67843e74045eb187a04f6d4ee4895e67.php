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
                            <h3 class="text-2xl font-bold text-gray-800">Barcode Labels 🏷️</h3>
                            <p class="text-gray-500 text-sm mt-1">Select products to print labels.</p>
                        </div>
                    </div>

                    <form action="<?php echo e(route('barcodes.print')); ?>" method="POST" target="_blank">
                        <?php echo csrf_field(); ?>
                        
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
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-indigo-50 transition">
                                            <td class="py-3 px-4">
                                                <input type="checkbox" name="products[]" value="<?php echo e($product->id); ?>" class="product-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            </td>
                                            <td class="py-3 px-4 font-medium text-gray-800"><?php echo e($product->name); ?></td>
                                            <td class="py-3 px-4 font-mono text-sm text-gray-500"><?php echo e($product->code); ?></td>
                                            <td class="py-3 px-4 text-sm text-gray-600">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                                            <td class="py-3 px-4 text-sm font-bold <?php echo e($product->stock > 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                                <?php echo e($product->stock); ?> <?php echo e($product->unit); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/barcodes/index.blade.php ENDPATH**/ ?>