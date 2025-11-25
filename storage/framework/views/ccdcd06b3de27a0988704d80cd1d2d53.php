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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border-t-4 border-yellow-500">
                <div class="p-8 text-gray-900">
                    
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-orange-600">
                            Edit Product ✏️
                        </h2>
                        <p class="text-gray-500 mt-2">Update the details of your product.</p>
                    </div>

                    <form action="<?php echo e(route('products.update', $product)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Code -->
                            <div class="mb-4">
                                <label for="code" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Code</label>
                                <input type="text" name="code" id="code" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="<?php echo e(old('code', $product->code)); ?>" required>
                                <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Product Name</label>
                                <input type="text" name="name" id="name" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="<?php echo e(old('name', $product->name)); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Category</label>
                                <input type="text" name="category" id="category" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="<?php echo e(old('category', $product->category)); ?>" required>
                                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" class="w-full rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="<?php echo e(old('price', $product->price)); ?>" required>
                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Stock (Correction) -->
                            <div class="mb-4">
                                <label for="stock" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Stock (Correction)</label>
                                <div class="flex space-x-2">
                                    <input type="number" name="stock" id="stock" class="w-2/3 rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200" value="<?php echo e(old('stock', $product->stock)); ?>" required>
                                    <select name="unit" id="unit" class="w-1/3 rounded-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200 bg-white">
                                        <option value="pcs" <?php echo e(old('unit', $product->unit) == 'pcs' ? 'selected' : ''); ?>>Pcs</option>
                                        <option value="box" <?php echo e(old('unit', $product->unit) == 'box' ? 'selected' : ''); ?>>Box</option>
                                        <option value="kg" <?php echo e(old('unit', $product->unit) == 'kg' ? 'selected' : ''); ?>>Kg</option>
                                        <option value="liter" <?php echo e(old('unit', $product->unit) == 'liter' ? 'selected' : ''); ?>>Liter</option>
                                        <option value="unit" <?php echo e(old('unit', $product->unit) == 'unit' ? 'selected' : ''); ?>>Unit</option>
                                        <option value="pack" <?php echo e(old('unit', $product->unit) == 'pack' ? 'selected' : ''); ?>>Pack</option>
                                    </select>
                                </div>
                                <p class="text-xs text-gray-500 ml-1 mt-1">Use Transactions for normal stock flow.</p>
                                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ['unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Description (Full Width) -->
                        <div class="mb-6 mt-2">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-1">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-2xl border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 px-4 py-2 transition duration-200"><?php echo e(old('description', $product->description)); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="<?php echo e(route('products.index')); ?>" class="text-gray-500 hover:text-gray-700 font-semibold transition duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                                Update Product 💾
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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/products/edit.blade.php ENDPATH**/ ?>