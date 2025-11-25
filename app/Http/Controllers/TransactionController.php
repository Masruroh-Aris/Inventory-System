<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // Admin Report
    public function index()
    {
        $transactions = Transaction::with(['user', 'product'])->latest()->paginate(20);
        return view('transactions.index', compact('transactions'));
    }



    public function history()
    {
        $transactions = Auth::user()->transactions()->with('product')->latest()->paginate(10);
        return view('transactions.history', compact('transactions'));
    }

    // Create Transaction (Kasir)
    public function create()
    {
        $products = Product::all();
        $recentTransactions = Auth::user()->transactions()->with('product')->latest()->take(5)->get();
        return view('transactions.create', compact('products', 'recentTransactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'date' => 'required|date',
        ]);

        $invoice_code = 'INV-' . strtoupper(uniqid());

        DB::transaction(function () use ($request, $invoice_code) {
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($request->type === 'out' && $product->stock < $item['quantity']) {
                    throw new \Exception("Insufficient stock for product: {$product->name}");
                }

                $price = $product->price; // Assuming product has a price column
                $total_price = $price * $item['quantity'];

                Transaction::create([
                    'user_id' => Auth::id(),
                    'invoice_code' => $invoice_code,
                    'product_id' => $item['product_id'],
                    'type' => $request->type,
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'total_price' => $total_price,
                    'notes' => $request->notes,
                    'date' => $request->date,
                ]);

                if ($request->type === 'in') {
                    $product->increment('stock', $item['quantity']);
                } else {
                    $product->decrement('stock', $item['quantity']);
                }
            }
        });

        return redirect()->route('transactions.show', $invoice_code)->with('success', 'Transaction recorded successfully.');
    }

    public function show($invoice_code)
    {
        $transactions = Auth::user()->transactions()->with('product')->where('invoice_code', $invoice_code)->get();
        
        if ($transactions->isEmpty()) {
            abort(404);
        }

        return view('transactions.show', compact('transactions', 'invoice_code'));
    }

    public function print($invoice_code)
    {
        $transactions = Auth::user()->transactions()->with('product')->where('invoice_code', $invoice_code)->get();

        if ($transactions->isEmpty()) {
            abort(404);
        }

        return view('transactions.print', compact('transactions', 'invoice_code'));
    }

    // Admin Print Report
    public function print_report()
    {
        $transactions = Transaction::with(['user', 'product'])->latest()->get();
        return view('transactions.print_report', compact('transactions'));
    }
}
