<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    // List all stock transactions
    public function index()
    {
        $stocks = Auth::user()->transactions()->with('product')->latest()->paginate(10);
        return view('stocks.index', compact('stocks'));
    }

    // Show details of a specific stock transaction
    public function show($id)
    {
        $stock = Auth::user()->transactions()->with('product')->findOrFail($id);
        return view('stocks.show', compact('stock'));
    }

    // Gudang Create Transaction (Stock In/Out)
    public function create()
    {
        $products = Product::all();
        $recentTransactions = Auth::user()->transactions()->with('product')->latest()->take(5)->get();
        return view('stocks.create', compact('products', 'recentTransactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->type === 'out' && $product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Insufficient stock.']);
        }

        DB::transaction(function () use ($request, $product) {
            Transaction::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'type' => $request->type,
                'quantity' => $request->quantity,
                'notes' => $request->notes,
                'date' => $request->date,
            ]);

            if ($request->type === 'in') {
                $product->increment('stock', $request->quantity);
            } else {
                $product->decrement('stock', $request->quantity);
            }
        });

        return redirect()->route('stocks.create')->with('success', 'Stock movement recorded successfully.');
    }
}
