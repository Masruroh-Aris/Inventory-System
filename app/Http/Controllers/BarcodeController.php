<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorSVG;

class BarcodeController extends Controller
{
    public function printOne($id)
    {
        $product = Product::findOrFail($id);
        $products = collect([$product]);
        $generator = new BarcodeGeneratorSVG();

        return view('barcodes.print', compact('products', 'generator'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('barcodes.show', compact('product'));
    }
}
