<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stockin;
use App\Models\Product;
use App\Models\User;

class StockinController extends Controller
{
    public function index()
    {
        $stockins = Stockin::latest()->paginate(5);
        return view('stockins.index', compact('stockins'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('stockins.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stockin_code' => 'required',
            'product_id' => 'required',
            'product_name' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);

        $stockins = $request->all();
        $stockins['stockin_code'] = 'I' . mt_rand(100000, 999999);

        if ($stockins['stockin_code']) {
            Stockin::create($stockins);

            return redirect()->route('stockins.index')
            ->with('success', 'Stockin created successfully.');
        }
    }

    public function show(string $stockin_code)
    {
        $stockins = Stockin::where('stockin_code', $stockin_code)->first();
        return view('stockins.show', compact('stockin'));
    }

    public function edit(string $stockin_code)
    {
        $stockins = Stockin::findOrFail($stockin_code);
        $products = Product::all();
        $users = User::all();
        return view('stockins.edit', compact('stockin', 'products', 'users'));
    }

    public function update(Request $request, string $stockin_code)
    {
        $request->validate([
            'stockin_code' => 'required',
            'product_id' => 'required',
            'product_name' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'date' => 'required',
        ]);

        $stockins = Stockin::findOrFail($stockin_code);

        $user = User::all();
        $product = Product::all();

        $stockins->update($request->all());

        return redirect()->route('stockins.index')
            ->with('success', 'Stockin updated successfully.');
    }

    public function destroy(string $stockin_code)
    {
        $stockins = Stockin::findOrFail($stockin_code);
        $stockins->delete();

        return redirect()->route('stockins.index')
            ->with('success', 'Stockin deleted successfully.');
    }

}