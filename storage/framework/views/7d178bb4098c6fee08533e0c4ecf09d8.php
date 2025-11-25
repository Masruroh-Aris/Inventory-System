<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report - <?php echo e(date('d M Y')); ?></title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .badge {
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-in {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-out {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #888;
        }
        @media print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
            @page {
                size: landscape;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>Transaction Report</h1>
        <p>Generated on: <?php echo e(date('d F Y H:i')); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Invoice</th>
                <th>User</th>
                <th>Product</th>
                <th>Type</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($transaction->date->format('d/m/Y')); ?></td>
                    <td><?php echo e($transaction->invoice_code ?? '-'); ?></td>
                    <td>
                        <?php echo e($transaction->user->name); ?>

                        <br>
                        <small style="color: #888;"><?php echo e(ucfirst($transaction->user->role)); ?></small>
                    </td>
                    <td><?php echo e($transaction->product->name); ?></td>
                    <td>
                        <span class="badge <?php echo e($transaction->type === 'in' ? 'badge-in' : 'badge-out'); ?>">
                            <?php echo e(ucfirst($transaction->type)); ?>

                        </span>
                    </td>
                    <td class="text-right"><?php echo e($transaction->quantity); ?> <?php echo e($transaction->product->unit); ?></td>
                    <td class="text-right"><?php echo e(number_format($transaction->price, 0, ',', '.')); ?></td>
                    <td class="text-right"><?php echo e(number_format($transaction->total_price, 0, ',', '.')); ?></td>
                    <td><?php echo e($transaction->notes ?: '-'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Inventory System Report</p>
    </div>

    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer;">Print Report</button>
        <button onclick="window.close()" style="padding: 10px 20px; cursor: pointer;">Close</button>
    </div>
</body>
</html>
<?php /**PATH E:\SEMESTER 5\Pemrograman Framework\BELAJAR\Inventory_system\resources\views/transactions/print_report.blade.php ENDPATH**/ ?>