<?php

namespace App\Http\Controllers;

use App\Models\Stockin;
use App\Http\Requests\StoreStockinRequest;
use App\Http\Requests\UpdateStockinRequest;
use illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\User;

class StockinController extends Controller
{
    /**
     * Instantiate a new ProductController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-stockin|edit-stockin|delete-stockin', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-stockin', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-stockin', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-stockin', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('stockins.index', [
            'stockins' => Stockin::latest()->paginate(5)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $products = Product::all();
        $users = User::all();
        return view('stockins.create', compact('products', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockinRequest $request): RedirectResponse
    {
        $stockins = $request->all();
        $stockins['stockin_code'] = 'I' . mt_rand(100000, 999999);

        if ($stockins['stockin_code']) {
            Stockin::create($stockins, $request->validated());

            return redirect()->route('stockins.index')
            ->with('success', 'Stock In created successfully.');
        }
        return redirect()->route('stockins.index')
        ->with('error', 'Failed to create Stock In.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Stockin $stockin): View
    {
        return view('stockins.show', [
            'stockin' => $stockin
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stockin $stockin): View
    {
        $products = Product::all();
        $users = User::all();
        return view('stockins.edit', compact('stockin', 'products', 'users'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockinRequest $request, Stockin $stockin): RedirectResponse
    {
        $stockin->update($request->validated());
        return redirect()->back()
            ->withSuccess('Stock In is updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stockin $stockin): RedirectResponse
    {
        $stockin->delete();
        return redirect()->route('stockins.index')
            ->with('success', 'Stock In deleted successfully.');
    }
}