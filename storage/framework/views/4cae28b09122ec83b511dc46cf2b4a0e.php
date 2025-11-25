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
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                            New Stock 📦
                        </h2>
                        <p class="text-gray-500 mt-2">Record stock movement (In or Out).</p>
                    </div>

                    <form action="<?php echo e(route('stocks.store')); ?>" method="POST" x-data="{ type: 'in' }">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Type Selector (Visual Cards) -->
                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-4 text-center">Select Transaction Type</label>
                            <div class="grid grid-cols-2 gap-6">
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
                                        <p class="text-sm text-gray-500">Barang Masuk</p>
                                    </div>
                                </label>

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
                                        <p class="text-sm text-gray-500">Barang Keluar</p>
                                    </div>
                                </label>
                            </div>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs block text-center mt-2"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Product -->
                            <div class="mb-4 col-span-2">
                                <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product</label>
                                <select name="product_id" id="product_id" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200 bg-white" required>
                                    <option value="">Select Product...</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->code); ?> - <?php echo e($product->name); ?> (Stock: <?php echo e($product->stock); ?> <?php echo e($product->unit); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Quantity -->
                            <div class="mb-4">
                                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Quantity</label>
                                <input type="number" name="quantity" id="quantity" min="1" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" required>
                                <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Date -->
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Date</label>
                                <input type="date" name="date" id="date" class="w-full rounded-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" value="<?php echo e(date('Y-m-d')); ?>" required>
                                <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 transition duration-200" placeholder="e.g., Restock from supplier..."></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="<?php echo e(route('dashboard')); ?>" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Submit New Stock 🚀
                            </button>
                        </div>
                    </form>

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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/stocks/create.blade.php ENDPATH**/ ?>