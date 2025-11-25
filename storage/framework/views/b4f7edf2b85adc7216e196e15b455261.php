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
            
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 overflow-hidden shadow-lg sm:rounded-lg mb-6 hover:shadow-xl transition duration-300">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold">Welcome back, <?php echo e(Auth::user()->name); ?>! 👋</h3>
                    <p class="text-indigo-100 mt-1">Here is what's happening in your inventory today.</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Total Products -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 overflow-hidden shadow-lg sm:rounded-xl p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl delay-100">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-white/20 text-white mr-4 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-blue-100 text-sm font-medium uppercase">Total Products</p>
                            <p class="text-3xl font-bold text-white"><?php echo e($totalProducts); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Stock Value -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 overflow-hidden shadow-lg sm:rounded-xl p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl delay-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-white/20 text-white mr-4 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-green-100 text-sm font-medium uppercase">Total Stock Value</p>
                            <p class="text-3xl font-bold text-white">Rp <?php echo e(number_format($totalStockValue, 0, ',', '.')); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 overflow-hidden shadow-lg sm:rounded-xl p-6 transform transition duration-500 hover:scale-105 hover:shadow-2xl delay-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-white/20 text-white mr-4 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-purple-100 text-sm font-medium uppercase">Total Users</p>
                            <p class="text-3xl font-bold text-white"><?php echo e($totalUsers); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Low Stock Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition duration-300 border-t-4 border-red-500">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Lowest Stock Products</h3>
                    <canvas id="lowStockChart"></canvas>
                </div>

                <!-- Best Selling Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-lg transition duration-300 border-t-4 border-blue-500">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Best Selling Products</h3>
                    <canvas id="bestSellingChart"></canvas>
                </div>
            </div>

            <!-- Recent Transactions Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition duration-300 border-t-4 border-indigo-500">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Stock Updates</h3>
                    <div class="overflow-x-auto rounded-lg shadow-sm">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-indigo-600 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left font-semibold">Date</th>
                                    <th class="py-3 px-4 text-left font-semibold">Product</th>
                                    <th class="py-3 px-4 text-left font-semibold">Type</th>
                                    <th class="py-3 px-4 text-left font-semibold">Quantity</th>
                                    <th class="py-3 px-4 text-left font-semibold">User</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $latestTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-indigo-50 transition duration-150">
                                        <td class="py-3 px-4"><?php echo e($transaction->date->format('d M Y')); ?></td>
                                        <td class="py-3 px-4 font-medium text-gray-900"><?php echo e($transaction->product->name); ?></td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($transaction->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                                <?php echo e(ucfirst($transaction->type)); ?>

                                            </span>
                                        </td>
                                        <td class="py-3 px-4"><?php echo e($transaction->quantity); ?></td>
                                        <td class="py-3 px-4 text-gray-500"><?php echo e($transaction->user->name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 border-b text-center text-gray-500">No recent transactions found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Low Stock Chart (Line Chart as requested)
        const lowStockCtx = document.getElementById('lowStockChart').getContext('2d');
        new Chart(lowStockCtx, {
            type: 'line', // Diagram Garis
            data: {
                labels: <?php echo json_encode($lowStockProducts->pluck('name')); ?>,
                datasets: [{
                    label: 'Stock Level',
                    data: <?php echo json_encode($lowStockProducts->pluck('stock')); ?>,
                    borderColor: 'rgb(239, 68, 68)', // Red
                    backgroundColor: 'rgba(239, 68, 68, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Best Selling Chart (Bar Chart)
        const bestSellingCtx = document.getElementById('bestSellingChart').getContext('2d');
        new Chart(bestSellingCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bestSellingProducts->pluck('product.name')); ?>,
                datasets: [{
                    label: 'Total Sold',
                    data: <?php echo json_encode($bestSellingProducts->pluck('total_sold')); ?>,
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.6)', // Blue
                        'rgba(16, 185, 129, 0.6)', // Green
                        'rgba(245, 158, 11, 0.6)', // Yellow
                        'rgba(139, 92, 246, 0.6)', // Purple
                        'rgba(236, 72, 153, 0.6)'  // Pink
                    ],
                    borderColor: [
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(245, 158, 11)',
                        'rgb(139, 92, 246)',
                        'rgb(236, 72, 153)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
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
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/dashboard.blade.php ENDPATH**/ ?>