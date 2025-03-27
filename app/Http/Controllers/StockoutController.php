<?php

namespace App\Http\Controllers;

use App\Models\Stockout;
use App\Http\Requests\StoreStockoutRequest;
use App\Http\Requests\UpdateStockoutRequest;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\User;

class StockoutController extends Controller
{
    /**
     * Instantiate a new ProductController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-stockout|edit-stockout|delete-stockout', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-stockout', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-stockout', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-stockout', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('stockouts.index', [
            'stockouts' => Stockout::latest()->paginate(5)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $products = Product::all();
        $users = User::all();
        return view('stockouts.create', compact('products', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockoutRequest $request): RedirectResponse
    {
        $stockouts = $request->all();
        $stockouts['stockout_code'] = 'O' . mt_rand(100000, 999999);

        // Save the stockin data
        Stockout::create($stockouts);

        return redirect()->route('stockouts.index')
            ->with('success', 'Stock Out created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Stockout $stockout): View
    {
        return view('stockouts.show', [
            'stockout' => $stockout
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stockout $stockout): View
    {
        $products = Product::all();
        $users = User::all();
        return view('stockouts.edit', compact('stockout', 'products', 'users'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockoutRequest $request, Stockout $stockout): RedirectResponse
    {
        $stockout->update($request->validated());
        return redirect()->back()
            ->withSuccess('Stock Out is updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stockout $stockout): RedirectResponse
    {
        $stockout->delete();
        return redirect()->route('stockouts.index')
            ->with('success', 'Stock Out deleted successfully.');
    }
}