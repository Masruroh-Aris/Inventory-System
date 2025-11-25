<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Labels</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
        }
        .label-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .label {
            width: 200px;
            height: 120px;
            border: 1px dashed #ccc;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            page-break-inside: avoid;
        }
        .product-name {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }
        .barcode {
            margin: 5px 0;
        }
        .product-code {
            font-family: monospace;
            font-size: 10px;
        }
        .product-price {
            font-size: 11px;
            font-weight: bold;
            margin-top: 5px;
        }
        @media print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
            .label {
                border: 1px solid #eee; /* Light border for cutting guide if needed */
            }
        }
    </style>
</head>
<body onload="window.print()">
    
    <div class="no-print" style="margin-bottom: 20px; text-align: center;">
        <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer;">Print Labels</button>
        <button onclick="window.close()" style="padding: 10px 20px; cursor: pointer;">Close</button>
    </div>

    <div class="label-container">
        @foreach($products as $product)
            <div class="label">
                <div class="product-name">{{ $product->name }}</div>
                <div class="barcode">
                    {!! $generator->getBarcode($product->code, $generator::TYPE_CODE_128) !!}
                </div>
                <div class="product-code">{{ $product->code }}</div>
                <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            </div>
        @endforeach
    </div>

</body>
</html>
